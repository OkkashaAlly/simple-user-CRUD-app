<?php

namespace App\Http\Controllers;

use App\Models\Post;
use Illuminate\Http\Request;

class PostController extends Controller
{
    // CREATE POST =========================================================
    public function createPost(Request $req)
    {
        $incomingFields = $req->validate([
            'title' => 'required',
            'body' => 'required'
        ]);

        // strip tags and encode special characters
        $incomingFields['title'] = htmlspecialchars(strip_tags($incomingFields['title']));
        $incomingFields['body'] = htmlspecialchars(strip_tags($incomingFields['body']));

        $incomingFields['user_id'] = auth()->user()->id;
        $post = Post::create($incomingFields);

        return redirect('/');
    }

}
