/*START TRANSACTION ISOLATION LEVEL READ COMMITTED;*/

select NOW();

START TRANSACTION;
CALL ipr.generate();
COMMIT;

START TRANSACTION;
CALL ipr.generate();
COMMIT;

select NOW();
