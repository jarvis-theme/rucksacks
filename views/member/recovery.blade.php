<div class="breadcrumbs-wrapper">
    <div class="container">
        <div class="row">
            <div class="col-xs-12 col-sm-12 col-lg-12 center-sm">
                <div class="breadcrumbs">
                    <ul class="unstyled">
                        <li><a href="{{URL::to('/')}}">Home</a></li>
                        <li><a href="{{url('member')}}">Member</a></li>
                        <li class="active">Reset Password</li>
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
            <div class="col-xs-12 col-sm-4 col-lg-3 pull-right sidebar">
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
                <div class="section">
                    {{Form::open(array('url' => 'member/recovery/'.$id.'/'.$code, 'enctype' => 'multipart/form-data'))}}
                        <h2>Reset Password</h2>
                        <div class="content">
                            <table class="form">
                                <tbody>
                                    <tr>
                                        <td>Password baru:</td>
                                        <td><input type="password" name="password" required></td>
                                    </tr>
                                    <tr>
                                        <td>Konfirmasi password baru:</td>
                                        <td><input type="password" name="password_confirmation" required></td>
                                    </tr>
                                </tbody>
                            </table>
                        </div>
                        <div class="buttons">
                            <input type="submit" value="Simpan password baru" class="button">
                        </div>
                    {{Form::close()}}
                </div>
            </div>
            <!-- MAIN CONTENT -->
        </div>
    </div>
</div>