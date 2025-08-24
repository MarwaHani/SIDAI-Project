@extends('Layouts.master')

@section('content')
    <!----------------------------------------------- Sobre ---------------------------------------------->
    <div class="sobre" id="sobre-nos">
        <h2>Sobre Nós</h2>
        <p>
            <strong>SiDaI </strong> – Sistema de Dados de Imigração é uma plataforma dedicada à coleta, organização e
            análise de dados sobre imigração,
            com foco específico na <strong>região da Beira Baixa</strong>, em Portugal.
        </p>

        <p>
            Este projeto nasceu da necessidade de compreender melhor os fluxos migratórios locais e oferecer ferramentas que
            apoiem a inclusão social, econômica e cultural dos imigrantes nesta região. Por meio do SiDaI, buscamos dar voz
            aos números, mas também às histórias e aos desafios enfrentados pelas comunidades migrantes.
        <p>
            Com base em fontes confiáveis ​​como <strong>INE</strong>, <strong>PORDATA</strong> e
            <strong>Gapminder</strong>, a plataforma permite visualizar e explorar dados estatísticos de forma intuitiva,
            por meio de gráficos interativos e tabelas personalizáveis.
            Também oferecemos opções de exportação em formatos como <strong>PDF</strong> e <strong>Excel</strong>.
        </p>

        <p>
            O SiDaI foi concebido para servir <strong>investigadores</strong>, <strong>autoridades locais</strong>,
            <strong>instituições sociais</strong> e <strong>cidadãos</strong> que queiram compreender melhor a realidade
            migratória da Beira Baixa, promovendo decisões mais informadas e políticas mais inclusivas.
        </p>

        <p>
            Acreditamos que o conhecimento é a base da inclusão. Junte-se a nós na construção de uma sociedade mais justa e
            informada.
        </p><br><br>
        <p>  ____________________________________________________</p>
    </div>
    <div class="fontes">
        <h3>Fontes de dados</h3>
        <p><br>Os dados apresentados no SiDaI são coletados e organizados com base em fontes oficiais e confiáveis. Entre
            elas:</p>
        <div class="fonte">
            <a href="https://www.ine.pt/xportal/xmain?xpid=INE&xpgid=ine_main" target="_blank" rel="noopener noreferrer">
                <div class="fonte-card">
                    <div class="fonte-image">

                        <img src="storage/imagens/ine.jpeg" />
                    </div>
                    <div class="fonte-info">
                        <p>Instituto Nacional de Estatística</p>
                    </div>
                </div>
            </a>
            <a href="https://www.pordata.pt/pt" target="_blank" rel="noopener noreferrer">
                <div class="fonte-card">
                    <div class="fonte-image">

                        <img src="storage/imagens/Pordata.jpg" />
                    </div>
                    <div class="fonte-info">
                        <p>PORDATA</p>
                    </div>
                </div>
            </a>
            <a href="https://www.gapminder.org/" target="_blank" rel="noopener noreferrer">
                <div class="fonte-card">
                    <div class="fonte-image">

                        <img src="storage/imagens/gap.png" />
                    </div>
                    <div class="fonte-info">
                        <p>Gapminder</p>
                    </div>
                </div>
            </a>
            <a href="https://www.dges.gov.pt/pt" target="_blank" rel="noopener noreferrer">
                <div class="fonte-card">
                    <div class="fonte-image">

                        <img src="dges.png" />
                    </div>
                    <div class="fonte-info">
                        <p>Direção-Geral do Ensino Superior</p>
                    </div>
                </div>
            </a>
            <a href="https://www.cm-castelobranco.pt/" target="_blank" rel="noopener noreferrer">
                <div class="fonte-card">
                    <div class="fonte-image">
                        <img src="cmcastelobranco.png" />
                    </div>
                    <div class="fonte-info">
                        <p>Câmara Municipal de Castelo Branco</p>
                    </div>
                </div>
            </a>
            <a href="https://www.sns24.gov.pt/pt/inicio" target="_blank" rel="noopener noreferrer">
                <div class="fonte-card">
                    <div class="fonte-image">
                        <img src="storage/imagens/sns.png" />
                    </div>
                    <div class="fonte-info">
                        <p>Serviço Nacional de Saúde SNS24</p>
                    </div>
                </div>
            </a>
        </div>
    </div>
@endsection
