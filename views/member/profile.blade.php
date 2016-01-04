<div id="site-wrapper">
	<!-- /BREADCRUMBS -->
	<div class="breadcrumbs-wrapper">
		<div class="container">
			<div class="row">
				<div class="col-xs-12 col-sm-12 col-lg-12 center-sm">
					<div class="breadcrumbs">
						<ul class="unstyled">
							<li><a href="{{URL::to('/')}}">Home</a></li>
							<li><a href="{{URL::to('member')}}">Member</a></li>
							<li class="active">My Profile</li>
						</ul>
					</div>
				</div>
				
				<div class="col-xs-12 col-sm-12 space20 visible-xs"></div>
			</div>
		</div>
	</div>
	<!-- /BREADCRUMBS -->
	
	<!-- SIDEBAR + MAIN CONTENT CONTAINER -->
	<div class="main-content">
		<div class="container">
			<div class="row">
				<!-- SIDE BAR -->
				<div class="col-xs-12 col-sm-4 col-lg-3 pull-left sidebar">
					<div class="section  module-list-items">
						<h4 class="section-title">Menu Member</h4>
						<div class="section-inner">
							<ul class="unstyled pretty-list arrow-list cl-effect-1">
								<li><a href="{{URL::to('member')}}">Order History</a></li>
								<li><a href="{{URL::to('member/'.$user->id.'/edit')}}">Profil Information</a></li>
							</ul>
						</div>
					</div>

					<div class="section carousel-iframe">
						<div class="container">
							<div class="row carousel-iframe offer">
								<div class="col-xs-12 col-sm-12">
									<div class="sidebanners">
										@foreach(vertical_banner() as $key=>$banner)
										<div class="cat-image">
											<a href="{{URL::to($banner->url)}}">
												{{HTML::image(banner_image_url($banner->gambar),'Info Promo')}}
											</a>
										</div>
										@endforeach
									</div>
								</div>
							</div>
						</div>
					</div>
				</div>
				<!-- /SIDE BAR -->
				
				<!-- MAIN CONTENT -->
				<div class="col-xs-12 col-sm-8 col-lg-9 main">
					<div class="section">
					{{Form::open(array('url'=>'member/update','method'=>'put','class'=>'form-horizontal'))}}
						<h2>Detail data pribadi</h2>
						<div class="content">
							<table class="form">
								<tbody>
									<tr>
										<td><span class="required">*</span> Nama:</td>
										<td><input class="inputform" type="text" name="nama" value="{{$user->nama}}" required></td>
									</tr>
									<tr>
										<td><span class="required">*</span> E-Mail:</td>
										<td><input class="inputform" type="text" name="email" value="{{$user->email}}" required></td>
									</tr>
									<tr>
										<td><span class="required">*</span> Telephone:</td>
										<td><input class="inputform" type="text" name="telp" value="{{$user->telp}}" required></td>
									</tr>
								</tbody>
							</table>
						</div>
						<h2>Alamat anda</h2>
						<div class="content">
							<table class="form">
								<tbody>
									<tr>
										<td><span class="required">*</span> Alamat:</td>
										<td><textarea class="inputform" name="alamat" required>{{$user->alamat}}</textarea></td>
									</tr>
									<tr>
										<td><span id="postcode-required" class="required">*</span> Kode Pos:</td>
										<td><input class="inputform" type="text" name="kodepos" value="{{$user->kodepos}}"></td>
									</tr>
									<tr>
										<td><span class="required">*</span> Negara:</td>
										<td>
											{{Form::select('negara',array('' => '-- Pilih Negara --') + $negara, ($user ? $user->negara :(Input::old("negara")? Input::old("negara") :"")), array('required'=>'', 'id'=>'negara'))}}
										</td>
									</tr>
									<tr>
										<td><span class="required">*</span> Provisi:</td>
										<td>
											{{Form::select('provinsi',array('' => '-- Pilih Provinsi --') + $provinsi, ($user ? $user->provinsi :(Input::old("provinsi")? Input::old("provinsi") :"")),array('required'=>'','id'=>'provinsi'))}}                         
										</td>
									</tr>
									<tr>
										<td><span class="required">*</span> Kabupaten:</td>
										<td>
											{{Form::select('kota',array('' => '-- Pilih Kota --') + $kota, ($user ? $user->kota :(Input::old("kota")? Input::old("kota") :"")),array('required'=>'','id'=>'kota'))}}
										</td>
									</tr>
								</tbody>
							</table>
						</div>
						<h2>Ganti Password</h2>
						<div class="content">
							<table class="form">
								<tbody>
									<tr>
										<td><span class="required">*</span> Password Lama:</td>
										<td><input type="password" name="oldpassword" ></td>
									</tr>
									<tr>
										<td><span class="required">*</span> Password Baru:</td>
										<td><input type="password" name="password" ></td>
									</tr>
									<tr>
										<td><span class="required">*</span> Ulang Password Baru:</td>
										<td><input type="password" name="password_confirmation" ></td>
									</tr>
								 </tbody>
							 </table>
						</div>
						<div class="buttons">
							<div class="right"><input type="submit" value="Save" class="button"></div>
						</div>
					{{Form::close()}}
					</div>
				</div>
			<!-- MAIN CONTENT -->
		</div>
	</div>
</div>