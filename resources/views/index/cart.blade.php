@extends('layouts.shop')
@section('title', '购物车')
@section('content')
  <body>
    <div class="maincont">
     <header>
      <a href="javascript:history.back(-1)" class="back-off fl"><span class="glyphicon glyphicon-menu-left"></span></a>
      <div class="head-mid">
       <h1>购物车</h1>
      </div>
     </header>
     <div class="head-top">
      <img src="/static/index/images/head.jpg" />
     </div><!--head-top/-->
     <table class="shoucangtab">
      <tr>
       <td width="75%"><span class="hui">购物车共有：<strong class="orange">{{$count}}</strong>件商品</span></td>
       <td width="25%" align="center" style="background:#fff url(/static/index/images/xian.jpg) left center no-repeat;">
        <span class="glyphicon glyphicon-shopping-cart" style="font-size:2rem;color:#666;"></span>
       </td>
      </tr> 
     
     </table>
        @foreach($cart as $v)
     <div class="dingdanlist">
      <table>
       <tr>
        <td width="100%" colspan="4"><a href="javascript:;"><input type="checkbox" name="1" id='allbox'/> 全选</a></td>
       </tr>
       <tr goods_id='{{$v->goods_id}}'>
        <td width="4%"><input type="checkbox" name="1" class='box'/></td>
        <td class="dingimg" width="15%"><img src="{{env('UPLOADS_URL')}}{{$v->goods_img}}" alt=""></td>
        <td width="50%">
         <h3>{{$v->goods_name}}</h3>
         <time>下单时间：{{date("Y-m-d H:i:s",$v->addtime)}}</time>
        </td>
        <td align="right"><input type="text" id="cart_{{$v->cart_id}}" class="spinnerExample"/></td>
       </tr>
       <tr>
        <th colspan="4"><strong class="orange">¥{{$v->goods_price*$v->buy_number}}</strong></th>
       </tr>
      </table>
     </div><!--dingdanlist/-->
     @endforeach
    
     <div class="height1"></div>
     <div class="gwcpiao">
     <table>
      <tr>
       <th width="10%"><a href="javascript:history.back(-1)"><span class="glyphicon glyphicon-menu-left"></span></a></th>
       <td width="50%">总计：<strong class="orange">¥69.88</strong></td>
       <td width="40%">
        <a href="javascript:void(0)" class="jiesuan">去结算</a>
      </td>
      </tr>
     </table>
    </div><!--gwcpiao/-->
    </div><!--maincont-->
    <script>
    //   $(document).on('click',".box",function(){
    //     //alert('aa');
    //     var _this=$(this);
    //     //console.log(_this);
    //     var goods_id=_this.prop('id');
    //     //console.log(goods_id);

    //   })
      $(document).on('click','.jiesuan',function(){
        //alert('ss');
        var _box=$('.box:checked');
        //console.log(_box);
        if(_box.length>0){
          //得到选择的复选框的商品id
          var goods_id="";
          _box.each(function(index){
            
            goods_id+=$(this).parents("tr").attr('goods_id')+',';
          })
          //console.log(goods_id);
          goods_id=goods_id.substr(0,goods_id.length-1);
          //console.log(goods_id);
          location.href="{{url('cart/jiesuan')}}?goods_id="+goods_id;
        }else{
          alert('至少选择一件商品');
        }
      })
     </script>
      @endsection