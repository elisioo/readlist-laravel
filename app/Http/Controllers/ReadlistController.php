<?php

namespace App\Http\Controllers;

use App\Models\readlist;
use Illuminate\Http\Request;
use Illuminate\View\View;
use Illuminate\Http\Response; 

class ReadlistController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(): View
    {
        return view('readlist.index', [
            'readlists' => readlist::with('user')->latest()->get(),
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(readlist $readlist)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(readlist $readlist)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, readlist $readlist)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(readlist $readlist)
    {
        //
    }
}
