DROP TABLE IF EXISTS ipr.cont_data;
DROP TABLE IF EXISTS ipr.log;

CREATE TABLE ipr.cont_data
(
    `id`      INT( 11 ) UNSIGNED NOT NULL AUTO_INCREMENT PRIMARY KEY,
    `content` TEXT NOT NULL
);

CREATE TABLE ipr.log
(
    `id`     INT( 11 ) NOT NULL AUTO_INCREMENT PRIMARY KEY,
    `msg`    VARCHAR(255) NOT NULL,
    `time`   TIMESTAMP    NOT NULL DEFAULT CURRENT_TIMESTAMP,
    `row_id` INT( 11 ) NOT NULL
);

DROP PROCEDURE IF EXISTS ipr.cont_data;
DELIMITER //

CREATE PROCEDURE ipr.generate_tr ()
BEGIN
  DECLARE i INT DEFAULT 0;
  WHILE i <10000 DO
	set @num = FLOOR(RAND()*(1000000-0));
	set i = i + 1;
insert into ipr.cont_data(text) values (@num);
END WHILE;
END// DELIMITER ;

DROP TRIGGER IF EXISTS update_data;

DELIMITER //
CREATE TRIGGER update_data
    AFTER INSERT
    ON ipr.cont_data
    FOR EACH ROW
BEGIN
    INSERT INTO ipr.log Set msg = 'insert', row_id = NEW.id;
END
    // DELIMITER ;