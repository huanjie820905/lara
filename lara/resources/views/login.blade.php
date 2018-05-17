<!DOCTYPE html>
<html>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
<link rel="stylesheet" href="vendor/twbs/bootstrap/dist/css/bootstrap.css">
<script src="vendor/twbs/bootstrap/dist/js/bootstrap.bundle.js"></script>

<header>
	<div id="carousel" class="carousel slide" data-ride="carousel">
		<div class="carousel-inner">
			<div class="carousel-item active">
				<img class="img-fluid" style="width: 100%; height: 250px;" src="resources/assets/images/nfu1.jpg">
			</div>
			<div class="carousel-item">
				<img class="img-fluid" style="width: 100%; height: 250px;" src="resources/assets/images/nfu2.jpg">
			</div>
			<div class="carousel-item">
				<img class="img-fluid" style="width: 100%; height: 250px;" src="resources/assets/images/nfu3.jpg">
			</div>
		</div>
		<a class="carousel-control-prev" href="#carousel" role="button" data-slide="prev">
		    <span class="carousel-control-prev-icon" aria-hidden="true"></span>
		    <span class="sr-only">Previous</span>
		</a>
		<a class="carousel-control-next" href="#carousel" role="button" data-slide="next">
		    <span class="carousel-control-next-icon" aria-hidden="true"></span>
		    <span class="sr-only">Next</span>
		</a>
	</div>
</header>

<body>
	<h4 class="alert alert-info text-center">虎尾科大學生選課系統</h4>
	<h4 class="text-center">選課系統登入</h4>
	<br>
	<form method="POST" class="text-center">
		@csrf
		<div class="row">
			<label class="col-1 offset-4">帳號：</label>
			<div class="col-2">
				<input type="text" class="form-control text-center" name="student_id" placeholder="請輸入學號">
			</div>
			@if ($errors->has('student_id'))
			<span class="text-danger col-1"><strong>{{$errors->first('student_id')}}</strong></span>
			@endif
		</div>
		<br><br>
		<div class="row">
			<label class="col-1 offset-4">密碼：</label>
			<div class="col-2">
				<input type="password" class="form-control text-center" name="password" placeholder="請輸入密碼">
			</div>
			@if ($errors->has('password'))
			<span class="text-danger col-1"><strong>{{$errors->first('password')}}</strong></span>
			@endif
		</div>
		<br><br>
		<input type="submit" class="btn btn-primary" value="登入">
	</form>
</body>

<footer style="position: absolute; bottom: 0; width: 100%;">
    <div class="text-center">版權所有 copyright © 2018 SuHuanJie. All Rights Reserved.</div>
</footer>
</html>