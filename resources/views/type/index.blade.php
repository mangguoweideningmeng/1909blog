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
	<center><h2>分类列表<a style='float:right' href="{{url('/type/create')}}" class='btn btn-default'>添加</a></h2></center>
	<thead>
		<tr>
			<th>id</th>
			<th>分类名称</th>
			<th>父级分类</th>
			<th>分类描述</th>
			<th>是否显示</th>
			<th>操作</th>
			
		</tr>
	</thead>
	<tbody>
		@foreach ($type as $v)
		<tr>
			<td>{{$v->id}}</td>
			<td>{{$v->name}}</td>
			<td>{{$v->pid}}</td>
			<td>{{$v->desc}}</td>
		
			<td>{{$v->show==1?"是":"否"}}</td>
			
			<td>
				<a href="{{url('/type/edit/'.$v->id)}}" type="button" class="btn btn-warning">编辑</a>
				<a href="{{url('/type/destroy/'.$v->id)}}" type="button" class="btn btn-danger">删除</a>
			</td>
		</tr>
		@endforeach
	</tbody>
</table>

</body>
</html>