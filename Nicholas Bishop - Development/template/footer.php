
 <!-- Footer -->
    
   		<div class="row copyright mt-5 color-nickel"> 
    	
    		<p class="m-3 color-text-white font-Taj" style="font-size:120%">&copy; 2018 IndustrialTech</p>
			</div>
    
    <!-- End Footer -->
 
<!-- Stick Nav to Browser -->
<script>
    
    $(function(){
        // Check the initial Poistion of the Sticky Header
        var stickyHeaderTop = $('#Nav').offset().top;
 
        $(window).scroll(function(){
                if( $(window).scrollTop() > stickyHeaderTop ) {
                        $('#Nav').css({position: 'fixed', top: '0px', width:'100%'});
                        $('#stickyalias').css('display', 'block');
                } else {
                        $('#Nav').css({position: 'static', top: '0px',left:'0'});
                        $('#stickyalias').css('display', 'none');
                }
        });
  });
    
</script>
    
    
	</body>
  
  
</html>


