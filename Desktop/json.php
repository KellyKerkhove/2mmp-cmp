<?php
require('main.php');
date_default_timezone_set('Europe/Brussels');

$callback=$_GET['callback'];

if(isset($callback)){
	header('Content-Type: application/javascript; charset=utf-8');
	echo $callback.'('.$Variabele.');';
	//  same output as with application/json 
	// weergeven dankzij variabele of ander bestand 
	} 
else {
header('Content-Type: application/json; charset=utf-8');}

//$callback = isset($_GET['callback']) ? $_GET['callback'] : false;
//header('Content-Type: ' . ($callback ? 'application/javascript' : 'application/json') . ';charset=UTF-8');
//$data = array('some_key' => 'some_value');
//echo ($callback ? $callback . '(' : '') . json_encode($data) . ($callback ? ')' : '');
?>




{
	"meta":{
		"title": "my  webblog",
		"url":"http://localhost:888/cmp-blog/"
		},
		
	"posts":[
<?php
	$sql="SELECT* FROM `posts`ORDER BY `pubdate` DESC LIMIT 0,5";
	$result:$db->query($sql);
	while($row=$result->fetch_object());

?>

		{
		"title":"<?php echo htmlspecialchars($row->title); ?>",
		"author":"<?php echo htmlspecialchars($row->author); ?>",
		"content":"<?php echo htmlspecialchars($row->content); ?>",
		"url":"http://localhost:8888/php/post.php?id=<?php echo (int) $row->postID; ?>",
		"pubdate":"<?php echo htmlspecialchars($row->pubdate); ?>"
		
		},
	
	<?php
	//einde while lus
	}
	//einde else
	}
	
	?>
	
	
	
	]	






}