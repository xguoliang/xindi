use laravelXindi;

create table classhour(

  id int unsigned not null auto_increment primary key,
  classhourPersonId int unsigned not null,
  classhourRecordTime date,
  classhourRemark text,
  created_at int not null default 2017 comment '新增时间',
  updated_at int not null default 2017 comment '修改时间'

)ENGINE=InnoDB DEFAULT CHARSET=utf8;

set names utf8;
ALTER TABLE 'classhour' DEFAULT CHARACTER SET utf8 COLLATE utf8_general_ci;

insert into classhour (classhourPersonId,classhourRecordTime) VALUES
('4','1983-11-11');

insert into classhour (classhourPersonId,classhourRecordTime) VALUES
('4','1917-12-10');

insert into classhour (classhourPersonId,classhourRecordTime) VALUES
('4','1987-11-10');

insert into classhour (classhourPersonId,classhourRecordTime) VALUES
('4','1987-4-11');

insert into classhour (classhourPersonId,classhourRecordTime) VALUES
('5','1984-5-10');

insert into classhour (classhourPersonId,classhourRecordTime) VALUES
('6','1987-6-13');

