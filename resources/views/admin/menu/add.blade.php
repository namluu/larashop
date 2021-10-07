@extends('admin.layout')

@section('head')
    <script src="/template/admin/ckeditor/ckeditor.js"></script>
@endsection

@section('content')
    <div class="card card-primary">
        <div class="card-header">
            <h3 class="card-title">Add new</h3>
        </div>
        <!-- /.card-header -->
        <!-- form start -->
        <form action="" method="post">
            <div class="card-body">
                <div class="form-group">
                    <label>Name</label>
                    <input class="form-control" name="name">
                </div>

                <div class="form-group">
                    <label>Parent</label>
                    <select class="form-control" name="parent_id">
                        <option value="0">Parent</option>
                    </select>
                </div>

                <div class="form-group">
                    <label>Description</label>
                    <textarea class="form-control" name="description"></textarea>
                </div>

                <div class="form-group">
                    <label>Content</label>
                    <textarea class="form-control" name="content" id="content"></textarea>
                </div>

                <div class="form-group">
                    <label>Active</label>
                    <div class="form-check">
                        <input class="form-check-input" type="radio" name="active" checked="">
                        <label class="form-check-label">Yes</label>
                    </div>
                    <div class="form-check">
                        <input class="form-check-input" type="radio" name="active">
                        <label class="form-check-label">No</label>
                    </div>
                </div>
            </div>
            <!-- /.card-body -->

            <div class="card-footer">
                <button type="submit" class="btn btn-primary">Submit</button>
            </div>
        </form>
    </div>
@endsection

@section('footer')
    <script>
        CKEDITOR.replace('content');
    </script>
@endsection
