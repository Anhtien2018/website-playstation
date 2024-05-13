// $(document).ready(function() {
//     $('a').on('click',function(e) {
//         e.preventDefault();
//         alert(122);  
//     })
// })
$("#search_input_box").hide();
    $("#search").on("click", function () {
        $("#search_input_box").slideToggle();
        $("#search_input").focus();
    });
    $("#close_search").on("click", function () {
        $('#search_input_box').slideUp(500);
    });

    /*==========================
		javaScript for sticky header
		============================*/
			$(".sticky-header").sticky();
            $(".s_Product_carousel").owlCarousel({
                items:1,
                autoplay:false,
                autoplayTimeout: 5000,
                loop:true,
                nav:false,
                dots:true
              });
              
            $(".active-banner-slider").owlCarousel({
                items:1,
                autoplay:false,
                autoplayTimeout: 5000,
                loop:true,
                nav:true,
                navText:["<img src='img/banner/prev.png'>","<img src='img/banner/next.png'>"],
                dots:false
            });
            $(function(){

                if(document.getElementById("price-range")){
                
                var nonLinearSlider = document.getElementById('price-range');
                
                noUiSlider.create(nonLinearSlider, {
                    connect: true,
                    behaviour: 'tap',
                    start: [ 500, 4000 ],
                    range: {
                        // Starting at 500, step the value by 500,
                        // until 4000 is reached. From there, step by 1000.
                        'min': [ 0 ],
                        '10%': [ 500, 500 ],
                        '50%': [ 4000, 1000 ],
                        'max': [ 10000 ]
                    }
                });
        
        
                var nodes = [
                    document.getElementById('lower-value'), // 0
                    document.getElementById('upper-value')  // 1
                ];
        
                // Display the slider value and how far the handle moved
                // from the left edge of the slider.
                nonLinearSlider.noUiSlider.on('update', function ( values, handle, unencoded, isTap, positions ) {
                    nodes[handle].innerHTML = values[handle];
                });
        
                }
        
            });        