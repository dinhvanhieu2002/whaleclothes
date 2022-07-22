@extends('admin_layout')
@section('add_product')
<div class="content-wrapper">
    <?php 
        session_start();
        $message = session()->get('message');
        if($message) {
            echo '<span class="text-alert">'.$message.'</span>';
            session()->put('message', null);
        }
    ?>
    <form action="{{URL::to('/save-product')}}" method="POST"  enctype="multipart/form-data">
        <div class="modal-body">
            {{csrf_field()}}
            <div class="form-group">
                <label>Product name</label>
                <input type="text" name="product_name" id="product_name" class="form-control">
            </div>
            <div class="form-group">
                <label>Product Description</label><br>
                <textarea name="editor1" class="comment_content" ></textarea>

                <!-- <textarea name="product_desc" id="" cols="100" rows="10" class="form-control"></textarea> -->
            </div>
            <div class="form-group">
                <label>Price</label>
                <input type="text" name="price" id="price" class="form-control">
            </div>
            <div class="form-group">
                <label>Image File</label><br>
                <input type="file" name="image" id="image">
            </div>
            <div class="form-group">
                <label>Gender</label><br>
                <select class="custom-select" name="gender" id="">
                    <option value="male">Male</option>
                    <option value="female">Female</option>
                </select>
            </div>
            <div class="form-group">
                <label>Category</label><br>
                <select class="custom-select" name="product_category" id="">
                    @foreach($all_category_product as $key => $category)
                        <option value="{{$category->id}}">{{$category->category_name}}</option>
                    @endforeach
                </select>
            </div>
            <div class="form-group">
                <label>Brand</label><br>
                <select class="custom-select" name="product_brand" id="">
                    @foreach($all_brand_product as $key => $brand)
                        <option value="{{$brand->id}}">{{$brand->brand_name}}</option>
                    @endforeach
                </select>
            </div>
            <div class="form-group">
                <label>Size</label><br>
                <label>S</label>
                <input type="checkbox" name="sizeS" value="S">
                <input type="text" placeholder="Enter quantity" name="quantityS"><br>
                <label>M</label>
                <input type="checkbox" name="sizeM" value="M">
                <input type="text" placeholder="Enter quantity" name="quantityM"><br>
                <label>L</label>
                <input type="checkbox" name="sizeL" value="L">
                <input type="text" placeholder="Enter quantity" name="quantityL"><br>
            </div>
        </div>  
        <div class="modal-footer">
            <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
            <button type="submit" name="insertdata" class="btn btn-primary">Save data</button>
        </div>
    </form>
</div>
@endsection