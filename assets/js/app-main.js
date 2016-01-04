var dirTema = document.querySelector("meta[name='theme_path']").getAttribute('content');

require.config({
	baseUrl: '/',
    urlArgs: "v=001",
	waitSeconds : 60,
	shim: {
		"bootstrap"	: {
			deps : ['jquery'],
		},
		"caroufredsel" : {
			deps : ['jquery'],
		},
		"flexslider" : {
			deps : ['jquery','lib_packages'],
		},
		"dl_menu" : {
			deps : ['jquery','modernizr'],
		},
		"mixitup" : {
			deps : ['jquery'],
		},
		'jq_ui' : {
			deps : ['jquery'],
		},
		"noty" : {
			deps : ['jquery'],
		},
		"hoverIntent" : {
			deps : ['jquery'],
		},
		"pretty_check" : {
			deps : ['jquery'],
		},
		"jq_zoom" : {
			deps : ['jquery'],
		},
		"waypoint" : {
			deps : ['jquery'],
		},
		"nouislider" : {
			deps : ['jquery'],
		},
		"ddaccordion" : {
			deps : ['jquery'],
		},
		"lib_packages" : {
			deps : ['jquery'],
			exports: 'lib_packages'
		}
	},

	paths: {
		jquery 			: dirTema+'/assets/js/lib/jquery.min',
		bootstrap 		: dirTema+'/assets/js/lib/bootstrap.min',
		carouFredSel	: dirTema+'/assets/js/lib/jquery.carouFredSel.min',
		cart			: 'js/shop_cart',
		ddaccordion		: dirTema+'/assets/js/lib/ddaccordion',
		dl_menu			: dirTema+'/assets/js/lib/dlMenu',
		flexslider		: dirTema+'/assets/js/lib/jquery.flexslider.min',
		hoverIntent		: dirTema+'/assets/js/lib/hoverIntent',
		images_loaded	: dirTema+'/assets/js/lib/imagesLoaded',
		jq_ui			: 'js/jquery-ui',
		jq_zoom			: dirTema+'/assets/js/lib/jquery.zoom-min',
		lib_packages	: dirTema+'/assets/js/lib/package.min',
		mixitup			: dirTema+'/assets/js/lib/jquery.mixitup.min',
		modernizr		: dirTema+'/assets/js/lib/modernizr.min',
		noty			: 'js/jquery.noty',
		nouislider		: dirTema+'/assets/js/lib/jquery.nouislider.min',
		scripts			: dirTema+'/assets/js/lib/scripts',
		pretty_check	: dirTema+'/assets/js/lib/prettyCheckable',
		waypoint		: dirTema+'/assets/js/lib/waypoint',

		// ROUTE
		router          : 'js/router',

		// CONTROLLER
		home            : dirTema+'/assets/js/pages/home',
		main            : dirTema+'/assets/js/pages/default',
		produk          : dirTema+'/assets/js/pages/produk',
	}
});
require([
	'router',
	'bootstrap',
	'main',
	'cart',
], function(router,b,main,cart){
	router.define('/','home@run');
	router.define('home', 'home@run');
	router.define('produk/*', 'produk@run');
	
	main.run();
	router.run();
	cart.run();
});