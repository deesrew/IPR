/*
docker exec -it 1512_mysql_1 bash
mysql -u root -p ipr

чтобы вызвать DL нужно выполнить
    init.sql
    insert.sql
    select_2.sql
    select_3.sql

 */

DROP TABLE IF EXISTS ipr.random_data;

CREATE TABLE ipr.random_data
(
    number INT NOT NULL
);

DROP PROCEDURE IF EXISTS ipr.generate;
DELIMITER //

CREATE PROCEDURE ipr.generate ()
BEGIN
  DECLARE i INT DEFAULT 0;
  WHILE i <500000 DO
	set @num = FLOOR(RAND()*(1000000-0));
	set i = i + 1;
insert into ipr.random_data(number) values (@num);
END WHILE;
END//

DELIMITER ;
