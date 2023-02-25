@extends('User.layout.user-master')

@section('title', 'User Contact')


@section('content')



    <!-- Contact Start -->
    <div class="container-fluid">
        <h3 class="section-title position-relative text-uppercase mx-xl-5 mb-4"><span class="bg-light shadow pr-3">
                Contact Us</span></h3>
        <div class="row px-xl-5">
            <div class="col-lg-7 mb-5">
                <div class="contact-form bg-light p-30">
                    <div id="success"></div>

                    <form action="{{ route('user@message') }}" method="POST">
                        @csrf
                        <div class="control-group my-3">
                            <input type="text" class="form-control shadow-none" name="name"
                                value={{ Auth::user()->name }} readonly />
                        </div>
                        <div class="control-group my-3">
                            <input type="email" class="form-control shadow-none" name="email"
                                value="{{ Auth::user()->email }}" readonly />

                        </div>
                        <div class="control-group">
                            <input type="text" class="form-control shadow-none" id="subject" placeholder="Subject"
                                name="subject" required="required"
                                data-validation-required-message="Please enter a subject" />
                            <p class="help-block text-danger"></p>
                        </div>
                        <div class="control-group">
                            <textarea class="form-control shadow-none" rows="8" id="message" placeholder="Message" name="message"
                                required="required" data-validation-required-message="Please enter your message"></textarea>
                            <p class="help-block text-danger"></p>
                        </div>
                        <div>
                            <button class="btn btn-warning text-light py-2 px-4" type="submit" id="sendMessageButton">Send
                                Message</button>
                        </div>
                    </form>
                </div>
            </div>
            <div class="col-lg-5 mb-5">
                <div class="bg-light p-30 mb-30">
                    <iframe
                        src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d488799.48743727425!2d95.90137683512988!3d16.83895248908692!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x30c1949e223e196b%3A0x56fbd271f8080bb4!2sYangon!5e0!3m2!1sen!2smm!4v1677311209978!5m2!1sen!2smm"
                        width="100%" height="350" style="border:0;" allowfullscreen="" loading="lazy"
                        referrerpolicy="no-referrer-when-downgrade"></iframe>
                </div>
                <div class="bg-light p-30 mb-3">
                    <p class="mb-2"><i class="fa fa-map-marker-alt text-primary mr-3"></i>123 Street, Yangon, Myanmar
                    </p>
                    <p class="mb-2"><i class="fa fa-envelope text-primary mr-3"></i>info@example.com</p>
                    <p class="mb-2"><i class="fa fa-phone-alt text-primary mr-3"></i>+012 345 67890</p>
                </div>
            </div>
        </div>
    </div>
    <!-- Contact End -->




@endsection
