@extends('echo365.layouts.master')
@section('title', 'Contact')
@section('content')
    <section class="my-4">
        <div class="container">
            <div class="row">
                <div class="col-12">
                    <h3 class="pb-4 mb-4 fst-italic border-bottom">
                        Contact
                    </h3>
                </div>
            </div>
            <div class="row">
                <div class="col-sm-12 col-md-12 col-lg-6">
                    <form action="{{ route('contact.store') }}" method="post" class="contact-submit">
                        @csrf
                        <div class="mb-3">
                            <label for="" class="form-label">Name</label>
                            <input type="text" class="form-control @error('name') is-invalid @enderror" name="name">
                            <span class="text-danger-emphasis fs-7 error-text name_error"></span>
                            @error('name')
                                <span class="text-danger-emphasis fs-7">{{ $message }}</span>
                            @enderror
                        </div>
                        <div class="mb-3">
                            <label for="" class="form-label">Email
                                Address</label>
                            <input type="text" class="form-control @error('email') is-invalid @enderror" name="email">
                            <span class="text-danger-emphasis fs-7 error-text email_error"></span>
                            @error('email')
                                <span class="text-danger-emphasis fs-7">{{ $message }}</span>
                            @enderror
                        </div>
                        <div class="mb-3">
                            <label for="" class="form-label">Message</label>
                            <textarea class="form-control  @error('message') is-invalid @enderror" rows="3" name="message"></textarea>
                            <span class="text-danger-emphasis fs-7 error-text message_error"></span>
                            @error('message')
                                <span class="text-danger-emphasis fs-7">{{ $message }}</span>
                            @enderror
                        </div>
                        <div class="mb-3">
                            <button type="submit" class="btn btn-primary" id="contact_submit">Send
                                Message</button>
                        </div>

                    </form>
                </div>
                <div class="col-sm-12 col-md-12 col-lg-6">
                    <div class="map">
                        <iframe
                            src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d472881.0394459281!2d90.09513619296786!3d22.18754190381334!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x30aaea308f0afe75%3A0x705fb01d324b1ad6!2sPatuakhali%20District!5e0!3m2!1sen!2sbd!4v1678287178391!5m2!1sen!2sbd"
                            width="600" height="400" style="border:0;" allowfullscreen="" loading="lazy"
                            class="rounded shadow"></iframe>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <div id="loader">
        <div class="spinner-border spinner" role="status">
            <span class="visually-hidden">Loading...</span>
        </div>
    </div>




@endsection
