@extends('admin_layout')
@section('shipping_address')
<div class="content-wrapper">
    <div class="row">
        <div class="col-sm-12">
            <div class="card">
                <div class="card-header">
                    <h4 class="card-title">Shipping address</h4>
                </div>
                <div class="card-content">
                    <div class="card-body">  
                        <table class="table table-light">
                            <thead>
                                <tr>
                                    <th scope="col">First name</th>
                                    <th scope="col">Last name</th>
                                    <th scope="col">Phone number</th>
                                    <th scope="col">Email</th>
                                    <th scope="col">Address</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach($shipping_address as $key => $ship)
                                <tr>
                                    <td>{{$ship->fname}}</td>
                                    <td>{{$ship->lname}}</td>
                                    <td>{{$ship->phone}}$</td>
                                    <td>{{$ship->email}}</td>
                                    <td>{{$ship->address}}</td>
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