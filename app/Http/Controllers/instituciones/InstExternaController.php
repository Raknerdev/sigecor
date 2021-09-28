<?php

namespace App\Http\Controllers\instituciones;

use App\Http\Controllers\Controller;
use App\Models\institucion\EntesExternos;
use Illuminate\Http\Request;

class InstExternaController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()

    {    $externo = EntesExternos::paginate(5);
        return view('admin.Instexternas.index', \compact('externo'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    
    public function store(Request $request,EntesExternos $externo)
    {

 $request->validate(
           [ 'name'=>'required', 
            
        ]);
            $externo = EntesExternos::create($request->all());
             return \redirect()->route('externo.index')->with
                                ('info','Registro Exitoso!!');
    }

  
    

    public function update(Request $request, EntesExternos $externo)
    {
       $request->validate(
           [ 'name'=>'required', 
           'slug'=>"required|unique:entes,slug,$externo->id"
     ]);
     $externo->update($request->all());
   return \redirect()->route('externo.index')->with
                                ('info','Registro Exitoso!!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(EntesExternos $externo)
    {
       $externo->delete();
   return redirect()->route('externo.index');
    }
}
