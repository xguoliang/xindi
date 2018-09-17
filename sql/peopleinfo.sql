use laravelXindi;

create table peopleInfo(

  id int unsigned not null auto_increment primary key,
  userFlag char(20),
  userCard char(20),
  userName char(20),
  userGender char(20),
  userBirthday DATE ,
  userPhone char(20),
  userSubject char(20),
  userRemark text,
  created_at int not null default 2017 comment '新增时间',
  updated_at int not null default 2017 comment '修改时间'

)ENGINE=InnoDB DEFAULT CHARSET=utf8;

set names utf8;
ALTER TABLE 'peopleInfo' DEFAULT CHARACTER SET utf8 COLLATE utf8_general_ci;
 insert into peopleInfo ( userFlag, userCard, userName,userGender, userBirthday,userPhone, userSubject,userRemark) VALUES
 ('stu','00001','韩勇','male','2002-02-09','18551585569','s','没有什么');

