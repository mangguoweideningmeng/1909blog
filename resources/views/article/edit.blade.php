<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8"> 
    <title>文章编辑</title>
    <link rel="stylesheet" href="https://cdn.staticfile.org/twitter-bootstrap/3.3.7/css/bootstrap.min.css">  
    <script src="https://cdn.staticfile.org/jquery/2.1.1/jquery.min.js"></script>
    <script src="https://cdn.staticfile.org/twitter-bootstrap/3.3.7/js/bootstrap.min.js"></script>
</head>
<body>
​<center><h2>文章编辑</h2></center>
<!-- @if ($errors->any())
<div class="alert alert-danger">
<ul>
@foreach ($errors->all() as $error)
<li>{{ $error }}</li>@endforeach
</ul>
</div>
@endif -->
<form class="form-horizontal" role="form" action="{{url('/article/update/'.$article->id)}}" method='post' enctype="multipart/form-data">
    @csrf
    <div class="form-group">
        <label for="firstname" class="col-sm-2 control-label">文章标题</label>
        <div class="col-sm-8">
            <input type="text" class="form-control" id="firstname" 
                   placeholder="请输入文章标题" name='name' value="{{$article->name}}">
                   <b style='color:red'>{{$errors->first('name')}}</b>
        </div>
    </div>
    <div class="form-group">
        <label for="lastname" class="col-sm-2 control-label">文章分类</label>
        <div class="col-sm-8">
            <select name="a_id" id="">
                <option value="">请选择</option>
                @foreach($articletype as $v)
                <option value="{{$v->a_id}}">{{$v->aname}}</option>
                @endforeach
                <b style='color:red'>{{$errors->first('a_id')}}</b>
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
                   placeholder="请输入作者" name='man' value="{{$article->man}}">
                     <b style='color:red'>{{$errors->first('tel')}}</b>
        </div>
        </div>
    </div>
     <div class="form-group">
        <label for="lastname" class="col-sm-2 control-label">关键字</label>
        <div class="col-sm-8">
            <input type="text" class="form-control" id="lastname" 
                   placeholder="请输入关键字" name='keyword' value="{{$article->keyword}}">
                     <b style='color:red'>{{$errors->first('tel')}}</b>
        </div>
        </div>
    </div>
    </div>
     <div class="form-group">
        <label for="lastname" class="col-sm-2 control-label">重要性</label>
        <div class="col-sm-8">
             <input type="radio" value='1' name='zy' {{$article->zy==1?"checked":""}}>是&nbsp;&nbsp;&nbsp;&nbsp;
           <input type="radio" value='2' name='zy' {{$article->zy==2?"checked":""}}>否
        </div>
    </div>
    </div>
     <div class="form-group">
        <label for="lastname" class="col-sm-2 control-label">是否显示</label>
        <div class="col-sm-8">
             <input type="radio" value='1' name='show' {{$article->show==1?"checked":""}}>是&nbsp;&nbsp;&nbsp;&nbsp;
           <input type="radio" value='2' name='show' {{$article->show==2?"checked":""}}>否
        </div>
    </div>
     <div class="form-group">
        <label for="lastname" class="col-sm-2 control-label">网页描述</label>
        <div class="col-sm-8">
            <input type="text" class="form-control" id="lastname" 
                   placeholder="网页描述" name='desc' value="{{$article->desc}}">
                     <b style='color:red'>{{$errors->first('tel')}}</b>
        </div>
        </div>
    </div>
     <div class="form-group">
        <label for="lastname" class="col-sm-2 control-label">邮箱</label>
        <div class="col-sm-8">
            <input type="text" class="form-control" id="lastname" 
                   placeholder="请输入邮箱" name='email' value="{{$article->email}}">
                   <b style='color:red'>{{$errors->first('email')}}</b>
        </div>
    </div>
    <div class="form-group">
        <div class="col-sm-offset-2 col-sm-10">
            <button type="submit" class="btn btn-default">修改</button>
        </div>
    </div>
</form>
