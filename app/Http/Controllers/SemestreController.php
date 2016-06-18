<?php

namespace Salesfly\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Routing\Controller;

use Salesfly\Salesfly\Repositories\SemestreRepo;
use Salesfly\Salesfly\Managers\SemestreManager;

class SemestreController extends Controller {//Te Quiero Mucho

    protected $SemestreRepo;

    public function __construct(SemestreRepo $SemestreRepo)
    {
        $this->SemestreRepo = $SemestreRepo;
    }
    public function validastationname($text){
        
        $semestre = $this->SemestreRepo->validarNoRepit($text);

        return response()->json($semestre);
    }

    public function index()
    {
        return View('semestre.index');
    }

    public function all()
    {
        $semestre = $this->SemestreRepo->paginate(15);
        return response()->json($semestre);
        //var_dump($semestre);
    }

    public function paginatep(){
        $semestre = $this->SemestreRepo->paginate(15);
        return response()->json($semestre);
    }


    public function form_create()
    {
        return View('semestre.form_create');
    }

    public function form_edit()
    {
        return View('semestre.form_edit');
    }

    public function create(Request $request)
    {
        $semestre = $this->SemestreRepo->getModel();
        //var_dump($request->all());
        //die();
        $manager = new SemestreManager($semestre,$request->all());
        //print_r($manager); die();
        $manager->save();
        //Event::fire('update.semestre',$semestre->all());

        return response()->json(['estado'=>true, 'nombre'=>$semestre->nombre]);
    }

    public function find($id)
    {
        $semestre = $this->SemestreRepo->find($id);
        return response()->json($semestre);
    }

    public function edit(Request $request)
    {
        $semestre = $this->SemestreRepo->find($request->id);

        $manager = new SemestreManager($semestre,$request->all());
        $manager->save();

        return response()->json(['estado'=>true, 'nombre'=>$semestre->nombre]);
    }

    public function destroy(Request $request)
    {
        $semestre= $this->SemestreRepo->find($request->id);
        $semestre->delete();
        //Event::fire('update.semestre',$semestre->all());
        return response()->json(['estado'=>true, 'nombre'=>$semestre->nombre]);
    }

    public function search($q)
    {
        //$q = Input::get('q');
        $semestre = $this->SemestreRepo->search($q);

        return response()->json($semestre);
    }
    public function select(){
        $semestre = $this->SemestreRepo->all();
        return response()->json($semestre); 
    }
}