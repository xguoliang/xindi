<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Monolog\Handler\NullHandlerTest;


class Classhour extends Model{
  //指定表名
  protected $table='classhour';

  protected $fillable=['classhourPersonId','classhourRecordTime','classhourRemark'];

  //指定主键
  protected $primarykey='id';

  public $timestamps=true;

  public static function getClasshourByPerson($personId){
    if($personId!=NULL){
      $classhourOfthisPerson = Classhour::where('classhourPersonId','=',$personId)->orderBy('classhourRecordTime','desc')->get();
      return $classhourOfthisPerson;
    }else{
      return null;
    }
  }
}