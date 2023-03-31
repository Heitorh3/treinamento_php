CREATE DATABASE treinamentoPhp;
USE treinamentoPhp;

CREATE TABLE `users` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(45) DEFAULT NULL,
  `email` varchar(45) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE = InnoDB AUTO_INCREMENT = 0 DEFAULT CHARSET = utf8;
INSERT INTO users (name, email)
VALUES ('Heitor Neto', 'heitorh3@gmail.com');

CREATE TABLE photo {
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `userid` int(11) DEFAULT NOT NULL,
  `path` varchar(45) DEFAULT NULL,  
   FOREIGN KEY (`userid`) REFERENCES `users`(`userid`)
}