<br>
<div class="breadcrumbs-wrapper">
    <div>
        <div class="row">
            <div class="col-xs-12 col-sm-6 col-lg-9 center-sm">
                <div class="breadcrumbs">
                    <ul class="unstyled">
                        <li><a href="{{URL::to('/')}}">Home</a></li>
                        <li class="active">Konfirmasi Order</li>
                    </ul>
                </div>
            </div>
            
            <div class="col-xs-12 col-sm-12 space20 visible-xs"></div>
            
            <div class="col-xs-12 col-sm-3 center-sm">
                <div class="display-mode">
                    <!-- <ul class="unstyled float-right"> Konfirmasi Order </ul> -->
                </div>
            </div>
        </div>
    </div>
</div>
<div class="main-content">
    <div class="container"> 
        <div class="row">
            <div class="col-xs-12 col-sm-12 col-lg-12 main">
                <!-- CART ITEMS -->
                <div class="section">
                    <table class="my-cart">
                        <thead>
                            <tr>
                                <th class="product-action">Kode Order</th>
                                <th class="product-action hidden-xs">Tgl Order</th>
                                <th class="product-name">Detail Produk</th>
                                <th class="product-price">Total</th>
                                <th class="product-name">Jumlah yg belum di Bayar</th>
                                <th class="product-price">No Resi</th>
                                <th class="product-action">Status</th>
                                <a class="pr_name" href="#">Details Order: {{date('d M Y')}}</a>
                            </tr>
                        </thead>
                        <tbody>
                            <tr>
                                <td>{{$checkouttype==1 ? prefixOrder().$order->kodeOrder : prefixOrder().$order->kodePreorder}}</td>
                                <td>{{$checkouttype==1 ? waktu($order->tanggalOrder) : waktu($order->tanggalPreorder)}}</td>
                                <td>
                                @if ($checkouttype==1)
                                    @foreach ($order->detailorder as $detail)
                                        <li> {{$detail->produk->nama}} {{$detail->opsiSkuId !=0 ? '('.$detail->opsisku->opsi1.($detail->opsisku->opsi2 != '' ? ' / '.$detail->opsisku->opsi2:'').($detail->opsisku->opsi3 !='' ? ' / '.$detail->opsisku->opsi3:'').')':''}} - {{$detail->qty}}</li>
                                    @endforeach
                                @else
                                    {{$order->preorderdata->produk->nama}} 
                                    ({{$order->opsiSkuId==0 ? 'No Opsi' : $order->opsisku->opsi1.($order->opsisku->opsi2!='' ? ' / '.$order->opsisku->opsi2:'').($order->opsisku->opsi3!='' ? ' / '.$order->opsisku->opsi3:'')}})
                                     - {{$order->jumlah}}
                                @endif
                                </td>
                                <td>{{ price($order->total) }}</td>
                                <td class="align_center vline">
                                    @if($checkouttype==1)
                                        - {{ price($order->total) }}
                                    @else 
                                        @if($order->status < 2)
                                            - {{ price($order->total) }}
                                        @elseif(($order->status > 1 && $order->status < 4) || $order->status==7)
                                            - {{ price($order->total - $order->dp) }}
                                        @else
                                            0
                                        @endif
                                    @endif
                                </td>
                                <td class="align_center vline">{{ $order->noResi }}</td>
                                <td class="align_center vline">
                                    @if($checkouttype==1)
                                        @if($order->status==0)
                                        <span class="label label-warning">Pending</span>
                                        @elseif($order->status==1)
                                        <span class="label label-important">Konfirmasi diterima</span>
                                        @elseif($order->status==2)
                                        <span class="label label-info">Pembayaran diterima</span>
                                        @elseif($order->status==3)
                                        <span class="label label-info">Terkirim</span>
                                        @elseif($order->status==4)
                                        <span class="label label-info">Batal</span>
                                        @endif
                                    @else 
                                        @if($order->status==0)
                                        <span class="label label-warning">Pending</span>
                                        @elseif($order->status==1)
                                        <span class="label label-important">Konfirmasi DP diterima</span>
                                        @elseif($order->status==2)
                                        <span class="label label-info">DP terbayar</span>
                                        @elseif($order->status==3)
                                        <span class="label label-info">Menunggu pelunasan</span>
                                        @elseif($order->status==4)
                                        <span class="label label-info">Pembayaran lunas</span>
                                        @elseif($order->status==5)
                                        <span class="label label-info">Terkirim</span>
                                        @elseif($order->status==6)
                                        <span class="label label-info">Batal</span>
                                        @elseif($order->status==7)
                                        <span class="label label-info">Konfirmasi Pelunasan diterima</span>
                                        @endif
                                    @endif
                                </td>
                            </tr>
                        </tbody>
                   </table>
                </div>
                <br>
                <div class="clear"></div>
                <div class="well">
                @if($order->jenisPembayaran == 1)
                    @if($checkouttype==1)
                    {{-- */ $konfirmasi='konfirmasiorder/' /* --}}  
                    @else
                    {{-- */ $konfirmasi='konfirmasipreorder/' /* --}}   
                    @endif
                    
                    {{Form::open(array('url'=> $konfirmasi.$order->id, 'method'=>'put', 'class'=> 'form-horizontal'))}} 
                        <div class="control-group">
                            <label class="control-label" for="inputEmail" > Nama Pengirim</label>
                            <div class="controls">
                                <input class="span6" type="text" name="nama" value="{{Input::old('nama')}}" required>
                            </div>
                        </div>
                        <div class="control-group">
                            <label class="control-label" for="inputEmail"> No Rekening</label>
                            <div class="controls">
                                <input type="text" class="span6" name="noRekPengirim" value="{{Input::old('noRekPengirim')}}" required>
                            </div>
                        </div>
                        <div class="control-group">
                            <label class="control-label" for="inputEmail"> Rekening Tujuan</label>
                            <div class="controls" id="rek">
                                <select name="bank" id="reklist">
                                    <option value="">-- Pilih Bank Tujuan --</option>
                                    @foreach (list_banks() as $bank)
                                    <option value="{{$bank->id}}">{{$bank->bankdefault->nama}} - {{$bank->noRekening}} - A/n {{$bank->atasNama}}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>
                        <br>
                        <div class="control-group">
                            <label class="control-label" for="inputEmail"> Jumlah</label>
                            <div class="controls">
                                @if($checkouttype==1)
                                <input class="span6" type="text" name="jumlah" value="{{$order->total}}" required>
                                @else
                                    @if($order->status < 2)
                                    <input class="span6" type="text" name="jumlah" value="{{$order->dp}}" required>
                                    @elseif(($order->status > 1 && $order->status < 4) || $order->status==7)
                                    <input class="span6" type="text" name="jumlah" value="{{$order->total - $order->dp}}" required>
                                    @endif
                                @endif
                            </div>
                        </div>
                        <div class="control-group">
                            <div class="controls right">
                                <button type="submit" class="btn theme"><i class="icon-check"></i> Konfirmasi Order</button>
                            </div>
                        </div>
                    {{Form::close()}}
                @endif
                @if($paymentinfo!=null)
                <h3><center>Paypal Payment Details</center></h3><br>
                <hr>
                <div class="table-responsive">
                    <table class='table table-bordered'>
                        <tr><td>Payment Status</td><td>:</td><td>{{$paymentinfo['payment_status']}}</td></tr>
                        <tr><td>Payment Date</td><td>:</td><td>{{$paymentinfo['payment_date']}}</td></tr>
                        <tr><td>Address Name</td><td>:</td><td>{{$paymentinfo['address_name']}}</td></tr>
                        <tr><td>Payer Email</td><td>:</td><td>{{$paymentinfo['payer_email']}}</td></tr>
                        <tr><td>Item Name</td><td>:</td><td>{{$paymentinfo['item_name1']}}</td></tr>
                        <tr><td>Receiver Email</td><td>:</td><td>{{$paymentinfo['receiver_email']}}</td></tr>
                        <tr><td>Total Payment</td><td>:</td><td>{{$paymentinfo['payment_gross']}} {{$paymentinfo['mc_currency']}}</td></tr>
                    </table>
                </div>
                <p>Thanks you for your order.</p><br>
                @endif 
              
                @if($order->jenisPembayaran==2)
                <h3><center>Konfirmasi Pemabayaran Via Paypal</center></h3><br>
                <p>Silakan melakukan pembayaran dengan paypal Anda secara online via paypal payment gateway. Transaksi ini berlaku jika pembayaran dilakukan sebelum {{$expired}}. Klik tombol "Bayar Dengan Paypal" di bawah untuk melanjutkan proses pembayaran.</p>
                {{$paypalbutton}}<br>
                @elseif($order->jenisPembayaran==6)
                    @if($order->status == 0)
                    <h3><center>Konfirmasi Pembayaran Via Bitcoin</center></h3><br>
                    <p>Silahkan melakukan pembayaran dengan bitcoin Anda secara online via bitcoin payment gateway. Transaksi ini berlaku jika pembayaran dilakukan sebelum <b>{{$expired_bitcoin}}</b>. Klik tombol "Pay with Bitcoin" di bawah untuk melanjutkan proses pembayaran.</p>
                    {{$bitcoinbutton}}
                    <br>
                    @else
                    <h3><center>Konfirmasi Pembayaran Via Bitcoin</center></h3><br>
                    <p><center><b>Batas waktu pembayaran bicoin anda telah habis.</b></center></p>
                    @endif
                @endif
            </div>
        </div>
    </div>
</div>
