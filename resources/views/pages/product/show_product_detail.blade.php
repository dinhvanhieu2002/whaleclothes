@extends('product_layout')
@section('product_detail')
<main class="mt-5 pt-4">
  <div class="container dark-grey-text mt-5">
      @foreach($product_detail as $key => $product_detail)
      <div class="row fadeIn">
          <div class="col-lg-6 col-md-6 mb-4">
              <img src="{{asset('/public/uploads/product/'.$product_detail->image)}}" class="img-fluid" alt="">
          </div>
          <div class="col-lg-6 col-md-6 mb-4">
              <div class="p-4">
                  <h3 class="font-weight-bold">{{$product_detail->product_name}}</h3>
                  <p class="lead">
                  <span>Price: ${{$product_detail->price}}</span>
                  </p>
                  <p class="lead font-weight-bold">Description</p>
                  <p>{{$product_detail->product_desc}}</p>
                  <form class="" action="{{URL::to('/add-to-cart')}}" method="GET">
                      {{csrf_field()}}
                      <input type="hidden" name="product_id" value="{{$product_detail->id}}">
                      <div class="d-flex justify-content-left">
                          <div class="product_detail_qty">
                              <label for="">Quantity</label>
                              <input type="number" value="1" aria-label="Search" name="quantity" class="form-control" style="width: 100px">
                          </div>
                          <div class="product_detail_size">
                              <label for="">Size</label>
                              <div class="mt-1">
                                  <div class="form-check form-check-inline pl-0">
                                      <input type="radio" class="form-check-input" id="small" value="S" name="size" checked>
                                      <label class="form-check-label small text-uppercase card-link-secondary"
                                      for="small">Small</label>
                                  </div>
                                  <div class="form-check form-check-inline pl-0">
                                      <input type="radio" class="form-check-input" id="medium" value="M" name="size">
                                      <label class="form-check-label small text-uppercase card-link-secondary"
                                      for="medium">Medium</label>
                                  </div>
                                  <div class="form-check form-check-inline pl-0">
                                      <input type="radio" class="form-check-input" id="large" value="L" name="size">
                                      <label class="form-check-label small text-uppercase card-link-secondary"
                                      for="large">Large</label>
                                  </div>
                              </div>
                          </div>
                      </div>
                      <button class="btn btn-primary btn-md my-0 p mt-3" type="submit" style="height: 45px;">Buy now
                          <i class="fa fa-shopping-cart ml-1"></i>
                      </button>
                  </form>
              </div>
          </div>
      </div>
      @endforeach
  <hr>
  </div>
</main>
<div class="container comment-area">
  <div class="row comment-input">
        <i class="fa fa-user-circle avt_icon"></i>
        <!-- <form method="POST" id="comment_form"> -->
        <!-- {{csrf_field()}} -->
        <input type="hidden" class="comment_user_id" name="comment_user_id" value="<?php echo Session::get('user_id'); ?>">
        <input type="hidden" class="comment_product_id" name="comment_product_id" value="{{$product_id}}">
        <div class="form-group mt-2 w-75">
            <input type="text" name="comment_content" class="comment_content form-control w-100 p-3 h-100" placeholder="Comment here...">
        </div>
        <!-- <textarea name="editor1" class="comment_content" ></textarea> -->
        <div>
            <button type="button" class="btn btn-primary float-right" id="cmtBtn" name="submit">Comment</button>
        </div>
      <!-- </form> -->
  </div>
  <div id="comment_list">
    
  </div>
</div>
@endsection
  


