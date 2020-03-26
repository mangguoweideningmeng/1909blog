<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8"> 
    <title>文章添加</title>
    <link rel="stylesheet" href="https://cdn.staticfile.org/twitter-bootstrap/3.3.7/css/bootstrap.min.css">  
    <script src="https://cdn.staticfile.org/jquery/2.1.1/jquery.min.js"></script>
    <script src="https://cdn.staticfile.org/twitter-bootstrap/3.3.7/js/bootstrap.min.js"></script>
</head>
<body>
​<center><h2>文章添加</h2></center>
<!-- @if ($errors->any())
<div class="alert alert-danger">
<ul>
@foreach ($errors->all() as $error)
<li>{{ $error }}</li>@endforeach
</ul>
</div>
@endif -->
<form class="form-horizontal" role="form" action="{{url('/article/store')}}" method='post' enctype="multipart/form-data">
    @csrf
    <div class="form-group">
        <label for="firstname" class="col-sm-2 control-label">文章标题</label>
        <div class="col-sm-8">
            <input type="text" class="form-control" id="firstname" 
                   placeholder="请输入文章标题" name='name'>
                   <b style='color:red'>{{$errors->first('name')}}</b>
        </div>
    </div>
    <div class="form-group">
        <label for="lastname" class="col-sm-2 control-label">文章分类</label>
        <div class="col-sm-8">
            <select name="a_id" id="">
                <option value="">请选择</option>
                @foreach($article as $v)
                <option value="{{$v->a_id}}">{{$v->aname}}</option>
                @endforeach
            </select>
        </div>
    </div>
    <div class="form-group">
        <label for="lastname" class="col-sm-2 control-label">图片</label>
        <div class="col-sm-8">
            <input type="file" class="form-control" id="lastname" 
                   placeholder="请输入品牌logo" name='simg'>
        </div>
    </div>
    <div class="form-group">
        <label for="lastname" class="col-sm-2 control-label">作者</label>
        <div class="col-sm-8">
            <input type="text" class="form-control" id="lastname" 
                   placeholder="请输入作者" name='man'>
                     <b style='color:red'>{{$errors->first('tel')}}</b>
        </div>
        </div>
    </div>
     <div class="form-group">
        <label for="lastname" class="col-sm-2 control-label">关键字</label>
        <div class="col-sm-8">
            <input type="text" class="form-control" id="lastname" 
                   placeholder="请输入关键字" name='keyword'>
                     <b style='color:red'>{{$errors->first('tel')}}</b>
        </div>
        </div>
    </div>
    </div>
     <div class="form-group">
        <label for="lastname" class="col-sm-2 control-label">重要性</label>
        <div class="col-sm-8">
             <input type="radio" value='1' name='zy'>是&nbsp;&nbsp;&nbsp;&nbsp;
           <input type="radio" value='2' name='zy'>否
        </div>
    </div>
    </div>
     <div class="form-group">
        <label for="lastname" class="col-sm-2 control-label">是否显示</label>
        <div class="col-sm-8">
             <input type="radio" value='1' name='show'>是&nbsp;&nbsp;&nbsp;&nbsp;
           <input type="radio" value='2' name='show'>否
        </div>
    </div>
     <div class="form-group">
        <label for="lastname" class="col-sm-2 control-label">网页描述</label>
        <div class="col-sm-8">
            <input type="text" class="form-control" id="lastname" 
                   placeholder="网页描述" name='desc'>
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
            $(this).next().text('文章标题由中文字母数字下划线,-或.组成长度2-50')
            return;
        }
        var obj=$(this);
        //唯一性验证
        $.ajax({
            url:"/article/checkOnly",
            data:{name:name},
            async:true,
            dataType:'json',
            success:function(reault){
                //alert(reault);
                if(reault.count>0){
                    obj.next().text('文章存在');
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
            $('input[name="name"]').next().text('品文章标题由中文字母数字下划线,-或.组成长度2-50')
            return;
        }

        //唯一性验证
        $.ajax({
            url:"/article/checkOnly",
            data:{name:name},
            async:false,

            dataType:'json',
            success:function(reault){
                //alert(reault);
                if(reault.count>0){
                    //alert(456);
                    $('input[name="name"]').next().text('文章名称存在');
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
