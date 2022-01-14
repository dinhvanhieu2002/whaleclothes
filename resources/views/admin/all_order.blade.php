@extends('admin_layout')
@section('all_order')
<div class="content-wrapper">
    <div class="row">
        <div class="col-sm-12">
            <div class="card">
                <div class="card-header">
                    <h4 class="card-title">Order Management</h4>
                </div>
                <div class="card-content">
                    <div class="card-body">  
                        <table class="table table-light">
                            <thead>
                                <tr>
                                    <th scope="col">ID</th>
                                    <th scope="col">Address</th>
                                    <th scope="col">Payment method</th>
                                    <th scope="col">Date purchase</th>
                                    <th scope="col">Total</th>
                                    <th scope="col">Status</th>
                                    <th scope="col"></th>
                                    <th scope="col">Edit</th>
                                    <th scope="col">Delete</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach($all_order as $key => $order)
                                <tr>
                                    <td>{{$order->id}}</td>
                                    <td><a href="{{URL::to('/shipping-address/'.$order->shipping_id)}}">Address</a></td>
                                    <td>{{$order->payment_method}}</td>
                                    <td>{{$order->date}}</td>
                                    <td>{{$order->total}}$</td>
                                    <td>{{$order->status}}</td>
                                    <td><a href="{{URL::to('/order/'.$order->id)}}">More</a></td>
                                    <td>
                                        <button type="button" class="btn btn-success editbtn">Edit</button> 
                                    </td>
                                    <td>
                                        <button type="button" class="btn btn-danger deletebtn">Delete</button>
                                    </td>
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

@section('edit_modal')
<div class="modal fade" id="ordereditmodal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
      <div class="modal-dialog" role="document">
        <div class="modal-content">
          <div class="modal-header">
            <h5 class="modal-title" id="exampleModalLabel">Edit order</h5>
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
              <span aria-hidden="true">&times;</span>
            </button>
          </div>
          <form action="{{URL::to('/update-order')}}" method="POST">
            {{csrf_field()}}
            <div class="modal-body">
              <div class="form-group">
                <input type="hidden" name="update_order_id" id='update_order_id' class="form-control">
              </div>
              <div class="form-group">
                <label>Status</label>
                <input type="text" name="update_status" id="update_status" class="form-control">
              </div>
            </div>
          
            <div class="modal-footer">
              <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
              <button type="submit" name="updatedata" class="btn btn-primary">Update data</button>
            </div>
          </form>
        </div>
      </div>
    </div>
@endsection

@section('delete_modal')
<div class="modal fade" id="orderdeletemodal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
      <div class="modal-dialog" role="document">
        <div class="modal-content">
          <div class="modal-header">
            <h5 class="modal-title" id="exampleModalLabel">Delete brand</h5>
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
              <span aria-hidden="true">&times;</span>
            </button>
          </div>
          <form action="{{URL::to('/delete-brand-product')}}" method="POST">
            {{csrf_field()}}
            <div class="modal-body">
              <input type="hidden" name="del_brand_id" id='del_cate_id'>
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

@section('display_modal')
<script type="text/javascript">
      $(document).ready(function() {
        $('.deletebtn').on('click', function() {
          $('#orderdeletemodal').modal('show');

          $str = $(this).closest('tr');

          var data = $str.children('td').map(function() {
            return $(this).text();
          }).get();
          console.log(data);
          $('#del_order_id').val(data[0]);
        });
      });
    </script>

    <script type="text/javascript">
      $(document).ready(function() {
        $('.editbtn').on('click', function() {
          $('#ordereditmodal').modal('show');

          $str = $(this).closest('tr');

          var data = $str.children('td').map(function() {
            return $(this).text();
          }).get();

          console.log(data);
          $('#update_order_id').val(data[0]);
          $('#update_status').val(data[5]);
        });
      });
    </script>
@endsection