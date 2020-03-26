<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8"> 
    <title>品牌添加</title>
    <link rel="stylesheet" href="https://cdn.staticfile.org/twitter-bootstrap/3.3.7/css/bootstrap.min.css">  
    <script src="https://cdn.staticfile.org/jquery/2.1.1/jquery.min.js"></script>
    <script src="https://cdn.staticfile.org/twitter-bootstrap/3.3.7/js/bootstrap.min.js"></script>
</head>
<body>
​<center><h2>商品品牌添加</h2></center>
<!-- @if ($errors->any())
<div class="alert alert-danger">
<ul>
@foreach ($errors->all() as $error)
<li>{{ $error }}</li>@endforeach
</ul>
</div>
@endif -->
<form class="form-horizontal" role="form" action="{{url('/brand/store')}}" method='post' enctype="multipart/form-data">
    @csrf
    <div class="form-group">
        <label for="firstname" class="col-sm-2 control-label">品牌名字</label>
        <div class="col-sm-8">
            <input type="text" class="form-control" id="firstname" 
                   placeholder="请输入品牌名字" name='brand_name'>
                   <b style='color:red'>{{$errors->first('brand_name')}}</b>
        </div>
    </div>
    <div class="form-group">
        <label for="lastname" class="col-sm-2 control-label">品牌网址</label>
        <div class="col-sm-8">
            <input type="text" class="form-control" id="lastname" 
                   placeholder="请输入品牌网址" name='brand_url'>
                   <b style='color:red'>{{$errors->first('brand_url')}}</b>
        </div>
    </div>
    <div class="form-group">
        <label for="lastname" class="col-sm-2 control-label">品牌logo</label>
        <div class="col-sm-8">
            <input type="file" class="form-control" id="lastname" 
                   placeholder="请输入品牌logo" name='brand_logo'>
        </div>
    </div>
    <div class="form-group">
        <label for="lastname" class="col-sm-2 control-label">品牌介绍</label>
        <div class="col-sm-8">
            <textarea type="text" class="form-control" id="lastname" 
                   name='brand_desc'>
               </textarea>
        </div>
    </div>
    <div class="form-group">
        <div class="col-sm-offset-2 col-sm-10">
            <button type="button" class="btn btn-default">添加</button>
        </div>
    </div>


    <script>
        $('input[name="brand_name"]').blur(function(){
            $(this).next().empty();
            var name=$(this).val();
            //alert(name);
            var reg=/^[\u4e00-\u9fa5\w-.]{2,50}$/;
            if(!reg.test(name)){
                $(this).next().text('品牌名称由中文字母数字下划线,-或.组成长度2-50')
                return;
            }
            var obj=$(this);
            //唯一性验证
            $.ajax({
                url:"/brand/checkOnly",
                data:{name:name},
                async:true,
                dataType:'json',
                success:function(reault){
                    //alert(reault);
                    if(reault.count>0){
                        obj.next().text('品牌名称存在');
                    }
                }
            });
        })

        $('button').click(function(){
            var nameflag=true;
            var name=$('input[name="brand_name"]').val();
            //alert(name);
            var reg=/^[\u4e00-\u9fa5\w-.]{2,50}$/;
            if(!reg.test(name)){
                $('input[name="brand_name"]').next().text('品牌名称由中文字母数字下划线,-或.组成长度2-50')
                return;
            }

            //唯一性验证
            $.ajax({
                url:"/brand/checkOnly",
                data:{name:name},
                async:false,

                dataType:'json',
                success:function(reault){
                    //alert(reault);
                    if(reault.count>0){
                        //alert(456);
                        $('input[name="brand_name"]').next().text('品牌名称存在');
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