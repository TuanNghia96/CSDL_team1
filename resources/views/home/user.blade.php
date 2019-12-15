@extends("layout.index") @section("title", "Trang chủ") @section("content")
<div class="container" style="margin:50px 30px;">
    <br/>
    <div class="row">
        <div class="col-sm-3">
            <ul class="aside-menu">
                <li> <img src="assets/dest/images/lena.jpg" style="border: 2px solid blue;border-radius: 15px; width:50px; height:50px;" /></li>
                <li><a id="i" {{--href="{{route('thongtinuser',$user->id)}}" --}}>Thông Tin Tài Khoản</a></li>
                <li>
                    <a  id="o" {{--href="{{route('donhang',$user->id)}}" --}}>Đơn Hàng Của Tôi</a>
                    <li>
            </ul>
        </div>
        <div class="col-sm-9">
            <div id="info">
            <form action="{{route('changinfo')}}" method="post" enctype="multipart/form-data">
            @csrf
                Full Name <input type="text" value="{{$user->name}}" name="name" required/><br/>
                Số Điện Thoại <input type="text" value="{{$user->phone}}" name="phonenumber" required/><br/>
                Email <input type="email" disabled value="{{$user->email}}" name="email" required/> <br/>
                Địa Chỉ <input type="text" value="{{$user->address}}" name="address" required/><br/>
                Avatar <input type="file" value="" name="avatar_url" required/><br/>
                <input type="hidden" value="{{$user->id}}" name="id"/>
                <br/><input type="submit" value="Cập Nhập" name="Submit"/>
            </form>
            </div>
            <div id="order" style="display:none;">
            @if($orders==NULL)
                    <div><h3 class="text-center red">{{ 'Không tìm thấy bản ghi nào.' }}</h3></div>
                @else
                    <table class="table">
                        <thead>
                        <tr>
                            <th class="text-center">Mã Số Đơn Hàng</th>
                            <th class="text-center">Tên Đơn Hàng</th>
                            <th class="text-center">Giá trị</th>
                            <th class="text-center">Trang thái</th>
                            <th class="text-center">Thời gian</th>
                            <th class="text-center">Chi Tiết</th>
                        </tr>
                        </thead>
                        <tbody>
                        @foreach($orders as $value)
                            <tr>
                                <td>Đơn hàng #{{$value->id}}</td>
                                <td>{{$value->memo}}</td>
                                <td>{{ $value->total }}</td>
                                <td>{{ $status[$value->status] }}</td>
                                <td>{{  date("H:i:s d/m/Y",strtotime($value->created_at)) }}</td>
                                <td>
                                    <p class="text-center">
                                        @if($value->status==1)
                                        <a href= "{{ route('order', $value->id) }}">Đặt Hàng</a>
                                        @else
                                        <a href="{{route('dathang',$value->id)}}">Chi Tiết</a>
                                        @endif
                                    </p>
                                </td>
                            </tr>
                        @endforeach
                        </tbody>
                    </table>
                    <div class="row">{{ $orders->links()}}</div>
                @endif
            </div>
        </div>
    </div>
    <br/>

</div>
@endsection