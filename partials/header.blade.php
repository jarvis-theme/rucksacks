<div id="header-container">
    <!-- main header -->
    <div id="header-center">
        <div class="container">
            <div class="row">
                <!-- logo -->
                <div class="col-xs-7 col-sm-7 logo-container">
                    <strong class="logo ">
                    @if(@getimagesize(URL::to( logo_image_url() )))
                        <a href="{{URL::to('home')}}">
                            {{HTML::image(logo_image_url(),'logo',array('style'=>'max-height: 100px; width: 100%'))}}
                        </a>
                    @else
                        <a style="text-decoration:none" href="{{URL::to('home')}}"><h1>{{ Theme::place('title') }}</h1></a>
                    @endif
                    </strong>
                </div>
                <!-- /logo -->
                <div class="col-xs-5 col-sm-5 cart-container">
                    <div class="header-cart" style="width: 100%;">
                        <div class="search-cont">
                            <form action="{{URL::to('search')}}" method="post">
                                <input id="search" type="text" name="search" class="query" placeholder="Cari Produk">
                                <button class="btn-search"><i class="icon-search"></i></button>
                            </form>
                        </div>
                    </div>
                    <!-- shopping cart -->
                    <div id="shoppingcartplace">
                        {{shopping_cart()}}
                    </div>
                    <!-- /shopping cart -->
                    <div class="header-cart">
                        <div class="top-links center-sm">
                            <ul class="link-menu cl-effect-21">
                                @if ( !is_login() )
                                    <li>{{HTML::link('member', 'Login')}}</li>
                                    <li>{{HTML::link('member/create', 'Register')}}</li>
                                    <li>{{HTML::link('produk', 'Produk')}}</li>
                                    <li>{{HTML::link('blog', 'Blog')}}</li>
                                @else
                                    <li class="dropdown hidden-xs"><a class="dropdown-toggle" data-toggle="dropdown">Akun </a>
                                        <ul class="dropdown-menu">
                                            <li>  {{HTML::link('member', 'My Account')}}</li>
                                            <li> {{HTML::link('logout', 'Logout')}}</li>
                                        </ul>
                                    </li>
                                    <li>{{HTML::link('produk', 'Produk')}}</li>
                                    <li>{{HTML::link('blog', 'Blog')}}</li>
                                    <li>{{HTML::link('checkout', 'Keranjang Belanja')}}</li>
                                @endif
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
        
        </div>
    </div>
    <!-- /main header -->
    <br>
    <!-- Navigation menu -->
    <div id="menu-container">
        <div class="container">
            <div class="inner">
                <!-- main menu -->
                <ul class="main-menu menu visible-lg">
                    <li class="active annonce"><a href="{{URL::to('/')}}"><i class="icon-home2"></i></a></li>
                    @foreach(category_menu() as $key=>$menu)
                        @if($menu->parent == '0')
                        <li class="annonce">
                            <a href="{{category_url($menu)}}">{{$menu->nama}}</a>
                            @if(count($menu->anak) > 0)
                            <ul class="sub_menu">
                                @foreach($menu->anak as $submenu)
                                @if($submenu->parent == $menu->id)
                                <li>
                                    <a href="{{category_url($submenu)}}">{{$submenu->nama}}</a>
                                    @foreach($submenu->anak as $submenu2)
                                        @if($submenu2->parent == $submenu->id)
                                        <li><a href="{{category_url($submenu)}}">{{$submenu->nama}}</a></li>
                                        @endif
                                    @endforeach
                                </li>
                                @endif
                                @endforeach
                            </ul>
                            @endif
                        </li>
                        @endif
                    @endforeach
                </ul>
                <!-- /main menu -->
                
                <!-- mobile main menu -->
                <div class="mobile-menu hidden-lg">
                    <div id="dl-menu" class="dl-menuwrapper">
                        <button class="dl-trigger"><i class="icon-menu2"></i></button>
                        <ul class="dl-menu">
                            <li class="active">
                                <a href="{{URL::to('/')}}"><i class="icon-home"></i></a>
                            </li>
                            @foreach(category_menu() as $key=>$menu)
                            <li>
                                @if($menu->parent == '0')
                                    @if(count($menu->anak) > 0)
                                    <a href="javsacript:void(0);">{{$menu->nama}}</a>
                                    <ul class="dl-submenu">
                                        @foreach($menu->anak as $submenu)
                                            @if($submenu->parent == $menu->id)
                                            <li>
                                                <a href="{{category_url($submenu)}}">{{$submenu->nama}}</a>
                                                @foreach($submenu->anak as $submenu2)
                                                @if($submenu2->parent == $submenu->id)
                                                <li><a href="{{category_url($submenu2)}}">{{$submenu2->nama}}</a></li>
                                                @endif
                                                @endforeach
                                            </li>
                                            @endif
                                        @endforeach
                                    </ul>
                                    @else
                                    <a href="{{category_url($menu)}}">{{$menu->nama}}</a>
                                    @endif
                                @endif
                            </li>
                            @endforeach
                        </ul>
                    </div>
                    <!-- /dl-menuwrapper -->
                </div>
                <!-- /mobile main menu -->
            </div>
        </div>
    </div>
    <!-- /Navigation menu -->
</div>