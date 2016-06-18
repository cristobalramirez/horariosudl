<?php

namespace Salesfly\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Routing\Controller;

use Salesfly\Salesfly\Repositories\CursoRepo;
use Salesfly\Salesfly\Managers\CursoManager;

class CursoController extends Controller {//Te Quiero Mucho

    protected $cursoRepo;

    public function __construct(CursoRepo $cursoRepo)
    {
        $this->cursoRepo = $cursoRepo;
    }
    public function validastationname($text){
        
        $curso = $this->cursoRepo->validarNoRepit($text);

        return response()->json($curso);
    }

    public function index()
    {
        return View('curso.index');
    }

    public function all()
    {
        $curso = $this->cursoRepo->paginate(15);
        return response()->json($curso);
        //var_dump($curso);
    }

    public function paginatep(){
        $curso = $this->cursoRepo->paginate(15);
        return response()->json($curso);
    }


    public function form_create()
    {
        return View('curso.form_create');
    }

    public function form_edit()
    {
        return View('curso.form_edit');
    }

    public function create(Request $request)
    {
        $curso = $this->cursoRepo->getModel();
        //var_dump($request->all());
        //die();
        $manager = new CategoryManager($curso,$request->all());
        //print_r($manager); die();
        $manager->save();
        //Event::fire('update.station',$station->all());

        return response()->json(['estado'=>true, 'nombre'=>$curso->nombre]);
    }

    public function find($id)
    {
        $station = $this->cursoRepo->find($id);
        return response()->json($station);
    }

    public function edit(Request $request)
    {
        $station = $this->cursoRepo->find($request->id);

        $manager = new CategoryManager($station,$request->all());
        $manager->save();

        return response()->json(['estado'=>true, 'nombre'=>$station->nombre]);
    }

    public function destroy(Request $request)
    {
        $station= $this->cursoRepo->find($request->id);
        $station->delete();
        //Event::fire('update.station',$station->all());
        return response()->json(['estado'=>true, 'nombre'=>$station->nombre]);
    }

    public function search($q)
    {
        //$q = Input::get('q');
        $curso = $this->cursoRepo->search($q);

        return response()->json($curso);
    }

    public function searchCurso($a,$b,$c)
    {
        $curso = $this->cursoRepo->searchCurso($a,$b,$c);
        return response()->json($curso);
    }
}