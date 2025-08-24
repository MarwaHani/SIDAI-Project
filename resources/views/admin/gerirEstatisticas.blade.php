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
    <section class="gerirEst">
        <a href="{{ route(name: 'admin') }}"
            style="display: flex; justify-content: left; text-align: left; color: #2e7d32; text-decoration: none;font-size: 30px;"><i
                class="fa-solid fa-arrow-left"></i></a>
        <h2>Gerir Estatísticas</h2>

        {{-- Formulário Adicionar --}}
        <form method="POST" action="{{ route('estatisticas.store') }}" class="form-adicionar">
            @csrf
            <select name="sexo"  placeholder="sexo" required>
                <option value="">sexo</option>
                <option value="Masculino">Masculino</option>
                <option value="Feminino">Feminino</option>
            </select>
            <input type="number" name="idade" placeholder="Idade" required>
            <input type="text" name="nacionalidade" placeholder="Nacionalidade" required>
            <input type="text" name="ano_chegada" placeholder="Ano Chegada" required>
            <input type="text" name="cidade_residencia" placeholder="Cidade" required>
            <input type="text" name="profissao" placeholder="Profissão" required>
            <input type="text" name="situacao_atual" placeholder="Situação Atual" required>
            <select name="nivel_academico" placeholder="Nível Académico" required>
                <option value="">Todas</option>
                <option value="Ensino Básico (9ºano)">Ensino Básico (9ºano)</option>
                <option value="Ensino Secundário (12ºano)">Ensino Secundário (12ºano)</option>
                <option value="Licenciatura">Licenciatura</option>
                <option value="Mestrado">Mestrado</option>
                <option value="Outro">Outro</option>
            </select>
            <button type="submit">Adicionar</button>
        </form>

        {{-- Tabela --}}
        <table class="tabela">
            <thead>
                <tr>
                    <th>Sexo</th>
                    <th>Idade</th>
                    <th>Nacionalidade</th>
                    <th>Ano Chegada</th>
                    <th>Cidade</th>
                    <th>Profissão</th>
                    <th>Situação</th>
                    <th>Nível Acad.</th>
                    <th>Ações</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($estatisticas as $e)
                    <tr data-id="{{ $e->id }}">
                        {{-- modo normal --}}
                        <td class="v-sexo">{{ $e->sexo }}</td>
                        <td class="v-idade">{{ $e->idade }}</td>
                        <td class="v-nacionalidade">{{ $e->nacionalidade }}</td>
                        <td class="v-ano">{{ $e->ano_chegada }}</td>
                        <td class="v-cidade">{{ $e->cidade_residencia }}</td>
                        <td class="v-prof">{{ $e->profissao }}</td>
                        <td class="v-sit">{{ $e->situacao_atual }}</td>
                        <td class="v-nivel">{{ $e->nivel_academico }}</td>
                        <td>
                            <button class="btn-editar">Editar</button>
                            <button class="btn-toggle">{{ $e->ativo ? 'Desativar' : 'Ativar' }}</button>
                            <button class="btn-guardar" style="display:none">Guardar</button>
                            <button class="btn-cancelar" style="display:none">Cancelar</button>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </section>
</body>
<style>
    .form-adicionar input,
    .form-adicionar button,
    .form-adicionar select {
        margin: 3px;
        padding: 4px;
        font-size: 12px;
    }

    .tabela {
        width: 100%;
        border-collapse: collapse;
        margin-top: 20px;
        font-size: 12px;
    }

    .tabela td,
    .tabela th {
        border: 1px solid #ccc;
        padding: 4px 6px;
        text-align: center;
    }
</style>

