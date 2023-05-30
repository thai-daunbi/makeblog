@extends('layouts.app')

@section('title', 'Admin Settings')
    
@section('content')
    <div class="container">
        <div class="row">
            <div class="col-lg-12">
                <h1 class="page-header">Admin Settings - User Management</h1>
            </div>
        </div>

        <!-- 사용자 정보 표시 영역 -->
        <div class="row">
            <div class="col-lg-12">
                <table class="table table-bordered">
                    <thead>
                        <tr>
                            <th>ID</th>
                            <th>Name</th>
                            <th>Email</th>
                            <th>Actions</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($users as $user)
                        <tr>
                            <td>{{ $user->id }}</td>
                            <td>{{ $user->name }}</td>
                            <td>{{ $user->email }}</td>
                            <td>
                                <a href="{{ route('edit-user', $user->id) }}" class="btn btn-warning">Edit</a>
                                <a href="{{ route('delete-user', $user->id) }}" class="btn btn-danger" onclick="return confirm('Are you sure you want to delete this user?');">Delete</a>
                            </td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
@endsection
