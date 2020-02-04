<?php


include('functions.php');
$pets=jsonToArray('data.json');

$title='NKY Pets For Homes';
require('header.php');
printHeader($title);
?>
    <h1>NKY Pets For Homes</h1>
	<?php
	for($i=0;$i<count($pets);$i++){
		showItem($i,$pets[$i]['name'].' '.'</span>',$pets[$i]['picture']);
		echo '<hr>';
	}
require('footer.php');