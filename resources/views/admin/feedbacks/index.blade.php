@extends('layouts.app')

@section('title', 'Quản lý phản hồi')

@section('content')
        <!-- Page Content  -->
        <div id="content">
            
            <div class="row">
                <div class="col-md-12">
                    <div class="page-header">
                        <h2><a href="{{ route('feedbacks.index') }}">Danh sách phản hồi</a></h2>
                    </div>
                </div>
                <div class="border border-primary rounded mt-3 mb-3 p-4 col-md-12">
                    <form action="{{ route('feedbacks.index') }}" method="get">
                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group row">
                                    <label class="col-md-4 col-form-label text-right">Tên người dùng</label>
                                    <div class="col-md-8">
                                        <select class="form-control" name="user_id">
                                            <option value="">--Chọn--</option>
                                            @foreach(\App\Models\User::pluck('name', 'id') as $key => $value)
                                                <option value="{{ $key }}" @if(request('user_id') == $key) selected @endif>{{ $value }}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group row">
                                    <label class="col-md-4 col-form-label text-right">Tên sản phẩm</label>
                                    <div class="col-md-8">
                                        <select class="form-control" name="product_id">
                                            <option value="">--Chọn--</option>
                                            @foreach(\App\Models\Product::pluck('name', 'id') as $key => $value)
                                                <option value="{{ $key }}" @if(request('product_id') == $key) selected @endif>{{ $value }}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                </div>
                            </div>
                

                            <div class="col-md-4">
                                &nbsp;
                            </div>
                            <div class="col-md-4">
                                <div class="form-group row">
                                    <div class="col-md-4 offset-md-4">
                                        <button type="submit" class="btn btn-primary btn-block">Tìm kiếm</button>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </form>
                </div>
                
                @if ($feedbacks->count() == 0)
                    <div><h3 class="text-center red">{{ 'Không tìm thấy bản ghi nào.' }}</h3></div>
                @else
                    <table class="table">
                        <thead>
                        <tr>
                            <th>#</th>
                            <th>Tên người dùng</th>
                            <th>Tên sản phẩm</th>
                            <th>Nội dung</th>
                            <th>Thời gian</th>
                        </tr>
                        </thead>
                        <tbody>
                        @foreach($feedbacks as $key => $value)
                            <tr>
                                <td>{{ $feedbacks->perPage() * ($feedbacks->currentPage() - 1) + $key + 1 }}</td>
                                <td><a href="{{ route('users.show', $value->user_id) }}">{{ $value->user->name }}</a></td>
                                <td><a href="{{ route('products.show', $value->product_id) }}">{{ $value->product->name }}</a></td>
                                <td>{{ $value->content }}</td>
                                <td>{{ $value->created_at }}</td>
                            </tr>
                        @endforeach
                        </tbody>
                    </table>
                    <div class="col-md-12">{{ $feedbacks->appends(request()->input())->links() }}</div>
                @endif
            </div>
    </div>
@endsection
