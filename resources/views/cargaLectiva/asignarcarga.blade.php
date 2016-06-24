@extends('layout')
@section('module')
CargaLectiva
@stop
@section('base_url')
<base href="{{URL::to('/')}}/asignarcarga"/>
@stop
@section('css-customize')
@stop
@section('content')
<section ng-app="cargaLectiva">
    <div ng-view>
    </div>
</section>

@section('js-customize')
<script src="/js/app/cargaLectiva/app.js"></script>
    <script src="/js/app/cargaLectiva/controllers.js"></script>
@stop

@stop