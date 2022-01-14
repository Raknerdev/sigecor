<?php

namespace App\Http\Controllers;

use App\Models\Panel_Inicio;
use Illuminate\Http\Request;
use App\Models\docs\enviados;
use App\Models\docs\recibidos;
use Illuminate\Database\Migrations\Migration;
use Symfony\Component\VarDumper\VarDumper;
use illuminate\support\serviceProvider;
use illuminate\support\facades\Schema;

class Panel_InicioController extends Migration
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
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
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\PanelIncio  $panelIncio
     * @return \Illuminate\Http\Response
     */
    public function show()
    {
        $enviada = enviados::get();
        $recibida = recibidos::get();

        $data = [];
        
        $cont = 0;
        $cont1 = 0; 
        $cont2 = 0;
        $cont3 = 0;
        foreach($enviada as $enviadas){
            if ($enviadas->estatus == "ABIERTO") {
                $cont++;
            }else if ($enviadas->estatus == "CERRADO") {
                $cont1++;
            } 
        }
        foreach($recibida as $recibidas){
            if ($recibidas->estatus == "ABIERTO") {
                $cont2++;
            }else if ($recibidas->estatus == "CERRADO") {
                $cont3++;
            } 
            
        }
        $datos = json_encode($data);

        return view('user.panelInicio', compact('cont','cont1','cont2','cont3'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\PanelIncio  $panelIncio
     * @return \Illuminate\Http\Response
     */
    public function edit(Panel_inicio $panelIncio)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\PanelIncio  $panelIncio
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Panel_inicio $panelIncio)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\PanelIncio  $panelIncio
     * @return \Illuminate\Http\Response
     */
    public function destroy(Panel_Inicio $Panel_Inicio)
    {
        //
    }
        public function boot()
    {
    Schema::defaultStringLength(191);
 }

}
