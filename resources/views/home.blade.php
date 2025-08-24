@extends('layouts.master')
@section('content')
    <!----------------------------------------------- Página Incial --------------------------------------------->
    <section class="main" id="pagina_incial">
        <div>
            <h2>SiDaI - Sistema de Dados de Imigração</h2>
            <p>Bem-vindo ao SiDaI! Explore estatísticas e recursos sobre imigração na região da Beira Baixa. <br>
                Este projeto visa promover a inclusão social e fornecer informação relevante a imigrantes, técnicos e
                instituições.</p>
        </div>
    </section>

    <section class="cards" id="services">
        <div class="highlights">
            <diV class="card">
                <div class="icon">
                    <i class="fa-solid fa-magnifying-glass-chart"></i>
                </div>
                <div class="info">
                    <h3>Estatísticas</h3>
                    <p>Visualize dados atualizados sobre imigração na região: nacionalidades, idades, áreas de atividade e
                        mais.</p>
                    <a href="/estatisticas" class="btn">Ver Estatísticas</a>
                </div>
            </div>
            <diV class="card">
                <div class="icon">
                    <i class="fa-solid fa-building-user"></i>
                </div>
                <div class="info">
                    <h3>Projetos e Instituições</h3>
                    <p>Conheça iniciativas e entidades que promovem o apoio e integração de imigrantes na sociedade.</p>
                    <a href="/entidades" class="btn">Explorar Projetos</a>
                </div>
            </div>
            <diV class="card">
                <div class="icon">
                    <i class="fa-solid fa-circle-info"></i>
                </div>
                <div class="info">
                    <h3>Informações Úteis</h3>
                    <p>Acesso a documentação, contactos e recursos para apoiar os imigrantes em várias áreas.</p>
                    <a href="/recursos" class="btn">Saber Mais</a>
                </div>
            </div>
            <diV class="card">
                <div class="icon">
                    <i class="fa-solid fa-circle-question"></i>
                </div>
                <div class="info">
                    <h3>Precisa de ajuda ou quer saber mais?</h3>
                    <p>Descubra como podemos apoiar ou entre em contacto com uma instituição local.</p>
                    <a href="/contacto" class="btn" style="margin-top: 1rem;">Contactar</a>
                </div>
            </div>
        </div>
    </section>
@endsection