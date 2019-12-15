<!DOCTYPE html>
<html>
<head>
    <title>Đăng ký tài khoản thành công.</title>
</head>
<body>
<h2 style="padding: 23px;background: #00A8FF;border-bottom: 6px #0f3e68;">
    <a href="http://127.0.0.1:8000" style="color: white">Visit Our Website</a>
</h2>
<div><h4 style="color: #00A8FF" ">Đây là thư trả lời tự động đề nghị không gửi mail đến hòm thư này</h4></div>
<h5>Xin chào {{ $customer }}. Đây là thư trả lời từ ban quản trị về phản hồi của bạn.</h5>
<h5><b>Phản hồi:</b>"{{ $content }}"</h5>
<h5><b>Câu trả lời:</b>{{ $answer }}</h5>
<h5><b>Người trả lời:</b>{{ $admin }}</h5>
</body>
</html>
