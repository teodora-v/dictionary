<?php
$doc = new DOMDocument();
$doc->load('content.xml');
$words = $doc->getElementsByTagName( "Word" );
foreach( $words as $k=>$word )
{
	$bgs = $word->getElementsByTagName( "bg_trans" );
	$bg[$k] = $bgs->item(0)->nodeValue; 	
	
	$ens = $word->getElementsByTagName( "en_trans" );
	$en[$k] = $ens->item(0)->nodeValue; 
	$en_transcription[$k] = $ens->item(0)->getAttribute("en_transcription");
	$en_type[$k] = $ens->item(0)->getAttribute("en_type");

	$des = $word->getElementsByTagName( "de_trans" );
	$de[$k] = $des->item(0)->nodeValue;
	$de_transcription[$k] = $des->item(0)->getAttribute("de_transcription");
	$de_type[$k] = $des->item(0)->getAttribute("de_type");

	$imgs = $word->getElementsByTagName( "imgURL" );
	$img[$k] = $imgs->item(0)->nodeValue; 
	
}?>
<html>
<head>
<title>Dictionary</title>
</head>
<body bgcolor="#fbf9d0" style="margin: 40px;">
	<form action="http://127.0.0.1/index.php" method="post">
	<font size="4">
	<table>	
		<tr>
			<td><b>Bulgarian: </b><td>
			<td><select name="sel">
					<option value="0">Plese select ...</option>
					<?php foreach ($bg as $k=>$v){
						echo '<option value="'.($k+1).'">'.$v.'</option>';
					}?>
				</select>
			</td> 
		</tr>
		<tr><td></td><td><br><input type="submit" name="trans" value="Translate"/><br><br></td></tr>
		<?php foreach ($bg as $k=>$v){ 
 	if(isset($_POST['sel']) && $_POST['sel']==($k+1)){
 		echo '<tr><td><b>Selected word: </b></td><td>'.$bg[$k].'</td></tr>';
		echo '<tr><td><b>English: </b></td><td>'.$en[$k].' - '.$en_transcription[$k].' - '.$en_type[$k].'</td></tr>';
 		echo '<tr><td><b>German: </b></td><td>'.$de[$k].' - '.$de_transcription[$k].' - '.$de_type[$k].'</td></tr>';
 		echo '<tr><td></td><td><img src="'.$img[$k].'" style="width: 300 px; height:600px"/></td></td>';
 	}
}
?>
	</table>
	</font>
	</form>
</body>
</html>
