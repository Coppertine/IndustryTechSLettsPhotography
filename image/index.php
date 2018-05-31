<?php
    //Setup varables
    $pageTitle = "Image";
   
        
    //Add Template Pages
    include '../template/headTags.php';
echo ' <style>
			
		/* Make the image Trigerable */
		#image {
			border-radius: 5px;
			cursor:pointer;
			transition: 0.3s;
		}
		
		#image:hover {
			opacity: 0.7;
		} 
		
		/* Setup the Modal Style to be hidden until needed */
		.modal {
			display: none;
			position: fixed;
			z-index: 999; /* Can\'t use 1 as it is not the top of the page as 99 is used by the nav */
			padding-top: 10%;
			left:0;
			top: 0;
			width: 100%;
			height: 100%;
			background-color: rgb(0,0,0); /* Fallback color */
    	background-color: rgba(0,0,0,0.9); /* Black w/ opacity */
		}
		
		/* Style the modal image */
		.modalImage {
			margin: auto;
			display: block;
			width: 90%;
			max-width: 800px;
					
		}
		
		/* Caption of Modal Image (Image Text) - Make the caption the Same Width as the Image */
		#caption {
				margin: auto;
				display: block;
				width: 80%;
				max-width: 700px;
				text-align: center;
				color: #ccc; /* Colour it white */
				padding: 10px 0;
				height: 150px;
		}
		
		/* Add Animation - Zoom in the Modal */
	.modalImage, #caption { 
			animation-name: zoom;
			animation-duration: 0.6s;
	}
		
			@keyframes zoom {
			from {transform:scale(0)} 
			to {transform:scale(1)}
	}
		
		/* The Close Button */
	.close {
			position: absolute;
			top: 15px;
			right: 35px;
			color: #f1f1f1;
			font-size: 40px;
			font-weight: bold;
			transition: 0.3s;
	}
		
		/* When Close button is Hovered or Focused by the mouse, make it change color and change the cursor */
	.close:hover,
	.close:focus {
			color: #bbb;
			text-decoration: none;
			cursor: pointer;
	}
		
			/* 100% Image Width on Smaller Screens smaller than 700px */
	@media only screen and (max-width: 700px){
			.modal-content {
					width: 100%;
			}
	}

		
		</style>';
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
  			<img src="'.$imageSRC.'" alt="' . $Name .'" class="img-fluid" id="image">
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
		
	echo '
	  <!-- Model for Image -->
  <div class="modal" id="imageModal">
  
  	<!-- Close button Modal -->
  	<span class="close">&times;</span>
  	
  	<!-- Modal Image -->
  	<img src="" alt="" class="modalImage" id="img1">
  	
  	<!-- Caption -->
  	<div id="caption"></div>
  </div>
	
	<!-- Modal Code -->
   <script>
			
		 
		 $("#image").click(function() {
			 $("#imageModal").show();
			 $(".modalImage").attr("src",$("#image").attr("src"));
			 
			 $("#caption").text($("#image").attr("alt"));
		 });
		 
		 //Close the Modal if clicked anywhere on the page
		 $("#imageModal").click(function() {
			 $("#imageModal").hide();
			 
		 });
	</script>';
    include '../template/footer.php';

?>