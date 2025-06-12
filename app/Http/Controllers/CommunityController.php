<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\CommunityPost;

class CommunityController extends Controller
{
    public function index(Request $request)
    {
        $query = CommunityPost::query();
    
        if ($request->has('search')) {
            $query->where('title', 'like', '%' . $request->search . '%');
        }
    
        $posts = $query->with('comments')->latest()->get(); // <-- ini penting!
    
        return view('community.index', compact('posts'));
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'title' => 'required|max:255',
            'content' => 'required',
            'image' => 'nullable|image|max:2048'
        ]);

        if ($request->hasFile('image')) {
            $validated['image'] = $request->file('image')->store('community_images', 'public');
        }

        CommunityPost::create($validated);

        return redirect()->route('komunitas')->with('success', 'Pertanyaan berhasil dikirim.');
    }


    

}
