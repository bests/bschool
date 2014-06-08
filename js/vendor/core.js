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

function initialize() {
  var myLatlng = new google.maps.LatLng(59.32522, 18.07002);
  var mapOptions = {
	  scrollwheel: false,
	  scaleControl: false,
    zoom: 15,
    center: myLatlng,
    mapTypeId: google.maps.MapTypeId.ROADMAP
  }
  var map = new google.maps.Map(document.getElementById('map-canvas'), mapOptions);
var contentString = '<div id="contentt">'+
      
      'We are right here!'+
     
      
      '</div>';

  var infowindow = new google.maps.InfoWindow({
      content: contentString,
	   maxWidth: 200
  });
 
 
 
 var icon = new google.maps.MarkerImage("img/marker.png", null, null, null, new google.maps.Size(41.5,59));
  var marker = new google.maps.Marker({
      position: myLatlng,
	  animation: google.maps.Animation.DROP,
      map: map,
	
	  icon: icon,
      title: 'Hello World!'
  });
   google.maps.event.addListener(marker, 'click', function() {
    infowindow.open(map,marker);
  });
}

google.maps.event.addDomListener(window, 'load', initialize);

//End

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




