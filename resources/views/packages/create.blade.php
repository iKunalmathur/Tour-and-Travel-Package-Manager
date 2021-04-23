@extends('layouts.main.app')

@section('packages', 'active')

@section('add-style')

{{-- TODO:Keep Eye On It. --}}
<!-- summernote -->
<link rel="stylesheet" href="{{ asset('assets/plugins/summernote/summernote-bs4.min.css') }}">

@endsection

@section('main-content')
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1 class="m-0">Package - Create</h1>
                </div>
                <!-- /.col -->
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="{{ route('dashboard') }}">Dashboard</a></li>
                        <li class="breadcrumb-item active">Package</li>
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
                <form action="{{ route('packages.store') }}" method="POST" enctype="multipart/form-data" class="w-100">
                    @csrf
                    <div class="card">
                        <div class="card-header">
                            {{-- Show Error --}}
                            @include('partials.error')
                            {{-- Show Status --}}
                            @include('partials.alert')
                        </div>
                        <div class="card-body">
                            <div class="row">
                                <div class="form-group col-md-6">
                                    <label for="packagename">Package Name</label>
                                    <input type="text" id="packagename" required class="form-control"
                                        placeholder="Goa Boom Beach" name="name" value="{{old("name")}}" />
                                </div>
                                <div class="form-group col-md-6">
                                    <label>Category</label>
                                    <select class="select2 select2-hidden-accessible form-control border-danger"
                                        name="category_id" data-placeholder="Select a Category" required
                                        style="width: 100%;" data-select2-id="7" tabindex="-1" aria-hidden="true">
                                        <option value="" selected disabled>Select a Category</option>
                                        @foreach ($categories as $index => $category)
                                        <option value="{{ $category->id }}" @if ($category->id == old('category_id'))
                                            selected
                                            @endif>{{ $category->name }}</option>
                                        @endforeach
                                    </select>
                                    @if (!$categories->count())
                                    <span class="text-danger">No category Found</span>
                                    @endif
                                    {{-- <span
                                        class="select2 select2-container select2-container--default select2-container--focus"
                                        dir="ltr" data-select2-id="8" style="width: 100%;"><span class="selection"><span
                                                class="select2-selection select2-selection--multiple" role="combobox"
                                                aria-haspopup="true" aria-expanded="false" tabindex="-1"
                                                aria-disabled="false">
                                                <ul class="select2-selection__rendered">
                                                    <li class="select2-search select2-search--inline"><input
                                                            class="select2-search__field" type="search" tabindex="0"
                                                            autocomplete="off" autocorrect="off" autocapitalize="none"
                                                            spellcheck="false" role="searchbox" aria-autocomplete="list"
                                                            placeholder="Select a State" style="width: 492.5px;"></li>
                                                </ul>
                                            </span></span><span class="dropdown-wrapper" aria-hidden="true"></span></span> --}}
                                </div>
                                {{-- <div class="form-group col-md-6">
                                    <label for="packagecategories">Category</label>
                                    <select id="packagecategories" class="form-control">
                                        <option value="" selected disabled>Select Categories</option>
                                        @foreach ($categories as $index => $category)
                                        <option value="{{ $category->id }}">{{ $category->name }}</option>
                                @endforeach
                                </select>
                            </div> --}}
                        </div>
                        <div class="row">
                            <div class="form-group col-6">
                                <label for="">Price (INR) | , not allowed</label>
                                <input type="number" step="any" class="form-control" placeholder="99.99" name="price"
                                    value="{{old("price")}}" />
                            </div>
                            <div class="form-group col-6">
                                <label for="">Days / Nights</label>
                                <input type="text" class="form-control" placeholder="7 Days / 6 Nights" name="duration"
                                    value="{{old("duration")}}" />
                            </div>
                        </div>
                        <div class="row">
                            <div class="form-group col">
                                <label for="">Overview</label>
                                <textarea class="summernote-ov" id="" cols="30" rows="8" name="overview"
                                    placeholder="Goa have . . . .">{{old("overview")}}</textarea>
                            </div>
                        </div>
                        <div class="row">
                            <div class="form-group col-md-6">
                                <label for="">What's Include</label>
                                <textarea class="summernotein" cols="30" rows="15"
                                    name="includes">{{old("includes")}}</textarea>
                                <small>Tip : Use list format for both</small>
                            </div>
                            <div class="form-group col-md-6">
                                <label for="">What's Exclude</label>
                                <textarea class="summernoteex" cols="30" rows="15"
                                    name="excludes">{{old("excludes")}}</textarea>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="">Upload Image</label>
                                    <div class="input-group">
                                        <div class="custom-file">
                                            <input type="file" class="custom-file-input" id="imageInput"
                                                name="image_local" value="{{old("image_local")}}"
                                                onchange="imagePreviewLoader('imageInput', 'imageInputLabel', 'packageImagePreview')" />
                                            <label class="custom-file-label" for="imageInput"
                                                id="imageInputLabel">Choose
                                                file</label>
                                        </div>
                                        <div class="input-group-append">
                                            <button type="button" class="btn btn-danger"
                                                onclick="resetImageInputAndPreview('imageInput', 'imageInputLabel', 'packageImagePreview')"><i
                                                    class="fas fa-trash"></i></button>
                                        </div>
                                    </div>
                                    <small>Tip : JPG/PNG Supported Only</small>
                                </div>
                                <div class="form-group">
                                    <div
                                        class="custom-control custom-switch custom-switch-off custom-switch-on-success">
                                        <input type="checkbox" class="custom-control-input" id="customSwitch3"
                                            name="status" @if (old("status")) checked @endif>
                                        <label class="custom-control-label" for="customSwitch3">Is Package Active
                                            ?</label>
                                    </div>
                                </div>
                            </div>
                            <div class="form-group col-md-6">
                                <label for="">Image Preview</label>
                                <div class="package-image-container">
                                    <img id="packageImagePreview" src="{{url('/assets/images/placeholder.png')}}" alt=""
                                        style="width: 100%; border-radius: .25rem; border: 2px solid #cdcdcd;">
                                </div>
                            </div>
                        </div>
                    </div>
                    {{-- Itineraries Start --}}
                    <div class="row">
                        <div class="form-group px-4 col-12">
                            <label for="">Itineraries</label>
                        </div>
                        <div class="form-group px-4 col-12">
                            <textarea class="summernote-it" cols="30" rows="15"
                                name="itineraries">{{old("itineraries")}}</textarea>
                        </div>
                    </div>
                    {{-- Itineraries End --}}
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

