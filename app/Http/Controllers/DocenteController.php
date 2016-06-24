<?php

namespace Salesfly\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Routing\Controller;

use Salesfly\Salesfly\Repositories\DocenteRepo;
use Salesfly\Salesfly\Managers\DocenteManager;

class DocenteController extends Controller {//Te Quiero Mucho

    protected $docenteRepo;

    public function __construct(DocenteRepo $docenteRepo)
    {
        $this->docenteRepo = $docenteRepo;
    }
    public function validastationname($text){
        
        $docente = $this->docenteRepo->validarNoRepit($text);

        return response()->json($docente);
    }

    public function index()
    {
        return View('docente.index');
    }

    public function all()
    {
        $docente = $this->docenteRepo->paginate(15);
        return response()->json($docente);
        //var_dump($docente);
    }

    public function paginatep(){
        $docente = $this->docenteRepo->paginate(15);
        return response()->json($docente);
    }


    public function form_create()
    {
        return View('docente.form_create');
    }

    public function form_edit()
    {
        return View('docente.form_edit');
    }

    public function create(Request $request)
    {
        $docente = $this->docenteRepo->getModel();
        $manager = new DocenteManager($docente,$request->all());
        $manager->save();

        return response()->json(['estado'=>true, 'nombre'=>$docente->nombre]);
    }

    public function find($id)
    {
        $station = $this->docenteRepo->find($id);
        return response()->json($station);
    }

    public function edit(Request $request)
    {
        $station = $this->docenteRepo->find($request->id);

        $manager = new DocenteManager($station,$request->all());
        $manager->save();

        return response()->json(['estado'=>true, 'nombre'=>$station->nombre]);
    }

    public function destroy(Request $request)
    {
        $station= $this->docenteRepo->find($request->id);
        $station->delete();
        //Event::fire('update.station',$station->all());
        return response()->json(['estado'=>true, 'nombre'=>$station->nombre]);
    }

    public function search($q)
    {
        $docente = $this->docenteRepo->search($q);
        return response()->json($docente);
    }
    public function searchCarga($q)
    {
        $docente = $this->docenteRepo->searchCarga($q);
        return response()->json($docente);
    }
}