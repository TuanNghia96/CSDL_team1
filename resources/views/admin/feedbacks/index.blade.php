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
        <form action="{{ route('feedback.index') }}" method="get">
            <div class="row">
                <div class="col-md-4">
                    <div class="form-group row">
                        <label class="col-md-4 col-form-label text-right">Tên người dùng</label>
                        <div class="col-md-8">
                            <select name="user_id">
                                <option value=""></option>
                                @foreach(\App\Models\User::pluck('name', 'id') as $key => $value)
                                    <option value="{{ $key }}" @if(request('user_id') == $key) selected @endif>{{ $value }}</option>
                                @endforeach
                            </select>
                        </div>
                    </div>
    
                    <div class="form-group row">
                        <label class="col-md-4 col-form-label text-right">Tên sản phẩm</label>
                        <div class="col-md-8">
                            <select name="product_id">
                                <option value=""></option>
                                @foreach(\App\Models\Product::pluck('name', 'id') as $key => $value)
                                    <option value="{{ $key }}" @if(request('product_id') == $key) selected @endif>{{ $value }}</option>
                                @endforeach
                            </select>
                        </div>
                    </div>
                    
                </div>
            <div class="row mt-3">
                <div class="col-md-2 offset-md-5">
                    <button type="submit" class="btn btn-primary btn-block">Tìm kiếm</button>
                </div>
            </div>
        </form>
        
        <div class="row">
            <div class="col-md-12">
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
                            <td><a href="{{ route('users.show', $value->user->id) }}">{{ $value->user->name }}</a></td>
                            <td><a href="#">{{ $value->product->name }}</a>{{ $value->product->name }}</td>
                            <td>{{ $value->content }}</td>
                            <td>{{ $value->created_at }}</td>
                            <td>
                                </p>
                            </td>
                        </tr>
                    @endforeach
                    </tbody>
                </table>
            </div>
        </div>
                <div class="text-center">{{ $feedbacks->appends(request()->input())->links() }}</div>
    </div>
</div>
