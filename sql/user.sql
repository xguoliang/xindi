create database laravelXindi;
ALTER TABLE 'laravelXindi' DEFAULT CHARACTER SET utf8 COLLATE utf8_general_ci;

use laravelXindi;

create table userInfo(

  id int unsigned not null auto_increment primary key,
  userNumber char(50) not null,
  userName char(20) not null,
  userPassword char(20),
  userRole char(20),
  userRemark text,
  created_at int not null default 0 comment '新增时间',
  updated_at int not null default 0 comment '修改时间'

)ENGINE=InnoDB DEFAULT CHARSET=utf8;

set names utf8;
ALTER TABLE 'userInfo' DEFAULT CHARACTER SET utf8 COLLATE utf8_general_ci;
 insert into userInfo ( userNumber, userName, userPassword, userRole, userRemark) VALUES
 ('qiuning.qiu@huawei.com','邱宁','123','管理员','小小管理员');