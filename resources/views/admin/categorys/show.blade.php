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
                        <h3 class="panel-title">Hiển thị thể loại</h3>
                    </div>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-md-12">
                <table>
                    <tr>
                        <th>#</th>
                        <td>{{ $category->id }}</td>
                    </tr>
                    <tr>
                        <th>Tên</th>
                        <td>{{ $category->name }}</td>
                    </tr>
                    <tr>
                        <th>Trạng thái</th>
                        <td>@if (($category->status) == 1)Đang sử dụng @else Ngưng sử dụng @endif</td>
                    </tr>
                    <tr>
                        <th>Ngày tạo</th>
                        <td>{{ $category->created_at }}</td>
                    </tr>

                </table>
            </div>
            <td class="col-md-12">
            
                <h5>Những sản phẩm trong thể loại này.</h5>
                <table class="table">
                    <thead>
                    <tr>
                        <th scope="col">#</th>
                        <th scope="col">Tên sản phẩm</th>
                        <th scope="col">Giá tiền</th>
                        <th scope="col">Trạng thái</th>
                        <th scope="col">Thời gian tạo</th>
                    </tr>
                    </thead>
                    <tbody>
                    @if($category->products()->count())
                        @foreach($category->products()->get() as $id => $value)
                            <tr>
                                <td>{{ $id }}</td>
                                <td><a href="#">{{ $value->name }}</a></td>
                                <td>{{ $value->price }}</td>
                                <td>{{ $value->status }}</td>
                                <td>{{ $value->created_at }}</td>
                            </tr>
                        @endforeach
                    @else
                        <td>Không có đơn hàng nào</td>
                    @endif
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>
