SET TRANSACTION ISOLATION LEVEL READ UNCOMMITTED ;
START TRANSACTION;

/* TRY TO GET X LOCK AND DEADLOCK */

SELECT COUNT(number)
FROM ipr.random_data
ORDER BY number FOR UPDATE;

COMMIT;