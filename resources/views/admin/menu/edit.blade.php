@extends('admin.layout')

@section('title', "Edit menu: $menu->name")

@section('head')
    <script src="/template/admin/ckeditor/ckeditor.js"></script>
@endsection

@section('content')
    <div class="card card-primary">
        <div class="card-header">
            <h3 class="card-title">Edit menu: {{ $menu->name }}</h3>
        </div>
        <!-- /.card-header -->
        <!-- form start -->
        <form action="{{ route('menus.update', $menu) }}" method="post">
            @method('PUT')
            <div class="card-body">
                <div class="form-group">
                    <label>Name</label>
                    <input class="form-control" name="name" value="{{ $menu->name }}">
                </div>

                <div class="form-group">
                    <label>Parent</label>
                    <select class="form-control" name="parent_id">
                        <option value="0" @if ($menu->parent_id == 0) selected="selected" @endif>--- root ---</option>
                        @foreach($menuParents as $item)
                            <option value="{{ $item->id }}" @if ($item->id == $menu->parent_id) selected="selected" @endif>{{ $item->name }}</option>
                        @endforeach
                    </select>
                </div>

                <div class="form-group">
                    <label>Description</label>
                    <textarea class="form-control" name="description">{{ $menu->description }}</textarea>
                </div>

                <div class="form-group">
                    <label>Content</label>
                    <textarea class="form-control" name="content" id="content">{{ $menu->content }}</textarea>
                </div>

                <div class="form-group">
                    <label>Active</label>
                    <div class="form-check">
                        <input class="form-check-input" type="radio" name="active" value="1" @if ($item->active == 1) checked="" @endif>
                        <label class="form-check-label">Yes</label>
                    </div>
                    <div class="form-check">
                        <input class="form-check-input" type="radio" name="active" value="0" @if ($item->active == 0) checked="" @endif>
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
