@extends('layouts.ly_front')

@section('content')

<div class="wrapper image-wrapper bg-image page-title-wrapper inverse-text" data-image-src="{{ asset('front/images/product/rsz_10724.jpg') }}">
    <div class="container inner text-center">
        <div class="space60"></div>
        <h1 class="page-title">Contact Us</h1>
    </div>
    <!-- /.container -->
</div>

<div class="wrapper light-wrapper">
    <div class="image-block-wrapper">
       <div class="image-block col-lg-12 p-0">
          <div class="google-map map-full">
             <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3965.922856741985!2d106.84331211502213!3d-6.273873995458987!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x2e69f3eecbdd8e49%3A0x782b34bee55381ea!2sTukang%20Sticker.com!5e0!3m2!1sid!2sid!4v1597572178386!5m2!1sid!2sid" style="width:100%; height: 100%; border:0" allowfullscreen></iframe>
          </div>
          <!--/.google-map -->
       </div>
       <!--/.image-block -->
    </div>
    <!--/.image-block-wrapper -->
 </div> 

<div class="wrapper light-wrapper">
    <div class="container inner">
        <h2 class="section-title">Get in Touch</h2>
        <p class="lead larger">Have any questions? Reach out to us from our contact form and we will get back to you shortly.</p>
        <div class="space40"></div>
        <div class="row">
            <div class="col-lg-7">
                <form id="contact-form" class="fields-white" method="post" action="{{ route('contact_front_post') }}">
                    @csrf
                    <div class="messages"></div>
                    <div class="controls">
                        <div class="form-row">
                            <div class="col-lg-12 col-xl-6">
                                <div class="form-group">
                                    <input id="form_name" type="text" name="name" class="form-control" placeholder="First Name *" required="required" data-error="First Name is required.">
                                    <div class="help-block with-errors"></div>
                                </div>
                            </div>
                            <div class="col-lg-12 col-xl-6">
                                <div class="form-group">
                                    <input id="form_lastname" type="text" name="surname" class="form-control" placeholder="Last Name *" required="required" data-error="Last Name is required.">
                                    <div class="help-block with-errors"></div>
                                </div>
                            </div>
                        </div>
                        <div class="form-row">
                            <div class="col-lg-12 col-xl-6">
                                <div class="form-group">
                                    <input id="form_email" type="email" name="email" class="form-control" placeholder="Email *" required="required" data-error="Valid email is required.">
                                    <div class="help-block with-errors"></div>
                                </div>
                            </div>
                            <div class="col-lg-12 col-xl-6">
                                <div class="form-group">
                                    <input id="form_phone" type="tel" name="phone" class="form-control" placeholder="Phone">
                                    <div class="help-block with-errors"></div>
                                </div>
                            </div>
                        </div>
                        <div class="form-row">
                            <div class="col-md-12">
                                <div class="form-group">
                                    <textarea id="form_message" name="message" class="form-control" placeholder="Message *" rows="4" required="required" data-error="Message is required."></textarea>
                                    <div class="help-block with-errors"></div>
                                </div>
                            </div>
                            <div class="col-md-12">
                                <input type="submit" class="btn btn-send" value="Send message">
                            </div>
                        </div>
                        <div class="form-row">
                            <div class="col-md-12">
                                <p class="text-muted"><strong>*</strong> These fields are required.</p>
                            </div>
                        </div>
                    </div>
                </form>
                <!-- /form -->
            </div>
            <!--/column -->
            <div class="space30 d-none d-md-block d-lg-none"></div>
            <div class="col-lg-4 offset-lg-1">
                <div class="d-flex flex-row">
                    <div>
                        <div class="icon color-default fs-34 mr-25"> <i class="icofont-location-pin"></i> </div>
                    </div>
                    <div>
                        <h6 class="mb-5">Main Address</h6>
                        <address>{!! nl2br($contact->alamat1) !!}</address>
                    </div>
                </div>
                <div class="d-flex flex-row">
                    <div>
                        <div class="icon color-default fs-34 mr-25"> <i class="icofont-telephone"></i> </div>
                    </div>
                    <div>
                        <h6 class="mb-5">Phone</h6>
                        <p>{{ $contact->tlp }}</p>
                    </div>
                </div>
                <div class="d-flex flex-row">
                    <div>
                        <div class="icon color-default fs-34 mr-25"> <i class="icofont-send-mail"></i> </div>
                    </div>
                    <div>
                        <h6 class="mb-5">E-mail</h6>
                        <p><a href="mailto:{{ $contact->email1 }}" class="nocolor">{{ $contact->email1 }}</a> <br class="d-none d-md-block" /><a href="mailto:{{ $contact->email2 }}" class="nocolor">{{ $contact->email2 }}</a></p>
                    </div>
                </div>
            </div>
            <!--/column -->
        </div>
        <!--/.row -->
    </div>
    <!-- /.container -->
</div>

@endsection