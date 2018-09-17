<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\App;
use Illuminate\Support\Facades\DB;


class Schedule extends Model{
  //指定表名
  protected $table='schedule';

  protected $fillable=['path','content'];

  //指定主键
  protected $primarykey='id';

  public $timestamps=true;

  /* 根据当前节点id，获取当前节点的孩子数（for循环总次数）  */
  public static function getChildrenCount($currentId){
    $currentPathArr=DB::select("select path from schedule where id=".$currentId);
    $currentPath=$currentPathArr[0]->path;
    $childrenNcount=substr_count($currentPath,'n')+1;
    $childrenArr=DB::select("select * from schedule where path like '".$currentPath."%' and length(path)-length(replace(path,'n',''))=".$childrenNcount);
    return count($childrenArr);
  }

  /* 根据当前的节点id，获取孩子节点id，反馈数组  */
  public static function getChildrenIdsArr($currentId){
    $currentPathArr=DB::select("select path from schedule where id=".$currentId);
    $currentPath=$currentPathArr[0]->path;
    $childrenNcount=substr_count($currentPath,'n')+1;
    $childrenIdsArr=DB::select("select * from schedule where path like '".$currentPath."%' and length(path)-length(replace(path,'n',''))=".$childrenNcount);
    $gotChildrenIdsArr=array();
    for($i=0;$i<count($childrenIdsArr);$i++){
      $gotChildrenIdsArr[]=$childrenIdsArr[$i]->id;
    }
    return $gotChildrenIdsArr;
  }


  /* 根据当前节点id，获取当前节点的跨度  */
  public static function getCurrentRowspan($currentId){
    $currentPathArr=DB::select("select path from schedule where id=".$currentId);
    $currentPath=$currentPathArr[0]->path;
    $subjectPathArr=DB::select("select * from schedule where path like '".$currentPath."%' and length(path)-length(replace(path,'n',''))=4");
    $currentRowspan=0;
    for($i=0;$i<count($subjectPathArr);$i++){
      $tmpPath=$subjectPathArr[$i]->path;
      $tmpSubjectpathArr=DB::select("select * from schedule where path like '".$tmpPath."%' and length(path)-length(replace(path,'n',''))=5");
      if(count($tmpSubjectpathArr)==0){
        $currentRowspan++;
      }else{
        $currentRowspan+=count($tmpSubjectpathArr);
      }
    }
    return $currentRowspan;
  }

  /* 根据当前节点id，获取当前节点的内容  */
  public static function getCurrentContent($currentId,$flag=''){
    $currentContentArr=DB::select("select content from schedule where id='".$currentId."'");
    $currentContent=$currentContentArr[0]->content;
    return $currentContent;
  }

  /* 根据id获取所有副节点中文路径，拼装成中文字符串  */
  public static function getChPath($currentId){
    $currentPathArr=DB::select("select * from schedule where id='".$currentId."'");
    $currentPath=$currentPathArr[0]->path;
    $countentsArr=DB::select("select * from schedule as c where '".$currentPath."%' like concat(c.path,'%')");
    $tmpStr='';
    for($i=0;$i<count($countentsArr);$i++){
      if($tmpStr==''){
        $tmpStr=$countentsArr[$i]->content;
      }else{
        if(substr_count($countentsArr[$i]->path,'n')==5){
          $persion=People::find($countentsArr[$i]->content);
          $tmpStr=$tmpStr.'=>'.$persion->userName;
        }else{
          $tmpStr=$tmpStr.'=>'.$countentsArr[$i]->content;
        }
      }
    }
    return $tmpStr;
  }


  /* 根据id获取学生学好获取教师的名字，返回数组（名字，card）  */
  public static function getCurrentNameAndCard($currentId){
    $person=People::where('id','=',$currentId)->first();
    $contentArr=array();
    $contentArr[]=$person['userName'];
    $contentArr[]=$person['userCard'];
    return $contentArr;
  }


  /* 根据id和星期几，获取该老师id下的星期几的所有学生，封装成一个字符串  */
/*  public static function getStrOfStu($currentId,$week){
    $currentPathArr=DB::select("select * from schedule where id='".$currentId."'");
    $currentPath=$currentPathArr[0]->path;
    $childPath=$currentPath.$week.'n';
    $childrenPathArr=DB::select("select * from schedule where path='".$childPath."'");
    $content='';
    for($i=0;$i<count($childrenPathArr);$i++){
      if($content==''){
        $content='　●'.Schedule::getCurrentName()
      }
    }

  }*/

  /* 根据老师path和星期几，获取所有预约的学生，分装成数组：预约id=》预约课程*/
  public static function getStuArr($currentId,$week,$flag=''){
    $currentPathArr=DB::select("select * from schedule where id='".$currentId."'");
    $currentPath=$currentPathArr[0]->path;
    $flag=='order'?$childpath=$currentPath.$week.'n0':$childpath=$currentPath.$week.'n';
    $childrenPathArr=DB::select("select * from schedule where path = '".$childpath."'");
    $contentsArr=array();
    for($i=0;$i<count($childrenPathArr);$i++){
      if($flag=='order'){
        $order=Order::where('id','=',$childrenPathArr[$i]->content)->first();
        $contentsArr[$order['id']]=Order::$arr_subject[$order['orderSubject']];
      }else{
        $person=People::where('id','=',$childrenPathArr[$i]->content)->first();
        $contentsArr[$person['userCard']]=$person['userName'];
      }

    }
    return $contentsArr;
  }
}