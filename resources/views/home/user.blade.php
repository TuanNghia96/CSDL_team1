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
            <form action="{{}}" method="post" enctype="multipart/form-data">
                Full Name <input type="text" value="Nguyen Van Dung" name="name" required/><br/>
                Số Điện Thoại <input type="text" disabled value="0983567927" name="phonenumber" required/><br/>
                Email <input type="email" disabled value="dung.nv@gmail.com" name="email" required/> <br/>
                Địa Chỉ <input type="text" value="Thanh Hoa" name="address" required/><br/>
                Avatar <input type="file" value="" name="avatar" required/><br/>
                <br/><input type="submit" value="Cập Nhập" name="Submit"/>
            </form>
            </div>
            <div id="order" style="display:none;">
                <p>Nguyen VAn Dung</p>
            </div>
        </div>
    </div>
    <br/>

</div>
@endsection