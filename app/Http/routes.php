<?php

/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| Here is where you can register all of the routes for an application.
| It's a breeze. Simply tell Laravel the URIs it should respond to
| and give it the controller to call when that URI is requested.
|
*/

\Debugbar::disable();

Route::get('/', 'Layout\LayoutController@index');

Route::get('/login', function () {
    return view('login');
});

Route::group(['middleware' => ['role','cashier']], function () {
    Route::get('/VEROLE', function () {
        return 'se ve el role';
    });
});

 
Route::get('/test', function() {
    event(new \Salesfly\Events\SomeEvent());
    return 'event fired';
});

Route::get('/vista-redis', function() {
   return view('test');
});

Route::get('status', function(){
    return response('holi', 422)
        ->header('Content-Type', 'text/html; charset=UTF-8');
});

// Authentication routes...
Route::get('auth/login', 'Auth\AuthController@getLogin');
Route::post('auth/login', 'Auth\AuthController@postLogin');
Route::get('auth/logout', 'Auth\AuthController@getLogout');

// Registration routes...
Route::get('auth/register', 'Auth\AuthController@getRegister');
Route::post('auth/register', 'Auth\AuthController@postRegister');
Route::group(['middleware' => 'role'], function () {
    Route::get('users/create', ['as' => 'user_create', 'uses' => 'Auth\AuthController@indexU']);
    Route::get('users/edit/{id?}', ['as' => 'user_edit', 'uses' => 'Auth\AuthController@indexU']);
    Route::get('users/form-create', ['as' => 'user_form_create', 'uses' => 'Auth\AuthController@form_create']);
    Route::get('users/form-edit', ['as' => 'user_form_edit', 'uses' => 'Auth\AuthController@form_edit']);
    Route::get('users', ['as' => 'user', 'uses' => 'Auth\AuthController@indexU']);
});
    Route::get('api/users/all', ['as' => 'user_all', 'uses' => 'Auth\AuthController@all']);
    Route::get('api/users/paginate/', ['as' => 'user_paginate', 'uses' => 'Auth\AuthController@paginate']);

    Route::post('api/users/create', ['as' => 'user_create', 'uses' => 'Auth\AuthController@postRegister']);
    Route::put('api/users/edit', ['as' => 'user_edit', 'uses' => 'Auth\AuthController@update']);
    Route::post('api/users/destroy', ['as' => 'user_destroy', 'uses' => 'Auth\AuthController@destroy']);
    Route::get('api/users/search/{q?}', ['as' => 'user_search', 'uses' => 'Auth\AuthController@search']);
    Route::get('api/users/find/{id}', ['as' => 'user_find', 'uses' => 'Auth\AuthController@find']);
    Route::get('api/users/stores', ['as' => 'user_stores_select', 'uses' => 'Auth\AuthController@store_select']);
    Route::get('api/users/disableuser/{id}', ['as' => 'user_disabled', 'uses' => 'Auth\AuthController@disableuser']);
    Route::post('api/users/changePass', 'Auth\AuthController@changePass');
//END

//PERSONS ROUTES
    Route::get('persons', ['as' => 'person', 'uses' => 'PersonsController@index']);
    Route::get('persons/create', ['as' => 'person_create', 'uses' => 'PersonsController@index']);
    Route::get('persons/edit/{id?}', ['as' => 'person_edit', 'uses' => 'PersonsController@index']);
    Route::get('persons/form-create', ['as' => 'person_form_create', 'uses' => 'PersonsController@form_create']);
    Route::get('persons/form-edit', ['as' => 'person_form_edit', 'uses' => 'PersonsController@form_edit']);
    Route::get('api/persons/all', ['as' => 'person_all', 'uses' => 'PersonsController@all']);
    Route::get('api/persons/paginate/', ['as' => 'person_paginate', 'uses' => 'PersonsController@paginatep']);
    Route::post('api/persons/create', ['as' => 'person_create', 'uses' => 'PersonsController@create']);
    Route::put('api/persons/edit', ['as' => 'person_edit', 'uses' => 'PersonsController@edit']);
    Route::post('api/persons/destroy', ['as' => 'person_destroy', 'uses' => 'PersonsController@destroy']);
    Route::get('api/persons/search/{q?}', ['as' => 'person_search', 'uses' => 'PersonsController@search']);
    Route::get('api/persons/find/{id}', ['as' => 'person_find', 'uses' => 'PersonsController@find']);
