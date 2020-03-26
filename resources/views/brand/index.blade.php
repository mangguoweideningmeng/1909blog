<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8"> 
	<title>品牌列表</title>
	<link rel="stylesheet" href="https://cdn.staticfile.org/twitter-bootstrap/3.3.7/css/bootstrap.min.css">  
	<script src="https://cdn.staticfile.org/jquery/2.1.1/jquery.min.js"></script>
	<script src="https://cdn.staticfile.org/twitter-bootstrap/3.3.7/js/bootstrap.min.js"></script>
</head>
<body>

<table class="table table-hover">
	<center><h2>商品品牌列表</h2></center>
	<thead>
		<tr>
			<th>id</th>
			<th>品牌名称</th>
			<th>品牌网址</th>
			<th>品牌logo</th>
			<th>品牌描述</th>
			<th>操作</th>
			
		</tr>
	</thead>
	<tbody>
		@foreach ($brand as $v)
		<tr>
			<td>{{$v->brand_id}}</td>
			<td>{{$v->brand_name}}</td>
			<td>{{$v->brand_url}}</td>
			<td><img src="{{env('UPLOADS_URL')}}{{$v->brand_logo}}" height='40'  width='40' alt=""></td>
			<td>{{$v->brand_desc}}</td>
			<td>
				<a href="{{url('/brand/edit/'.$v->brand_id)}}" type="button" class="btn btn-warning">编辑</a>
				<a href="{{url('/brand/destroy/'.$v->brand_id)}}" type="button" class="btn btn-danger">删除</a>
			</td>
		</tr>
		@endforeach

	</tbody>
</table>
{{$brand->links()}}
</body>
</html>