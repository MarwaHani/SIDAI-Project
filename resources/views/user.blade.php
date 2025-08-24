<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <!--Font awesome Icons-->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    <script src="https://kit.fontawesome.com/7bb2c0d808.js" crossorigin="anonymous"></script>
    <!-- Fonte Poppins-->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <!-- Google Web Fonts -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link
        href="https://fonts.googleapis.com/css2?family=Berkshire+Swash&family=Comfortaa:wght@300..700&family=IBM+Plex+Serif:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;1,100;1,200;1,300;1,400;1,500;1,600;1,700&family=Inconsolata:wght@200..900&family=M+PLUS+Rounded+1c:wght@700&family=Noto+Naskh+Arabic:wght@400;500;600&family=Noto+Sans+Arabic:wght@400;500;600;700&family=Overpass:ital,wght@0,100..900;1,100..900&family=Poppins:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,100;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900&display=swap"
        rel="stylesheet">
    <link rel="stylesheet" href="style.css">
    <script src="scriptNav.js"></script>
    <title>SiDaI</title>
</head>

<body>
    <header>

        <h1>SiDaI</h1>
        <nav class="navigacao">
            <div class="nav-left">
                <a href="/home" class="active"><i class="fa-solid fa-house"></i></a>
                <a href="/estatisticas">Estatísticas</a>
                <a href="/entidades">Entidades</a>
                <a href="/recursos">Recursos</a>
                <a href="/about">Sobre Nós</a>
                <a href="/contacto">Contacto</a>
            </div>

            <!-- Itens à direita: idioma e login -->
            <div class="nav-right">
                <div class="dropdown">
                    <a href="#" title="Idioma" class="dropdown-toggle">
                        <i class="fa-solid fa-globe"></i>
                    </a>
                    <div class="dropdown-menu">
                        <a href="home">Português</a>
                        <a href="ENhome">English</a>
                        <a href="arhome">العربية</a>
                    </div>
                </div>


                <span style="color: white; margin: 0px 10px; display: flex; align-items: center; gap: 8px;"><i
                        class="fa-solid fa-user"></i>{{ Auth::user()->name }}</span>
                <form class="logout-form" method="POST" action="{{ route('logout') }}">
                    @csrf
                    <a href="/home" title="logout">
                        <i class="fa-solid fa-right-from-bracket"></i>
                    </a>
                </form>
            </div>
        </nav>
    </header>

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
                    <p>Visualize dados atualizados sobre imigração na região: nacionalidades, idades, áreas de atividade
                        e mais.</p>
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
                    <a href="/projetos" class="btn">Explorar Projetos</a>
                </div>
            </div>
            <diV class="card">
                <div class="icon">
                    <i class="fa-solid fa-circle-info"></i>
                </div>
                <div class="info">
                    <h3>Informações Úteis</h3>
                    <p>Acesso a documentação, contactos e recursos para apoiar os imigrantes em várias áreas.</p>
                    <a href="/documentacao" class="btn">Saber Mais</a>
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




</body>
