@extends('layouts.backend')

@section('content')
    <!-- Hero -->
    <div class="bg-body-light">
        <div class="content content-full">
            <div class="d-flex flex-column flex-sm-row justify-content-sm-between align-items-sm-center">
                <h1 class="flex-sm-fill h3 my-2">Dashboard</h1>
                <nav class="flex-sm-00-auto ml-sm-3" aria-label="breadcrumb">
                    {{ Breadcrumbs::render('home') }}
                </nav>
            </div>
       </div>
    </div>
    <!-- END Hero -->

    <!-- Page Content -->
    <div class="content">
        <div class="row justify-content-center">
            <div class="col-md-6 col-xl-5">
                <div class="block">
                    <div class="block-header">
                        <h3 class="block-title">Welcome to MRT Information Board System</h3>
                    </div>
                    <div class="block-content">
                        <p class="font-size-sm text-muted">
                            We manage the MRT Information like TRAIN, STATION AND SCHEDULE
                        </p>
                        <p class="font-size-sm text-muted">
                            This Dashboard is exclusive use by special User.
                        </p>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- END Page Content -->
@endsection
