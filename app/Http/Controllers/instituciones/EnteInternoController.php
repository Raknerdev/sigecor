<?php

namespace App\Http\Controllers\instituciones;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\institucion\EntesInternos;
class EnteInternoController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
      $interno = EntesInternos::paginate(5);
        return view('admin.InstInternas.index', \compact('interno'));
    }

        
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
    
    public function store(Request $request,EntesInternos $interno)
    {

 $request->validate(
           [ 'name'=>'required', 
            
        ]);
            $interno = EntesInternos::create($request->all());
             return \redirect()->route('interno.index')->with
                                ('info','Registro Exitoso!!');
    }

  
    public function edit(EntesInternos $interno)
    {
   
    }

    public function update(Request $request, EntesInternos $interno)
    {
       $request->validate(
           [ 'name'=>'required', 
           'slug'=>"required|unique:entes,slug,$interno->id"
     ]);
     $interno->update($request->all());
   return \redirect()->route('interno.index')->with
                                ('info','Registro Exitoso!!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(EntesInternos $interno)
    {
       $interno->delete();
   return redirect()->route('interno.index');
    }
}
