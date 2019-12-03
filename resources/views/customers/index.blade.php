<div class="section main">
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <div class="page-header">
                    <h2>CUSTOMERS</h2>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-md-12">
                <div class="btn-link panel panel-primary">
                    <div class="panel-heading">
                        <h3 class="panel-title">▼　一覧</h3>
                    </div>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-md-12">
                <form class="form-horizontal" role="form">
                    <form action="{{ route('customers.index') }}" method="get">
                        <div class="form-group">
                            <div class="col-sm-12">
                                <div class="input-group">
                                    <input type="search" class="form-control" name="free_word" placeholder="" value="{{ request('free_word') }}">
                                    <span class="input-group-btn">
                                            <button class="btn btn-default" type="submit">フリーワード検索</button>
                                        </span>
                                </div>
                            </div>
                        </div>
                    </form>
                </form>
            </div>
        </div>
        <div class="row">
            <div class="col-md-12">
                <hr>
            </div>
        </div>
        @if ($customers->count() == 0)
            <div><h3 class="text-center red">{{ '結果が見つかりません。' }}</h3></div>
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
                        @foreach($customers as $key => $value)
                            <tr>
                                <td>{{ $customers->perPage() * ($customers->currentPage() - 1) + $key + 1 }}</td>
                                <td>{{ $value->name }}</td>
                                <td>{{ $value->email }}</td>
                                <td>{{ \App\Models\Customer::$role[$value->role] }}</td>
                                <td>@if (($value->status) == 1)Kích hoạt @else Khóa @endif</td>
                                <td>
                                    <p class="text-right">
                                        <a href="{{ route('customers.show', $value->id) }}">hiển thị</a>　|　
                                        <a href="{{ route('customers.edit', $value->id) }}">sửa</a>　|　
                                        <a href="" data-toggle="modal" data-target="#modal-delete{{ $key }}">xóa</a>
                                    </p>
                                </td>
                            </tr>
                        @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        @endif
    </div>
</div>
