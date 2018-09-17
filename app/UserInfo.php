<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class UserInfo extends Model{
  //指定表名
  protected $table = 'userInfo';

  protected $fillable=['userNumber','userName','userPassword'];
  //指定ID
  protected $primarykey = 'id';


  public $timestamps = true;
}