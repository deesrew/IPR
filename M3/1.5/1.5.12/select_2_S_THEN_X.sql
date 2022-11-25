SET TRANSACTION ISOLATION LEVEL READ UNCOMMITTED ;
START TRANSACTION;

/* GET S LOCK */

SELECT COUNT(number)
FROM ipr.random_data
ORDER BY number LOCK IN SHARE MODE;

SELECT SLEEP(5);

/* TRY TO GET X */

SELECT COUNT(number)
FROM ipr.random_data
ORDER BY number FOR UPDATE;

COMMIT;