@extends('admin_layout')
@section('size_by_product')
<div class="content-wrapper">
    <div class="row">
        <div class="col-sm-12">
            <div class="card">
                <div class="card-header">
                    <h4 class="card-title">Size Management</h4>
                </div>
                <div class="card-content">
                    <div class="card-body">  
                        <table class="table table-light">
                            <thead>
                                <tr>
                                    <th scope="col">ID</th>
                                    <th scope="col">Size</th>
                                    <th scope="col">Quantity</th>
                                    <th scope="col">Edit</th>
                                    <th scope="col">Delete</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach($sizes as $key => $size) 
                                <tr>
                                    <td>{{$size->id}}</td>
                                    <td>{{$size->size}}</td>
                                    <td>{{$size->quantity}}</td>
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
<div class="modal fade" id="brandeditmodal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
      <div class="modal-dialog" role="document">
        <div class="modal-content">
          <div class="modal-header">
            <h5 class="modal-title" id="exampleModalLabel">Edit brand</h5>
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
              <span aria-hidden="true">&times;</span>
            </button>
          </div>
          <form action="{{URL::to('/update-brand-product')}}" method="POST">
            {{csrf_field()}}
            <div class="modal-body">
              <div class="form-group">
                <input type="hidden" name="update_brand_id" id='update_brand_id' class="form-control">
              </div>
              <div class="form-group">
                <label>Brand Name</label>
                <input type="text" name="update_brand_name" id="update_brand_name" class="form-control" placeholder="brand name">
              </div>
              <div class="form-group">
                <label>Brand Description</label>
                <input type="text" name="update_brand_desc" id="update_brand_desc" class="form-control" placeholder="">
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
<div class="modal fade" id="branddeletemodal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
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
          $('#catedeletemodal').modal('show');

          $str = $(this).closest('tr');

          var data = $str.children('td').map(function() {
            return $(this).text();
          }).get();
          console.log(data);
          $('#del_cate_id').val(data[0]);
        });
      });
    </script>

    <script type="text/javascript">
      $(document).ready(function() {
        $('.editbtn').on('click', function() {
          $('#cateeditmodal').modal('show');

          $str = $(this).closest('tr');

          var data = $str.children('td').map(function() {
            return $(this).text();
          }).get();

          console.log(data);
          $('#update_cate_id').val(data[0]);
          $('#update_cate_name').val(data[1]);
          $('#update_cate_desc').val(data[2]);
        });
      });
    </script>
@endsection