//END PERSONS ROUTES

//CARGA LECTIVA ROUTES
    Route::get('carga', ['as' => 'person', 'uses' => 'CargaLectivaController@index']);
    Route::get('asignarcarga', ['as' => 'person', 'uses' => 'CargaLectivaController@asignarcarga']);
    Route::get('carga/create', ['as' => 'person_create', 'uses' => 'CargaLectivaController@index']);
    Route::get('carga/edit/{id?}', ['as' => 'person_edit', 'uses' => 'CargaLectivaController@index']);
    Route::get('carga/form-create', ['as' => 'person_form_create', 'uses' => 'CargaLectivaController@form_create']);
    Route::get('carga/form-edit', ['as' => 'person_form_edit', 'uses' => 'CargaLectivaController@form_edit']);
    Route::get('api/carga/all', ['as' => 'person_all', 'uses' => 'CargaLectivaController@all']);
    Route::get('api/carga/paginate/', ['as' => 'person_paginate', 'uses' => 'CargaLectivaController@paginatep']);
    Route::post('api/carga/create', ['as' => 'person_create', 'uses' => 'CargaLectivaController@create']);
    Route::put('api/carga/edit', ['as' => 'person_edit', 'uses' => 'CargaLectivaController@edit']);
    Route::post('api/carga/destroy', ['as' => 'person_destroy', 'uses' => 'CargaLectivaController@destroy']);
    Route::get('api/carga/search/{q?}', ['as' => 'person_search', 'uses' => 'CargaLectivaController@search']);
    Route::get('api/carga/find/{id}', ['as' => 'person_find', 'uses' => 'CargaLectivaController@find']);

    Route::get('api/carga/search/{a?}/{b?}/{c?}',['as'=>'person_search', 'uses'=>'CargaLectivaController@searchCarga']);
    Route::get('api/cargasemestre/search/{a?}/{b?}/{c?}',['as'=>'person_search', 'uses'=>'CargaLectivaController@searchCargaSemestre']);
//END CATEGORIAS ROUTES
//CARGA LECTIVA ROUTES
    Route::get('curso', ['as' => 'person', 'uses' => 'CursoController@index']);
    Route::get('curso/create', ['as' => 'person_create', 'uses' => 'CursoController@index']);
    Route::get('curso/edit/{id?}', ['as' => 'person_edit', 'uses' => 'CursoController@index']);
    Route::get('curso/form-create', ['as' => 'person_form_create', 'uses' => 'CursoController@form_create']);
    Route::get('curso/form-edit', ['as' => 'person_form_edit', 'uses' => 'CursoController@form_edit']);
    Route::get('api/curso/all', ['as' => 'person_all', 'uses' => 'CursoController@all']);
    Route::get('api/curso/paginate/', ['as' => 'person_paginate', 'uses' => 'CursoController@paginatep']);
    Route::post('api/curso/create', ['as' => 'person_create', 'uses' => 'CursoController@create']);
    Route::put('api/curso/edit', ['as' => 'person_edit', 'uses' => 'CursoController@edit']);
    Route::post('api/curso/destroy', ['as' => 'person_destroy', 'uses' => 'CursoController@destroy']);
    Route::get('api/curso/search/{q?}', ['as' => 'person_search', 'uses' => 'CursoController@search']);
    Route::get('api/curso/find/{id}', ['as' => 'person_find', 'uses' => 'CursoController@find']);

    Route::get('api/curso/search/{a?}/{b?}/{c?}',['as'=>'person_search', 'uses'=>'CursoController@searchCurso']);
    Route::get('api/cursoall/search/{a?}/{b?}/{c?}',['as'=>'person_search', 'uses'=>'CursoController@searchCursoAll']);
