@extends('layouts.main.app')
@section('profile', 'active')

@section('main-content')
<div class="content-wrapper">
  <!-- Content Header (Page header) -->
  <div class="content-header">
    <div class="container-fluid">
      <div class="row mb-2">
        <div class="col-sm-6">
          <h1 class="m-0">Profile</h1>
        </div><!-- /.col -->
        <div class="col-sm-6">
          <ol class="breadcrumb float-sm-right">
            <li class="breadcrumb-item"><a href="{{route('dashboard')}}">Dashboard</a></li>
            <li class="breadcrumb-item active">Profile</li>
          </ol>
        </div><!-- /.col -->
      </div><!-- /.row -->
    </div><!-- /.container-fluid -->
  </div>
  <!-- /.content-header -->

  <!-- Main content -->
  <section class="content">
    <div class="container-fluid">

      {{-- Show Error --}}
      @include('partials.error')
      {{-- Show Status --}}
      @include('partials.alert')

      <div class="row">
        <div class="col-md-3">

          <!-- Profile Image -->
          <div class="card card-primary card-outline">
            <div class="card-body box-profile">
              <div class="text-center">
                <img class="profile-user-img img-fluid img-circle" id="previewImage"
                  src="{{ (Auth::user()->avatar) ? asset( '/storage/'.Auth::user()->avatar ) : asset('/assets/images/placeholder.png') }}"
                  alt="User profile picture" style="
                             width: 100px;
                             height: 100px;
                             object-fit: cover;
                         ">
              </div>

              <h3 class="profile-username text-center">{{Auth::user()->name}}</h3>

              <p class="text-muted text-center">{{Auth::user()->role}}</p>

              <a href="#" class="btn btn-primary btn-block"
                onclick="removeDisabledFrom(['inputName' , 'inputEmail', 'inputRole' , 'inputImage' , 'inputImageRemove', 'inputPassword', 'inputNewPassword', 'inputConfirmPassword', 'formSubmitBtn'], event)"><b>Edit</b></a>
            </div>
            <!-- /.card-body -->
          </div>
          <!-- /.card -->

          <!-- About Me Box -->
          <div class="card card-primary">
            <div class="card-header">
              <h3 class="card-title">Details</h3>
            </div>
            <!-- /.card-header -->
            <div class="card-body">
              <strong><i class="fas fa-book mr-1"></i> Email</strong>

              <p class="text-muted">
                {{Auth::user()->email}}
              </p>

              <hr>

              <strong><i class="fas fa-map-marker-alt mr-1"></i> Location</strong>

              <p class="text-muted">India</p>
            </div>
            <!-- /.card-body -->
          </div>
          <!-- /.card -->
        </div>
        <!-- /.col -->
        <div class="col-md-9">
          <div class="card">
            <div class="card-header p-2">
              <ul class="nav nav-pills">
                <li class="nav-item"><a class="nav-link" href="#settings" data-toggle="tab">Settings</a></li>
              </ul>
            </div><!-- /.card-header -->
            <div class="card-body">
              <div class="tab-content">
                <div class="active tab-pane" id="settings">
                  <form class="form-horizontal" action="{{ route('profile.update') }}" method="POST"
                    enctype="multipart/form-data">
                    @csrf
                    @method('PUT')
                    <div class="form-group row">
                      <label for="inputName" class="col-sm-2 col-form-label">Name</label>
                      <div class="col-sm-10">
                        <input type="text" class="form-control" id="inputName" placeholder="Name" name="name"
                          value="{{Auth::user()->name}}" disabled>
                      </div>
                    </div>
                    <div class="form-group row">
                      <label for="inputEmail" class="col-sm-2 col-form-label">Email</label>
                      <div class="col-sm-10">
                        <input type="email" class="form-control" id="inputEmail" placeholder="Email" name="email"
                          value="{{Auth::user()->email}}" disabled>
                      </div>
                    </div>
                    <div class="form-group row">
                      <label for="inputRole" class="col-sm-2 col-form-label">Role</label>
                      <div class="col-sm-10">
                        <input type="text" class="form-control" id="inputRole" placeholder="e.g. Admin / Manager / CEO"
                          name="role" value="{{Auth::user()->role ?? old("role") }}" disabled>
                      </div>
                    </div>
                    <div class="form-group row">
                      <label for="inputImage" class="col-sm-2 col-form-label">Profile Image</label>
                      <div class="col-sm-10">
                        <div class="input-group">
                          <div class="custom-file">
                            <input type="file" class="custom-file-input" id="inputImage" name="avatar" disabled
                              onchange="imagePreviewLoader('inputImage', 'inputImageLabel', 'previewImage');">
                            <label class="custom-file-label" for="inputImage" id="inputImageLabel">Choose Avatar</label>
                          </div>
                          <div class="input-group-append">
                            <button type="button" id="inputImageRemove" class="btn btn-danger"
                              onclick="resetImageInputAndPreview('inputImage' , 'inputImageLabel', 'previewImage');"
                              disabled><i class="fas fa-trash"></i></button>
                          </div>
                        </div>
                      </div>
                    </div>
                    <div class="form-group row">
                      <label for="inputSkills" class="col-sm-2 col-form-label">Password</label>
                      <div class="col-sm-10">
                        <input type="password" class="form-control" id="inputPassword" placeholder="Password"
                          name="current_password" disabled required>
                      </div>
                    </div>
                    <hr>
                    <div class="form-group row">
                      <label for="inputSkills" class="col-sm-2 col-form-label">New Password</label>
                      <div class="col-sm-10">
                        <input type="password" class="form-control" id="inputNewPassword" placeholder="New Password"
                          name="password" autocomplete="new-password" disabled>
                      </div>
                    </div>
                    <div class="form-group row">
                      <label for="inputSkills" class="col-sm-2 col-form-label">Confirm Password</label>
                      <div class="col-sm-10">
                        <input type="password" class="form-control" id="inputConfirmPassword"
                          placeholder="Confirm Password" name="password_confirmation" disabled>
                      </div>
                    </div>
                    <div class="form-group row">
                      <div class="offset-sm-2 col-sm-10">
                        <button type="submit" class="btn btn-success" id="formSubmitBtn" disabled>Save</button>
                      </div>
                    </div>
                  </form>
                </div>
                <!-- /.tab-pane -->
              </div>
              <!-- /.tab-content -->
            </div><!-- /.card-body -->
          </div>
          <!-- /.card -->
        </div>
        <!-- /.col -->
      </div>
      <!-- /.row -->
    </div><!-- /.container-fluid -->
  </section>
  <!-- /.content -->
</div>
@endsection

@section('add-script')

<script src="{{ asset("assets/custom/js/imageloader.js") }}"></script>

<script>
  function removeDisabledFrom(ids, event) {

        console.log('removeDisabledFrom Run..');

        event.preventDefault();

        $(event.target).addClass("disabled"); 

        ids.forEach(id => {
          const element = document.getElementById(id);
          element.disabled = false;
        });
      }
</script>
@endsection