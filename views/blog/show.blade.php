    <div class="breadcrumbs-wrapper">
        <div class="container">
            <div class="row">
                <div class="col-xs-12 col-sm-12 col-lg-12 center-sm">
                    <div class="breadcrumbs">
                        <ul class="unstyled">
                            <li><a href="{{URL::to('/')}}">Home</a></li>
                            <li><a href="{{URL::to('blog')}}">Blog</a></li>
                            <li class="active">{{$detailblog->judul}}</li>
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
                    <!-- Kategori LIST -->
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
                    <!-- /CATEGORIES LIST -->

                    <div class="section category-list module-list-items">
                        <h4 class="section-title">Blog Terbaru</h4>
                        <div class="section-inner">
                            <ul class="unstyled pretty-list cl-effect-1">
                                @foreach(recentBlog() as $recent)
                                <li>
                                    <a href="{{blog_url($recent)}}">{{$recent->judul}}</a>
                                    <br />
                                    <small class="blog-time">diposting {{waktuTgl($recent->updated_at)}}</small>
                                </li>
                                @endforeach
                            </ul>
                        </div>
                    </div>
                </div>
                <!-- /SIDE BAR -->

                <!-- MAIN CONTENT -->
                <div class="col-xs-12 col-sm-8 col-lg-9 main">
                <div class="row">
                    <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12 section">
                        <div class="cat-image"><h1 class="section-title">{{$detailblog->judul}}</h1></div>
                        <small class="dateblog">Date: {{waktuTgl($detailblog->updated_at)}} <span>&nbsp;&nbsp; <i class="icon-tag"></i>&nbsp;<a href="{{URL::to('blog/category/'.$detailblog->kategori->nama)}}">{{$detailblog->kategori->nama}}</a></span></small>              
                    </div>
                    
                    <div class="col-xs-12 col-sm-12 space20 visible-xs"></div>
                    
                    <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12 desc-out">
                        <div class="description">{{ $detailblog->isi }}</div>
                        <br>
                        {{$fbscript}}
                        {{fbcommentbox(slugBlog($detailblog), '100%', '5', 'light')}}
                    </div>

                    <div class="section zerotop">
                        <div class="col-xs-4 col-sm-12" >
                            <ul class="direction-nav pagination-direction float-left">
                                <li><a href="{{@$prev->slug}}" class="btn btn-prev {{ @$prev->id==''?'disabled':'' }}"><span class="icon-arrow-left10"></span></a></li>
                            </ul>
                            <ul class="direction-nav pagination-direction float-right">
                                <li><a href="{{@$next->slug}}" class="btn btn-next {{ @$next->id==''?'disabled':'' }}"><span class="icon-arrow-right9"></span></a></li>
                            </ul>
                        </div>
                    </div>
                    <div class="clearfix "></div>   
                </div>
                <!-- /MAIN CONTENT -->
            </div>
        </div>
    </div>