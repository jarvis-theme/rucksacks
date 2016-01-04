<div id="site-wrapper">
	<div class="breadcrumbs-wrapper">
		<div class="container">
			<div class="row">
				<div class="col-xs-12 col-sm-12 col-lg-12 center-sm">
					<div class="breadcrumbs">
						<ul class="unstyled">
							<li><a href="{{URL::to('/')}}">Home</a></li>
							<li class="active">Syarat dan Ketentuan</li>
						</ul>
					</div>
				</div>
				
				<div class="col-xs-12 col-sm-12 space20 visible-xs"></div>
			</div>
		</div>
	</div>
	
	<!-- SIDEBAR + MAIN CONTENT CONTAINER -->
	<div class="main-content category-page">
		<div class="container">
			<div class="row">
				<!-- SIDE BAR -->
				<div class="col-xs-12 col-sm-4 col-lg-3 sidebar">
					<!-- CATEGORIES LIST -->
					<div class="section category-list module-list-items">
						<h4 class="section-title">Halaman Lain</h4>
						<div class="section-inner">
							<ul class="unstyled pretty-list cl-effect-1">
								<li><a href="{{URL::to('testimoni')}}">Testimonial</a></li>
								<li><a href="{{URL::to('konfirmasiorder')}}">Konfirmasi Pembayaran</a></li>
								<li><a href="{{URL::to('service')}}">Syarat dan Ketentuan</a></li>
								<li><a href="{{URL::to('produk')}}">Koleksi Produk</a></li>
								<li><a href="{{URL::to('blog')}}">Blog</a></li>
							</ul>
						</div>
					</div>
					<!-- /CATEGORIES LIST -->
				</div>
				<!-- /SIDE BAR -->

				<!-- MAIN CONTENT -->
				<div class="col-xs-12 col-sm-8 col-lg-9 main">
					<div class="row">
						<div class="col-xs-12 col-sm-12 col-md-12 col-lg-12 section">
							<!-- <div class="cat-image"><h1>Costumer Service</h1></div> -->
						</div>
						<div class="col-xs-12 col-sm-12 space20 visible-xs"></div>

						<div class="col-xs-12 col-sm-12 col-md-12 col-lg-12 desc-out">
							<div class="description">
								<h3>Kebijakan Layanan</h3>
								{{$service->tos}}
							</div>
						</div>
						<div class="col-xs-12 col-sm-12 col-md-12 col-lg-12 desc-out">
							<div class="description">
								<h3>Kebijakan Pengembalian</h3>
								{{$service->refund}}
							</div>
						</div>
						<div class="col-xs-12 col-sm-12 col-md-12 col-lg-12 desc-out">
							<div class="description">
								<h3>Kebijakan Privasi</h3>
								{{$service->privacy}}
							</div>
						</div>
					</div>

					<div class="clearfix "></div>
					<!-- SUB CATEGORY -->
				</div>
				<!-- /MAIN CONTENT -->
			</div>
		</div>
	</div>
	<!-- /MAIN CONTENT -->
</div>