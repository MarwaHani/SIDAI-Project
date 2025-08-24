@extends('Layouts.english')

@section('english')
    <!----------------------------------------------- Sobre ---------------------------------------------->
    <div class="sobre" id="sobre-nos">
        <h2>About Us</h2>
        <p>
            <strong>SiDaI – Immigration Data System</strong> is a platform dedicated to the collection, organization and
            analysis of data on immigration,
            with a specific focus on the <strong>Beira Baixa region</strong>, in Portugal.
        </p>

        <p>
            This project was born from the need to better understand local migration flows and to offer tools that support
            the social, economic and cultural inclusion of immigrants in this region. Through SiDaI, we aim to give voice to
            the numbers, but also to the stories and challenges faced by migrant communities.
        <p>
            Based on reliable sources such as <strong>INE</strong>, <strong>PORDATA</strong> and <strong>Gapminder</strong>,
            the platform allows you to view and explore statistical data intuitively, through interactive graphs and
            customizable tables.
            We also provide export options in formats such as <strong>PDF</strong> and <strong>Excel</strong>.
        </p>

        <p>
            SiDaI is designed to serve <strong>researchers</strong>, <strong>local authorities</strong>, <strong>social
                institutions</strong> and <strong>citizens</strong> who want to better understand the migratory reality of
            Beira Baixa, promoting more informed decisions and more inclusive policies.
        </p>

        <p>
            We believe that knowledge is the foundation for inclusion. Join us in building a more just and informed society.
        </p><br><br>
        <p> ____________________________________________________</p>
    </div>
    <div class="fontes">
        <h3>Data sources</h3>
        <p><br>The data presented in SiDaI are collected and organized based on official and reliable sources. Among them:
        </p>
        <div class="fonte">
            <a href="https://www.ine.pt/xportal/xmain?xpid=INE&xpgid=ine_main" target="_blank" rel="noopener noreferrer">
                <div class="fonte-card">
                    <div class="fonte-image">
                        <img src="storage/imagens/ine.jpeg" />
                    </div>
                    <div class="fonte-info">
                        <p>National Institute of Statistics</p>
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
                        <p>Directorate-General for Higher Education</p>
                    </div>
                </div>
            </a>
            <a href="https://www.cm-castelobranco.pt/" target="_blank" rel="noopener noreferrer">
                <div class="fonte-card">
                    <div class="fonte-image">
                        <img src="cmcastelobranco.png" />
                    </div>
                    <div class="fonte-info">
                        <p>Castelo Branco City Council</p>
                    </div>
                </div>
            </a>
            <a href="https://www.sns24.gov.pt/pt/inicio" target="_blank" rel="noopener noreferrer">
                <div class="fonte-card">
                    <div class="fonte-image">
                        <img src="storage/imagens/sns.png" />
                    </div>
                    <div class="fonte-info">
                        <p> National Health Service SNS24</p>
                    </div>
                </div>
            </a>
        </div>
    </div>
@endsection
