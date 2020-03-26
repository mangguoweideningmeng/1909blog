@extends('layouts.shop')
@section('title', '列表页')
@section('content')
    <div class="maincont">
     <header>
      <a href="javascript:history.back(-1)" class="back-off fl"><span class="glyphicon glyphicon-menu-left"></span></a>
      <div class="head-mid">
       <form action="#" method="get" class="prosearch"><input type="text" /></form>
      </div>
     </header>
     <ul class="pro-select">
      <li class="pro-selCur"><a href="javascript:;">新品</a></li>
      <li><a href="javascript:;">销量</a></li>
      <li><a href="javascript:;">价格</a></li>
     </ul><!--pro-select/-->
     @foreach($goods as $v)
     <div class="prolist">
      <dl>
       <dt><a href="{{url('/list/proinfo'.$v->id)}}"><img src="{{env('UPLOADS_URL')}}{{$v->simg}}" alt=""></a></dt>
       <dd>
        <h3><a href="{{url('/list/proinfo/'.$v->id)}}">{{$v->name}}</a></h3>

        <div class="prolist-price"><strong>¥{{$v->price}}</strong> <span>{{$v->id}}</span></div>
        <div class="prolist-yishou"><span>5.0折</span> <em>已售：35</em></div>
       </dd>
       <div class="clearfix"></div>
      </div><!--prolist/-->
      @endforeach
    @include('index.public.footer');

     @endsection
