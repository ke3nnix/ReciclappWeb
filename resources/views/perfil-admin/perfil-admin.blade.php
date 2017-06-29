@extends('base')
@section('title', 'Administrador')
@section('content')

<div class="perfil-admin"></div>
    <div style="height:180px; display:block; width:100%"></div>
    <div style="position:relative; z-index:9; text-align:center;">
        <img src="../vendor/imagenReciclaap/users/June2017/cgJcIwVDlZTDhRDGaW92.jpg" class="avatar"
             style="border-radius:50%; width:150px; height:150px; border:5px solid #fff;"
             alt="gus avatar">
        <h4>Gus</h4>
        <div class="user-email text-muted">Gustavo@gmail.com</div>
        <p></p>
        <a href="http://localhost:8000/admin/users/1/edit" class="btn btn-primary">Editar Perfil</a>
    </div>
@stop