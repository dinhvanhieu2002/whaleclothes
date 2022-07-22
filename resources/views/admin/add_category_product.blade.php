@extends('admin_layout')
@section('add_category_product')
<div class="content-wrapper">
    <?php 
        session_start();
        $message = session()->get('message');
        if($message) {
            echo '<span class="text-alert">'.$message.'</span>';
            session()->put('message', null);
        }
    ?>
    <form action="{{URL::to('/save-category-product')}}" method="POST">
        <div class="modal-body">
            <div class="form-group">
                {{csrf_field()}}
                <label>Cate Name</label>
                <input type="text" name="cate_name" class="form-control" placeholder="Cate Name">
                <label>Cate Description</label>
                <textarea name="editor1" class="comment_content" ></textarea>

                <!-- <textarea name="cate_desc" id="" cols="100" rows="10"></textarea> -->
            </div>
        </div>
        
        <div class="modal-footer">
            <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
            <button type="submit" name="insertdata" class="btn btn-primary">Save data</button>
        </div>
    </form>
</div>
@endsection