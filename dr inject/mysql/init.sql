-- init.sql: creates portal database and users table, inserts 10 users including admin with flag


CREATE DATABASE IF NOT EXISTS portal;
USE portal;


DROP TABLE IF EXISTS users;
CREATE TABLE users (
id INT AUTO_INCREMENT PRIMARY KEY,
username VARCHAR(64) NOT NULL,
password VARCHAR(255) NOT NULL,
role VARCHAR(20) NOT NULL DEFAULT 'user',
secret TEXT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;


-- Preloaded users (passwords are stored as MD5 hashes for simplicity)
-- 1 | test | 098f6bcd4621d373cade4e832627b4f6 (md5("test"))
-- 2 | user1 | 81dc9bdb52d04dc20036dbd8313ed055 (md5("1234"))
-- ... others as requested


INSERT INTO users (username, password, role, secret) VALUES
('test','098f6bcd4621d373cade4e832627b4f6','user', NULL),
('user1','81dc9bdb52d04dc20036dbd8313ed055','user', NULL),
('user2','202cb962ac59075b964b07152d234b70','user', NULL),
('user3','21232f297a57a5a743894a0e4a801fc3','user', NULL),
('user4','098f6bcd4621d373cade4e832627b4f6','user', NULL),
('user5','5f4dcc3b5aa765d61d8327deb882cf99','user', NULL),
('user6','e10adc3949ba59abbe56e057f20f883e','user', NULL),
('user7','25d55ad283aa400af464c76d713c07ad','user', NULL),
('user8','d8578edf8458ce06fbc5bb76a58c5ca4','user', NULL),
('admin','81dc9bdb52d04dc20036dbd8313ed055','admin','igoh25{SQLI_USER_TO_ADMIN_ESCALATION}');


-- Create an index for convenience
CREATE INDEX idx_username ON users(username);
