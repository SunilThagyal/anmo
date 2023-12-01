@extends('frontend.layout.main')
@section('content')
<div id="contact" class="contact-us section" style="">
    <div class="container">
        <div class="row">
            <div class="col-lg-6 wow fadeInRight animated animated" data-wow-duration="0.5s" data-wow-delay="0.25s"
                style="visibility: visible;-webkit-animation-duration: 0.5s; -moz-animation-duration: 0.5s;
                animation-duration: 0.5s;-webkit-animation-delay: 0.25s; -moz-animation-delay: 0.25s; animation-delay: 0.25s;">
                <div class="card">
                    <div class="card-header">
                        <div class="d-flex  align-items-center justify-content-start">
                            <div>
                                <img src="{{$profilePicture}}" alt="User Image" class="user-image" >
                            </div>
                            <div class="user-container">
                                <h6 class="username">@svermaji</h6>
                                <p class="caption">send me anonymous messages!</p>
                            </div>
                        </div>
                    </div>


                    <div class="card-body">
                        {{-- alert --}}
                        <x-alert />
                        <div id="alert-container"></div>
                        {{-- end alert --}}
                        <form id="contact" action="{{route('anonymous.send.message')}}" method="post">
                            @csrf
                            <div class="form-group">
                                <label for="message" class="msg-label">send me anonymous messages</label>
                                <textarea name="message" class="form-control" id="message" required="" style="height: 152px;"></textarea>
                            </div>
                            <div class="form-group">
                                <button type="submit" id="form-submit" class="btn btn-primary">
                                    Send Message
                                </button>
                                <span class="btn-spinner spinner-border spinner-border-sm d-none" role="status" aria-hidden="true"></span>
                            </div>
                            <div class="get-anonymous-btn main-red-button text-center">
                                <a rel="nofollow" class="get-anonymous-link" href="{{route('anonymous.signup')}}">Get your Anonymous Link</a>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
            <div class="col-lg-6 align-self-center wow fadeInLeft animated animated" data-wow-duration="0.5s"
                data-wow-delay="0.25s" style="visibility: visible;-webkit-animation-duration: 0.5s; -moz-animation-duration: 0.5s;
                animation-duration: 0.5s;-webkit-animation-delay: 0.25s; -moz-animation-delay: 0.25s; animation-delay: 0.25s;">
                <div class="section-heading">
                    <h2>Feel Free To Send Us a Message About Your Website Needs</h2>
                    <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed doer ket eismod tempor incididunt ut
                        labore et dolores</p>
                    <div class="phone-info">
                        <h4>For any enquiry, Call Us: <span><i class="fa fa-phone"></i> <a href="#">010-020-0340</a></span>
                        </h4>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
@push('js')
<script src="{{asset('assets/js-pages/anonymous_message.js')}}"></script>
@endpush
