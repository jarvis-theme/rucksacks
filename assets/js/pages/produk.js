define(['jquery','jq_ui','bootstrap','carouFredSel','flexslider'], function($)
{
	return new function()
	{
		var self = this;
		self.run = function()
		{
			cartQty();
		};

		var cartQty = function(){
			// Quantity increment/decrement button set
			$('.qty-btngroup').each(function() {
				var $this = $(this),
					$input = $this.children('input[type="text"]'),
					val = $input.val();
				$this.children('.plus').on('click', function() {
					$input.val( ++val );
				});
				$this.children('.minus').on('click', function() {
					if ( val == 0 ) return;
					$input.val( --val );
				});
			});
			
			$('.my-cart .remove-item').on('click', function(e) {
				e.preventDefault();
				$(this).closest('tr').fadeOut(400, function() {
					$(this).remove();
				});
			});
		};
	};
});