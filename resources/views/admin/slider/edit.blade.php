@extends('admin.layout')

@section('title', 'Edit slider')

@section('content')
    <div class="card card-primary">
        <div class="card-header">
            <h3 class="card-title">Edit</h3>
        </div>
        <!-- /.card-header -->
        <!-- form start -->
        <form action="{{ route('sliders.update', $slider) }}" method="post">
            @method('PUT')
            <div class="card-body">
                <div class="form-group">
                    <label>Name</label>
                    <input class="form-control" name="name" value="{{ $slider->name }}">
                </div>

                <div class="form-group">
                    <label>Image</label>
                    <input class="form-control" name="file_upload" type="file" id="upload" />
                    <img src="{{ $slider->image }}" alt="" id="image_show" width="200">
                    <input type="hidden" name="image" id="image" value="{{ $slider->image }}">
                </div>

                <div class="form-group">
                    <label>Heading</label>
                    <input class="form-control" name="respon1" value="{{ $slider->respon1 }}">
                </div>

                <div class="form-group">
                    <label>Secondary</label>
                    <input class="form-control" name="respon2" value="{{ $slider->respon2 }}">
                </div>

                <div class="form-group">
                    <label>Url</label>
                    <input class="form-control" name="url" value="{{ $slider->url }}">
                </div>

                <div class="form-group">
                    <label>Sort order</label>
                    <input class="form-control" name="sort_order" value="{{ $slider->sort_order }}" type="number">
                </div>

                <div class="form-group">
                    <label>Active</label>
                    <div class="form-check">
                        <input class="form-check-input" type="radio" name="active" value="1" @if ($slider->active == 1) checked="" @endif>
                        <label class="form-check-label">Yes</label>
                    </div>
                    <div class="form-check">
                        <input class="form-check-input" type="radio" name="active" value="0" @if ($slider->active == 0) checked="" @endif>
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
