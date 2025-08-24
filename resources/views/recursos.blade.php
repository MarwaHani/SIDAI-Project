@extends('layouts.master')

@section('content')
    <section class="recursos">
        <h2>Recursos</h2>

        <div class="tabs">
            <button class="tab active" onclick="showTab('destaque')">Em Destaque</button>
            <button class="tab" onclick="showTab('aprender')">Aprender Português</button>
            <button class="tab" onclick="showTab('apoio')">Recursos úteis</button>
        </div>

        {{-- Aba: Em Destaque --}}
        <div id="destaque" class="tab-content active">
            <p>Notícias em Destaque: </p>
            <div class="noticias">
                <div class="noticias-card"
                    style=" background: url(storage/documentos/n3.jpg); background-size: cover; background-position: center;">
                    <p>Governo reforça exigência nas leis de nacionalidade e residência</p>
                    <a href="https://www.portugal.gov.pt/pt/gc25/comunicacao/noticia?i=governo-reforma-exigencia-nas-leis-de-nacionalidade-e-residencia"
                        style=" color: white; padding-top:15px;"> Sabe mais <i style="font-size: 12px;"
                            class="fa-solid fa-arrow-up-right-from-square"></i></a>
                </div>
                <div
                    class="noticias-card"style=" background: url(storage/documentos/n1.png); background-size: cover; background-position: center;">
                    <p>Imigração regulada e humanista: Governo tem política migratória com controlo, dignidade e integração
                    </p>
                    <a href="https://www.portugal.gov.pt/pt/gc25/comunicacao/noticia?i=imigracao-regulada-e-humanista-governo-tem-politica-migratoria-com-controlo-dignidade-e-integracao"
                        style="color: white; padding-top:15px;"> Sabe mais <i style="font-size: 12px;"
                            class="fa-solid fa-arrow-up-right-from-square"></i></a>
                </div>
                <div class="noticias-card"
                    style=" background: url(storage/documentos/n2.jpeg); background-size: cover; background-position: center;">
                    <p>Imigrantes sabem agora nomes de funcionários da AIMA que aprovam e rejeitam processos</p>
                    <a href="https://www.publico.pt/2025/06/15/publico-brasil/noticia/imigrantes-sabem-nome-funcionarios-aima-aprovam-rejeitam-processos-2136722"
                        style=" color: white; padding-top:15px;"> Sabe mais <i style="font-size: 12px;"
                            class="fa-solid fa-arrow-up-right-from-square"></i></a>
                </div>
                <div class="noticias-card"
                    style=" background: url(storage/documentos/n4.jpeg); background-size: cover; background-position: center;">
                    <p>Relatório de caracterização da situação e dinâmica imigratória na Beira Baixa apresentado em
                        Penamacor revela um crescimento real da população no Concelho em 2023</p>
                    <a href="https://www.cm-penamacor.pt/autarquia/comunicacao/noticias/noticia/relatorio-de-caracterizacao-da-situacao-e-dinamica-imigratoria-na-beira-baixa-apresentado-em-penamacor-revela-um-crescimento-real-da-populacao-no-concelho-em-2023"
                        style=" color: white; padding-top:15px;"> Sabe mais <i style="font-size: 12px;"
                            class="fa-solid fa-arrow-up-right-from-square"></i></a>
                </div>
            </div>
            <div class="relatorio">
                <p>Consulta os dados migratórios mais recentes e relatórios prioritários.</p>
                <ul>
                    <li>
                        <a href="{{ asset('storage/documentos/relatorio_migracao_2023.pdf') }}" download>
                            Relatório De Migrações E Asilo 2023 <i style="font-size: 14px;"
                                class="fa-regular fa-file-pdf"></i>
                    </li>
                    <li>
                        <a href="https://www.consilium.europa.eu/pt/infographics/migration-flows-to-europe/">
                            Fluxos migratórios: rotas oriental, central e ocidental <i style="font-size: 12px;"
                                class="fa-solid fa-arrow-up-right-from-square"></i>
                        </a>
                    </li>
                    <li>

                    </li>
                </ul>
            </div>
        </div>

        <div id="aprender" class="tab-content">
            <p>Encontra aqui recursos gratuitos para aprender a língua portuguesa e facilitar a tua integração.</p>

            <div class="accordion">
                <div class="accordion-item">
                    <button class="accordion-toggle"><i class="fa-solid fa-graduation-cap"></i> Cursos Online Gratuitos
                    </button>
                    <div class="accordion-content">
                        <ul>
                            <li><a href="https://www.iefp.pt/programa-ppt-portugues-para-todos" target="_blank">IEFP –
                                    Português Língua de Acolhimento (PLA)</a>
                                <span class="descricao-inline">
                                    *Certificações com níveis linguísticos aceites em processos de nacionalidade, residência
                                    permanente ou longa duração.
                                </span>
                            </li>
                            <li><a href="https://www.speak.social/pt/" target="_blank">SPEAK – Aulas Online em grupos
                                    interativos</a></li>
                            <li><a href="https://www.hellotalk.com/" target="_blank">Hello Talk - Praticar com falantes
                                    nativos de Portugal por texto, áudio ou vídeo</a></li>
                            <li><a href="https://www.memrise.com/en/learn-portuguese" target="_blank">Memrise - APP</a></li>
                            <li><a href="https://pt.duolingo.com/" target="_blank">Duolingo – APP</a></li>
                            <li><a href="https://context.reverso.net/traducao/" target="_blank">Reverso Context – Traduções
                                    com frases reais</a></li>
                        </ul>
                    </div>
                </div>

                <div class="accordion-item">
                    <button class="accordion-toggle"><i class="fa-solid fa-book"></i> Materiais para Download</button>
                    <div class="accordion-content">
                        <ul>
                            <li><a href="{{ asset('storage/documentos/vocabulario_basico.pdf') }}" download><i
                                        class="fa-regular fa-file-pdf"></i> Vocabulário Básico em Português</a></li>
                            <li><a href="{{ asset('storage/documentos/frases_uteis.pdf') }}" download><i
                                        class="fa-regular fa-file-pdf"></i> Frases úteis no dia a dia </a></li>
                        </ul>
                    </div>
                </div>

                <div class="accordion-item">
                    <button class="accordion-toggle"><i class="fa-solid fa-headphones"></i> Vídeos e Aulas em Vídeo</button>
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
                    <button class="accordion-toggle">AIMA - Como obter o Título de Residência </button>
                    <div class="accordion-content">
                        <ul>
                            <li>Autorização de Residência (Regime e Requisitos Gerais) – Art.º 77.º, n.º 1
                                <a href="https://aima.gov.pt/pt/viver/autorizacao-de-residencia-regime-e-requisitos-gerais-art-o-77-o-n-o-1"
                                    target="_blank">
                                    <br> Clique aqui <i class="fa-solid fa-arrow-up-right-from-square"
                                        style="font-size: 12px"></i></a>
                            <li>Autorização de Residência Permanente – Art. 80.º
                                <a href="https://aima.gov.pt/pt/viver/autorizacao-de-residencia-permanente-art-80-o"
                                    target="_blank">
                                    <br>Clique aqui <i class="fa-solid fa-arrow-up-right-from-square"
                                        style="font-size: 12px"></i></a>
                            </li>
                            <li>Autorização de Residência para Imigrantes Empreendedores – “StartUP Visa” – Art. 89.º, n.º 4
                                <a href="https://aima.gov.pt/pt/viver/autorizacao-de-residencia-para-imigrantes-empreendedores-startup-visa-art-89-o-n-o-4"
                                    target="_blank">
                                    <br>Clique aqui <i class="fa-solid fa-arrow-up-right-from-square"
                                        style="font-size: 12px"></i> </a>
                            </li>
                            <li>Autorização de Residência para Investimento – Art. 90.º-A
                                <a href="https://aima.gov.pt/pt/viver/autorizacao-de-residencia-para-investimento-art-90-o-a"
                                    target="_blank">
                                    <br>Clique aqui <i class="fa-solid fa-arrow-up-right-from-square"
                                        style="font-size: 12px"></i></a>
                            </li>
                            <li>Autorização de Residência para Vítimas de Tráfico de Pessoas ou de Ação de Auxílio à
                                Imigração Ilegal – Art. 109.º
                                <a href="https://aima.gov.pt/pt/viver/autorizacao-de-residencia-para-vitimas-de-trafico-de-pessoas-ou-de-acao-de-auxilio-a-imigracao-ilegal-art-109-o"
                                    target="_blank">
                                    <br>Clique aqui <i class="fa-solid fa-arrow-up-right-from-square"
                                        style="font-size: 12px"></i></a>
                            </li>
                            <li>Autorização de Residência para Titulares do Estatuto de Residente de Longa Duração em Outro
                                Estado-Membro da União Europeia – Art. 116.º
                                <a href="https://aima.gov.pt/pt/viver/autorizacao-de-residencia-para-titulares-do-estatuto-de-residente-de-longa-duracao-em-outro-estado-membro-da-uniao-europeia-art-"
                                    target="_blank">
                                    <br>Clique aqui <i class="fa-solid fa-arrow-up-right-from-square"
                                        style="font-size: 12px"></i></a>
                            </li>
                            <li>Concessão de «Cartão Azul UE» e Autorização de Residência para Titulares de «Cartão Azul UE»
                                Noutro Estado-Membro – Art. 121.º-A e seguintes (Art. 121.º-B e 121.º-K)
                                <a href="https://aima.gov.pt/pt/viver/concessao-de-cartao-azul-ue-e-autorizacao-de-residencia-para-titulares-de-cartao-azul-ue-noutro-estado-membro-art-121-o-a-e-segu"
                                    target="_blank">
                                    <br>Clique aqui <i class="fa-solid fa-arrow-up-right-from-square"
                                        style="font-size: 12px"></i></a>
                            </li>
                            <li>Menores, filhos ou filhas de cidadãos estrangeiros titulares de Autorização de Residência,
                                nascidos ou nascidas em Portugal - Art. 122.º/1 al. a)
                                <a href="https://aima.gov.pt/pt/viver/menores-filhos-de-cidadaos-estrangeiros-titulares-de-autorizacao-de-residencia-nascidos-em-portugal-art-122-o-1-al-a"
                                    target="_blank">
                                    <br>Clique aqui <i class="fa-solid fa-arrow-up-right-from-square"
                                        style="font-size: 12px"></i></a>
                            </li>
                            <li>Menores, nascidos em Portugal, que aqui tenham permanecido e se encontrem a frequentar a
                                educação pré-escolar ou o ensino básico, secundário ou profissional – Art. 122.º/1 al. b)
                                <a href="https://aima.gov.pt/pt/viver/menores-nascidos-em-portugal-que-aqui-tenham-permanecido-e-se-encontrem-a-frequentar-a-educacao-pre-escolar-ou-o-ensino-basico-s"
                                    target="_blank">
                                    <br>Clique aqui <i class="fa-solid fa-arrow-up-right-from-square"
                                        style="font-size: 12px"></i></a>
                            </li>
                            <li>Filhos ou filhas de titulares de Autorização de Residência, que tenham atingido a maioridade
                                e tenham permanecido habitualmente em Portugal desde os 10 anos de idade – Art. 122.º/1 al.
                                c)
                                <a href="https://aima.gov.pt/pt/viver/filhos-ou-filhas-de-titulares-de-autorizacao-de-residencia-que-tenham-atingido-a-maioridade-e-tenham-permanecido-habitualmente-e"
                                    target="_blank">
                                    <br>Clique aqui <i class="fa-solid fa-arrow-up-right-from-square"
                                        style="font-size: 12px"></i></a>
                            </li>
                        </ul>
                    </div>
                </div>

                <div class="accordion-item">
                    <button class="accordion-toggle"> Segurança Social - Como obter o NISS </button>
                    <div class="accordion-content">
                        <ul>
                            <li> Segurança Social Direta
                                <br><span style="font-size: 14px; color:#666;">A <a
                                        href="https://app.seg-social.pt/sso/login?service=https%3A%2F%2Fapp.seg-social.pt%2Fptss%2Fcaslogin">
                                        Segurança Social Direta (SSD)</a> é um canal direto, rápido, eficaz, cómodo e seguro
                                    que permite às pessoas singulares e às empresas, através da internet, usufruir dos
                                    serviços da Segurança Social sem terem de se deslocar aos Serviços de Atendimento
                                    presencial da Segurança Social.
                                    O principal objetivo é facilitar e maximizar o relacionamento e a interação do cidadão e
                                    das empresas de forma a prestar um serviço funcional e de proximidade de acordo com as
                                    diversas necessidades.</span>
                                <a href="https://app.seg-social.pt/sso/login?service=https%3A%2F%2Fapp.seg-social.pt%2Fptss%2Fcaslogin"
                                    target="_blank"> Clique aqui <i class="fa-solid fa-arrow-up-right-from-square"
                                        style="font-size: 12px"></i></a>
                            </li>

                            <li> O que é o Número de Identificação de Segurança Social (NISS)?
                                <br><span style="font-size: 14px; color:#666;">O Número de Identificação de Segurança
                                    Social (NISS) é o número que permite uma identificação perante a Segurança Social,
                                    única, exata e rigorosa, a nível nacional.</span>
                            </li>
                            <li>Pedido de NISS
                                <a href="https://www.seg-social.pt/pedido-de-formulario-niss-cidadao-estrangeiro"
                                    target="_blank">
                                    <br> Clique aqui <i class="fa-solid fa-arrow-up-right-from-square"
                                        style="font-size: 12px"></i></a>
                        </ul>
                    </div>
                </div>

                <div class="accordion-item">
                    <button class="accordion-toggle"> Finanças - Como obter o NIF </button>
                    <div class="accordion-content">
                        <ul>
                            <li> Pedir o Número de Identificação Fiscal (NIF)
                                <br><span style="font-size: 14px; color:#666;">Uma pessoa estrangeira, residente ou não
                                    residente em Portugal, que trabalhe e pague impostos em Portugal tem de ter um Número de
                                    Identificação Fiscal (NIF).
                                    <br> No caso de crianças e jovens, o NIF é necessário para as despesas de saúde e
                                    educação, por exemplo, que os pais podem incluir na sua declaração de Imposto sobre o
                                    Rendimento das Pessoas Singulares (IRS).
                                </span>
                            </li>
                            <li> Como pedir o NIF

                                <p style="padding: 0.7em;"> nos <a
                                        href="https://info.portaldasfinancas.gov.pt/pt/dgci/contactos_servicos/enderecos_contactos/Pages/contactos.aspx">serviços
                                        das Finanças </a>
                                    - faça a marcação para o atendimento presencial através do Centro de Atendimento
                                    Telefónico (CAT) - 217 206 707, dias úteis, das 9h às 19h.</p>
                            </li>
                            <li>Portal das Finanças
                                <a href="https://www.portaldasfinancas.gov.pt/at/html/index.html" target="_blank">
                                    <br> Clique aqui <i class="fa-solid fa-arrow-up-right-from-square"
                                        style="font-size: 12px"></i></a>
                        </ul>
                    </div>
                </div>
                <div class="accordion-item">
                    <button class="accordion-toggle"> SNS - Como obter o número de utente do Serviço Nacional de Saúde
                    </button>
                    <div class="accordion-content">
                        <ul>
                            <li> Como obter o número de utente do Serviço Nacional de Saúde (SNS)?
                                <br><span style="font-size: 14px; color:#666;">O número é-lhe atribuído automaticamente
                                    quando se dirigir a uma unidade pública de saúde, como um centro de saúde ou hospital,
                                    se precisar de cuidados.
                                    <br> Se quiser, também pode pedir o número de utente de saúde, em qualquer unidade de
                                    saúde pública, mesmo sem precisar de cuidados.
                                </span>
                            </li>
                            <li> O que precisa para obter o número de utente do Serviço Nacional de Saúde (SNS)?
                                <br><span style="font-size: 14px; color:#666;">Quando se deslocar a uma unidade pública de
                                    saúde, vai precisar de indicar a seguinte informação:
                                    <br> Nome <br> Sexo <br> Data de nascimento <br>
                                    País de nacionalidade <br>
                                    País de naturalidade. <br>
                                    Podem-lhe ser pedidos outros dados, como a morada, o número de telemóvel, e-mail, entre
                                    outros.
                                </span>
                            </li>
                            <li>
                                <p>Cobertura de despesas de saúde por parte do SNS</p>
                                <span style="font-size: 14px; color:#666;">Ter número de utente de saúde por si só não
                                    garante a cobertura das despesas dos cuidados de saúde pelo SNS. Para que o SNS cubra as
                                    despesas,
                                    é preciso que, ao registo do seu número de utente de saúde, também estejam associados os
                                    seguintes dados:<br>
                                    Documento de identificação<br> Número de Identificação Fiscal (NIF) português <br>
                                    morada completa em Portugal<br>
                                    autorização de residência com validade<br><br>
                                    Em alguns casos previstos pela lei, pode cobrir as despesas de saúde sem ser preciso
                                    apresentar os dados anteriores.</span>
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
