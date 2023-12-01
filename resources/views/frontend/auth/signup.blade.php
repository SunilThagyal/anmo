@extends('frontend.layout.main')
@section('content')
<div id="contact" class="contact-us section" style="">
    <div class="container">
            <div class="col-lg-6 mx-auto wow fadeInRight animated animated" data-wow-duration="0.5s" data-wow-delay="0.25s"
                style="visibility: visible;-webkit-animation-duration: 0.5s; -moz-animation-duration: 0.5s;
                animation-duration: 0.5s;-webkit-animation-delay: 0.25s; -moz-animation-delay: 0.25s; animation-delay: 0.25s;">
                <div class="card">
                    <div class="card-header">
                        <div class="d-flex  align-items-center justify-content-start">
                            <div class="user-container">
                                <h6 class="username">Signup</h6>
                                <p class="caption">Create your own anonymous Link</p>
                            </div>
                        </div>
                    </div>
                    <div class="card-body">
                        {{-- alert --}}
                        <x-alert />
                        <div id="alert-container"></div>
                        {{-- end alert --}}
                        <form id="contact" class="needs-validation signup_form" action="{{route('anonymous.signup')}}" method="post" novalidate>
                            @csrf
                            <div class="form-group text-left">
                                <label for="message" class="msg-label">Full Name</label>
                                <input name="full_name" placeholder="Full name" class="form-control" id="full_name" />
                                <div id="full_name-error" class="invalid-feedback d-block"></div>
                            </div>
                            <div class="form-group text-left">
                                <label for="email" class="msg-label">Email</label>
                                <input name="email" placeholder="Email" class="form-control" id="email" />
                                <div id="email-error" class="invalid-feedback d-block"></div>
                                {{-- <div class="invalid-feedback d-block">
                                    Please choose a username.
                                  </div> --}}
                            </div>
                            <div class="form-group text-left">
                                <label for="message" class="msg-label">Password</label>
                                <input name="password" type="password" placeholder="Enter Password" class="form-control" id="password" />
                                <div class="invalid-feedback d-block">
                                  </div>
                            </div>
                            <div class="form-group text-left">
                                <label for="message" class="msg-label">Confirm Password</label>
                                <input  type="password" name="confirm_password" placeholder="Confirm your Password" class="form-control" id="cpassword" />
                                <div class="invalid-feedback d-block">
                                  </div>
                            </div>
                            <div class="form-group mt-5">
                                <button type="submit" id="form-submit" class="btn btn-primary">
                                    Signup
                                </button>
                                <span class="btn-spinner spinner-border spinner-border-sm d-none" role="status" aria-hidden="true"></span>
                            </div>
                            {{-- social button --}}
                            <div class="astrodivider"><div class="astrodividermask"></div><span><i>or</i></span></div>

                            {{-- <hr> --}}
                            <div class="d-flex justify-content-center gap-2 mb-3">
                                <button type="button" class="btn btn-danger google-btn">
                                  <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-google" viewBox="0 0 16 16">
                                    <path d="M15.545 6.558a9.42 9.42 0 0 1 .139 1.626c0 2.434-.87 4.492-2.384 5.885h.002C11.978 15.292 10.158 16 8 16A8 8 0 1 1 8 0a7.689 7.689 0 0 1 5.352 2.082l-2.284 2.284A4.347 4.347 0 0 0 8 3.166c-2.087 0-3.86 1.408-4.492 3.304a4.792 4.792 0 0 0 0 3.063h.003c.635 1.893 2.405 3.301 4.492 3.301 1.078 0 2.004-.276 2.722-.764h-.003a3.702 3.702 0 0 0 1.599-2.431H8v-3.08h7.545z"></path>
                                </svg>
                                  Google
                                </button>
                                <button type="button" class="btn btn-primary facebook-btn">
                                    <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-facebook" viewBox="0 0 16 16">
                                    <path d="M16 8.049c0-4.446-3.582-8.05-8-8.05C3.58 0-.002 3.603-.002 8.05c0 4.017 2.926 7.347 6.75 7.951v-5.625h-2.03V8.05H6.75V6.275c0-2.017 1.195-3.131 3.022-3.131.876 0 1.791.157 1.791.157v1.98h-1.009c-.993 0-1.303.621-1.303 1.258v1.51h2.218l-.354 2.326H9.25V16c3.824-.604 6.75-3.934 6.75-7.951z"></path>
                                </svg>
                                    Facebook
                                  </button>
                                  <button type="button" class="btn btn-primary twitter-btn">
                                    <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-twitter-x" viewBox="0 0 16 16">
                                    <path d="M12.6.75h2.454l-5.36 6.142L16 15.25h-4.937l-3.867-5.07-4.425 5.07H.316l5.733-6.57L0 .75h5.063l3.495 4.633L12.601.75Zm-.86 13.028h1.36L4.323 2.145H2.865l8.875 11.633Z"></path>
                                    </svg>
                                    Twitter
                                  </button>
                              </div>
                            {{-- endd socila button --}}
                        </form>
                    </div>
                </div>
            </div>
    </div>
</div>
@endsection
@push('js')
<script src="{{asset('assets/js-pages/signup-page.js')}}"></script>
@endpush
