    <div class="breadcrumbs-wrapper">
        <div class="container">
            <div class="row">
                <div class="col-xs-12 col-sm-12 col-lg-12 center-sm">
                    <div class="breadcrumbs">
                        <ul class="unstyled">
                            <li><a href="{{URL::to('/')}}">Home</a></li>
                            <li class="active">Blog</li>
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
                    @if(list_blog_category()->count() > 0)
                    <div class="section category-list module-list-items">
                        <h4 class="section-title">Kategori</h4>
                        <div class="section-inner">
                            <ul class="unstyled pretty-list cl-effect-1">
                                @foreach(list_blog_category() as $key=>$value)
                                <li><a href="{{blog_category_url($value)}}">{{$value->nama}}</a></li>
                                @endforeach
                            </ul>
                        </div>
                    </div>
                    @endif
                    @if(recentBlog()->count() > 0)
                    <div class="section category-list module-list-items">
                        <h4 class="section-title">Blog Terbaru</h4>
                        <div class="section-inner">
                            <ul class="unstyled pretty-list cl-effect-1">
                                @foreach(recentBlog(null, 3) as $recent)
                                <li><a href="{{blog_url($recent)}}">{{$recent->judul}}</a><br /><small class="blog-time">diposting {{waktuTgl($recent->updated_at)}}</small></li>
                                @endforeach
                            </ul>
                        </div>
                    </div>
                    @endif
                    <div class="section powerup">
                        {{pluginSidePowerup()}}
                    </div>
                </div>
                <!-- /SIDE BAR -->

                <!-- MAIN CONTENT -->
                <div class="col-xs-12 col-sm-8 col-lg-9 main">
                    <div class="row">
                        <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12 section">
                            <div class="cat-image"><h1>Blog Kami</h1></div>
                        </div>
                        
                        <div class="col-xs-12 col-sm-12 space20 visible-xs"></div>

                        @foreach(list_blog(null, @$blog_category) as $key=>$value)
                        <a href="{{blog_url($value)}}">
                            <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12 desc-out">
                                <div class="description">
                                    <div class="cat-image"><h2 class="blogtitle">{{$value->judul}}</h2></div>
                                    <small>Date: {{waktuTgl($value->updated_at)}} <span>&nbsp;&nbsp;</span></small>
                                    <br><br>
                                    {{ blogIndex($value->isi,250) }}
                                </div>
                            </div>
                        </a>
                        @endforeach 
                        <div class="clearfix "></div>
                        {{ list_blog(null, @$blog_category)->links() }}
                    </div>
                    <!-- /MAIN CONTENT -->
                </div>
            </div>
        </div>
        <!-- /MAIN CONTENT -->
    </div>