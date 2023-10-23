
CREATE DATABASE IF NOT EXISTS Message_Portafolio;

USE Message_Portafolio;

CREATE TABLE IF NOT EXISTS users(

id          int(255) auto_increment not null,
name        varchar(100) not null,
username    varchar(100) not null,
email       varchar(100) not null,
message     text,
created_at  date,   

CONSTRAINT pk_users PRIMARY KEY(id)

)ENGINE = InnoDB;