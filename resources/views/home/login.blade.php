@extends("block.index")
@section("content")
<div class="container">
		<div id="content">		
			<form action="{{route('signin')}}" method="post" class="beta-form-checkout">
			@csrf
				<div class="row">
					<div class="col-sm-3"></div>
					<div class="col-sm-6">
						<h4>Đăng nhập</h4>
						<div class="space20">&nbsp;</div>
						<div class="form-block">
							<label for="email">Email address*</label>
							<input type="email" id="email" name="email" required>
						</div>
						<div class="form-block">
							<label for="phone">Password*</label>
							<input type="password" id="phone" name="password" required>
						</div>
						<div class="form-block">
							<button type="submit" class="btn btn-primary" name="submit">Login</button>
						</div>
					</div>
					<div class="col-sm-3"></div>
				</div>
			</form>
		</div> <!-- #content -->
    </div> <!-- .container -->
@endsection