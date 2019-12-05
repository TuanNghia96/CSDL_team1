@extends('layout.index')

@section('title', 'Quản lý người dùng')

@section('content')
    <div class="section main">
        <div class="container">
            
            <div class="row">
                <div class="col-md-12">
                    <div class="page-header">
                        <h2>Danh sách người dùng</h2>
                    </div>
                </div>
                
                
                <div class="border border-primary rounded mt-3 mb-3 p-4">
                    <form action="{{ route('users.index') }}" method="get">
                        <div class="row">
                            <div class="col-md-4">
                                <div class="form-group row">
                                    <label class="col-md-4 col-form-label text-right">Tên</label>
                                    <div class="col-md-8">
                                        <input type="text" class="form-control" name="name" value="{{ request('name') }}">
                                    </div>
                                </div>
                            </div>
                            
                            <div class="col-md-4">
                                <div class="form-group row">
                                    <label class="col-md-4 col-form-label text-right">email</label>
                                    <div class="col-md-8">
                                        <input type="text" class="form-control" name="email" value="{{ request('email') }}">
                                    </div>
                                </div>
                            </div>
                            
                            
                            <div class="col-md-4">
                                <div class="form-group row">
                                    <label class="col-md-4 col-form-label text-right">Địa chỉ:</label>
                                    <div class="col-md-8">
                                        <input type="text" class="form-control" name="address" value="{{ request('address') }}">
                                    </div>
                                </div>
                            </div>
                            
                            
                            <div class="col-md-4">
                                <div class="form-group row">
                                    <label class="col-md-4 col-form-label text-right">Thời gian từ:</label>
                                    <div class="col-md-8">
                                        <input data-provide="datepicker" data-date-format="yyyy-mm-dd" class="form-control" type="date" name="from" value="{{ request('from') }}" placeholder="Từ" autocomplete="off">
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="form-group row">
                                    <label class="col-md-4 col-form-label text-right">đến:</label>
                                    <div class="col-md-8">
                                        <input data-provide="datepicker" data-date-format="yyyy-mm-dd" class="form-control" type="date" name="to" value="{{ request('to') }}" placeholder="Đến" autocomplete="off">
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="form-group row">
                                    <label class="col-md-4 col-form-label text-right">Quyền</label>
                                    <div class="col-md-8">
                                        <select class="form-control" name="role">
                                            <option value="">--Chọn quyền.</option>
                                            @foreach($role as $key => $value)
                                                <option value="{{ $key }}">{{ $value }}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-8">
                                &nbsp;
                            </div>
                            <div class="col-md">
                                <div class="form-group row">
                                    <div class="col-md-4 offset-md-4">
                                        <button type="submit" class="btn btn-primary btn-block">Tìm kiếm</button>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </form>
                </div>
                
                @if ($users->count() == 0)
                    <div><h3 class="text-center red">{{ 'Không tìm thấy bản ghi nào.' }}</h3></div>
                @else
                    <table class="table">
                        <thead>
                        <tr>
                            <th>#</th>
                            <th class="text-center">Tên</th>
                            <th class="text-center">địa chỉ mail</th>
                            <th class="text-center">Quyền</th>
                            <th class="text-center">Trang thái</th>
                            <th class="text-center">Thời gian</th>
                            <th class="text-center">Hành động</th>
                        </tr>
                        </thead>
                        <tbody>
                        @foreach($users as $key => $value)
                            <tr>
                                <td>{{ $users->perPage() * ($users->currentPage() - 1) + $key + 1 }}</td>
                                <td>{{ $value->name }}</td>
                                <td>{{ $value->email }}</td>
                                <td>{{ \App\Models\User::$role[$value->role] }}</td>
                                <td>@if (($value->status) == 1)Kích hoạt @else Khóa @endif</td>
                                <td>{{  date("H:i:s d/m/Y",strtotime($value->created_at)) }}</td>
                                {{--                                <td>{{  Carbon\Carbon::createFromFormat("H:i:s Y/m/d", $value->created_at) }}</td>--}}
                                <td>
                                    <p class="text-right">
                                        <a href="{{ route('users.show', $value->id) }}">hiển thị</a>　|　
                                        <a href="{{ route('users.edit', $value->id) }}">sửa</a>　|　
                                    <form action="{{ route('users.destroy', $value->id) }}" method="post">
                                        @csrf
                                        @method('DELETE')
                                        <input type="submit" value="xóa">
                                    </form>
                                    </p>
                                </td>
                            </tr>
                        @endforeach
                        </tbody>
    
                    </table>
                    <div class="text-center">{{ $users->links() }}</div>
            </div>
            @endif
        </div>
    </div>
@endsection