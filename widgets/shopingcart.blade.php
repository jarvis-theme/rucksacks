<div id="shoppingcartplace" class="header-cart shpcart">
    <div class="inner">
        <div class="relative">
            <a href="#" class="btn-iconed">
                <i class="icon-cart3"></i>
                <span>{{Shpcart::cart()->total_items()}} Item(s) - {{ price(Shpcart::cart()->total() )}}</span>
            </a>
            
            <!-- CART ITEMS -->
            <div class="cart-items" >
                <div class="header">Shopping Cart</div>
                @if(Shpcart::cart())
                <ul class="items clearfix">
                	@foreach (Shpcart::cart()->contents() as $key => $cart)
                    <li>
                        <a href="#" class="item-name">{{$cart['name']}}</a>
                        <span class="item-price">{{ price($cart['qty'] * $cart['price'])}}</span>
                        <div class="clearfix"></div>
                    </li>
                    @endforeach
                </ul>
                
                <div class="mini-cart-total">
                      <table>
                        <tbody>
                     	<tr>
                          <td class="right"><b>Total:</b></td>
                          <td class="right">{{ price(Shpcart::cart()->total() )}}</td>
                        </tr>
                       </tbody>
                      </table>
                </div>
                    @if(Shpcart::cart()->total_items() > 0)
                    <div class="footer"><a href="{{URL::to('checkout')}}">Checkout</a></div>
                    @endif
                @endif
            </div>
            <!-- /CART ITEMS -->
        </div>
    </div>
</div>