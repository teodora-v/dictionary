<?php
class Dictionary
{
	public $en_trans;
	public $de_trans;
	public $bg_trans;
	public $imgURL;
	public $bg_type;
	public $en_type;
	public $de_type;
	public $bg_transcription;
	public $en_transcription;
	public $de_transcription;

	public function __construct($en_trans, $de_trans, $bg_trans, $imgURL, $bg_type, $en_type, $de_type, $bg_transcription, $en_transcription, $de_transcription)
	{
		$this->en_trans = $en_trans;
		$this->de_trans = $de_trans;
		$this->bg_trans = $bg_trans;
		$this->imgURL = $imgURL;
		$this->bg_type = $bg_type;
		$this->en_type = $en_type;
		$this->de_type = $de_type;
		$this->bg_transcription = $bg_transcription;
		$this->en_transcription = $en_transcription;
		$this->de_transcription = $de_transcription;
	}
}

$dictionary = array(
		
		new Dictionary(
				"School",
				"die Schule",
				"Училище",
				"http://static3cdn.echalk.net/www/ud00/0/08f0bb6891474a62aa9b9cbc92bd397a/Personal_Images/school.jpg",
				"същ. име",
				"noun",
				"Substantiv",
				"utshilishte",
				"skuul",
				"di shule"
				),
		new Dictionary(
				"play",
				"spielen",
				"играя",
				"http://fusion.ddmcdn.com/kids/uploads/soccer-article3-300.jpg",
				"глагол",
				"verb",
				"Verb",
				"igraya",
				"plei",
				"spiilen"
				),	 
		new Dictionary(
				"Horse",
				"der Pferd",
				"Кон",
				"http://www.howrse.com/media/equideo/image/chevaux/adulte/americain/normal/300/bai_v1828806360.png",
				"същ. име",
				"noun",
				"Substantiv",
				"kon",
				"hors",
				"der pferd"
				),
		new Dictionary(
				"healthy",
				"gesund",
				"здрав",
				"http://www.sanmigueldeaguayo.com/wp-content/uploads/2015/10/8.jpg",
				"прил. име",
				"adjective",
				"Adjective",
				"zdrav",
				"helti",
				"gezund"
				),
		new Dictionary(
				"Dog",
				"der Hund",
				"Куче",
				"http://www.dogchannel.com/images/articles/breed_profile_images/canaan-dog.jpg",
				"същ. име",
				"noun",
				"Substantiv",
				"kutshe",
				"dok",
				"der hund"
				),
		new Dictionary(
				"Cat",
				"die Katze",
				"Котка",
				"http://www.vetprofessionals.com/catprofessional/images/home-cat.jpg",
				"същ. име",
				"noun",
				"Substantiv",
				"kotka",
				"ket",
				"di katse"
				),
		new Dictionary(
				"Bear",
				"der Bär",
				"Мечка",
				"http://www.nwf.org/~/media/Content/NWM/Animals/Mammals/brown-bear-cub-waving-Kevin-Dietrich-570x375.ashx",
				"същ. име",
				"noun",
				"Substantiv",
				"mechka",
				"bear",
				"der baer"
				),
		new Dictionary(
				"Giraffe",
				"die Giraffe",
				"Жираф",
				"http://img.thesun.co.uk/aidemitlum/archive/01161/giraffe-main_1161152a.jpg",
				"същ. име",
				"noun",
				"Substantiv",
				"jiraf",
				"jiraf",
				"die girafe"
				),
		new Dictionary(
				"Rhinoceros",
				"das Nashorn",
				"Носорог",
				"http://www.portaloko.hr/slika/40241/0/400/20/273/1046/0/crni-nosorog.jpg",
				"същ. име",
				"noun",
				"Substantiv",
				"nosorog",
				"rinoserus",
				"das nashorn"
				),
		new Dictionary(
				"Bird",
				"der Vogel",
				"Птица",
				"https://i.ytimg.com/vi/s9dbAfjlrks/maxresdefault.jpg",
				"същ. име",
				"noun",
				"Substantiv",
				"ptitsa",
				"beart",
				"der fogel"
				)		
);
//error_log(1);
header("Content-Type: text/plain", "charset: UTF-8");

//create the xml document
$xmlDoc = new DOMDocument('1.0', 'UTF-8');

//create the root element
$root = $xmlDoc->appendChild(
		$xmlDoc->createElement("Words"));

 
//make the output pretty
$xmlDoc->formatOutput = true;
foreach($dictionary as $k=>$dic)
{
	
	$dicTag = $root->appendChild(
			$xmlDoc->createElement("Word"));
	 
	$dicTag->appendChild(
			$xmlDoc->createAttribute("id"))->appendChild(
					$xmlDoc->createTextNode($k+1));

	$dicEN = $dicTag->appendChild(
			$xmlDoc->createElement("en_trans", $dic->en_trans));
	$dicAttribute = $xmlDoc->createAttribute("en_transcription");
	$dicAttribute->value = $dic->en_transcription;
	$dicEN->appendChild($dicAttribute);
	
	$dicAttribute2 = $xmlDoc->createAttribute("en_type");
	$dicAttribute2->value = $dic->en_type;
	$dicEN->appendChild($dicAttribute2);

	$dicDE = $dicTag->appendChild(
			$xmlDoc->createElement("de_trans", $dic->de_trans));
	$dicAttribute = $xmlDoc->createAttribute("de_transcription");
	$dicAttribute->value = $dic->de_transcription;
	$dicDE->appendChild($dicAttribute);
	
	$dicAttribute2 = $xmlDoc->createAttribute("de_type");
	$dicAttribute2->value = $dic->de_type;
	$dicDE->appendChild($dicAttribute2);
			
	$dicBG = $dicTag->appendChild(
			$xmlDoc->createElement("bg_trans", $dic->bg_trans));
	
	$dicAttribute = $xmlDoc->createAttribute("bg_transcription");
	$dicAttribute->value = $dic->bg_transcription;
	$dicBG->appendChild($dicAttribute);
	
	$dicAttribute2 = $xmlDoc->createAttribute("bg_type");
	$dicAttribute2->value = $dic->bg_type;
	$dicBG->appendChild($dicAttribute2);
	
	$dicTag->appendChild(
			$xmlDoc->createElement("imgURL", $dic->imgURL));
	
}
$root->appendChild(
		$xmlDoc->createAttribute("wordCount"))->appendChild(
				$xmlDoc->createTextNode(count($dictionary)));
echo $xmlDoc->save('content.xml');
