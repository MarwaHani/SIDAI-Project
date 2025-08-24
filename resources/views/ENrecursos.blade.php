@extends('layouts.english')

@section('english')
    <section class="recursos">
        <h2>Resources</h2>

        <div class="tabs">
            <button class="tab active" onclick="showTab('destaque')">Featured</button>
            <button class="tab" onclick="showTab('aprender')">Learn Portuguese</button>
            <button class="tab" onclick="showTab('apoio')">Useful resources</button>
        </div>

        <div id="destaque" class="tab-content active">
            <p>Featured News: </p>
            <div class="noticias">
                <div class="noticias-card"
                    style=" background: url(storage/documentos/n3.jpg); background-size: cover; background-position: center;">
                    <p>Government strengthens requirements in nationality and residence laws</p>
                    <a href="https://www.portugal.gov.pt/pt/gc25/comunicacao/noticia?i=governo-reforma-exigencia-nas-leis-de-nacionalidade-e-residencia"
                        style=" color: white; padding-top:15px;"> Sabe mais <i style="font-size: 12px;"
                            class="fa-solid fa-arrow-up-right-from-square"></i></a>
                </div>
                <div
                    class="noticias-card"style=" background: url(storage/documentos/n1.png); background-size: cover; background-position: center;">
                    <p>Regulated and humanistic immigration: Government has a migration policy with control, dignity and
                        integration</p>
                    <a href="https://www.portugal.gov.pt/pt/gc25/comunicacao/noticia?i=imigracao-regulada-e-humanista-governo-tem-politica-migratoria-com-controlo-dignidade-e-integracao"
                        style="color: white; padding-top:15px;"> Sabe mais <i style="font-size: 12px;"
                            class="fa-solid fa-arrow-up-right-from-square"></i></a>
                </div>
                <div class="noticias-card"
                    style=" background: url(storage/documentos/n2.jpeg); background-size: cover; background-position: center;">
                    <p>Immigrants now know the names of AIMA employees who approve and reject applications</p>
                    <a href="https://www.publico.pt/2025/06/15/publico-brasil/noticia/imigrantes-sabem-nome-funcionarios-aima-aprovam-rejeitam-processos-2136722"
                        style=" color: white; padding-top:15px;"> Sabe mais <i style="font-size: 12px;"
                            class="fa-solid fa-arrow-up-right-from-square"></i></a>
                </div>
                <div class="noticias-card"
                    style=" background: url(storage/documentos/n4.jpeg); background-size: cover; background-position: center;">
                    <p>Report characterizing the situation and immigration dynamics in Beira Baixa presented in Penamacor
                        reveals real population growth in the municipality in 2023</p>
                    <a href="https://www.cm-penamacor.pt/autarquia/comunicacao/noticias/noticia/relatorio-de-caracterizacao-da-situacao-e-dinamica-imigratoria-na-beira-baixa-apresentado-em-penamacor-revela-um-crescimento-real-da-populacao-no-concelho-em-2023"
                        style=" color: white; padding-top:15px;"> Sabe mais <i style="font-size: 12px;"
                            class="fa-solid fa-arrow-up-right-from-square"></i></a>
                </div>
            </div>
            <div class="relatorio">
                <p>Consult the latest migration data and priority reports.</p>
                <ul>
                    <li>
                        <a href="{{ asset('storage/documentos/relatorio_migracao_2023.pdf') }}" download>
                            Migration and Asylum Report 2023 <i style="font-size: 14px;" class="fa-regular fa-file-pdf"></i>
                    </li>
                    <li>
                        <a href="https://www.consilium.europa.eu/pt/infographics/migration-flows-to-europe/">
                            Migration flows: eastern, central and western routes <i style="font-size: 12px;"
                                class="fa-solid fa-arrow-up-right-from-square"></i>
                        </a>
                    </li>
                    <li>

                    </li>
                </ul>
            </div>
        </div>

        <div id="aprender" class="tab-content">
            <p>Find free resources here to learn the Portuguese language and facilitate your integration.</p>

            <div class="accordion">
                <div class="accordion-item">
                    <button class="accordion-toggle"><i class="fa-solid fa-graduation-cap"></i> Free Online Courses
                    </button>
                    <div class="accordion-content">
                        <ul>
                            <li><a href="https://www.iefp.pt/programa-ppt-portugues-para-todos" target="_blank">IEFP –
                                    Portuguese as a Host Language (PLA)</a>
                                <span class="descricao-inline">
                                    *Certifications with language levels accepted in nationality, permanent or long-term
                                    residence processes.
                                </span>
                            </li>
                            <li><a href="https://www.speak.social/pt/" target="_blank">SPEAK – Online classes in interactive
                                    groups</a></li>
                            <li><a href="https://www.hellotalk.com/" target="_blank">Hello Talk - Practice with native
                                    speakers from Portugal via text, audio or video</a></li>
                            <li><a href="https://www.memrise.com/en/learn-portuguese" target="_blank">Memrise - APP</a></li>
                            <li><a href="https://pt.duolingo.com/" target="_blank">Duolingo – APP</a></li>
                            <li><a href="https://context.reverso.net/traducao/" target="_blank">Reverso Context –
                                    Translations with real sentences</a></li>
                        </ul>
                    </div>
                </div>

                <div class="accordion-item">
                    <button class="accordion-toggle"><i class="fa-solid fa-book"></i> Downloadable Materials</button>
                    <div class="accordion-content">
                        <ul>
                            <li><a href="{{ asset('storage/documentos/vocabulario_basico.pdf') }}" download><i
                                        class="fa-regular fa-file-pdf"></i> Basic Vocabulary in Portuguese</a></li>
                            <li><a href="{{ asset('storage/documentos/frases_uteis.pdf') }}" download><i
                                        class="fa-regular fa-file-pdf"></i> Useful phrases for everyday life </a></li>
                        </ul>
                    </div>
                </div>

                <div class="accordion-item">
                    <button class="accordion-toggle"><i class="fa-solid fa-headphones"></i> Videos and Video
                        Classes</button>
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

        <div id="apoio" class="tab-content">
            <div class="accordion">
                <div class="accordion-item">
                    <button class="accordion-toggle">AIMA - How to obtain a Residence Permit </button>
                    <div class="accordion-content">
                        <ul>
                            <li>Residence Permit (General Regime and Requirements) – Art. 77, No. 1
                                <a href="https://aima.gov.pt/pt/viver/autorizacao-de-residencia-regime-e-requisitos-gerais-art-o-77-o-n-o-1"
                                    target="_blank">
                                    <br> Click here <i class="fa-solid fa-arrow-up-right-from-square"
                                        style="font-size: 12px"></i></a>
                            <li>Permanent Residence Permit – Art. 80
                                <a href="https://aima.gov.pt/pt/viver/autorizacao-de-residencia-permanente-art-80-o"
                                    target="_blank">
                                    <br>Click here <i class="fa-solid fa-arrow-up-right-from-square"
                                        style="font-size: 12px"></i></a>
                            </li>
                            <li>Residence Permit for Entrepreneurial Immigrants – “StartUP Visa” – Art. 89, No. 4
                                <a href="https://aima.gov.pt/pt/viver/autorizacao-de-residencia-para-imigrantes-empreendedores-startup-visa-art-89-o-n-o-4"
                                    target="_blank">
                                    <br>Click here <i class="fa-solid fa-arrow-up-right-from-square"
                                        style="font-size: 12px"></i> </a>
                            </li>
                            <li>Residence Permit for Investment – ​​Art. 90.º-A
                                <a href="https://aima.gov.pt/pt/viver/autorizacao-de-residencia-para-investimento-art-90-o-a"
                                    target="_blank">
                                    <br>Click here<i class="fa-solid fa-arrow-up-right-from-square"
                                        style="font-size: 12px"></i></a>
                            </li>
                            <li>Residence Permit for Victims of Human Trafficking or Illegal Immigration Assistance Action –
                                Art. 109
                                <a href="https://aima.gov.pt/pt/viver/autorizacao-de-residencia-para-vitimas-de-trafico-de-pessoas-ou-de-acao-de-auxilio-a-imigracao-ilegal-art-109-o"
                                    target="_blank">
                                    <br>Click here <i class="fa-solid fa-arrow-up-right-from-square"
                                        style="font-size: 12px"></i></a>
                            </li>
                            <li>Residence Permit for Holders of Long-Term Resident Status in Another Member State of the
                                European Union – Art. 116
                                <a href="https://aima.gov.pt/pt/viver/autorizacao-de-residencia-para-titulares-do-estatuto-de-residente-de-longa-duracao-em-outro-estado-membro-da-uniao-europeia-art-"
                                    target="_blank">
                                    <br>Click here <i class="fa-solid fa-arrow-up-right-from-square"
                                        style="font-size: 12px"></i></a>
                            </li>
                            <li>Granting of an “EU Blue Card” and Residence Permit to Holders of an “EU Blue Card” in
                                Another Member State – Art. 121-A et seq. (Art. 121-B and 121-K)
                                <a href="https://aima.gov.pt/pt/viver/concessao-de-cartao-azul-ue-e-autorizacao-de-residencia-para-titulares-de-cartao-azul-ue-noutro-estado-membro-art-121-o-a-e-segu"
                                    target="_blank">
                                    <br>Click here <i class="fa-solid fa-arrow-up-right-from-square"
                                        style="font-size: 12px"></i></a>
                            </li>
                            <li>Minors, sons or daughters of foreign citizens holding a Residence Permit, born in Portugal -
                                Art. 122.º/1 al. a)
                                <a href="https://aima.gov.pt/pt/viver/menores-filhos-de-cidadaos-estrangeiros-titulares-de-autorizacao-de-residencia-nascidos-em-portugal-art-122-o-1-al-a"
                                    target="_blank">
                                    <br>Click here <i class="fa-solid fa-arrow-up-right-from-square"
                                        style="font-size: 12px"></i></a>
                            </li>
                            <li>Minors born in Portugal who have remained here and are attending pre-school education or
                                primary, secondary or vocational education – Art. 122.º/1 al. b)
                                <a href="https://aima.gov.pt/pt/viver/menores-nascidos-em-portugal-que-aqui-tenham-permanecido-e-se-encontrem-a-frequentar-a-educacao-pre-escolar-ou-o-ensino-basico-s"
                                    target="_blank">
                                    <br>Click here <i class="fa-solid fa-arrow-up-right-from-square"
                                        style="font-size: 12px"></i></a>
                            </li>
                            <li>Sons or daughters of holders of a Residence Permit, who have reached the age of majority and
                                have habitually resided in Portugal since the age of 10 – Art. 122.º/1 al. c)
                                <a href="https://aima.gov.pt/pt/viver/filhos-ou-filhas-de-titulares-de-autorizacao-de-residencia-que-tenham-atingido-a-maioridade-e-tenham-permanecido-habitualmente-e"
                                    target="_blank">
                                    <br>Click here <i class="fa-solid fa-arrow-up-right-from-square"
                                        style="font-size: 12px"></i></a>
                            </li>
                        </ul>
                    </div>
                </div>

                <div class="accordion-item">
                    <button class="accordion-toggle"> Social Security - How to obtain the NISS </button>
                    <div class="accordion-content">
                        <ul>
                            <li> Direct Social Security
                                <br><span style="font-size: 14px; color:#666;">The <a
                                        href="https://app.seg-social.pt/sso/login?service=https%3A%2F%2Fapp.seg-social.pt%2Fptss%2Fcaslogin">
                                        Social Security Direct (SSD)</a> is a direct, fast, efficient, convenient and secure
                                    channel that allows individuals and companies to use Social Security services online
                                    without having to go to the Social Security Service Center in person.
                                    The main objective is to facilitate and maximize the relationship and interaction
                                    between citizens and companies in order to provide a functional and local service
                                    according to different needs.</span>
                                <a href="https://app.seg-social.pt/sso/login?service=https%3A%2F%2Fapp.seg-social.pt%2Fptss%2Fcaslogin"
                                    target="_blank"> Click here <i class="fa-solid fa-arrow-up-right-from-square"
                                        style="font-size: 12px"></i></a>
                            </li>

                            <li> What is a Social Security Identification Number (NISS)?
                                <br><span style="font-size: 14px; color:#666;">The Social Security Identification Number
                                    (NISS) is the number that allows for unique, accurate and rigorous identification before
                                    Social Security at a national level.</span>
                            </li>
                            <li>NISS Request
                                <a href="https://www.seg-social.pt/pedido-de-formulario-niss-cidadao-estrangeiro"
                                    target="_blank">
                                    <br> Click here <i class="fa-solid fa-arrow-up-right-from-square"
                                        style="font-size: 12px"></i></a>
                        </ul>
                    </div>
                </div>

                <div class="accordion-item">
                    <button class="accordion-toggle"> Finance - How to obtain a NIF </button>
                    <div class="accordion-content">
                        <ul>
                            <li> Request a Tax Identification Number (NIF)
                                <br><span style="font-size: 14px; color:#666;">A foreign person, resident or non-resident
                                    in Portugal, who works and pays taxes in Portugal must have a Tax Identification Number
                                    (NIF).
                                    <br> In the case of children and young people, the NIF is necessary for health and
                                    education expenses, for example, which parents can include in their Personal Income Tax
                                    (IRS) declaration.
                                </span>
                            </li>
                            <li> How to request a NIF

                                <p style="padding: 0.7em;"> nos <a
                                        href="https://info.portaldasfinancas.gov.pt/pt/dgci/contactos_servicos/enderecos_contactos/Pages/contactos.aspx">Finance
                                        services </a>
                                    - make an appointment for in-person service through the Telephone Service Center (CAT) -
                                    217 206 707, weekdays, from 9 am to 7 pm.</p>
                            </li>
                            <li>Finance Portal
                                <a href="https://www.portaldasfinancas.gov.pt/at/html/index.html" target="_blank">
                                    <br> Click here <i class="fa-solid fa-arrow-up-right-from-square"
                                        style="font-size: 12px"></i></a>
                        </ul>
                    </div>
                </div>
                <div class="accordion-item">
                    <button class="accordion-toggle"> SNS - How to obtain your National Health Service user number
                    </button>
                    <div class="accordion-content">
                        <ul>
                            <li> How do I obtain my National Health Service (SNS) user number?
                                <br><span style="font-size: 14px; color:#666;">The number is automatically assigned to you
                                    when you go to a public health facility, such as a health center or hospital, if you
                                    need care.
                                    <br> If you wish, you can also request a health user number at any public health unit,
                                    even if you do not need care.
                                </span>
                            </li>
                            <li> What do you need to obtain a National Health Service (SNS) user number?
                                <br><span style="font-size: 14px; color:#666;">When you go to a public health unit, you
                                    will need to provide the following information:
                                    <br> Name <br> Gender <br> Date of birtho <br>
                                    Country of nationality <br>
                                    Country of birth. <br>
                                    You may be asked for other information, such as your address, mobile phone number, email
                                    address, among others.
                                </span>
                            </li>
                            <li>
                                <p>Coverage of health expenses by the SNS</p>
                                <span style="font-size: 14px; color:#666;">Having a health user number alone does not
                                    guarantee that your health care expenses will be covered by the SNS. In order for the
                                    SNS to cover your expenses, the following data must also be associated with your health
                                    user number:<br>
                                    Identification document<br> Portuguese Tax Identification Number (NIF)<br>
                                    Full address in Portugal<br>
                                    Valid residence permit<br><br>
                                    In some cases provided for by law, you can cover your health care expenses without
                                    having to provide the above data.</span>
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
            justify-content: left;
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
            text-align: left;
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
