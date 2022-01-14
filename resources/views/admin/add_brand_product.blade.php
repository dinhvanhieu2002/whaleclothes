@extends('admin_layout')
@section('add_brand_product')
<div class="content-wrapper">
    <?php 
        session_start();
        $message = Session::get('message');
        if($message) {
            echo '<span class="text-alert">'.$message.'</span>';
            Session::put('message', null);
        }
    ?>
    <form action="{{URL::to('/save-brand-product')}}" method="POST">
        <div class="modal-body">
            <div class="form-group">
                {{csrf_field()}}
                <label>Brand Name</label>
                <input type="text" name="brand_name" class="form-control" placeholder="Brand Name">
                <label>Brand Description</label><br>
                <textarea name="editor1" class="comment_content" ></textarea>
                <!-- <textarea name="brand_desc" id="" cols="100" rows="10"></textarea> -->
            </div>
        </div>
        
        <div class="modal-footer">
            <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
            <button type="submit" name="insertdata" class="btn btn-primary">Save data</button>
        </div>
    </form>
</div>
@endsection