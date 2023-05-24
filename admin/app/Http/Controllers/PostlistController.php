<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\post_list;

class PostlistController extends Controller
{   
    public function index(){
        $data = post_list::all;
        return view('postlist',['data'=>$data]);
    }
    
}
