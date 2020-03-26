<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8"> 
    <title>管理员编辑</title>
    <link rel="stylesheet" href="https://cdn.staticfile.org/twitter-bootstrap/3.3.7/css/bootstrap.min.css">  
    <script src="https://cdn.staticfile.org/jquery/2.1.1/jquery.min.js"></script>
    <script src="https://cdn.staticfile.org/twitter-bootstrap/3.3.7/js/bootstrap.min.js"></script>
</head>
<body>
​<center><h2>管理员编辑</h2></center>
<!-- @if ($errors->any())
<div class="alert alert-danger">
<ul>
@foreach ($errors->all() as $error)
<li>{{ $error }}</li>@endforeach
</ul>
</div>
@endif -->
<form class="form-horizontal" role="form" action="{{url('/admin/update/'.$admin->id)}}" method='post' enctype="multipart/form-data">
    @csrf
    <div class="form-group">
        <label for="firstname" class="col-sm-2 control-label">管理员名称</label>
        <div class="col-sm-8">
            <input type="text" class="form-control" id="firstname" 
                   placeholder="请输入品牌名字" name='name' value="{{$admin->name}}">
                   <b style='color:red'>{{$errors->first('name')}}</b>
        </div>
    </div>
    <div class="form-group">
        <label for="lastname" class="col-sm-2 control-label">密码</label>
        <div class="col-sm-8">
            <input type="text" class="form-control" id="lastname" 
                   placeholder="请输入品牌网址" name='pwd' value="{{$admin->pwd}}">
                   <b style='color:red'>{{$errors->first('pwd')}}</b>
        </div>
    </div>
    <div class="form-group">
        <label for="lastname" class="col-sm-2 control-label">头像</label>
        <div class="col-sm-8">
            <img src="{{env('UPLOADS_URL')}}{{$admin->simg}}" height='40'  width='40' alt="">
            <input type="file" class="form-control" id="lastname" 
                   placeholder="请输入品牌logo" name='simg'>
        </div>
    </div>
    <div class="form-group">
        <label for="lastname" class="col-sm-2 control-label">手机号</label>
        <div class="col-sm-8">
            <input type="text" class="form-control" id="lastname" 
                   placeholder="请输入手机号" name='tel' value="{{$admin->tel}}">
        </div>
    </div>
     <div class="form-group">
        <label for="lastname" class="col-sm-2 control-label">邮箱</label>
        <div class="col-sm-8">
            <input type="text" class="form-control" id="lastname" 
                   placeholder="请输入邮箱" name='email' value="{{$admin->email}}">
                   <b style='color:red'>{{$errors->first('email')}}</b>
        </div>
    </div>
    <div class="form-group">
        <div class="col-sm-offset-2 col-sm-10">
            <button type="submit" class="btn btn-default">修改</button>
        </div>
    </div>

