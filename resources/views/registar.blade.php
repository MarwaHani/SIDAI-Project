<!DOCTYPE html>
<html lang="pt">

<head>
    <meta charset="UTF-8">
    <title>Registar</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <script src="https://www.google.com/recaptcha/api.js" async defer></script>
    {!! NoCaptcha::renderJs() !!}

    <style>
        * {
            padding: 0;
            margin: 0;
            box-sizing: border-box;
            font-family: 'M PLUS Rounded 1c', sans-serif;
        }

        body {
            background: url(background.png);
            background-size: cover;
            background-position: center;
        }

        .container {
            display: flex;
            align-items: center;
            justify-content: center;
            min-height: 100vh;
            padding: 20px;
        }

        .form {
            background: #e6ffe6;
            padding: 30px;
            border-radius: 20px;
            box-shadow: 0 8px 16px rgba(0, 0, 0, 0.2);
            width: 800px;
        }

        .form header {
            text-align: left;
            color: #3f8e42;
            font-size: 18px;
            font-weight: 700;
            padding-bottom: 15px;
            letter-spacing: 0.5px;
        }

        .field-group {
            display: flex;
            gap: 20px;
            margin-bottom: 15px;
        }

        .field {
            flex: 1;
            display: flex;
            flex-direction: column;
        }

        .field input,
        .field select {
            height: 45px;
            padding: 0 12px;
            border: 1px solid #ccc;
            border-radius: 25px;
            font-size: 12px;
            outline: none;
        }

        .field input::placeholder {
            color: #aaa;
        }

        .checkbox-group {
            margin-top: 15px;
            font-size: 12px;
        }

        .checkbox-group input {
            margin-right: 6px;
        }

        .g-recaptcha {
            margin-top: 25px;
            display: flex;
            align-items: center;
        }

        .submit {
            margin-top: 25px;
            text-align: right;
        }

        .submit input {
            background-color: #3f8e42;
            color: white;
            padding: 10px 25px;
            border: none;
            border-radius: 25px;
            cursor: pointer;
            font-size: 15px;
        }

        .submit input:hover {
            background-color: #3f8e42;
        }

        .note {
            margin-top: 10px;
            font-size: 12px;
            color: #666;
        }

        .required {
            color: red;
        }

        .links {
            padding: 10px 25px;
            font-size: 12px;
            text-align: left;
        }

        .links a {
            color: black;
        }
        /* --- Ajustes para telemóvel --- */
@media (max-width: 768px) {
    .form {
        width: 100%;
        max-width: 100%;
        padding: 20px;
        border-radius: 15px;
    }

    .form header {
        font-size: 14px;
        text-align: center;
        padding-bottom: 10px;
    }

    .field-group {
        flex-direction: column; /* Campos ficam um embaixo do outro */
        gap: 10px;
    }

    .field input,
    .field select {
        font-size: 12px;
        height: 40px;
    }

    .checkbox-group {
        font-size: 9px;
    }

    .submit {
        text-align: center; 
    }

    .submit input {
        width: 100%;
        font-size: 14px;
        padding: 10px 0;
    }

    .links {
        text-align: center;
        font-size: 12px;
        padding: 10px 0;
    }
}
    </style>
</head>

