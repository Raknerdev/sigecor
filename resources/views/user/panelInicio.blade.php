@extends('adminlte::page')
@section('title','Correspondencia Enviada')
@section('content')

<div class="mt-3 row">
          <div class="col-lg-3 col-6">
            <!-- small box -->
            <div class="small-box bg-info">
              <div class="inner">
                <h3>{{$cont}}</h3>

                <p><b>Enviadas Abiertas</b></p>
               </div>
               <div class="icon"> 
               <i class="fas fa-user-check"></i>
               </div>
           </div>
          </div>
          <!-- ./col -->

          <div class="col-lg-3 col-6">
            <!-- small box -->
            <div class="small-box bg-success">
              <div class="inner">
                <h3>{{$cont1}}</h3>

                <p><b>Enviadas Cerradas</b></p>
              </div>
              <div class="icon">
                <i class="fas fa-ellipsis-h"></i>
              </div>
             </div>
          </div>
          <!-- ./col -->
          
          <div class="col-lg-3 col-6">
            <!-- small box -->
            <div class="small-box bg-warning">
              <div class="inner">
                <h3 class="text-white">{{$cont2}}</h3>

                <p class="text-white"> <b>Recibidas Abiertas</b></p>
              </div>
              <div class="icon">
                <i class="fas fa-check-double"></i>
              </div>
           </div>
          </div>
          <!-- ./col -->

          <div class="col-lg-3 col-6">
            <!-- small box -->
            <div class="small-box bg-danger">
              <div class="inner">
                <h3>{{$cont3}}</h3>

                <p><b>Recibidas Cerradas</b></p>
              </div>
              <div class="icon">
                <i class="fas fa-folder-minus"></i>
              </div>
              </div>
          </div>
          <!-- ./col -->

          <div class=" row justify-content-center">
            <img class="w-80"  height="749px" src="{{ asset('img/correspondencia.png') }}" alt="Correspondencia">
            <div></div>
            </div> 

@endsection