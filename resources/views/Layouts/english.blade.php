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
    <link rel="stylesheet" href="{{ asset('style.css') }}">
    <script src="scriptNav.js"></script>
    <title>SiDaI</title>
</head>


    <header>
        <h1>SiDaI</h1>
        <nav class="navigacao"  id="navMenu">
            <div class="nav-left">
                <a href="/ENhome" class="active"><i class="fa-solid fa-house"></i></a>
                <a href="/ENestatisticas">Statistics</a>
                <a href="/ENentidades">Entities</a>
                <a href="/ENrecursos">Resources</a>
                <a href="/ENabout">About Us</a>
                <a href="/ENcontacto">Contact</a>
            </div>
            <div class="nav-right">
                <div class="dropdown">
                    <a href="#" title="Idioma" class="dropdown-toggle">
                        <i class="fa-solid fa-globe"></i>
                    </a>
                    <div class="dropdown-menu">
                        <a href="home">Português</a>
                        <a href="ENhome">English</a>
                        <a href="ARhome">العربية</a>
                    </div>
                </div>
                @auth
                    <a href="{{ Auth::user()->role === 'admin' ? route('admin') : '#' }}"
                        style="color: white; margin: 0px 8px; display: flex; align-items: center; gap: 8px; text-decoration: none;">
                        <i class="fa-solid fa-user"></i>{{ Auth::user()->name }}
                    </a>
                    <form method="POST" action="{{ app()->getLocale() === 'en' ? route('ENlogout') : route('ENlogout') }}">
                        @csrf
                        <button type="submit" title="Logout"
                            style="background: none; border: none; cursor: pointer; color: white; font-size: 18px;">
                            <i class="fa-solid fa-right-from-bracket"></i>
                        </button>
                    </form>
                @endauth
                @guest
                    <a href="{{ route('ENlogin.form') }}" title="Login">
                        <i class="fa-solid fa-right-to-bracket"></i>
                    </a>

                    <a href="{{ route('ENregistar.form') }}" title="Register">
                        <i class="fa-solid fa-user-plus"></i>
                    </a>
                @endguest
            </div>
        </nav>
        <button class="menu-toggle" id="menuToggle" aria-label="Abrir menu">
            <i class="fa-solid fa-bars"></i>
        </button>
    </header>
    <body>
    <script>
        const menuToggle = document.getElementById('menuToggle');
        const navMenu = document.getElementById('navMenu');
    
        menuToggle.addEventListener('click', () => {
            navMenu.classList.toggle('active');
        });
    
        // Lógica para dropdown de idioma
        const langToggle = document.getElementById('langToggle');
        const langMenu = document.getElementById('langMenu');
    
        langToggle.addEventListener('click', (e) => {
            e.preventDefault(); // evita que clique no link suba a página
            langMenu.classList.toggle('active');
        });
    
        // Fechar dropdown se clicar fora
        document.addEventListener('click', function (event) {
            if (!langToggle.contains(event.target) && !langMenu.contains(event.target)) {
                langMenu.classList.remove('active');
            }
        });
        
    </script>



    @yield('english')

</body>
<footer>
    <p>Copyright &copy; 2025 SIDAI - Immigration Data System<br>
        All rights reserved</p>
</footer>

<style>
    footer {
        padding: 2em;
        text-align: center;
        background-color: #3f8e42;
    }

    footer p {
        font-size: 12px;
        color: white;
    }
    /* Mostra só em telas pequenas (ex: até 768px) */
@media (max-width: 768px) {
    .menu-toggle {
        display: block;
        background: none;
        border: none;
        font-size: 24px;
        color: white;
        position: absolute;
        top: 10px;
        right: 20px;
        z-index: 999;
    }

}

</style>
