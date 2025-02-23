<?php

namespace App\Http\Controllers;

use App\Models\News;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

class NewsController extends Controller
{
    public function index()
    {
        $news = News::latest()->paginate(10);
        return view('admin.news.index', compact('news'));
    }

    public function create()
    {
        return view('admin.news.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'title' => 'required|string|max:255',
            'content' => 'required',
            'image' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
            'status' => 'required|in:draft,published',
        ]);

        $news = new News();
        $news->title = $request->title;
        $news->slug = Str::slug($request->title);
        $news->content = $request->content;
        $news->status = $request->status;
        $news->published_at = $request->status === 'published' ? now() : null;

        if ($request->hasFile('image')) {
            $image = $request->file('image');
            $filename = time() . '.' . $image->getClientOriginalExtension();
            $image->move(public_path('uploads/news'), $filename);
            $news->image = 'uploads/news/' . $filename;
        }

        $news->save();

        return redirect()->route('admin.news.index')->with('success', 'News created successfully');
    }

    public function edit($id)
    {
        $news = News::findOrFail($id);
        return view('admin.news.edit', compact('news'));
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'title' => 'required|string|max:255',
            'content' => 'required',
            'image' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
            'status' => 'required|in:draft,published',
        ]);

        $news = News::findOrFail($id);
        $news->title = $request->title;
        $news->slug = Str::slug($request->title);
        $news->content = $request->content;
        $news->status = $request->status;
        
        if ($request->status === 'published' && !$news->published_at) {
            $news->published_at = now();
        }

        if ($request->hasFile('image')) {
            // Delete old image if exists
            if ($news->image && file_exists(public_path($news->image))) {
                unlink(public_path($news->image));
            }
            
            $image = $request->file('image');
            $filename = time() . '.' . $image->getClientOriginalExtension();
            $image->move(public_path('uploads/news'), $filename);
            $news->image = 'uploads/news/' . $filename;
        }

        $news->save();

        return redirect()->route('admin.news.index')->with('success', 'News updated successfully');
    }

    public function destroy($id)
    {
        $news = News::findOrFail($id);
        
        if ($news->image && file_exists(public_path($news->image))) {
            unlink(public_path($news->image));
        }
        
        $news->delete();

        return redirect()->route('admin.news.index')->with('success', 'News deleted successfully');
    }
} 