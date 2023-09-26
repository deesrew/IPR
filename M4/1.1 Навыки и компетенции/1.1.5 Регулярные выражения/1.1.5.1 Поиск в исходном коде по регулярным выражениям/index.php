номер терефона
(\+?[0-9]?\s?\(?[0-9]{3}\)?\s?[0-9]{3}.?[0-9]{2,3}.?[0-9]{2,3})

номер телефона вида +7 123 123 12 12 или +71231231212
(\+[0-9]{1}\s?[0-9]{3}\s?[0-9]{3}\s?[0-9]{2}\s?[0-9]{2})

фалы экшенов отмены чего-либо, содержащие функцию processForm
(class\sAction\w*Giveup[\w|\W]*processForm[\w|\W]*)


(\$this->_?signAllButton\(\s?\$this->_?document[s]?\,?\s?\))

все вьюшки содержащие функцию initScripts или initButtonScripts в которых есть строка "crypto_sign.js"
([\w|\W]*class[\w|\W]*_View[\w|\W]*_?init[\w|\W]{0,15}Scripts[\w|\W]crypto_sign\.js)

поиск строк таких как
getAuction()->getType() == '360'
getAuction()->getType() == "360"
$auction()->getType() == "360"
auction()->type() == "360"
$auction()->Type() == "360"
$auction->getType() != '360'
$this->_Auction->getType() == '360'

((get)?[a|A]uction(\(\))?->(getType\(\)|type\(\))\s?!?={1,2}\s?('|")360)


(_?tariff_?(c|C)ontroller.*new.*(S|s)endProposal)

(class.*Dev[\w\W]*('|")(Q|q)uestionn?aireUR)

(if\s\(\$((C|c)an)?(c|C)hange_?(p|P)roposal[\W|\w]*{[\w|\W]*(D|d)elete_?(P|p)roposal_?(p|P)ath\([\w|\W]*\)[\w|\W]*})

(afterDelete[\w|\W]*)\{[\w|\W]*(?!Proposal_Helper_UniqueFile)[\w|\W]*\} - все afterDelete без Proposal_Helper_UniqueFile внутри