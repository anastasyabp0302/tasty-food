<?php

namespace App\Http\Controllers;

use App\Models\About;
use Illuminate\Http\Request;

class AboutController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $abouts = About::all();
        return view('about.index', compact('abouts'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('about.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
       $validatedData = $request->validate([
           'title' => 'required|string|max:255',
           'description' => 'required|string',
           'image' => 'nullable|image|max:5024',
       ]);

       if ($request->hasFile('image')) {
           $imagePath = $request->file('image')->store('abouts', 'public');
           $validatedData['image_path'] = $imagePath;
       } else {
        $validatedData['image_path'] = null;
       }

       About::create($validatedData);
       return redirect()->route('about.index')->with('success', 'About created successfully.');
    }

    /**
     * Display the specified resource.
     */
    public function show(About $about)
    {
        return view('about.show', compact('about'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(About $about)
    {
        return view('about.edit', compact('about'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, About $about)
    {
        $validated = $request->validate([
            'title' => 'required|string|max:255',
            'description' => 'required|string',
            'image' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:5024',
        ]);

        if ($request->hasFile('image')) {
            $imagePath = $request->file('image')->store('abouts', 'public');
            $validated['image_path'] = $imagePath;
        } else {
            $validated['image_path'] = $about->image_path;
        }

        $about->update($validated);
        return redirect()->route('about.index')->with('success', 'About updated succesfully');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(About $about)
    {
        if ($about->image_path && \Storage::exist('public/' .$about->image_path)) {
            \Storage::delete('public/' . $about->image_path);
        }

        $about->delete();
        return redirect()->route('about.index')->with('success', 'About deleted successfully.');
    }
}
