@extends('Layouts.arabic')

@section('arabic')
    <!----------------------------------------------- Sobre ---------------------------------------------->
    <div class="sobre" id="sobre-nos">
        <h2>معلومات عنا</h2>
        <p>
            <strong>SiDaI - نظام بيانات الهجرة</strong> هو منصة مخصصة لجمع وتنظيم وتحليل البيانات المتعلقة بالهجرة، مع
            التركيز بشكل خاص على منطقة <strong>بيرا بايكسا</strong> في البرتغال.
        </p>

        <p>
            وُلِد هذا المشروع من الحاجة إلى فهمٍ أفضل لتدفقات الهجرة المحلية، وتوفير أدواتٍ تدعم الإدماج الاجتماعي
            والاقتصادي والثقافي للمهاجرين في هذه المنطقة. من خلال SiDaI، نهدف إلى إبراز الأرقام، وكذلك قصص وتحديات مجتمعات
            المهاجرين.
        </p>

        <p>
            بالاعتماد على مصادر موثوقة مثل <strong>INE</strong> و<strong>PORDATA</strong> و<strong>Gapminder</strong>، تتيح
            لك المنصة عرض البيانات الإحصائية واستكشافها بسهولة ويسر، من خلال رسوم بيانية تفاعلية وجداول قابلة للتخصيص. كما
            نوفر خيارات تصدير بصيغ مثل <strong>PDF</strong> و<strong>Excel</strong>.
        </p>

        <p>
            تم تصميم SiDaI لخدمة الباحثين والسلطات المحلية والمؤسسات الاجتماعية والمواطنين الذين يرغبون في فهم الواقع الهجري
            في بيرا بايكسا بشكل أفضل، وتعزيز اتخاذ قرارات أكثر استنارة وسياسات أكثر شمولاً.
        </p>

        <p>
            نؤمن بأن المعرفة أساس الشمول. انضموا إلينا لبناء مجتمع أكثر عدلاً ووعياً.
        </p><br><br>
        <p> ____________________________________________________</p>
    </div>
    <div class="fontes">
        <h3>مصادر البيانات</h3>
        <p><br>البيانات المعروضة في SiDaI مُجمّعة ومُنظّمة بناءً على مصادر رسمية وموثوقة. من بينها:</p>
        <div class="fonte">
            <a href="https://www.ine.pt/xportal/xmain?xpid=INE&xpgid=ine_main" target="_blank" rel="noopener noreferrer">
                <div class="fonte-card">
                    <div class="fonte-image">
                        <img src="storage/imagens/ine.jpeg" />
                    </div>
                    <div class="fonte-info">
                        <p>المعهد الوطني للإحصاء</p>
                    </div>
                </div>
            </a>
            <a href="https://www.pordata.pt/pt" target="_blank" rel="noopener noreferrer">
            <div class="fonte-card">
                <div class="fonte-image">
                        <img src="storage/imagens/Pordata.jpg" />
                </div>
                <div class="fonte-info">
                    <p>PORDATA-بورتداتا</p>
                </div>
            </div>
            </a>
            <a href="https://www.gapminder.org/" target="_blank" rel="noopener noreferrer">
            <div class="fonte-card">
                <div class="fonte-image">
                        <img src="storage/imagens/gap.png" />
                </div>
                <div class="fonte-info">
                    <p>Gapminder-جابمايندر</p>
                </div>
            </div>
            </a>
            <a href="https://www.dges.gov.pt/pt" target="_blank" rel="noopener noreferrer">
            <div class="fonte-card">
                <div class="fonte-image">
                        <img src="dges.png" />
                </div>
                <div class="fonte-info">
                    <p>المديرية العامة للتعليم العالي</p>
                </div>
            </div>
            </a>
            <a href="https://www.cm-castelobranco.pt/" target="_blank" rel="noopener noreferrer">
            <div class="fonte-card">
                <div class="fonte-image">
                        <img src="cmcastelobranco.png" />
                </div>
                <div class="fonte-info">
                    <p>مجلس مدينة كاستيلو برانكو</p>
                </div>
            </div>
            </a>
            <a href="https://www.sns24.gov.pt/pt/inicio" target="_blank" rel="noopener noreferrer">
            <div class="fonte-card">
                <div class="fonte-image">
                        <img src="storage/imagens/sns.png" />
                </div>
                <div class="fonte-info">
                    <p> الخدمة الصحية الوطنية SNS24</p>
                </div>
            </div>
            </a>
        </div>
    </div>
@endsection
