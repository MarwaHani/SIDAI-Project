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
    <!-- Toast de Notificação -->
    <div id="toast" class="toast"></div>

    <script>
        function showToast(message, type = 'success') {
            const toast = document.getElementById('toast');
            toast.textContent = message;
            toast.className = `toast show ${type}`;
            setTimeout(() => {
                toast.className = toast.className.replace('show', '');
            }, 2000);
        }

        @if (session('success'))
            showToast("{{ session('success') }}", 'success');
        @endif

        @if (session('delete_success'))
            showToast("{{ session('delete_success') }}", 'danger');
        @endif
    </script>
    <section class="geriruser">
        <a href="{{ route(name: 'admin') }}"
            style="display: flex; justify-content: left; text-align: left; color: #2e7d32; text-decoration: none;font-size: 30px;"><i
                class="fa-solid fa-arrow-left"></i></a>

        <div class="container">
            <h2 class="title">Gestão de Utilizadores</h2>

            <!-- Botão para abrir modal -->
            <button class="btn-add" onclick="document.getElementById('modal').style.display='block'">+ Adicionar
                Utilizador</button>

            <!-- Modal -->
            <div id="modal" class="modal" @if (session('create_success') || $errors->any()) style="display: block;" @endif>
                <div class="modal-content">
                    <span class="close" onclick="document.getElementById('modal').style.display='none'">&times;</span>
                    <h3>Adicionar Novo Utilizador</h3>
                    @if ($errors->any())
                        <div
                            style="background: #f8d7da; color: #721c24; padding: 10px; border-radius: 5px; margin-bottom: 10px;">
                            <ul style="margin: 0; padding-left: 20px;">
                                @foreach ($errors->all() as $error)
                                    <li>{{ $error }}</li>
                                @endforeach
                            </ul>
                        </div>
                    @endif
                    <form action="{{ route('admin.gerirUser.store') }}" method="POST">
                        @csrf
                        <input type="text" name="name" placeholder="Nome completo *" required>
                        <input type="email" name="email" placeholder="Email *" required>
                        <select name="sexo *" required>
                            <option value="">Sexo</option>
                            <option value="Masculino">Masculino</option>
                            <option value="Feminino">Feminino</option>
                        </select>
                        <input type="date" name="data_nascimento *" required>
                        <input type="text" name="telemovel" placeholder="Telemóvel">
                        <select name="pais" id="select-pais">
                            <option value="">País</option>
                            <option value="Abecásia">Abecásia</option>
                            <option value="Afeganistão">Afeganistão</option>
                            <option value="África do Sul">África do Sul</option>
                            <option value="Albânia">Albânia</option>
                            <option value="Alemanha">Alemanha</option>
                            <option value="Andorra">Andorra</option>
                            <option value="Angola">Angola</option>
                            <option value="Antígua e Barbuda">Antígua e Barbuda</option>
                            <option value="Arábia Saudita">Arábia Saudita</option>
                            <option value="Argélia">Argélia</option>
                            <option value="Argentina">Argentina</option>
                            <option value="Armênia">Armênia</option>
                            <option value="Austrália">Austrália</option>
                            <option value="Áustria">Áustria</option>
                            <option value="Azerbaijão">Azerbaijão</option>
                            <option value="Bahamas">Bahamas</option>
                            <option value="Bahrein ">Bahrein </option>
                            <option value="Bangladesh">Bangladesh</option>
                            <option value="Barbados">Barbados</option>
                            <option value="Bélgica">Bélgica</option>
                            <option value="Belize">Belize</option>
                            <option value="Benim">Benim</option>
                            <option value="Bielorrússia">Bielorrússia</option>
                            <option value="Bolívia">Bolívia</option>
                            <option value="Bósnia e Herzegovina">Bósnia e Herzegovina</option>
                            <option value="Botsuana">Botsuana</option>
                            <option value="Brasil">Brasil</option>
                            <option value="Brunei">Brunei</option>
                            <option value="Bulgária">Bulgária</option>
                            <option value="Burkina Faso">Burkina Faso</option>
                            <option value="Burundi">Burundi</option>
                            <option value="Butão">Butão</option>
                            <option value="Cabo Verde">Cabo Verde</option>
                            <option value="Camarões">Camarões</option>
                            <option value="Camboja">Camboja</option>
                            <option value="Canadá">Canadá</option>
                            <option value="Cazaquistão">Cazaquistão</option>
                            <option value="Chade">Chade</option>
                            <option value="Chile">Chile</option>
                            <option value="China">China</option>
                            <option value="Chipre">Chipre</option>
                            <option value="Singapura">Singapura</option>
                            <option value="Colômbia">Colômbia</option>
                            <option value="Comores">Comores</option>
                            <option value="Congo">Congo</option>
                            <option value="Coreia do Norte">Coreia do Norte</option>
                            <option value="Coreia do Sul">Coreia do Sul</option>
                            <option value="Costa do Marfim">Costa do Marfim</option>
                            <option value="Costa Rica">Costa Rica</option>
                            <option value="Croácia">Croácia</option>
                            <option value="Cuba">Cuba</option>
                            <option value="Dinamarca">Dinamarca</option>
                            <option value="Djibouti">Djibouti</option>
                            <option value="Dominica">Dominica</option>
                            <option value="Egito">Egito</option>
                            <option value="El Salvador">El Salvador</option>
                            <option value="Emirados Árabes Unidos">Emirados Árabes Unidos</option>
                            <option value="Equador">Equador</option>
                            <option value="Eritreia">Eritreia</option>
                            <option value="Escócia">Escócia</option>
                            <option value="Eslováquia">Eslováquia</option>
                            <option value="Eslovênia">Eslovênia</option>
                            <option value="Espanha">Espanha</option>
                            <option value="Estados Federados da Micronésia">Estados Federados da Micronésia</option>
                            <option value="Estados Unidos da América">Estados Unidos da América</option>
                            <option value="Estônia">Estônia</option>
                            <option value="Eswatini">Eswatini</option>
                            <option value="Etiópia">Etiópia</option>
                            <option value="Fiji">Fiji</option>
                            <option value="Filipinas">Filipinas</option>
                            <option value="Finlândia">Finlândia</option>
                            <option value="França">França</option>
                            <option value="Gabão">Gabão</option>
                            <option value="Gâmbia">Gâmbia</option>
                            <option value="Gana">Gana</option>
                            <option value="Geórgia">Geórgia</option>
                            <option value="Granada">Granada</option>
                            <option value="Grécia">Grécia</option>
                            <option value="Guatemala">Guatemala</option>
                            <option value="Guiana">Guiana</option>
                            <option value="Guiné">Guiné</option>
                            <option value="Guiné-Bissau">Guiné-Bissau</option>
                            <option value="Guiné Equatorial">Guiné Equatorial</option>
                            <option value="Haiti">Haiti</option>
                            <option value="Holanda">Holanda</option>
                            <option value="Honduras">Honduras</option>
                            <option value="Hungria">Hungria</option>
                            <option value="Iêmen">Iêmen</option>
                            <option value="Índia">Índia</option>
                            <option value="Indonésia">Indonésia</option>
                            <option value="Inglaterra">Inglaterra</option>
                            <option value="Irão">Irão</option>
                            <option value="Iraque">Iraque</option>
                            <option value="Irlanda do Norte">Irlanda do Norte</option>
                            <option value="Irlanda">Irlanda</option>
                            <option value="Islândia">Islândia</option>
                            <option value="Itália">Itália</option>
                            <option value="Jamaica">Jamaica</option>
                            <option value="Japão">Japão</option>
                            <option value="Jordânia">Jordânia</option>
                            <option value="Kiribati">Kiribati</option>
                            <option value="Kosovo">Kosovo</option>
                            <option value="Kuwait">Kuwait</option>
                            <option value="Laos">Laos</option>
                            <option value="Lesoto">Lesoto</option>
                            <option value="Letônia">Letônia</option>
                            <option value="Líbano">Líbano</option>
                            <option value="Libéria">Libéria</option>
                            <option value="Líbia">Líbia</option>
                            <option value="Liechtenstein">Liechtenstein</option>
                            <option value="Lituânia">Lituânia</option>
                            <option value="Luxemburgo">Luxemburgo</option>
                            <option value="Macedônia do Norte">Macedônia do Norte</option>
                            <option value="Madagascar">Madagascar</option>
                            <option value="Malásia">Malásia</option>
                            <option value="Malawi">Malawi</option>
                            <option value="Maldivas">Maldivas</option>
                            <option value="Mali">Mali</option>
                            <option value="Malta">Malta</option>
                            <option value="Marrocos">Marrocos</option>
                            <option value="Marshall">Marshall</option>
                            <option value="Maurícia">Maurícia</option>
                            <option value="Mauritânia">Mauritânia</option>
                            <option value="México">México</option>
                            <option value="Mianmar">Mianmar</option>
                            <option value="Micronésia">Micronésia</option>
                            <option value="Moçambique">Moçambique</option>
                            <option value="Moldávia">Moldávia</option>
                            <option value="Mônaco">Mônaco</option>
                            <option value="Mongólia">Mongólia</option>
                            <option value="Montenegro">Montenegro</option>
                            <option value="Namíbia">Namíbia</option>
                            <option value="Nauru">Nauru</option>
                            <option value="Nepal">Nepal</option>
                            <option value="Nicarágua">Nicarágua</option>
                            <option value="Níger">Níger</option>
                            <option value="Nigéria">Nigéria</option>
                            <option value="Noruega">Noruega</option>
                            <option value="Nova Zelândia">Nova Zelândia</option>
                            <option value="Omã">Omã</option>
                            <option value="Ossétia do Sul">Ossétia do Sul</option>
                            <option value="País de Gales">País de Gales</option>
                            <option value="Países Baixos">Países Baixos</option>
                            <option value="Palau">Palau</option>
                            <option value="Palestina">Palestina</option>
                            <option value="Panamá">Panamá</option>
                            <option value="Papua-Nova Guiné">Papua-Nova Guiné</option>
                            <option value="Paquistão">Paquistão</option>
                            <option value="Paraguai">Paraguai</option>
                            <option value="Peru">Peru</option>
                            <option value="Polônia">Polônia</option>
                            <option value="Portugal">Portugal</option>
                            <option value="Qatar">Qatar</option>
                            <option value="Quênia">Quênia</option>
                            <option value="Quirguistão">Quirguistão</option>
                            <option value="Quiribati">Quiribati</option>
                            <option value="Reino Unido">Reino Unido</option>
                            <option value="República Árabe Saaraui Democrática">República Árabe Saaraui Democrática
                            </option>
                            <option value="República Centro-Africana">República Centro-Africana</option>
                            <option value="República Democrática do Congo">República Democrática do Congo</option>
                            <option value="República do Congo">República do Congo</option>
                            <option value="República Dominicana">República Dominicana</option>
                            <option value="República Tcheca">República Tcheca</option>
                            <option value="República Turca de Chipre do Norte">República Turca de Chipre do Norte
                            </option>
                            <option value="Romênia">Romênia</option>
                            <option value="Ruanda">Ruanda</option>
                            <option value="Rússia">Rússia</option>
                            <option value="Salomão">Salomão</option>
                            <option value="Samoa">Samoa</option>
                            <option value="San Marino">San Marino</option>
                            <option value="Santa Lúcia">Santa Lúcia</option>
                            <option value="São Cristóvão e Névis">São Cristóvão e Névis</option>
                            <option value="São Tomé e Príncipe">São Tomé e Príncipe</option>
                            <option value="São Vicente e Granadinas">São Vicente e Granadinas</option>
                            <option value="Senegal">Senegal</option>
                            <option value="Serra Leoa">Serra Leoa</option>
                            <option value="Sérvia">Sérvia</option>
                            <option value="Seychelles">Seychelles</option>
                            <option value="Singapura">Singapura</option>
                            <option value="Síria">Síria</option>
                            <option value="Somália">Somália</option>
                            <option value="Sri Lanka">Sri Lanka</option>
                            <option value="Suazilândia">Suazilândia</option>
                            <option value="Sudão do Sul">Sudão do Sul</option>
                            <option value="Sudão">Sudão</option>
                            <option value="Suécia">Suécia</option>
                            <option value="Suíça">Suíça</option>
                            <option value="Suriname">Suriname</option>
                            <option value="Tailândia">Tailândia</option>
                            <option value="Taiwan">Taiwan</option>
                            <option value="Tajiquistão">Tajiquistão</option>
                            <option value="Tanzânia">Tanzânia</option>
                            <option value="Tchéquia">Tchéquia</option>
                            <option value="Timor-Leste">Timor-Leste</option>
                            <option value="Togo">Togo</option>
                            <option value="Tonga">Tonga</option>
                            <option value="Trinidad e Tobago">Trinidad e Tobago</option>
                            <option value="Tunísia">Tunísia</option>
                            <option value="Turcomenistão">Turcomenistão</option>
                            <option value="Turquia">Turquia</option>
                            <option value="Tuvalu">Tuvalu</option>
                            <option value="Ucrânia">Ucrânia</option>
                            <option value="Uganda">Uganda</option>
                            <option value="Uruguai">Uruguai</option>
                            <option value="Uzbequistão">Uzbequistão</option>
                            <option value="Vanuatu">Vanuatu</option>
                            <option value="Vaticano">Vaticano</option>
                            <option value="Venezuela">Venezuela</option>
                            <option value="Vietnã">Vietnã</option>
                            <option value="Zâmbia">Zâmbia</option>
                            <option value="Zimbábue">Zimbábue</option>
                        </select>
                        <input type="password" name="password" placeholder="Palavra-passe *" required>
                        <input type="password" name="password_confirmation" placeholder="Confirmar Palavra-passe"
                            required>
                        <input type="submit" value="Adicionar" class="btn-submit">
                    </form>
                </div>
            </div>

            <!-- Tabela de utilizadores -->
            <table class="user-table">
                <thead>
                    <tr>
                        <th>Nome</th>
                        <th>Email</th>
                        <th>Sexo</th>
                        <th>Idade</th>
                        <th>Telemóvel</th>
                        <th>País</th>
                        <th>Ações</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($users as $user)
                        <tr>
                            <td>{{ $user->name }}</td>
                            <td>{{ $user->email }}</td>
                            <td>{{ $user->sexo }}</td>
                            <td>
                                @if ($user->data_nascimento)
                                    {{ \Carbon\Carbon::parse($user->data_nascimento)->age }} anos
                                @else
                                    -
                                @endif
                            </td>
                            <td>{{ $user->telemovel ?? '-' }}</td>
                            <td>{{ $user->pais ?? '-' }}</td>
                            <td>
                                @if ($user->ativo)
                                    <span style="color: green; font-weight: bold;">Ativo</span>
                                @else
                                    <span style="color: red; font-weight: bold;">Inativo</span>
                                @endif
                            </td>
                            <td>
                                <form method="POST" action="{{ route('admin.gerirUser.toggle', $user->id) }}">
                                    @csrf
                                    @method('PATCH')
                                    <button onclick="return confirm('{{ $user->ativo ? 'Desativar' : 'Ativar' }} este utilizador?')"
                                        class="btn-delete"
                                        style="background-color: {{ $user->ativo ? '#dc3545' : '#28a745' }}">
                                        {{ $user->ativo ? 'Desativar' : 'Ativar' }}
                                    </button>
                                </form>
                            </td>
                        </tr>
                    @endforeach
                </tbody>                
            </table>
        </div>
        <!-- Gráficos -->
        <div class="charts">
            <canvas id="sexoChart"></canvas>
            <canvas id="idadeChart"></canvas>
            <canvas id="paisChart"></canvas>
        </div>

        <!-- Script Chart.js -->
        <script>
            const sexoChart = new Chart(document.getElementById('sexoChart'), {
                type: 'pie',
                data: {
                    labels: ['Masculino', 'Feminino'],
                    datasets: [{
                        data: {!! json_encode([$sexoCount['Masculino'] ?? 0, $sexoCount['Feminino'] ?? 0]) !!},
                        backgroundColor: ['#007bff', '#e83e8c', '#6c757d']
                    }]
                },
                options: {
                    responsive: true,
                    plugins: {
                        title: {
                            display: true,
                            text: 'Distribuição por Sexo'
                        },
                        datalabels: {
                            formatter: (value, context) => {
                                const total = context.chart.data.datasets[0].data.reduce((a, b) => a + b, 0);
                                const percentage = total > 0 ? (value / total * 100).toFixed(1) : 0;
                                return `${percentage}%`;
                            },
                            color: '#fff',
                            font: {
                                weight: 'bold',
                                size: 14
                            }
                        }
                    }
                },
                plugins: [ChartDataLabels]
            });


            const idadeChart = new Chart(document.getElementById('idadeChart'), {
                type: 'bar',
                data: {
                    labels: ['18-25', '26-35', '36-50', '51+'],
                    datasets: [{
                        label: 'Nº de Utilizadores',
                        data: {!! json_encode(array_values($ageGroups)) !!},
                        backgroundColor: '#28a745'
                    }]
                },
                options: {
                    responsive: true,
                    plugins: {
                        title: {
                            display: true,
                            text: 'Distribuição por Idade'
                        }
                    },
                    scales: {
                        y: {
                            beginAtZero: true,
                            ticks: {
                                precision: 0,
                                stepSize: 1
                            }
                        }
                    }
                }
            });
            const paisLabels = {!! json_encode(array_keys($paisCount->toArray())) !!};
            const paisData = {!! json_encode(array_values($paisCount->toArray())) !!};

            const paisChart = new Chart(document.getElementById('paisChart'), {
                type: 'bar',
                data: {
                    labels: paisLabels,
                    datasets: [{
                        label: 'Utilizadores por País',
                        data: paisData,
                        backgroundColor: '#17a2b8'
                    }]
                },
                options: {
                    responsive: true,
                    plugins: {
                        title: {
                            display: true,
                            text: 'Distribuição por País'
                        }
                    },
                    scales: {
                        y: {
                            beginAtZero: true,
                            ticks: {
                                stepSize: 1,
                                precision: 0
                            }
                        }
                    }
                }

            });
        </script>
    </section>
