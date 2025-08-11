<?php

namespace App\Http\Controllers;

use App\Models\Comment;
use App\Models\Review;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class CommentController extends Controller
{
    public function store(Review $review, Request $request){
        $validated = $request->validate([
            'content' => ['required', 'string']
        ]);

        Comment::create([
            'review_id'     => $review->id,
            'user_id'       => Auth::id(),
            'content'       => $request->content
        ]);

        return back()->with('message', 'Successfully added a comment');
    }
}
