@extends('layouts.master')

@section('content')
    <section class="entidades" id="entidades">
        <h2>Entidades de Apoio na Beira Baixa</h2>
        <p>Abaixo encontras uma lista de instituições que oferecem apoio a imigrantes nas áreas de educação, trabalho,
            inclusão social e apoio jurídico.</p>
        <div class="tabs">
            <button class="tab active" onclick="showTab('educacao')">Educação</button>
            <button class="tab" onclick="showTab('emprego')">Emprego</button>
            <button class="tab" onclick="showTab('saude')">Saúde</button>
        </div>

        <div id="educacao" class="tab-content active">
            @foreach ($entidades['Educação'] ?? [] as $entidade)
                <div class="entidade-card">
                    <img src="{{ asset('storage/' . $entidade->imagem) }}" alt="Imagem de {{ $entidade->nome }}">
                    <h4>{{ $entidade->nome }}</h4>
                    <p><strong><i class="fa-solid fa-phone"></i> </strong> {{ $entidade->contacto }}</p>
                    <p><strong><i class="fa-solid fa-location-dot"></i> </strong> {{ $entidade->local }}</p>
                    <a href={{ $entidade->website }} style="color: #3f8e42;"> <strong> <i
                                class="fa-solid fa-earth-americas"></i> </strong> {{ $entidade->website }} </a>
                    <p><strong><i class="fa-solid fa-graduation-cap"></i></strong> {{ $entidade->descricao }}</p>
                </div>
            @endforeach
        </div>

        {{-- EMPREGO EM LISTA SIMPLES --}}
        <div id="emprego" class="tab-content">
            <ul class="lista-simples">
                @foreach ($entidades['Emprego'] ?? [] as $entidade)
                    <li>
                        <strong>{{ $entidade->nome }}</strong><br>
                        <i class="fa-solid fa-location-dot" style="color: #3f8e42"></i> {{ $entidade->local }}<br>
                        <i class="fa-solid fa-phone" style="color: #3f8e42"></i> {{ $entidade->contacto }}<br>
                        <i class="fa-solid fa-earth-americas" style="color: #3f8e42"></i> <a
                            href="{{ $entidade->website }}" target="_blank";
                            style="color: #3f8e42">{{ $entidade->website }}</a><br>
                        {{ $entidade->descricao }}
                    </li>
                @endforeach
            </ul>
        </div>

        {{-- SAÚDE EM LISTA SIMPLES --}}
        <div id="saude" class="tab-content">
            <ul class="lista-simples">
                @foreach ($entidades['Saúde'] ?? [] as $entidade)
                    <li>
                        <strong>{{ $entidade->nome }}</strong><br>
                        <i class="fa-solid fa-location-dot" style="color: #3f8e42"></i> {{ $entidade->local }}<br>
                        <i class="fa-solid fa-phone" style="color: #3f8e42"></i> {{ $entidade->contacto }}<br>
                        <i class="fa-solid fa-clock" style="color: #3f8e42"></i> {{ $entidade->descricao }}
                    </li>
                @endforeach
            </ul>
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
@endsection