<script>
    document.querySelectorAll('.btn-editar').forEach(btn => {
        btn.addEventListener('click', () => {
            const tr = btn.closest('tr');
            // transformar TD em inputs
            ['sexo', 'idade', 'nacionalidade', 'ano', 'cidade', 'prof', 'sit', 'nivel'].forEach(cls => {
                const el = tr.querySelector('.v-' + cls);
                const val = el.textContent.trim();
                el.innerHTML = `<input value="${val}" style="width:90%">`;
            });
            tr.querySelector('.btn-editar').style.display = 'none';
            tr.querySelector('.btn-desativar').style.display = 'none';
            tr.querySelector('.btn-guardar').style.display = 'inline';
            tr.querySelector('.btn-cancelar').style.display = 'inline';
        });
    });

    document.querySelectorAll('.btn-cancelar').forEach(btn => {
        btn.addEventListener('click', () => {
            location.reload(); // cancelar simplesmente volta atrás
        });
    });

    document.querySelectorAll('.btn-guardar').forEach(btn => {
        btn.addEventListener('click', () => {
            const tr = btn.closest('tr');
            const id = tr.dataset.id;
            const dados = {};
            [
                ['sexo', 'sexo'],
                ['idade', 'idade'],
                ['nacionalidade', 'nacionalidade'],
                ['ano_chegada', 'ano'],
                ['cidade_residencia', 'cidade'],
                ['profissao', 'prof'],
                ['situacao_atual', 'sit'],
                ['nivel_academico', 'nivel']
            ].forEach(([field, cls]) => {
                dados[field] = tr.querySelector('.v-' + cls + ' input').value;
            });


            fetch(`/admin/estatisticas/${id}`, {
                method: 'PUT',
                headers: {
                    'X-CSRF-TOKEN': '{{ csrf_token() }}',
                    'Content-Type': 'application/json'
                },
                body: JSON.stringify(dados)
            }).then(r => location.reload());
        });
    });

    // Toggle ativo/inativo
    document.querySelectorAll('.btn-toggle').forEach(btn => {
        btn.addEventListener('click', () => {
            const tr = btn.closest('tr');
            const id = tr.dataset.id;
            fetch(`/admin/estatisticas/${id}/toggle`, {
                method: 'PATCH',
                headers: {
                    'X-CSRF-TOKEN': '{{ csrf_token() }}'
                }
            }).then(r => r.json()).then(resp => {
                if (resp.ativo === false) {
                    tr.style.display = 'none';
                }
            });
        });
    });
</script>

<style>
    .gerirEst {
        width: 100%;
        min-height: 100vh;
        padding-top: 6em;
    }

    .gerirEst h2 {
        text-align: center;
        justify-content: center;
        font-size: 24px;
        margin-bottom: 28px;
    }

    /* Formulário adicionar */
    .form-adicionar {
        display: flex;
        flex-wrap: wrap;
        gap: 0.5em;
        margin-bottom: 1em;
    }

    .form-adicionar input, select {
        padding: 4px 6px;
        font-size: 12px;
        border: 1px solid #ccc;
        border-radius: 4px;
    }

    .form-adicionar button {
        background-color: #38c172;
        color: #fff;
        border: none;
        border-radius: 6px;
        cursor: pointer;
        padding: 6px 12px;
        font-size: 12px;
    }

    /* Tabela */
    .tabela {
        width: 100%;
        border-collapse: collapse;
        font-size: 12px;
        margin-top: 10px;
    }

    .tabela th,
    .tabela td {
        border: 1px solid #ccc;
        padding: 4px 6px;
        text-align: center;
        white-space: nowrap;
    }

    .tabela th {
        background-color: #f8f9fa;
        font-weight: 600;
    }

    /* Botões de ação */
    .btn-editar,
    .btn-toggle,
    .btn-guardar,
    .btn-cancelar {
        margin: 2px;
        padding: 3px 8px;
        border: none;
        border-radius: 5px;
        cursor: pointer;
        font-size: 11px;
        color: white;
    }

    .btn-editar {
        background-color: #3490dc;
    }

    .btn-toggle {
        background-color: #e3342f;
    }

    .btn-guardar {
        background-color: #38c172;
    }

    .btn-cancelar {
        background-color: #6c757d;
    }

    @media (max-width: 768px) {
        .form-adicionar {
            flex-direction: column;
            font-size: 12px;
        }

        .form-adicionar input {
            width: 100%;
            font-size: 12px;
        }

        .tabela {
            width: 100%;
            overflow-x: auto;
            display: block;
            font-size: 12px;
        }
        .tabela th,td{
            font-size: 12px;
        }
    }
</style>
