@extends('layouts.default')

@section('title', '新規登録')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-12">
            <div class="page-header">
                <h2>Quản lý người dùng</h2>
            </div>
        </div>
    </div>
    <div class="row">
        <div class="col-md-12">
            <div class="btn-link panel panel-primary">
                <div class="panel-heading">
                    <h3 class="panel-title">Thay đổi thông tin người dùng</h3>
                </div>
            </div>
        </div>
    </div>
    <div class="row">
        <div class="col-md-12">
            <form method="post" action="{{ route('users.update', $user->id) }}" class="form-horizontal" role="form">
                @method('PUT')
                @include('users.form')
            </form>
        </div>
    </div>
</div>
@endsection
