@extends('product_layout')
@section('checkout')
<div class="container my-5 py-4 border shipping-address">
	<div class="row shipping-heading">
		<div>
      <i  class="fa fa-map-marker"></i>
			<span>Địa chỉ nhận hàng</span>
		</div>
    @if($shipping->isEmpty())
		  <button class="btn btn-primary btn-add-address" data-toggle="modal" data-target="#shippingaddmodal">Thêm địa chỉ</button>
    @else 
    <button class="btn btn-primary btn-add-address" disabled data-toggle="modal" data-target="#shippingaddmodal">Thêm địa chỉ</button>
    @endif
	</div>
  @if($shipping->isEmpty())
    <div class="row mt-4 shipping-content">       
      <div>
        <span class="shipping-content-none">Vui lòng thêm địa chỉ nhận hàng</span>
      </div>      
    </div>
  @else
    @foreach($shipping as $key => $value) 
      <div class="row mt-4 shipping-content">
        <div>
          <span class="shipping-content-name">{{$value->fname}} {{$value->lname}}</span>
          <span class="shipping-content-phone">{{$value->phone}}</span>
          <span class="shipping-content-address">{{$value->address}}</span>
          <span class="shipping-trash" style="margin-left: 150px;"><button class="btn" data-toggle="modal" data-target="#shippingdeletemodal"><i class="fa fa-trash" ></i></button></span>
        </div> 
      </div>
    @endforeach
  @endif
</div>
<section class="cart_area section_padding my-5">
  <div class="container">
    <div class="cart_inner ">
      <div class="table-responsive">
        <form action="{{URL::to('/save-checkout')}}" method="POST">
          {{csrf_field()}}
          <input type="hidden" name="user_id" value="{{$user_id}}">
          @if(!$shipping->isEmpty())
          <input type="hidden" name="shipping_id" value="{{$shipping[0]->id}}">
          @endif
          <table class="table">
            <thead>
              <tr>
                <th scope="col">Product</th>
                <th scope="col">Price</th>
                <th scope="col">Quantity</th>
                <th scope="col">Size</th>
                <th scope="col">Total</th>
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
                    <input class="input-number" readonly type="text" name="qty[{{$cartEle->id}}]" value="{{$cartEle->quantity}}">
                  </div>
                </td>
                <td>
                  <select name="size[{{$cartEle->id}}]" disabled class="custom-select">
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
              </tr>
              <?php 
                $total += $cartEle->price * $cartEle->quantity;
                session()->put('total', $total);
                // Session::put('total', $total);
               ?>
              @endforeach
          </tbody>
        </table>
        <div class="container my-5 py-4 border payment-method">
          <div class="row payment-method-heading">
            <span class="payment-method-heading-title">Phương thức thanh toán</span>
          </div>
          <div class="row mt-4 payment-method-content">       
            <div class="payment-method-selection">
              <input label="Paypal" type="radio" name="method" value="Paypal">
              <input label="ShipCOD" type="radio" name="method" value="ShipCOD">
              <input label="Banking" type="radio" name="method" value="Banking">
            </div>      
          </div>
        </div>
        <div class="card-checkout card mb-4 w-50 float-right">
          <div class="card-header py-3">
              <h5 class="mb-0">Summary</h5>
          </div>
          <div class="card-body">
            <ul class="list-group list-group-flush">
                <li class="list-group-item d-flex justify-content-between align-items-center border-0 px-0 pb-0">
                  Products
                  <span>${{$total}}</span>
                </li>
                <li class="list-group-item d-flex justify-content-between align-items-center px-0">
                  Shipping
                  <span>Gratis</span>
                </li>
                <li class="list-group-item d-flex justify-content-between align-items-center border-0 px-0 mb-3">
                  <div>
                      <strong>Total amount</strong>
                      <strong>
                      <p class="mb-0">(including VAT)</p>
                      </strong>
                  </div>
                  <span><strong>${{$total}}</strong></span>
                </li>
            </ul>
            <input type="hidden" name="total" value="{{$total}}">
            @if($cart->isEmpty())
            <button type="button" class="btn btn-primary btn-lg btn-block" data-toggle="modal" data-target="#nocartmodal">Make purchase</button>
            @else
            <button type="submit" class="btn btn-primary btn-lg btn-block">
              Make purchase
            </button>
            @endif
            <br>or<br>
            <a class="btn_1" href="{{URL::to('/cart')}}">Comeback cart</a>
          </div>
        </div>
      </form>
    </div>
  </div>
