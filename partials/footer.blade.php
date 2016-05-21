<!-- SITE FOOTER -->
<div id="footer-container" class="footer-container">
    <div class="footer-powered alt">
        <div class="container">
            <div class="row">
                @foreach(all_menu() as $key=>$group)
                <!-- WIDGET LINKS -->
                <div class="col-xs-12 col-sm-6 col-lg-3">
                    <div class="widget wdgt-linklist">
                        <div class="widget-inner">
                            <h4 class="widget-header">{{$group->nama}}</h4>
                            <ul class="cl-effect-1">
                                @foreach($group->link as $key=>$link)
                                <li>
                                    <a href="{{menu_url($link)}}">{{$link->nama}}</a>
                                </li>
                                @endforeach
                            </ul>
                        </div>
                    </div>
                </div>
                @endforeach  
                <!-- WIDGET: CONTACT US -->
                <div class="col-xs-12 col-sm-6 col-lg-3">
                    <div class="widget widget-contact">
                        <h4 class="widget-header">Contact Us</h4>
                        <div class="widget-inner">
                            <div class="media">
                                <div class="pull-left">
                                    <i class="icon-location"></i>
                                </div>
                                <div class="media-body">
                                    <p>{{@$kontak->alamat}}</p>
                                </div>
                            </div>
                            <div class="media">
                                <div class="pull-left">
                                    <i class="icon-phone"></i>
                                </div>
                                <div class="media-body">
                                    @if(empty($kontak->telepon) && empty($kontak->hp))
                                    <p>-</p>
                                    @elseif(empty($kontak->telepon) && !empty($kontak->hp))
                                    <p>{{$kontak->hp}}</p>
                                    @elseif(!empty($kontak->telepon) && empty($kontak->hp))
                                    <p>{{$kontak->telepon}}</p>
                                    @else
                                    <p>{{@$kontak->telepon}}<br/>{{@$kontak->hp}}</p>
                                    @endif
                                </div>
                            </div>
                            <div class="media">
                                <div class="pull-left">
                                    <i class="icon-mail6"></i>
                                </div>
                                <div class="media-body">
                                    <p><a href="mailto:{{$kontak->email}}">{{@$kontak->email}}</a></p>
                                </div>
                            </div>
                            @if($kontak->ym)
                            <div class="media">
                                <div class="pull-left">
                                    <i class="icon-chat2"></i>
                                </div>
                                <div class="media-body">
                                    <p>{{ymyahoo(@$kontak->ym)}}</p>
                                </div>
                            </div>
                            @endif
                        </div>
                    </div>
                    <div class="space40 hidden-lg"></div>
                </div>
                <!-- /WIDGET: CONTACT US -->
                
                <!-- /WIDGET LINKS -->
                <!-- SUBSCRIPTION -->
                <div class="col-xs-12 col-sm-12 col-lg-12">
                    <div class="widget widget-subs">
                        <ul class="card-icons">
                            @foreach(list_banks() as $value)
                                @if($value->status == 1)
                                <li>{{HTML::image(bank_logo($value), $value->bankdefault->nama, array('title'=>$value->bankdefault->nama))}}</li>
                                @endif
                            @endforeach
                            @foreach(list_payments() as $pay)
                                @if($pay->nama == 'paypal' && $pay->aktif == 1)
                                <li><img src="{{URL::to('img/bank/paypal.png')}}" alt="paypal" title="Paypal" /></li>
                                @endif
                                @if($pay->nama == 'ipaymu' && $pay->aktif == 1)
                                <li><img src="{{URL::to('img/bank/ipaymu.jpg')}}" alt="support ipaymu" title="Ipaymu" /></li>
                                @endif
                                @if($pay->nama == 'bitcoin' && $pay->aktif == 1)
                                <li><img src="{{URL::to('img/bitcoin.png')}}" alt="Bitcoin" title="Bitcoin" /></li>
                                @endif
                            @endforeach
                            @if(count(list_dokus()) > 0 && list_dokus()->status == 1)
                            <li><img src="{{URL::to('img/bank/doku.jpg')}}" alt="Doku" /></li>
                            @endif
                            @if(count(list_veritrans()) > 0 && list_veritrans()->status == 1 && list_veritrans()->type == 1)
                            <li><img src="{{url('img/bank/veritrans.png')}}" alt="Veritrans" title="Veritrans"></li>
                            @endif
                        </ul>
                    </div>
                    <div class="space40 hidden-lg"></div>
                </div>
                <!-- /SUBSCRIPTION -->
            </div>
        </div>
    </div>
    
    <div class="footer-inner">
        <div class="container">
            <div class="row">
                <div class="col-xs-12 col-sm-8 copyright center-sm">
                     Copyright &copy; {{date('Y')}} {{ Theme::place('title') }} | All Rights Reserved | Powered by <a target="_blank" href="http://jarvis-store.com">Jarvis Store</a>
                </div>
                
                <div class="col-xs-12 space10 visible-xs"></div>
                
                <div class="col-xs-12 col-sm-4 header-social-icons multicolor center-sm">
                    <ul>
                        @if($kontak->fb)
                        <li><a target="_blank" href="{{URL::to($kontak->fb)}}" title="Facebook"><i class="icon-facebook"></i></a></li>
                        @endif
                        @if($kontak->tw)
                        <li><a target="_blank" href="{{URL::to($kontak->tw)}}" title="Twitter"><i class="icon-twitter"></i></a></li>
                        @endif
                        @if($kontak->gp)
                        <li><a target="_blank" href="{{URL::to($kontak->gp)}}" title="Google+"><i class="icon-google-plus"></i></a></li>
                        @endif
                        @if($kontak->pt)
                        <li><a target="_blank" href="{{URL::to($kontak->pt)}}" title="Pinterest"><i class="icon-pinterest"></i></a></li>
                        @endif
                        @if($kontak->tl)
                        <li><a target="_blank" href="{{URL::to($kontak->tl)}}" title="Tumblr"><i class="icon-tumblr"></i></a></li>
                        @endif
                        @if($kontak->ig)
                        <li><a target="_blank" href="{{URL::to($kontak->ig)}}" title="Instagram"><i class="icon-instagram"></i></a></li>
                        @endif
                    </ul>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- /SITE FOOTER -->
{{pluginPowerup()}} 