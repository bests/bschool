$(document).ready(function(){
// ================
// Mosaic Plugn
// Controls projects section, hover images
// More info http://buildinternet.com/project/mosaic/
// ================
$('.cover2').mosaic({
					animation	:	'slide',	//fade or slide
					anchor_y	:	'top',		//Vertical anchor position
					hover_y		:	'90px',
					speed:20		//Vertical position on hover
				});	
$('.team').mosaic({
					animation	:	'slide',	//fade or slide
					hover_x		:	'400px',
					speed:350		//Horizontal position on hover
				});
	
var $modal = $('#ajax-modal');

$('.ajax').on('click', function(){
	var $target = $(this).data('info');

  $('body').modalmanager('loading');
 
  setTimeout(function(){
     $modal.load($target, '', function(){
      $modal.modal();
    });
  }, 1000);
});


// ================
// Section Features
// ================


 
 
 
 
 
$modal.on('click', '.update', function(){
  $modal.modal('loading');
  setTimeout(function(){
    $modal
      .modal('loading')
      .find('.modal-body')
        .prepend('<div class="alert alert-info fade in">' +
          'Updated!<star@2x type="star@2x" class="close" data-dismiss="alert">&times;</star@2x>' +
        '</div>');
  }, 1000);
});
	

$('.seven a:link').smoothScroll();




	





	

$("img.b").hover(
function() {
$(this).stop().animate({"opacity": "1","-ms-filter":"progid:DXImageTransform.Microsoft.Alpha(opacity=100)"}, "800");
},
function() {
$(this).stop().animate({"opacity": "0","-ms-filter":"progid:DXImageTransform.Microsoft.Alpha(opacity=0)"}, "fast");
});


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


});



$('.clickslider').click(function(e) {
	
	e.preventDefault();
	
});
$('.closeButton').click(function(e) {
    


  $('.box').animate({"left":"-130%"},200,"linear");
$('.box-container').animate({"left":"-130%"},200,"linear");
$('.box').css({'display': 'hidden'});
	e.preventDefault();
	
});


$('.servicelink').click(function(e) {
	
		
//$('.accordion-service').collapse('show');
	
	
	
	//$('.projects').fadeToggle(400);
	//$('.slider1').scrollTo($(this).attr('href'), 1400, {offset: {left:-lefto} }, { axis:'x' } );
	//alert('-'+lefto);
	//$.scrollTo('3000px', 2500, {axis:'x'}); 
});







$('.ajax2').click(function(e) {
	//alert($(this).attr('href'));
 $('#hugex').html('<div class="progress progress-striped active"><div class="bar" style="width: 100%"></div></div>');		
$('.accordion-body').collapse('show');
	
	
	//$.scrollTo($(this).attr('href'), 1400, {offset: {top:-280} });
  $.smoothScroll({
		  speed: 400,
    offset: -90,
    scrollTarget:$(this).attr('href'),
	afterScroll: function() {
	
		//$('.projects').fadeOut(400);
		
		}
  });
  var $target = $(this).data('info');
  
    $('#hugex').load($target+'.html',function(){
            $('#loadingdiv').hide();
        });
	$(".projects").attr("href", '#'+$target);
	

	e.preventDefault();
	
	//$('.projects').fadeToggle(400);
	//$('.slider1').scrollTo($(this).attr('href'), 1400, {offset: {left:-lefto} }, { axis:'x' } );
	//alert('-'+lefto);
	//$.scrollTo('3000px', 2500, {axis:'x'}); 
});

