@extends('admin.layouts.main')

@section('content')
<main class="login-form">
  <div class="container" style="display: flex; justify-content: center; align-items: flex-start; height: 100vh;">
      <div class="row justify-content-center">
          <div class="col-md-8">
              <div class="card" style="width: 400px; padding: 20px; border-radius: 10px; box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);">
                  <div class="card-header" style="display: flex; justify-content: center; margin-bottom: 20px;">Reset Password</div>
                  <div class="card-body">

                    @if (Session::has('message'))
                         <div class="alert alert-success" role="alert">
                            {{ Session::get('message') }}
                        </div>
                    @endif

                      <form action="{{ route('forget.password.post') }}" method="POST" style="display: flex; flex-direction: column;">
                          @csrf
                          <div class="form-group row">
                              <label for="email_address" class="col-md-4 col-form-label text-md-right">E-Mail Address</label>
                              <div class="col-md-6">
                                  <input type="text" id="email_address" class="form-control" name="email" autofocus>
                                  @if ($errors->has('email'))
                                      <span class="text-danger">{{ $errors->first('email') }}</span>
                                  @endif
                              </div>
                          </div>
                          <div class="col-md-6 offset-md-4">
                              <button type="submit" class="btn btn-primary">
                                  Send Password Reset Link
                              </button>
                          </div>
                      </form>

                  </div>
              </div>
          </div>
      </div>
  </div>
</main>
@endsection

@section('title', 'Forgot Password')

@push('reset-password-style')
<link rel="stylesheet" href="{{ asset('admin/css/forgot-password.css') }}">
<style>
/* Your CSS here */
</style>
@endpush
