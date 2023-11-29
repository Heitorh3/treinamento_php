#FROM mysql:5.7.20
FROM mysql:8.0

#RUN sed -i -e"s/^bind-address\s*=\s*127.0.0.1/bind-address = 0.0.0.0/" /etc/mysql/my.cnf

ADD initial_data/bootstrap.sql /docker-entrypoint-initdb.d

CMD ["mysqld"]

EXPOSE 3306