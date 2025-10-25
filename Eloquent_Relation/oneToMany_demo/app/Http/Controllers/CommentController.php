<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Comment;

class CommentController extends Controller
{
    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required',
            'artical_id' => 'required|exists:articals,id',
        ]);

        Comment::create($request->all());

        return back()->with('success', 'Comment added successfully!');
    }
}
