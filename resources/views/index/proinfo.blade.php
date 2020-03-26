@extends('layouts.shop')
@section('title', '详情页')
@section('content')
<meta name="csrf-token" content="{{csrf_token()}}">
    <div class="maincont">
     <header>
      <a href="javascript:history.back(-1)" class="back-off fl"><span class="glyphicon glyphicon-menu-left"></span></a>
      <div class="head-mid">
       <h1>产品详情</h1>
      </div>
     </header>
     <div id="sliderA" class="slider">
 
      @if($goodsinfo->simgs)
      @php $simgs=explode('|',$goodsinfo->simgs);
      @endphp
      @foreach($simgs as $v)
       <img src="{{env('UPLOADS_URL')}}{{$v}}" alt="">
      @endforeach
      @endif
     </div><!--sliderA/-->
     <table class="jia-len">
      <tr>
       <th><strong class="orange">{{$goodsinfo['price']}}</strong>
        当前页面访问量:{{$count}}
       </th>
       <td>
        <input type="text" class="spinnerExample" name='buy_number'/>
       </td>
      </tr>
      <tr>
       <td>

 
        <strong>{{$goodsinfo['name']}}</strong>
        <p class="hui"></p>
       </td>
       <td align="right">
        <a href="javascript:;" class="shoucang"><span class="glyphicon glyphicon-star-empty"></span></a>
       </td>
      </tr>
     </table>
     <div class="height2"></div>
     <h3 class="proTitle">商品规格</h3>
     <ul class="guige">
      <li class="guigeCur"><a href="javascript:;">50ML</a></li>
      <li><a href="javascript:;">100ML</a></li>
      <li><a href="javascript:;">150ML</a></li>
      <li><a href="javascript:;">200ML</a></li>
      <li><a href="javascript:;">300ML</a></li>
      <div class="clearfix"></div>
     </ul><!--guige/-->
     <div class="height2"></div>
     <div class="zhaieq">
      <a href="javascript:;" class="zhaiCur">商品简介</a>
      <a href="javascript:;">商品参数</a>
      <a href="javascript:;" style="background:none;">订购列表</a>
      <div class="clearfix"></div>
     </div><!--zhaieq/-->
     <div class="proinfoList">
      <!-- <img src="/static/index/images/image4.jpg" width="636" height="822" /> -->
        {{$goodsinfo['desc']}}
     </div><!--proinfoList/-->
     <div class="proinfoList">
      暂无信息....
     </div><!--proinfoList/-->
     <div class="proinfoList">
      暂无信息......
     </div><!--proinfoList/-->
     <table class="jrgwc">
      <tr>
       <th>
        <a href="index.html"><span class="glyphicon glyphicon-home"></span></a>
       </th>
       <td><a id='addcart' href="javascript:void(0)">加入购物车</a></td>
      </tr>
     </table>
    </div><!--maincont-->
   <script src="/static/index/js/jquery.min.js"></script>
       <!--焦点轮换-->
    <script src="/static/index/js/jquery.excoloSlider.js"></script>
    
  
   @include('index.public.footer');
<script>
  $("#addcart").click(function(){
    //alert(44);
    var buy_number=$('.spinnerExample').val();
    //alert(buy_number);
    var goods_id={{$goodsinfo->id}};
    //alert(goods_id);
    if(buy_number<1){
      alert('请更改购买数量');
    }
    $.ajaxSetup({headers:{'X-CSRF-TOKEN':$('meta[name="csrf-token"]').attr('content')}});
    $.post('/addcart',{goods_id:goods_id,buy_number:buy_number},function(result){
      //alert(result);
      if (result.code=='00003') {

        location.href='/log?refer='+location.href;
      }
      if (result.code=='00004') {
        alert(result.msg);
      }
      if (result.code=='00000') {
        //alert(result.msg);
        location.href='/cartindex';
      }
    },'json')

   
  })
</script>
     @endsection