In Mac:
1. in system preference, start mysql
alias mysql=/usr/local/mysql/bin/mysql
2. mysql -u root -p
3.mysql> create database web_db;
4.mysql> grant all privileges on web_db.* to 'web_db'@'localhost' identified by "password";
5.mysql> exit;
6. mysql -u web_db -p web_db  // with password “password”
7. create table users(
     id int(11) not null auto_increment,
     user_name varchar(30) not null,
     password varchar(15) not null,
     gender tinyint(1) not null,
     major varchar(40) not null,
     annual_salary int(6) not null,
     create_time timestamp default '0000-00-00 00:00:00',
     update_time timestamp default now() on update now(),
     remark text,
     primary key (id)
     );
Show results by “show columns from users”
8 create relational table blogs:
mysql> 
create table blogs(
    id int(11) not null auto_increment,
    subject_id int(11) not null,
    title varchar(150) not null,
    view_counts int(11) not null,
    content text,
    create_time timestamp default '0000-00-00 00:00:00',
    update_time timestamp default now() on update now(),
    primary key (id),
    index (subject_id)
    );
9.create relational table comments:
mysql> 
create table comments(
    id int(11) not null auto_increment,
    blog_id int(11) not null,
    user_id int(11) not null,
    content text,
    create_time timestamp default '0000-00-00 00:00:00',
    update_time timestamp default now() on update now(),
    primary key (id),
    index (blog_id),
    index (user_id)
    );

10. For other operations or database setup history logs of my operations, see file sandbox/project2_mysql_setup.

11. when finish set up, go http://localhost/project2_admin/public/index.php.
Two areas: admin and normal user. Go admin to manage , go signup/signin to blog;

12.Note: no protection or char recognition built; totally vulnerable, even for ‘ char. 
   Note: in admin’s manage_content.php there is an experiment area to quick try GET attack.We need to build an attack library here to attack more efficient. 
 

