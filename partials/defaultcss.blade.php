{{generate_theme_css('rucksacks/assets/css/fonts/open-sans/stylesheet.css')}} 
{{generate_theme_css('rucksacks/assets/css/fonts/icomoon/style.css')}} 
{{generate_theme_css('rucksacks/assets/css/bootstrap.min.css')}} 
@if($tema->isiCss=='')
	{{generate_theme_css('rucksacks/assets/css/style.css?v=001')}} 
@else
	{{generate_theme_css('rucksacks/assets/css/editstyle.css')}} 
@endif
{{generate_theme_css('rucksacks/assets/css/responsive.css')}} 
{{generate_theme_css('rucksacks/assets/css/animate.css')}} 
{{generate_theme_css('rucksacks/assets/css/flexslider/flexslider.css')}} 
{{generate_theme_css('rucksacks/assets/css/flexslider/default.css')}} 

{{favicon()}} 