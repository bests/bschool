
	
$("body").on("activate", function(e)
{

$('#menu-arrowx').css("visibility", "visible");
 var $item = $(e.target);
  
$(".seven li").addClass("bounce");
$(".seven li").siblings().removeClass("bounce");

if (e.originalEvent === undefined) {
   
		
var $item2 =$item.offset().left + $item.width() / 2 - 10 - $('#navbar').offset().left;

$("#menu-arrowx").css('left',$item2 + 'px');

}

});	

$(window).on('resize', function(event){
	
clearTimeout(this.id);
    this.id = setTimeout(moveline, 500);

    });
function moveline(){
	var $item = $(".seven li.active");
	var $item2 =$item.offset().left + $item.width() / 2 - 10 - $('#navbar').offset().left;
  $("#menu-arrowx").css( "left", $item2 );
  $(".navi").attr('style', 'width:auto');
}
 