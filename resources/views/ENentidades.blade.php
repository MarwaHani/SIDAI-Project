@extends('layouts.english')

@section('english')
    <section class="entidades" id="entidades">
        <h2>Entities in Beira Baixa</h2>
        <p>Below you will find a list of institutions that offer support to immigrants in the areas of education, work,
            social inclusion and legal support.</p>
        <div class="tabs">
            <button class="tab active" onclick="showTab('educacao')">Education</button>
            <button class="tab" onclick="showTab('emprego')">Job</button>
            <button class="tab" onclick="showTab('saude')">Health</button>
        </div>

        <div id="educacao" class="tab-content active">
            @foreach ($entities_en['Education'] ?? [] as $entidade)
                <div class="entidade-card">
                    <img src="{{ asset('storage/' . $entidade->img) }}" alt="Imagem de {{ $entidade->name }}">
                    <h4>{{ $entidade->name }}</h4>
                    <p><strong><i class="fa-solid fa-phone"></i> </strong> {{ $entidade->contact }}</p>
                    <p><strong><i class="fa-solid fa-location-dot"></i> </strong> {{ $entidade->local }}</p>
                    <a href={{ $entidade->website }} style="color: #3f8e42;"> <strong> <i
                                class="fa-solid fa-earth-americas"></i> </strong> {{ $entidade->website }} </a>
                    <p><strong><i class="fa-solid fa-graduation-cap"></i></strong> {{ $entidade->description }}</p>
                </div>
            @endforeach
        </div>
        <div id="emprego" class="tab-content">
            <ul class="lista-simples">
                @foreach ($entities_en['Job'] ?? [] as $entidade)
                    <li>
                        <strong>{{ $entidade->name }}</strong><br>
                        <i class="fa-solid fa-location-dot" style="color: #3f8e42"></i> {{ $entidade->local }}<br>
                        <i class="fa-solid fa-phone" style="color: #3f8e42"></i> {{ $entidade->contact }}<br>
                        <i class="fa-solid fa-earth-americas" style="color: #3f8e42"></i> <a
                            href="{{ $entidade->website }}" target="_blank";
                            style="color: #3f8e42">{{ $entidade->website }}</a><br>
                        {{ $entidade->description }}
                    </li>
                @endforeach
            </ul>
        </div>
        <div id="saude" class="tab-content">
            <ul class="lista-simples">
                @foreach ($entities_en['Health'] ?? [] as $entidade)
                    <li>
                        <strong>{{ $entidade->name }}</strong><br>
                        <i class="fa-solid fa-location-dot" style="color: #3f8e42"></i> {{ $entidade->local }}<br>
                        <i class="fa-solid fa-phone" style="color: #3f8e42"></i> {{ $entidade->contact }}<br>
                        <i class="fa-solid fa-clock" style="color: #3f8e42"></i> {{ $entidade->description }}
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
