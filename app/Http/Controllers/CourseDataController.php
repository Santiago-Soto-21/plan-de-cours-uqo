<?php

// app/Http/Controllers/CourseDataController.php
namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;

class CourseDataController extends Controller
{
    public function fetchCourseData(Request $request)
    {
        $request->validate([
            'sigle' => 'required|string|max:7',
            'trimestreCode' => 'required|string|max:12',
        ]);

        $sigle = $request->input('sigle');
        $trimestreCode = $request->input('trimestreCode');
        
        // Make the GET request to the first API endpoint
        $scheduleResponse = Http::get('https://etudier.uqo.ca/activites/recherche-horaire-resultats-ajax', [
            'CritRech' => $sigle,
            'CdTrimestre' => $trimestreCode,
            'CdCyc' => '',
            'CdPrgAdm' => '',
            'CdRegrLieuEnsei' => '',
            'CdUniteAdminDem' => '',
            'CdModeEnsei' => '',
            'CdLieuEnsei' => '',
            'JourSem' => ['dimanche', 'lundi', 'mardi', 'mercredi', 'jeudi', 'vendredi', 'samedi'],
            'IndCrsTous' => 'false'
        ]);
        
        // Get course description from the second API endpoint
        $descriptionResponse = Http::get('https://etudier.uqo.ca/cours/description-cours-ajax', [
            'sigCrs' => $sigle,
            'typeDesc' => 'Partielle'
        ]);
        
        // Check if both requests were successful
        if ($scheduleResponse->successful() && $descriptionResponse->successful()) {
            // Combine the data from both endpoints
            return response()->json([
                'schedule' => $scheduleResponse->json(),
                'description' => [
                    'html' => $descriptionResponse->body(), // Return as HTML string
                    'text' => strip_tags($descriptionResponse->body()) // Also include plain text version
                ]
            ]);
        }
        
        // Handle partial failures
        if (!$scheduleResponse->successful()) {
            return response()->json(['error' => 'Failed to fetch course schedule data'], 422);
        }
        
        if (!$descriptionResponse->successful()) {
            return response()->json(['error' => 'Failed to fetch course description data'], 422);
        }
        
        // This should never be reached but just in case
        return response()->json(['error' => 'Unknown error occurred'], 500);
    }
}