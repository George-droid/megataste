@extends('be.auth.layouts.default')

@section('content')
<div class="container-fluid">
    
    <!-- Page Heading -->
    <div class="d-sm-flex align-items-center justify-content-between mb-4">
        <h1 class="h3 mb-0 text-gray-800">Delete Menu Categories</h1>
        <a href="#" class="d-none d-sm-inline-block btn btn-sm btn-primary shadow-sm"><i
                class="fas fa-download fa-sm text-white-50"></i> Generate Report</a>
    </div>

    <!-- Content Row -->
    {{-- <div class="row">

        <!-- Earnings (Monthly) Card Example -->
        <div class="col-md-10 mb-3">
            <div class="card border-left-primary shadow h-100 ">
                <div class="card-body">
                    <div class="row no-gutters align-items-center">
                        <div class="col mr-2">
                            <div class="h5 mb-0 font-weight-bold text-gray-800"></div>
                        </div>
                        <div class="col-auto">
                            <i class="fas fa-calendar fa-2x text-gray-300"></i>
                        </div>
                    </div>
                </div>
            </div>
        </div>

    </div> --}}
    <div class="container-fluid flex-grow-1 container-p-y">
        <!-- Layout Demo -->
        <div class="card-body">
            <div class="col-lg-12 mb-4 mb-xl-0">
                <div class="demo-inline-spacing mt-3">
                    <div class="list-group">
                        @foreach ($menus as $menu)
                            <form action="{{ route('be.deletemenus', ['id' => $menu->id]) }}" method="POST">
                                @csrf
                                @method('DELETE')
                                <a href="#" class="list-group-item list-group-item-action">
                                    <h5>{{ $menu->name }}
                                        <button type="submit" class="btn btn-primary float-end">
                                            Delete
                                        </button>
                                    </h5>
                                </a>
                            </form>
                        @endforeach
                    </div>
                </div>
            </div>
        </div>
        <!-- Layout Demo -->
    </div>
    

</div>
@endsection