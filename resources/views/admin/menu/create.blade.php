@extends('admin.layout')

@section('title')
    Create menu
@endsection

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
        <form action="{{ route('menus.store') }}" method="post">
            <div class="card-body">
                <div class="form-group">
                    <label>Name</label>
                    <input class="form-control" name="name">
                </div>

                <div class="form-group">
                    <label>Parent</label>
                    <select class="form-control" name="parent_id">
                        <option value="0">--- root ---</option>
                        @foreach($menuParents as $item)
                            <option value="{{ $item->id }}">{{ $item->name }}</option>
                        @endforeach
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
                        <input class="form-check-input" type="radio" name="active" value="1" checked="">
                        <label class="form-check-label">Yes</label>
                    </div>
                    <div class="form-check">
                        <input class="form-check-input" type="radio" name="active" value="0">
                        <label class="form-check-label">No</label>
                    </div>
                </div>
            </div>
            <!-- /.card-body -->

            <div class="card-footer">
                <button type="submit" class="btn btn-primary">Submit</button>
            </div>

            @csrf
        </form>
    </div>
@endsection

@section('footer')
    <script>
        CKEDITOR.replace('content');
    </script>
@endsection
