SELECT COUNT(number)
FROM ipr.random_data
WHERE number IN (SELECT number
                 FROM ipr.random_data
                 WHERE MOD(number, 157) = 13
                    OR MOD(number, 163) = 15 and MOD(number, 128) = 10
                    OR MOD(number, 128) = 10 and MOD(number, 178) = 10
                    OR MOD(number, 153) = 15 and MOD(number, 175) = 10
                    OR MOD(number, 142) = 12 and MOD(number, 127) = 10
                    OR MOD(number, 135) = 11 and MOD(number, 758) = 10
                    OR MOD(number, 127) = 10 and MOD(number, 751) = 10
                    OR MOD(number, 179) = 11 and MOD(number, 175) = 10
                    OR MOD(number, 137) = 15 and MOD(number, 178) = 10
                    OR MOD(number, 138) = 15 and MOD(number, 179) = 10
                    OR MOD(number, 139) = 15 and MOD(number, 180) = 10
                    OR MOD(number, 140) = 15 and MOD(number, 181) = 10
                    OR MOD(number, 150) = 15 and MOD(number, 198) = 10
                    OR MOD(number, 160) = 15 and MOD(number, 111) = 10)
ORDER BY number LOCK IN SHARE MODE;