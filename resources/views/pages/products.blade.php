@extends('product_layout')
@push('style')
<style type="text/css">
    .my-active span{
      background-color: #5cb85c !important;
      color: white !important;
      border-color: #5cb85c !important;
    }
    .pager {
      display: flex;
      list-style: none;
    }
  </style>
<link rel="stylesheet" type="text/css" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
@endpush 
@section('content')
<section class="shop_section layout_padding">
        <div class="container">
            <div class="heading_container heading_center">
                <h2>
                Latest Watches
                </h2>
            </div>
            <div class="row">
              <div class="l-3 me-0 s-0">
                <div class="bl_left">
                    <div class="cate_heading text-center">
                        <h3>Category</h3>
                    </div>
                    <div class="list-group">
                        @foreach($all_category_product as $key =>$category)
                            <a href="{{URL::to('/category/'.$category->id)}}" class="list-group-item list-group-item-action">{{$category->category_name}}</a>
                        @endforeach
                    </div>
                </div>
                <div class="bl_left">
                  <div class="cate_heading text-center">
                      <h3>Brand</h3>
                  </div>
                  <div class="list-group">
                      @foreach($all_brand_product as $key =>$brand)
                          <a href="{{URL::to('/brand/'.$brand->id)}}" class="list-group-item list-group-item-action">{{$brand->brand_name}}</a>
                      @endforeach
                  </div>
                </div>
                <div class="bl_left">
                  <div class="cate_heading text-center">
                      <h3>Gender</h3>
                  </div>
                  <div class="list-group">
                      <a href="{{URL::to('/gender/male')}}" class="list-group-item list-group-item-action">Male</a>
                      <a href="{{URL::to('/gender/female')}}" class="list-group-item list-group-item-action">Female</a>
                  </div>
                </div>
              </div>
            <div class="col-xl-9 col-md-12">
              <div class="row" id="content">
                @foreach($products as $key => $product)
                <div class="col-md-6 col-xl-4">
                  <div class="box">
                    <a href="{{URL::to('/product-detail/'.$product->id)}}">
                      <div class="img-box">
                        <img src="{{asset('/public/uploads/product/'.$product->image)}}" alt="">
                      </div>
                      <div class="detail-box">
                        <h6>{{$product->product_name}}</h6>
                        <h6>
                          Price:
                          <span>{{$product->price}}$</span>
                        </h6>
                      </div>
                      <div class="new">
                        <span> New </span>
                      </div>
                    </a>
                  </div>
                </div>
                @endforeach
              </div>
              {{ $products->links('vendor.pagination.custom') }}
            </div>
        </div>
      </div>
    </section>

@endsection
             