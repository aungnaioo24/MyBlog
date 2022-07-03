<?php

namespace App\Traits\Blogs;

use App\Models\Post;
use Illuminate\Database\QueryException;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Redirect;

Trait Blogs {

    function getPosts() {

        try {

            $result = Post::get();

            return $result;

        } catch (QueryException $qe) {

            Log::error($qe->getMessage());
            return response()->json([
                'status' => 'get-post-error'
            ], 500);
        }

    }

    function uploadPost($title, $text) {

        try {

            Post::create([
                "title"  => $title,
                "text" => $text
            ]);

            return Redirect('myfeed');

        } catch (QueryException $qe) {

            Log::error($qe->getMessage());
            return response()->json([
                'status' => 'upload-post-error'
            ], 500);
        }

    }

}
