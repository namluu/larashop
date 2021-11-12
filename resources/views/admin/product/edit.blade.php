@extends('admin.layout')

@section('title', 'Edit product')

@section('head')
    <script src="/template/admin/ckeditor/ckeditor.js"></script>
@endsection

@section('content')
    <div class="card card-primary">
        <div class="card-header">
            <h3 class="card-title">Edit</h3>
        </div>
        <!-- /.card-header -->
        <!-- form start -->
        <form action="{{ route('products.update', $product) }}" method="post">
            @method('PUT')
            <div class="card-body">
                <div class="row">
                    <div class="col-sm-6">
                        <div class="form-group">
                            <label>Name</label>
                            <input class="form-control" name="name" value="{{ $product->name }}">
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
                                            <option value="{{ $children['id'] }}"
                                                    @if ($children['id'] == $product->menu_id) selected="selected" @endif>
                                                {{ $children['name'] }}</option>
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
                            <input class="form-control" name="price" type="number" value="{{ $product->price }}">
                        </div>
                    </div>
                    <div class="col-sm-6">
                        <div class="form-group">
                            <label>Discount</label>
                            <input class="form-control" name="price_discount" type="number" value="{{ $product->price_discount }}">
                        </div>
                    </div>
                </div>

                <div class="form-group">
                    <label>Description</label>
                    <textarea class="form-control" name="description">{{ $product->description }}</textarea>
                </div>

                <div class="form-group">
                    <label>Content</label>
                    <textarea class="form-control" name="content" id="content">{{ $product->content }}</textarea>
                </div>

                <div class="form-group">
                    <label>Image</label>
                    <input class="form-control" name="file_upload" type="file" id="upload" />
                    <img src="{{ $product->thumb }}" alt="" id="image_show" width="200">
                    <input type="hidden" name="thumb" id="thumb" value="{{ $product->thumb }}">
                </div>

                <div class="form-group">
                    <label>Active</label>
                    <div class="form-check">
                        <input class="form-check-input" type="radio" name="active" value="1" @if ($product->active == 1) checked="" @endif>
                        <label class="form-check-label">Yes</label>
                    </div>
                    <div class="form-check">
                        <input class="form-check-input" type="radio" name="active" value="0" @if ($product->active == 0) checked="" @endif>
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
