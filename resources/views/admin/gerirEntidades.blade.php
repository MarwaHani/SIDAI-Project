<!DOCTYPE html>
<html lang="pt">

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
    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/chartjs-plugin-datalabels@2"></script>
    <title>SiDaI</title>
</head>

<body>
    <section class="entidades" id="entidades">
        <a href="{{ route('admin') }}"
            style="display: flex; justify-content: left; text-align: left; color: #2e7d32; text-decoration: none;font-size: 30px;"><i
                class="fa-solid fa-arrow-left"></i></a>
        <h2>Gerir Entidades</h2>
        {{-- Formulário para criar nova entidade --}}
        <div class="criar-entidade-form"
            style="margin-bottom: 2rem; border: 1px solid #ccc; padding: 1rem; border-radius: 10px;">
            <form action="{{ route('admin.gerirEntidades.store') }}" method="POST" enctype="multipart/form-data">
                @csrf
                <h4>Nova Entidade</h4>
                <input type="text" name="nome" placeholder="Nome" required>
                <input type="text" name="contacto" placeholder="Contacto" required>
                <input type="text" name="local" placeholder="Localização" required>
                <input type="url" name="website" placeholder="Website">
                <textarea name="descricao" placeholder="Descrição"></textarea>
                <select name="categoria" required>
                    <option value="">Escolhe a categoria</option>
                    <option value="Educação">Educação</option>
                    <option value="Emprego">Emprego</option>
                    <option value="Saúde">Saúde</option>
                </select>
                <input type="file" name="imagem" id="imagem" accept="image/*">
                <img id="preview-imagem" src="#" alt="Prévia da imagem"
                    style="display:none; max-width: 150px; margin-top: 10px; border-radius: 6px;">
                <button type="submit">Criar</button>
            </form>
        </div>

        {{-- Abas --}}
        <div class="tabs">
            <button class="tab active" onclick="showTab('educacao')">Educação</button>
            <button class="tab" onclick="showTab('emprego')">Emprego</button>
            <button class="tab" onclick="showTab('saude')">Saúde</button>
        </div>
        {{-- EDUCAÇÃO --}}
        <div id="educacao" class="tab-content active">
            @foreach ($entidades['Educação'] ?? [] as $entidade)
                <div class="entidade-card">
                    <div class="entidade-view" id="view-{{ $entidade->id_entidade }}">
                        @if ($entidade->imagem)
                            <img src="{{ asset('storage/' . $entidade->imagem) }}" alt="Imagem de {{ $entidade->nome }}"
                                style="max-width: 150px; max-height: 150px;">
                        @endif
                        <p><strong>Nome:</strong> {{ $entidade->nome }}</p>
                        <p><strong>Contacto:</strong> {{ $entidade->contacto }}</p>
                        <p><strong>Local:</strong> {{ $entidade->local }}</p>
                        <p><strong>Website:</strong> <a href="{{ $entidade->website }}"
                                target="_blank">{{ $entidade->website }}</a></p>
                        <p><strong>Descrição:</strong> {{ $entidade->descricao }}</p>
                        <p><strong>Categoria:</strong> {{ $entidade->categoria }}</p>

                        <button onclick="toggleEdit({{ $entidade->id_entidade }})">Editar</button>

                        <form method="POST" action="{{ route('admin.gerirEntidades.toggle', $entidade->id_entidade) }}" style="display:inline;">
                            @csrf
                            @method('PATCH')
                            <p><strong>Status:</strong>
                                @if ($entidade->ativo)
                                    <span style="color: green; font-weight: bold;">Ativa</span>
                                @else
                                    <span style="color: red; font-weight: bold;">Inativa</span>
                                @endif
                            </p> 
                            <button onclick="return confirm('{{ $entidade->ativo ? 'Desativar' : 'Ativar' }} esta entidade?')"
                                style="background-color: {{ $entidade->ativo ? '#dc3545' : '#28a745' }}; color: white; padding: 5px 10px; border: none; border-radius: 5px;">
                                {{ $entidade->ativo ? 'Desativar' : 'Ativar' }}
                            </button>
                        </form>                        
                    </div>

                    <div class="entidade-edit" id="edit-{{ $entidade->id_entidade }}" style="display: none;">
                        <form action="{{ route('admin.gerirEntidades.update', $entidade->id_entidade) }}"
                            method="POST" enctype="multipart/form-data">
                            @csrf
                            @method('PUT')

                            <input type="text" name="nome" value="{{ $entidade->nome }}" required>
                            <input type="text" name="contacto" value="{{ $entidade->contacto }}" required>
                            <input type="text" name="local" value="{{ $entidade->local }}" required>
                            <input type="url" name="website" value="{{ $entidade->website }}">
                            <textarea name="descricao">{{ $entidade->descricao }}</textarea>

                            <select name="categoria" required>
                                <option value="Educação" @selected($entidade->categoria === 'Educação')>Educação</option>
                                <option value="Emprego" @selected($entidade->categoria === 'Emprego')>Emprego</option>
                                <option value="Saúde" @selected($entidade->categoria === 'Saúde')>Saúde</option>
                            </select>

                            <input type="file" name="imagem">

                            <button type="submit">Guardar</button>
                            <button type="button"
                                onclick="toggleEdit({{ $entidade->id_entidade }})">Cancelar</button>
                        </form>
                    </div>
                </div>
            @endforeach
        </div>

        {{-- EMPREGO --}}
        <div id="emprego" class="tab-content">
            @foreach ($entidades['Emprego'] ?? [] as $entidade)
                <div class="entidade-card">
                    <div class="entidade-view" id="view-{{ $entidade->id_entidade }}">
                        @if ($entidade->imagem)
                            <img src="{{ asset('storage/imagens/' . $entidade->imagem) }}"
                                alt="Imagem de {{ $entidade->nome }}" style="max-width: 150px; max-height: 150px;">
                        @endif
                        <p><strong>Nome:</strong> {{ $entidade->nome }}</p>
                        <p><strong>Contacto:</strong> {{ $entidade->contacto }}</p>
                        <p><strong>Local:</strong> {{ $entidade->local }}</p>
                        <p><strong>Website:</strong> <a href="{{ $entidade->website }}"
                                target="_blank">{{ $entidade->website }}</a></p>
                        <p><strong>Descrição:</strong> {{ $entidade->descricao }}</p>
                        <p><strong>Categoria:</strong> {{ $entidade->categoria }}</p>

                        <button onclick="toggleEdit({{ $entidade->id_entidade }})">Editar</button>

                        <form method="POST" action="{{ route('admin.gerirEntidades.toggle', $entidade->id_entidade) }}" style="display:inline;">
                            @csrf
                            @method('PATCH')
                            <p><strong>Status:</strong>
                                @if ($entidade->ativo)
                                    <span style="color: green; font-weight: bold;">Ativa</span>
                                @else
                                    <span style="color: red; font-weight: bold;">Inativa</span>
                                @endif
                            </p> 
                            <button onclick="return confirm('{{ $entidade->ativo ? 'Desativar' : 'Ativar' }} esta entidade?')"
                                style="background-color: {{ $entidade->ativo ? '#dc3545' : '#28a745' }}; color: white; padding: 5px 10px; border: none; border-radius: 5px;">
                                {{ $entidade->ativo ? 'Desativar' : 'Ativar' }}
                            </button>
                        </form>                        
                    </div>

                    <div class="entidade-edit" id="edit-{{ $entidade->id_entidade }}" style="display: none;">
                        <form action="{{ route('admin.gerirEntidades.update', $entidade->id_entidade) }}"
                            method="POST" enctype="multipart/form-data">
                            @csrf
                            @method('PUT')

                            <input type="text" name="nome" value="{{ $entidade->nome }}" required>
                            <input type="text" name="contacto" value="{{ $entidade->contacto }}" required>
                            <input type="text" name="local" value="{{ $entidade->local }}" required>
                            <input type="url" name="website" value="{{ $entidade->website }}">
                            <textarea name="descricao">{{ $entidade->descricao }}</textarea>

                            <select name="categoria" required>
                                <option value="Educação" @selected($entidade->categoria === 'Educação')>Educação</option>
                                <option value="Emprego" @selected($entidade->categoria === 'Emprego')>Emprego</option>
                                <option value="Saúde" @selected($entidade->categoria === 'Saúde')>Saúde</option>
                            </select>

                            <input type="file" name="imagem">

                            <button type="submit">Guardar</button>
                            <button type="button"
                                onclick="toggleEdit({{ $entidade->id_entidade }})">Cancelar</button>
                        </form>
                    </div>
                </div>
            @endforeach
        </div>

        {{-- SAÚDE --}}
        <div id="saude" class="tab-content">
            @foreach ($entidades['Saúde'] ?? [] as $entidade)
                <div class="entidade-card">
                    <div class="entidade-view" id="view-{{ $entidade->id_entidade }}">
                        @if ($entidade->imagem)
                            <img src="{{ asset('storage/imagens/' . $entidade->imagem) }}"
                                alt="Imagem de {{ $entidade->nome }}" style="max-width: 150px; max-height: 150px;">
                        @endif
                        <p><strong>Nome:</strong> {{ $entidade->nome }}</p>
                        <p><strong>Contacto:</strong> {{ $entidade->contacto }}</p>
                        <p><strong>Local:</strong> {{ $entidade->local }}</p>
                        <p><strong>Website:</strong> <a href="{{ $entidade->website }}"
                                target="_blank">{{ $entidade->website }}</a></p>
                        <p><strong>Descrição:</strong> {{ $entidade->descricao }}</p>
                        <p><strong>Categoria:</strong> {{ $entidade->categoria }}</p>

                        <button onclick="toggleEdit({{ $entidade->id_entidade }})">Editar</button>

                        <form method="POST" action="{{ route('admin.gerirEntidades.toggle', $entidade->id_entidade) }}" style="display:inline;">
                            @csrf
                            @method('PATCH')
                            <p><strong>Status:</strong>
                                @if ($entidade->ativo)
                                    <span style="color: green; font-weight: bold;">Ativa</span>
                                @else
                                    <span style="color: red; font-weight: bold;">Inativa</span>
                                @endif
                            </p>                            
                            <button onclick="return confirm('{{ $entidade->ativo ? 'Desativar' : 'Ativar' }} esta entidade?')"
                                style="background-color: {{ $entidade->ativo ? '#dc3545' : '#28a745' }}; color: white; padding: 5px 10px; border: none; border-radius: 5px;">
                                {{ $entidade->ativo ? 'Desativar' : 'Ativar' }}
                            </button>
                        </form>                        
                    </div>

                    <div class="entidade-edit" id="edit-{{ $entidade->id_entidade }}" style="display: none;">
                        <form action="{{ route('admin.gerirEntidades.update', $entidade->id_entidade) }}"
                            method="POST" enctype="multipart/form-data">
                            @csrf
                            @method('PUT')

                            <input type="text" name="nome" value="{{ $entidade->nome }}" required>
                            <input type="text" name="contacto" value="{{ $entidade->contacto }}" required>
                            <input type="text" name="local" value="{{ $entidade->local }}" required>
                            <input type="url" name="website" value="{{ $entidade->website }}">
                            <textarea name="descricao">{{ $entidade->descricao }}</textarea>

                            <select name="categoria" required>
                                <option value="Educação" @selected($entidade->categoria === 'Educação')>Educação</option>
                                <option value="Emprego" @selected($entidade->categoria === 'Emprego')>Emprego</option>
                                <option value="Saúde" @selected($entidade->categoria === 'Saúde')>Saúde</option>
                            </select>

                            <input type="file" name="imagem">

                            <button type="submit">Guardar</button>
                            <button type="button"
                                onclick="toggleEdit({{ $entidade->id_entidade }})">Cancelar</button>
                        </form>
                    </div>
                </div>
            @endforeach
        </div>


        <script>
            function showTab(tabId) {
                document.querySelectorAll('.tab').forEach(tab => tab.classList.remove('active'));
                document.querySelectorAll('.tab-content').forEach(content => content.classList.remove('active'));

                document.querySelector(`.tab[onclick="showTab('${tabId}')"]`).classList.add('active');
                document.getElementById(tabId).classList.add('active');
            }
        </script>

        <script>
            function toggleEdit(id) {
                const viewDiv = document.getElementById(`view-${id}`);
                const editDiv = document.getElementById(`edit-${id}`);

                if (viewDiv.style.display === 'none') {
                    viewDiv.style.display = 'block';
                    editDiv.style.display = 'none';
                } else {
                    viewDiv.style.display = 'none';
                    editDiv.style.display = 'block';
                }
            }
        </script>
        <script>
            const inputImagem = document.getElementById('imagem');
            const preview = document.getElementById('preview-imagem');

            inputImagem.addEventListener('change', function() {
                const file = this.files[0];
                if (file) {
                    const reader = new FileReader();

                    reader.onload = function(e) {
                        preview.setAttribute('src', e.target.result);
                        preview.style.display = 'block';
                    }

                    reader.readAsDataURL(file);
                } else {
                    preview.setAttribute('src', '#');
                    preview.style.display = 'none';
                }
            });
        </script>



        <style>
            .entidades {
                width: 100%;
                min-height: 100vh;
            }

            .entidades h2 {
                text-align: center;
                font-size: 24px;
                margin-bottom: 2rem;
            }

            .tabs {
                display: flex;
                border-bottom: 2px solid #ccc;
                margin-bottom: 1rem;
                gap: 1rem;
                justify-content: center;
            }

            .tab {
                padding: 0.5em 1em;
                cursor: pointer;
                background: none;
                border: none;
                border-bottom: 3px solid transparent;
                font-weight: bold;
                font-size: 1rem;
            }

            .tab.active {
                border-bottom: 3px solid #3f8e42;
                color: #3f8e42;
            }

            /* Conteúdo das tabs */
            .tab-content {
                display: none;
                animation: fadeIn 0.3s ease-in-out;
            }

            .tab-content.active {
                display: flex;
                flex-wrap: wrap;
                gap: 1.5rem;
                justify-content: flex-start;
            }

            /* Cartão da entidade com formulários */
            .entidade-card {
                background: #f9f9f9;
                border: 1px solid #ddd;
                padding: 1em;
                border-radius: 8px;
                width: calc(25% - 1.5rem);
                box-sizing: border-box;
            }

            .entidade-card form {
                display: flex;
                flex-direction: column;
                gap: 0.5rem;
            }

            .entidade-card input[type="text"],
            .entidade-card input[type="url"],
            .entidade-card input[type="file"],
            .entidade-card textarea,
            .entidade-card select {
                width: 100%;
                padding: 0.5rem;
                border: 1px solid #ccc;
                border-radius: 6px;
                font-size: 12px;
            }

            .entidade-card button {
                padding: 0.5rem;
                background-color: #3f8e42;
                color: white;
                border: none;
                border-radius: 6px;
                cursor: pointer;
            }

            .entidade-card button:hover {
                background-color: #2c6b2f;
            }

            /* Formulário de criar nova entidade */
            .criar-entidade-form form {
                display: flex;
                flex-direction: column;
                gap: 0.7rem;
                max-width: 700px;
                margin: 0 auto;
            }

            .entidade-card img {
                width: 50%;
                /* Tamanho fixo pequeno */
                height: auto;
                object-fit: cover;
                /* Mantém proporção, preenche sem distorcer */
                margin-bottom: 0.5rem;
                display: block;
                margin-left: auto;
                margin-right: auto;
            }

            .criar-entidade-form input[type="text"],
            .criar-entidade-form input[type="url"],
            .criar-entidade-form input[type="file"],
            .criar-entidade-form textarea,
            .criar-entidade-form select {
                padding: 0.6rem;
                border: 1px solid #ccc;
                border-radius: 6px;
                font-size: 1rem;
            }

            .criar-entidade-form button {
                width: fit-content;
                align-self: flex-end;
                background-color: #3f8e42;
                color: white;
                border: none;
                padding: 0.6rem 1.2rem;
                border-radius: 6px;
                cursor: pointer;
            }

            .criar-entidade-form button:hover {
                background-color: #2c6b2f;
            }

            /* Animação */
            @keyframes fadeIn {
                from {
                    opacity: 0;
                    transform: translateY(10px);
                }

                to {
                    opacity: 1;
                    transform: translateY(0);
                }
            }

            /* Responsivo */
            @media (max-width: 768px) {
                .entidade-card {
                    width: 100%;
                }

                .tabs {
                    flex-direction: column;
                    align-items: center;
                }
            }
        </style>
