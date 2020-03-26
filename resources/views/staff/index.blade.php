<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8"> 
	<title>售楼管理列表</title>
	<link rel="stylesheet" href="https://cdn.staticfile.org/twitter-bootstrap/3.3.7/css/bootstrap.min.css">  
	<script src="https://cdn.staticfile.org/jquery/2.1.1/jquery.min.js"></script>
	<script src="https://cdn.staticfile.org/twitter-bootstrap/3.3.7/js/bootstrap.min.js"></script>
</head>
<body>

<table class="table table-hover">
	<center><h2>售楼管理列表</h2></center>
<form action="">
	小区名称<input type="text" name='xname' value="{{$query['xname']??''}}">
	<input type="submit" value='搜索'>
</form>
	<thead>
		<tr>
			<th>id</th>
			<th>小区名称</th>
			<th>导购人</th>
			<th>房屋图片</th>
			<th>房屋相册</th>
			<th>导购联系方式</th>
			<th>房屋面积</th>
			<th>售价</th>
			<th>操作</th>
		</tr>
	</thead>
	<tbody>
		@foreach ($staff as $v)
		<tr>
			<td>{{$v->id}}</td>
			<td>{{$v->xname}}</td>
			<td>{{$v->name}}</td>
			<td><img src="{{env('UPLOADS_URL')}}{{$v->f_img}}" height='40'  width='40' alt=""></td>
			<td>
			@if($v->f_imgs)
			@php $f_imgs=explode('|',$v->f_imgs);@endphp
			@foreach($f_imgs as $vv)
			<img src="{{env('UPLOADS_URL')}}{{$vv}}" height='40'  width='40' alt="">
			@endforeach
			@endif
			</td>
			<td>{{$v->tel}}</td>
			<td>{{$v->area}}</td>
			<td>{{$v->price}}</td>
			<td>
				<a href="{{url('/brand/edit/'.$v->brand_id)}}" type="button" class="btn btn-warning">编辑</a>
				<a href="{{url('/brand/destroy/'.$v->brand_id)}}" type="button" class="btn btn-danger">删除</a>
			</td>
		</tr>
		@endforeach

	</tbody>

</table>
{{$staff->appends($query)->links()}}
</html>