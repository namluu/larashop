@extends('admin.layout')

@section('title', 'Create product')

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
        <form action="{{ route('products.store') }}" method="post">
            <div class="card-body">
                <div class="row">
                    <div class="col-sm-6">
                        <div class="form-group">
                            <label>Name</label>
                            <input class="form-control" name="name" value="{{ old('name') }}">
                        </div>
                    </div>
                    <div class="col-sm-6">
                        <div class="form-group">
                            <label>Menu</label>
                            <select class="form-control" name="menu_id">
                                <option value="0">--- select menu ---</option>
                                @foreach ($menus as $parent)
                                    <optgroup label="{{ $parent['name'] }}">
                                        @foreach ($parent['children'] as $children)
                                            <option value="{{ $children['id'] }}">{{ $children['name'] }}</option>
                                        @endforeach
                                    </optgroup>
                                @endforeach
                            </select>
                        </div>
                    </div>
                </div>

                <div class="row">
                    <div class="col-sm-6">
                        <div class="form-group">
                            <label>Price</label>
                            <input class="form-control" name="price" type="number" value="{{ old('price') }}">
                        </div>
                    </div>
                    <div class="col-sm-6">
                        <div class="form-group">
                            <label>Discount</label>
                            <input class="form-control" name="price_discount" type="number" value="{{ old('price_discount') }}">
                        </div>
                    </div>
                </div>

                <div class="form-group">
                    <label>Description</label>
                    <textarea class="form-control" name="description">{{ old('description') }}</textarea>
                </div>

                <div class="form-group">
                    <label>Content</label>
                    <textarea class="form-control" name="content" id="content">{{ old('content') }}</textarea>
                </div>

                <div class="form-group">
                    <label>Image</label>
                    <input class="form-control" name="file_upload" type="file" id="upload" />
                    <img src="" alt="" id="image_show" width="200">
                    <input type="hidden" name="thumb" id="thumb">
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

$("#upload").change(function () {
    const form = new FormData();
    form.append('file_upload', $(this)[0].files[0]);
    $.ajax({
        processData: false,
        contentType: false,
        type: 'POST',
        dataType: 'JSON',
        data: form,
        url: '/admin/upload/image',
        success: function (result) {
            if (result.url) {
                $("#image_show").attr('src', result.url);
                $("#thumb").val(result.url);
            } else {
                console.log('Upload failed');
            }
        }
    });
});
</script>
@endsection
