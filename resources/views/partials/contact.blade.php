<section class="ftco-section contact-section ftco-no-pb" id="contact-section">
    <div class="container">
        <div class="row justify-content-center mb-5 pb-3">
            <div class="col-md-7 heading-section text-center ftco-animate">
                <span class="subheading">Contact us</span>
                <h2 class="mb-4">Punya Proyek?</h2>
            </div>
        </div>

        {{-- Wrapper: bisa di-reorder di mobile --}}
        <div class="row block-9 contact-block-wrapper">

            {{-- Kolom Form --}}
            <div class="col-md-8 contact-form-col">

                @if(session('success'))
                    <div class="alert alert-success">{{ session('success') }}</div>
                @endif

                <form method="POST" action="{{ route('contact.store') }}" class="bg-light p-4 p-md-5 contact-form">
                    @csrf
                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-group">
                                <input type="text" name="name" value="{{ old('name') }}" class="form-control" placeholder="Nama Anda" required>
                                @error('name') <small class="text-danger">{{ $message }}</small> @enderror
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <input type="email" name="email" value="{{ old('email') }}" class="form-control" placeholder="Email Anda" required>
                                @error('email') <small class="text-danger">{{ $message }}</small> @enderror
                            </div>
                        </div>
                        <div class="col-md-12">
                            <div class="form-group">
                                <input type="text" name="subject" value="{{ old('subject') }}" class="form-control" placeholder="Subjek">
                            </div>
                        </div>
                        <div class="col-md-12">
                            <div class="form-group">
                                <textarea name="message" cols="30" rows="7" class="form-control" placeholder="Pesan" required>{{ old('message') }}</textarea>
                                @error('message') <small class="text-danger">{{ $message }}</small> @enderror
                            </div>
                        </div>
                        <div class="col-md-12">
                            <div class="form-group">
                                <input type="submit" value="Kirim Pesan" class="btn btn-primary py-3 px-5">
                            </div>
                        </div>
                    </div>
                </form>

            </div>

            {{-- Kolom Info: WA & Email --}}
            <div class="col-md-4 d-flex flex-column pl-md-5 contact-info-col">

                <div class="contact-info-row">

                    @if(!empty($globalProfile->email))
                        {{-- 🔧 FIX: Link ke Gmail compose (bukan mailto:) --}}
                        <a href="https://mail.google.com/mail/?view=cm&fs=1&to={{ $globalProfile->email }}"
                           target="_blank"
                           rel="noopener noreferrer"
                           class="contact-info-item contact-info-item-email"
                           title="Kirim Email ke {{ $globalProfile->email }}">
                            <div class="contact-info-icon contact-info-icon-email">
                                <span class="fa fa-paper-plane"></span>
                            </div>
                            <div class="contact-info-text">
                                <span class="contact-info-label">EMAIL</span>
                                <span class="contact-info-value">{{ $globalProfile->email }}</span>
                            </div>
                        </a>
                    @endif

                    @php
                        $whatsappNumber = '082314479004';
                    @endphp

                    @if(!empty($whatsappNumber))
                        <a href="https://wa.me/62{{ ltrim(preg_replace('/\D/', '', $whatsappNumber), '0') }}"
                           target="_blank"
                           rel="noopener noreferrer"
                           class="contact-info-item contact-info-item-wa"
                           title="Chat WhatsApp: {{ $whatsappNumber }}">
                            <div class="contact-info-icon contact-info-icon-wa">
                                <span class="fa fa-whatsapp"></span>
                            </div>
                            <div class="contact-info-text">
                                <span class="contact-info-label">WHATSAPP</span>
                                <span class="contact-info-value">{{ $whatsappNumber }}</span>
                            </div>
                        </a>
                    @endif

                </div>

                @if($socialLinks->count() > 0)
                    <div class="text-center mt-4 contact-social-wrapper">
                        <ul class="ftco-footer-social list-unstyled d-flex justify-content-center mb-0">
                            @foreach($socialLinks as $link)
                                <li class="ftco-animate"><a href="{{ $link->url }}" target="_blank" rel="noopener noreferrer">
                                    <span class="{{ $link->display_icon }}"></span>
                                </a></li>
                            @endforeach
                        </ul>
                    </div>
                @endif

            </div>

        </div>
    </div>
</section>