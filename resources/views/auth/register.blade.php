<x-guest-layout>
    @section('title')
        Register
    @endsection
    <div class="register-box">
        <div class="register-logo">

            <a href="#">
                {{-- <img height="100px" width="100px" src="{{ asset('frontend/images/icons/logo-02.png') }}"> --}}
                CONTRA</a>

        </div>

        <div class="card">
            <div class="card-body register-card-body">
                <p class="login-box-msg">{{ __('Register with us') }}</p>

                <x-jet-validation-errors class="mb-4" />

                <form method="POST" action="{{ route('register') }}">
                    @csrf
                    <div class="input-group mb-3">
                        <x-jet-input id="name" class="form-control" type="text" name="name" :value="old('name')"
                            placeholder="Full name" required autofocus autocomplete="name" />

                        <div class="input-group-append">
                            <div class="input-group-text">
                                <span class="fas fa-user"></span>
                            </div>
                        </div>
                    </div>
                    <div class="input-group mb-3">

                        <x-jet-input id="email" class="form-control" placeholder="Email" type="email"
                            name="email" :value="old('email')" required />
                        <div class="input-group-append">
                            <div class="input-group-text">
                                <span class="fas fa-envelope"></span>
                            </div>
                        </div>
                    </div>
                    <div class="input-group mb-3">
                        <x-jet-input id="password" class="form-control" placeholder="Password" type="password"
                            name="password" required autocomplete="new-password" />

                        <div class="input-group-append">
                            <div class="input-group-text">
                                <span class="fas fa-lock"></span>
                            </div>
                        </div>
                    </div>
                    <div class="input-group mb-3">
                        <x-jet-input id="password_confirmation" class="form-control" placeholder="Retype password"
                            type="password" name="password_confirmation" required autocomplete="new-password" />

                        <div class="input-group-append">
                            <div class="input-group-text">
                                <span class="fas fa-lock"></span>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-8">
                            <div class="icheck-primary">
                                <input type="checkbox" id="agreeTerms" name="terms" value="agree">
                                <label for="agreeTerms">
                                    I agree to the <a href="#">terms</a>
                                </label>
                            </div>
                        </div>
                        <!-- /.col -->
                        <div class="col-4">
                            <button type="submit" class="btn btn-primary btn-block">{{ __('Register') }}</button>
                        </div>
                        <!-- /.col -->
                    </div>
                </form>

                <div class="social-auth-links text-center">
                    <p>- OR -</p>
                    <a href="#" class="btn btn-block btn-primary">
                        <i class="fab fa-facebook mr-2"></i>
                        {{ __('Sign up using Facebook') }}
                    </a>
                    <a href="#" class="btn btn-block btn-danger">
                        <i class="fab fa-google-plus mr-2"></i>
                        {{ __('Sign up using Google+') }}
                    </a>
                </div>

                <a href="{{ route('login') }}" class="text-center">{{ __('Already registered?') }}</a>
            </div>
            <!-- /.form-box -->
        </div><!-- /.card -->
    </div>
    <!-- /.register-box -->
</x-guest-layout>
