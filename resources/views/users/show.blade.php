@extends('layouts.app')

{{-- @yield('page-title') --}} {{-- clear --}}
@section('page-title')
<h1>
    <i class="fa fa-users"></i> Users
</h1>
@endsection

{{-- @yield('breadcrumb') --}}
@section('breadcrumb')
<li><a href="#">Dashboard</a></li>
<li>Users</li>
<li class="active">Detail</li>
@endsection

@section('content')
	<div class="row">

	 	<div class="col-md-12 col-md-12 col-md-12">
	        <div class="box box-primary">
	            <div class="x_panel">
	                <div class="x_content">
	                    <div class="box-body">
	                    <ul class="list-group list-group-unbordered">
                            <li class="list-group-item">
                                <b>Name</b> <span class="pull-right">{{ $user->name }}</span>
                            </li>
                            <li class="list-group-item">
                                <b>Email</b> <span class="pull-right">{{ $user->email }}</span>
                            </li>
                        </ul>
	                    </div>
	                </div>
	            </div>
	     	</div>
	 	</div>

        <div class="col-md-12 col-md-12 col-md-12">
            <div class="box box-primary">
                <div class="x_title">
                    <h4>Product Order History</h4>
                </div>
                <div class="x_panel">
                    <div class="x_content">
                        <div class="box-body">    
                            <div class="clearfix"></div>
                            <div class="table-responsive">
                                <table class="table table-striped jambo_table bulk_action">
                                    <thead>
                                    <tr>
                                        <th>Name</th>
                                        <th>Price</th>
                                    </tr>
                                    </thead>
                                    <tbody>
                                    @forelse($user->products as $item)
                                        <tr>
                                            <td>{{ $item->name }}</td>
                                            <td>{{ $item->price }}</td>
                                        </tr>
                                    @empty
                                        <tr>
                                            <td colspan="8" class="text-center">Belum Ada Data</td>
                                        </tr>
                                    @endforelse
                                    </tbody>
                                </table>
                                <div class="clearfix"></div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
	</div>
@endsection