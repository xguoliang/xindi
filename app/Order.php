<?php

namespace App;

use Illuminate\Database\Eloquent\Model;


class Order extends Model{
  //指定表名
  protected $table='orderinfo';

  protected $fillable=['orderName','orderGender','orderBirthday','orderSubject','orderSubjectPosition','orderPhone','orderRemark'];

  //指定主键
  protected $primarykey='id';

  public $timestamps=true;

  public static $arr_sex=array(
    'male'=>'男',
    'female'=>'女',
    'unknow'=>'未知'
  );
  public function getSex($ind=null){
    if($ind!=null){
      return array_key_exists($ind,self::$arr_sex)?self::$arr_sex[$ind]:self::$arr_sex['unknow'];
    }
    return self::$arr_sex['unknow'];
  }

  public static $arr_subject=array(
    'a'=>'少儿软笔书法',
    'b'=>'少儿硬笔书法',
    'c'=>'幼儿书法启蒙',
    'd'=>'少儿国画',
    'e'=>'幼儿国画启蒙',
    'f'=>'素描水粉',
    'g'=>'成人国画',
    'n'=>'无..'
  );
  public function getSubject($ind=null){
    if($ind!=null){
      return array_key_exists($ind,self::$arr_subject)?self::$arr_subject[$ind]:'无..';
    }else{
      return '';
    }
  }

  public function getSubjectPosition($orderId){
    $order=Order::find($orderId);
    if($order->orderSubjectPosition=='n'){
      return '尚未安排听课..';
    }else{
      return Schedule::getChPath($order->orderSubjectPosition);
    }
  }
}