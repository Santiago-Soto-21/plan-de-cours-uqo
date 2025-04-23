<?php

namespace App\Http\Controllers;

use Barryvdh\DomPDF\Facade\Pdf;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;
use App\Models\Request as PdfRequest; // Aliased to avoid conflict with Illuminate\Http\Request

class PdfController extends Controller
{
    public function generate(Request $request)
    {
        // Get user input from form
        $data = $request->all();

        // Convert the HTML view into a PDF
        $pdf = Pdf::loadView('pdf.template', compact('data'));

        // Return the generated PDF for download
        return $pdf->download('plan-de-cours.pdf');
    }

    public function submit(Request $request)
    {
        // Get user input from form
        $data = $request->all();

        // Get the authenticated user's email
        $email = Auth::user()->email;
        
        // Extract the specific fields for the filename
        $sigle = $request->input('sigle');
        $groupe = $request->input('groupe');
        $trimestreCode = $request->input('trimestreCode');
        $usernamePart = strstr($email, '@', true); // Extract the part before the '@'
        $number = strval(mt_rand(10000,99999));

        // Convert the HTML view into a PDF
        $pdf = Pdf::loadView('pdf.template', compact('data'));
        
        // Generate a unique filename using timestamp and random string
        $filename = 'PLAN-DE-COURS-' . $sigle . '-' . $groupe . '-' . $trimestreCode . '-' . $usernamePart . '-' . $number . '.pdf';
        
        // Define the path where to save the file
        $savePath = 'C:\\Users\\santi\\Herd\\plan-de-cours-uqo\\resources\\views\\UQO-PLAN-DE-COURS\\' . $usernamePart . '\\';
        
        // Create the directory if it doesn't exist
        if (!file_exists($savePath)) {
            mkdir($savePath, 0777, true);
        }
        
        // Save the PDF to the specified location
        $pdf->save($savePath . $filename);

        // PDF URL path to access
        $pdf_path = url('http://localhost:8080/' . $usernamePart . '/' . $filename);

        // Save request information to the database
        PdfRequest::create([
            'id' => $number,
            'status' => 'En attente',
            'filename' => $filename,
            'requestor_id' => $usernamePart,
            'pdf_path' => $pdf_path
        ]);
        
        // Return a response indicating success
        return response()->json([
            'success' => true,
            'message' => 'PDF has been saved successfully',
            'path' => $savePath . $filename,
            'filename' => $filename
        ]);
    }
}
