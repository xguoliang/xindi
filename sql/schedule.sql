use laravelXindi;

create table schedule(

  id int unsigned not null auto_increment primary key,
  path char(30),
  content char(30),
  created_at int not null default 2017 comment '新增时间',
  updated_at int not null default 2017 comment '修改时间'

)ENGINE=InnoDB DEFAULT CHARSET=utf8;

set names utf8;
ALTER TABLE 'schedule' DEFAULT CHARACTER SET utf8 COLLATE utf8_general_ci;

insert into schedule (id,path,content) VALUES(1,'1n','课程表');

insert into schedule (id,path,content) VALUES(2,'1n2n','上午班');
insert into schedule (id,path,content) VALUES(3,'1n3n','下午班');
insert into schedule (id,path,content) VALUES(4,'1n4n','晚上班');

insert into schedule (id,path,content) VALUES(5,'1n2n5n','9：00～10：30');
insert into schedule (id,path,content) VALUES(6,'1n2n6n','11：00～12：00');
insert into schedule (id,path,content) VALUES(7,'1n3n7n','2：00～3：30');
insert into schedule (id,path,content) VALUES(8,'1n3n8n','4：00～5：30');
insert into schedule (id,path,content) VALUES(9,'1n4n9n','18：00～19：00');

insert into schedule (id,path,content) VALUES(10,'1n2n5n10n','书法');
insert into schedule (id,path,content) VALUES(11,'1n2n5n11n','绘画');
insert into schedule (id,path,content) VALUES(12,'1n2n6n12n','书法');
insert into schedule (id,path,content) VALUES(13,'1n2n6n13n','绘画');
insert into schedule (id,path,content) VALUES(14,'1n3n7n14n','书法');
insert into schedule (id,path,content) VALUES(15,'1n3n7n15n','绘画');
insert into schedule (id,path,content) VALUES(16,'1n3n8n16n','书法');
insert into schedule (id,path,content) VALUES(17,'1n3n8n17n','绘画');
insert into schedule (id,path,content) VALUES(18,'1n4n9n18n','书法');
insert into schedule (id,path,content) VALUES(19,'1n4n9n19n','绘画');

insert into schedule (id,path,content) VALUES(20,'1n2n5n10n20n','4');
insert into schedule (id,path,content) VALUES(21,'1n2n5n10n21n','5');
insert into schedule (id,path,content) VALUES(22,'1n2n5n10n22n','6');
insert into schedule (id,path,content) VALUES(23,'1n2n5n11n23n','15');
insert into schedule (id,path,content) VALUES(24,'1n2n5n11n24n','4');
insert into schedule (id,path,content) VALUES(25,'1n2n6n12n25n','6');
insert into schedule (id,path,content) VALUES(26,'1n2n6n12n26n','4');
insert into schedule (id,path,content) VALUES(27,'1n2n6n12n27n','6');
insert into schedule (id,path,content) VALUES(28,'1n2n6n12n28n','4');
insert into schedule (id,path,content) VALUES(29,'1n3n7n14n29n','6');
insert into schedule (id,path,content) VALUES(30,'1n3n7n14n30n','4');
insert into schedule (id,path,content) VALUES(31,'1n3n7n14n31n','6');
insert into schedule (id,path,content) VALUES(32,'1n3n7n14n32n','4');
insert into schedule (id,path,content) VALUES(33,'1n3n7n15n33n','6');
insert into schedule (id,path,content) VALUES(34,'1n3n7n15n34n','4');
insert into schedule (id,path,content) VALUES(35,'1n3n8n16n35n','5');
insert into schedule (id,path,content) VALUES(36,'1n3n8n16n36n','6');
insert into schedule (id,path,content) VALUES(37,'1n4n9n19n37n','6');

insert into schedule (id,path,content) VALUES(38,'1n2n5n10n20n1n','1');
insert into schedule (id,path,content) VALUES(39,'1n2n5n10n20n2n','2');
insert into schedule (id,path,content) VALUES(40,'1n2n5n10n20n1n','1');
insert into schedule (id,path,content) VALUES(41,'1n2n5n10n20n3n','1');
insert into schedule (id,path,content) VALUES(42,'1n2n6n12n27n4n','2');
insert into schedule (id,path,content) VALUES(43,'1n2n6n12n27n6n','1');
insert into schedule (id,path,content) VALUES(44,'1n3n7n14n29n1n','1');
insert into schedule (id,path,content) VALUES(45,'1n3n7n14n29n5n','1');
insert into schedule (id,path,content) VALUES(46,'1n3n7n14n29n1n','2');
insert into schedule (id,path,content) VALUES(47,'1n3n7n14n29n2n','3');
insert into schedule (id,path,content) VALUES(48,'1n4n9n19n37n3n','2');
insert into schedule (id,path,content) VALUES(49,'1n4n9n19n37n3n','3');
insert into schedule (id,path,content) VALUES(50,'1n4n9n19n37n3n','1');
insert into schedule (id,path,content) VALUES(51,'1n4n9n19n37n3n','12');
insert into schedule (id,path,content) VALUES(52,'1n4n9n19n37n3n','10');