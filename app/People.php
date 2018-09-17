<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class People extends Model{
  //指定表名
  protected $table = 'peopleInfo';

  protected $fillable=['userFlag','userCard','userName','userGender','userBirthday','userPhone','userSubject','userRemark'];
  //指定ID
  protected $primarykey = 'id';


  public $timestamps = true;

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
    's'=>'书法',
    'h'=>'绘画',
    'o'=>'其他'
  );
  public function getSubject($ind=null){
    if($ind!=null){
      return array_key_exists($ind,self::$arr_subject)?self::$arr_subject[$ind]:'无..';
    }else{
      return '';
    }
  }
}