<?php
    //Setup varables
    $pageTitle = "Image";
   
        
    //Add Template Pages
    include '../template/headTags.php';
    include '../template/header.php';


$json = <<< JSON
{
"1":{
		"imageSrc":"../assets/images/Beaming%20Brisbane_Brisbane-CBD_Scott-Letts.jpg",
		"imageName":"Beaming Brisbane CBD",
		"imageDesc":"Beaming Brisbane Description Lorem ipsum dolor sit amet, consectetur adipisicing elit. Dolor beatae sequi, hic vero libero iste, voluptatibus molestiae dolore maiores voluptate sint exercitationem illum. Nisi blanditiis architecto, earum. Facere, quam, a."
	},
"2":{
		"imageSrc":"../assets/images/Blue%20Mountains--6.jpg",
		"imageName":"Blue Mountains",
		"imageDesc":"Blue Mountains Desc Lorem ipsum dolor sit amet, consectetur adipisicing elit. Dolor beatae sequi, hic vero libero iste, voluptatibus molestiae dolore maiores voluptate sint exercitationem illum. Nisi blanditiis architecto, earum. Facere, quam, a."

	},
"3":{
		"imageSrc":"../assets/images/Reflected%20Storm_Shorncliffe-Jetty_Scott-Letts.jpg",
		"imageName":"Reflected Storm Shorncliffe",
		"imageDesc":"Reflected Storm Shorncliffe Lorem ipsum dolor sit amet, consectetur adipisicing elit. Dolor beatae sequi, hic vero libero iste, voluptatibus molestiae dolore maiores voluptate sint exercitationem illum. Nisi blanditiis architecto, earum. Facere, quam, a."

	}


}
JSON;

$jsonIterator = new RecursiveIteratorIterator(
    new RecursiveArrayIterator(json_decode($json, TRUE)),
    RecursiveIteratorIterator::SELF_FIRST);

foreach ($jsonIterator as $key => $val) {
			$imageSRC = "";
			$Name = "";
			$desc = "";		
			if(is_array($val) && $key == $_GET["id"]) {
				foreach ($val as $key2 => $val2) {
					if($key2=="imageSrc")
						{
							$imageSRC = $val2;
						}
					else if($key2=="imageName")
						{
							$Name = $val2;
						} 
					else if($key2=="imageDesc")
						{
							$desc = $val2;
						} 
					else 
						{
						break;
						}
				}
				echo '
				<div class="container">
				<div class="row">
				<div class="col-md-7 col-xs-12">
  			<!-- Image -->
  			<img src="'.$imageSRC.'" alt="' . $Name .'" class="img-fluid">
  			<br>
  			<h2>' . $Name .'</h2>
  			<hr>
  			<p>' . $desc .'</p>
				</div>
				<div class="col-md-5 col-xs-12">
				<h2>About This Image</h2>
				<hr>
				<p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Amet nemo, adipisci iste pariatur impedit cupiditate culpa consectetur beatae distinctio repudiandae quaerat ea nesciunt sed libero provident accusamus, dolore praesentium nihil.</p>
				</div>
				</div>
				</div>';
			}
		}
    include '../template/footer.php';

?>