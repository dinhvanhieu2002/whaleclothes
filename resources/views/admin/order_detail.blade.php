@extends('admin_layout')
@section('order_detail')
<div class="content-wrapper">
    <div class="row">
        <div class="col-sm-12">
            <div class="card">
                <div class="card-header">
                    <h4 class="card-title">Order detail</h4>
                </div>
                <div class="card-content">
                    <div class="card-body">  
                        <table class="table table-light">
                            <thead>
                                <tr>
                                    <th scope="col">Product name</th>
                                    <th scope="col">Image</th>
                                    <th scope="col">Price</th>
                                    <th scope="col">Quantity</th>
                                    <th scope="col">Size</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach($all_order_detail as $key => $order_detail)
                                <tr>
                                    <td>{{$order_detail->product_name}}</td>
                                    <td class="pro-img"><img src="{{asset('/public/uploads/product/'.$order_detail->image)}}" alt=""></td>
                                    <td>{{$order_detail->price}}$</td>
                                    <td>{{$order_detail->quantity}}</td>
                                    <td>{{$order_detail->size}}</td>
                                </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection