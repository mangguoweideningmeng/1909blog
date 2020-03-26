<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8"> 
	<title>商品列表</title>
	<link rel="stylesheet" href="https://cdn.staticfile.org/twitter-bootstrap/3.3.7/css/bootstrap.min.css">  
	<script src="https://cdn.staticfile.org/jquery/2.1.1/jquery.min.js"></script>
	<script src="https://cdn.staticfile.org/twitter-bootstrap/3.3.7/js/bootstrap.min.js"></script>
</head>
<body>

<table class="table table-hover">
	<form action="">
	商品名称<input type="text" name='name'>
	<input type="submit" value='搜索'>
</form>
	<center><h2>商品列表</h2></center>

	<thead>
		<tr>
			<th>id</th>
			<th>商品名称</th>
			<th>商品货号</th>
			<th>商品分类</th>
			<th>商品品牌</th>
			<th>商品价格</th>
			<th>商品库存</th>
			<th>是否显示</th>
			<th>是否新品</th>
			<th>是否精品</th>
			<th>商品主图</th>
			<th>商品相册</th>
			<th>商品详情</th>
			<th>操作</th>
		</tr>
	</thead>
	<tbody>
		@foreach ($shoop as $v)
		<tr>
			<td>{{$v->id}}</td>
			<td>{{$v->name}}</td>
			<td>{{$v->art}}</td>
			<td>{{$v->cate_name}}</td>
			<td>{{$v->brand_name}}</td>
			<td>{{$v->price}}</td>
			<td>{{$v->num}}</td>
			<td>{{$v->show=='1'?"是":'否'}}</td>
			
			<td>{{$v->newproduct=="1"?"是":"否"}}</td>
			<td>{{$v->goods=="1"?"是":"否"}}</td>
			<td><img src="{{env('UPLOADS_URL')}}{{$v->simg}}" alt=""></td>
			<td>
			@if($v->simgs)
			@php $simgs=explode('|',$v->simgs);@endphp
			@foreach($simgs as $vv)
			<img src="{{env('UPLOADS_URL')}}{{$vv}}" height='40'  width='40' alt="">
			@endforeach
			@endif
			</td>
			<td>{{$v->desc}}</td>
			
			<td>
				<a href="{{url('/shoop/edit/'.$v->id)}}" type="button" class="btn btn-warning">编辑</a>
				<a href="{{url('/shoop/destroy/'.$v->id)}}" type="button" class="btn btn-danger">删除</a>
			</td>
		</tr>
		@endforeach

	</tbody>

</table>
{{$shoop->links()}}
</html>