@push('scripts')

<!-- Summernote -->
<script src="{{ asset('assets/plugins/summernote/summernote-bs4.min.js') }}"></script>

<script>
    // <!-- Page specific script -->
    $(function () {
    
    //Initialize Select2 Elements
    $('.select2').select2()

    //Initialize Select2 Elements
    $('.select2bs4').select2({
      theme: 'bootstrap4'
    })

    // Summernote
    
    $toolsBasic = {
        placeholder: 'item',
        tabsize: 2,
        height: 300,
        toolbar: [
          ['font', ['bold', 'underline']],
          ['color', ['color']],
          ['para', ['ul']],
          ['view', ['fullscreen', 'codeview']],
        ]
      }

    $toolsAdvance = {
      placeholder: '',
      tabsize: 2,
      height: 400,
      toolbar: [
        ['style', ['style']],
        ['font', ['bold', 'italic', 'underline', 'clear']],
        ['fontname', ['fontname']],
        ['color', ['color']],
        ['para', ['ul', 'ol', 'paragraph']],
        ['height', ['height']],
        ['table', ['table']],
        ['insert', ['link', 'picture', 'hr']],
        ['view', ['fullscreen', 'codeview']],
        ['help', ['help']]
      ],
    }
    
    $('.summernote-ov').summernote($toolsAdvance);
    $('.summernotein').summernote($toolsBasic);
    $('.summernoteex').summernote($toolsBasic);
    $('.summernote-it').summernote($toolsAdvance);
    
    
    })
</script>

{{-- package.js --}}
<script src="{{ asset('assets/custom/js/imageloader.js') }}"></script>

@endpush