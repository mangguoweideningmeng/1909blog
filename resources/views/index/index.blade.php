@extends('layouts.shop')
@section('title', '首页')
@section('content')
<div class="head-top">
      <img src="/static/index/images/head.jpg" />
      <dl>
       <dt><a href="user.html"><img src="/static/index/images/touxiang.jpg" /></a></dt>
       <dd>
        <h1 class="username">三级分销终身荣誉会员</h1>
        <ul>
         <li><a href="{{url('/list/lb')}}"><strong>{{$z}}</strong><p>全部商品</p></a></li>
         <li><a href="javascript:;"><span class="glyphicon glyphicon-star-empty"></span><p>收藏本店</p></a></li>
         <li style="background:none;"><a href="javascript:;"><span class="glyphicon glyphicon-picture"></span><p>二维码</p></a></li>
         <div class="clearfix"></div>
        </ul>
       </dd>
       <div class="clearfix"></div>
      </dl>
     </div><!--head-top/-->
     <form action="#" method="get" class="search">
      <input type="text" class="seaText fl" />
      <input type="submit" value="搜索" class="seaSub fr" />
     </form><!--search/-->
     <ul class="reg-login-click">
     
      <div class="clearfix"></div>
     </ul><!--reg-login-click/-->
     
     <div id="sliderA" class="slider">
      @foreach($h as $v)
      <img src="{{env('UPLOADS_URL')}}{{$v->simg}}" alt="">
      @endforeach
     </div><!--sliderA/-->
     
     <ul class="pronav">
      @foreach($cate as $v)
      <li><a href="prolist.html">{{$v->cate_name}}</a></li>
     @endforeach
      <div class="clearfix"></div>
     </ul><!--pronav/-->
     <div class="index-pro1">
      @foreach($shoop as $v)
      <div class="index-pro1-list">
       <dl>
        <dt><a href="{{url('/list/proinfo/'.$v->id)}}"><img src="{{env('UPLOADS_URL')}}{{$v->simg}}" alt=""></a></dt>
        <dd class="ip-text"><a href="{{url('/list/proinfo/'.$v->id)}}">{{$v->name}}</a><span>已售：488</span></dd>
        <dd class="ip-price"><strong>¥{{$v->price}}</strong> <span>¥{{$v->price}}</span></dd>
       </dl>
      </div>
     
    @endforeach
      <div class="clearfix"></div>
     </div><!--index-pro1/-->
     @foreach($shoopc as $v)
     <div class="prolist">
      <dl>
       <dt><a href="proinfo.html"><img src="{{env('UPLOADS_URL')}}{{$v->simg}}" alt=""></a></dt>
       <dd>
        <h3><a href="proinfo.html">{{$v->name}}</a></h3>
        <div class="prolist-price"><strong>¥{{$v->price}}</strong> <span>¥599</span></div>
        <div class="prolist-yishou"><span>5.0折</span> <em>已售：35</em></div>
       </dd>
       <div class="clearfix"></div>
      </dl>
      
     </div><!--prolist/-->
     @endforeach
     <div class="joins"><a href="fenxiao.html"><img src="/static/index/images/jrwm.jpg" /></a></div>
     <div class="copyright">Copyright &copy; <span class="blue">这是就是三级分销底部信息</span></div>
     @include('index.public.footer');

     @endsection