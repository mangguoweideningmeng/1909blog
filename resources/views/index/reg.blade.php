@extends('layouts.shop')
@section('title', '注册')
@section('content')
    <div class="maincont">
        <header>
            <a href="javascript:history.back(-1)" class="back-off fl"><span class="glyphicon glyphicon-menu-left"></span></a>
            <div class="head-mid">
                <h1>会员注册</h1>
            </div>
        </header>
        <div class="head-top">
            <img src="/static/index/images/head.jpg" />
        </div><!--head-top/-->
        <form action="{{url('/log/zc')}}" method="get" class="reg-login">
            @csrf
            <h3>已经有账号了？点此<a class="orange" href="{{url('/log')}}">登陆</a></h3>
            <div class="lrBox">
                <div class="lrList"><input type="text" name='name' placeholder="输入手机号码或者邮箱号" /></div>
                <div class="lrList2"><input type="text" name='code' placeholder="输入短信验证码" /> <button type='button'>获取验证码</button></div>
                <div class="lrList"><input type="password" name='password' placeholder="设置新密码（6-18位数字或字母）" /></div>
                <div class="lrList"><input type="password" name='repassword' placeholder="再次输入密码" /></div>
            </div><!--lrBox/-->
            <div class="lrSub">
                <input type="submit" value="立即注册" />
            </div>
        </form><!--reg-login/-->
        <div class="height1"></div>
        <div class="footNav">
            <dl>
                <a href="index.html">
                    <dt><span class="glyphicon glyphicon-home"></span></dt>
                    <dd>微店</dd>
                </a>
            </dl>
            <dl>
                <a href="prolist.html">
                    <dt><span class="glyphicon glyphicon-th"></span></dt>
                    <dd>所有商品</dd>
                </a>
            </dl>
            <dl>
                <a href="car.html">
                    <dt><span class="glyphicon glyphicon-shopping-cart"></span></dt>
                    <dd>购物车 </dd>
                </a>
            </dl>
            <dl>
                <a href="user.html">
                    <dt><span class="glyphicon glyphicon-user"></span></dt>
                    <dd>我的</dd>
                </a>
            </dl>
            <div class="clearfix"></div>
        </div><!--footNav/-->
    </div><!--maincont-->
    <!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
    <script src="/static/index/js/jquery.min.js"></script>
    <!-- Include all compiled plugins (below), or include individual files as needed -->
    <script src="/static/index/js/bootstrap.min.js"></script>
    <script src="/static/index/js/style.js"></script>
    </body>
    </html>
    @include('index.public.footer');
    <script>
        $('button').click(function(){
            //alert(123);
            var name=$('input[name="name"]').val();
            var mobilereg=/^1[3|5|6|7|8|9]\d{9}$/;
            if(mobilereg.test(name)){
                //发送手机验证码
                $.get('/reg/sendSMS',{name:name},function(result){
                    //alert(result)
                    if (result.code=='00001') {
                        alert(result.msg);
                    }
                    if (result.code=='00000') {
                        alert(result.msg);
                    }

                },'json')

                return;
            }
            var emailreg=/^([a-zA-Z]|[0-9])(\w|\-)+@[a-zA-Z0-9]+\.([a-zA-Z]{2,4})$/;
            if(emailreg.test(name)){
               // alert(1223);
                //发送邮箱验证码
                $.get('/reg/sendEmail',{name:name},function(result){
                    alert(result);
                    // if (result.code=='00001') {
                    //     alert(result.msg);
                    // }
                    // if (result.code=='00000') {
                    //     alert(result.msg);
                    // }

                },'json')

                return;
            }

            alert('请输入正确手机号或邮箱');
            return;
        });
    </script>
@endsection