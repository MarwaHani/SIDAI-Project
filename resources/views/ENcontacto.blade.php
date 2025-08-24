@extends('layouts.english')

@section('english')
    <style>
        .contact {
            width: 100%;
            min-height: 100vh;

        }

        .contact-container {
            display: flex;
            flex-wrap: wrap;
            min-height: 80vh;
            margin: 40px auto;
            max-width: 1000px;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
            background-color: white;
            border-radius: 10px;
            overflow: hidden;
        }

        .contact-image {
            flex: 1;
            min-width: 300px;
            background-color: #e8f5e9;
        }

        .contact-image img {
            width: 100%;
            height: 100%;
            object-fit: cover;
        }

        .contact-form {
            flex: 1;
            padding: 40px;
            background-color: #fff;
        }

        .contact-form h2 {
            color: #3f8e42;
            margin-bottom: 25px;
            font-size: 24px;
            text-transform: uppercase;
        }

        .field-input {
            margin-bottom: 20px;
            display: flex;
            flex-direction: column;
        }

        .field-input label {
            font-weight: 600;
            margin-bottom: 5px;
            color: #333;
        }

        .field-input input,
        .field-input textarea {
            padding: 10px;
            border: 1px solid #ccc;
            border-radius: 6px;
            font-size: 15px;
        }

        .btn-enviar {
            background-color: #2e7d32;
            color: white;
            border: none;
            padding: 12px 20px;
            border-radius: 8px;
            cursor: pointer;
            transition: background 0.3s ease;
        }

        .btn-enviar:hover {
            background-color: #1b5e20;
        }

        @media (max-width: 768px) {
            .contact-container {
                flex-direction: column;
            }

            .contact-image {
                height: 250px;
            }
        }
    </style>
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    @if (session('success'))
        <script>
            Swal.fire({
                toast: true,
                position: 'top-end',
                icon: 'success',
                title: '{{ session('success') }}',
                showConfirmButton: false,
                timer: 4000,
                timerProgressBar: true
            });
        </script>
    @endif

    <section class="contact">
        <div class="contact-container">
            <div class="contact-image">
                <img src="{{ asset('storage/imagens/SIDAI.png') }}" alt="Imagem Contacto">
            </div>

            <div class="contact-form">
                <h2>Contact Us</h2>


                <form action="{{ route('contacto.en.enviar') }}" method="POST">
                    @csrf

                    <div class="field-input">
                        <label for="name">Name</label>
                        <input type="text" name="name" id="name" value="{{ old('name') }}" required>
                        @error('name')
                            <small class="text-danger">{{ $message }}</small>
                        @enderror
                    </div>

                    <div class="field-input">
                        <label for="email">Email</label>
                        <input type="email" name="email" id="email" value="{{ old('email') }}" required>
                        @error('email')
                            <small class="text-danger">{{ $message }}</small>
                        @enderror
                    </div>

                    <div class="field-input">
                        <label for="subject">Subject</label>
                        <input type="text" name="subject" id="subject" value="{{ old('subject') }}" required>
                        @error('subject')
                            <small class="text-danger">{{ $message }}</small>
                        @enderror
                    </div>

                    <div class="field-input">
                        <label for="message">Message</label>
                        <textarea name="message" id="message" rows="5" required>{{ old('message') }}</textarea>
                        @error('message')
                            <small class="text-danger">{{ $message }}</small>
                        @enderror
                    </div>

                    <button type="submit" class="btn-enviar">Send</button>
                </form>
            </div>
        </div>
    </section>
@endsection
