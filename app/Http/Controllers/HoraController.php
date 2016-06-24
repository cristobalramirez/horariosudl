<?php

namespace Salesfly\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Routing\Controller;

use Salesfly\Salesfly\Repositories\HoraRepo;
use Salesfly\Salesfly\Managers\HoraManager;

class HoraController extends Controller {//Te Quiero Mucho

    protected $horaRepo;

    public function __construct(HoraRepo $horaRepo)
    {
        $this->horaRepo = $horaRepo;
    }
    public function validastationname($text){
        
        $hora = $this->horaRepo->validarNoRepit($text);

        return response()->json($hora);
    }

    public function index()
    {
        return View('hora.index');
    }
    public function asignarcarga()
    {
        return View('hora.asignarcarga');
    }

    public function all()
    {
        $hora = $this->horaRepo->paginate(15);
        return response()->json($hora);
        //var_dump($hora);
    }

    public function paginatep(){
        $hora = $this->horaRepo->paginate(15);
        return response()->json($hora);
    }


    public function form_create()
    {
        return View('hora.form_create');
    }

    public function form_edit()
    {
        return View('hora.form_edit');
    }

    public function create(Request $request)
    {
        \DB::beginTransaction();
        $var = $request->cursos;
        foreach($var as $object){
            $hora = $this->horaRepo->getModel();
            $insertar=new HoraManager($hora,$object);
            $insertar->save();
          
            $horaRepo = null;
        }
        \DB::commit();
        return response()->json(['estado'=>true]);
    }

    public function find($id)
    {
        $station = $this->horaRepo->find($id);
        return response()->json($station);
    }

    public function edit(Request $request)
    {
        $station = $this->horaRepo->find($request->id);

        $manager = new HoraManager($station,$request->all());
        $manager->save();

        return response()->json(['estado'=>true, 'nombre'=>$station->nombre]);
    }

    public function destroy(Request $request)
    {
        $station= $this->horaRepo->find($request->id);
        $station->delete();
        //Event::fire('update.station',$station->all());
        return response()->json(['estado'=>true, 'nombre'=>$station->nombre]);
    }

    public function search($q)
    {
        $hora = $this->horaRepo->search($q);
        return response()->json($hora);
    }
    public function searchHora($a,$b,$c)
    {
        $carga=$this->horaRepo->searchHora($a,$b,$c);
        return response()->json($carga);
    }
}