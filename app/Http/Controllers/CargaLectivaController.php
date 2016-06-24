<?php

namespace Salesfly\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Routing\Controller;

use Salesfly\Salesfly\Repositories\CargaLectivaRepo;
use Salesfly\Salesfly\Managers\CargaLectivaManager;

class CargaLectivaController extends Controller {//Te Quiero Mucho

    protected $cargaLectivaRepo;

    public function __construct(CargaLectivaRepo $cargaLectivaRepo)
    {
        $this->cargaLectivaRepo = $cargaLectivaRepo;
    }
    public function validastationname($text){
        
        $cargaLectiva = $this->cargaLectivaRepo->validarNoRepit($text);

        return response()->json($cargaLectiva);
    }

    public function index()
    {
        return View('cargaLectiva.index');
    }
    public function asignarcarga()
    {
        return View('cargaLectiva.asignarcarga');
    }

    public function all()
    {
        $cargaLectiva = $this->cargaLectivaRepo->paginate(15);
        return response()->json($cargaLectiva);
        //var_dump($cargaLectiva);
    }

    public function paginatep(){
        $cargaLectiva = $this->cargaLectivaRepo->paginate(15);
        return response()->json($cargaLectiva);
    }


    public function form_create()
    {
        return View('cargaLectiva.form_create');
    }

    public function form_edit()
    {
        return View('cargaLectiva.form_edit');
    }

    public function create(Request $request)
    {
        \DB::beginTransaction();
        $var = $request->cursos;
        //var_dump($var);die();

        foreach($var as $object){
            $cargaLectiva = $this->cargaLectivaRepo->getModel();
            $insertar=new CargaLectivaManager($cargaLectiva,$object);
            $insertar->save();
          
            $cargaLectivaRepo = null;
        }
        \DB::commit();
        return response()->json(['estado'=>true]);
    }

    public function find($id)
    {
        $station = $this->cargaLectivaRepo->find($id);
        return response()->json($station);
    }

    public function edit(Request $request)
    {
        $station = $this->cargaLectivaRepo->find($request->id);

        $manager = new CargaLectivaManager($station,$request->all());
        $manager->save();

        return response()->json(['estado'=>true, 'nombre'=>$station->nombre]);
    }

    public function destroy(Request $request)
    {
        $station= $this->cargaLectivaRepo->find($request->id);
        $station->delete();
        //Event::fire('update.station',$station->all());
        return response()->json(['estado'=>true, 'nombre'=>$station->nombre]);
    }

    public function search($q)
    {
        $cargaLectiva = $this->cargaLectivaRepo->search($q);
        return response()->json($cargaLectiva);
    }
    public function searchCarga($a,$b,$c)
    {
        $carga=$this->cargaLectivaRepo->searchCarga($a,$b,$c);
        return response()->json($carga);
    }
    public function searchCargaSemestre($a,$b,$c)
    {
        $carga=$this->cargaLectivaRepo->searchCargaSemestre($a,$b,$c);
        return response()->json($carga);
    }
}