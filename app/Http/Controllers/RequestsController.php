<?php

namespace App\Http\Controllers;

use App\Models\Request as PdfRequest;
use Illuminate\Http\Request;
use Illuminate\Http\RedirectResponse;
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
     * Update the request status and comment.
     *
     * @param  \Illuminate\Http\Request  $httpRequest
     * @param  \App\Models\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $row = PdfRequest::find($id);
    
        $row->status = $request->input('status');

        if (is_null($request->input('director_comment'))) {
            $row->secretary_comment = $request->input('secretary_comment');
        } else {
            $row->director_comment = $request->input('director_comment');
        }

        $row->save();

        return response()->json([
            'message' => 'Request updated successfully',
            'request' => $row
        ], 200);
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