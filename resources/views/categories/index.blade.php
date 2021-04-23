@extends('layouts.main.app')
@section('categories', 'active')

@section('main-content')
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1 class="m-0">Categories - List</h1>
                </div><!-- /.col -->
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="{{route('dashboard')}}">Dashboard</a></li>
                        <li class="breadcrumb-item active">Categories</li>
                        <li class="breadcrumb-item active">List</li>
                    </ol>
                </div><!-- /.col -->
            </div><!-- /.row -->
        </div><!-- /.container-fluid -->
    </div>
    <!-- /.content-header -->
    <!-- Main content -->
    <div class="content">
        <div class="container-fluid">

            {{-- Show Error --}}
            @include('partials.error')
            {{-- Show Status --}}
            @include('partials.alert')

            <div class="row">
                <div class="col-12">
                    <div class="card">
                        <div class="card-header">
                            <h3 class="card-title">Total Categories {{ $categories->count() }}</h3>

                            <div class="card-tools">
                                <a href="{{ route("categories.create") }}" type="button"
                                    class="btn btn-primary btn-block btn-sm">Create
                                    New</a>
                            </div>
                        </div>
                        <!-- /.card-header -->
                        <div class="card-body table-responsive p-0" style="height: 390px;">
                            @if ($categories->count() > 0)
                            <table class="table table-head-fixed table-hover text-nowrap">
                                <thead>
                                    <tr>
                                        <th>#</th>
                                        <th>Name</th>
                                        <th>Created At</th>
                                        <th>Edit</th>
                                        <th>View</th>
                                        <th>Delete</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($categories as $category)
                                    <tr>
                                        <td>{{$loop->index + 1 }}</td>
                                        <td>{{ $category->name }}</td>
                                        <td>{{ $category->created_at->format('d/m/Y') }}</td>
                                        {{-- <td><textarea disabled name="" id="" cols="30" rows="2">{{ $category->description }}</textarea>
                                        </td> --}}
                                        {{-- edit-btn --}}
                                        <td><a href="{{ route('categories.edit',$category) }}"
                                                class="btn bg-warning btn-sm">
                                                <i class="fas fa-pen"></i>
                                            </a></td>
                                        {{-- view-btn --}}
                                        <td><a class="btn bg-info btn-sm">
                                                <i class="fas fa-eye"></i>
                                            </a></td>
                                        {{-- delete-btn --}}
                                        <td>
                                            <a class="btn bg-danger btn-sm" onclick="if(confirm('Are you sure, You want to delete this category ?')){
                                                    event.preventDefault();
                                                    document.getElementById('deleteform-{{$category->slug}}').submit();
                                                }
                                                else{
                                                    event.preventDefault();
                                                }">
                                                <i class="fas fa-trash"></i>
                                            </a>
                                            <form id="deleteform-{{ $category->slug }}" method="POST"
                                                action="{{ route('categories.destroy',$category->slug)}}"
                                                style="display: none">
                                                @csrf
                                                @method('DELETE')
                                            </form>
                                        </td>
                                    </tr>
                                    @endforeach
                                    {{-- <tr class="bg-light disabled color-palette"></tr> --}}
                                </tbody>
                            </table>
                            @else
                            <div class="d-flex justify-content-center align-items-center h-100" id="main">
                                <h1 class="mr-3 pr-3 align-top border-right inline-block align-content-center">404</h1>
                                <div class="inline-block align-middle">
                                    <h2 class="font-weight-normal lead" id="desc">No Category Were Found.
                                    </h2>
                                </div>
                            </div>
                            {{-- <div class="alert alert-info alert-dismissible h-100 w-100 mb-0 p-5">
                                <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
                                <h5><i class="icon fas fa-info"></i>404 No Category Found !!!</h5>
                                <br>
                                <ul style="padding-inline-start: 18px;">
                                    <li>Create New <a href="{{ route('categories.create') }}">here</a></li>
                            <li>Check Database</li>
                            <li>Contact Support <a href="{{ route('categories.create') }}">here</a></li>
                            </ul>
                        </div> --}}
                        @endif
                    </div>
                    <!-- /.card-body -->
                </div>
                <!-- /.card -->
            </div>
        </div>
        <!-- /.row -->
    </div><!-- /.container-fluid -->
</div>
<!-- /.content -->
</div>
@endsection