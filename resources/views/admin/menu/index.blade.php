@extends('admin.layout')

@section('title', 'Index menu')

@section('content')
    <div class="card-header">
        <h3 class="card-title">Latest menus</h3>
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
                    <th></th>
                </tr>
            </thead>
            <tbody>
                @include('admin.menu.multiple', ['menus' => $menus, 'parent_id' => 0, 'char' => ''])
            </tbody>
        </table>
    </div>
    <div class="card-header">
        <div class="card-tools">
            {{ $menus->links() }}
        </div>
    </div>
@endsection
