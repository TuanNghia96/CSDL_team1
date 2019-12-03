@extends('layouts.default')

@section('title', 'ユーザーを作成')
@section('content')

<div class="section main">
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
                    <h3 class="panel-title">Thêm mới người dùng</h3>
                </div>
            </div>
        </div>
    </div>
        <div class="row">
            <div class="col-md-12">
                <form class="form-horizontal" role="form" method="POST" action="{{ route('customers.store') }}">
                    @include('customers.form')
                </form>
            </div>
        </div>
    </div>
</div>
@endsection
