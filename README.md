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

Composer:

```
docker run --rm --interactive --tty --volume $PWD:/app composer dump-autoload
```

## 🚀 Comando para iniciar a aplicação com docker-compose

Docker compose:

```
docker-compose up -d --build --force-recreate
```

## 🚀 Comando para parar a aplicação com docker-compose

Docker compose:

```
docker-compose down --remove-orphans
```

## Comando SQL para criar a tabela para

```
CREATE TABLE `users` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(45) DEFAULT NULL,
  `email` varchar(45) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE = InnoDB AUTO_INCREMENT = 0 DEFAULT CHARSET = utf8;


INSERT INTO users (Name,email) VALUES ('Heitor Neto', 'heitorh3@gmail.com');
SELECT * FROM users;

```