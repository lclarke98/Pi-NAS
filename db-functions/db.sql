CREATE DATABASE if not exists nas;

CREATE TABLE if not exists nas.user(
  user_name VARCHAR(64) NOT NULL PRIMARY KEY,
  user_password VARCHAR(88) NOT NULL,
  CONSTRAINT user_unique UNIQUE (user_name)
);


CREATE TABLE if not exists nas.drive(
  drive_name VARCHAR(64) NOT NULL PRIMARY KEY,
  drive_path VARCHAR(200) NOT NULL
);

CREATE TABLE if not exists nas.permissions(
  permission_id INT NOT NULL PRIMARY KEY AUTO_INCREMENT,
  drive_name VARCHAR(64) NOT NULL,
  user_name VARCHAR(64) NOT NULL,
  permission_read BOOLEAN NOT NULL,
  permission_write BOOLEAN NOT NULL,
  FOREIGN KEY (user_name) REFERENCES user(user_name) ON DELETE CASCADE,
  FOREIGN KEY (drive_name) REFERENCES drive(drive_name) ON DELETE CASCADE
);

use nas

insert into user (user_name, user_password) values ('admin', '$2y$10$/MNTjR7eFTIvVu8vhfdc3uwtVw3z5cXFZ5gk2FjZodLdxX21cbqly');

insert into drive (drive_name, drive_path) values ('nas1', '/nas-mounts/nas1');

insert into permissions (drive_name, user_name, permission_read, permission_write) values ('nas1', 'admin', 1, 1);