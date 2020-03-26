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
<form class="form-horizontal" role="form" action="{{url('/shoop/update/'.$shoop->id)}}" method='post' enctype="multipart/form-data">
    @csrf
    <div class="form-group">
        <label for="firstname" class="col-sm-2 control-label">商品名称</label>
        <div class="col-sm-8">
            <input type="text" class="form-control" id="firstname" 
                   placeholder="请输入商品名称" name='name' value="{{$shoop->name}}">
                   <b style='color:red'>{{$errors->first('name')}}</b>
        </div>
    </div>
    <div class="form-group">
        <label for="lastname" class="col-sm-2 control-label">商品货号</label>
        <div class="col-sm-8">
            <input type="text" class="form-control" id="lastname" 
                   placeholder="请输入商品货号" name='art' value="{{$shoop->art}}">

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
                   placeholder="请输入商品价格" name='price' value="{{$shoop->price}}">
                   <b style='color:red'>{{$errors->first('price')}}</b>
        </div>
    </div>
    <div class="form-group">
        <label for="lastname" class="col-sm-2 control-label">库存</label>
        <div class="col-sm-8">
            <input type="text" class="form-control" id="lastname" 
                   placeholder="请输入商品库存" name='num' value="{{$shoop->num}}">
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
             <input type="radio" value='1' name='newproduct' {{$shoop->newproduct==1?"checked":""}}>是&nbsp;&nbsp;&nbsp;&nbsp;
           <input type="radio" value='2' name='newproduct' {{$shoop->newproduct==2?"checked":""}}>否
        </div>
    </div>
    <div class="form-group">
        <label for="lastname" class="col-sm-2 control-label">是否显示</label>
        <div class="col-sm-8">
            <input type="radio" value='1' name='show' {{$shoop->show==1?"checked":""}}>是&nbsp;&nbsp;&nbsp;&nbsp;
           <input type="radio" value='2' name='show' {{$shoop->show==2?"checked":""}}>否
        </div>
    </div>
    <div class="form-group">
        <label for="lastname" class="col-sm-2 control-label">是否精品</label>
        <div class="col-sm-8">
             <input type="radio" value='1' name='goods' {{$shoop->goods==1?"checked":""}}>是&nbsp;&nbsp;&nbsp;&nbsp;
           <input type="radio" value='2' name='goods' {{$shoop->goods==2?"checked":""}}>否
        </div>
    </div>
    <div class="form-group">
        <label for="lastname" class="col-sm-2 control-label">商品详情</label>
        <div class="col-sm-8">
            <input type="text" class="form-control" id="lastname" 
                   placeholder="请输入商品详情" name='desc' value="{{$shoop->desc}}">
        </div>
    </div>
    <div class="form-group">
        <div class="col-sm-offset-2 col-sm-10">
            <button type="submit" class="btn btn-default">添加</button>
        </div>
    </div>

