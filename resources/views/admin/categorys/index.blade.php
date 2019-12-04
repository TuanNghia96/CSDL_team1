<div class="section main">
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <div class="page-header">
                    <h2>Quản lý thể loại</h2>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-md-12">
                <div class="btn-link panel panel-primary">
                    <div class="panel-heading">
                        <h3 class="panel-title">thể loại thể loại</h3>
                    </div>
                </div>
            </div>
        </div>
        <form class="form-horizontal" role="form" method="POST" action="{{ route('categorys.store') }}" enctype="multipart/form-data">
            @csrf
            <input name="url_back" type="hidden" class="form-control" value="{{ url()->previous() }}">
            
            {{--name--}}
            <div class="form-group">
                <div class="col-sm-2">
                    <label for="name" class="control-label">Name</label>
                </div>
                <div class="col-sm-10">
                    <input name="name" type="text" class="form-control @if($errors->has('name')) is-invalid @endif" id="inputName" value="{{ old('name') ?? null }}" placeholder="vd: Nguyễn Văn An">
                </div>
            </div>
            @error('name')
            <div class="text-danger">{{ $message }}</div>
            @enderror
            
            
            
            {{--status--}}
            <div class="form-group">
                <div class="col-sm-2">
                    <label for="inputStatus" class="control-label">Trạng thái.</label>
                </div>
                <div class="col-sm-10">
                    <label class="radio-inline">
                        <input type="radio" name="status" value="0" @if(old('status') == 0) checked @endif>Đang sử dụng</label>
                    <input type="radio" name="status" value="1" @if(old('status') == 1) checked @endif>Ngưng sử dụng</label>
                </div>
            </div>
            <div class="form-group">
                <div class="col-sm-offset-2 col-sm-10">
                    <button type="submit" class="btn btn-default">Thêm</button>
                </div>
            </div>
        </form>
        <div class="row">
            <div class="col-md-12">
                <table class="table">
                    <thead>
                    <tr>
                        <th>#</th>
                        <th>Tên</th>
                        <th>Trang thái</th>
                        <th>Ngày tạo</th>
                        <th>Thao tác</th>
                    </tr>
                    </thead>
                    <tbody>
                    @foreach($categorys as $key => $value)
                        <tr>
                            <td>{{ $categorys->perPage() * ($categorys->currentPage() - 1) + $key + 1 }}</td>
                            <td>{{ $value->name }}</td>
                            <td>@if (($value->status) == 1)Đang sử dụng @else Ngưng sử dụng @endif</td>
                            <td>{{ $value->email }}</td>
                            <td>
                                <p class="text-right">
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
        {{--        <div class="text-center">{{ $categorys->appends(request()->input())->links() }}</div>--}}
    </div>
</div>
