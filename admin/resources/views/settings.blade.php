@extends('layouts.app')

@section('title', 'Admin Settings')
    
@section('content')
    <div class="container">
        <div class="row">
            <div class="col-lg-12">
                <h1 class="page-header">Admin Settings</h1>
            </div>
        </div>

        <!-- 설정 정보 표시 영역 -->
        <div class="row">
            <div class="col-lg-6">
                <div class="card">
                    <div class="card-header">Setting A</div>
                    <div class="card-body">
                        <!-- Setting A 정보 표시 -->
                    </div>
                </div>
            </div>
            <div class="col-lg-6">
                <div class="card">
                    <div class="card-header">Setting B</div>
                    <div class="card-body">
                        <!-- Setting B 정보 표시 -->
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
