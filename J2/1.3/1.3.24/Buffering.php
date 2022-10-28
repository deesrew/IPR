<?php

function callback($buffer)
{
	// заменить все яблоки апельсинами
	return (str_replace("яблоки", "апельсины", $buffer));
}

ob_start("callback");

?>
	<html>
	<body>
	<p>Это всё равно что сравнить яблоки и апельсины.</p>
	</body>
	</html>
<?php

ob_end_flush();

?>