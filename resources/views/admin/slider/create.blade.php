@extends('admin.layout')

@section('title', 'Create slider')

@section('content')
    <div class="card card-primary">
        <div class="card-header">
            <h3 class="card-title">Add new</h3>
        </div>
        <!-- /.card-header -->
        <!-- form start -->
        <form action="{{ route('sliders.store') }}" method="post">
            <div class="card-body">
                <div class="form-group">
                    <label>Name</label>
                    <input class="form-control" name="name" value="{{ old('name') }}">
                </div>

                <div class="form-group">
                    <label>Image</label>
                    <input class="form-control" name="file_upload" type="file" id="upload" />
                    <img src="" alt="" id="image_show" width="200">
                    <input type="hidden" name="image" id="image">
                </div>

                <div class="form-group">
                    <label>Url</label>
                    <input class="form-control" name="url" value="{{ old('url') }}">
                </div>

                <div class="form-group">
                    <label>Sort order</label>
                    <input class="form-control" name="sort_order" value="{{ old('sort_order') ?: 1 }}" type="number">
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
                $("#image").val(result.url);
            } else {
                console.log('Upload failed');
            }
        }
    });
});
</script>
@endsection
