<div class="section carousel-iframe">
    <div class="container">
        <div class="row carousel-iframe bestseller-module">
            <div class="col-xs-12 col-sm-12">
                <h4 class="section-title">Produk Baru</h4>
                <div class="section-inner">
                    <!-- carousel control nav direction -->
                    <div class="carousel-direction-arrows">
                        <ul class="direction-nav carousel-direction">
                            <li>
                                <a class="crsl-prev btn" href="#">
                                    <span class="icon-arrow-left10"></span>
                                </a>
                            </li>
                            <li>
                                <a class="crsl-next btn" href="#">
                                    <span class="icon-arrow-right9"></span>
                                </a>
                            </li>
                        </ul>
                    </div>
                    <!-- /carousel control nav direction -->
                    
                    <!-- carousel wrapper -->
                    <div class="carousel-wrapper row" data-minitems="1" data-maxitems="4" data-loop="true" data-autoplay="false" data-slideshow-speed="3000" data-speed="300">
                        <ul class="products-container product-grid carousel-list portrait ">
                            @foreach(latest_product() as $key=>$myproduk)
                                <li>
                                    <div class="product">
                                        <a href="{{product_url($myproduk)}}" class="product-link clearfix">
                                            @if(is_terlaris($myproduk))
                                                <div class="ribbon hot">Terlaris</div>
                                            @elseif(is_produkbaru($myproduk))
                                                <span class="ribbon new">Baru</span>
                                            @elseif(is_outstok($myproduk))
                                                <div class="ribbon empty">Kosong</div>
                                            @endif
                                            <div class="product-thumbnail">
                                                {{HTML::image(product_image_url($myproduk->gambar1,'medium'),$myproduk->nama)}}
                                            </div>
                                        </a>
                                        
                                        <div class="product-info clearfix">
                                            <h4 class="title">
                                                <a href="{{product_url($myproduk)}}">{{$myproduk->nama}}</a>
                                            </h4>
                                            @if($setting->checkoutType!=2)
                                            <div class="details">
                                                <div class="product-price"> 
                                                    @if(!empty($myproduk->hargaCoret))
                                                    <span class="price-old">{{price($myproduk->hargaCoret)}}</span>
                                                    @endif
                                                    <span class="price-new">{{price($myproduk->hargaJual)}}</span>
                                                </div>
                                            </div>
                                            @endif
                                        </div>
                                    </div>
                                </li>
                            @endforeach
                        </ul>
                    </div>
                    <!-- /carousel wrapper -->
                </div>
            </div>
        </div>
    </div>
</div>

<div class="home-container">
    <div class="container">
        <div class="row">
            <h4 class="section-title">Produk Lainnya</h4>
            <div class="tab-content row">
                <!-- LATEST PRODUCTS -->
                <div class="tab-pane animated animation-done rollIn active" data-animation="rollIn" id="top">
                {{-- */ $i=1 /* --}}
                @foreach(home_product() as $key=>$myproduk)
                    <div class="col-xs-12 col-sm-6 col-lg-3 products-container">
                        <div class="product">
                            <a href="{{product_url($myproduk)}}" class="product-link clearfix">
                                <div class="product-thumbnail" id="imgprod">
                                    {{HTML::image(product_image_url($myproduk->gambar1,'medium'), $myproduk->nama)}}
                                </div>
                            </a>
                            <div class="button-add"></div>
                            
                            <div class="product-info clearfix">
                                <h4 class="title">
                                    <a href="{{product_url($myproduk)}}">
                                        {{short_description($myproduk->nama, 15)}}
                                    </a>
                                </h4>
                                <div class="details">
                                    <div class="product-price"> 
                                        @if(!empty($myproduk->hargaCoret))
                                        <span class="price-old">{{price($myproduk->hargaCoret)}}</span>
                                        @endif
                                        <span class="price-new">{{price($myproduk->hargaJual)}}</span>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    @if($i%4==0)
                    <div class="clearfix hidden-xs"></div>
                    @endif
                    {{-- */ $i++ /* --}}
                @endforeach
                </div>
                <!-- / LATEST PRODUCTS -->
            </div>
        </div>
    </div>
</div>
<!-- mini banner -->
<div class="section carousel-iframe">
    <div class="container">
        <div class="row carousel-iframe banner-module">
            <div class="col-xs-12 col-sm-12">
                <div class="section-inner">
                    <!-- carousel wrapper -->
                    <div class="carousel-wrapper row">
                        <ul class="products-container product-grid carousel-list landscape">
                            @foreach(horizontal_banner() as $banner) 
                            <li>
                                <div class="product">
                                    <a href="{{URL::to($banner->url)}}" class="product-link clearfix">
                                        <div>{{HTML::image(banner_image_url($banner->gambar),'Info Promo')}}</div>
                                    </a>
                                </div>
                            </li>
                            @endforeach
                        </ul>
                    </div>
                    <!-- /carousel wrapper -->
                </div>
            </div>
        </div>
    </div>
</div>