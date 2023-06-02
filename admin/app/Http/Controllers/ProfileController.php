<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;


class ProfileController extends Controller
{
    public function settings()
    {
        // 관련된 설정 데이터를 반환할 수 있습니다.
        return view('settings');
    }

    public function index()
    {
        $users = User::all();
        return view('settings', ['users' => $users]);
    }

    public function editUser($id)
    {
        //
    }

    public function deleteUser($id)
    {
        $user = User::findOrFail($id);
        $user->update(['deactivated' => true]);
        return redirect()->back()->with('message', 'User account deactivated successfully.');

    }
}
