@extends('layouts.english')
@section('english')
    <!----------------------------------------------- Página Incial --------------------------------------------->
    <section class="main" id="pagina_incial">
        <div>
            <h2>SiDaI - Immigration Data System</h2>
            <p>Welcome to SiDaI! Explore immigration statistics and resources in the Beira Baixa region. <br>
                This project aims to promote social inclusion and provide relevant information to immigrants, technicians
                and institutions.</p>
        </div>
    </section>
    <section class="cards" id="services">
        <div class="highlights">
            <diV class="card">
                <div class="icon">
                    <i class="fa-solid fa-magnifying-glass-chart"></i>
                </div>
                <div class="info">
                    <h3>Statistics</h3>
                    <p>View up-to-date data on immigration in the region: nationalities, ages, areas of activity and more.
                    </p>
                    <a href="/ENestatisticas" class="btn">View Statistics</a>
                </div>
            </div>
            <diV class="card">
                <div class="icon">
                    <i class="fa-solid fa-building-user"></i>
                </div>
                <div class="info">
                    <h3>Projects and Institutions</h3>
                    <p>Learn about initiatives and entities that promote the support and integration of immigrants into
                        society.</p>
                    <a href="/ENentidades" class="btn">Explore Projects</a>
                </div>
            </div>
            <diV class="card">
                <div class="icon">
                    <i class="fa-solid fa-circle-info"></i>
                </div>
                <div class="info">
                    <h3>Useful Information</h3>
                    <p>Access to documentation, contacts and resources to support immigrants in various areas.</p>
                    <a href="/ENrecursos" class="btn">Learn More</a>
                </div>
            </div>
            <diV class="card">
                <div class="icon">
                    <i class="fa-solid fa-circle-question"></i>
                </div>
                <div class="info">
                    <h3>Need help or want to know more?</h3>
                    <p>Find out how we can support you or get in touch with a local charity.</p>
                    <a href="/ENcontacto" class="btn" style="margin-top: 1rem;">Contact</a>
                </div>
            </div>
        </div>
    </section>
@endsection