</section>
@endsection
@section('add_shipping_modal')
<div class="modal fade" id="shippingaddmodal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Add shipping address</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <form action="{{URL::to('/save-shipping')}}" method="POST">
        {{csrf_field()}}
        <input type="hidden" name="user_id" value="{{$user_id}}">
        <div class="modal-body">
          <div class="form-group">
            <div class="form-row">
              <div class="col">
                <label>First name</label>
                <input type="text" name="fname" class="form-control" placeholder="First name">
              </div>
              <div class="col">
              <label>Last name</label>
            <input type="text" name="lname" class="form-control" placeholder="Last name">
              </div>
            </div>
          </div>
          <div class="form-group">
            <label>Phone</label>
            <input type="text" name="phone" class="form-control" placeholder="Phone">
          </div>
          <div class="form-group">
            <label>Email address</label>
            <input type="text" name="email" class="form-control" placeholder="Email address">
          </div>
          <div class="form-group">
            <label>Address</label><br>
            <input type="text" name="address" class="form-control" placeholder="Address">
          </div>
        </div>
      
        <div class="modal-footer">
          <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
          <button type="submit" name="insertdata" class="btn btn-primary">Save data</button>
        </div>
      </form>
    </div>
  </div>
</div>
@endsection

@section('delete_modal')
<div class="modal fade" id="shippingdeletemodal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
      <div class="modal-dialog" role="document">
        <div class="modal-content">
          <div class="modal-header">
            <h5 class="modal-title" id="exampleModalLabel">Delete product</h5>
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
              <span aria-hidden="true">&times;</span>
            </button>
          </div>
          <form action="{{URL::to('/delete-shipping')}}" method="POST">
            {{csrf_field()}}
            <div class="modal-body">
              @if($shipping->isEmpty())
              <input type="hidden" name="del_shipping_id" id='del_shipping_id' value="">
              @else
              <input type="hidden" name="del_shipping_id" id='del_shipping_id' value="{{$shipping[0]->id}}">
              @endif
              <h4>Do you really want to delete this?</h4>
            </div>
          
            <div class="modal-footer">
              <button type="button" class="btn btn-secondary" data-dismiss="modal">Wait a minute</button>
              <button type="submit" name="deletedata" class="btn btn-primary">Yes do it please :></button>
            </div>
          </form>
        </div>
      </div>
    </div>
@endsection
@section('no_cart_modal')
<div class="modal fade" id="nocartmodal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Vui lòng kiểm tra lại giỏ hàng trước khi thanh toán</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
    </div>
  </div>
</div>
@endsection
@section('display_modal')
<!-- <script type="text/javascript">
      $(document).ready(function() {
        $('.deletebtn').on('click', function() {
          $('#productdeletemodal').modal('show');

          $str = $(this).closest('tr');

          var data = $str.children('td').map(function() {
            return $(this).text();
          }).get();
          console.log(data);
          $('#del_product_id').val(data[0]);
        });
      });
    </script> -->

    <!-- <script type="text/javascript">
      $(document).ready(function() {
        $('.editbtn').on('click', function() {
          $('#producteditmodal').modal('show');

          $str = $(this).closest('tr');

          var data = $str.children('td').map(function() {
            return $(this).text();
          }).get();

          console.log(data);
          $('#update_product_id').val(data[0]);
          $('#update_product_name').val(data[1]);
          $('#update_product_desc').val(data[2]);
          $('#update_product_price').val(data[3]);
        });
      });
    </script> -->
@endsection

 

