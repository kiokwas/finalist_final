SET NAMES utf8;

DROP TABLE IF EXISTS `users`;
CREATE TABLE users (
  idx int auto_increment primary key,
  username varchar(500) not null,
  password varchar(150) not null
);

INSERT INTO users (username, password) values ('admin', 'lkhbadslkfhbalksdjbfalksdjbflkashjdbf');