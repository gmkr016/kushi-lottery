@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('Agent Register') }}</div>

                <div class="card-body">
                    <form method="POST" action="{{ route('register') }}" enctype="multipart/form-data">
                        @csrf

                        {{-- PAN No. --}}
                        <div class="row form-group">
                            <label for="pan" class="col-md-4 col-form-label text-md-right">{{ __('PAN') }}
                            </label>

                            <div class="col-md-6">
                                <input type="text" id="pan"
                                    class="form-control{{ $errors->has('pan') ? ' is-invalid' : '' }}" name="pan"
                                    value="{{ old('pan') }}" required autofocus>

                                @if($errors->has('pan'))
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $errors->first('pan') }}</strong>
                                </span>
                                @endif
                            </div>
                        </div>

                        {{-- company name --}}
                        <div class="row form-group">
                            <label for="company-name"
                                class="col-md-4 col-form-label text-md-right">{{ __('Company Name') }}
                            </label>

                            <div class="col-md-6">
                                <input type="text" id="company-name"
                                    class="form-control{{ $errors->has('company-name') ? ' is-invalid' : '' }}"
                                    name="company-name" value="{{ old('company-name') }}" required autofocus>

                                @if($errors->has('company-name'))
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $errors->first('company-name') }}</strong>
                                </span>
                                @endif
                            </div>
                        </div>

                        {{-- Location --}}
                        <div class="row form-group">
                            <label for="location" class="col-md-4 col-form-label text-md-right">{{ __('Location') }}
                            </label>

                            <div class="col-md-6">
                                <input type="text" id="location"
                                    class="form-control{{ $errors->has('location') ? ' is-invalid' : '' }}"
                                    name="location" value="{{ old('location') }}" required autofocus>

                                @if($errors->has('location'))
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $errors->first('location') }}</strong>
                                </span>
                                @endif
                            </div>
                        </div>

                        {{-- name --}}
                        <div class="form-group row">
                            <label for="name" class="col-md-4 col-form-label text-md-right">{{ __('Name') }} </label>

                            <div class="col-md-6">
                                <input id="name" type="text"
                                    class="form-control{{ $errors->has('name') ? ' is-invalid' : '' }}" name="name"
                                    value="{{ old('name') }}" required autofocus>

                                @if ($errors->has('name'))
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $errors->first('name') }}</strong>
                                </span>
                                @endif
                            </div>
                        </div>

                        {{-- contact --}}
                        <div class="row form-group">
                            <label for="contact" class="col-md-4 col-form-label text-md-right">{{ __('Contact') }}
                            </label>

                            <div class="col-md-6">
                                <input type="number" id="contact"
                                    class="form-control{{ $errors->has('contact') ? ' is-invalid' : '' }}"
                                    name="contact" value="{{ old('contact') }}" required autofocus>

                                @if($errors->has('contact'))
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $errors->first('contact') }}</strong>
                                </span>
                                @endif
                            </div>
                        </div>

                        {{-- email --}}
                        <div class="form-group row">
                            <label for="email"
                                class="col-md-4 col-form-label text-md-right">{{ __('E-Mail Address') }}</label>

                            <div class="col-md-6">
                                <input id="email" type="email"
                                    class="form-control{{ $errors->has('email') ? ' is-invalid' : '' }}" name="email"
                                    value="{{ old('email') }}" required>

                                @if ($errors->has('email'))
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $errors->first('email') }}</strong>
                                </span>
                                @endif
                            </div>
                        </div>

                        {{-- password --}}
                        <div class="form-group row">
                            <label for="password"
                                class="col-md-4 col-form-label text-md-right">{{ __('Password') }}</label>

                            <div class="col-md-6">
                                <input id="password" type="password"
                                    class="form-control{{ $errors->has('password') ? ' is-invalid' : '' }}"
                                    name="password" required>

                                @if ($errors->has('password'))
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $errors->first('password') }}</strong>
                                </span>
                                @endif
                            </div>
                        </div>
                        {{-- confirm pass --}}
                        <div class="form-group row">
                            <label for="password-confirm"
                                class="col-md-4 col-form-label text-md-right">{{ __('Confirm Password') }}</label>

                            <div class="col-md-6">
                                <input id="password-confirm" type="password" class="form-control"
                                    name="password_confirmation" required>
                            </div>
                        </div>

                        {{-- wallet --}}
                        <div class="row form-group">
                            <label for="wallet" class="col-md-4 col-form-label text-md-right">{{ __('Wallet ID') }}
                            </label>

                            <div class="col-md-6">
                                <input type="number" id="wallet"
                                    class="form-control{{ $errors->has('wallet') ? ' is-invalid' : '' }}" name="wallet"
                                    value="{{ old('wallet') }}" required autofocus>

                                @if($errors->has('wallet'))
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $errors->first('wallet') }}</strong>
                                </span>
                                @endif
                            </div>
                        </div>

                        {{-- photo --}}
                        <div class="row form-group">
                            <label for="photo" class="col-md-4 col-form-label text-md-right">{{ __('Photo') }}
                            </label>

                            <div class="col-md-6">
                                <input type="file" id="photo"
                                    class="form-control{{ $errors->has('photo') ? ' is-invalid' : '' }}" name="photo"
                                    value="{{ old('photo') }}" required autofocus>

                                @if($errors->has('photo'))
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $errors->first('photo') }}</strong>
                                </span>
                                @endif
                            </div>
                        </div>


                        {{-- register button --}}
                        <div class="form-group row mb-0">
                            <div class="col-md-6 offset-md-4">
                                <button type="submit" class="btn btn-primary">
                                    {{ __('Register') }}
                                </button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
