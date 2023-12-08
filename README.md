<img align='right' src="https://github-readme-stats.vercel.app/api?username=heitorh3&show_icons=true&title_color=783c00&text_color=af552e&icon_color=783c00&bg_color=f8efd4&cache_seconds=2300">

### Faça um breve apresentação sobre você

<img src="https://img.shields.io/static/v1?label=Overview&message=Heitor Neto&color=f8efd4&style=for-the-badge&logo=GitHub">

<p>

Estudando/trabalhando na **nome do lugar**<br/>

Eu sou desenvolvedor **sua área**.

</p>
<hr>

## 🚀 Comando para rodar o composer

Para rodar o projeto, siga estas etapas:

Instalando as denpendências ante de rodar o projeto:

```
docker run --rm --interactive --tty --volume $PWD:/app composer install
```

```
docker run --rm --interactive --tty --volume $PWD:/app composer dump-autoload
```

## 🚀 Comando para iniciar a aplicação com docker-compose

```
docker-compose up -d --build --force-recreate
```

## 🚀 Comando para parar a aplicação com docker-compose

```
docker-compose down --remove-orphans
```

## 🚀 Comando para criar o container do banco de dados

Docker run:

```
 docker run --name=server_mysql -p 3306:3306 -e MYSQL_ROOT_PASSWORD=bwUh3DtN3e32ttya -e MYSQL_DATABASE=treinamentoPhp -d mariadb:10.0.27

```
## 📬 Configurações de e-mail

```
$phpmailer = new PHPMailer();
$phpmailer->isSMTP();
$phpmailer->Host = 'sandbox.smtp.mailtrap.io';
$phpmailer->SMTPAuth = true;
$phpmailer->Port = 2525;
$phpmailer->Username = '26f5f856e1e1f5';
$phpmailer->Password = '24212ce233ee7e';

```

## Comando SQL para criar a criação da tabela

```
CREATE TABLE `users` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(45) NOT NULL,
  `email` varchar(45) NOT NULL UNIQUE,
  PRIMARY KEY (`id`)
) ENGINE = InnoDB AUTO_INCREMENT = 0 DEFAULT CHARSET = utf8;

CREATE TABLE `photos` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `userId` int(11) DEFAULT 0,
  `path` varchar(45) DEFAULT NULL,  
  PRIMARY KEY (`id`),
  FOREIGN KEY (`userId`) REFERENCES `users`(`id`)
)ENGINE = InnoDB AUTO_INCREMENT = 0 DEFAULT CHARSET = utf8;

INSERT INTO users (name,email) VALUES ('Heitor Neto', 'heitorh3@gmail.com');
SELECT * FROM users;

ALTER TABLE users ADD `password` VARCHAR(255) NOT NULL AFTER `email`;

UPDATE users SET password = '$2y$07$BCryptRequires22Chrcte/VlQH0piJtjXl.0t1XkA8pw9dMXTpOq' WHERE id = 1;

ALTER TABLE users ADD `cpf` VARCHAR(15) NOT NULL UNIQUE AFTER `name`;

ALTER TABLE users 
ADD CONSTRAINT UC_Users UNIQUE (id,cpf);
```