$('body').on('click', '.projects', function() {
	$('.accordion-body').collapse('hide');
var pHeight = jQuery(window).height();
	 var $target = $(this).attr('href');//alert($target);  
	  var eHeight = $('#one').height();
	 
	  var $totop =  (pHeight/2 - (eHeight / 2));	
	
	 
	  $.smoothScroll({
		  speed: 400,
    offset: -100,
    scrollTarget: $target,
	afterScroll: function() {
		
1		//$('.projects').fadeOut(400);
		
		}
  });


 // 
 //$.scrollTo($target, 1400);
  e.preventDefault();
   // $('#hugex').load($target, function(){
       
  // });
	
});
$('.pro23').click(function(e) {
	
	 
	
var $target = $(this).data('info');
$('.box').css({'display': 'block',' padding':'2px'});

 $('.box-container').html($($target).html());
 $(".closeButton")
    .appendTo(".box-container");
 
 var pWidth = jQuery(window).width();
 var pHeight = jQuery(window).height();
	  var eWidth = $('.box-container').outerWidth();
	  var eHeight = $('.box-container').height();
	  var lefto =  parseInt((pWidth / 2) - (eWidth / 2)) + 'px';
	  var totop =  (pHeight/2 - (eHeight / 2)) + 'px';	
$('.box-container').css({"top":totop});	
$('.box').animate({"left":'0'},200,"linear");

$('.box-container').animate({"left":lefto},200,"linear");



      

e.preventDefault();
	
});
$('.pro2').click(function(e) {
	
	 
	
var $target = $(this).data('info');
$('.box').css({'display': 'block',' padding':'2px'});

 $('.box-container').html($($target).html());
 $(".closeButton")
    .appendTo(".box-container");
 
 var pWidth = jQuery(window).width();
 var pHeight = jQuery(window).height();
	  var eWidth = $('.box-container').outerWidth();
	  var eHeight = $('.box-container').height();
	  var lefto =  parseInt((pWidth / 2) - (eWidth / 2)) + 'px';
	  var totop =  (pHeight/2 - (eHeight / 2)) + 'px';	
$('.box-container').css({"top":totop});	
$('.box').animate({"left":'0'},200,"linear");

$('.box-container').animate({"left":lefto},200,"linear");



      

e.preventDefault();
	
});

$('#myTab a').click(function (e) {
  e.preventDefault();
  $(this).tab('show');
  
 
  
})

$('.pro').click(function(e) {
	
	
	
var $target = $(this).data('info');
$('.box').css({'display': 'block',' padding':'2px'});

 $('.box-container').html($($target).html());
 
 
 var pWidth = jQuery(window).width();
 var pHeight = jQuery(window).height();
	  var eWidth = $('.box-container').outerWidth();
	  var eHeight = $('.box-container').height();
	  var lefto =  parseInt((pWidth / 2) - (eWidth / 2)) + 'px';
	  var totop =  (pHeight/2 - (eHeight / 2)) + 'px';	
$('.box-container').css({"top":totop});	
$('.box').animate({"left":'0'},200,"linear");

$('.box-container').animate({"left":"50%"},200,"linear");



      

e.preventDefault();
	
});

function centerMe(element) {
    //pass element name to be centered on screen
    var pWidth = jQuery(window).width();
    var pTop = jQuery(window).scrollTop()
    var eWidth = jQuery(element).width()
    jQuery(element).css('top', pTop + 100 + 'px')
    jQuery(element).css('left', parseInt((pWidth / 2) - (eWidth / 2)) + 'px')
}
$('.btn-infvo').click(function(e) {
	 var pWidth = jQuery(window).width();
	  var eWidth = $('.box').width();
	  var lefto =  parseInt((pWidth / 2) - (eWidth / 2)) + 'px';
	//$('.box').animate().css('left', parseInt((pWidth / 2) - (eWidth / 2)) + 'px')

  $('.box').animate({"left":lefto},200);
	e.preventDefault();
	
});

//$(function menuswipe() {
		//	var pull 		= $('#pull');
		//		menu 		= $('nav ul');
		//		menuHeight	= menu.height();

		//	$(pull).on('click', function(e) {
			//	e.preventDefault();
		//		menu.slideToggle('100','linear');
		//	});

		//	$(window).resize(function(){
        	//	var w = $(window).width();
        	//	if(w > 320 && menu.is(':hidden')) {
        	//		menu.removeAttr('style');
        	//	}
    		//});
		//});




$('.tooltp').tooltip();

// $(function(){
	//	$('.jumbotron').css({'height':($(window).height())+'px'});
	//	$(window).resize(function(){
	//	$('.jumbotron').css({'height':($(window).height())+'px'});
	//	});
//	});
 
 $('.coloranim').hover(
    function() {
      $(this).stop().animate({"opacity": "0.5","-ms-filter":"progid:DXImageTransform.Microsoft.Alpha(opacity=100)"}, "50");
    },
    function() {
      $(this).stop().animate({"opacity": "1","-ms-filter":"progid:DXImageTransform.Microsoft.Alpha(opacity=0)"}, "50");
  }); 
  
