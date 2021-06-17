<?php

namespace App\Http\Controllers;

use App\Blog;
use App\Http\Requests\AddMaskRequest;
use Illuminate\Http\Request;
use App\Mask;
class AddBlog extends Controller
{
    public function add(Request $request) {
        $blog = new Blog();
        $blog->blog_heading = $request->input('blog_heading');
        $blog->blog_content = $request->input('blog_content');
        $blog->blog_image = $request->file('blog_image')->store('blogs', 'public');
        $blog->save();

        return redirect()->route('profile')->with('blog_added', true);
    }
}
