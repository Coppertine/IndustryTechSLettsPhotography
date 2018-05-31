

<div class="container">
   <div class="row">



<?php


$json = <<< JSON
{
"1":{
		"imageSrc":"../assets/images/Beaming%20Brisbane_Brisbane-CBD_Scott-Letts.jpg",
		"imageName":"Beaming Brisbane CBD",
		"imageDesc":"Beaming Brisbane Description"
	},
"2":{
		"imageSrc":"../assets/images/Blue%20Mountains--6.jpg",
		"imageName":"Blue Mountains",
		"imageDesc":"Blue Mountains Desc"
		
	},
"3":{
		"imageSrc":"../assets/images/Reflected%20Storm_Shorncliffe-Jetty_Scott-Letts.jpg",
		"imageName":"Reflected Storm Shorncliffe",
		"imageDesc":"Reflected Storm Shorncliffe"
		
	},
"4":{

}

}
JSON;

$jsonIterator = new RecursiveIteratorIterator(
    new RecursiveArrayIterator(json_decode($json, TRUE)),
    RecursiveIteratorIterator::SELF_FIRST);

foreach ($jsonIterator as $key => $val) {
 
	$imageSRC = "";
	$Name = "";
	$imageID = "";

	if(is_array($val)) {
		$imageID = $key;
		foreach ($val as $key2 => $val2) {
    	if($key2=="imageSrc")
				{
					$imageSRC = $val2;
				}
		else if($key2=="imageName")
				{
					$Name = $val2;
				} 
			else {
			break;
		}
		
	
    }
		echo "<div class=\"col-sm-4\">
				<a href=\"../image?id=$imageID\">
   			<img src=\"$imageSRC\" alt=\"$Name\" class=\"img-thumbnail\">
				</a>
   		</div>";
}
	
}




?>


</div>
</div>