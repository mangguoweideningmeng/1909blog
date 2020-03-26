@foreach ($new as $v)
		<tr>
			<td>{{$v->id}}</td>
			<td>{{$v->name}}</td>
			<td>{{$v->man}}</td>
			<td>{{$v->cate}}</td>
			<td>
				<a href="{{url('/brand/edit/'.$v->brand_id)}}" type="button" class="btn btn-warning">编辑</a>
				<a href="{{url('/brand/destroy/'.$v->brand_id)}}" type="button" class="btn btn-danger">删除</a>
			</td>
		</tr>
		@endforeach
	<tr><td colspan='6'>{{$new->links()}}</td></tr>