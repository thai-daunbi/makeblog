<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\PostList;

class PostlistController extends Controller
{   
    public function index(){
        $data = PostList::with('user')->get();
        return view('postlist', compact('data'));
    }
    
    public function edit(PostList $post)
    {
        return view('posts.edit', compact('post'));
    }

    public function update(Request $request, PostList $post)
    {
        $request->validate([
            'title' => 'required',
            'body' => 'required',
        ]);



        $post->update($request->except(['_token', '_method']));

        return redirect()->route('postlist.index')->with('success', 'Post updated successfully');
    }

    public function store(Request $request)
    {
        $request->validate([
            'title' => 'required',
            'body' => 'required',
        ]);

        PostList::create($request->except(['_token', '_method']));

        redirect()->route('postlist.index')->with('success', 'Post updated successfully');

    }

    public function updateVisibility($postId)
    {
        // "Post"라는 Eloquent 모델을 가정합니다.
        $post = PostList::findOrFail($postId);

        // 현재 값에 따라 가시성을 토글합니다.
        $post->is_public = !$post->is_public;
        $post->save();

        // 필요한 경우 응답을 반환합니다.
        return response()->json(['success' => true]);
    }


}
