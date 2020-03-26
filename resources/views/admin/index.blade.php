<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8"> 
	<title>管理员列表</title>
	<link rel="stylesheet" href="https://cdn.staticfile.org/twitter-bootstrap/3.3.7/css/bootstrap.min.css">  
	<script src="https://cdn.staticfile.org/jquery/2.1.1/jquery.min.js"></script>
	<script src="https://cdn.staticfile.org/twitter-bootstrap/3.3.7/js/bootstrap.min.js"></script>
</head>
<body>

<table class="table table-hover">
	<center><h2>管理员列表</h2></center>
	<thead>
		<tr>
			<th>id</th>
			<th>管理员名称</th>
			<th>手机号</th>
			<th>邮箱</th>
			<th>头像</th>
			<th>操作</th>
			
		</tr>
	</thead>
	<tbody>
		@foreach ($admin as $v)
		<tr>
			<td>{{$v->id}}</td>
			<td>{{$v->name}}</td>
			<td>{{$v->tel}}</td>
			<td>{{$v->email}}</td>
			<td><img src="{{env('UPLOADS_URL')}}{{$v->simg}}" height='40'  width='40' alt=""></td>
			
			<td>
				<a href="{{url('/admin/edit/'.$v->id)}}" type="button" class="btn btn-warning">编辑</a>
				<a href="{{url('/admin/destroy/'.$v->id)}}" type="button" class="btn btn-danger">删除</a>
			</td>
		</tr>
		@endforeach

	</tbody>
</table>

</body>
</html>