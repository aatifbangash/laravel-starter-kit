<div class="container">
    <div class="row">
        <div class="col-lg-4 col-sm-12">
            <form wire:submit="login" name="login_form" method="post" class="card auth_form">
                <div class="header">
                    <img class="logo" src="{{ asset('assets/images/logo.svg')}}" alt="">
                    <h5>Log in</h5>
                </div>
                <div class="body">
                    <x-alert />
                    <div class="input-group mb-3">
                        <input
                            type="text"
                            name="email"
                            class="form-control"
                            placeholder="Email"
                            wire:model.blur="email"
                        />
                        <div class="input-group-append">
                            <span class="input-group-text"><i class="zmdi zmdi-account-circle"></i></span>
                        </div>
                    </div>
                    <div class="input-group mb-3">
                        <input
                            type="password"
                            name="password"
                            class="form-control"
                            placeholder="Password"
                            wire:model="password"
                        />
                        <div class="input-group-append">
                                <span class="input-group-text"><a href="forgot-password.html" class="forgot"
                                                                  title="Forgot Password"><i class="zmdi zmdi-lock"></i></a></span>
                        </div>
                    </div>
                    <div class="checkbox">
                        <input
                            name="remember"
                            id="remember_me"
                            type="checkbox"
                            wire:model="remember"
                        />
                        <label for="remember_me">Remember Me</label>
                    </div>
                    <button class="btn btn-primary btn-block waves-effect waves-light">SIGN IN</button>
                    <div class="signin_with mt-3">
                        <p class="mb-0">or Sign Up using</p>
                        <button class="btn btn-primary btn-icon btn-icon-mini btn-round facebook"><i
                                class="zmdi zmdi-facebook"></i></button>
                        <button class="btn btn-primary btn-icon btn-icon-mini btn-round twitter"><i
                                class="zmdi zmdi-twitter"></i></button>
                        <button class="btn btn-primary btn-icon btn-icon-mini btn-round google"><i
                                class="zmdi zmdi-google-plus"></i></button>
                    </div>
                </div>
            </form>
            <div class="copyright text-center">
                &copy;
                <script>document.write(new Date().getFullYear())</script>
                ,
                <span><a href="templatespoint.net">Templates Point</a></span>
            </div>
        </div>
        <div class="col-lg-8 col-sm-12">
            <div class="card">
                <img src="{{ asset('assets/images/signin.svg')}}" alt="Sign In"/>
            </div>
        </div>
    </div>
</div>
