create database centenews
use centenews

--Admin/Editor Table
create table editor (
id int NOT NULL IDENTITY(1,1) PRIMARY KEY,
editor_username varchar(255) NOT NULL,
editor_pass varchar(255) NOT NULL,
is_admin bit NOT NULL,
creation_date datetime NOT NULL DEFAULT CURRENT_TIMESTAMP, --Se agrega automáticamente, no hay que especificar el valor
)

insert into editor values ('daeaznar', 'abc123456', 1, CURRENT_TIMESTAMP)

select * from editor

--Category Table
create table category(
id int NOT NULL IDENTITY(1,1) PRIMARY KEY,
category_name varchar(255) NOT NULL,
cat_description varchar(255),
)

insert into category values('México', 'Sucesos importantes en México')
insert into category values('Internacional', 'Noticias alrededor del mundo')
insert into category values('Deportes', 'Noticias sobre lo más importante del deporte')

select * from category

--SubCategory Table
create table subcategory(
id int NOT NULL IDENTITY(1,1) PRIMARY KEY,
subcat_name varchar(255) NOT NULL,
subcat_description varchar(255),
category_id int FOREIGN KEY REFERENCES category(id)
)

insert into subcategory values('Football Americano', 'Todo lo relacionado al deporte del tackleo', 3)
insert into subcategory values('Basketball', 'Todo lo relacionado al baloncesto', 3)
insert into subcategory values('Baseball', 'Todo lo relacionado al béisbol', 3)

select subcat_name, subcat_description, category_name 
from subcategory 
inner join category 
on subcategory.category_id=category.id

--Notes Table
create table notes(
id int NOT NULL IDENTITY(1,1) PRIMARY KEY,
title varchar(255),
cat_id int FOREIGN KEY REFERENCES category(id),
subCat_id int FOREIGN KEY REFERENCES subcategory(id),
author int FOREIGN KEY REFERENCES editor(id),
posting_date datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
post_url varchar(max),
img varchar(255)
)


