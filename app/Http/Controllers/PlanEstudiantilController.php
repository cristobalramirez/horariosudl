<?php

namespace Salesfly\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Routing\Controller;

use Salesfly\Salesfly\Repositories\PlanEstudiantilRepo;
use Salesfly\Salesfly\Managers\PlanEstudiantilManager;

class PlanEstudiantilController extends Controller {//Te Quiero Mucho

    protected $planestudiantilRepo;

    public function __construct(PlanEstudiantilRepo $planestudiantilRepo)
    {
        $this->planestudiantilRepo = $planestudiantilRepo;
    }
    public function validastationname($text){
        
        $planestudiantil = $this->planestudiantilRepo->validarNoRepit($text);

        return response()->json($planestudiantil);
    }

    public function index()
    {
        return View('planestudiantil.index');
    }

    public function all()
    {
        $planestudiantil = $this->planestudiantilRepo->paginate(15);
        return response()->json($planestudiantil);
        //var_dump($planestudiantil);
    }

    public function paginatep(){
        $planestudiantil = $this->planestudiantilRepo->paginate(15);
        return response()->json($planestudiantil);
    }


    public function form_create()
    {
        return View('planestudiantil.form_create');
    }

    public function form_edit()
    {
        return View('planestudiantil.form_edit');
    }

    public function create(Request $request)
    {
        $planestudiantil = $this->planestudiantilRepo->getModel();
        //var_dump($request->all());
        //die();
        $manager = new PlanEstudiantilManager($planestudiantil,$request->all());
        //print_r($manager); die();
        $manager->save();
        //Event::fire('update.planestudiantil',$planestudiantil->all());

        return response()->json(['estado'=>true, 'nombre'=>$planestudiantil->nombre]);
    }

    public function find($id)
    {
        $planestudiantil = $this->planestudiantilRepo->find($id);
        return response()->json($planestudiantil);
    }

    public function edit(Request $request)
    {
        $planestudiantil = $this->planestudiantilRepo->find($request->id);

        $manager = new PlanEstudiantilManager($planestudiantil,$request->all());
        $manager->save();

        return response()->json(['estado'=>true, 'nombre'=>$planestudiantil->nombre]);
    }

    public function destroy(Request $request)
    {
        $planestudiantil= $this->planestudiantilRepo->find($request->id);
        $planestudiantil->delete();
        //Event::fire('update.planestudiantil',$planestudiantil->all());
        return response()->json(['estado'=>true, 'nombre'=>$planestudiantil->nombre]);
    }

    public function search($q)
    {
        //$q = Input::get('q');
        $planestudiantil = $this->planestudiantilRepo->search($q);

        return response()->json($planestudiantil);
    }
    public function selectPlan(){
        $planestudiantil = $this->planestudiantilRepo->all();
        return response()->json($planestudiantil); 
    }
}