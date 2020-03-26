<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8"> 
    <title>品牌修改</title>
    <link rel="stylesheet" href="https://cdn.staticfile.org/twitter-bootstrap/3.3.7/css/bootstrap.min.css">  
    <script src="https://cdn.staticfile.org/jquery/2.1.1/jquery.min.js"></script>
    <script src="https://cdn.staticfile.org/twitter-bootstrap/3.3.7/js/bootstrap.min.js"></script>
</head>
<body>
​<center><h2>商品品牌编辑</h2></center>
<form class="form-horizontal" role="form" action="{{url('/brand/update/'.$brand->brand_id)}}" enctype="multipart/form-data" method='post'>
    @csrf
    <div class="form-group">
        <label for="firstname" class="col-sm-2 control-label">品牌名字</label>
        <div class="col-sm-8">
            <input type="text" class="form-control" id="firstname" 
                   placeholder="请输入品牌名字" name='brand_name' value="{{$brand->brand_name}}">
        </div>
    </div>
    <div class="form-group">
        <label for="lastname" class="col-sm-2 control-label">品牌网址</label>
        <div class="col-sm-8">
            <input type="text" class="form-control" id="lastname" 
                   placeholder="请输入品牌网址" name='brand_url' value="{{$brand->brand_url}}">
        </div>
    </div>
    <div class="form-group">
        <label for="lastname" class="col-sm-2 control-label">品牌logo</label>
        <div class="col-sm-8">
            <img src="{{env('UPLOADS_URL')}}{{$brand->brand_logo}}" height='40'  width='40' alt="">
            <input type="file" class="form-control" id="lastname" 
                   placeholder="请输入品牌logo" name='brand_logo' >
        </div>
    </div>
    <div class="form-group">
        <label for="lastname" class="col-sm-2 control-label">品牌介绍</label>
        <div class="col-sm-8">
            <textarea type="text" class="form-control" id="lastname" 
                   name='brand_desc'>{{$brand->brand_desc}}
               </textarea>
        </div>
    </div>
    <div class="form-group">
        <div class="col-sm-offset-2 col-sm-10">
            <button type="submit" class="btn btn-default">修改</button>
        </div>
    </div>

