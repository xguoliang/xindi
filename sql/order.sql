use laravelXindi;

create table orderinfo(

  id int unsigned not null auto_increment primary key,
  orderName char(40) not null,
  orderGender char(20),
  orderBirthday date,
  orderSubject char(5),
  orderSubjectPosition char(30) DEFAULT 'n',
  orderPhone char(20) not null,
  orderRemark text,
  created_at int not null default 2017 comment '新增时间',
  updated_at int not null default 2017 comment '修改时间'

)ENGINE=InnoDB DEFAULT CHARSET=utf8;

set names utf8;
ALTER TABLE 'orderinfo' DEFAULT CHARACTER SET utf8 COLLATE utf8_general_ci;

insert into orderinfo (orderName,orderGender,orderBirthday,orderSubject,orderPhone,orderRemark) VALUES
('刘先生','male','1987-1-10','a','15867654435','');

insert into orderinfo (orderName,orderGender,orderBirthday,orderSubject,orderPhone,orderRemark) VALUES
('张先生','male','1947-1-10','b','15867654435','');

insert into orderinfo (orderName,orderGender,orderBirthday,orderSubject,orderPhone,orderRemark) VALUES
('丁先生','female','1997-1-10','c','15867654435','');
