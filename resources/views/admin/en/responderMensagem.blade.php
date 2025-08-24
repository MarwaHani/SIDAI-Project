<!DOCTYPE html>
<html lang="en">
<section class="contact">
    <div class="contact-container">

        <div class="contact-image">
            <img src="{{ asset('storage/imagens/SIDAI.png') }}" alt="Imagem de resposta">
        </div>

        <div class="contact-form">
            <h2>Answer Message</h2>

            <p><strong>From:</strong> {{ $mensagem->name }} ({{ $mensagem->email }})</p>
            <p><strong>Subject:</strong> {{ $mensagem->subject }}</p>
            <p><strong>Message:</strong></p>
            <p>{!! nl2br(e($mensagem->message)) !!}</p>

            <form action="{{ route('admin.en.gerirContacto.responder', $mensagem->id) }}" method="POST">
                @csrf
                <div class="field-input">
                    <label for="answer">Answer:</label>
                    <textarea id="answer" name="answer" rows="5" required lang="en"></textarea>
                </div>
                <button type="submit" class="btn-enviar">Send Answer</button>
                <a href="{{ route('admin.en.gerirContacto') }}" class="btn-enviar"
                    style="background-color: gray; margin-left: 10px;">Cancel</a>
            </form>
        </div>
    </div>
</section>
<style>
    .contact {
        width: 100%;
        min-height: 100vh;
        background-color: #f3f3f3;
        padding: 40px 0;
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

    .field-input textarea {
        padding: 10px;
        border: 1px solid #ccc;
        border-radius: 6px;
        font-size: 15px;
        resize: vertical;
    }

    .btn-enviar {
        background-color: #2e7d32;
        color: white;
        border: none;
        padding: 12px 20px;
        border-radius: 8px;
        cursor: pointer;
        transition: background 0.3s ease;
        text-decoration: none;
        display: inline-block;
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
