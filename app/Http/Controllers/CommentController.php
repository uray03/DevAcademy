<?php

namespace App\Http\Controllers;

use App\Models\Comment;
use App\Models\CommunityPost;
use Illuminate\Http\Request;

class CommentController extends Controller
{
    public function store(Request $request, $postId)
    {
        $request->validate([
            'content' => 'required',
        ]);

        Comment::create([
            'community_post_id' => $postId,
            'content' => $request->input('content'),
        ]);

        return back()->with('success', 'Komentar berhasil dikirim!');
    }
}

