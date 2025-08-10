<?php

namespace App\Http\Controllers;

use App\Models\Product;
use App\Models\Review;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ReviewController extends Controller
{
    public function store(Product $product, Request $request){
        $validated = $request->validate([
            'content' => ['required', 'string'],
        ]);

        Review::create([
            'product_id' => $product->id,
            'user_id'   => Auth::id(),
            'content' => $request->content
        ]);

        return back()->with('message', 'Successfully added a new reviuew');
    }
}
