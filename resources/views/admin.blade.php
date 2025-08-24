@extends('layouts.master')

@section('content')
    <section class="admin">
        <h2>Painel de Administração</h2>
        <div class="admin-cards">
            <a href="{{ route('admin.gerirUser') }}" class="card">Gerir Utilizadores</a>
            <a href="{{ route('admin.gerirEstatisticas') }} " class="card">Gerir Estatísticas</a> 
            <a href="{{ route('admin.gerirEntidades') }}" class="card">Gerir Entidades</a>
            <a href="{{ route('admin.gerirContacto') }}" class="card">Mensagens de Contacto</a>
            <a href="{{ route('admin.en.gerirContacto') }}" class="card">Mensagens de Contacto - English</a>
            <a href="{{ route('admin.ar.gerirContacto') }}" class="card">Mensagens de Contacto - Arabic</a>
        </div>
    </section>
@endsection
