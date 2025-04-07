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
}
