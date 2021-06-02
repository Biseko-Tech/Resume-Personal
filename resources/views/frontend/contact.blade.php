<div class="contact" id="contact">
    <div class="content-inner">
        <div class="content-header">
            <h2>Contact</h2>
        </div>
        <div class="row align-items-center">
            <div class="col-md-6">
                <div class="contact-info">
                    <p><i class="fa fa-user"></i>{{ $contact->owner_name }}</p>
                    <p><i class="fa fa-tag"></i>{{ $contact->owner_title }}</p>
                    <p><i class="fa fa-envelope"></i><a href="mailto:{{ $contact->owner_email }}">{{ $contact->owner_email }}</a></p>
                    <p><i class="fa fa-phone"></i><a href="tel:{{ $contact->owner_mobile }}">{{ $contact->owner_mobile }}</a></p>
                    <p><i class="fa fa-map-marker"></i>{{ $contact->owner_address }}</p>
                    <div class="social">
                        <a class="btn" href=""><i class="fab fa-twitter"></i></a>
                        <a class="btn" href="https://web.facebook.com/fortubiseko/" target="_blank"><i class="fab fa-facebook-f"></i></a>
                        <a class="btn" href=""><i class="fab fa-linkedin-in"></i></a>
                        <a class="btn" href="https://www.instagram.com/fbiseko/" target="_blank"><i class="fab fa-instagram"></i></a>
                        <a class="btn" href=""><i class="fab fa-youtube"></i></a>
                    </div>
                </div>
            </div>
            <div class="col-md-6">
                <div class="form">
                    <form action="{{ route('send') }}" method="POST">
                        @csrf
                        <div class="form-row">
                            <div class="form-group col-md-6">
                                <input type="text" class="form-control" name="client_name" placeholder="Your Name" />
                                @error('client_name')
                                    <small class="text-danger text-xs">{{ $message }}</small>
                                @enderror
                            </div>
                            <div class="form-group col-md-6">
                                <input type="text" class="form-control" name="client_email" placeholder="Your Email" />
                                @error('client_email')
                                    <small class="text-danger text-xs">{{ $message }}</small>
                                @enderror
                            </div>
                            <div class="form-group col-md-6">
                                <input type="text" class="form-control" name="client_subject" placeholder="Subject" />
                                @error('client_subject')
                                    <small class="text-danger text-xs">{{ $message }}</small>
                                @enderror
                            </div>
                            <div class="form-group col-md-6">
                                <input type="text" class="form-control" name="phone" placeholder="Phone eg: 0712 XXX XXX" />
                                @error('phone')
                                    <small class="text-danger text-xs">{{ $message }}</small>
                                @enderror
                            </div>
                        </div>
                        <div class="form-group">
                            <textarea class="form-control" name="client_message" rows="5" placeholder="Message"></textarea>
                            @error('client_message')
                                <small class="text-danger text-xs">{{ $message }}</small>
                            @enderror
                        </div>
                        <div class="row">
                            <div class="col-md-6">
                                <button class="btn" type="submit">Send Message</button>
                            </div>
                            @if (session('success'))
                            <div class="col-md-6">
                                <div class="alert alert-success alert-dismissible fade show py-2 px-1" role="alert">
                                    <small class="px-0">{{ session('success') }}</small>
                                    <button type="button" class="close content-center py-2 px-2" data-dismiss="alert" aria-label="Close">
                                    <span aria-hidden="true">&times;</span>
                                    </button>
                                </div>
                            </div>
                            @endif
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>