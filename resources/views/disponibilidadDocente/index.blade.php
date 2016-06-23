@extends('layout')
@section('module')
CargaLectiva
@stop
@section('base_url')
<base href="{{URL::to('/')}}/disponibilidadDocente"/>
@stop
@section('css-customize')
@stop
@section('content')
<section ng-app="disponibilidadDocente">
    <div ng-view>
    </div>
</section>

@section('js-customize')
<script src="/js/app/disponibilidadDocente/app.js"></script>
    <script src="/js/app/disponibilidadDocente/controllers.js"></script>
@stop

@stop