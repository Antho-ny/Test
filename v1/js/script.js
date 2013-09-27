$(function(){
    $('#slides').slides({
            preload: true,
            preloadImage: 'img/loading.gif',
            play: 5000,
            pause: 2500,
            hoverPause: true
    });
});

$(document).ready(function(){
    $("#formulairecontact").validate(  
    );      
});

$(document).ready(function(){
    $("#formconcours").validate(  
    );      
});


$(document).ready(function(){

//Larger thumbnail preview 

$("ul.thumb li").hover(function() {
	$(this).css({'z-index' : '10'});
	$(this).find('img').addClass("hover").stop()
		.animate({
			marginTop: '-110px', 
			marginLeft: '-110px', 
			top: '50%', 
			left: '50%', 
			width: '174px', 
			height: '174px',
			padding: '20px' 
		}, 200);
	
	} , function() {
	$(this).css({'z-index' : '0'});
	$(this).find('img').removeClass("hover").stop()
		.animate({
			marginTop: '0', 
			marginLeft: '0',
			top: '0', 
			left: '0', 
			width: '100px', 
			height: '100px', 
			padding: '5px'
		}, 400);
});

//Swap Image on Click
	$("ul.thumb li a").click(function() {
		
		var mainImage = $(this).attr("href"); //Find Image Name
		$("#main_view img").attr({ src: mainImage });
		return false;		
	});
 
});


/*$(document).ready(function(){

    $("#btnJouer").click(function(){
	if ($("#formconcours").is(":hidden")){
	    $("#formconcours").slideDown("slow");
	}
	else{
	    $("#formconcours").slideUp("slow");
	}
    });
    
});*/

function closeForm(){
    $("#messageSent").show("slow");
    setTimeout('$("#messageSent").hide();', 2000);
}

$(document).ready(function(){
    $('div.contact a.submit').click(function() {
        var name = $('div.contact input.name').val();
        var email = $('div.contact input.email').val();
        var message = $('div.contact textarea.message').val();
        $('div.contact').slideUp('slow', function() {
            $.ajax({
                type: "POST",
                url: "test.php",
                data: "name=" + name + "&email=" + email + "&message=" + message,
                success: function(msg)
                {
                    $('div.contact').html('<h1>Contact</h1><div class="comment">Success!</div><div class="clear"></div><p class="indent">Thank you, we will be in contact shortly.</p>');
                    $('div.contact').slideDown('slow');
                }//end of success
            });//end of ajax
        });
    });
});



