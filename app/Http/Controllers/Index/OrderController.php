<?php

namespace App\Http\Controllers\Index;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Order;
use App\OrderAddress;
use App\OrderGoods;
use App\Shoop;
use App\Address;
use App\Cart;
use DB;
class OrderController extends Controller
{
    public function order(){
    	//echo 11;
    	$goods_id=request()->goods_id;
    	//echo $goods_id;
    	$address_id=request()->address_id;
    	$user_id=session('user')->id;
        // dd($user_id);
    	$money=request()->money;
    	//echo $goods_id;
    	//开启事务
    	//$order_model=new Order;
    	//1.订单信息存订单表
    	//echo $goods_id;
    	if (empty($goods_id)) {
    		echo "至少选择一件商品进行下单";exit;
    	}else{
    		$goodswhere=[
    			['id','in',$goods_id],
    			
    		];
    		//商品信息 id 名字价格图片。。
    		$goodsInfo=Shoop::where($goodswhere)->get();
           // dd($goodsInfo);

    		
    		//dd($goodsInfo);
    		// if (empty($goodsInfo[0])) {
    		// 	echo '商品信息有误';exit;
    		// }
    	}
    	//dd($goodsInfo);
    	if (empty($address_id)) {
    		echo "收货地址必填";exit;
    	}else{
    		$addresswhere=[
    			['address_id','=',$address_id]
    		];
    		$addressInfo=Address::where($addresswhere)->get();
    		//dd($addressInfo);
    		if (empty($addressInfo)) {
    			echo "此收货地址错误";die;
    		}
    	}
        //dd($addressInfo);
    	$cartwhere=[
    			['goods_id','in',$goods_id]
    	];
    	
    	//echo $buy_number;
    	$order_no=time().$user_id.rand(0000,9999);
    	$orderInfo=[
    		'order_no'=>$order_no,
    		'order_amount'=>$money,
    		'order_time'=>time(),
    		'user_id'=>$user_id
    	];
    	//dd($orderInfo);
    	$res1=Order::insert($orderInfo);
        //dd($res1);
        //$order_id=DB::table('order')->insertGetId($orderInfo);
        //dd($order_id);
        if ($res1) {
            return json_encode(['code'=>'00000','msg'=>'添加成功']);

        }
        // dd($addressInfo);
    	//dd($res1);
    	// $order_id=DB::table('order')->insertGetId($orderInfo);

    	//echo $order_id;
		//echo "ok";    
    	//2.订单收货地址信息存储到订单收货地址表


    	//3.订单商品信息存储到订单商品表
    	//4.清除购物车
    	//5.修改商品表库存
    }
}
