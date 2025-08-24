<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <title>Register</title>
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
        <form class="form" action="{{ route('ENregistar') }}" method="POST">
            @csrf
            <header>CREATE ACCOUNT</header>

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
                    <input type="text" name="nome" placeholder="Name *" required value="{{ old('nome') }}">
                </div>
                <div class="field">
                    <input type="text" name="apelido" placeholder="Surname *" required value="{{ old('apelido') }}">
                </div>
            </div>

            <div class="field-group">
                <div class="field">
                    <input type="date" name="data_nascimento" placeholder="Date of birth"
                        value="{{ old('data_nascimento') }}">
                </div>
                <div class="field">
                    <input type="text" name="telemovel" placeholder="Phone" value="{{ old('telemovel') }}">
                </div>
            </div>

            <div class="field-group">
                <div class="field">
                    <select name="sexo">
                        <option value="">Gender</option>
                        <option value="Feminino">Female</option>
                        <option value="Masculino">Male</option>
                        <option value="Prefiro não dizer">I'd rather not say</option>
                    </select>
                </div>
                <div class="field">
                    <select name="pais" id="select-pais">
                        <option value="">Country</option>
                        <option value="Abkhazia">Abkhazia</option>
                        <option value="Afghanistan">Afghanistan</option>
                        <option value="South Africa">South Africa</option>
                        <option value="Albania">Albania</option>
                        <option value="Germany">Germany</option>
                        <option value="Andorra">Andorra</option>
                        <option value="Angola">Angola</option>
                        <option value="Antigua and Barbuda">Antigua and Barbuda</option>
                        <option value="Saudi Arabia">Saudi Arabia</option>
                        <option value="Algeria">Algeria</option>
                        <option value="Argentina">Argentina</option>
                        <option value="Armenia">Armenia</option>
                        <option value="Australia">Australia</option>
                        <option value="Austria">Austria</option>
                        <option value="Azerbaijan">Azerbaijan</option>
                        <option value="Bahamas">Bahamas</option>
                        <option value="Bahrain">Bahrain</option>
                        <option value="Bangladesh">Bangladesh</option>
                        <option value="Barbados">Barbados</option>
                        <option value="Belgium">Belgium</option>
                        <option value="Belize">Belize</option>
                        <option value="Benin">Benin</option>
                        <option value="Belarus">Belarus</option>
                        <option value="Bolivia">Bolivia</option>
                        <option value="Bosnia and Herzegovina">Bosnia and Herzegovina</option>
                        <option value="Botswana">Botswana</option>
                        <option value="Brazil">Brazil</option>
                        <option value="Brunei">Brunei</option>
                        <option value="Bulgaria">Bulgaria</option>
                        <option value="Burkina Faso">Burkina Faso</option>
                        <option value="Burundi">Burundi</option>
                        <option value="Bhutan">Bhutan</option>
                        <option value="Cape Verde">Cape Verde</option>
                        <option value="Cameroon">Cameroon</option>
                        <option value="Cambodia">Cambodia</option>
                        <option value="Canada">Canada</option>
                        <option value="Kazakhstan">Kazakhstan</option>
                        <option value="Chad">Chad</option>
                        <option value="Chile">Chile</option>
                        <option value="China">China</option>
                        <option value="Cyprus">Cyprus</option>
                        <option value="Singapore">Singapore</option>
                        <option value="Colombia">Colombia</option>
                        <option value="Comoros">Comoros</option>
                        <option value="Congo">Congo</option>
                        <option value="North Korea">North Korea</option>
                        <option value="South Korea">South Korea</option>
                        <option value="Ivory Coast">Ivory Coast</option>
                        <option value="Costa Rica">Costa Rica</option>
                        <option value="Croatia">Croatia</option>
                        <option value="Cuba">Cuba</option>
                        <option value="Denmark">Denmark</option>
                        <option value="Djibouti">Djibouti</option>
                        <option value="Dominica">Dominica</option>
                        <option value="Egypt">Egypt</option>
                        <option value="El Salvador">El Salvador</option>
                        <option value="United Arab Emirates">United Arab Emirates</option>
                        <option value="Ecuador">Ecuador</option>
                        <option value="Eritrea">Eritrea</option>
                        <option value="Scotland">Scotland</option>
                        <option value="Slovakia">Slovakia</option>
                        <option value="Slovenia">Slovenia</option>
                        <option value="Spain">Spain</option>
                        <option value="Federated States of Micronesia">Federated States of Micronesia</option>
                        <option value="United States of America">United States of America</option>
                        <option value="Estonia">Estonia</option>
                        <option value="Eswatini">Eswatini</option>
                        <option value="Ethiopia">Ethiopia</option>
                        <option value="Fiji">Fiji</option>
                        <option value="Philippines">Philippines</option>
                        <option value="Finland">Finland</option>
                        <option value="France">France</option>
                        <option value="Gabon">Gabon</option>
                        <option value="Gambia">Gambia</option>
                        <option value="Ghana">Ghana</option>
                        <option value="Georgia">Georgia</option>
                        <option value="Grenada">Grenada</option>
                        <option value="Greece">Greece</option>
                        <option value="Guatemala">Guatemala</option>
                        <option value="Guyana">Guyana</option>
                        <option value="Guinea">Guinea</option>
                        <option value="Guinea-Bissau">Guinea-Bissau</option>
                        <option value="Equatorial Guinea">Equatorial Guinea</option>
                        <option value="Haiti">Haiti</option>
                        <option value="Netherlands">Netherlands</option>
                        <option value="Honduras">Honduras</option>
                        <option value="Hungary">Hungary</option>
                        <option value="Yemen">Yemen</option>
                        <option value="India">India</option>
                        <option value="Indonesia">Indonesia</option>
                        <option value="England">England</option>
                        <option value="Iran">Iran</option>
                        <option value="Iraq">Iraq</option>
                        <option value="Northern Ireland">Northern Ireland</option>
                        <option value="Ireland">Ireland</option>
                        <option value="Iceland">Iceland</option>
                        <option value="Italy">Italy</option>
                        <option value="Jamaica">Jamaica</option>
                        <option value="Japan">Japan</option>
                        <option value="Jordan">Jordan</option>
                        <option value="Kiribati">Kiribati</option>
                        <option value="Kosovo">Kosovo</option>
                        <option value="Kuwait">Kuwait</option>
                        <option value="Laos">Laos</option>
                        <option value="Lesotho">Lesotho</option>
                        <option value="Latvia">Latvia</option>
                        <option value="Lebanon">Lebanon</option>
                        <option value="Liberia">Liberia</option>
                        <option value="Libya">Libya</option>
                        <option value="Liechtenstein">Liechtenstein</option>
                        <option value="Lithuania">Lithuania</option>
                        <option value="Luxembourg">Luxembourg</option>
                        <option value="North Macedonia">North Macedonia</option>
                        <option value="Madagascar">Madagascar</option>
                        <option value="Malaysia">Malaysia</option>
                        <option value="Malawi">Malawi</option>
                        <option value="Maldives">Maldives</option>
                        <option value="Mali">Mali</option>
                        <option value="Malta">Malta</option>
                        <option value="Morocco">Morocco</option>
                        <option value="Marshall Islands">Marshall Islands</option>
                        <option value="Mauritius">Mauritius</option>
                        <option value="Mauritania">Mauritania</option>
                        <option value="Mexico">Mexico</option>
                        <option value="Myanmar">Myanmar</option>
                        <option value="Micronesia">Micronesia</option>
                        <option value="Mozambique">Mozambique</option>
                        <option value="Moldova">Moldova</option>
                        <option value="Monaco">Monaco</option>
                        <option value="Mongolia">Mongolia</option>
                        <option value="Montenegro">Montenegro</option>
                        <option value="Namibia">Namibia</option>
                        <option value="Nauru">Nauru</option>
                        <option value="Nepal">Nepal</option>
                        <option value="Nicaragua">Nicaragua</option>
                        <option value="Niger">Niger</option>
                        <option value="Nigeria">Nigeria</option>
                        <option value="Norway">Norway</option>
                        <option value="New Zealand">New Zealand</option>
                        <option value="Oman">Oman</option>
                        <option value="South Ossetia">South Ossetia</option>
                        <option value="Wales">Wales</option>
                        <option value="Netherlands">Netherlands</option>
                        <option value="Palau">Palau</option>
                        <option value="Palestine">Palestine</option>
                        <option value="Panama">Panama</option>
                        <option value="Papua New Guinea">Papua New Guinea</option>
                        <option value="Pakistan">Pakistan</option>
                        <option value="Paraguay">Paraguay</option>
                        <option value="Peru">Peru</option>
                        <option value="Poland">Poland</option>
                        <option value="Portugal">Portugal</option>
                        <option value="Qatar">Qatar</option>
                        <option value="Kenya">Kenya</option>
                        <option value="Kyrgyzstan">Kyrgyzstan</option>
                        <option value="Kiribati">Kiribati</option>
                        <option value="United Kingdom">United Kingdom</option>
                        <option value="Sahrawi Arab Democratic Republic">Sahrawi Arab Democratic Republic</option>
                        <option value="Central African Republic">Central African Republic</option>
                        <option value="Democratic Republic of the Congo">Democratic Republic of the Congo</option>
                        <option value="Republic of the Congo">Republic of the Congo</option>
                        <option value="Dominican Republic">Dominican Republic</option>
                        <option value="Czech Republic">Czech Republic</option>
                        <option value="Turkish Republic of Northern Cyprus">Turkish Republic of Northern Cyprus
                        </option>
                        <option value="Romania">Romania</option>
                        <option value="Rwanda">Rwanda</option>
                        <option value="Russia">Russia</option>
                        <option value="Solomon Islands">Solomon Islands</option>
                        <option value="Samoa">Samoa</option>
                        <option value="San Marino">San Marino</option>
                        <option value="Saint Lucia">Saint Lucia</option>
                        <option value="Saint Kitts and Nevis">Saint Kitts and Nevis</option>
                        <option value="São Tomé and Príncipe">São Tomé and Príncipe</option>
                        <option value="Saint Vincent and the Grenadines">Saint Vincent and the Grenadines</option>
                        <option value="Senegal">Senegal</option>
                        <option value="Sierra Leone">Sierra Leone</option>
                        <option value="Serbia">Serbia</option>
                        <option value="Seychelles">Seychelles</option>
                        <option value="Singapore">Singapore</option>
                        <option value="Syria">Syria</option>
                        <option value="Somalia">Somalia</option>
                        <option value="Sri Lanka">Sri Lanka</option>
                        <option value="Eswatini">Eswatini</option>
                        <option value="South Sudan">South Sudan</option>
                        <option value="Sudan">Sudan</option>
                        <option value="Sweden">Sweden</option>
                        <option value="Switzerland">Switzerland</option>
                        <option value="Suriname">Suriname</option>
                        <option value="Thailand">Thailand</option>
                        <option value="Taiwan">Taiwan</option>
                        <option value="Tajikistan">Tajikistan</option>
                        <option value="Tanzania">Tanzania</option>
                        <option value="Czechia">Czechia</option>
                        <option value="Timor-Leste">Timor-Leste</option>
                        <option value="Togo">Togo</option>
                        <option value="Tonga">Tonga</option>
                        <option value="Trinidad and Tobago">Trinidad and Tobago</option>
                        <option value="Tunisia">Tunisia</option>
                        <option value="Turkmenistan">Turkmenistan</option>
                        <option value="Turkey">Turkey</option>
                        <option value="Tuvalu">Tuvalu</option>
                        <option value="Ukraine">Ukraine</option>
                        <option value="Uganda">Uganda</option>
                        <option value="Uruguay">Uruguay</option>
                        <option value="Uzbekistan">Uzbekistan</option>
                        <option value="Vanuatu">Vanuatu</option>
                        <option value="Vatican">Vatican</option>
                        <option value="Venezuela">Venezuela</option>
                        <option value="Vietnam">Vietnam</option>
                        <option value="Zambia">Zambia</option>
                        <option value="Zimbabwe">Zimbabwe</option>
                    </select>
                </div>
            </div>

            <div class="field-group">
                <div class="field" style="flex: 1 1 100%;">
                    <input type="email" name="email" placeholder="Email Address*" required
                        value="{{ old('email') }}">
                </div>
            </div>

            <div class="field-group">
                <div class="field">
                    <input type="password" name="senha" placeholder="Password *" required>
                </div>
                <div class="field">
                    <input type="password" name="senha_confirmation" placeholder="Confirm password *" required>
                </div>
            </div>


            {!! NoCaptcha::display() !!}

            <p class="note">This question is for testing whether or not the user is a human visitor and to prevent
                automated spam submissions.</p>
            <br>
            <p class="note"><span class="required">*</span> Mandatory fields</p>

            <div class="submit">
                <input type="submit" value="CREATE A NEW ACCOUNT">
            </div>
            <div class="links">
                Already have an account? <a href="{{ route('ENlogin.form') }}">Log-in Now</a><br><br>
                <a href="/ENhome">Go back to home page</a><br>
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
