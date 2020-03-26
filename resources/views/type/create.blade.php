<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8"> 
    <title>分类添加</title>
    <link rel="stylesheet" href="https://cdn.staticfile.org/twitter-bootstrap/3.3.7/css/bootstrap.min.css">  
    <script src="https://cdn.staticfile.org/jquery/2.1.1/jquery.min.js"></script>
    <script src="https://cdn.staticfile.org/twitter-bootstrap/3.3.7/js/bootstrap.min.js"></script>
</head>
<body>
​<center><h2>分类添加</h2></center>
<form class="form-horizontal" role="form" action="{{url('/type/store')}}" method='post' enctype="multipart/form-data">
    @csrf
    <div class="form-group">
        <label for="firstname" class="col-sm-2 control-label">分类名字</label>
        <div class="col-sm-8">
            <input type="text" class="form-control" id="firstname" 
                   placeholder="请输入分类名字" name='name'>
            <b style='color:red'></b>
        </div>
    </div>
    <div class="form-group">
        <label for="lastname" class="col-sm-2 control-label">分类描述</label>
        <div class="col-sm-8">
            <input type="text" class="form-control" id="lastname" 
                   placeholder="请输入描述" name='desc'>
        </div>
    </div>
    <div class="form-group">
        <label for="lastname" class="col-sm-2 control-label">父级分类</label>
        <div class="col-sm-8">
            <input type="text" class="form-control" id="lastname" 
                   placeholder="请输入父级分类" name='pid'>
        </div>
    </div>
    <div class="form-group">
        <label for="lastname" class="col-sm-2 control-label">是否在导航显示</label>
        <div class="col-sm-8">
           <input type="radio" value='1' name='show'>是&nbsp;&nbsp;&nbsp;&nbsp;
           <input type="radio" value='2' name='show'>否
        </div>
    </div>
    
    <div class="form-group">
        <div class="col-sm-offset-2 col-sm-10">
            <button type="button" class="btn btn-default">添加</button>
        </div>
    </div>
    <script>
        $('input[name="name"]').blur(function(){
            $(this).next().empty();
            var name=$(this).val();
            //alert(name);
            var reg=/^[\u4e00-\u9fa5\w-.]{2,50}$/;
            if(!reg.test(name)){
                $(this).next().text('分类由中文字母数字下划线,-或.组成长度2-50')
                return;
            }
            var obj=$(this);
            //唯一性验证
            $.ajax({
                url:"/type/checkOnly",
                data:{name:name},
                async:true,
                dataType:'json',
                success:function(reault){
                    //alert(reault);
                    if(reault.count>0){
                        obj.next().text('分类存在');
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
                $('input[name="name"]').next().text('分类由中文字母数字下划线,-或.组成长度2-50')
                return;
            }

            //唯一性验证
            $.ajax({
                url:"/type/checkOnly",
                data:{name:name},
                async:false,

                dataType:'json',
                success:function(reault){
                    //alert(reault);
                    if(reault.count>0){
                        //alert(456);
                        $('input[name="name"]').next().text('分类名称存在');
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
