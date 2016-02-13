<div class="breadcrumbs-wrapper">
    <div class="container">
        <div class="row">
            <div class="col-xs-12 col-sm-12 col-lg-12 center-sm">
                <div class="breadcrumbs">
                    <ul class="unstyled">
                        {{breadcrumbProduk(@$produk, ' <span>/</span> ;', ';', true, @$category, @$collection)}}
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
                <div class="accordionmenu section">
                    <h4 class="section-title">Koleksi</h4>
                    @foreach(list_koleksi() as $mykoleksi)
                    <a href="{{koleksi_url($mykoleksi)}}" class="product-link clearfix">
                        {{$mykoleksi->nama}}
                    </a>
                    @endforeach
                </div>
                <div class="section powerup">
                    {{pluginSidePowerup()}}
                </div>
                <div class="section module-list-items sidebanners">
                    @foreach(vertical_banner() as $key=>$banner)
                    <div class="cat-image">
                        <a href="{{URL::to($banner->url)}}">
                            {{HTML::image(banner_image_url($banner->gambar),'Info Promo')}}
                        </a>
                    </div>
                    @endforeach
                </div>
            </div>
            <!-- /SIDE BAR -->

            <!-- MAIN CONTENT -->
            <div class="col-xs-12 col-sm-8 col-lg-9 main">
                <div class="row">
                    <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12 section">
                        <div class="cat-image">
                        @foreach(horizontal_banner() as $key=>$banner)
                            @if($key==0)
                            <a href="{{URL::to($banner->url)}}">
                                {{HTML::image(banner_image_url($banner->gambar),'Info Promo',array('width'=>'100%'))}}
                            </a>
                            @endif
                        @endforeach
                        </div>
                    </div>
                    <div class="col-xs-12 col-sm-12 space20 visible-xs"></div>
                </div>
                <div class="clearfix"></div>
                <!-- SUB CATEGORY -->

                <!-- CONTAINER SUB WRAPPER -->
                <div class="filter-box">
                    <div class="container">
                        <div class="row">
                            <div class="col-xs-12 col-sm-6 center-sm">
                                <div class="filtersgroup">
                                    <div class="limit">
                                        <span>Show:</span>
                                        <select id="show" data-rel="{{URL::current()}}">
                                            <option value="0">-- Items --</option>
                                            <option value="15" {{Input::get('show')==15?'selected="selected"':''}}>15</option>
                                            <option value="25" {{Input::get('show')==25?'selected="selected"':''}}>25</option>
                                            <option value="40" {{Input::get('show')==40?'selected="selected"':''}}>40</option>
                                        </select>
                                    </div>
                                </div>
                            </div>
                            
                            <div class="col-xs-12 col-sm-12 space20 visible-xs"></div>
                            
                            <div class="col-xs-12 col-sm-6 center-sm">
                                <div class="display-mode">
                                    <ul class="unstyled float-right">
                                        <li class="active">
                                            <a id="grid-mode"><span class="icon-grid-alt"></span>Grid</a>
                                        </li>
                                        <li>
                                            <a id="list-mode"><span class="icon-list"></span>List</a>
                                        </li>
                                    </ul>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <div id="product-list-container" class="section offer products-container portrait three-column" data-layout="grid">
                    <div class="row">
                        @foreach(list_product(Input::get('show'), @$category, @$collection) as $myproduk)
                        <div class="mix col-xs-12 col-sm-6 col-lg-4">
                            <div class="product" data-name="Demo Product1">
                                <a href="{{product_url($myproduk)}}" class="product-link clearfix">
                                    @if(is_terlaris($myproduk))
                                       <div class="ribbon hot">Terlaris</div>
                                    @elseif(is_produkbaru($myproduk))
                                       <span class="ribbon new">Baru</span>
                                    @elseif(is_outstok($myproduk))
                                        <div class="ribbon empty">Kosong</div>
                                    @endif
                                    <div class="product-thumbnail">
                                        {{HTML::image(product_image_url($myproduk->gambar1,'medium'), $myproduk->nama,array('title'=>'product','class'=>'image-prod'))}}
                                    </div>
                                </a>
                                
                                <div class="product-info clearfix">
                                    <h4 class="title left">
                                        <a href="{{product_url($myproduk)}}">{{short_description($myproduk->nama, 20)}}</a>
                                    </h4>
                                    @if($setting->checkoutType!=2)
                                    <div class="details">
                                        <div class="product-price">
                                            @if($myproduk->hargaCoret != 0)
                                            <span class="price-old">{{price($myproduk->hargaCoret)}}</span>
                                            @endif 
                                            <span class="price-new">{{price($myproduk->hargaJual)}}</span> 
                                        </div>
                                    </div>
                                    @endif
                                    <div class="listdescription">
                                        <div class="text"><p>{{short_description($myproduk->deskripsi, 130)}}</p></div>
                                        <div class="add-to-cart">
                                            <a onclick="window.location.href='{{product_url($myproduk)}}'" class="btn btn-primary btn-iconed"><i class="icon-zoom-in"></i><span>Lihat Produk</span></a>
                                        </div>
                                        <div class="ratings-list">
                                        </div>
                                    </div>
                                    <div class="details">
                                    </div>
                                    
                                    <a title="Add To Cart" class="add-to-cart">
                                        <span class="icon-shopcart"></span>
                                    </a>
                                </div>
                            </div>
                        </div>  
                        @endforeach  
                    </div>
                </div>
                <!-- /PRODUCT AREA -->

                <!-- PAGINATION -->
                <div class="pagination-container">
                    <div class="row">
                        <div class="col-xs-8 col-sm-8">
                            {{list_product(Input::get('show'), @$category, @$collection)->appends(array('show' => Input::get('show')))->links()}}
                        </div>
                    </div>
                </div>
                <!-- PAGINATION -->
            </div>
            <!-- /MAIN CONTENT -->
        </div>
    </div>
</div>