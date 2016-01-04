define(['jquery','flexslider','carouFredSel'], function($, flexslider, carouFredSel)
{
	return new function()
	{
		var self = this;
		self.run = function()
		{
			slideshow();
			initialCarousel();
		};

		var slideshow = function(){
			var $slider = $('#top-slider > .flexslider');
	        
            $slider.flexslider({
                animation: 'slide',
                easing: 'easeInBack',
                useCSS: false,
                animationSpeed: 1000,
                slideshow: true,
                smoothHeight: true,
                start: function(slider) {
                    // wrap control nav inside container
                    var $controlNav = $slider.find('.flex-control-nav');                    
                    $controlNav.wrap('<div class="flex-pagination-container" />').wrap('<div class="container" />').wrap('<div class="col-xs-12 col-sm-12" />');
                    $controlNav.fadeIn();
                }
            });
	        $(window).on('throttledresize', function() {
	            $slider.find('.flex--slide .caption-body').each(function() {
	                var $caption = $(this),
	                    captionH = $caption.outerHeight(),
	                    sliderH = $slider.height(),
	                    top = (sliderH - captionH) / 2;
	            
	                $caption.css( 'top', top + 'px' );
	            });
	        });
		};

		var initialCarousel = function(){
			// Initialize carousel
			
			$('.carousel-wrapper').each(function() {
				var $this = $(this), new_max;
				var configs = new Array();
				configs['autoplay'] = $this.data('autoplay') == true;
				configs['loop'] = $this.data('loop') == true;
				configs['width'] = $this.data('width');
				configs['minItems'] = $this.data('minitems');
				configs['maxItems'] = $this.data('maxitems');
				configs['slideshowspeed'] = $this.data('slideshow-speed');
				configs['speed'] = $this.data('speed');
				
				new_max = configs['maxItems'];
				var sliderW = $this.width();
				if ( sliderW >= 980 )
				{
					if ( configs['maxItems'] > 4 ) new_max = 4;
				}
				else if ( sliderW < 980 && sliderW >= 768 )
				{
					if ( configs['maxItems'] > 3 ) new_max = 3;
				}
				else if ( sliderW < 768 && sliderW >= 640 )
				{
					if ( configs['maxItems'] > 2 ) new_max = 2;
				}
				else if ( sliderW < 640 && sliderW >= 480 )
				{
					if ( configs['maxItems'] > 2 ) new_max = 2;
				}
				else
				{
					new_max = 1;
				}
				
				configs['minWidth'] = ( isNaN(configs['width']) || configs['width'] == 'undefined' ) ? sliderW / new_max : configs['width'];

				$this.children('ul').carouFredSel({
					circular: false,
					infinite: false,
					responsive: true,
					width: '100%',
					height: 'auto',
					items: {
						visible: {
							min: configs['minItems'],
							max: configs['maxItems'],
						},
						width: configs['minWidth']
					},
					scroll: {
						easing: 'easeOutQuart'
					},
					auto: false,
					prev: {
						button: function() { return $this.closest('.carousel-iframe').find('.carousel-direction-arrows .crsl-prev'); },
						key: "left",
						duration: configs['speed']
					},
					next: {
						button: function() { return $this.closest('.carousel-iframe').find('.carousel-direction-arrows .crsl-next'); },
						key: "right",
						duration: configs['speed']
					},
					swipe: {
						onMouse: true,
						onTouch: true
					},
				});
			});
		};	

	};
});