<?php

namespace Salesfly\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Routing\Controller;

use Salesfly\Salesfly\Repositories\CategoryRepo;
use Salesfly\Salesfly\Managers\CategoryManager;

class CategoriesController extends Controller {//Te Quiero Mucho

    protected $categoryRepo;

    public function __construct(CategoryRepo $categoryRepo)
    {
        $this->categoryRepo = $categoryRepo;
    }
    public function validastationname($text){
        
        $categories = $this->categoryRepo->validarNoRepit($text);

        return response()->json($categories);
    }

    public function index()
    {
        return View('categories.index');
    }

    public function all()
    {
        $categories = $this->categoryRepo->paginate(15);
        return response()->json($categories);
        //var_dump($categories);
    }

    public function paginatep(){
        $categories = $this->categoryRepo->paginate(15);
        return response()->json($categories);
    }


    public function form_create()
    {
        return View('categories.form_create');
    }

    public function form_edit()
    {
        return View('categories.form_edit');
    }

    public function create(Request $request)
    {
        $categories = $this->categoryRepo->getModel();
        //var_dump($request->all());
        //die();
        $manager = new CategoryManager($categories,$request->all());
        //print_r($manager); die();
        $manager->save();
        //Event::fire('update.station',$station->all());

        return response()->json(['estado'=>true, 'nombre'=>$categories->nombre]);
    }

    public function find($id)
    {
        $station = $this->categoryRepo->find($id);
        return response()->json($station);
    }

    public function edit(Request $request)
    {
        $station = $this->categoryRepo->find($request->id);

        $manager = new CategoryManager($station,$request->all());
        $manager->save();

        return response()->json(['estado'=>true, 'nombre'=>$station->nombre]);
    }

    public function destroy(Request $request)
    {
        $station= $this->categoryRepo->find($request->id);
        $station->delete();
        //Event::fire('update.station',$station->all());
        return response()->json(['estado'=>true, 'nombre'=>$station->nombre]);
    }

    public function search($q)
    {
        //$q = Input::get('q');
        $categories = $this->categoryRepo->search($q);

        return response()->json($categories);
    }
}