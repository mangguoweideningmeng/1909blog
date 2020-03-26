<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8"> 
	<title>新闻列表</title>
	<link rel="stylesheet" href="{{asset('/static/admin/css/bootstrap.min.css')}}">  
	<script src="/static/admin/js/jquery.min.js"></script>
	<script src="/static/admin/js/bootstrap.min.js"></script>
</head>
<body>

<table class="table table-hover">
	<center><h2>新闻列表</h2></center>
	<thead>
		<tr>
			<th>id</th>
			<th>新闻名称</th>
			<th>新闻分类</th>
			<th>作者</th>
			<th>添加时间</th>
			<th>操作</th>
			
		</tr>
	</thead>
	<tbody>
		@foreach ($new as $v)
		<tr>
			<td>{{$v->id}}</td>
			<td>{{$v->name}}</td>
			<td>{{$v->cate_name}}</td>
			<td>{{$v->man}}</td>
		
			<td>{{date("Y-m-d H:i:s",$v->time)}}</td>
			<td>
				<a href="{{url('/brand/edit/'.$v->brand_id)}}" type="button" class="btn btn-warning">编辑</a>
				<a href="{{url('/brand/destroy/'.$v->brand_id)}}" type="button" class="btn btn-danger">删除</a>
			</td>
		</tr>
		@endforeach
	<tr><td colspan='6'>{{$new->links()}}</td></tr>
	</tbody>
</table>

</body>
</html>
<script>
	$(document).on('click','.pagination a',function(){
		//alert('s');
		var url=$(this).attr('href');
		$.get(url,function(result){
			$('tbody').html(result);
		});
		return false;
	});
</script>