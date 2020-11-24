

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;

-- DB: centenews

-- --------------------------------------------------------

-- Table `tbladmin`
CREATE TABLE tbladmin (
  id int AUTO_INCREMENT,
  AdminUserName varchar(255) NOT NULL,
  AdminPassword varchar(255) NOT NULL,
  AdminEmailId varchar(255) NOT NULL,
  Is_Active bit NOT NULL,
  CreationDate timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  newsUpdationDate TIMESTAMP NOT NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (id)
);

INSERT INTO tbladmin VALUES
(NULL, 'daeaznar', '482c811da5d5b4bc6d497ffa98491e38', 'dae.aznar@centenews.com', 1, CURRENT_TIMESTAMP, CURRENT_TIMESTAMP);

-- --------------------------------------------------------

-- Table `tblcategory`
CREATE TABLE tblcategory (
  id int AUTO_INCREMENT,
  CategoryName VARCHAR(255) DEFAULT NULL,
  Description mediumtext,
  PostingDate timestamp NULL DEFAULT CURRENT_TIMESTAMP,
  UpdationDate timestamp NULL DEFAULT CURRENT_TIMESTAMP,
  Is_Active bit DEFAULT NULL,
  PRIMARY KEY (id)
);

INSERT INTO tblcategory VALUES
(NULL, 'Mexico', 'Sucesos importantes en el país', CURRENT_TIMESTAMP, CURRENT_TIMESTAMP, 1),
(NULL, 'Internacional', 'Noticas alrededor del mundo', CURRENT_TIMESTAMP, CURRENT_TIMESTAMP, 1),
(NULL, 'Economía', 'Lo más relevante sobre economía', CURRENT_TIMESTAMP, CURRENT_TIMESTAMP, 1),
(NULL, 'Deportes', 'Noticias sobre lo más importante del deporte', CURRENT_TIMESTAMP, CURRENT_TIMESTAMP, 1),
(NULL, 'Entretenimiento', 'El mundo del espectáculo', CURRENT_TIMESTAMP, CURRENT_TIMESTAMP, 1);

-- --------------------------------------------------------

-- Table `tblsubcategory`
CREATE TABLE tblsubcategory(
  SubCategoryId int AUTO_INCREMENT,
  CategoryId int DEFAULT NULL,
  Subcategory varchar(255) DEFAULT NULL,
  SubCatDescription mediumtext,
  PostingDate timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  UpdationDate timestamp NULL DEFAULT CURRENT_TIMESTAMP,
  Is_Active bit DEFAULT NULL,
  PRIMARY KEY (SubCategoryId)
);

-- --------------------------------------------------------

-- Table `tblcomments`
CREATE TABLE tblcomments (
  id int AUTO_INCREMENT,
  postId char(11) DEFAULT NULL,
  name varchar(150) DEFAULT NULL,
  email varchar(150) DEFAULT NULL,
  comment mediumtext,
  postingDate timestamp NULL DEFAULT CURRENT_TIMESTAMP,
  status bit DEFAULT NULL,
  PRIMARY KEY (id)
);

-- --------------------------------------------------------

-- Table `tblposts`
CREATE TABLE tblposts (
  id int AUTO_INCREMENT,
  PostTitle longtext,
  CategoryId int DEFAULT NULL,
  SubCategoryId int DEFAULT NULL,
  PostDetails longtext CHARACTER SET utf8,
  PostingDate timestamp NULL DEFAULT CURRENT_TIMESTAMP,
  UpdationDate timestamp NULL DEFAULT NULL ON UPDATE CURRENT_TIMESTAMP,
  Is_Active bit DEFAULT NULL,
  PostUrl mediumtext,
  PostImage varchar(255) DEFAULT NULL,
  PRIMARY KEY (id)
);

-- --------------------------------------------------------


