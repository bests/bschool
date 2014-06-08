$(document).ready(function(){
$(".off").click(function(e) {
      
		if ($('.move').hasClass('slideInLeft')){
			 //$(".navi").attr('style', 'width:100px');
 $(".move").removeClass("slideInLeft");
 $(".move").addClass("slideOutLeft");
   $(".move").one('webkitAnimationEnd oanimationend msAnimationEnd animationend',   
    function(e) {
    $(".move").removeClass("slideOutLeft");
  
    });
}else{
	$(".move").removeClass("slideOutLeft");
  	$(".move").addClass("slideInLeft");
}
	
		
		
          //changeContent(e.target.innerText);
        });

		
		
	$(".off").click(function(e) {
    
	$('#home').toggleClass('activemove');

		
          //changeContent(e.target.innerText);
        });	
		

// Start
// Controls carousel services, when you click on a service the carousel moves.
// The html looks like this :  <div class="col-xs-6 col-sm-3 left-text fetwidth bluegreen servicelink" data-info="1"> , data-info="1" contains the number that corresponds to the slide.
$('#slider1').tinycarousel({ start: 2,controls: false,axis: 'y'});
 var oSlider7 = $('#slider1');
 
 $('.servicelink').click(function(){ 

// Add class, so the user knows which button is active
 
$('.fetwidth').removeClass("srvactive");

// This checks if the screen is 767px or smaller and if the device is touch, if it is then we move the viewport to the the slide. 
if (Modernizr.mq('only screen and (max-width: 767px)') && Modernizr.touch) {
   $.smoothScroll({
      speed: 900,
    offset: -490,
    scrollTarget:'.viewport',
  afterScroll: function() {
  
    
    
    }
  });
  
  
  
  
}

$(this).addClass("srvactive");
 
 // Get the number that the carousel must move too. It can be 1 to 4 because we have 4 buttons.
  var $target = $(this).data('info');
 
 // The carousel moves the slides to the position in $target.
    oSlider7.tinycarousel_move($target);
    return false;
});

// END 



// Start

// Google Maps

//End
$('.navi').navobile({
    'cta': '.navbar-brand',
    'easing': 'easeQuintOut',  'content':'.content'
});
$('.parallax-1').parallax("80%", 0.3);
$('.parallax-1 .container').waypoint(function() {
    $(this).delay(10).animate({opacity:1,bottom:"-20px"},2000);
}, { offset: 600 });

$('.fetwidth').waypoint(function() {
   
$('.fetwidth').each(function(i){
    var row = $(this);
  setTimeout(function() {
    
    row.addClass("animate-lft");
          //row.toggleClass('flip', !row.hasClass('flip'));
      },200*i);
  
});
    

   
}, { offset: 400 });



//Start
// Jquery smoothscroll plugin, controls the links in #Navbar <Ul class="Seven">
$('.seven a:link').smoothScroll();
//END


$('.navbar').on('click', function(){
        if( $('#sidebar').is(':visible') ) {
            $('#sidebar').animate({ 'width': '0px' }, 'slow', function(){
                $('#sidebar').hide();
            });
            $('#main-content').animate({ 'margin-left': '0px' }, 'slow');
        }
        else {
            $('#sidebar').show();
            $('#sidebar').animate({ 'width': '210px' }, 'slow');
            $('#main-content').animate({ 'margin-left': '210px' }, 'slow');
        }
    });

































});




