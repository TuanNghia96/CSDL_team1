@extends("layout.index")
@section("content")
<div class="inner-header">
		<div class="container">
			<div class="pull-left">
				<h6 class="inner-title">Contacts</h6>
			</div>
			<div class="pull-right">
				<div class="beta-breadcrumb font-large">
					<a href="index.html">Home</a> / <span>Contacts</span>
				</div>
			</div>
			<div class="clearfix"></div>
		</div>
	</div>
	<div class="beta-map">
		
		<div class="abs-fullwidth beta-map wow flipInX"><iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3724.696199620684!2d105.84315191440699!3d21.004811693972474!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x3135ac76ccab6dd7%3A0x55e92a5b07a97d03!2zVHLGsOG7nW5nIMSQ4bqhaSBo4buNYyBCw6FjaCBraG9hIEjDoCBO4buZaQ!5e0!3m2!1svi!2s!4v1576834089101!5m2!1svi!2s" width="600" height="450" frameborder="0" style="border:0;" allowfullscreen=""></iframe></iframe></div>
	</div>
	<div class="container pl-0 pr-0" style="background: linear-gradient(to bottom, rgba(250,255,245,1) 0%,rgba(220,229,215,1) 40%,rgba(176,190,174,1) 100%);">
		<div id="content" class="space-top-none">
			
			<div class="space50">&nbsp;</div>
			<div class="row">
				<div class="col-sm-7">
					<h2>Your Feedback</h2>
					<div class="space20">&nbsp;</div>
					<p>Nếu bạn hài lòng xin vui lòng giới thiệu chúng tôi với mọi người </p>
					<p> Nếu bạn không hài lòng xin hãy nói với chúng tôi </p>
					<div class="space20">&nbsp;</div>
					<form action="#" method="post" class="contact-form">	
						<div class="form-block">
							<input name="your-name" type="text" placeholder="Your Name (required)">
						</div>
						<div class="form-block">
							<input name="your-email" type="email" placeholder="Your Email (required)">
						</div>
						<div class="form-block">
							<input name="your-subject" type="text" placeholder="Subject">
						</div>
						<div class="form-block">
							<textarea name="your-message" placeholder="Your Message"></textarea>
						</div>
						<div class="form-block">
							<button type="submit" class="beta-btn primary">Gửi <i class="fa fa-chevron-right"></i></button>
						</div>
					</form>
				</div>
				<div class="col-sm-5">
					<h2>Thông tin liên hệ </h2>
					<div class="space20">&nbsp;</div>

					<h5 class="contact-title">Địa chỉ</h5>
					<p>
						Số 1 Đại Cồ Việt<br>
						Đại Học Bách Khoa Hà Nội <br>
					</p>
					<div class="space20">&nbsp;</div>
					<h5 class="contact-title">Đội ngũ admin</h5>
					<br>
					<p><b>
						Nguyễn Thị Nguyệt Ánh </b>
						Email : <br>
						<a href="mailto:biz@betadesign.com">nguyetanh150299@gmail.com</a>
					</p>
					<br>
					<p><b>
						Nguyễn Bá Tuấn Nghĩa </b><br>
						Email : 
						<a href="mailto:biz@betadesign.com">nguyetanh150299@gmail.com</a>
					</p>
					<br>
					<p><b>
						Lê Xuân Anh </b><br>
						Email : 
						<a href="mailto:biz@betadesign.com">nguyetanh150299@gmail.com</a>
					</p>
					<br>
					<p><b>
						Nguyễn Văn Dũng </b></p>
						Email :<a href="mailto:biz@betadesign.com">nguyetanh150299@gmail.com</a>
					</p>
					<div class="space20">&nbsp;</div>
					<h6 class="contact-title"></h6>
					<p>
						Chúng tôi luôn trông đợi những phản hồi của bạn để có thể phục vụ bạn được tốt hơn <br>
						Tham gia với chúng tôi trên Facebook. <br>
						<a href="https://www.facebook.com/nguyetanh.nguyen.733">https://www.facebook.com/nguyetanh.nguyen.733</a>
					</p>
				</div>
			</div>
		</div> <!-- #content -->
	</div> <!-- .container -->

@endsection