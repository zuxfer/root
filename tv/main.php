<?php

date_default_timezone_set('Asia/Calcutta');
$dw = date( "w", time());

echo "<h1>Today is ".date('l',time())."</h2>";
$array = array(
    1 => array(
    	"tt2356777" => "True Detective",
    	"tt0904208" => "Californication",
    	"tt1586680" => "Shameless",
    	"tt0944947" => "Game of Thrones",
    	"tt1475582" => "Sherlock",
    	"tt1796960" => "Homeland",
    	"tt1870479" => "Newsroom",
    	"tt2137109" => "Masters of Sex",
    	"tt1844624" => "American Horror Story",
    	"tt2575988" => "Silicon Valley"
    	),
    2 => array(
    	"tt1219024" => "Castle"
    	),
    3 => array(
    	"tt1839578" => "Person of Interest"
    	),
    4 => array(
    	"tt1442437" => "Modern Family"
    	),
    5 => array(
    	"tt0898266" => "The Big Bang Theory",
    	"tt0369179" => "Two and a Half Men",
    	"tt1632701" => "Suits",
    	"tt1358522" => "White Collar",
    	"tt1266020" => "Parks and Recreation",
    	"tt2802850" => "Fargo"
    	),
    6 => array(),
    0 => array(
    	"tt1856010" => "House of Cards",
    	"tt2085059" => "Black Mirror"
    	)
);

function array_find_deep($array, $search, $keys = array())
{
    foreach($array as $key => $value) {
        if (is_array($value)) {
            $sub = array_find_deep($value, $search, array_merge($keys, array($key)));
            if (count($sub)) {
                return $sub;
            }
        } elseif ($value === $search) {
            return array_merge($keys, array($key));
        }
    }

    return array();
}
$m = (date("M") != "May") ? date("M.") : date("M");
$d =  (date("j")-1)." ".$m." ".date("Y"); 

foreach ($array[$dw] as $id => $value){
	$url = "http://www.myapifilms.com/search?idIMDB=".$id."&seasons=1";
	$txt=file_get_contents($url);

	$data = json_decode($txt,true);
	//foreach($data['seasons'] as $sdata){
		//foreach($sdata["episodes"] as $edata) {
			//echo $edata["title"]."<br>";
			//echo $edata["date"]."<br>";
			//echo $edata["plot"]."<br><hr>";
		//}
	//}
	$p = array_find_deep($data,$d);
	if($data['seasons'][$p[1]]['episodes'][$p[3]]["title"]){
        echo "<h3>".$value."</h3>";
        echo "S".($p[1]+1)."E".($p[3]+1)." - ";
        echo $data['seasons'][$p[1]]['episodes'][$p[3]]["title"]." - ";
		echo $data['seasons'][$p[1]]['episodes'][$p[3]]["title"];
		echo "<hr>";
	}
	else{
		echo "No episodes for - <strong>".$value."</strong><br>";
	}
}


?>
