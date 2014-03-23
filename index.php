<?

function millis() {
    return (int)(microtime(true) * 1000);
}

$format = isset($_GET['format']) ? $_GET['format'] : 'html';

switch ($format) {
	case 'json':
		echo '{"timestamp":"\/Date(' . millis() . '+0000)\/"}';
		break;
	case 'plain':
			echo millis();
		break;
	case 'xml':
			echo '<?xml version="1.0" encoding="UTF-8"?>'."\n";
			?><timestamp><?=millis()?></timestamp><?="\n"?><?
		break;
	default:
	case 'html':
	    $ms = millis();
		?><!DOCTYPE html>
		<html><head><title><?=$ms?></title></head>
		<body><h1>Milliseconds since 01.01.1970 0:00 GMT: <?=$ms?></h1>
		<p>For other formats, use
		<ul><li><a href="?format=json">?format=json</a> for json.</li>
			<li><a href="?format=plain">?format=plain</a> for plain.</li>
			<li><a href="?format=xml">?format=xml</a> for xml.</li>
	    <?
		}
?>
