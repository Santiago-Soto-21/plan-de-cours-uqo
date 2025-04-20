<?php

namespace App\Http\Controllers;

use Barryvdh\DomPDF\Facade\Pdf;
use Illuminate\Http\Request;

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
        
        // Extract the specific fields for the filename
        $sigle = $request->input('sigle');
        $groupe = $request->input('groupe');
        $trimestreCode = $request->input('trimestreCode');
        $prenomProf = strtoupper($request->input('prenomProf'));
        $nomProf = strtoupper($request->input('nomProf'));

        // Convert the HTML view into a PDF
        $pdf = Pdf::loadView('pdf.template', compact('data'));
        
        // Generate a unique filename using timestamp and random string
        $filename = 'PLAN-DE-COURS-' . $sigle . '-' . $groupe . '-' . $trimestreCode . '-' . $nomProf . '-' . $prenomProf . '.pdf';
        
        // Define the path where to save the file
        $savePath = 'C:\\Users\\santi\\Documents\\UQO-PLAN-DE-COURS\\EN_ATTENTE\\';
        
        // Create the directory if it doesn't exist
        if (!file_exists($savePath)) {
            mkdir($savePath, 0777, true);
        }
        
        // Save the PDF to the specified location
        $pdf->save($savePath . $filename);
        
        // Return a response indicating success
        return response()->json([
            'success' => true,
            'message' => 'PDF has been saved successfully',
            'path' => $savePath . $filename,
            'filename' => $filename
        ]);
    }
}
