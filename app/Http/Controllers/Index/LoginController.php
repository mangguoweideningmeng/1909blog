<?php

namespace App\Http\Controllers\Index;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
//短信
use AlibabaCloud\Client\AlibabaCloud;
use AlibabaCloud\Client\Exception\ClientException;
use AlibabaCloud\Client\Exception\ServerException;
use App\Users;
use Illuminate\Support\Facades\Cookie;
//邮箱
use App\Mail\SendCode;
use Illuminate\Support\Facades\Mail;

class LoginController extends Controller
{
    public function log(){
    	return view('index.login');
    }
    public function reg(){
    	return view('index.reg');
    }
    public function sendSMS(){
    	$name=request()->name;

    	//dd($name);
    	$reg='/^1[3|5|6|7|8|9]\d{9}$/';
    	
    	if(!preg_match($reg, $name)){
    		return json_encode(['code'=>'00001','msg'=>'请输入正确手机号或邮箱']);
    	}
    	$code=rand(100000,999999);

    	$result=$this->send($name,$code);
    	//发送成功
    	if ($result['Message']=='OK') {
    		session(['code'=>$code]);
    		return json_encode(['code'=>'00000','msg'=>'发送成功']);
    	}
    	//发送失败
    	return json_encode(['code'=>'00000','msg'=>$result['Message']]);
    }
    public function send($name,$code){


// Download：https://github.com/aliyun/openapi-sdk-php
// Usage：https://github.com/aliyun/openapi-sdk-php/blob/master/README.md

						AlibabaCloud::accessKeyClient('LTAI4Foy8CWaHNSt5sJSxgCs', '5Ss8HSWr803EKV11VpQxYHOr79h4Hq')
                        	->regionId('cn-hangzhou')
                        	->asDefaultClient();

						try {
						    $result = AlibabaCloud::rpc()
						                          ->product('Dysmsapi')
						                          // ->scheme('https') // https | http
						                          ->version('2017-05-25')
						                          ->action('SendSms')
						                          ->method('POST')
						                          ->host('dysmsapi.aliyuncs.com')
						                          ->options([
						                                        'query' => [
						                                          'RegionId' => "cn-hangzhou",
						                                          'PhoneNumbers' =>$name,
						                                          'SignName' => "猪猪男孩的爱",
						                                          'TemplateCode' => "SMS_183266645",
						                                          'TemplateParam' => "{code:$code}",
						                                        ],
						                                    ])
						                          ->request();
						    return $result->toArray();
						} catch (ClientException $e) {
						    return $e->getErrorMessage() . PHP_EOL;
						} catch (ServerException $e) {
						    return $e->getErrorMessage() . PHP_EOL;
						}

    }
  	public function zc(){
  		//echo 123;
  		$post=request()->except('_token');
  		//dd($post);
  		if (empty($post['password'])) {
  			echo '<script>alert("密码不能为空");window.location.href="/reg";</script>';die;
  		}
  		if ($post['password']!=$post['repassword']) {
  			echo '<script>alert("密码不一致");window.location.href="/reg";</script>';die;
  		}
  		$where=[
  			['name','=',$post['name']],
  		];
  		$count=Users::where($where)->count();
  		//dd($count);
  		if ($count>0) {
  			echo '<script>alert("用户已存在");window.location.href="/reg";</script>';die;
  		}
  		$res=Users::insert($post);
  		//dd($res);
  		session(['name'=>$res['name']]);
  		return redirect('/log');
  	}
  	public function dl(){
      		$post=request()->except('_token');
      		//dd($post);
      		$where=[
      			['name','=',$post['name']],
      			['password','=',$post['password']]

      		];
      		$user=Users::where($where)->first();
      	   if ($user==false) {
             return redirect('/log')->with('msg','用户名密码错误');
           }
           session(['user'=>$user]);
           if ($post['refer']) {
             return redirect($post['refer']);
           }
      	   return redirect('/');
  	}
    public function sendEmail(){
          $name=request()->name;

          //dd($name);
          //验证邮箱
          $reg='/^([a-zA-Z]|[0-9])(\w|\-)+@[a-zA-Z0-9]+\.([a-zA-Z]{2,4})$/';
          //dd(preg_match($reg, $name));
          if(!preg_match($reg, $name)){
            return json_encode(['code'=>'00001','msg'=>'请输入正确手机号或邮箱']);
          }
          //生成随机验证码
          $code=rand(100000,999999);
          //发送邮件
          Mail::to($name)->send(new SendCode($code));
          session(['code'=>$code]);
          return json_encode(['code'=>'00000','msg'=>'发送成功']);
    }
    // public function addcookie(){
    //   //return response('欢迎来到1909')->cookie( 'name', 'zhangsan',1);
    //   //Cookie::queue(Cookie::make('num', 'value',1));
    //   Cookie::queue('name', 'value',1);
    // }
    // public function getcookie(){
    //   echo request()->cookie('name');
    // }
}
