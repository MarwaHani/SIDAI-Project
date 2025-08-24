@extends('layouts.arabic')

@section('arabic')
    <section class="recursos">
        <h2>مراجع مفيدة</h2>

        <div class="tabs">
            <button class="tab active" onclick="showTab('destaque')">اخبار </button>
            <button class="tab" onclick="showTab('aprender')">تعلم اللغة البرتغالية</button>
            <button class="tab" onclick="showTab('apoio')">مصادر مفيدة</button>
        </div>

        {{-- Aba: Em Destaque --}}
        <div id="destaque" class="tab-content active">
            <p>الأخبار المميزة: </p>
            <div class="noticias">
                <div class="noticias-card"
                    style=" background: url(storage/documentos/n3.jpg); background-size: cover; background-position: center;">
                    <p>الحكومة تعزز متطلبات قوانين الجنسية والإقامة</p>
                    <a href="https://www.portugal.gov.pt/pt/gc25/comunicacao/noticia?i=governo-reforma-exigencia-nas-leis-de-nacionalidade-e-residencia"
                        style=" color: white; padding-top:15px;"> Sabe mais <i style="font-size: 12px;"
                            class="fa-solid fa-arrow-up-right-from-square"></i></a>
                </div>
                <div
                    class="noticias-card"style=" background: url(storage/documentos/n1.png); background-size: cover; background-position: center;">
                    <p>الهجرة المنظمة والإنسانية: لدى الحكومة سياسة هجرة تتسم بالسيطرة والكرامة والتكامل</p>
                    <a href="https://www.portugal.gov.pt/pt/gc25/comunicacao/noticia?i=imigracao-regulada-e-humanista-governo-tem-politica-migratoria-com-controlo-dignidade-e-integracao"
                        style="color: white; padding-top:15px;"> Sabe mais <i style="font-size: 12px;"
                            class="fa-solid fa-arrow-up-right-from-square"></i></a>
                </div>
                <div class="noticias-card"
                    style=" background: url(storage/documentos/n2.jpeg); background-size: cover; background-position: center;">
                    <p>يعرف المهاجرون الآن أسماء موظفي AIMA الذين يوافقون على الطلبات ويرفضونها</p>
                    <a href="https://www.publico.pt/2025/06/15/publico-brasil/noticia/imigrantes-sabem-nome-funcionarios-aima-aprovam-rejeitam-processos-2136722"
                        style=" color: white; padding-top:15px;"> Sabe mais <i style="font-size: 12px;"
                            class="fa-solid fa-arrow-up-right-from-square"></i></a>
                </div>
                <div class="noticias-card"
                    style=" background: url(storage/documentos/n4.jpeg); background-size: cover; background-position: center;">
                    <p>يكشف تقرير يصف الوضع وديناميكيات الهجرة في بيرا بايكسا المقدم في بيناماكور عن النمو السكاني الحقيقي
                        في البلدية في عام 2023</p>
                    <a href="https://www.cm-penamacor.pt/autarquia/comunicacao/noticias/noticia/relatorio-de-caracterizacao-da-situacao-e-dinamica-imigratoria-na-beira-baixa-apresentado-em-penamacor-revela-um-crescimento-real-da-populacao-no-concelho-em-2023"
                        style=" color: white; padding-top:15px;"> Sabe mais <i style="font-size: 12px;"
                            class="fa-solid fa-arrow-up-right-from-square"></i></a>
                </div>
            </div>
            <div class="relatorio">
                <p>اطلع على أحدث بيانات الهجرة وتقارير الأولوية.</p>
                <ul>
                    <li>
                        <a href="{{ asset('storage/documentos/relatorio_migracao_2023.pdf') }}" download>
                            تقرير الهجرة واللجوء 2023 <i style="font-size: 14px;" class="fa-regular fa-file-pdf"></i>
                    </li>
                    <li>
                        <a href="https://www.consilium.europa.eu/pt/infographics/migration-flows-to-europe/">
                            تدفقات الهجرة: الطرق الشرقية والوسطى والغربية <i style="font-size: 12px;"
                                class="fa-solid fa-arrow-up-right-from-square"></i>
                        </a>
                    </li>
                    <li>

                    </li>
                </ul>
            </div>
        </div>

        <div id="aprender" class="tab-content">
            <p>يمكنك هنا العثور على موارد مجانية لتعلم اللغة البرتغالية وتسهيل اندماجك.</p>

            <div class="accordion">
                <div class="accordion-item">
                    <button class="accordion-toggle"><i class="fa-solid fa-graduation-cap"></i> دورات مجانية عبر الإنترنت
                    </button>
                    <div class="accordion-content">
                        <ul>
                            <li><a href="https://www.iefp.pt/programa-ppt-portugues-para-todos" target="_blank">IEFP - اللغة
                                    البرتغالية كلغة مضيفة (PLA)</a>
                                <span class="descricao-inline">
                                    *الشهادات بمستويات اللغة المقبولة في إجراءات الجنسية أو الإقامة الدائمة أو طويلة الأمد.
                                </span>
                            </li>
                            <li><a href="https://www.speak.social/pt/" target="_blank">SPEAK – دروس عبر الإنترنت في مجموعات
                                    تفاعلية</a></li>
                            <li><a href="https://www.hellotalk.com/" target="_blank">Hello Talk - تدرب مع متحدثين أصليين من
                                    البرتغال عبر النص أو الصوت أو الفيديو</a></li>
                            <li><a href="https://www.memrise.com/en/learn-portuguese" target="_blank">Memrise - تطبيق</a>
                            </li>
                            <li><a href="https://pt.duolingo.com/" target="_blank">Duolingo – تطبيق</a></li>
                            <li><a href="https://context.reverso.net/traducao/" target="_blank">Reverso Context – ترجمات
                                    بجمل حقيقية</a></li>
                        </ul>
                    </div>
                </div>

                <div class="accordion-item">
                    <button class="accordion-toggle"><i class="fa-solid fa-book"></i> مواد مفيدة للتحميل</button>
                    <div class="accordion-content">
                        <ul>
                            <li><a href="{{ asset('storage/documentos/pt-a1-arabe.pdf') }}" download><i
                                        class="fa-regular fa-file-pdf"></i> المفردات الأساسية في اللغة البرتغالية</a></li>
                            <li><a href="{{ asset('storage/documentos/frases_uteis.pdf') }}" download><i
                                        class="fa-regular fa-file-pdf"></i> عبارات مفيدة للحياة اليومية </a></li>
                        </ul>
                    </div>
                </div>

                <div class="accordion-item">
                    <button class="accordion-toggle"><i class="fa-solid fa-headphones"></i> مقاطع الفيديو ودروس
                        الفيديو</button>
                    <div class="accordion-content">
                        <ul>
                            <li><a href="https://www.youtube.com/@PortugueseWithLeo" target="_blank"><i
                                        class="fa-brands fa-youtube"></i> Portuguese With Leo</a></li>
                            <li><a href="https://www.youtube.com/@TalktheStreets/featured" target="_blank"> <i
                                        class="fa-brands fa-youtube"></i> Talk the Streets</a></li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>

        {{-- Aba: Documentos Úteis --}}
        <div id="apoio" class="tab-content">
            <div class="accordion">
                <div class="accordion-item">
                    <button class="accordion-toggle">AIMA - كيفية الحصول على تصريح إقامة </button>
                    <div class="accordion-content">
                        <ul>
                            <li>تصريح الإقامة (النظام العام والمتطلبات) - المادة 77، رقم 1
                                <a href="https://aima.gov.pt/pt/viver/autorizacao-de-residencia-regime-e-requisitos-gerais-art-o-77-o-n-o-1"
                                    target="_blank">
                                    <br> انقر هنا<i class="fa-solid fa-arrow-up-right-from-square"
                                        style="font-size: 12px"></i></a>
                            <li>تصريح الإقامة الدائمة – المادة 80
                                <a href="https://aima.gov.pt/pt/viver/autorizacao-de-residencia-permanente-art-80-o"
                                    target="_blank">
                                    <br>انقر هنا <i class="fa-solid fa-arrow-up-right-from-square"
                                        style="font-size: 12px"></i></a>
                            </li>
                            <li>تصريح الإقامة للمهاجرين من رواد الأعمال - "تأشيرة الشركات الناشئة" - المادة 89، رقم 4
                                <a href="https://aima.gov.pt/pt/viver/autorizacao-de-residencia-para-imigrantes-empreendedores-startup-visa-art-89-o-n-o-4"
                                    target="_blank">
                                    <br>انقر هنا <i class="fa-solid fa-arrow-up-right-from-square"
                                        style="font-size: 12px"></i> </a>
                            </li>
                            <li>تصريح الإقامة للاستثمار – المادة 90.º-أ
                                <a href="https://aima.gov.pt/pt/viver/autorizacao-de-residencia-para-investimento-art-90-o-a"
                                    target="_blank">
                                    <br>انقر هنا <i class="fa-solid fa-arrow-up-right-from-square"
                                        style="font-size: 12px"></i></a>
                            </li>
                            <li>تصريح الإقامة لضحايا الإتجار بالبشر أو إجراءات مساعدة الهجرة غير الشرعية - المادة 109
                                <a href="https://aima.gov.pt/pt/viver/autorizacao-de-residencia-para-vitimas-de-trafico-de-pessoas-ou-de-acao-de-auxilio-a-imigracao-ilegal-art-109-o"
                                    target="_blank">
                                    <br>انقر هنا <i class="fa-solid fa-arrow-up-right-from-square"
                                        style="font-size: 12px"></i></a>
                            </li>
                            <li>تصريح الإقامة لحاملي الإقامة طويلة الأمد في دولة عضو أخرى في الاتحاد الأوروبي - المادة 116
                                <a href="https://aima.gov.pt/pt/viver/autorizacao-de-residencia-para-titulares-do-estatuto-de-residente-de-longa-duracao-em-outro-estado-membro-da-uniao-europeia-art-"
                                    target="_blank">
                                    <br>انقر هنا <i class="fa-solid fa-arrow-up-right-from-square"
                                        style="font-size: 12px"></i></a>
                            </li>
                            <li>منح "البطاقة الزرقاء للاتحاد الأوروبي" وتصريح الإقامة لحامليها في دولة عضو أخرى - المادة
                                121-أ وما يليها (المادة 121-ب و121-ك)
                                <a href="https://aima.gov.pt/pt/viver/concessao-de-cartao-azul-ue-e-autorizacao-de-residencia-para-titulares-de-cartao-azul-ue-noutro-estado-membro-art-121-o-a-e-segu"
                                    target="_blank">
                                    <br>انقر هنا<i class="fa-solid fa-arrow-up-right-from-square"
                                        style="font-size: 12px"></i></a>
                            </li>
                            <li>القاصرون، أبناء أو بنات المواطنين الأجانب الحاصلين على تصريح إقامة، المولودون في البرتغال -
                                المادة 122.º/1 وما بعدها. أ)
                                <a href="https://aima.gov.pt/pt/viver/menores-filhos-de-cidadaos-estrangeiros-titulares-de-autorizacao-de-residencia-nascidos-em-portugal-art-122-o-1-al-a"
                                    target="_blank">
                                    <br>انقر هنا <i class="fa-solid fa-arrow-up-right-from-square"
                                        style="font-size: 12px"></i></a>
                            </li>
                            <li>القاصرون المولودون في البرتغال والذين بقوا هنا والذين يلتحقون بالتعليم ما قبل المدرسي أو
                                التعليم الابتدائي أو الثانوي أو المهني - المادة 122.º/1 وما بعدها ب)
                                <a href="https://aima.gov.pt/pt/viver/menores-nascidos-em-portugal-que-aqui-tenham-permanecido-e-se-encontrem-a-frequentar-a-educacao-pre-escolar-ou-o-ensino-basico-s"
                                    target="_blank">
                                    <br>انقر هنا <i class="fa-solid fa-arrow-up-right-from-square"
                                        style="font-size: 12px"></i></a>
                            </li>
                            <li>أبناء أو بنات حاملي تصريح الإقامة، الذين بلغوا سن الرشد وأقاموا بشكل معتاد في البرتغال منذ
                                سن العاشرة - المادة 122.º/1 وما بعدها ج)
                                <a href="https://aima.gov.pt/pt/viver/filhos-ou-filhas-de-titulares-de-autorizacao-de-residencia-que-tenham-atingido-a-maioridade-e-tenham-permanecido-habitualmente-e"
                                    target="_blank">
                                    <br>انقر هنا<i class="fa-solid fa-arrow-up-right-from-square"
                                        style="font-size: 12px"></i></a>
                            </li>
                        </ul>
                    </div>
                </div>

                <div class="accordion-item">
                    <button class="accordion-toggle"> الضمان الاجتماعي - كيفية الحصول على الرقم NISS </button>
                    <div class="accordion-content">
                        <ul>
                            <li> Segurança Social Direta - الضمان الاجتماعي المباشر
                                <br><span style="font-size: 14px; color:#666;">ال <a
                                        href="https://app.seg-social.pt/sso/login?service=https%3A%2F%2Fapp.seg-social.pt%2Fptss%2Fcaslogin">
                                        Social Security Direct (SSD) هي قناة مباشرة وسريعة وفعالة ومريحة وآمنة تسمح للأفراد
                                        والشركات باستخدام خدمات الضمان الاجتماعي عبر الإنترنت دون الحاجة إلى الذهاب إلى مركز
                                        خدمة الضمان الاجتماعي شخصيًا.
                                        الهدف الرئيسي هو تسهيل وتعظيم العلاقة والتفاعل بين المواطنين والشركات من أجل تقديم
                                        خدمة وظيفية ومحلية وفقًا للاحتياجات المختلفة.
                                        <a href="https://app.seg-social.pt/sso/login?service=https%3A%2F%2Fapp.seg-social.pt%2Fptss%2Fcaslogin"
                                            target="_blank"> انقر هنا<i class="fa-solid fa-arrow-up-right-from-square"
                                                style="font-size: 12px"></i></a>
                            </li>

                            <li> ما هو رقم التعريف بالضمان الاجتماعي ؟
                                <br><span style="font-size: 14px; color:#666;">رقم تعريف الضمان الاجتماعي (NISS) هو الرقم
                                    الذي يسمح بالتعريف الفريد والدقيق والصارم أمام الضمان الاجتماعي على المستوى
                                    الوطني.</span>
                            </li>
                            <li>طلب NISS
                                <a href="https://www.seg-social.pt/pedido-de-formulario-niss-cidadao-estrangeiro"
                                    target="_blank">
                                    <br> انقر هنا <i class="fa-solid fa-arrow-up-right-from-square"
                                        style="font-size: 12px"></i></a>
                        </ul>
                    </div>
                </div>

                <div class="accordion-item">
                    <button class="accordion-toggle"> المالية - كيفية الحصول على NIF </button>
                    <div class="accordion-content">
                        <ul>
                            <li> طلب رقم التعريف الضريبي (NIF)
                                <br><span style="font-size: 14px; color:#666;">يجب على الشخص الأجنبي، المقيم أو غير المقيم
                                    في البرتغال، الذي يعمل ويدفع الضرائب في البرتغال، أن يكون لديه رقم تعريف ضريبي (NIF).
                                    <br> في حالة الأطفال والشباب، يعد NIF ضروريًا لتغطية نفقات الصحة والتعليم، على سبيل
                                    المثال، والتي يمكن للوالدين تضمينها في إقرار ضريبة الدخل الشخصي الخاص بهم. (IRS).
                                </span>
                            </li>
                            <li> كيفية طلب NIF

                                <p style="padding: 0.7em;"> في <a
                                        href="https://info.portaldasfinancas.gov.pt/pt/dgci/contactos_servicos/enderecos_contactos/Pages/contactos.aspx">الخدمات
                                        المالية</a>
                                    - احجز موعدًا للخدمة الشخصية عبر مركز خدمة الهاتف (CAT) على الرقم 217 206 707، أيام
                                    الأسبوع، من الساعة 9 صباحًا حتى 7 مساءً.</p>
                            </li>
                            <li>بوابة التمويل
                                <a href="https://www.portaldasfinancas.gov.pt/at/html/index.html" target="_blank">
                                    <br> انقر هنا <i class="fa-solid fa-arrow-up-right-from-square"
                                        style="font-size: 12px"></i></a>
                        </ul>
                    </div>
                </div>
                <div class="accordion-item">
                    <button class="accordion-toggle"> SNS - كيفية الحصول على رقم المستخدم الخاص بك في الخدمة الصحية الوطنية
                    </button>
                    <div class="accordion-content">
                        <ul>
                            <li> كيف أحصل على رقم المستخدم الخاص بالخدمة الصحية الوطنية (SNS)؟
                                <br><span style="font-size: 14px; color:#666;">يُخصَّص لك الرقم تلقائيًا عند زيارة أي وحدة
                                    صحية عامة، مثل مركز صحي أو مستشفى، إذا كنت بحاجة إلى رعاية.
                                    <br> يمكنك أيضًا، إذا رغبت، طلب رقم مستخدم صحي من أي وحدة صحية عامة، حتى لو لم تكن بحاجة
                                    إلى رعاية.
                                </span>
                            </li>
                            <li> ما الذي تحتاجه للحصول على رقم مستخدم الخدمة الصحية الوطنية (SNS)؟
                                <br><span style="font-size: 14px; color:#666;">عند ذهابك إلى وحدة الصحة العامة، سوف تحتاج
                                    إلى تقديم المعلومات التالية:
                                    <br> اسم <br> الجنس <br> تاريخ الميلاد <br>
                                    بلد الجنسية <br>
                                    بلد الميلاد. <br>
                                    قد يُطلب منك معلومات أخرى، مثل عنوانك، ورقم هاتفك المحمول، وعنوان بريدك الإلكتروني،
                                    وغيرها.
                                </span>
                            </li>
                            <li>
                                <p>تغطية النفقات الصحية من قبل هيئة الخدمات الصحية الوطنية SNS</p>
                                <span style="font-size: 14px; color:#666;">امتلاك رقم مستخدم صحي وحده لا يضمن تغطية هيئة
                                    الخدمات الصحية الوطنية (SNS) لنفقات رعايتك الصحية. لكي تغطي هيئة الخدمات الصحية الوطنية
                                    نفقاتك،
                                    يجب أيضًا ربط البيانات التالية بتسجيل رقم المستخدم الصحي الخاص بك:<br>
                                    وثيقة الهوية<br> رقم التعريف الضريبي البرتغالي (NIF) <br>
                                    العنوان الكامل في البرتغال<br>
                                    تصريح إقامة ساري المفعول<br><br>
                                    وفي بعض الحالات التي ينص عليها القانون، يجوز تغطية نفقات الرعاية الصحية دون الحاجة إلى
                                    تقديم البيانات المذكورة أعلاه.</span>
                            </li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <script>
        function showTab(tabId) {
            const tabs = document.querySelectorAll('.tab');
            const contents = document.querySelectorAll('.tab-content');

            tabs.forEach(tab => tab.classList.remove('active'));
            contents.forEach(content => content.classList.remove('active'));

            document.querySelector(`.tab[onclick="showTab('${tabId}')"]`).classList.add('active');
            document.getElementById(tabId).classList.add('active');
        }
    </script>
    <script>
        document.querySelectorAll('.accordion-toggle').forEach(button => {
            button.addEventListener('click', () => {
                const content = button.nextElementSibling;
                content.style.display = (content.style.display === 'block') ? 'none' : 'block';
            });
        });
    </script>

    <style>
        .tab-content {
            display: none;
            padding: 1rem;
        }

        .noticias {
            display: flex;
            flex-wrap: wrap;
            list-style: none;
            justify-content: flex-start;
            padding: 2em 0em;
            margin-bottom: 3em;
        }

        .noticias-card {
            background-color: white;
            width: 21.25em;
            box-shadow: 0 5px 25px rgb(63 142 66 /15%);
            border-radius: 10px;
            padding: 15px;
            margin: 12px;
        }

        .noticias-card p {
            font-size: 16px;
            font-weight: bold;
            color: white;
            display: flex;
        }

        .tab-content.active {
            display: block;
        }

        .tab-content ul {
            list-style: none;
            padding: 0;
        }

        .tab-content li {
            margin-bottom: 0.75rem;
        }

        .relatorio {
            justify-content: right;
            padding: 12px;
        }

        .relatorio ul {
            padding-top: 2em;
        }

        .tab-content a {
            color: #3f8e42;
            text-decoration: none;
        }

        .tab-content a:hover {
            text-decoration: underline;
        }

        .accordion {
            padding-top: 1em;
            margin: 2em;
        }

        .accordion-item {
            border-bottom: 1px solid #add8ae;
            margin-bottom: 0.8em;
        }

        .accordion-item li {
            list-style-type: square;
        }

        .accordion-toggle {
            width: 100%;
            background: #dfe7df;
            border: none;
            text-align: right;
            padding: 0.8em 1em;
            font-size: 1em;
            cursor: pointer;
            font-weight: bold;
        }

        .descricao-inline {
            font-size: 0.8rem;
            color: #666;
            margin-left: 5px;
        }

        .accordion-toggle:hover {
            background: #d6e6d6;
        }

        .accordion-content {
            display: none;
            padding: 0.5em 1.5em;
            background: #fff;
        }

        .accordion-content a {
            font-size: 14px;
        }

        .accordion-content ul {}

        .accordion-content li {
            margin: 0.7em;
        }
    </style>
@endsection