</body>
<script>
    $(document).ready(function() {
        $('#select-pais').select2({
            placeholder: "Selecione um país",
            allowClear: true
        });
    });
</script>

<!-- Estilo CSS -->
<style>
    .container {
        padding: 6em;
        max-width: 1000px;
        margin: auto;
    }

    .title {
        text-align: center;
        justify-content: center;
        font-size: 24px;
        margin-bottom: 28px;
    }

    .btn-add {
        background-color: #28a745;
        color: white;
        padding: 10px 15px;
        border: none;
        border-radius: 8px;
        margin-bottom: 20px;
        cursor: pointer;
    }

    .user-table {
        width: 100%;
        border-collapse: collapse;
        margin-bottom: 40px;
    }

    .user-table th,
    .user-table td {
        border: 1px solid #ccc;
        padding: 10px;
        text-align: center;
    }

    .btn-delete {
        background-color: #dc3545;
        color: white;
        border: none;
        padding: 6px 12px;
        border-radius: 5px;
    }

    .modal {
        display: none;
        position: fixed;
        z-index: 10;
        left: 0;
        top: 0;
        right: 0;
        bottom: 0;
        background: rgba(0, 0, 0, 0.5);
        justify-content: center;
        align-items: center;
    }

    .modal-content {
        background: white;
        padding: 30px;
        border-radius: 10px;
        width: 400px;
    }

    .modal-content h3 {
        margin-bottom: 20px;
    }

    .modal-content input,
    .modal-content select {
        width: 100%;
        padding: 10px;
        margin-bottom: 10px;
    }

    .btn-submit {
        background-color: #2e7d32;
        color: white;
        border: none;
        padding: 10px;
        border-radius: 5px;
    }

    .close {
        float: right;
        font-size: 22px;
        cursor: pointer;
    }

    .charts {
        display: flex;
        gap: 40px;
        flex-wrap: wrap;
    }

    canvas {
        flex: 1;
        max-width: 350px;
        max-height: 300px;
        margin: 1em;
    }

    .toast {
        visibility: hidden;
        min-width: 250px;
        background-color: #28a745;
        /* Verde por padrão */
        color: white;
        text-align: center;
        border-radius: 8px;
        padding: 16px;
        position: fixed;
        z-index: 9999;
        left: 50%;
        bottom: 30px;
        transform: translateX(-50%);
        box-shadow: 0 0 10px rgba(0, 0, 0, 0.3);
        transition: all 0.5s ease-in-out;
        opacity: 0;
    }

    .toast.show {
        visibility: visible;
        bottom: 50px;
        opacity: 1;
    }

    .toast.danger {
        background-color: #dc3545;
    }
    @media (max-width: 768px) {
    .container {
        padding: 2em 1em; /* padding reduzido */
        max-width: 100%;
    }

    .title {
        font-size: 20px;
    }

    .btn-add {
        width: 100%; /* botão ocupa toda a largura */
        font-size: 15px;
        padding: 10px;
    }

    .user-table {
        display: block;
        overflow-x: auto; /* scroll horizontal se necessário */
        white-space: nowrap;
    }

    .user-table th,
    .user-table td {
        font-size: 14px;
        padding: 8px;
    }

    .modal-content {
        width: 90%; /* ajusta modal para caber no mobile */
        padding: 20px;
    }

    .charts {
        flex-direction: column; /* gráficos empilhados */
        gap: 20px;
        align-items: center;
    }

    canvas {
        max-width: 100%;
        height: auto;
    }
}
</style>
