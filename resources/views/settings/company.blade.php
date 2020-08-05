@extends('layouts.app')
@section('content')
    <div class="container-fluid">
        <div class="row my-4 d-flex justify-content-center">

            @include('layouts.sidebar')

            <div class="col-md-10">

                <div class="card">

                    <div class="card-header d-flex justify-content-between">

                        <span class="lead">
                            Institution
                        </span>

                    </div>

                    <div class="card-body">
                        @if (session('message'))
                            <div class="alert alert-success" role="alert">
                                <strong>{{ session('message') }}</strong>
                            </div>
                        @endif
                        @if (session('errMessage'))
                            <div class="alert alert-danger" role="alert">
                                <strong>{{ session('errMessage') }}</strong>
                            </div>
                        @endif

                        @error('logo')
                            <div class="alert alert-danger" role="alert">
                                {{$message}}
                            </div>
                        @enderror

                        <div class="row">

                            <div class="col-md-12">

                                <form action="{{ url('settings') . '/store' }}" method="POST">
                                    @csrf
                                    @method('PUT')
                                    <div class="form-row">
                                        <div class="form-group col-md-2">
                                            <button class="img-thumbnail" type="button" data-toggle="modal" data-target="#uploadLogo">
                                                <img src="{{ url('storage/images') . '/' . $settings->school_logo }}" alt="{{ config('app.name') }}" width="100%">
                                            </button>
                                        </div>
                                        <div class="col-md-10">
                                            <div class="form-row">
                                                <div class="form-group col-md-6">
                                                    <label for="">Institution name</label>
                                                    <input type="text" class="form-control" name="company_name" value="{{ $settings->school_name ?? old('company_name') }}">
                                                </div>
                                            </div>

                                            <div class="form-row">
                                                <div class="form-group col-md-6">
                                                    <label for="">Contact phone</label>
                                                    <input type="tel" class="form-control" placeholder="1 234 567 8901" name="company_phone" value="{{ $settings->phone ?? old('company_phone') }}">
                                                </div>
                                                <div class="form-group col-md-6">
                                                    <label for="">Contact e-mail</label>
                                                    <input type="email" class="form-control" placeholder="user@company.com" name="company_email" value="{{ $settings->email ?? old('company_email') }}">
                                                </div>
                                            </div>
                                            <div class="form-row">
                                                <div class="form-group col-md-12">
                                                    <label for="address ">Postal Address</label>
                                                    <input type="text" id="address" class="form-control" name="company_address" value="{{ $settings->address ?? old('company_address') }}">
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="d-flex justify-content-end">
                                        <div class="form-group">
                                            <button class="btn btn-primary" type="submit"><i class="fas fa-save mr-1"></i>Save</button>
                                        </div>
                                    </div>
                                </form>

                            </div>

                        </div>

                    </div>

                </div>

            </div>
        </div>
    </div>

    {{-- Upload logo --}}
    <div class="modal fade" id="uploadLogo" tabindex="-1" role="dialog" aria-labelledby="uploadLogoLabel" aria-hidden="true">
        <div class="modal-dialog">
          <div class="modal-content">
            <div class="modal-header">
              <h5 class="modal-title" id="uploadLogoLabel">Upload logo</h5>
              <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
              </button>
            </div>
            <form action="{{ url('settings') . '/store/logo' }}" method="POST" enctype="multipart/form-data">
                <div class="modal-body">
                    @csrf
                    @method('PUT')

                    <div class="input-group">
                        <div class="custom-file">
                            <input type="file"
                                class="custom-file-input"
                                id="newLogo"
                                aria-describedby="newLogoLabel"
                                name="logo"
                                accept=".png">
                            <label class="custom-file-label" for="newLogo">Choose logo</label>
                        </div>
                        <div class="input-group-append">
                            <button class="btn btn-outline-primary" type="submit" id="newLogoLabel">
                                <i class="fas fa-upload"></i>
                                Upload
                            </button>
                        </div>
                    </div>

                </div>
            </form>
          </div>
        </div>
      </div>
@endsection
