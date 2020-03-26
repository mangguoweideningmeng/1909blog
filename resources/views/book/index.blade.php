<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8"> 
	<title>图书列表</title>
	<link rel="stylesheet" href="https://cdn.staticfile.org/twitter-bootstrap/3.3.7/css/bootstrap.min.css">  
	<script src="https://cdn.staticfile.org/jquery/2.1.1/jquery.min.js"></script>
	<script src="https://cdn.staticfile.org/twitter-bootstrap/3.3.7/js/bootstrap.min.js"></script>
</head>
<body>

<table class="table table-hover">
	<center><h2>图书列表</h2></center>
	<form action="">
	书名<input type="text" name='name' value="{{$query['name']??''}}">
	<input type="submit" value='搜索'>
</form>
	<thead>
		<tr>
			<th>id</th>
			<th>书名</th>
			<th>作者</th>
			<th>封面</th>
			<th>价格</th>
			<th>操作</th>
			
		</tr>
	</thead>
	<tbody>
		@foreach ($book as $v)
		<tr>
			<td>{{$v->id}}</td>
			<td>{{$v->name}}</td>
			<td>{{$v->man}}</td>
			<td><img src="{{env('UPLOADS_URL')}}{{$v->simg}}" height='40'  width='40' alt=""></td>
			<td>{{$v->price}}</td>
			<td>
				<a href="{{url('/brand/edit/'.$v->brand_id)}}" type="button" class="btn btn-warning">编辑</a>
				<a href="{{url('/brand/destroy/'.$v->brand_id)}}" type="button" class="btn btn-danger">删除</a>
			</td>
		</tr>
		@endforeach

	</tbody>
</table>
{{$book->appends($query)->links()}}

</body>
</html>