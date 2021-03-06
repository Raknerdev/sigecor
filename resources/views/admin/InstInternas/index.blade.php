@extends('adminlte::page')
@section('plugins.Datatables', true)
@section('title', 'Dashboard')

@section('content_header')
    <h1><b>Tablero Administrativo</b></h1>
@stop

@section('content')
    <div class="content mt-3 mb-3" style="text-transform: uppercase;">
        <div class="container-fluid">
            <div class="row">
                <div class="col-md-12">
                    <small>
                        <div class="card card-warning card-outline shadow">
                            <div class="card-header">
                                <div class="d-flex justify-content-between">
                                    <h3 class="card-title"> <b>
                                        LISTA DE INSTITUCIONES INTERNAS
                                    </b> </h3>
                                    <button type="button" class="btn-sm btn-success ml-auto fas fa-user-plus"
                                        data-toggle="modal" data-target=".ModalInstitucion"> Registrar Institución</button>
                                </div>
                            </div>
                            <div class="card-body">

                                <table id="dtable" class="table table-striped table-bordered" style="width:100%">
                                    <thead>
                                        <tr role="row" class="text-center">
                                            <th><b>INSTITUCIÓN</b></th>

                                            <th width="2px">OPCIONES</th>

                                        </tr>
                                    </thead>

                                    <tbody style="text-transform: uppercase;">
                                        @foreach ($interno as $ente)
                                            <tr>
                                                <td>
                                                    {{ $ente->name }}
                                                </td>

                                                <td width="2px" class="mb-2">
                                                    <a class="btn-primary btn-sm far fa-edit mb-2" data-toggle="modal"
                                                        data-target=".ModalInstEditn" href=""></a>
                                                </td>

                                                {{-- <td width="2px" class="mb-2">
                                                    {!! Form::open(['method' => 'DELETE', 'url' => route('interno.destroy', $ente->id)]) !!}

                                                    {!! Form::button('', ['type' => 'submit', 'class' => 'btn btn-danger btn-sm far fa-trash-alt', 'title' => 'ELIMINAR', 'onclick' => 'return confirm("SEGURO QUE DESEA ELIMINAR!!!")']) !!}

                                                    {!! Form::close() !!}


                                                </td> --}}
                                            </tr>
                                        @endforeach
                                    </tbody>
                                </table>

                            </div>
                            <div class="card-footer">
                                {{ $interno->links() }}
                            </div>
                        </div>
                    </small>
                </div>

            </div>
        </div>
    </div>



    <div class="modal fade ModalInstitucion" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel"
        aria-hidden="true">
        <div class="modal-dialog modal-lg">
            <div class="modal-content">

                <div class="card-body">
                    {!! Form::open(['route' => 'interno.store']) !!}
                    <div class="form-group">
                        {!! Form::label('name', 'Nombre de la Institucion') !!}
                        {!! Form::text('name', null, ['class' => 'form-control', 'placeholder' => 'Ingrese el nombre  de la institución']) !!}
                        @error('name')
                            <span class="text-danger">
                                {{ $message }}
                            </span>

                        @enderror
                    </div>
                    <div class="form-group">
                        {!! Form::label('slug', 'Slug') !!}
                        {!! Form::text('slug', null, ['class' => 'form-control', 'readonly', 'placeholder' => 'Ingrese el nombre  de la institución']) !!}
                        @error('slug')
                            <span class="text-danger">
                                {{ $message }}
                            </span>

                        @enderror
                    </div>

                    {!! Form::submit('Guardar', ['class' => 'btn btn-primary btn-sm']) !!}

                    {!! Form::close() !!}
                </div>
            </div>
        </div>
    </div>
    <div class="modal fade updatemodal" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-lg">
            <div class="modal-content">

                <div class="card-body">
                    {!! Form::open(['route' => 'interno.store']) !!}
                    <div class="form-group">
                        {!! Form::label('name', 'Nombre de la Institución') !!}
                        {!! Form::text('name', null, ['class' => 'form-control', 'placeholder' => 'Ingrese el nombre  de la institución']) !!}
                        @error('name')
                            <span class="text-danger">
                                {{ $message }}
                            </span>

                        @enderror
                    </div>
                    <div class="form-group">
                        {!! Form::label('slug', 'Slug') !!}
                        {!! Form::text('slug', null, ['class' => 'form-control', 'readonly', 'placeholder' => 'Ingrese el nombre  de la institución']) !!}
                        @error('slug')
                            <span class="text-danger">
                                {{ $message }}
                            </span>

                        @enderror
                    </div>

                    {!! Form::submit('Guardar', ['class' => 'btn btn-primary btn-sm']) !!}

                    {!! Form::close() !!}
                </div>
            </div>
        </div>
    </div>

@stop

@section('css')
    <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.11.2/css/jquery.dataTables.css">
    <link rel="stylesheet" href="/css/admin_custom.css">
@stop

@section('js')


    <script type="text/javascript" charset="utf8" src="https://cdn.datatables.net/1.11.2/js/jquery.dataTables.js"></script>

    <script>
        $(document).ready(function() {
                    $('#dtable').DataTable({

                    });
    </script>
@stop