//END CATEGORIAS ROUTES

    //CARGA LECTIVA ROUTES
    Route::get('docente', ['as' => 'person', 'uses' => 'DocenteController@index']);
    Route::get('docente/create', ['as' => 'person_create', 'uses' => 'DocenteController@index']);
    Route::get('docente/edit/{id?}', ['as' => 'person_edit', 'uses' => 'DocenteController@index']);
    Route::get('docente/form-create', ['as' => 'person_form_create', 'uses' => 'DocenteController@form_create']);
    Route::get('docente/form-edit', ['as' => 'person_form_edit', 'uses' => 'DocenteController@form_edit']);
    Route::get('api/docente/all', ['as' => 'person_all', 'uses' => 'DocenteController@all']);
    Route::get('api/docente/paginate/', ['as' => 'person_paginate', 'uses' => 'DocenteController@paginatep']);
    Route::post('api/docente/create', ['as' => 'person_create', 'uses' => 'DocenteController@create']);
    Route::put('api/docente/edit', ['as' => 'person_edit', 'uses' => 'DocenteController@edit']);
    Route::post('api/docente/destroy', ['as' => 'person_destroy', 'uses' => 'DocenteController@destroy']);
    Route::get('api/docente/search/{q?}', ['as' => 'person_search', 'uses' => 'DocenteController@search']);
    Route::get('api/docente/find/{id}', ['as' => 'person_find', 'uses' => 'DocenteController@find']);

    Route::get('api/decenteCarga/search/{q?}', ['as' => 'person_search', 'uses' => 'DocenteController@searchCarga']);
    //END CATEGORIAS ROUTES
    //CATEGORIAS ROUTES
    Route::get('planestudiantil', ['as' => 'person', 'uses' => 'PlanEstudiantilController@index']);
    Route::get('planestudiantil/create', ['as' => 'person_create', 'uses' => 'PlanEstudiantilController@index']);
    Route::get('planestudiantil/edit/{id?}', ['as' => 'person_edit', 'uses' => 'PlanEstudiantilController@index']);
    Route::get('planestudiantil/form-create', ['as' => 'person_form_create', 'uses' => 'PlanEstudiantilController@form_create']);
    Route::get('planestudiantil/form-edit', ['as' => 'person_form_edit', 'uses' => 'PlanEstudiantilController@form_edit']);
    Route::get('api/planestudiantil/all', ['as' => 'person_all', 'uses' => 'PlanEstudiantilController@all']);
    Route::get('api/planestudiantil/paginate/', ['as' => 'person_paginate', 'uses' => 'PlanEstudiantilController@paginatep']);
    Route::post('api/planestudiantil/create', ['as' => 'person_create', 'uses' => 'PlanEstudiantilController@create']);
    Route::put('api/planestudiantil/edit', ['as' => 'person_edit', 'uses' => 'PlanEstudiantilController@edit']);
    Route::post('api/planestudiantil/destroy', ['as' => 'person_destroy', 'uses' => 'PlanEstudiantilController@destroy']);
    Route::get('api/planestudiantil/search/{q?}', ['as' => 'person_search', 'uses' => 'PlanEstudiantilController@search']);
    Route::get('api/planestudiantil/find/{id}', ['as' => 'person_find', 'uses' => 'PlanEstudiantilController@find']);
    Route::get('api/planestudiantil/select','PlanEstudiantilController@selectPlan');
//END CATEGORIAS ROUTES
//CATEGORIAS ROUTES
    Route::get('semestre', ['as' => 'person', 'uses' => 'SemestreController@index']);
    Route::get('semestre/create', ['as' => 'person_create', 'uses' => 'SemestreController@index']);
    Route::get('semestre/edit/{id?}', ['as' => 'person_edit', 'uses' => 'SemestreController@index']);
    Route::get('semestre/form-create', ['as' => 'person_form_create', 'uses' => 'SemestreController@form_create']);
    Route::get('semestre/form-edit', ['as' => 'person_form_edit', 'uses' => 'SemestreController@form_edit']);
    Route::get('api/semestre/all', ['as' => 'person_all', 'uses' => 'SemestreController@all']);
    Route::get('api/semestre/paginate/', ['as' => 'person_paginate', 'uses' => 'SemestreController@paginatep']);
    Route::post('api/semestre/create', ['as' => 'person_create', 'uses' => 'SemestreController@create']);
    Route::put('api/semestre/edit', ['as' => 'person_edit', 'uses' => 'SemestreController@edit']);
    Route::post('api/semestre/destroy', ['as' => 'person_destroy', 'uses' => 'SemestreController@destroy']);
    Route::get('api/semestre/search/{q?}', ['as' => 'person_search', 'uses' => 'SemestreController@search']);
    Route::get('api/semestre/find/{id}', ['as' => 'person_find', 'uses' => 'SemestreController@find']);
    Route::get('api/semestre/select','SemestreController@select');
