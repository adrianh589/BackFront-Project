CREATE DATABASE IF NOT EXISTS backfront_proyect;

USE backfront_proyect;

CREATE TABLE users(
    id int(255) auto_increment not null,
    rol varchar(20),
    name varchar(255),
    surname varchar(255),
    email varchar(255),
    password varchar(255),
    created_at datetime,
    updated_at datetime,
    CONSTRAINT pk_users PRIMARY KEY (id)
)ENGINE = InnoDB;

CREATE TABLE tasks(
    id int(255) auto_increment not null ,
    user_id int(255) not null ,
    title varchar(255),
    description text,
    status varchar(100),
    created_at datetime,
    updated_at datetime,
    CONSTRAINT pk_tasks PRIMARY KEY (id),
    CONSTRAINT fk_tasks_users FOREIGN KEY (user_id) REFERENCES users(id)
);