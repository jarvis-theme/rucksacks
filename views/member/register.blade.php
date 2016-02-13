<div id="site-wrapper">
    <div class="breadcrumbs-wrapper">
        <div class="container">
            <div class="row">
                <div class="col-xs-12 col-sm-12 col-lg-12 center-sm">
                    <div class="breadcrumbs">
                        <ul class="unstyled">
                            <li><a href="{{URL::to('/')}}">Home</a></li>
                            <li class="active">Register</li>
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
                        <p>Sudah mempunyai akun? Silahkan <a href="{{URL::to('member')}}">login</a></p>
                        {{Form::open(array('url'=>'member','method'=>'post','class'=>'form-horizontal'))}}
                            <h2>Data Diri</h2>
                            <div class="content">
                                <table class="form">
                                    <tbody>
                                        <tr>
                                            <td><span class="required">*</span> Nama:</td>
                                            <td><input class="inputform" type="text" name="nama" value="{{Input::old('nama')}}" required></td>
                                        </tr>
                                        <tr>
                                            <td><span class="required">*</span> E-Mail:</td>
                                            <td><input class="inputform" type="text" name="email" value="{{Input::old('email')}}" required></td>
                                        </tr>
                                        <tr>
                                            <td><span class="required">*</span> Telepon:</td>
                                            <td><input class="inputform" type="text" name="telp" value="{{Input::old('telp')}}" required></td>
                                        </tr>
                                    </tbody>
                                </table>
                            </div>
                            <h2>Alamat</h2>
                            <div class="content">
                                <table class="form">
                                    <tbody>
                                        <tr>
                                            <td><span class="required">*</span> Alamat:</td>
                                            <td><textarea class="inputform" name="alamat" required>{{Input::old("alamat")}}</textarea></td>
                                        </tr>
                                        <tr>
                                            <td><span id="postcode-required" class="required">*</span> Kode Pos:</td>
                                            <td><input class="inputform" type="text" name="kodepos" value="{{Input::old('kodepos')}}"></td>
                                        </tr>
                                        <tr>
                                            <td><span class="required">*</span> Negara:</td>
                                            <td>
                                                {{Form::select('negara',array('' => '-- Pilih Negara --') + $negara, Input::old("negara"), array('required', 'name'=>"negara", 'id'=>"negara", 'data-rel'=>"chosen"))}}
                                            </td>
                                        </tr>
                                        <tr>
                                            <td><span class="required">*</span> Provisi:</td>
                                            <td>
                                                {{Form::select('provinsi',array('' => '-- Pilih Provinsi --') + $provinsi, Input::old("provinsi"), array('required', 'name'=>"provinsi", 'id'=>"provinsi", 'data-rel'=>"chosen"))}}
                                            </td>
                                        </tr>
                                        <tr>
                                            <td><span class="required">*</span> Kabupaten:</td>
                                            <td>
                                                {{Form::select('kota',array('' => '-- Pilih Kota --') + $kota, Input::old("kota"), array('required name'=>"kota", 'id'=>"kota", 'data-rel'=>"chosen"))}}
                                            </td>
                                        </tr>
                                    </tbody>
                                </table>
                            </div>
                            <h2>Password</h2>
                            <div class="content">
                                <table class="form">
                                    <tbody>
                                        <tr>
                                            <td><span class="required">*</span> Password:</td>
                                            <td><input type="password" name="password" required></td>
                                        </tr>
                                        <tr>
                                            <td><span class="required">*</span> Konfirmasi Password:</td>
                                            <td><input type="password" name="password_confirmation" required></td>
                                        </tr>
                                        <tr>
                                            <td><span class="required">*</span> Captcha:</td>
                                            <td class="inputform captcha"><input type="text" name="captcha" placeholder="Masukan text berikut" required ></td>
                                        </tr>
                                        <tr>
                                            <td></td>
                                            <td>{{ HTML::image(Captcha::img(), 'Captcha image') }}</td>
                                            <td></td>
                                        </tr>
                                        <tr>
                                            <td></td>
                                            <td colspan="2"><input type="checkbox" required name="readme" value="1">&nbsp;&nbsp;Saya telah membaca dan menyetujui <a class="colorbox cboxElement" href="{{URL::to('service')}}" alt="Privacy Policy" target="_blank"><b>Syarat & Ketentuan</b></a></td>
                                        </tr>
                                    </tbody>
                                </table>
                            </div>
                            <div class="buttons">
                                <div class="center">
                                    <input type="submit" value="Save" class="button">
                                </div>
                            </div>
                        {{Form::close()}}
                    </div>
                </div>
                <!-- MAIN CONTENT -->
            </div>
        </div>
    </div>
</div>