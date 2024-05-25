@extends('admin.dashboard.index')

@section('title', 'Role')

@section('page-breadcrumb')
<li><a href="{{ route('admin.list.role') }}" title="">Role</a></li>
@endsection

@section('custom-css')

@endsection

@section('content-title')
<div class="row mb-2">
    <div class="col-8 d-flex align-items-center">
        Role
    </div>
    <div class="col-4">
        <div class="input-group">
            <a href="{{ route('admin.add.role') }}" class="button uk-button-default ml-auto px-3 py-2">
                <i class="icofont-plus"></i> <span class="d-none d-md-inline">Add Role</span>
            </a>
        </div>
    </div>
</div>
@endsection
@section('content')
<div class="row merged20 mb-4">
    <div class="col-lg-12">
        <div class="d-widget">
            <table id="myTableRole">
                <thead>
                    <tr>
                        <th>#</th>
                        <th>Name</th>
                        <th>Desc</th>
                        <th>Action</th>
                    </tr>
                </thead>
                <tbody>
                    @forelse ($beritas as $berita)
                    <tr>
                        <td>{{++$loop->index}}</td>
                        <td>
                            {{strip_tags($berita->name)}}
                        </td>
                        <td>
                            {{strip_tags($berita->desc)}}
                        </td>
                        <td>
                            <div class="button soft-primary"><a href="{{ route('admin.edit.role', encrypt($berita->id)) }}"><i class="icofont-pen-alt-1"></i></a></div>
                        </td>
                    </tr>
                    @empty
                    <tr>
                        <td colspan="7">Empty</td>
                    </tr>
                    @endforelse
                </tbody>
            </table>
        </div>
    </div>
</div>
@endsection

@section('custom-js')

@endsection