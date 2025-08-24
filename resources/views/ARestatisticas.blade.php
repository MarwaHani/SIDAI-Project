@extends('layouts.arabic')

@section('arabic')
    <script src="https://cdn.jsdelivr.net/npm/chartjs-plugin-datalabels@2.2.0/dist/chartjs-plugin-datalabels.min.js">
    </script>
    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>

    <section class="estatisticas" id="estatisticas">
        <h2>إحصائيات المهاجرين - بيرا بايشا(Beira Baixa) </h2>
        <div class="exportar">
            <button onclick="exportarCSV()" class="ex1">تصدير ملف CSV</button>
            <button onclick="exportarPDF()" class="ex2">تصدير ملف PDF</button>
            <button onclick="exportarImagem()"class="ex3">تحميل الرسم البياني كصورة</button>
        </div>
        <div class="filtros-tabela">
            <label>جنس:
                <select id="filtroSexo">
                    <option value="">الكل</option>
                    <option value="ذكر">ذكر</option>
                    <option value="أنثى">أنثى</option>
                </select>
            </label>
            <label>الفئة_العمرية:
                <select id="filtroIdade">
                    <option value="">الكل</option>
                    <option value="até20">حتى 20</option>
                    <option value="20a30"> 20 - بين 30</option>
                    <option value="30a50">30 - 50 بين</option>
                    <option value="mais50">أكثر من 50</option>
                </select>
            </label>
            <label>جنسية:
                <select id="filtroNacionalidade">
                    <option value="">الكل</option>
                    @foreach ($imigrantes->pluck('جنسية')->unique() as $nac)
                        <option value="{{ $nac }}">{{ $nac }}</option>
                    @endforeach
                </select>
            </label>
            <label>سنة_الوصول :
                <select id="filtroAno">
                    <option value="">الكل</option>
                    @foreach ($imigrantes->pluck('سنة_الوصول')->unique()->sort() as $ano)
                        <option value="{{ $ano }}">{{ $ano }}</option>
                    @endforeach
                </select>
            </label>
            <label>مدينة_الإقامة:
                <select id="filtroCidade">
                    <option value="">الكل</option>
                    @foreach ($imigrantes->pluck('مدينة_الإقامة')->unique() as $cidade)
                        <option value="{{ $cidade }}">{{ $cidade }}</option>
                    @endforeach
                </select>
            </label>
            <label>المستوى_الأكاديمي:
                <select id="filtroNivel">
                    <option value="">الكل</option>
                    <option value="Ensino Básico (9ºano)">التعليم الأساسي (الصف التاسع)</option>
                    <option value="Ensino Secundário (12ºano)">التعليم الثانوي (الصف الثاني عشر)</option>
                    <option value="Licenciatura">بكالوريوس</option>
                    <option value="Mestrado">ماجستير</option>
                    <option value="Outro"> آخر</option>
                </select>
            </label>
        </div>
        <div class="dados">
            <p style="font-size: 12px; margin: 3px;padding: 0px 10px;">
                يعرض الجدول أدناه بيانات المهاجرين، بما في ذلك الجنس، والعمر، والجنسية، وسنة الوصول، ومدينة الإقامة،
                والمستوى التعليمي، والمهنة. يمكنك استخدام عوامل التصفية لتحسين النتائج. </p>
            <div style="width: 100%; display: flex; justify-content: flex-end; padding: 0 10px;">
                <p id="contadorUtilizadores" style="font-size: 12px; font-weight: bold; margin-bottom: 5px;">
                    إجمالي المهاجرين: <span id="totalContador">{{ count($imigrantes) }}</span>
                </p>
            </div>
            <div class="table-responsive">
                <table class="tabela">
                    <thead>
                        <tr>
                            <th>الجنس</th>
                            <th>العمر</th>
                            <th>الجنسية</th>
                            <th>سنة الوصول</th>
                            <th>مدينة الإقامة</th>
                            <th>المستوى التعليمي</th>
                            <th>المهنة</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($imigrantes as $i)
                            <tr>
                                <td>{{ $i->جنس }}</td>
                                <td>{{ $i->الفئة_العمرية }} عام</td>
                                <td>{{ $i->جنسية }}</td>
                                <td>{{ $i->سنة_الوصول }}</td>
                                <td>{{ $i->مدينة_الإقامة }}</td>
                                <td>{{ !empty($i->المستوى_الأكاديمي) ? $i->المستوى_الأكاديمي : '-' }}</td>
                                <td>{{ !empty($i->مهنة) ? $i->مهنة : '-' }}</td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </section>
    <section class="visualizar">
        <div class="grafico">
            <h4>العرض الرسومي</h4>
            <p style="font-size: 12px; margin: 3px;padding: 0px 10px;">
                يتيح لك الرسم البياني التالي عرضًا ديناميكيًا لتوزيع بيانات المهاجرين حسب فئات مختلفة، مثل الجنس والجنسية
                وسنة الوصول ومدينة الإقامة. اختر فئة لإنشاء الرسم البياني المناسب. </p>
            <div class="dropdown">
                <button class="btnG" type="button" id="btnDropdown">
                    اختر الفئة
                </button>
                <ul class="lista" id="listaCategorias">
                    <li><a class="dropdown-item" href="#" onclick="setFiltro('جنس')">الجنس</a></li>
                    <li><a class="dropdown-item" href="#" onclick="setFiltro('جنسية')">الجنسية</a></li>
                    <li><a class="dropdown-item" href="#" onclick="setFiltro('سنة_الوصول')">سنةالوصول</a></li>
                    <li><a class="dropdown-item" href="#" onclick="setFiltro('مدينة_الإقامة')">مدينةالإقامة</a></li>
                </ul>
            </div>
            <canvas id="grafico" style="height: 400px; width: 100%;"></canvas>
        </div>
    </section>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/chartjs-plugin-datalabels"></script>
    <script>
        const dados = @json($dados);
        let grafico;
        let filtroAtual = 'جنس';

        function setFiltro(filtro) {
            filtroAtual = filtro;
            atualizarGrafico();
            const lista = document.getElementById('listaCategorias');
            lista.style.display = 'none';
        }

        function atualizarGrafico() {
            const tipo = filtroAtual;
            const ctx = document.getElementById('grafico').getContext('2d');
            const labels = Object.keys(dados[tipo]);
            const valores = Object.values(dados[tipo]);

            if (grafico) grafico.destroy();

            let tipoGrafico = 'bar';
            if (['جنس', 'الفئة_العمرية', 'المستوى_الأكاديمي'].includes(tipo)) {
                tipoGrafico = 'pie';
            } else if (tipo === 'سنة_الوصول') {
                tipoGrafico = 'line';
            }
            grafico = new Chart(ctx, {
                type: tipoGrafico,
                data: {
                    labels: labels,
                    datasets: [{
                        label: (tipoGrafico !== 'pie') ? 'Total' : '',
                        data: valores,
                        backgroundColor: tipo === 'جنس' ?
                            labels.map(label => label.toLowerCase() === 'ذكر' ? '#3490dc' : '#ff69b4') : [
                                '#3f8e42'
                            ],
                        borderColor: '#3f8e42',
                        borderWidth: 0.5,
                    }]
                },
                options: {
                    responsive: true,
                    maintainAspectRatio: false,
                    plugins: {
                        legend: {
                            display: tipoGrafico === 'pie',
                            position: 'top'
                        },
                        datalabels: tipoGrafico === 'pie' ? {
                            formatter: (value, ctx) => {
                                const data = ctx.chart.data.datasets[0].data;
                                const total = data.reduce((a, b) => a + b, 0);
                                const percent = ((value / total) * 100).toFixed(1);
                                return percent + '%';
                            },
                            color: '#fff',
                            font: {
                                weight: 'bold'
                            }
                        } : {}
                    }
                },
                plugins: [ChartDataLabels]
            });
        }

        function exportarCSV() {
            let csv = 'الجنس ,العمر, الجنسية, سنة الوصول , مدينة الإقامة	, المهنة\n';
            @foreach ($imigrantes as $i)
                csv +=
                    `{{ $i->جنس }},{{ $i->الفئة_العمرية ?? '' }},{{ $i->جنسية }},{{ $i->سنة_الوصول }},{{ $i->مدينة_الإقامة }},{{ $i->مهنة }}\n`;
            @endforeach

            const BOM = '\uFEFF'; // UTF-8 BOM
            const blob = new Blob([BOM + csv], {
                type: 'text/csv;charset=utf-8;'
            });
            const url = URL.createObjectURL(blob);
            const a = document.createElement('a');
            a.href = url;
            a.download = 'مهاجرين.csv';
            a.click();
        }

        function exportarPDF() {
            window.print();
        }

        function exportarImagem() {
            const canvas = document.getElementById('grafico');
            const imagem = canvas.toDataURL('image/png');
            const link = document.createElement('a');
            link.href = imagem;
            link.download = 'grafico.png';
            link.click();
        }
        document.addEventListener('DOMContentLoaded', function() {
            atualizarGrafico();

            const btn = document.getElementById('btnDropdown');
            const lista = document.getElementById('listaCategorias');

            btn.addEventListener('click', function(e) {
                e.stopPropagation();
                lista.style.display = (lista.style.display === 'block') ? 'none' : 'block';
            });

            document.addEventListener('click', function(e) {
                if (!lista.contains(e.target) && e.target !== btn) {
                    lista.style.display = 'none';
                }
            });
            const filtros = [
                'filtroSexo',
                'filtroIdade',
                'filtroNacionalidade',
                'filtroAno',
                'filtroCidade',
                'filtroNivel'
            ];
            filtros.forEach(id => {
                document.getElementById(id).addEventListener('change', filtrarTabela);
            });
        });

        function filtrarTabela() {
            const sexo = document.getElementById('filtroSexo').value.toLowerCase();
            const idade = document.getElementById('filtroIdade').value;
            const nacionalidade = document.getElementById('filtroNacionalidade').value.toLowerCase();
            const ano = document.getElementById('filtroAno').value;
            const cidade = document.getElementById('filtroCidade').value.toLowerCase();
            const nivel = document.getElementById('filtroNivel').value.toLowerCase();

            const linhas = document.querySelectorAll('.tabela tbody tr');

            linhas.forEach(linha => {
                const tds = linha.querySelectorAll('td');
                const [sexoTd, idadeTd, nacTd, anoTd, cidadeTd, nivelTd] = tds;

                const idadeNum = parseInt(idadeTd.textContent);

                let mostrar = true;

                if (sexo && sexoTd.textContent.trim().toLowerCase() !== sexo) mostrar = false;

                if (idade) {
                    if (idade === 'até20' && idadeNum >= 20) mostrar = false;
                    if (idade === '20a30' && (idadeNum < 20 || idadeNum > 30)) mostrar = false;
                    if (idade === '30a50' && (idadeNum < 30 || idadeNum > 50)) mostrar = false;
                    if (idade === 'mais50' && idadeNum <= 50) mostrar = false;
                }

                if (nacionalidade && !nacTd.textContent.toLowerCase().includes(nacionalidade)) mostrar = false;
                if (ano && anoTd.textContent !== ano) mostrar = false;
                if (cidade && !cidadeTd.textContent.toLowerCase().includes(cidade)) mostrar = false;
                if (nivel) {
                    const nivelTexto = nivelTd.textContent.trim().toLowerCase();
                    if (nivel === 'آخر') {
                        const niveisPadrao = [
                            "التعليم الأساسي (الصف التاسع)",
                            "التعليم الثانوي (الصف الثاني عشر)",
                            "بكالوريوس",
                            "ماجستير"
                        ];
                        if (niveisPadrao.includes(nivelTexto)) {
                            mostrar = false;
                        }
                    } else {
                        if (!nivelTexto.includes(nivel)) {
                            mostrar = false;
                        }
                    }
                }
                let totalVisiveis = 0;
                linhas.forEach(linha => {
                    if (linha.style.display !== 'none') {
                        totalVisiveis++;
                    }
                });
                document.getElementById('totalContador').textContent = totalVisiveis;

                linha.style.display = mostrar ? '' : 'none';
            });
        }
        filtrarTabela();
    </script>
    <style>
        .filtros {
            display: flex;
            justify-content: space-between;
            align-items: center;
            margin-bottom: 20px;
        }

        .dropdown {
            position: relative;
        }

        .btn-filtro {
            background-color: #3490dc;
            color: white;
            padding: 8px 16px;
            border: none;
            border-radius: 6px;
            cursor: pointer;
        }

        .lista {
            display: none;
            position: absolute;
            background-color: white;
            border: 1px solid #ccc;
            margin-top: 3px;
            list-style: none;
            padding: 0;
            width: 150px;
            z-index: 999;
            white-space: nowrap;
        }

        .lista li {
            padding: 10px;
            cursor: pointer;
        }

        .lista li:hover {
            background-color: #f1f1f1;
        }

        .lista li a {
            display: flex;
            text-decoration: none;
            color: black;
            width: 100%;
            justify-content: left;
            font-size: 12px;
        }

        .exportar {
            display: flex;
            justify-content: left;
        }

        .ex1,
        .ex2,
        .ex3 {
            margin: 0.4em;
            padding: 0.3em 1em;
            border-radius: 6px;
            cursor: pointer;
            color: #f1f1f1;
            border: none;
        }

        .ex1 {
            background-color: #38c172;
        }

        .ex2 {
            background-color: #e3342f;
        }

        .ex3 {
            background-color: #3490dc;
        }

        .filtros-tabela {
            padding: 0.3em 1em;
            display: flex;
            flex-wrap: wrap;
            gap: 1em;
            margin-top: 20px;
            margin-bottom: 10px;
            font-size: 12px;
        }

        .filtros-tabela label {
            display: flex;
            flex-direction: column;
            font-weight: 500;
        }

        .filtros-tabela select {
            padding: 2px 3px;
            border-radius: 4px;
        }

        .dados {
            display: flex;
            justify-content: space-around;
            flex-direction: column;
            align-items: center;

        }

        .tabela {
            width: 100%;
            border-collapse: collapse;
            width: 20%;
            font-size: 12px;
            border-collapse: collapse;
            margin-top: 30px;
            table-layout: auto;
        }

        .visualizar {
            display: flex;
            min-height: 100vh;
            margin-bottom: 10em;
            justify-content: center;
            align-items: center;
        }

        .visualizar h4 {
            font-size: 24px;
            padding: 1em 0em;
        }

        .btnG {
            padding: 0.3em 1em;
            display: flex;
            gap: 1em;
            margin-top: 20px;
            margin-bottom: 10px;
            font-size: 12px;
            cursor: pointer;
            border: 2px;
            background-color: #38c172;
            border-radius: 6px;
        }

        .grafico {
            margin-bottom: 6em;
            width: 50%;
            height: 300px;
        }

        .tabela th,
        .tabela td {
            border: 1px solid #ccc;
            padding: 4px 6px;
            /* espaço interno ajustado */
            text-align: center;
            vertical-align: middle;
            /* alinha verticalmente no meio */
            white-space: nowrap;
            /* evita que quebre em várias linhas */
        }

        .tabela th {
            background-color: #f8f9fa;
            font-weight: 600;
        }

        @media print {
            body {
                -webkit-print-color-adjust: exact;
                print-color-adjust: exact;
                color-adjust: exact;
            }

            .visualizar {
                display: block;
                page-break-inside: avoid;
                margin: 0 auto;
            }

            .grafico {
                width: 100%;
                height: 500px;
                page-break-inside: avoid;
            }

            canvas#grafico {
                width: 100%;
                height: 500px;
            }

            .exportar,
            .dropdown,
            .btnG,
            .lista,
            .filtros-tabela {
                display: none;
            }

            .tabela {
                width: 100%;
                font-size: 11px;
                page-break-inside: avoid;
            }

            h2,
            h4 {
                text-align: center;
            }
        }

        @media (max-width: 768px) {
            .estatisticas {
                padding: 80px 20px;
            }

            .estatisticas-container {
                flex-direction: column;
                align-items: center;
            }

            .estatisticas h2,
            .visualizar h4 {
                font-size: 18px;
                text-align: center;
                padding: 0.5em;
            }

            .exportar {
                display: flex;
                flex-direction: column;
                align-items: stretch;
                gap: 0.5em;
                justify-content: left;
            }

            .ex1,
            .ex2,
            .ex3 {
                margin: 0.4em;
                padding: 0.3em 1em;
                border-radius: 6px;
                cursor: pointer;
                color: #f1f1f1;
                border: none;
            }

            .ex1 {
                background-color: #38c172;
            }

            .ex2 {
                background-color: #e3342f;
            }

            .ex3 {
                background-color: #3490dc;
            }

            .filtros-tabela {
                display: flex;
                flex-direction: column;
                gap: 0.6em;
                font-size: 11px;
                padding: 0.5em;
            }

            .filtros-tabela label {
                width: 100%;
                display: flex;
                flex-direction: column;
                font-weight: 500;
            }

            .filtros-tabela select {
                padding: 2px 3px;
                border-radius: 4px;
            }

            .dropdown {
                width: 100%;
                position: relative;
            }

            .btn-filtro {
                background-color: #3490dc;
                color: white;
                padding: 8px 16px;
                border: none;
                border-radius: 6px;
                cursor: pointer;
            }

            .lista {
                display: none;
                position: static;
                width: 100%;
                background-color: white;
                border: 1px solid #ccc;
                list-style: none;
                padding: 0;
                z-index: 999;
            }

            .lista li {
                padding: 10px;
                cursor: pointer;
            }

            .lista li:hover {
                background-color: #f1f1f1;
            }

            .lista li a {
                display: flex;
                text-decoration: none;
                color: black;
                width: 100%;
                justify-content: left;
                font-size: 12px;
            }

            .dados {
                display: flex;
                flex-direction: column;
                align-items: center;
                padding: 0 10px;
            }

            .table-responsive {
                width: 100%;
                max-height: 250px;
                /* altura máxima para a tabela */
                overflow-x: auto;
                /* scroll horizontal */
                overflow-y: auto;
                /* scroll vertical se precisar */
                -webkit-overflow-scrolling: touch;
                /* para smooth scroll no iOS */

                border-radius: 6px;
            }

            .tabela {
                width: 200px;
                /* largura fixa maior que o container para ativar o scroll horizontal */
                font-size: 11px;
                border-collapse: collapse;
            }

            .tabela th,
            .tabela td {
                white-space: nowrap;
                padding: 6px 8px;
                text-align: left;
                font-size: 9px;
                border-bottom: 1px solid #ddd;
            }

            .tabFela th {
                background-color: #f8f9fa;
                font-weight: 600;
            }

            .grafico {
                width: 100%;
                height: auto;
                max-width: 100%;
                margin-bottom: 2em;
                position: relative;
            }

            canvas#grafico {
                width: 50% !important;
                height: 150px !important;
            }

            .visualizar {
                display: flex;
                flex-direction: column;
                justify-content: center;
                align-items: center;
                margin-bottom: 2em;
                padding: 1em;
                min-height: auto;
            }

            .btnG {
                font-size: 11px;
                width: 100%;
                justify-content: center;
                padding: 0.3em 1em;
                display: flex;
                gap: 1em;
                margin-top: 20px;
                margin-bottom: 10px;
                background-color: #38c172;
                border-radius: 6px;
            }

            #contadorUtilizadores {
                text-align: right;
                width: 100%;
                padding-right: 1em;
            }

            @media print {
                body {
                    -webkit-print-color-adjust: exact;
                    print-color-adjust: exact;
                    color-adjust: exact;
                }

                .visualizar {
                    display: block;
                    page-break-inside: avoid;
                    margin: 0 auto;
                    padding: 12em;
                    margin-bottom: 15em;
                }

                .grafico {
                    width: 100%;
                    height: auto;
                    page-break-inside: avoid;
                }

                canvas#grafico {
                    width: 50%;
                    height: 150px;
                }

                .exportar,
                .dropdown,
                .btnG,
                .lista,
                .filtros-tabela {
                    display: none;
                }

                .table-responsive {
                    width: 100%;
                    max-height: 250px;
                    /* altura máxima para a tabela */
                    overflow-x: auto;
                    /* scroll horizontal */
                    overflow-y: auto;
                    /* scroll vertical se precisar */
                    -webkit-overflow-scrolling: touch;
                    /* para smooth scroll no iOS */
                    border-radius: 6px;
                }

                .tabela {
                    width: 100%;
                    font-size: 9px;
                    page-break-inside: avoid;
                }

                h2,
                h4 {
                    text-align: center;
                }
            }
        }
    </style>
@endsection
