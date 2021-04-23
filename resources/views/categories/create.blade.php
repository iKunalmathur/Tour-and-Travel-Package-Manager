@extends('layouts.main.app')

@section('categories', 'active')

@section('main-content')
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1 class="m-0">Categories - Create</h1>
                </div>
                <!-- /.col -->
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="{{ route('dashboard') }}">Dashboard</a></li>
                        <li class="breadcrumb-item active">Categories</li>
                        <li class="breadcrumb-item active">Create</li>
                    </ol>
                </div>
                <!-- /.col -->
            </div>
            <!-- /.row -->
        </div>
        <!-- /.container-fluid -->
    </div>
    <!-- /.content-header -->

    <!-- Main content -->
    <div class="content">
        <div class="container-fluid">
            <div class="row">
                {{-- Form Start --}}
                <form action="{{ route('categories.store') }}" class="w-100" method="POST"
                    enctype="multipart/form-data">
                    @csrf
                    <div class="card">
                        <div class="card-header">
                            {{-- Show Error --}}
                            @include('partials.error')
                            {{-- Show Status --}}
                            @include('partials.alert')
                        </div>
                        <div class="card-body">
                            <div class="row justify-content-sm-between justify-content-center">
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="">Category Name</label>
                                        <input type="text" class="form-control" name="name" placeholder="Goa"
                                            value="{{ old("name") }}">
                                    </div>
                                    <div class="form-group">
                                        <label for="imageInput">Upload Thumbnail</label>
                                        <div class="input-group">
                                            <div class="custom-file">
                                                <input type="file" class="custom-file-input" id="imageInput"
                                                    name="image_local"
                                                    onchange="imagePreviewLoader('imageInput', 'imageInputLabel', 'categoryImagePreview')" />
                                                <label class="custom-file-label" for="imageInput"
                                                    id="imageInputLabel">Choose file</label>
                                            </div>
                                            <div class="input-group-append">
                                                <button type="button" class="btn btn-danger"
                                                    onclick="resetImageInputAndPreview('imageInput', 'imageInputLabel', 'categoryImagePreview')"><i
                                                        class="fas fa-trash"></i></button>
                                            </div>
                                        </div>
                                        <small>Tip : JPG/PNG Supported Only</small>
                                    </div>
                                </div>
                                <div class="col-md-6" style="max-width:420px">
                                    <div class="form-group">
                                        <div class="package-image-container">
                                            <img id="categoryImagePreview"
                                                src="{{url('/assets/images/placeholder.png')}}" alt="Thumbnail"
                                                style="width: 100%; border-radius: .25rem; border: 2px solid #cdcdcd;">
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="card-footer row">
                            <div class="col-sm-2 mt-3 form-group">
                                <input type="submit" class="btn btn-primary w-100" value="Create">
                            </div>
                            <div class="col-sm-2 mt-3 form-group">
                                <input type="reset" class="btn btn-danger w-100" value="Clear">
                            </div>
                        </div>
                    </div>
                </form>
                {{-- Form End --}}
            </div>


        </div>
        <!-- /.container-fluid -->
    </div>
    <!-- /.content -->
</div>
@endsection

@section('add-script')
<script src="{{ asset("assets/custom/js/imageloader.js") }}"></script>
@endsection