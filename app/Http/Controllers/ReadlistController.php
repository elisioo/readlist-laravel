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
        $validate = $request->validate([
            'title' => 'required|string|max:100',
            'description' => 'required|string|max:255',
            'author' => 'required|string|max:100',
        ]);
    
        // Save the book to the authenticated user's readlist
        $request->user()->readlists()->create($validate);
    
        return redirect()->route('readlist.index')->with('success', 'Book added to your readlist!');
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
        if (auth()->id() !== $readlist->user_id) {
            return redirect()->route('readlist.index')->with('error', 'Unauthorized action.');
        }
    
        $readlist->delete(); // Delete the book entry
    
        return redirect()->route('readlist.index')->with('success', 'Book removed from your readlist.');
    }
}
