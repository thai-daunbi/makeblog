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
        $users = User::all()->each(function ($user) {
            if ($user->deactivated) {
                $user->situation = '비공개';
            } else {
                $user->situation = '공개';
            }
        });
        return view('settings', ['users' => $users]);
    }

    public function editUser($id)
    {
        return view('posts.edit', compact('post'));
    }

    public function deactivateUser($id)
    {
        $user = User::findOrFail($id);
        $user->update(['deactivated' => 1]);
        return redirect()->back()->with('message', 'User account deactivated successfully.');
    }

    public function activateUser($id)
    {
        $user = User::findOrFail($id);
        $user->deactivated = false;
        $user->save();

        return redirect()->route('admin-settings')
            ->with('user-activated', "User (ID: {$id}) has been activated.");
    }

}
