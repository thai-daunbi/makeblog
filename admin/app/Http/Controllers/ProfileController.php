<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ProfileController extends Controller
{
    public function settings()
    {
        // 관련된 설정 데이터를 반환할 수 있습니다.
        return view('settings');
    }
}
