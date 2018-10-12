@extends('layouts.app')

@section('page-title')
<h1>
    <i class="fa fa-user"></i> Users
</h1>
@endsection

@section('breadcrumb')
<li><a href="#">Dashboard</a></li>
<li><a href="{{ route('users.index') }}">Users</a></li>
<li class="active">Add New</li>
@endsection

@section('content')
 {{ $user->name}}
@endsection
