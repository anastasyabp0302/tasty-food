<?php

namespace App\Http\Controllers;

use App\Models\News;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;

class NewsController extends Controller
{
    
    public function index()
    {
       
        $news = News::all(); 

        
        return view('news.index', compact('news'));
    }
    public function berita() {
        
        $news = News::all(); 
        return view('berita', compact('news')); 
    }

    public function create()
    {
        return view('news.create');
    }

   
    public function store(Request $request)
{
    $request->validate([
        'title' => 'required|string|max:255',
        'content' => 'required|string',
        'image' => 'required|image|mimes:jpeg,png,jpg,gif',
    ]);

   
    if ($request->hasFile('image')) {
        $imageName = time().'.'.$request->image->extension();
        $request->image->move(public_path('news-images'), $imageName);
    }

    
    News::create([
        'title' => $request->title,
        'content' => $request->content,
        'image' => $imageName,
    ]);

    
    return redirect()->route('news.index')->with('success', 'News added successfully.');
}


    
    public function edit($id)
    {
        $news = News::find($id);
        return view('news.edit', compact('news'));
    }

    
    public function update(Request $request, $id)
{
    $request->validate([
        'title' => 'required|string|max:255',
        'content' => 'required|string',
        'image' => 'image|mimes:jpeg,png,jpg,gif',
    ]);

    
    $news = News::find($id);

    
    if ($request->hasFile('image')) {
        $imageName = time().'.'.$request->image->extension();
        $request->image->move(public_path('news-images'), $imageName);
        
    
        if (file_exists(public_path("news-images/{$news->image}"))) {
            unlink(public_path("news-images/{$news->image}"));
        }
        
        
        $news->image = $imageName;
    }

    
    $news->title = $request->title;
    $news->content = $request->content;
    $news->save();
 
    return redirect()->route('news.index')->with('success', 'News updated successfully.');
}


    
    public function destroy($id)
    {
        $news = News::find($id);
        $news->delete();
        return redirect()->route('news.index')->with('success', 'Berita berhasil dihapus.');
    }
    public function show($id)
{
    $news = News::findOrFail($id);
    return view('news.show', compact('news')); 
}
}