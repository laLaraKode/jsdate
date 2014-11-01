<?

function millis() {
    return (int)(microtime(true) * 1000);
}

$format = isset($_GET['format']) ? $_GET['format'] : 'html';

$func = isset($_GET['func']) ? $_GET['func'] : 'forward';

if ($func == 'reverse') {
   date_default_timezone_set($_GET['zone']);
   echo date("Y-m-d H:i:s T", $_GET['ts']);
} else

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
                </ul>
                <form method="GET">
                   <input type="hidden" name="func" value="reverse"/>
                   Timestamp: <input type="text" name="ts"/><br/>
                   Timezone: <input type="text" name="zone"/><br/>
                   <input type="submit"/>
                </form>
	    <?
		}
?>
