/*
 запрос с любой страницы test.fabriknat.ru
 */

explain
SELECT firms.*,
       IF(towns.name IS NOT NULL, towns.name, firms.post_town) AS                              town_name,
       towns.difference                                        as                              town_difference,
       group_concat(firms_roles.role order by binary(firms_roles.role) asc separator ' ')      roles,
       (SELECT count(1) FROM fabrikant_test.bill WHERE bill.firm_id = firms.id AND status = 0) bills_status0,
       (SELECT count(1) FROM fabrikant_test.bill WHERE bill.firm_id = firms.id AND status = 1) bills_status1,
       (SELECT count(1) FROM fabrikant_test.bill WHERE bill.firm_id = firms.id AND status = 2) bills_status2,
       (SELECT count(1) FROM fabrikant_test.bill WHERE bill.firm_id = firms.id AND status = 3) bills_status3,
       (SELECT count(1) FROM fabrikant_test.bill WHERE bill.firm_id = firms.id AND status = 4) bills_status4
FROM fabrikant_test.firms
         LEFT JOIN fabrikant_test.firms_roles ON (firms_roles.firm_id = firms.id)
         LEFT JOIN fabrikant_test.towns ON towns.id = firms.post_town_id
WHERE firms.id = "1"
GROUP BY firms.id
ORDER BY null