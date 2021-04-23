@extends('layouts.main.app')
@section('packages', 'active')

@section('main-content')
<div class="content-wrapper">
  <!-- Content Header (Page header) -->
  <div class="content-header">
    <div class="container-fluid">
      <div class="row mb-2">
        <div class="col-sm-6">
          <h1 class="m-0">Packages - List</h1>
        </div><!-- /.col -->
        <div class="col-sm-6">
          <ol class="breadcrumb float-sm-right">
            <li class="breadcrumb-item"><a href="{{route('dashboard')}}">Dashboard</a></li>
            <li class="breadcrumb-item ">Packages</li>
            <li class="breadcrumb-item ">List</li>
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
              <h3 class="card-title">Total Packages {{ $packages->count() }}</h3>

              <div class="card-tools">
                {{-- <div class="input-group input-group-sm" style="width: 150px;">
                    <input type="text" name="table_search" class="form-control float-right" placeholder="Search">
                    <div class="input-group-append">
                      <button type="submit" class="btn btn-default">
                        <i class="fas fa-search"></i>
                      </button>
                    </div>
                  </div> --}}
                <a href="{{ route("packages.create") }}" type="button" class="btn btn-primary btn-block btn-sm">Create
                  New</a>
              </div>
            </div>
            <!-- /.card-header -->
            <div class="card-body table-responsive p-0" style="height: 390px;">
              @if ($packages->count() > 0)
              <table class="table table-head-fixed table-hover text-nowrap">
                <thead>
                  <tr>
                    <th>#</th>
                    <th>ID</th>
                    <th>Name</th>
                    <th>Price</th>
                    <th>Status</th>
                    <th>Duration</th>
                    {{-- <th>Description</th> --}}
                    <th>Created At</th>
                    <th>Edit</th>
                    <th>View</th>
                    <th>Delete</th>
                  </tr>
                </thead>
                <tbody>
                  @foreach ($packages as $package)
                  <tr>
                    <td>{{$loop->index + 1 }}</td>
                    <td>{{ $package->pkg_id }}</td>
                    <td>{{ $package->name }}</td>
                    <td>₹ {{ number_format($package->price, 2, '.', ',') }}</td>
                    @if ($package->status)
                    <td><span class="badge badge-success ">Active</span></td>
                    @else
                    <td><span class="badge badge-danger ">Inactive</span></td>
                    @endif
                    <td>{{ $package->duration }}</td>
                    <td>{{ $package->created_at->format('d/m/Y') }}</td>
                    {{-- <td><textarea disabled name="" id="" cols="30" rows="2">{{ $package->description }}</textarea>
                    </td> --}}
                    {{-- edit-btn --}}
                    <td><a href="{{ route('packages.edit',$package->slug) }}" class="btn bg-warning btn-sm">
                        <i class="fas fa-pen"></i>
                      </a></td>
                    {{-- view-btn --}}
                    <td><a class="btn bg-info btn-sm">
                        <i class="fas fa-eye"></i>
                      </a></td>
                    {{-- delete-btn --}}
                    <td>
                      <a class="btn bg-danger btn-sm" onclick="if(confirm('Are you sure, You want to delete this package ?')){
                                event.preventDefault();
                                document.getElementById('deleteform-{{$package->slug}}').submit();
                              }
                              else{
                                event.preventDefault();
                              }">
                        <i class="fas fa-trash"></i>
                      </a>
                      <form id="deleteform-{{$package->slug}}" method="POST"
                        action="{{ route('packages.destroy',$package->slug)}}" style="display: none">
                        @csrf
                        @method('DELETE')
                      </form>
                    </td>
                  </tr>
                  @endforeach
                  {{-- <tr class="bg-light disabled color-palette">
                      </tr> --}}
                </tbody>
              </table>
              @else
              <div class="d-flex justify-content-center align-items-center h-100" id="main">
                <h1 class="mr-3 pr-3 align-top border-right inline-block align-content-center">404</h1>
                <div class="inline-block align-middle">
                  <h2 class="font-weight-normal lead" id="desc">No Package Were Found.
                  </h2>
                </div>
              </div>
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