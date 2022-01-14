@extends('admin_layout')
@section('all_product')
<div class="content-wrapper">
    <div class="row">
        <div class="col-sm-12">
            <div class="card">
                <div class="card-header">
                    <h4 class="card-title">Product Management</h4>
                </div>
                <div class="card-content">
                    <div class="card-body">  
                        <table class="table table-light">
                            <thead>
                                <tr>
                                    <th scope="col">ID</th>
                                    <th scope="col">Product name</th>
                                    <th scope="col">Product description</th>
                                    <th scope="col">Price</th>
                                    <th scope="col">Size</th>
                                    <th scope="col">Image</th>
                                    <th scope="col">Edit</th>
                                    <th scope="col">Delete</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach($all_product as $key => $product)
                                <tr>
                                    <td>{{$product->id}}</td>
                                    <td>{{$product->product_name}}</td>
                                    <td>{{$product->product_desc}}</td>
                                    <td>{{$product->price}}</td>
                                    <td><a href="{{'./size-by-product?productid='.$product->id}}">Size</a></td>
                                    <td class="pro-img"><img src="{{asset('/public/uploads/product/'.$product->image)}}" alt=""></td>
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
<div class="modal fade" id="producteditmodal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
      <div class="modal-dialog" role="document">
        <div class="modal-content">
          <div class="modal-header">
            <h5 class="modal-title" id="exampleModalLabel">Edit product</h5>
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
              <span aria-hidden="true">&times;</span>
            </button>
          </div>
          <form action="{{URL::to('/update-product')}}" method="POST">
            {{csrf_field()}}
            <div class="modal-body">
              <div class="form-group">
                <input type="hidden" name="update_product_id" id='update_product_id' class="form-control">
              </div>
              <div class="form-group">
                <label>Product Name</label>
                <input type="text" name="update_product_name" id="update_product_name" class="form-control" placeholder="">
              </div>
              <div class="form-group">
                <label>Product Description</label>
                <textarea name="update_product_desc" id="update_product_desc" cols="100" rows="10" class="form-control"></textarea>
              </div>
              <div class="form-group">
                <label>Price</label>
                <input type="text" name="update_product_price" id="update_product_price" class="form-control">
              </div>
              <div class="form-group">
                <label>Image File</label><br>
                <input type="file" name="update_product_image" id="update_product_image">
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
<div class="modal fade" id="productdeletemodal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
      <div class="modal-dialog" role="document">
        <div class="modal-content">
          <div class="modal-header">
            <h5 class="modal-title" id="exampleModalLabel">Delete product</h5>
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
              <span aria-hidden="true">&times;</span>
            </button>
          </div>
          <form action="{{URL::to('/delete-product')}}" method="POST">
            {{csrf_field()}}
            <div class="modal-body">
              <input type="hidden" name="del_product_id" id='del_product_id'>
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
          $('#productdeletemodal').modal('show');

          $str = $(this).closest('tr');

          var data = $str.children('td').map(function() {
            return $(this).text();
          }).get();
          console.log(data);
          $('#del_product_id').val(data[0]);
        });
      });
    </script>

    <script type="text/javascript">
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
    </script>
@endsection