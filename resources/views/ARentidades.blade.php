@extends('layouts.arabic')

@section('arabic')
    <section class="entidades" id="entidades">
        <h2>المراجع الحكومية في بيرا بايشا</h2>
        <p>ستجد أدناه قائمة بالمؤسسات التي تقدم الدعم للمهاجرين في مجالات التعليم والعمل والاندماج الاجتماعي والدعم
            القانوني.</p>
        <div class="tabs">
            <button class="tab active" onclick="showTab('educacao')">التعليم</button>
            <button class="tab" onclick="showTab('emprego')">العمل</button>
            <button class="tab" onclick="showTab('saude')">الصحة</button>
        </div>

        <div id="educacao" class="tab-content active">
            @foreach ($entities_ar['التعليم'] ?? [] as $entidade)
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
                @foreach ($entities_ar['العمل'] ?? [] as $entidade)
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
                @foreach ($entities_ar['الصحة'] ?? [] as $entidade)
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
