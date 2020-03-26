@extends('layouts.shop')
@section('title', '收货地址')
@section('content')
    <div class="maincont">
     <header>
      <a href="javascript:history.back(-1)" class="back-off fl"><span class="glyphicon glyphicon-menu-left"></span></a>
      <div class="head-mid">
       <h1>收货地址</h1>
      </div>
     </header>
     <div class="head-top">
      <img src="/static/index/images/head.jpg" />
     </div><!--head-top/-->
     <form action="/addressadd" method="post" class="reg-login">@csrf
      <div class="lrBox">

       <div class="lrList"><input type="text" placeholder="收货人" name="address_name"/></div>
       
       <div class="lrList">
        <input type="text" placeholder="省份" name="province">
       </div>
       <div class="lrList">
        <input type="text" placeholder="市" name='city'>
       </div>
       <div class="lrList">
        <input type="text" placeholder="县区" name='area'>
       </div>
       <div class="lrList">
        <input type="text" placeholder="详细地址" name='address_detail'>
       </div>
       <div class="lrList"><input type="text" placeholder="手机" name='address_tel'/></div>
       <div class="lrList2"><input type="text" placeholder="设为默认地址" name='is_default'/> <button>设为默认</button></div>
      </div><!--lrBox/-->
      <div class="lrSub">
       <input type="submit" value="保存" />
      </div>
     </form><!--reg-login/-->
 @include('index.public.footer');

     @endsection