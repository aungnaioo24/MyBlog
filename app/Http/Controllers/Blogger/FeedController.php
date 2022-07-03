<?php

namespace App\Http\Controllers\Blogger;

use App\Http\Controllers\Controller;
use App\Traits\Blogs\Blogs;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;

class FeedController extends Controller
{

    use Blogs;
    public function index()
    {

        $getPostsResult = $this->getPosts();

        $datas = [
            "posts" => $getPostsResult
        ];

        return view('blogger.feed', compact('datas'));
    }

    // add new post to database when user post
    public function addNewPost(Request $request)
    {
        Log::debug("Route Okay");

        /* $validated = $request->validate([
            'new-post' => 'required|unique:posts|max:255',
            'new-text' => 'required',
        ]); */

        $title = $request->input('title');
        $text = $request->input('text');

        // Using method from Blogs Trait
        $this->uploadPost($title, $text);

    }
}
