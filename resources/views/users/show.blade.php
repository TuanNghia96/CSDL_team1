<div class="section main">
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
                            <h3 class="panel-title">Hiển thị người dùng</h3>
                        </div>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-md-12">
                    <form class="form-horizontal" role="form">
                        <div class="form-group">
                            <div class="col-sm-2">
                                <label for="inputName" class="control-label">Name</label>
                            </div>
                            <div class="col-sm-10">{{ $user->name }}</div>
                        </div>
                        <div class="form-group">
                            <div class="col-sm-2">
                                <label for="inputEmail" class="control-label">email</label>
                            </div>
                            <div class="col-sm-10">{{ $user->email }}</div>
                        </div>
                        <div class="form-group">
                            <div class="col-sm-2">
                                <label for="inputEmail" class="control-label">avata</label>
                            </div>
                            <img src="{{ $user->avata_url }}" alt="">
                        </div>
                        <div class="form-group">
                            <div class="col-sm-2">
                                <label for="inputEmail" class="control-label">Số điện thoại</label>
                            </div>
                            <div class="col-sm-10">{{ $user->phone }}</div>
                        </div>
                        <div class="form-group">
                            <div class="col-sm-2">
                                <label for="inputEmail" class="control-label">Địa chỉ</label>
                            </div>
                            <div class="col-sm-10">{{ $user->address }}</div>
                        </div>
                        <div class="form-group">
                            <div class="col-sm-2">
                                <label for="inputEmail" class="control-label">Quyền</label>
                            </div>
                            <div class="col-sm-10">{{ $role[$user->role] }}</div>
                        </div>
                        <div class="form-group">
                            <div class="col-sm-2">
                                <label for="inputStatus" class="control-label">trang thái</label>
                            </div>
                            <div class="col-sm-10">@if ($user->status == 1) Kích hoạt @else Bị khóa @endif</div>
                        </div>
    
                        <div class="form-group">
                            <div class="col-sm-2">
                                <label for="inputEmail" class="control-label">Ngày khởi tạo</label>
                            </div>
                            <div class="col-sm-10">{{ $user->created_at  }}</div>
                        </div>
                        <div class="form-group">
                            <div class="col-sm-offset-2 col-sm-10">
                                <a href="{{ url()->previous() }}" class="btn btn-default">キャンセル</a>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
