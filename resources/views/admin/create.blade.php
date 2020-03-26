<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8"> 
    <title>管理员添加</title>
    <link rel="stylesheet" href="https://cdn.staticfile.org/twitter-bootstrap/3.3.7/css/bootstrap.min.css">  
    <script src="https://cdn.staticfile.org/jquery/2.1.1/jquery.min.js"></script>
    <script src="https://cdn.staticfile.org/twitter-bootstrap/3.3.7/js/bootstrap.min.js"></script>
</head>
<body>
​<center><h2>管理员添加</h2></center>
<!-- @if ($errors->any())
<div class="alert alert-danger">
<ul>
@foreach ($errors->all() as $error)
<li>{{ $error }}</li>@endforeach
</ul>
</div>
@endif -->
<form class="form-horizontal" role="form" action="{{url('/admin/store')}}" method='post' enctype="multipart/form-data">
    @csrf
    <div class="form-group">
        <label for="firstname" class="col-sm-2 control-label">管理员名称</label>
        <div class="col-sm-8">
            <input type="text" class="form-control" id="firstname" 
                   placeholder="请输入品牌名字" name='name'>
                   <b style='color:red'>{{$errors->first('name')}}</b>
        </div>
    </div>
    <div class="form-group">
        <label for="lastname" class="col-sm-2 control-label">密码</label>
        <div class="col-sm-8">
            <input type="password" class="form-control" id="lastname" 
                   placeholder="请输入品牌网址" name='pwd'>
                   <b style='color:red'>{{$errors->first('pwd')}}</b>
        </div>
    </div>
    <div class="form-group">
        <label for="lastname" class="col-sm-2 control-label">头像</label>
        <div class="col-sm-8">
            <input type="file" class="form-control" id="lastname" 
                   placeholder="请输入品牌logo" name='simg'>
        </div>
    </div>
    <div class="form-group">
        <label for="lastname" class="col-sm-2 control-label">手机号</label>
        <div class="col-sm-8">
            <input type="text" class="form-control" id="lastname" 
                   placeholder="请输入手机号" name='tel'>
                     <b style='color:red'>{{$errors->first('tel')}}</b>
        </div>
        </div>
    </div>
     <div class="form-group">
        <label for="lastname" class="col-sm-2 control-label">邮箱</label>
        <div class="col-sm-8">
            <input type="text" class="form-control" id="lastname" 
                   placeholder="请输入邮箱" name='email'>
                   <b style='color:red'>{{$errors->first('email')}}</b>
        </div>
    </div>
    <div class="form-group">
        <div class="col-sm-offset-2 col-sm-10">
            <button type="button" class="btn btn-default">添加</button>
        </div>
    </div>
</form>
<script>
    $('input[name="name"]').blur(function(){
        $(this).next().empty();
        var name=$(this).val();
        //alert(name);
        var reg=/^[\u4e00-\u9fa5\w-.]{2,50}$/;
        if(!reg.test(name)){
            $(this).next().text('管理员名称由中文字母数字下划线,-或.组成长度2-50')
            return;
        }
        var obj=$(this);
        //唯一性验证
        $.ajax({
            url:"/admin/checkOnly",
            data:{name:name},
            async:true,
            dataType:'json',
            success:function(reault){
                //alert(reault);
                if(reault.count>0){
                    obj.next().text('管理员存在');
                }
            }
        });
    })

    $('button').click(function(){
        var nameflag=true;
        var name=$('input[name="name"]').val();
        //alert(name);
        var reg=/^[\u4e00-\u9fa5\w-.]{2,50}$/;
        if(!reg.test(name)){
            $('input[name="name"]').next().text('管理员名称由中文字母数字下划线,-或.组成长度2-50')
            return;
        }

        //唯一性验证
        $.ajax({
            url:"/admin/checkOnly",
            data:{name:name},
            async:false,

            dataType:'json',
            success:function(reault){
                //alert(reault);
                if(reault.count>0){
                    //alert(456);
                    $('input[name="name"]').next().text('管理员存在');
                    nameflag=false;
                }
            }
        });
        if(!nameflag){
            return;
        }
        //alert(123);
        $('form').submit();
    });
</script>
</body>
</html>
    
