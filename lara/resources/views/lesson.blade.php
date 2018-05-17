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
	<div class="row alert alert-info">
		<h4 class="col-4 offset-4 text-center">{{'學生：'.$student[0]->student_id.'	'.$student[0]->student_name.'的選課資料'}}</h4>
		<a href="{{url('/logout')}}" class="btn btn-success col-1 offset-3">登出</a>
	</div>
	@if ($student_lesson->all())
	<table class="table">
		<thead class="thead-light">
			<tr class="text-center">
				<th>編號</th>
				<th>名稱</th>
				<th>系所</th>
				<th>必修/選修</th>
				<th>學分</th>
				<th>教師</th>
				<th></th>
			</tr>
		</thead>
		<tbody>
			@foreach ($student_lesson as $student_lesson)
			<tr class="text-center">
				<td>{{$student_lesson->lesson_id}}</td>
				<td>{{$student_lesson->lesson_name}}</td>
				<td>{{$student_lesson->department}}</td>
				<td>{{$student_lesson->type}}</td>
				<td>{{$student_lesson->credit}}</td>
				<td>{{$student_lesson->teacher}}</td>
				<td><a href="{{url('/lesson/'.$student_lesson->lesson_id)}}" type="button" class="btn btn-danger">刪除</a></td>
			</tr>
			@endforeach
		</tbody>
	</table>
	@else
	<h4 class="text-center">你目前沒有選擇任何課程</h4>
	@endif
	<br><br>

	<h4 class="alert alert-info text-center">新增課程</h4>
	<form action="{{url('/lesson')}}" method="POST" class="text-center">
		@csrf
		<div class="row">
			<p class="col-1 offset-4">請選擇系所</p>
			<div class="col-2">
			    <select id="department" name="department" class="form-control text-center">
			        <option value="">請選擇</option>
			        @foreach ($department as $department)
			        <option value="{{$department->department}}">{{$department->department}}</option>
			        @endforeach
			    </select>
			</div>
			@if ($errors->has('department'))
			<span class="text-danger col-1"><strong>{{$errors->first('department')}}</strong></span>
			@endif
		</div>
		<br>
		<div class="row">
			<p class="col-1 offset-4">請選擇課程</p>
			<div class="col-2">
			    <select id="lesson" name="lesson" class="form-control text-center">
			    	<option value=''>請選擇</option>
			    </select>
			</div>
			@if ($errors->has('lesson'))
			<span class="text-danger col-1"><strong>{{$errors->first('lesson')}}</strong></span>
			@endif
		</div>
		<br>
		<input type="submit" class="btn btn-primary" value="新增">
	</form>
</body>

<footer style="position: absolute; bottom: 0; width: 100%;">
    <div class="text-center">版權所有 copyright © 2018 SuHuanJie. All Rights Reserved.</div>
</footer>
</html>

<script type="text/javascript">
	$('#department').change(function() {
		$.ajax({
			url: "ajax",
			type: "POST",
			data:{'_token': "{{csrf_token()}}",'department':$('#department').val()},
			dataType:"json",
			headers: {'X-CSRF-TOKEN': $('meta[name="_token"]').attr('content')},
			success: function(data){
				$('#lesson').empty();
				$('#lesson').append("<option value=''>請選擇</option>");
				for (var i = 0; i < data.lesson.length; i++) {
					$('#lesson').append("<option value='"+data.lesson[i].lesson_id+"'>"+data.lesson[i].lesson_name+"</option>");
				}
			}
		})
	});
</script>