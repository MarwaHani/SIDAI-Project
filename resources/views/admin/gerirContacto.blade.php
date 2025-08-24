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
    <section class="gerirmensagens">
        <a href="{{ route(name: 'admin') }}"
            style="display: flex; justify-content: left; text-align: left; color: #2e7d32; text-decoration: none;font-size: 30px; margin-bottom: 2em;"><i
                class="fa-solid fa-arrow-left"></i></a>

        <div class="container mt-5">
            <div class="mensagens-alerta">
                <i class="fa-solid fa-envelope text-danger"></i>
                <span class="badge bg-danger">{{ $novasMensagens }} novas mensagens</span>
            </div>

            <h2 class="mb-4">Mensagens de Contacto</h2>

            <div style="max-width: 300px; margin-bottom: 2rem;">
                <canvas id="graficoMensagens"></canvas>
            </div>

            <table class="tabela-contactos">
                <thead>
                    <tr>
                        <th>Nome</th>
                        <th>Email</th>
                        <th>Assunto</th>
                        <th>Mensagem</th>
                        <th>Estado</th>
                        <th>Ações</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($mensagens as $mensagem)
                        <tr>
                            <td>{{ $mensagem->nome }}</td>
                            <td>{{ $mensagem->email }}</td>
                            <td>{{ $mensagem->assunto }}</td>
                            <td>{{ Str::limit($mensagem->mensagem, 40) }}</td>
                            <td>
                                @if ($mensagem->respondido)
                                    <span class="estado respondida">Respondida</span>
                                @else
                                    <span class="estado nao-respondida">Não Respondida</span>
                                @endif
                            </td>
                            <td>
                                <button class="botao-ver" onclick="abrirModal({{ $mensagem->id }})">Ver</button>
                                <a href="{{ route('admin.gerirContacto.responder', $mensagem->id) }}"
                                    class="botao-responder">Responder</a>
                                <form method="POST" action="{{ route('admin.gerirContacto.toggle', $mensagem->id) }}"
                                    style="display:inline;">
                                    @csrf
                                    @method('PATCH')
                                    <button
                                        onclick="return confirm('{{ $mensagem->ativo ? 'Desativar' : 'Ativar' }} esta mensagem?')"
                                        class="botao-apagar"
                                        style="background-color: {{ $mensagem->ativo ? '#dc3545' : '#28a745' }};">
                                        {{ $mensagem->ativo ? 'Desativar' : 'Ativar' }}
                                    </button>
                                </form>
                            </td>
                        </tr>

                        <div id="mensagem-completa-{{ $mensagem->id }}" style="display:none;">
                            <h3>{{ $mensagem->assunto }}</h3>
                            <p><strong>Nome:</strong> {{ $mensagem->nome }}</p>
                            <p><strong>Email:</strong> {{ $mensagem->email }}</p>
                            <p><strong>Mensagem:</strong></p>
                            <p>{!! nl2br(e($mensagem->mensagem)) !!}</p>
                        </div>
                    @endforeach
                </tbody>
            </table>
        </div>
    </section>

    <script>
        const ctx = document.getElementById('graficoMensagens').getContext('2d');
        new Chart(ctx, {
            type: 'doughnut',
            data: {
                labels: ['Respondidas', 'Não Respondidas'],
                datasets: [{
                    data: [{{ $respondidas }}, {{ $naoRespondidas }}],
                    backgroundColor: ['#28a745', '#dc3545'],
                    borderWidth: 1
                }]
            }
        });
    </script>
    <script>
        function abrirModal(id) {
            const conteudo = document.getElementById('mensagem-completa-' + id).innerHTML;
            document.getElementById('conteudoModal').innerHTML = conteudo;
            document.getElementById('modalMensagem').style.display = 'flex';
        }

        function fecharModal() {
            document.getElementById('modalMensagem').style.display = 'none';
        }
    </script>

    <!-- Modal -->
    <div id="modalMensagem" class="modal" style="display:none;">
        <div class="modal-content">
            <span class="fechar-modal" onclick="fecharModal()">&times;</span>
            <div id="conteudoModal"></div>
        </div>
    </div>
</body>
<style>
    .modal {
        position: fixed;
        z-index: 1000;
        left: 0;
        top: 0;
        width: 100%;
        height: 100%;
        background-color: rgba(0, 0, 0, 0.5);
        display: flex;
        align-items: center;
        justify-content: center;
    }

    .modal-content {
        background: white;
        padding: 20px;
        border-radius: 8px;
        width: 500px;
        max-width: 90%;
        position: relative;
    }

    .fechar-modal {
        position: absolute;
        top: 10px;
        right: 15px;
        font-size: 24px;
        cursor: pointer;
    }
</style>
