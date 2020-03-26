<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8"> 
	<title></title>
	<link rel="stylesheet" href="https://cdn.staticfile.org/twitter-bootstrap/3.3.7/css/bootstrap.min.css">  
	<script src="https://cdn.staticfile.org/jquery/2.1.1/jquery.min.js"></script>
	<script src="https://cdn.staticfile.org/twitter-bootstrap/3.3.7/js/bootstrap.min.js"></script>
</head>
<body>

<table class="table table-hover">
	<center><h2>学生列表<a style='float:right' href="{{url('/student/create')}}" class='btn btn-default'>添加</a></h2></center>
	<thead>
		<tr>
			<th>id</th>
			<th>学生姓名</th>
			<th>学生性别</th>
			<th>学生班级</th>
			
			<th>操作</th>
			
		</tr>
	</thead>
	<tbody>
		@foreach ($student as $v)
		<tr>
			<td>{{$v->id}}</td>
			<td>{{$v->name}}</td>
			<td>{{$v->sex}}</td>
		
			<td>{{$v->class}}</td>
			
			<td>
				<a href="{{url('/student/edit/'.$v->id)}}" type="button" class="btn btn-warning">编辑</a>
				<a href="{{url('/student/destroy/'.$v->id)}}" type="button" class="btn btn-danger">删除</a>
			</td>
		</tr>
		@endforeach
	</tbody>
</table>

</body>
</html>