@extends('layouts.arabic')

@section('arabic')
    <!----------------------------------------------- Página Incial --------------------------------------------->
    <section class="main" id="pagina_incial">
        <div>
            <h2>SiDaI - نظام بيانات الهجرة</h2>
            <p>استكشفوا الإحصاءات والموارد المتعلقة بالهجرة في منطقة بيرا بايكسا SiDal!
                <br>
                يهدف هذا المشروع إلى تعزيز الاندماج الاجتماعي وتوفير معلومات قيّمة للمهاجرين والمهنيين والمؤسسات.
            </p>
        </div>
    </section>
    <section class="cards" id="services">
        <div class="highlights">
            <diV class="card">
                <div class="icon">
                    <i class="fa-solid fa-magnifying-glass-chart"></i>
                </div>
                <div class="info">
                    <h3>إحصائيات</h3>
                    <p>اطلع على البيانات المحدثة حول الهجرة في المنطقة: الجنسيات والأعمار ومجالات النشاط والمزيد.</p>
                    <a href="/ARestatisticas" class="btn">عرض الإحصائيات</a>
                </div>
            </div>
            <diV class="card">
                <div class="icon">
                    <i class="fa-solid fa-building-user"></i>
                </div>
                <div class="info">
                    <h3>الكيانات</h3>
                    <p>تعرف على المبادرات والجهات التي تعمل على تعزيز دعم المهاجرين ودمجهم في المجتمع.</p>
                    <a href="/ARentidades" class="btn">استكشاف المشاريع</a>
                </div>
            </div>
            <diV class="card">
                <div class="icon">
                    <i class="fa-solid fa-circle-info"></i>
                </div>
                <div class="info">
                    <h3>معلومات مفيدة</h3>
                    <p>الوصول إلى الوثائق والاتصالات والموارد لدعم المهاجرين في مختلف المجالات.</p>
                    <a href="/ARrecursos" class="btn">اعرف المزيد</a>
                </div>
            </div>
            <diV class="card">
                <div class="icon">
                    <i class="fa-solid fa-circle-question"></i>
                </div>
                <div class="info">
                    <h3>هل تحتاج إلى مساعدة أو تريد معرفة المزيد؟</h3>
                    <p>اكتشف كيف يمكننا مساعدتك أو تواصل مع مؤسسة محلية.</p>
                    <a href="/ARcontacto" class="btn" style="margin-top: 1rem;">تواصل</a>
                </div>
            </div>
        </div>
    </section>
@endsection
