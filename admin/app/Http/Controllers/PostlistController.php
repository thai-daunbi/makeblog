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
    
}
