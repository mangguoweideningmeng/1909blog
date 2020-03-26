<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8"> 
	<title>文章列表</title>
	<link rel="stylesheet" href="https://cdn.staticfile.org/twitter-bootstrap/3.3.7/css/bootstrap.min.css">  
	<script src="https://cdn.staticfile.org/jquery/2.1.1/jquery.min.js"></script>
	<script src="https://cdn.staticfile.org/twitter-bootstrap/3.3.7/js/bootstrap.min.js"></script>
	<meta name="csrf-token" content="{{ csrf_token() }}">
</head>
<body>

<table class="table table-hover">
	<form action="">
	文章标题<input type="text" name='name' value="{{$query['name']??''}}">
	<input type="submit" value='搜索'>
	<center><h2>文章列表</h2></center>
	<thead>
		<tr>
			<th>id</th>
			<th>文章标题</th>
			<th>文章分类</th>
			<th>作者</th>
			<th>图片</th>
			<th>关键字</th>
			<th>重要性</th>
			<th>是否显示</th>
			<th>网页描述</th>
			<th>邮箱</th>
			<th>操作</th>
			
		</tr>
	</thead>
	<tbody>
		@foreach ($article as $v)
		<tr id="{{$v->id}}">
			<td>{{$v->id}}</td>
			<td>{{$v->name}}</td>
			<td>{{$v->aname}}</td>
			<td>{{$v->man}}</td>
			
			<td><img src="{{env('UPLOADS_URL')}}{{$v->simg}}" height='40'  width='40' alt=""></td>
			<td>{{$v->keyword}}</td>
			<td>{{$v->zy==1?"√":"×"}}</td>
			<td>{{$v->show==1?"√":"×"}}</td>
			<td>{{$v->desc}}</td>
			<td>{{$v->email}}</td>
			<td>
				<a href="{{url('/article/edit/'.$v->id)}}" type="button" class="btn btn-warning">编辑</a>
				<!-- <a href="{{url('/article/destroy/'.$v->id)}}" type="button" class="btn btn-danger">删除</a> -->
				<a href="javascript:void(0)" type="button" class="btn btn-warning del">删除</a>
			</td>
		</tr>
		@endforeach

	</tbody>
	<tr><td colspan='6'>{{$article->appends($query)->links()}}</td></tr>
</table>

</body>
</html>
<script>
	$(document).on('click',".btn-warning",function(){
		//alert('1');
		var _this=$(this);
		//console.log(_this);
		var id=_this.parents('tr').attr('id');
		//console.log(id);
		if(window.confirm('是否确认')){
			// $.get('/article/destroy/'+id,function(result){
			// 	//alert(result);
			// 	if (result.code=='00000') {
			// 		location.reload();
			// 	}
			// },'json');
			$.ajaxSetup({headers:{'X-CSRF-TOKEN':$('meta[name="csrf-token"]').attr('content')}});
			$.post('/article/destroy/'+id,function(result){
				//alert(result);
				if (result.code=='00000') {
					location.reload();
				}
			},'json');
		}
	})
</script>