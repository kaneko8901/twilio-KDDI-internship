create database scheduler;

use scheduler;

create table scheduler.schedule
(
  id int auto_increment,
  schedule_time datetime,
  comment varchar(255),
  primary key (id)
);