//END CATEGORIAS ROUTES
//CATEGORIAS ROUTES
    Route::get('disponibilidadDocente', ['as' => 'person', 'uses' => 'DisponibilidadDocenteController@index']);
    Route::get('disponibilidadDocente/create', ['as' => 'person_create', 'uses' => 'DisponibilidadDocenteController@index']);
    Route::get('disponibilidadDocente/edit/{id?}', ['as' => 'person_edit', 'uses' => 'DisponibilidadDocenteController@index']);
    Route::get('disponibilidadDocente/form-create', ['as' => 'person_form_create', 'uses' => 'DisponibilidadDocenteController@form_create']);
    Route::get('disponibilidadDocente/form-edit', ['as' => 'person_form_edit', 'uses' => 'DisponibilidadDocenteController@form_edit']);
    Route::get('api/disponibilidadDocente/all', ['as' => 'person_all', 'uses' => 'DisponibilidadDocenteController@all']);
    Route::get('api/disponibilidadDocente/paginate/', ['as' => 'person_paginate', 'uses' => 'DisponibilidadDocenteController@paginatep']);
    Route::post('api/disponibilidadDocente/create', ['as' => 'person_create', 'uses' => 'DisponibilidadDocenteController@create']);
    Route::put('api/disponibilidadDocente/edit', ['as' => 'person_edit', 'uses' => 'DisponibilidadDocenteController@edit']);
    Route::post('api/disponibilidadDocente/destroy', ['as' => 'person_destroy', 'uses' => 'DisponibilidadDocenteController@destroy']);
    Route::get('api/disponibilidadDocente/search/{q?}', ['as' => 'person_search', 'uses' => 'DisponibilidadDocenteController@search']);
    Route::get('api/disponibilidadDocente/find/{id}', ['as' => 'person_find', 'uses' => 'DisponibilidadDocenteController@find']);
    Route::get('api/disponibilidadDocente/select','DisponibilidadDocenteController@select');
//END CATEGORIAS ROUTES
//CATEGORIAS ROUTES
    Route::get('hora', ['as' => 'person', 'uses' => 'HoraController@index']);
    Route::get('hora/create', ['as' => 'person_create', 'uses' => 'HoraController@index']);
    Route::get('hora/edit/{id?}', ['as' => 'person_edit', 'uses' => 'HoraController@index']);
    Route::get('hora/form-create', ['as' => 'person_form_create', 'uses' => 'HoraController@form_create']);
    Route::get('hora/form-edit', ['as' => 'person_form_edit', 'uses' => 'HoraController@form_edit']);
    Route::get('api/hora/all', ['as' => 'person_all', 'uses' => 'HoraController@all']);
    Route::get('api/hora/paginate/', ['as' => 'person_paginate', 'uses' => 'HoraController@paginatep']);
    Route::post('api/hora/create', ['as' => 'person_create', 'uses' => 'HoraController@create']);
    Route::put('api/hora/edit', ['as' => 'person_edit', 'uses' => 'HoraController@edit']);
    Route::post('api/hora/destroy', ['as' => 'person_destroy', 'uses' => 'HoraController@destroy']);
    Route::get('api/hora/search/{q?}', ['as' => 'person_search', 'uses' => 'HoraController@search']);
    Route::get('api/hora/find/{id}', ['as' => 'person_find', 'uses' => 'HoraController@find']);
    Route::get('api/hora/select','HoraController@select');
    Route::get('api/hora/search/{a?}/{b?}/{c?}',['as'=>'person_search', 'uses'=>'HoraController@searchHora']);
//END CATEGORIAS ROUTES