@extends('product_layout')
@section('cart')
<section class="cart_area section_padding my-5">
  <div class="container">
    <div class="cart_inner ">
      <div class="table-responsive">
        <form action="{{URL::to('/update-cart')}}" method="POST">
          {{csrf_field()}}
          <table class="table">
            <thead>
              <tr>
                <th scope="col">Product</th>
                <th scope="col">Price</th>
                <th scope="col">Quantity</th>
                <th scope="col">Size</th>
                <th scope="col">Total</th>
                <th scope="col"></th>
              </tr>
            </thead>
            <tbody>
              <?php 
                $total = 0; 
              ?>
              @foreach($cart as $key => $cartEle)
              <tr>
                <td>
                  <div class="media">
                    <div class="d-flex">
                      <img src="{{asset('/public/uploads/product/'.$cartEle->image)}}" alt="" />
                    </div>
                    <div class="media-body">
                      <p>{{$cartEle->product_name}}</p>
                    </div>
                  </div>
                </td>
                <td>
                  <h5>${{$cartEle->price}}</h5>
                </td>
                <td>
                  <div class="product_count">
                    <input class="input-number" type="text" name="qty[{{$cartEle->id}}]" value="{{$cartEle->quantity}}">
                  </div>
                </td>
                <td>
                  <select name="size[{{$cartEle->id}}]" class="custom-select">
                    @if($cartEle->size == 'S') 
                      <option value="S" selected>S</option>
                      <option value="M">M</option>
                      <option value="L">L</option>
                    @elseif($cartEle->size == 'M')
                      <option value="S">S</option>
                      <option value="M" selected>M</option>
                      <option value="L">L</option>
                    @else 
                      <option value="S">S</option>
                      <option value="M">M</option>
                      <option value="L" selected>L</option>
                      @endif
                  </select>
                </td>
                <td>
                  <h5>${{$cartEle->price* $cartEle->quantity}}</h5>
                </td>
                <td>
                  <a href="{{URL::to('/delete-cart/'.$cartEle->id)}}" class="delcart"><i class="fa fa-times"></i></a>
                </td>
              </tr>
              <?php 
                
                $total += $cartEle->price * $cartEle->quantity;
               ?>
              @endforeach
              <tr class="bottom_button">
              <td style="text-align: left;">
                <input type="submit" name="submit" value="Update cart" class="btn_1">
              </td>
            </tr>
            <tr>
              <td></td>
              <td></td>
              <td></td>
              <td></td>
              <td>
                <h5>Subtotal</h5>
              </td>
              <td>
                <h5>${{$total}}</h5>
              </td>
            </tr>
          </tbody>
        </table>
    </form>
      <div class="checkout_btn_inner float-right">
        <a class="btn_1" href="{{URL::to('/products')}}">Continue Shopping</a>
        <a class="btn_1 checkout_btn_1" href="{{URL::to('/checkout')}}">Proceed to checkout</a>
      </div>
    </div>
  </div>
</section>
@endsection
