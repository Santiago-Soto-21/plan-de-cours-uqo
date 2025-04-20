<?php

namespace App\Http\Controllers;

use App\Models\Request as PdfRequest;
use Illuminate\Http\Request;
use Inertia\Inertia;

class RequestsController extends Controller
{
    /**
     * Display a listing of the requests.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $requests = PdfRequest::orderBy('created_at', 'desc')->get();
        return response()->json($requests);
    }

    /**
     * Show the requests page.
     *
     * @return \Inertia\Response
     */
    public function show()
    {
        return Inertia::render('Request');
    }
}