@extends('admin.dashboard.index')

@section('title', 'User')

@section('page-breadcrumb')
<li><a href="{{ route('admin.list.user') }}" title="">User</a></li>
@endsection

@section('custom-css')

@endsection

@section('content-title')
<div class="row mb-2">
    <div class="col-8 d-flex align-items-center">
        User
    </div>
    <div class="col-4">
        <div class="input-group">
            <a href="{{ route('admin.add.user') }}" class="button uk-button-default ml-auto px-3 py-2">
                <i class="icofont-plus"></i> <span class="d-none d-md-inline">Add User</span>
            </a>
        </div>
    </div>
</div>
@endsection
@section('content')
<div class="row merged20 mb-4">
    <div class="col-lg-12">
        <div class="d-widget">
            <table id="myTableUser">
                <thead>
                    <tr>
                        <th>#</th>
                        <th>Name</th>
                        <th>Email</th>
                        <th>Phone Number</th>
                        <th>Role</th>
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
                            {{strip_tags($berita->email)}}
                        </td>
                        <td>{{strip_tags($berita->phone_number)}}</td>
                        <td>
                            {{strip_tags($berita->role)}}

                        </td>
                        <td>
                            <div class="button soft-primary"><a href="{{ route('admin.edit.user', encrypt($berita->id)) }}"><i class="icofont-pen-alt-1"></i></a></div>
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
{{ $beritas->links() }}

@endsection

@section('custom-js')

@endsection