<body>
    <div class="container">
        <form class="form" action="{{ route('registar') }}" method="POST">
            @csrf
            <header>CRIAR CONTA</header>

            @if ($errors->any())
                <div style="color: red; margin-bottom: 15px;">
                    <ul>
                        @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
            @endif

            <div class="field-group">
                <div class="field">
                    <input type="text" name="nome" placeholder="Nome *" required value="{{ old('nome') }}">
                </div>
                <div class="field">
                    <input type="text" name="apelido" placeholder="Apelido *" required value="{{ old('apelido') }}">
                </div>
            </div>

            <div class="field-group">
                <div class="field">
                    <input type="date" name="data_nascimento" placeholder="Data de Nascimento"
                        value="{{ old('data_nascimento') }}">
                </div>
                <div class="field">
                    <input type="text" name="telemovel" placeholder="Telemóvel" value="{{ old('telemovel') }}">
                </div>
            </div>

            <div class="field-group">
                <div class="field">
                    <select name="sexo">
                        <option value="">Sexo</option>
                        <option value="Feminino">Feminino</option>
                        <option value="Masculino">Masculino</option>
                        <option value="Prefiro não dizer">Prefiro não dizer</option>
                    </select>
                </div>
                <div class="field">
                    <select name="pais" id="select-pais">
                        <option value="">País</option>
                        <option value="Abecásia">Abecásia</option>
                        <option value="Afeganistão">Afeganistão</option>
                        <option value="África do Sul">África do Sul</option>
                        <option value="Albânia">Albânia</option>
                        <option value="Alemanha">Alemanha</option>
                        <option value="Andorra">Andorra</option>
                        <option value="Angola">Angola</option>
                        <option value="Antígua e Barbuda">Antígua e Barbuda</option>
                        <option value="Arábia Saudita">Arábia Saudita</option>
                        <option value="Argélia">Argélia</option>
                        <option value="Argentina">Argentina</option>
                        <option value="Armênia">Armênia</option>
                        <option value="Austrália">Austrália</option>
                        <option value="Áustria">Áustria</option>
                        <option value="Azerbaijão">Azerbaijão</option>
                        <option value="Bahamas">Bahamas</option>
                        <option value="Bahrein ">Bahrein </option>
                        <option value="Bangladesh">Bangladesh</option>
                        <option value="Barbados">Barbados</option>
                        <option value="Bélgica">Bélgica</option>
                        <option value="Belize">Belize</option>
                        <option value="Benim">Benim</option>
                        <option value="Bielorrússia">Bielorrússia</option>
                        <option value="Bolívia">Bolívia</option>
                        <option value="Bósnia e Herzegovina">Bósnia e Herzegovina</option>
                        <option value="Botsuana">Botsuana</option>
                        <option value="Brasil">Brasil</option>
                        <option value="Brunei">Brunei</option>
                        <option value="Bulgária">Bulgária</option>
                        <option value="Burkina Faso">Burkina Faso</option>
                        <option value="Burundi">Burundi</option>
                        <option value="Butão">Butão</option>
                        <option value="Cabo Verde">Cabo Verde</option>
                        <option value="Camarões">Camarões</option>
                        <option value="Camboja">Camboja</option>
                        <option value="Canadá">Canadá</option>
                        <option value="Cazaquistão">Cazaquistão</option>
                        <option value="Chade">Chade</option>
                        <option value="Chile">Chile</option>
                        <option value="China">China</option>
                        <option value="Chipre">Chipre</option>
                        <option value="Singapura">Singapura</option>
                        <option value="Colômbia">Colômbia</option>
                        <option value="Comores">Comores</option>
                        <option value="Congo">Congo</option>
                        <option value="Coreia do Norte">Coreia do Norte</option>
                        <option value="Coreia do Sul">Coreia do Sul</option>
                        <option value="Costa do Marfim">Costa do Marfim</option>
                        <option value="Costa Rica">Costa Rica</option>
                        <option value="Croácia">Croácia</option>
                        <option value="Cuba">Cuba</option>
                        <option value="Dinamarca">Dinamarca</option>
                        <option value="Djibouti">Djibouti</option>
                        <option value="Dominica">Dominica</option>
                        <option value="Egito">Egito</option>
                        <option value="El Salvador">El Salvador</option>
                        <option value="Emirados Árabes Unidos">Emirados Árabes Unidos</option>
                        <option value="Equador">Equador</option>
                        <option value="Eritreia">Eritreia</option>
                        <option value="Escócia">Escócia</option>
                        <option value="Eslováquia">Eslováquia</option>
                        <option value="Eslovênia">Eslovênia</option>
                        <option value="Espanha">Espanha</option>
                        <option value="Estados Federados da Micronésia">Estados Federados da Micronésia</option>
                        <option value="Estados Unidos da América">Estados Unidos da América</option>
                        <option value="Estônia">Estônia</option>
                        <option value="Eswatini">Eswatini</option>
                        <option value="Etiópia">Etiópia</option>
                        <option value="Fiji">Fiji</option>
                        <option value="Filipinas">Filipinas</option>
                        <option value="Finlândia">Finlândia</option>
                        <option value="França">França</option>
                        <option value="Gabão">Gabão</option>
                        <option value="Gâmbia">Gâmbia</option>
                        <option value="Gana">Gana</option>
                        <option value="Geórgia">Geórgia</option>
                        <option value="Granada">Granada</option>
                        <option value="Grécia">Grécia</option>
                        <option value="Guatemala">Guatemala</option>
                        <option value="Guiana">Guiana</option>
                        <option value="Guiné">Guiné</option>
                        <option value="Guiné-Bissau">Guiné-Bissau</option>
                        <option value="Guiné Equatorial">Guiné Equatorial</option>
                        <option value="Haiti">Haiti</option>
                        <option value="Holanda">Holanda</option>
                        <option value="Honduras">Honduras</option>
                        <option value="Hungria">Hungria</option>
                        <option value="Iêmen">Iêmen</option>
                        <option value="Índia">Índia</option>
                        <option value="Indonésia">Indonésia</option>
                        <option value="Inglaterra">Inglaterra</option>
                        <option value="Irão">Irão</option>
                        <option value="Iraque">Iraque</option>
                        <option value="Irlanda do Norte">Irlanda do Norte</option>
                        <option value="Irlanda">Irlanda</option>
                        <option value="Islândia">Islândia</option>
                        <option value="Itália">Itália</option>
                        <option value="Jamaica">Jamaica</option>
                        <option value="Japão">Japão</option>
                        <option value="Jordânia">Jordânia</option>
                        <option value="Kiribati">Kiribati</option>
                        <option value="Kosovo">Kosovo</option>
                        <option value="Kuwait">Kuwait</option>
                        <option value="Laos">Laos</option>
                        <option value="Lesoto">Lesoto</option>
                        <option value="Letônia">Letônia</option>
                        <option value="Líbano">Líbano</option>
                        <option value="Libéria">Libéria</option>
                        <option value="Líbia">Líbia</option>
                        <option value="Liechtenstein">Liechtenstein</option>
                        <option value="Lituânia">Lituânia</option>
                        <option value="Luxemburgo">Luxemburgo</option>
                        <option value="Macedônia do Norte">Macedônia do Norte</option>
                        <option value="Madagascar">Madagascar</option>
                        <option value="Malásia">Malásia</option>
                        <option value="Malawi">Malawi</option>
                        <option value="Maldivas">Maldivas</option>
                        <option value="Mali">Mali</option>
                        <option value="Malta">Malta</option>
                        <option value="Marrocos">Marrocos</option>
                        <option value="Marshall">Marshall</option>
                        <option value="Maurícia">Maurícia</option>
                        <option value="Mauritânia">Mauritânia</option>
                        <option value="México">México</option>
                        <option value="Mianmar">Mianmar</option>
                        <option value="Micronésia">Micronésia</option>
                        <option value="Moçambique">Moçambique</option>
                        <option value="Moldávia">Moldávia</option>
                        <option value="Mônaco">Mônaco</option>
                        <option value="Mongólia">Mongólia</option>
                        <option value="Montenegro">Montenegro</option>
                        <option value="Namíbia">Namíbia</option>
                        <option value="Nauru">Nauru</option>
                        <option value="Nepal">Nepal</option>
                        <option value="Nicarágua">Nicarágua</option>
                        <option value="Níger">Níger</option>
                        <option value="Nigéria">Nigéria</option>
                        <option value="Noruega">Noruega</option>
                        <option value="Nova Zelândia">Nova Zelândia</option>
                        <option value="Omã">Omã</option>
                        <option value="Ossétia do Sul">Ossétia do Sul</option>
                        <option value="País de Gales">País de Gales</option>
                        <option value="Países Baixos">Países Baixos</option>
                        <option value="Palau">Palau</option>
                        <option value="Palestina">Palestina</option>
                        <option value="Panamá">Panamá</option>
                        <option value="Papua-Nova Guiné">Papua-Nova Guiné</option>
                        <option value="Paquistão">Paquistão</option>
                        <option value="Paraguai">Paraguai</option>
                        <option value="Peru">Peru</option>
                        <option value="Polônia">Polônia</option>
                        <option value="Portugal">Portugal</option>
                        <option value="Qatar">Qatar</option>
                        <option value="Quênia">Quênia</option>
                        <option value="Quirguistão">Quirguistão</option>
                        <option value="Quiribati">Quiribati</option>
                        <option value="Reino Unido">Reino Unido</option>
                        <option value="República Árabe Saaraui Democrática">República Árabe Saaraui Democrática
                        </option>
                        <option value="República Centro-Africana">República Centro-Africana</option>
                        <option value="República Democrática do Congo">República Democrática do Congo</option>
                        <option value="República do Congo">República do Congo</option>
                        <option value="República Dominicana">República Dominicana</option>
                        <option value="República Tcheca">República Tcheca</option>
                        <option value="República Turca de Chipre do Norte">República Turca de Chipre do Norte</option>
                        <option value="Romênia">Romênia</option>
                        <option value="Ruanda">Ruanda</option>
                        <option value="Rússia">Rússia</option>
                        <option value="Salomão">Salomão</option>
                        <option value="Samoa">Samoa</option>
                        <option value="San Marino">San Marino</option>
                        <option value="Santa Lúcia">Santa Lúcia</option>
                        <option value="São Cristóvão e Névis">São Cristóvão e Névis</option>
                        <option value="São Tomé e Príncipe">São Tomé e Príncipe</option>
                        <option value="São Vicente e Granadinas">São Vicente e Granadinas</option>
                        <option value="Senegal">Senegal</option>
                        <option value="Serra Leoa">Serra Leoa</option>
                        <option value="Sérvia">Sérvia</option>
                        <option value="Seychelles">Seychelles</option>
                        <option value="Singapura">Singapura</option>
                        <option value="Síria">Síria</option>
                        <option value="Somália">Somália</option>
                        <option value="Sri Lanka">Sri Lanka</option>
                        <option value="Suazilândia">Suazilândia</option>
                        <option value="Sudão do Sul">Sudão do Sul</option>
                        <option value="Sudão">Sudão</option>
                        <option value="Suécia">Suécia</option>
                        <option value="Suíça">Suíça</option>
                        <option value="Suriname">Suriname</option>
                        <option value="Tailândia">Tailândia</option>
                        <option value="Taiwan">Taiwan</option>
                        <option value="Tajiquistão">Tajiquistão</option>
                        <option value="Tanzânia">Tanzânia</option>
                        <option value="Tchéquia">Tchéquia</option>
                        <option value="Timor-Leste">Timor-Leste</option>
                        <option value="Togo">Togo</option>
                        <option value="Tonga">Tonga</option>
                        <option value="Trinidad e Tobago">Trinidad e Tobago</option>
                        <option value="Tunísia">Tunísia</option>
                        <option value="Turcomenistão">Turcomenistão</option>
                        <option value="Turquia">Turquia</option>
                        <option value="Tuvalu">Tuvalu</option>
                        <option value="Ucrânia">Ucrânia</option>
                        <option value="Uganda">Uganda</option>
                        <option value="Uruguai">Uruguai</option>
                        <option value="Uzbequistão">Uzbequistão</option>
                        <option value="Vanuatu">Vanuatu</option>
                        <option value="Vaticano">Vaticano</option>
                        <option value="Venezuela">Venezuela</option>
                        <option value="Vietnã">Vietnã</option>
                        <option value="Zâmbia">Zâmbia</option>
                        <option value="Zimbábue">Zimbábue</option>
                    </select>
                </div>
            </div>

            <div class="field-group">
                <div class="field" style="flex: 1 1 100%;">
                    <input type="email" name="email" placeholder="Endereço de Email *" required
                        value="{{ old('email') }}">
                </div>
            </div>

            <div class="field-group">
                <div class="field">
                    <input type="password" name="senha" placeholder="Palavra-passe *" required>
                </div>
                <div class="field">
                    <input type="password" name="senha_confirmation" placeholder="Confirmar palavra-passe *"
                        required>
                </div>
            </div>

            {!! NoCaptcha::display() !!}

            <p class="note">Esta pergunta serve para testar se o utilizador é ou não um visitante humano e para
                evitar envios automáticos de spam.</p>
            <br>
            <p class="note"><span class="required">*</span> Campos de preenchimento obrigatório</p>

            <div class="submit">
                <input type="submit" value="CRIAR UMA NOVA CONTA">
            </div>
            <div class="links">
                Já tem conta? <a href="{{ route('login.form') }}">Log-in aqui</a><br><br>
                <a href="/home">Voltar à página inicial</a><br>
            </div>
        </form>
    </div>
</body>
<script>
    $(document).ready(function() {
        $('#select-pais').select2({
            placeholder: "Selecione um país",
            allowClear: true
        });
    });
</script>


</html>
