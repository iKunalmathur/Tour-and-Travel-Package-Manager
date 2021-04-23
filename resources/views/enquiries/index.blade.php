@extends('layouts.main.app')
@section('enquiries', "active")

@section('main-content')
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1 class="m-0">Enquiries</h1>
                </div><!-- /.col -->
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item active"><a href="{{ route('dashboard') }}">Dashboard</a></li>
                        <li class="breadcrumb-item">Enquiries</li>
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
                    <div class="card">
                        <div class="card-body table-responsive p-0">
                            <table class="table table-hover text-nowrap">
                                <thead>
                                    <tr>
                                        <th>ID</th>
                                        <th>Customer Name</th>
                                        <th>Phone no</th>
                                        <th>Email</th>
                                        <th>Date</th>
                                        <th>Package ID</th>
                                        <th>Package Name</th>
                                        <th>Show</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @forelse ($enquiries as $enquiry)
                                    <tr>
                                        <td>{{ $enquiry->id }}</td>
                                        <td>{{ $enquiry->name }}</td>
                                        <td>{{ $enquiry->phone }}</td>
                                        <td>{{ $enquiry->email }}</td>
                                        <td>{{ $enquiry->created_at->format('d/m/y') }}</td>
                                        <td>{{ $enquiry->package->pkg_id ?? "Not Available"}}</td>
                                        <td>{{ $enquiry->package->name ?? "Not Available"}}</td>
                                        <td>
                                            <a href="{{ route("enquiries.show", $enquiry) }}" class="btn btn-info"><i
                                                    class="fas fa-eye"></i></a>
                                        </td>
                                    </tr>
                                    @empty
                                    <tr>
                                        <td>No record found</td>
                                        <td></td>
                                        <td></td>
                                        <td></td>
                                        <td></td>
                                        <td></td>
                                        <td></td>
                                        <td></td>
                                    </tr>
                                </tbody>
                                @endforelse
                            </table>
                        </div>
                        <!-- /.card-body -->
                    </div>
                    <!-- /.card -->
                </div>
            </div>
        </div><!-- /.container-fluid -->
    </div>
    <!-- /.content -->
</div>
@endsection