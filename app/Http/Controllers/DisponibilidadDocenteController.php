<?php

namespace Salesfly\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Routing\Controller;

use Salesfly\Salesfly\Repositories\DisponibilidadDocenteRepo;
use Salesfly\Salesfly\Managers\DisponibilidadDocenteManager;

class DisponibilidadDocenteController extends Controller {//Te Quiero Mucho

    protected $DisponibilidadDocenteRepo;

    public function __construct(DisponibilidadDocenteRepo $DisponibilidadDocenteRepo)
    {
        $this->DisponibilidadDocenteRepo = $DisponibilidadDocenteRepo;
    }
    public function validastationname($text){
        
        $disponibilidadDocente = $this->DisponibilidadDocenteRepo->validarNoRepit($text);

        return response()->json($disponibilidadDocente);
    }

    public function index()
    {
        return View('disponibilidadDocente.index');
    }

    public function all()
    {
        $disponibilidadDocente = $this->DisponibilidadDocenteRepo->paginate(15);
        return response()->json($disponibilidadDocente);
        //var_dump($disponibilidadDocente);
    }

    public function paginatep(){
        $disponibilidadDocente = $this->DisponibilidadDocenteRepo->paginate(15);
        return response()->json($disponibilidadDocente);
    }


    public function form_create()
    {
        return View('disponibilidadDocente.form_create');
    }

    public function form_edit()
    {
        return View('disponibilidadDocente.form_edit');
    }

    public function create(Request $request)
    {
        $disponibilidadDocente = $this->DisponibilidadDocenteRepo->getModel();
        //var_dump($request->all());
        //die();
        $manager = new DisponibilidadDocenteManager($disponibilidadDocente,$request->all());
        //print_r($manager); die();
        $manager->save();
        //Event::fire('update.disponibilidadDocente',$disponibilidadDocente->all());

        return response()->json(['estado'=>true, 'nombre'=>$disponibilidadDocente->nombre]);
    }

    public function find($id)
    {
        $disponibilidadDocente = $this->DisponibilidadDocenteRepo->find($id);
        return response()->json($disponibilidadDocente);
    }

    public function edit(Request $request)
    {
        $disponibilidadDocente = $this->DisponibilidadDocenteRepo->find($request->id);

        $manager = new DisponibilidadDocenteManager($disponibilidadDocente,$request->all());
        $manager->save();

        return response()->json(['estado'=>true, 'nombre'=>$disponibilidadDocente->nombre]);
    }

    public function destroy(Request $request)
    {
        $disponibilidadDocente= $this->DisponibilidadDocenteRepo->find($request->id);
        $disponibilidadDocente->delete();
        //Event::fire('update.disponibilidadDocente',$disponibilidadDocente->all());
        return response()->json(['estado'=>true, 'nombre'=>$disponibilidadDocente->nombre]);
    }

    public function search($q)
    {
        //$q = Input::get('q');
        $disponibilidadDocente = $this->DisponibilidadDocenteRepo->search($q);

        return response()->json($disponibilidadDocente);
    }
    public function select(){
        $disponibilidadDocente = $this->DisponibilidadDocenteRepo->all();
        return response()->json($disponibilidadDocente); 
    }
}