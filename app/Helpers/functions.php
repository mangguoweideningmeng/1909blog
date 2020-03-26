<?php
      //文件上传
    function upload($img){
        if (request()->file($img)->isValid()) {
            //接受文件
            $file=request()->$img;
            $store_result=$file->store('uploads');
            return $store_result;
        }
        exit('未找到文件或上传过程出错');
    }
    //多文件上传
    function Moreupload($img){
        //接受文件
        $file=request()->$img;
        //dd($file);
        foreach ($file as $k => $v) {
            if ($v->isValid()) {
               $store_result[$k]=$v->store('uploads');
            
            }else{
                $store_result[$k]="未找到文件或上传过程出错";
            }
        }
        
        return $store_result;
    }
    //无限极分类
    function CreateTree($data,$pid=0,$level=0){
        if (!$data) {
            return;
        }
        static $newArray=[];
        foreach ($data as  $v) {
            if ($v->pid==$pid) {
                $v->level=$level;
                $newArray[]=$v;

                //再次调用自己查找符合条件的孩子
                CreateTree($data,$v->cate_id,$level+1);
            }
        }
        return $newArray;
    }
?>