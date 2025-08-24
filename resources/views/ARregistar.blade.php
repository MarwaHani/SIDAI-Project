<!DOCTYPE html>
<html dir="rtl" lang="arabic">

<head>
    <meta charset="UTF-8">
    <title>إنشاء حساب</title>
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
                flex-direction: column;
                /* Campos ficam um embaixo do outro */
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
        <form class="form" action="{{ route('ARregistar') }}" method="POST">
            @csrf
            <header>إنشاء حساب</header>

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
                    <input type="text" name="nome" placeholder="الاسم *" required value="{{ old('nome') }}">
                </div>
                <div class="field">
                    <input type="text" name="apelido" placeholder="اللقب *" required value="{{ old('apelido') }}">
                </div>
            </div>

            <div class="field-group">
                <div class="field">
                    <input type="date" name="data_nascimento" placeholder="تاريخ الميلاد"
                        value="{{ old('data_nascimento') }}">
                </div>
                <div class="field">
                    <input type="text" name="telemovel" placeholder="رقم الهاتف" value="{{ old('telemovel') }}">
                </div>
            </div>

            <div class="field-group">
                <div class="field">
                    <select name="sexo">
                        <option value="">الجنس</option>
                        <option value="Feminino">أنثى</option>
                        <option value="Masculino">ذكر</option>
                        <option value="Prefiro não dizer">افضل عدم القول</option>
                    </select>
                </div>
                <div class="field">
                    <select name="pais" id="select-pais">
                        <option value="">البلد</option>
                        <option value="Abecásia">أبخازيا</option>
                        <option value="Afeganistão">أفغانستان</option>
                        <option value="África do Sul">جنوب أفريقيا</option>
                        <option value="Albânia">ألبانيا</option>
                        <option value="Alemanha">ألمانيا</option>
                        <option value="Andorra">أندورا</option>
                        <option value="Angola">أنغولا</option>
                        <option value="Antígua e Barbuda">أنتيغوا وباربودا</option>
                        <option value="Arábia Saudita">المملكة العربية السعودية</option>
                        <option value="Argélia">الجزائر</option>
                        <option value="Argentina">الأرجنتين</option>
                        <option value="Armênia">أرمينيا</option>
                        <option value="Austrália">أستراليا</option>
                        <option value="Áustria">النمسا</option>
                        <option value="Azerbaijão">أذربيجان</option>
                        <option value="Bahamas">جزر البهاما</option>
                        <option value="Bahrein">البحرين</option>
                        <option value="Bangladesh">بنغلاديش</option>
                        <option value="Barbados">بربادوس</option>
                        <option value="Bélgica">بلجيكا</option>
                        <option value="Belize">بليز</option>
                        <option value="Benim">بنين</option>
                        <option value="Bielorrússia">روسيا البيضاء</option>
                        <option value="Bolívia">بوليفيا</option>
                        <option value="Bósnia e Herzegovina">البوسنة والهرسك</option>
                        <option value="Botsuana">بتسوانا</option>
                        <option value="Brasil">البرازيل</option>
                        <option value="Brunei">بروناي</option>
                        <option value="Bulgária">بلغاريا</option>
                        <option value="Burkina Faso">بوركينا فاسو</option>
                        <option value="Burundi">بوروندي</option>
                        <option value="Butão">بوتان</option>
                        <option value="Cabo Verde">الرأس الأخضر</option>
                        <option value="Camarões">الكاميرون</option>
                        <option value="Camboja">كمبوديا</option>
                        <option value="Canadá">كندا</option>
                        <option value="Cazaquistão">كازاخستان</option>
                        <option value="Chade">تشاد</option>
                        <option value="Chile">تشيلي</option>
                        <option value="China">الصين</option>
                        <option value="Chipre">قبرص</option>
                        <option value="Singapura">سنغافورة</option>
                        <option value="Colômbia">كولومبيا</option>
                        <option value="Comores">جزر القمر</option>
                        <option value="Congo">الكونغو</option>
                        <option value="Coreia do Norte">كوريا الشمالية</option>
                        <option value="Coreia do Sul">كوريا الجنوبية</option>
                        <option value="Costa do Marfim">ساحل العاج</option>
                        <option value="Costa Rica">كوستاريكا</option>
                        <option value="Croácia">كرواتيا</option>
                        <option value="Cuba">كوبا</option>
                        <option value="Dinamarca">الدنمارك</option>
                        <option value="Djibouti">جيبوتي</option>
                        <option value="Dominica">دومينيكا</option>
                        <option value="Egito">مصر</option>
                        <option value="El Salvador">السلفادور</option>
                        <option value="Emirados Árabes Unidos">الإمارات العربية المتحدة</option>
                        <option value="Equador">الإكوادور</option>
                        <option value="Eritreia">إريتريا</option>
                        <option value="Escócia">اسكتلندا</option>
                        <option value="Eslováquia">سلوفاكيا</option>
                        <option value="Eslovênia">سلوفينيا</option>
                        <option value="Espanha">إسبانيا</option>
                        <option value="Estados Federados da Micronésia">ولايات ميكرونيسيا المتحدة</option>
                        <option value="Estados Unidos da América">الولايات المتحدة الأمريكية</option>
                        <option value="Estônia">إستونيا</option>
                        <option value="Eswatini">إسواتيني</option>
                        <option value="Etiópia">إثيوبيا</option>
                        <option value="Fiji">فيجي</option>
                        <option value="Filipinas">الفلبين</option>
                        <option value="Finlândia">فنلندا</option>
                        <option value="França">فرنسا</option>
                        <option value="Gabão">الغابون</option>
                        <option value="Gâmbia">غامبيا</option>
                        <option value="Gana">غانا</option>
                        <option value="Geórgia">جورجيا</option>
                        <option value="Granada">غرينادا</option>
                        <option value="Grécia">اليونان</option>
                        <option value="Guatemala">غواتيمالا</option>
                        <option value="Guiana">غيانا</option>
                        <option value="Guiné">غينيا</option>
                        <option value="Guiné-Bissau">غينيا بيساو</option>
                        <option value="Guiné Equatorial">غينيا الاستوائية</option>
                        <option value="Haiti">هايتي</option>
                        <option value="Holanda">هولندا</option>
                        <option value="Honduras">هندوراس</option>
                        <option value="Hungria">المجر</option>
                        <option value="Iêmen">اليمن</option>
                        <option value="Índia">الهند</option>
                        <option value="Indonésia">إندونيسيا</option>
                        <option value="Inglaterra">إنجلترا</option>
                        <option value="Irão">إيران</option>
                        <option value="Iraque">العراق</option>
                        <option value="Irlanda do Norte">أيرلندا الشمالية</option>
                        <option value="Irlanda">أيرلندا</option>
                        <option value="Islândia">آيسلندا</option>
                        <option value="Itália">إيطاليا</option>
                        <option value="Jamaica">جامايكا</option>
                        <option value="Japão">اليابان</option>
                        <option value="Jordânia">الأردن</option>
                        <option value="Kiribati">كيريباتي</option>
                        <option value="Kosovo">كوسوفو</option>
                        <option value="Kuwait">الكويت</option>
                        <option value="Laos">لاوس</option>
                        <option value="Lesoto">ليسوتو</option>
                        <option value="Letônia">لاتفيا</option>
                        <option value="Líbano">لبنان</option>
                        <option value="Libéria">ليبيريا</option>
                        <option value="Líbia">ليبيا</option>
                        <option value="Liechtenstein">ليختنشتاين</option>
                        <option value="Lituânia">ليتوانيا</option>
                        <option value="Luxemburgo">لوكسمبورغ</option>
                        <option value="Macedônia do Norte">مقدونيا الشمالية</option>
                        <option value="Madagascar">مدغشقر</option>
                        <option value="Malásia">ماليزيا</option>
                        <option value="Malawi">مالاوي</option>
                        <option value="Maldivas">المالديف</option>
                        <option value="Mali">مالي</option>
                        <option value="Malta">مالطا</option>
                        <option value="Marrocos">المغرب</option>
                        <option value="Marshall">جزر مارشال</option>
                        <option value="Maurícia">موريشيوس</option>
                        <option value="Mauritânia">موريتانيا</option>
                        <option value="México">المكسيك</option>
                        <option value="Mianmar">ميانمار</option>
                        <option value="Micronésia">ميكرونيزيا</option>
                        <option value="Moçambique">موزمبيق</option>
                        <option value="Moldávia">مولدوفا</option>
                        <option value="Mônaco">موناكو</option>
                        <option value="Mongólia">منغوليا</option>
                        <option value="Montenegro">الجبل الأسود</option>
                        <option value="Namíbia">ناميبيا</option>
                        <option value="Nauru">ناورو</option>
                        <option value="Nepal">نيبال</option>
                        <option value="Nicarágua">نيكاراغوا</option>
                        <option value="Níger">النيجر</option>
                        <option value="Nigéria">نيجيريا</option>
                        <option value="Noruega">النرويج</option>
                        <option value="Nova Zelândia">نيوزيلندا</option>
                        <option value="Omã">عمان</option>
                        <option value="Ossétia do Sul">أوسيتيا الجنوبية</option>
                        <option value="País de Gales">ويلز</option>
                        <option value="Países Baixos">هولندا</option>
                        <option value="Palau">بالاو</option>
                        <option value="Palestina">فلسطين</option>
                        <option value="Panamá">بنما</option>
                        <option value="Papua-Nova Guiné">بابوا غينيا الجديدة</option>
                        <option value="Paquistão">باكستان</option>
                        <option value="Paraguai">باراغواي</option>
                        <option value="Peru">بيرو</option>
                        <option value="Polônia">بولندا</option>
                        <option value="Portugal">البرتغال</option>
                        <option value="Qatar">قطر</option>
                        <option value="Quênia">كينيا</option>
                        <option value="Quirguistão">قرغيزستان</option>
                        <option value="Quiribati">كيريباتي</option>
                        <option value="Reino Unido">المملكة المتحدة</option>
                        <option value="República Árabe Saaraui Democrática">الجمهورية العربية الصحراوية الديمقراطية
                        </option>
                        <option value="República Centro-Africana">جمهورية أفريقيا الوسطى</option>
                        <option value="República Democrática do Congo">جمهورية الكونغو الديمقراطية</option>
                        <option value="República do Congo">جمهورية الكونغو</option>
                        <option value="República Dominicana">جمهورية الدومينيكان</option>
                        <option value="República Tcheca">جمهورية التشيك</option>
                        <option value="República Turca de Chipre do Norte">جمهورية شمال قبرص التركية</option>
                        <option value="Romênia">رومانيا</option>
                        <option value="Ruanda">رواندا</option>
                        <option value="Rússia">روسيا</option>
                        <option value="Salomão">جزر سليمان</option>
                        <option value="Samoa">ساموا</option>
                        <option value="San Marino">سان مارينو</option>
                        <option value="Santa Lúcia">سانت لوسيا</option>
                        <option value="São Cristóvão e Névis">سانت كيتس ونيفيس</option>
                        <option value="São Tomé e Príncipe">ساو تومي وبرينسيب</option>
                        <option value="São Vicente e Granadinas">سانت فنسنت والغرينادين</option>
                        <option value="Senegal">السنغال</option>
                        <option value="Serra Leoa">سيراليون</option>
                        <option value="Sérvia">صربيا</option>
                        <option value="Seychelles">سيشل</option>
                        <option value="Singapura">سنغافورة</option>
                        <option value="Síria">سوريا</option>
                        <option value="Somália">الصومال</option>
                        <option value="Sri Lanka">سريلانكا</option>
                        <option value="Suazilândia">إسواتيني</option>
                        <option value="Sudão do Sul">جنوب السودان</option>
                        <option value="Sudão">السودان</option>
                        <option value="Suécia">السويد</option>
                        <option value="Suíça">سويسرا</option>
                        <option value="Suriname">سورينام</option>
                        <option value="Tailândia">تايلاند</option>
                        <option value="Taiwan">تايوان</option>
                        <option value="Tajiquistão">طاجيكستان</option>
                        <option value="Tanzânia">تنزانيا</option>
                        <option value="Tchéquia">التشيك</option>
                        <option value="Timor-Leste">تيمور الشرقية</option>
                        <option value="Togo">توغو</option>
                        <option value="Tonga">تونغا</option>
                        <option value="Trinidad e Tobago">ترينيداد وتوباغو</option>
                        <option value="Tunísia">تونس</option>
                        <option value="Turcomenistão">تركمانستان</option>
                        <option value="Turquia">تركيا</option>
                        <option value="Tuvalu">توفالو</option>
                        <option value="Ucrânia">أوكرانيا</option>
                        <option value="Uganda">أوغندا</option>
                        <option value="Uruguai">أوروغواي</option>
                        <option value="Uzbequistão">أوزبكستان</option>
                        <option value="Vanuatu">فانواتو</option>
                        <option value="Vaticano">الفاتيكان</option>
                        <option value="Venezuela">فنزويلا</option>
                        <option value="Vietnã">فيتنام</option>
                        <option value="Zâmbia">زامبيا</option>
                        <option value="Zimbábue">زيمبابوي</option>
                    </select>
                </div>
            </div>

            <div class="field-group">
                <div class="field" style="flex: 1 1 100%;">
                    <input type="email" name="email" placeholder="*الايميل" required
                        value="{{ old('email') }}">
                </div>
            </div>

            <div class="field-group">
                <div class="field">
                    <input type="password" name="senha" placeholder="*كلمة المرور " required>
                </div>
                <div class="field">
                    <input type="password" name="senha_confirmation" placeholder="*تأكيد كلمة المرور" required>
                </div>
            </div>

            {!! NoCaptcha::display() !!}

            <p class="note">هذا السؤال يهدف إلى اختبار ما إذا كان المستخدم زائرًا بشريًا أم لا ولمنع عمليات إرسال
                البريد العشوائي الآلية.</p>
            <br>
            <p class="note"><span class="required">*</span> الحقول الإلزامية</p>

            <div class="submit">
                <input type="submit" value="إنشاء حساب جديد">
            </div>
            <div class="links">
                هل لديك حساب بالفعل؟ <a href="{{ route('ARlogin.form') }}">سجل دخول هنا</a><br><br>
                <a href="/ARhome">العودة الى الصفحة الرئيسية</a><br>
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
