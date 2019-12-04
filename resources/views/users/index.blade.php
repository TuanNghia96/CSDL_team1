<div class="section main">
    <div class="container">
        <div class="border border-primary rounded mb-3 p-4">
            <form action="{{ route('users.index') }}" method="get">
                <div class="row">
                    <div class="col-md-4">
                        <div class="form-group row">
                            <label class="col-md-4 col-form-label text-right">name</label>
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
                            <label class="col-md-4 col-form-label text-right">phone</label>
                            <div class="col-md-8">
                                <input type="text" class="form-control" name="phone" value="{{ request('phone') }}">
                            </div>
                        </div>
                    </div>
    
                    <div class="col-md-4">
                        <div class="form-group row">
                            <label class="col-md-4 col-form-label text-right">address</label>
                            <div class="col-md-8">
                                <input type="text" class="form-control" name="address" value="{{ request('address') }}">
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
                  
                </div>
                <div class="col-md-4">
                    <div class="form-group row">
                        <label class="col-md-4 col-form-label text-right">created_at</label>
                        <div class="col-md-4">
                            <input data-provide="datepicker" data-date-format="yyyy-mm-dd" class="form-control" name="from" value="{{ request('from') }}" placeholder="Từ" autocomplete="off">
                        </div>
                        <div class="col-md-4">
                            <input data-provide="datepicker" data-date-format="yyyy-mm-dd" class="form-control" name="to" value="{{ request('to') }}" placeholder="Đến" autocomplete="off">
                        </div>
                    </div>
                </div>
                <div class="row mt-3">
                    <div class="col-md-2 offset-md-5">
                        <button type="submit" class="btn btn-primary btn-block">Tìm kiếm</button>
                    </div>
                </div>
            </form>
        </div>
        <div class="row">
            <div class="col-md-12">
                <hr>
            </div>
        </div>
        
        @if ($users->count() == 0)
            <div><h3 class="text-center red">{{ 'Không tìm thấy bản ghi nào.' }}</h3></div>
        @else
            <div class="row">
                <div class="col-md-12">
                    <table class="table">
                        <thead>
                        <tr>
                            <th>#</th>
                            <th>Tên</th>
                            <th>địa chỉ mail</th>
                            <th>Quyền</th>
                            <th>Trang thái</th>
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
                </div>
            </div>
        @endif
        <div class="text-center">{{ $users->appends(request()->input())->links() }}</div>
    </div>
</div>
