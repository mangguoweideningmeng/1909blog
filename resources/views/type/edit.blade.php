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
​<center><h2>分类修改</h2></center>
<form class="form-horizontal" role="form" action="{{url('/type/update/'.$type->id)}}" method='post' enctype="multipart/form-data">
    @csrf
    <div class="form-group">
        <label for="firstname" class="col-sm-2 control-label">分类名字</label>
        <div class="col-sm-8">
            <input type="text" class="form-control" id="firstname" 
                   placeholder="请输入分类名字" name='name' value="{{$type->name}}">
        </div>
    </div>
    <div class="form-group">
        <label for="lastname" class="col-sm-2 control-label">分类描述</label>
        <div class="col-sm-8">
            <input type="text" class="form-control" id="lastname" 
                   placeholder="请输入描述" name='desc' value="{{$type->desc}}">
        </div>
    </div>
    <div class="form-group">
        <label for="lastname" class="col-sm-2 control-label">父级分类</label>
        <div class="col-sm-8">
            <input type="text" class="form-control" id="lastname" 
                   placeholder="请输入父级分类" name='pid' value="{{$type->pid}}">
        </div>
    </div>
    <div class="form-group">
        <label for="lastname" class="col-sm-2 control-label">是否在导航显示</label>
        <div class="col-sm-8">
           <input type="radio" value='1' name='show' {{$type->show==1?"checked":""}}>是&nbsp;&nbsp;&nbsp;&nbsp;
           <input type="radio" value='2' name='show' {{$type->show==2?"checked":""}}>否
        </div>
    </div>
    
    <div class="form-group">
        <div class="col-sm-offset-2 col-sm-10">
            <button type="submit" class="btn btn-default">修改</button>
        </div>
    </div>

