<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8"> 
    <title>商品管理添加</title>
    <link rel="stylesheet" href="https://cdn.staticfile.org/twitter-bootstrap/3.3.7/css/bootstrap.min.css">  
    <script src="https://cdn.staticfile.org/jquery/2.1.1/jquery.min.js"></script>
    <script src="https://cdn.staticfile.org/twitter-bootstrap/3.3.7/js/bootstrap.min.js"></script>
</head>
<body>
​<center><h2>商品管理添加</h2></center>
<form class="form-horizontal" role="form" action="{{url('/shoop/store')}}" method='post' enctype="multipart/form-data">
    @csrf
    <div class="form-group">
        <label for="firstname" class="col-sm-2 control-label">商品名称</label>
        <div class="col-sm-8">
            <input type="text" class="form-control" id="firstname" 
                   placeholder="请输入商品名称" name='name'>
                   <b style='color:red'>{{$errors->first('name')}}</b>
        </div>
    </div>
    <div class="form-group">
        <label for="lastname" class="col-sm-2 control-label">商品货号</label>
        <div class="col-sm-8">
            <input type="text" class="form-control" id="lastname" 
                   placeholder="请输入商品货号" name='art'>

        </div>
    </div>
    <div class="form-group">
        <label for="lastname" class="col-sm-2 control-label">商品分类</label>
        <div class="col-sm-8">
            <select name="cate_id" id="">
                <option value="">请选择</option>
                @foreach($cate as $v)
                <option value="{{$v->cate_id}}">{{str_repeat("__",$v->level*3)}}{{$v->cate_name}}</option>
                @endforeach
                
            </select>
         
        </div> 
    </div>
    <div class="form-group">
        <label for="lastname" class="col-sm-2 control-label">商品品牌</label>
        <div class="col-sm-8">
            <select name="brand_id" id="">
                <option value="">请选择</option>
                @foreach ($brand as $v)
                <option value="{{$v->brnad_id}}">{{$v->brand_name}}</option>
                @endforeach
            </select>
         
        </div>
    </div>
    <div class="form-group">
        <label for="lastname" class="col-sm-2 control-label">价格</label>
        <div class="col-sm-8">
            <input type="text" class="form-control" id="lastname" 
                   placeholder="请输入商品价格" name='price'>
                   <b style='color:red'>{{$errors->first('price')}}</b>
        </div>
    </div>
    <div class="form-group">
        <label for="lastname" class="col-sm-2 control-label">库存</label>
        <div class="col-sm-8">
            <input type="text" class="form-control" id="lastname" 
                   placeholder="请输入商品库存" name='num'>
                   <b style='color:red'>{{$errors->first('num')}}</b>
        </div>
    </div>

    <div class="form-group">
        <label for="lastname" class="col-sm-2 control-label">商品图片</label>
        <div class="col-sm-8">
            <input type="file" class="form-control" id="lastname"  name='simg'>
        </div>
    </div>
    <div class="form-group">
        <label for="lastname" class="col-sm-2 control-label">商品相册</label>
        <div class="col-sm-8">
            <input type="file" class="form-control" id="lastname"  name="simgs[]" multiple='multiple'>
        </div>
    </div>
    <div class="form-group">
        <label for="lastname" class="col-sm-2 control-label">是否新品</label>
        <div class="col-sm-8">
             <input type="radio" value='1' name='newproduct'>是&nbsp;&nbsp;&nbsp;&nbsp;
           <input type="radio" value='2' name='newproduct'>否
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
        <label for="lastname" class="col-sm-2 control-label">是否精品</label>
        <div class="col-sm-8">
             <input type="radio" value='1' name='goods'>是&nbsp;&nbsp;&nbsp;&nbsp;
           <input type="radio" value='2' name='goods'>否
        </div>
    </div>
    <div class="form-group">
        <label for="lastname" class="col-sm-2 control-label">商品详情</label>
        <div class="col-sm-8">
            <input type="text" class="form-control" id="lastname" 
                   placeholder="请输入商品详情" name='desc'>
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
                $(this).next().text('商品由中文字母数字下划线,-或.组成长度2-50')
                return;
            }
            var obj=$(this);
            //唯一性验证
            $.ajax({
                url:"/shoop/checkOnly",
                data:{name:name},
                async:true,
                dataType:'json',
                success:function(reault){
                    //alert(reault);
                    if(reault.count>0){
                        obj.next().text('商品存在');
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
                $('input[name="name"]').next().text('商品由中文字母数字下划线,-或.组成长度2-50')
                return;
            }

            //唯一性验证
            $.ajax({
                url:"/shoop/checkOnly",
                data:{name:name},
                async:false,

                dataType:'json',
                success:function(reault){
                    //alert(reault);
                    if(reault.count>0){
                        //alert(456);
                        $('input[name="name"]').next().text('商品名称存在');
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
