@extends('layouts.admin')

@section('title-content')
    {{ $title }}
@endsection

@section('breadcrumb')
    <li class="breadcrumb-item"><a href="{{ route('users.index') }}">User</a></li>
    <li class="breadcrumb-item active"><a href="{{ route('users.edit', [$user->id]) }}">Edit User</a></li>
@endsection

@section('content')
    <div class="card">
        <div class="card-header">
            <h3 class="card-title">Edit User</h3>
        </div>
        <div class="card-body">
            <form class="g-3 mx-3 row" method="post" action="{{ route('users.update', [$user->id]) }}">
                @csrf
                @method('put')
                <div class="col-md-6">
                    @include('admin.components.text', [
                        'title' => 'Name',
                        'name' => 'name',
                        'type' => 'text',
                        'item' => $user->name,
                    ])
                </div>
                <div class="col-md-6">
                    @include('admin.components.text', [
                        'title' => 'Email',
                        'name' => 'email',
                        'type' => 'email',
                        'item' => $user->email,
                    ])
                </div>
                <div class="col-md-6">
                    <div class="form-group">
                        <label class="form-label">Password</label>
                        <input type="password" name="password" class="form-control @error('password') is-invalid @enderror"
                            >
                        @error('password')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>
                </div>
                <div class="col-md-12">
                    <button type="submit" class="btn btn-success">Update</button>
                </div>
            </form>
        </div>
    </div>
@endsection
