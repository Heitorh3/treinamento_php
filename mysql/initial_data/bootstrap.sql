CREATE DATABASE IF NOT EXISTS treinamentoPhp;
USE treinamentoPhp;

CREATE TABLE `users` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(45) DEFAULT NULL,
  `email` varchar(45) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE = InnoDB AUTO_INCREMENT = 0 DEFAULT CHARSET = utf8;

CREATE TABLE `photos` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `userId` int(11) DEFAULT 0,
  `path` varchar(45) DEFAULT NULL,  
  PRIMARY KEY (`id`),
  FOREIGN KEY (`userId`) REFERENCES `users`(`id`)
)ENGINE = InnoDB AUTO_INCREMENT = 0 DEFAULT CHARSET = utf8;

/* Alterando a estrutura das tabelas */
ALTER TABLE users ADD `password` VARCHAR(255) NOT NULL AFTER `email`;

/* Inserindo/atualizando os dados iniciais no banco */
INSERT INTO users (name, email, password)
VALUES ('Heitor Neto', 'heitorh3@gmail.com', '$2y$07$BCryptRequires22Chrcte/VlQH0piJtjXl.0t1XkA8pw9dMXTpOq');

/*UPDATE users SET password = '$2y$07$BCryptRequires22Chrcte/VlQH0piJtjXl.0t1XkA8pw9dMXTpOq' WHERE id = 1;*/