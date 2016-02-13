<div id="site-wrapper">
    <div class="breadcrumbs-wrapper">
        <div class="container">
            <div class="row">
                <div class="col-xs-12 col-sm-12 col-lg-12 center-sm">
                    <div class="breadcrumbs">
                        <ul class="unstyled">
                            <li><a href="{{URL::to('/')}}">Home</a></li>
                            <li class="active">Testimonial</li>
                        </ul>
                    </div>
                </div>
                
                <div class="col-xs-12 col-sm-12 space20 visible-xs"></div>
            </div>
        </div>
    </div>
    
    <!-- SIDEBAR + MAIN CONTENT CONTAINER -->
    <div class="main-content">
        <div class="container">
            <div class="row">
                <!-- SIDE BAR -->
                <div class="col-xs-12 col-sm-4 col-lg-3 pull-left sidebar">
                    <div class="section powerup">
                        {{pluginSidePowerup()}}
                    </div>
                    @if(vertical_banner()->count() > 0)
                    <div class="section module-list-items sidebanners">
                        @foreach(vertical_banner() as $key=>$banner)
                        <div class="cat-image">
                            <a href="{{URL::to($banner->url)}}">
                                {{ HTML::image(banner_image_url($banner->gambar),'Info Promo') }}
                            </a>
                        </div>
                        @endforeach
                    </div>
                    @endif
                </div>
                <!-- /SIDE BAR -->

                <!-- MAIN CONTENT -->
                <div class="col-xs-12 col-sm-8 col-lg-9 main">
                    <div class="section">
                        <!-- ACCORDION CONTENT -->
                        <div id="checkout-accordion" class="checkout accordion">
                            @foreach(list_testimonial() as $key=>$value)
                            <div class="accordion-group">
                                <div class="accordion-heading">
                                    <a class="accordion-toggle" data-toggle="collapse" data-parent="#checkout-accordion" href="#collapse6">
                                        <span class="text-bold"><i class="icon-compose"></i>{{ $value->nama }}&nbsp;~</span>&nbsp;<small>{{ waktuTgl($value->created_at) }}</small><br>
                                         &#187;&nbsp;{{ $value->isi }}
                                    </a>
                                </div>
                            </div>
                            @endforeach
                        </div>
                        <!-- /ACCORDION CONTENT -->
                    </div>
                    <div class="pagination-container">
                        <div class="row">
                            <div class="col-xs-8 col-sm-8">{{ list_testimonial()->links() }}</div>
                        </div>
                    </div>
                    <!-- Latest products -->
                    <div class="section carousel-iframe">
                        <div class="container">
                            <div class="row carousel-iframe offer">
                                <div class="col-xs-12 col-sm-12">
                                    <h4 class="section-title">Buat Testimonial</h4>
                                    <div class="section">
                                        <!-- carousel wrapper -->
                                        <form class="form-horizontal contact" action="{{URL::to('testimoni')}}" method="post">
                                            <div class="form-group">
                                                <div class="col-xs-12 col-sm-12">
                                                    <input name="nama" type="text" class="form-control" id="inputName" name="nama" placeholder="Nama" required>
                                                </div>
                                            </div>
                                            <div class="form-group">
                                                <div class="col-xs-12 col-sm-12">
                                                    <textarea class="form-control" name="testimonial" placeholder="Testimonial" required></textarea>
                                                </div>
                                            </div>
                                            <div class="form-group">
                                                <div class="col-xs-12 col-sm-12">
                                                    <input name="submit" type="submit" class="btn btn-primary" value="Kirim Testimonial">
                                                </div>
                                            </div>
                                        </form>
                                        <!-- /CAROUSEL WRAPPER -->
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!-- LATEST PRODUCTS -->
                </div>
                <!-- /MAIN CONTENT -->
            </div>
        </div>
    </div>
</div>