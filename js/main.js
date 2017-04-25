(function($){
	$(document).ready(function(){

		//reset calculator
		$('.reset').click(function(e){
			e.preventDefault();
			//destroy all elements in droppable zone
			$("#dropzone").html('');
			//reset credits total
			$("#totalCredits").text('0');
			//reset dragable elements
			$(".module-container").css({opacity:1});
			$(".module-container").draggable({ disabled: false });
			//reset package selected
			var packages = jQuery(".package");
			packages.css({opacity:0.1});
		});

		//drag events
		$('.module-container').draggable({
			revert : true,
			stack : "#draggables",
			cursor: 'move',
			helper: "clone",
			start: function(e, ui){
			  $(ui.helper).addClass("ui-draggable-helper");
			}
		});

		//get draggables height
		var draggablesHeight = $("#draggables").height();
		$("#dropzone").css({height : (draggablesHeight - 98) + "px"})

		$('#dropzone').droppable({
			drop: handleDropEvent,
			accept: '.module-container',
			revert : "invalid"
		});

		$('.link').click(function(e){
			e.preventDefault();
			e.stopPropagation();

			var mode = $(this).attr('mode');
			$(".psq").hide();
			$("#link-"+mode).fadeIn();
		})

		$('.toggleMenu').click(function(e){
			e.preventDefault();
			e.stopPropagation();

			if($('.lateral-menu').hasClass('active')){

				$('.lateral-menu').removeClass('active');


					//add close icon
					$(this).find('i').removeClass('fa-times');
					$(this).find('i').addClass('fa-bars');

					$('.content-page').css({
					  '-webkit-transform' : 'translateX(0)',
					  '-moz-transform'    : 'translateX(0)',
					  '-ms-transform'     : 'translateX(0)',
					  '-o-transform'      : 'translateX(0)',
					  'transform'         : 'translateX(0)'
					});


			}else{

				$('.lateral-menu').addClass('active');


					//add close icon
					$(this).find('i').removeClass('fa-bars');
					$(this).find('i').addClass('fa-times');

					var moveLeft = "-230px";

					$('.content-page').css({
					  '-webkit-transform' : 'translateX(' + moveLeft + ')',
					  '-moz-transform'    : 'translateX(' + moveLeft + ')',
					  '-ms-transform'     : 'translateX(' + moveLeft + ')',
					  '-o-transform'      : 'translateX(' + moveLeft + ')',
					  'transform'         : 'translateX(' + moveLeft + ')'
					});


			}

		});

		//get vibrant colors from header to menu
		var src = $('.portfolio-post-header').attr('style').split('(');

		var img = document.createElement('img');
		img.setAttribute('src', src[1].replace(/\)/g,''))

		img.addEventListener('load', function() {
		    var vibrant = new Vibrant(img);
		    var swatches = vibrant.swatches()
		    for (var swatch in swatches)
		        if (swatches.hasOwnProperty(swatch) && swatches[swatch])


					if(swatch === "LightVibrant"){
						$('.no-image-header').find('.title').
						css('color',swatches[swatch].getHex());
						$('.toggleMenu').find('i').
						css('color',swatches[swatch].getHex());
					}
		    /*
		     * Results into:
		     * Vibrant #7a4426
		     * Muted #7b9eae
		     * DarkVibrant #348945
		     * DarkMuted #141414
		     * LightVibrant #f3ccb4
		     */
		});

		//align image to content
		$('.right-to-left,.left-to-right').find('.block-1').each(function(i,item){
			var block1 = $(item).height();
			//cada sección tiene un blok-1 y block-2 en formato de clase
		   var block2 = $(item).parent().find('.block-2');
		   //setear el mismo height al block2
		   block2.css('height',block1 + 'px');

		   $(item).parent().find('a').find('img').css('height',"100%")
	   	});

		var postDiv = $('.post-div').height();
		$('.post-legend h3').css('height',postDiv + 'px');

		//move share sidebar
		$('.share-sidebar').hide();
		var topSpacing = $('.header-image').height();

		$(window).scroll(function(t){
			var scrolled = $(window).scrollTop();

			if(scrolled >= topSpacing){
				$('.share-sidebar').show();
			}else{
				$('.share-sidebar').hide();
			}
		})

		//console.log(topSpacing)
		//$(".share-sidebar").stick_in_parent({

        //})
        /*.on("sticky_kit:bottom", function(e) {
          //$(this).parent().css({'position': 'static','top':'60px !important'});
          console.log("has stuck!");
        })
        .on("sticky_kit:unbottom", function(e) {
          //$(this).parent().css({'position': 'relative','top':'60px !important'});
          console.log("has unstuck!");
	  });*/

	});
}(jQuery));

function popupwindow(url, title, w, h) {
    var y = window.top.outerHeight / 2 + window.top.screenY - ( h / 2)
    var x = window.top.outerWidth / 2 + window.top.screenX - ( w / 2)
    return window.open(url, title, 'toolbar=no, location=no, directories=no, status=no, menubar=no, scrollbars=no, resizable=no, copyhistory=no, width='+w+', height='+h+', top='+y+', left='+x);
}

function setFavorite(post_id){
	jQuery.ajax({
		url : my_ajax_object.ajax_url,
		method : "POST",
		data : {
			action : "updateFavorite",
			post_id : post_id
		},
		success : function(response){
			var counter = parseInt(jQuery('#counter').text());
			if(isNaN(counter)){
				jQuery('#counter').text( 1 );
			}else{
				jQuery('#counter').text( counter + 1 );
			}

		},
		error : function(err){
			console.log(err)
		}
	})
}

function handleDropEvent( event, ui ) {
    var creditNumber = parseInt(ui.draggable.data( 'credit' ));
	var totalCredits = parseInt(jQuery("#totalCredits").text());
	var total = totalCredits + creditNumber;

	jQuery('#totalCredits').text(total);

	ui.draggable.draggable( 'disable' );
	jQuery(ui.draggable).css({opacity:0.2})
	jQuery("#dropzone").append(jQuery(ui.draggable).clone().css({width : "100%",opacity:1}));
	jQuery("#dropzone").find("span").css({color:"#ffffff"});

	//highlight package with number of credits

	var packages = jQuery(".package");
	packages.css({opacity:0.1});

	if(total >= 10 && total <= 30){
		jQuery('.package.startup').css({opacity:1});
	}else{
		if(total >= 31 && total <= 60){
			jQuery('.package.high').css({opacity:1});
		}else{
			if(total >= 61){
				jQuery('.package.best').css({opacity:1});
			}
		}
	}
}
