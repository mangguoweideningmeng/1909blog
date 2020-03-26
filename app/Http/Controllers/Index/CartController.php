<?php

namespace App\Http\Controllers\Index;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Shoop;
use App\Cart;
use App\Address;


class CartController extends Controller
{
	public function addcart(Request $request){
		$user=session('user');
		if(!$user){
			return json_encode(['code'=>'00003','msg'=>'用户未登录']);
		}
		$goods_id=$request->goods_id;
		$buy_number=$request->buy_number;
		//根据商品id查询商品信息
		$goods=Shoop::find($goods_id);
		//dd($goods);
		if($goods->num<$buy_number){
			return json_encode(['code'=>'00004','msg'=>'库存不足']);
		}
		//判断用户之前是否添加如果添加更改购买数量
		$cart=Cart::where(['user_id'=>$user->id,'goods_id'=>$goods_id])->first();
		if ($cart) {
			$buy_number=$cart->buy_number+$buy_number;
			if ($goods->num<$buy_number) {
				$buy_number=$goods->num;
			}
			//更新购买数量
			$res=Cart::where('cart_id',$cart->cart_id)->update(['buy_number'=>$buy_number]);
		}else{
				//添加到数据库
			$data=[
				'user_id'=>$user->id,
				'goods_id'=>$goods_id,
				'buy_number'=>$buy_number,
				'goods_name'=>$goods->name,
				'goods_price'=>$goods->price,
				'goods_img'=>$goods->simg,
				'addtime'=>time(),
			];
			$res=Cart::create($data);
			//dd($res);
		}
		
		if ($res) {
			return json_encode(['code'=>'00000','msg'=>'添加成功']);

		}
	}
	public function cartindex(){
		//$cart=Cart::all();
		//$user_id=1;
		$user_id=session('user')->id;
		$cart=Cart::where('user_id',$user_id)->get();
		$buy_number=array_column($cart->toArray(),'buy_number');
		$cart_id=array_column($cart->toArray(),'cart_id');
		//dd($cart);
		$count=Cart::count();
		//dd($count);
		return view('index.cart',['cart'=>$cart,'count'=>$count,'buy_number'=>$buy_number,'cart_id'=>$cart_id]);
	}
	public function jiesuan(){
		$goods_id=request()->goods_id;
		//echo $post;

		if (empty($goods_id)) {
			return redirect('/cartindex');
		}
		//根据商品id查询商品
		$user_id=session('user')->id;
		//dd($user_id);
		 // $whereIn=[
		 // 	['goods_id'=>$goods_id]]
		 // ];
		
		//dd($where);
		$id=explode(',', $goods_id);
		$goodsInfo=Cart::whereIn('goods_id',$id)->get();

		//dd($goodsInfo);
		//求总价
		// $where2=[
		// 	['goods_id','=',$goods_id],
		// 	['user_id','=',$user_id]
		// ];
		$Info=Cart::whereIn('goods_id',$id)->get();
		$money=0;
		foreach ($Info as $k => $v) {
			$money+=$v['goods_price']*$v['buy_number'];
		}
		//dd($money);
		$where3=[
			['user_id','=',$user_id],
			['is_default','=',1]
		];
		$address=Address::where($where3)->first();
		//dd($address);
		return view('index.pay',['goodsInfo'=>$goodsInfo,'money'=>$money,'address'=>$address,'goods_id'=>$goods_id]);
	}
	
    
}
