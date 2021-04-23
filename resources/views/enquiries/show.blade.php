@extends('layouts.main.app')
@section('enquiries', "active")

@section('main-content')
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1 class="m-0">Enquiry</h1>
                </div><!-- /.col -->
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item active"><a href="{{ route('dashboard') }}">Dashboard</a></li>
                        <li class="breadcrumb-item ">Enquiries</li>
                        <li class="breadcrumb-item ">Show</li>
                    </ol>
                </div><!-- /.col -->
            </div><!-- /.row -->
        </div><!-- /.container-fluid -->
    </div>
    <!-- /.content-header -->


    <!-- Main content -->
    <div class="content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-12">
                    {{-- <h4>Recent Activity</h4> --}}

                    <div class="card">
                        <div class="card-body">
                            <div class="post">
                                <div class="user-block">
                                    <div class="username ml-0">
                                        <a href="#">{{ $enquiry->name }}</a>
                                    </div>
                                    <div class="my-1"></div>
                                    <span class="description ml-0"><i class="fas fa-at mr-1"></i>{{ $enquiry->email }} |
                                        <i class="fas fa-phone-alt m-1"></i>
                                        {{ $enquiry->phone }} </span>
                                    <div class="my-1"></div>
                                    <span class="description ml-0"><i
                                            class="fas fa-clock  mr-1 "></i>{{ $enquiry->created_at->diffForHumans() }}</span>
                                    <div class="my-1"></div>
                                    <span class="description ml-0"><i
                                            class="fas fa-hashtag mr-1"></i>{{ $enquiry->package->pkg_id ?? "Not Available" }}
                                        |
                                        <i class="fas fa-th m-1"></i>
                                        {{ $enquiry->package->name ?? "Not Available" }} </span>
                                </div>
                                <!-- /.user-block -->
                                <p>
                                    {{$enquiry->message}}
                                </p>
                                <p>
                                    <a href="mailto:{{ $enquiry->email }}" class="btn btn-primary btn-sm"><i
                                            class="fas fa-paper-plane mr-2"></i>Reply To {{ $enquiry->name }}</a>
                                </p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div><!-- /.container-fluid -->
    </div>
    <!-- /.content -->
</div>
@endsection