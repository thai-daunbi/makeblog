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
        return view('admin.settings', ['users' => $users]);
    }

    public function editUser($id)
    {
        //
    }

    public function deleteUser($id)
    {
        $user = User::find($id);
        if ($user) {
            $user->delete();
            return redirect('/admin/settings')->with('success', 'User deleted successfully');
        }
        
        return redirect('/admin/settings')->with('error', 'User not found');
    }
}
