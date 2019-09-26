<?php

namespace App\Http\Controllers;

use App\Comment;
use Illuminate\Http\Request;

class CommentController extends Controller
{
    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request, $id)
    {
        Comment::create([
            'user_id' => auth()->user()->id,
            'product_id' => $id,
            'body' => $request->body,
        ]);

        return back();
    }

}
