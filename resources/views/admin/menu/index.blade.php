@extends('admin.layout')

@section('title')
    Index menu
@endsection

@section('content')
    <div class="card-header">
        <div class="card-tools">
            {{ $menus->links() }}
        </div>
    </div>
    <div class="card-body table-responsive p-0">
        <table class="table table-hover text-nowrap">
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Name</th>
                    <th>Description</th>
                    <th>Active</th>
                    <th>Date</th>
                </tr>
            </thead>
            <tbody>
                @foreach($menus as $item)
                <tr>
                    <td>{{ $item->id }}</td>
                    <td>{{ $item->name }}</td>
                    <td>{{ Str::of($item->description)->words(15, '...') }}</td>
                    <td>{{ $item->active }}</td>
                    <td>{{ $item->created_at }}</td>
                </tr>
                @endforeach
            </tbody>
        </table>
    </div>
    <div class="card-header">
        <div class="card-tools">
            {{ $menus->links() }}
        </div>
    </div>
@endsection