$('.thumbnail').css('background-image', 'url(img/zoom.png)');  
$(".thumbnail").hover(
function() {
	
$("img.thumb1", this).stop().animate({"opacity": "0.2","-ms-filter":"progid:DXImageTransform.Microsoft.Alpha(opacity=100)"}, "fast");


},
function() {
$("img.thumb1", this).stop().animate({"opacity": "1","-ms-filter":"progid:DXImageTransform.Microsoft.Alpha(opacity=0)"}, "50");

});
jQuery.fn.center = function ()
{
	  var pWidth = jQuery(window).width();
      var pHeight = jQuery(window).height();
	  var eWidth = $(this).width();
	  var eHeight = $(this).height();
      var lefto =  parseInt((pWidth / 2) - (eWidth / 2)) + 'px';
	  var totop =  (pHeight/2 - (eHeight / 2)) + 'px';	
	$(this).css({"top":totop});	
alert(totop);
    return this;
}


if(!Modernizr.csstransitions) { 

$("body").on("activate", function(e)
{
	 
$('#menu-arrowx').css("visibility", "visible");
var $item = $(e.target);
if (e.originalEvent === undefined) {
var $item2 =$item.offset().left + $item.width() / 2 - 35 - $('#navbar').offset().left;

$("#menu-arrowx").animate(
                { left: $item2 }, {
                    duration: 'slow',
                    easing: 'easeOutBack'
                });

    }else{}
	

   
});

 $('.pricemain').hover(
    function() {
   $(this).stop().animate({boxShadow: '0 0 20px rgb(223, 223, 223)'},0.2).animate({'margin-top': '-10px'}, 'normal');
	


    },
    function() {
		
      $(this).stop().animate({'margin-top': '0'}, 'fast').animate({boxShadow: '0 0 0px rgb(223, 223, 223)'}, 'fast'); 
	
  });


$('.pulse').hover(
    function() {
 $(this).stop().animate({'margin-top': '-10px'}, 'fast');
    },
    function() {
 $(this).stop().animate({'margin-top': '0'}, 'fast');
  });
 $(function() {

 	$(".thumbnail").hover(
function() {
$("img.thumb1", this).stop().animate({"opacity": "0.5","-ms-filter":"progid:DXImageTransform.Microsoft.Alpha(opacity=100)"}, "50");

},
function() {
$("img.thumb1", this).stop().animate({"opacity": "1","-ms-filter":"progid:DXImageTransform.Microsoft.Alpha(opacity=0)"}, "50");

});

});
    }else{
$(window).on('resize', function(event){
	
clearTimeout(this.id);
    this.id = setTimeout(moveline, 500);
	
		
	
	//var $item2 = $('.prev').offset().left;
	//var $item3 =$item.offset().left + $item.width() / 2 - 35 - $('#navbar').offset().left;

	//alert($item);
	
	
//var $per = $item2 / jQuery(window).width() * 100;


   
    });
function moveline(){
	var $item = $(".seven li.active");
	var $item2 =$item.offset().left + $item.width() / 2 - 85 - $('#navbar').offset().left;
  $("#menu-arrowx").css( "left", $item2 );
}

	
	
	
	
$("body").on("activate", function(e)
{

  
	$('#menu-arrowx').css("visibility", "visible");
  var $item = $(e.target);
  

	

  $(".seven li").addClass("bounce");
   $(".seven li").siblings().removeClass("bounce");
//$('.seven li').removeClass('active');
//alert(e.target.id+" and "+$(e.target).attr('class'));
//
    if (e.originalEvent === undefined) {
   
		
		var $item2 =$item.offset().left + $item.width() / 2 - 10 - $('#navbar').offset().left;
//var $per = $item2 / jQuery(window).width() * 100;
//alert(e.target.nodeName);
//alert($(".seven li.active").width());
//$("#menu-arrowx").animate({"left":$item2}, 50,"linear");
$("#menu-arrowx").css('left',$item2 + 'px');
		//
		
		
		
    }
	


	
 
});	



		
}

      //Do processing of click event here for every element except with id menu_content





//$('.box').center();	

//$(".collapse").collapse();

$(window).resize(function(e) {
  //resize just happened, pixels changed
  //$('#menu-arrowx').css("visibility", "hidden");

});



/*---------  Screenshots Hover -------*/
if(Modernizr.input.required && Modernizr.formvalidation){

//alert('old');  
};  

Modernizr.load({
 test: Modernizr.input.required && Modernizr.formvalidation,
 nope: 'http://localhost/gitxamp/js/vendor/jquery.animate-shadow-min.js',callback: function(url, res, key) {
     alert(res);  
    }
 
});


  
  
  