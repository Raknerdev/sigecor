@extends('adminlte::page')
@section('title','Correspondencia Enviada')
@section('content')

    <div class="content">
        <div class="container-fluid">
              <div class="modal" id="creacion" tabindex="-1" style="text-transform: uppercase;">
    <div class="modal-dialog modal-lg">
    <div class="modal-content">
    <div class="modal-header">
<div class="mx-auto pl-5"><h5 class="modal-title ml-5 pl-3">Registro de Correspondencia Enviada</h5></div>

    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
      <span aria-hidden="true">&times;</span>
    </button>
</div>
<form action="http://sigecor.gob/add_enviado" name="Enviado" method="POST" enctype="multipart/form-data">
  <input type="hidden" name="_token" value="JGEL4ZBWXW6EHsZJb0EHI60u0SekVMlnRSF76WNL"><div class="modal-body">
    <div class="card-body pt-0 pb-0">
        <div class="row">
          
          <div class="col-md-6">
            <div class="form-group">
              <label for="fecha_doc">Fecha del Documento:</label>
              <input type="date" name="fecha_doc" class="form-control" required="">
            </div>

<div class="form-group">
<label for="referencia">Referencia:</label>
<textarea name="referencia" class="form-control" cols="30" rows="5" maxlength="320"
 placeholder="DESCRIPCIÓN CORTA DEL DOCUMENTO" style="text-transform: uppercase; resize: none;" required=""></textarea>
</div>
            <div class="form-group">
             <label for="tipo">Tipo de Correspondencia:</label>
             <select class="form-control" name="tipo" required="" style="width: 100%;" onchange="Estados(this.value);">
                <option value="0" selected="" disabled="">SELECCIONE...
                </option><option value="1">INTERNA</option>
                <option value="2">EXTERNA</option>
              </select>
            </div>

            <div class="form-group">
              <label for="destinatario">Destinatario:</label>
 <select class="form-control select2" name="destinatario" id="des" style="width: 100%; text-transform: uppercase;" required="">
                <option value="-">- 
              </option></select>
            </div>

            <div class="form-group" id="estado" style="display: none;">
              <label for="estado">Estado:</label>
              <select class="form-control select2" name="estado" id="estados" style="width: 100%; text-transform: uppercase;">
                <option value="-">- 
              </option></select>
            </div>

      <div class="form-group">
        <label for="otro">Dato Adicional:</label>
      <input type="text" name="otro" class="form-control" placeholder="DATO ADICIONAL..." style="text-transform: uppercase;" required="">
        </div>

            <div class="form-group">
              <label for="ccopia_a">Con Copia:</label>
         <select class="form-control select2" name="copia_a" onchange="copia_a(this.value);" style="width: 100%;" required="">
                <option value="0" selected="" disabled="">SELECCIONE...
                </option><option value="SI">SI</option>
                <option value="NO">NO</option>
              </select>
            </div>
            
            <div id="copy" style="display: none;">
              <div class="form-group">
                <label for="ccopia">Copia a:</label>
                <select class="form-control select2" name="copia" id="cop" style="width: 100%;">
                  <option value="-">- 
                </option></select>
              </div>
            </div>                 
          </div>
          
          <div class="col-md-6">
            <div class="form-group">
              <label for="fecha_rec">Fecha de Recibido:</label>
              <input type="date" name="fecha_rec" class="form-control" required="">
            </div>

            <div class="form-group">
              <label for="file">Documento:</label>
              <input type="file" name="file" class="custom-file" id="archivo" required="">
            </div>

            <div class="form-group">
              <label for="tipo_doc">Tipo de Documento:</label>
              <select class="form-control select2" name="tipo_doc" style="width: 100%;" onchange="tipoDoc(this.value);" required="">
                <option value="CIRCULAR">CIRCULAR</option>
                <option value="INFORME">INFORME</option>
                <option value="MEMORANDO">MEMORANDO</option>
                <option value="OFICIO">OFICIO</option>
                <option value="NOTA DE ENTREGA">NOTA DE ENTREGA</option>
                <option value="NOTA DE SALIDA">NOTA DE SALIDA</option>
                <option value="PUNTO DE CUENTA">PUNTO DE CUENTA</option>
              </select>
            </div>

            <div class="form-group">
              <div id="Oficio">
                <label for="nro">Nro. de Documento:</label>
                <div class="row px-2" id="normal">
                  <input type="number" name="nro_c" class="form-control" placeholder="542" style="width: 100%;">
                </div>
              </div>
              
              <div id="Oficio" style="display: none;">
                <label for="nro_doc">Nro.de Documento:</label>
                <div class="row px-2" id="oficio">
                  <select class="form-control select2" name="nro_doc" style="width: 25%;">
                    <option value="DM N" selected="">DM N</option>
                  </select>
                  <input type="number" name="nro" class="form-control" placeholder="542" style="width: 65%;">
                </div>
              </div>
            </div>

            <div>
              <label for="recibido_por">Registrada por:</label>
              <input type="text" name="recibido_por" class="form-control" value="Admin-Sistemas" style="text-transform: uppercase;">
            </div>

            <div>
              <label for="accion">Acción:</label>
              <select class="form-control select2" name="accion" style="width: 100%;" onchange="mostrar(this.value);" required="">
                <option value="EVALUAR Y RECOMENDAR" selected="">EVALUAR Y RECOMENDAR</option>
                <option value="CIRCULAR">CIRCULAR</option>
                <option value="REQUIERE RESPUESTA">REQUIERE RESPUESTA</option>
                <option value="RESPUESTA A">RESPUESTA A</option>
                <option value="ARCHIVAR">ARCHIVAR</option>
              </select>
            </div>

            <div >
              <div class="form-group">
                <label for="ref_doc">REFERENCIA DE RESPUESTA:</label>
                <input id="ref_doc" type="text" style="text-transform:uppercase;" class="form-control" name="ref_doc">
              </div>
            </div>

            <div>
              <div >
                <label for="fecha_lim">FECHA LIMITE PARA RESPONDER:</label>
                <input id="fecha_lim" type="date" class="form-control" name="fecha_lim">
              </div>
            </div>

            <div>
              <label for="bandeja_de">Bandeja de:</label>
              <select class="form-control select2" name="bandeja_de" id="c_der" style="width: 100%; text-transform: uppercase;">
              </select>
            </div>

            <div>
                <label for="seguimiento">Seguimiento:</label>
                <select class="form-control select2" name="seguimiento" style="width: 100%;" required="">
                  <option value="REVISAR INFORMACION" selected="">REVISAR INFORMACION</option>
                  <option value="DERIVAR">DERIVAR</option>
                  <option value="DERIVAR">ARCHIVAR</option>
                  <option value="REGISTRAR CORRESPONDENCIA">REGISTRAR CORRESPONDENCIA</option>
                </select>
            </div>

            <div>
              <label for="estatus">Estatus:</label>
              <select class="form-control select2" name="estatus" style="width: 100%;" required="">
                <option value="ABIERTO" selected="">ABIERTO</option>
                <option value="CERRADO">CERRADO</option>
                <option value="PENDIENTE">PENDIENTE</option>
                <option value="EXPIRADO">EXPIRADO</option>
              </select>
            </div>

          </div>
        </div>
    </div>
  </div>

  <div>
    <button type="button" class="btn btn-secondary" data-dismiss="modal">Cerrar</button>
    <button type="submit" class="btn btn-primary">Guardar</button>
  </div>

  </form>
   </div>
    </div>
     </div>

<div class="container-fluid mt-4 mb-5">
 <div class="row" style="text-transform: uppercase;">
  <div class="card-header col-12">
   <div class="float-left">
    <h4><b>CORRESPONDENCIA ENVIADA</b></h4>
</div>

<div class="float-right">
<button type="button" class="btn btn-success"
 id="btn-creacion" data-toggle="modal" data-target="#creacion" name="button">NUEVO ENVIO</button>
</div>
</div>


<div class="col-sm-12">
<div class="card card-green card-outline card-outline-tabs">
  <div class="card-header p-0 border-bottom-0">
    <ul class="nav nav-tabs" id="custom-tabs-four-tab" role="tablist">
      <li class="nav-item">
<a class="nav-link active" id="custom-tabs-four-corE-tab" data-toggle="pill" href="#custom-tabs-four-corE" role="tab" aria-controls="custom-tabs-four-corE" aria-selected="true"><b>Correspondencia Enviada</b></a>
      </li>
      <li class="nav-item">
<a class="nav-link" id="custom-tabs-four-cerrada-tab" data-toggle="pill" href="#custom-tabs-four-cerrada" role="tab" aria-controls="custom-tabs-four-cerrada" aria-selected="false"><b>Correspondencia Cerrada</b></a>
      </li>
    </ul>
  </div>

<div class="card-body">
 <div class="tab-content" id="custom-tabs-four-tabContent">
  <div class="tab-pane fade show active" id="custom-tabs-four-corE" role="tabpanel" aria-labelledby="custom-tabs-four-corE-tab">
   <div class="correspondencia_wrapper dataTables_wrapper dt-bootstrap4">
    <div class="row">
     <div class="col-md-12">
      <div id="DataTables_Table_0_wrapper" class="dataTables_wrapper dt-bootstrap4 no-footer">
       <div class="row"><div class="col-sm-12 col-md-6">
        <div class="dataTables_length" id="DataTables_Table_0_length">
         <label>Mostrando <select name="DataTables_Table_0_length" aria-controls="DataTables_Table_0" 
          class="custom-select custom-select-sm form-control form-control-sm">
      <option value="10">10</option><option value="25">25</option><option value="50">50</option><option value="100">100</option>
             </select> registros</label></div></div><div class="col-sm-12 col-md-6">
           <div id="DataTables_Table_0_filter" class="dataTables_filter">
          <label>Buscar:<input type="search" class="form-control form-control-sm" placeholder="" 
         aria-controls="DataTables_Table_0"></label></div></div></div><div class="row"><div class="col-sm-12">
      <table class="correspondencia table table-bordered table-striped dataTable dtr-inline no-footer collapsed" 
    role="grid" aria-describedby="DataTables_Table_0_info" id="DataTables_Table_0">
  <thead>

 <tr role="row" class="text-center"><th class="sorting sorting_asc" tabindex="0" aria-controls="DataTables_Table_0" rowspan="1" colspan="1" aria-sort="ascending"
 aria-label="CODIGO: activate to sort column descending">CODIGO</th><th class="sorting" tabindex="0" aria-controls="DataTables_Table_0" rowspan="1" colspan="1"
 aria-label="DOCUMENTO: activate to sort column ascending">DOCUMENTO</th><th class="sorting" tabindex="0" aria-controls="DataTables_Table_0" rowspan="1" colspan="1"
 aria-label="TIPO: activate to sort column ascending">TIPO</th><th class="sorting" tabindex="0" aria-controls="DataTables_Table_0" rowspan="1" colspan="1" 
 aria-label="DESTINATARIO: activate to sort column ascending">DESTINATARIO</th><th class="sorting" tabindex="0" aria-controls="DataTables_Table_0" rowspan="1" colspan="1"
 aria-label="DATO ADICIONAL: activate to sort column ascending">DATO ADICIONAL</th><th class="sorting" tabindex="0"
 aria-controls="DataTables_Table_0" rowspan="1" colspan="1" aria-label="ESTADO: activate to sort column ascending" style="display: none;">ESTADO</th><th class="sorting" tabindex="0"
 aria-controls="DataTables_Table_0" rowspan="1" colspan="1" aria-label="REFERENCIA: activate to sort column ascending" style="display: none;">REFERENCIA</th><th class="sorting" tabindex="0"
 aria-controls="DataTables_Table_0" rowspan="1" colspan="1" aria-label="ESTATUS: activate to sort column ascending" style="display: none;">ESTATUS</th><th class="sorting" tabindex="0"
 aria-controls="DataTables_Table_0" rowspan="1" colspan="1" aria-label="OPCIONES: activate to sort column ascending" style="display: none;">OPCIONES</th></tr>
             </thead>
              <tbody style="text-transform: uppercase;">                                                                                  

                    <tr class="odd">
                      <td class="dtr-control sorting_1" tabindex="0">DOC-EN001-21</td>
                      <td>8132</td>
                      <td>INTERNA</td>
                      <td>OFIC. DE TECNOLOGÍAS DE LA INFORMACIÓN Y LA COMUNICACIÓN</td>
                      <td>fefe</td>
                      <td style="display: none;">NO ESPECIFICADO</td>
                      <td style="display: none;">dfdfs</td>
                      <td style="display: none;">ABIERTO</td>
                      <td class="text-center" style="display: none;">
<a href="http://sigecor.gob/seguimiento_en/eyJpdiI6IkUzK0p2WmhRNTZlRm1maUwreElMOGc9PSIsInZhbHVlIjoiU3QwamRTSmY5UWw3MlBudUJOU3g1Zz09IiwibWFjIjoiMzZlNTBiY2MxOWNmM2U4YjNmYTNkNDc5OGI4OGExZmFjNDVhOGVhZDE2ODMzM2U3ZTAwYjU3NDk1NzJjMjU5ZSJ9" class="btn btn-sm btn-primary fas fa-file-word"> 
                      <span style="font-family: 'Oswald', sans-serif !important;"></span></a>
                     <a class="btn-sm btn-danger fas fa-trash-alt" id="eliminar"> ELIMINAR</a>
                     </td>
               </tr></tbody>

</table></div></div><div class="row"><div class="col-sm-12 col-md-5">
<div class="dataTables_info" id="DataTables_Table_0_info" role="status" aria-live="polite">Mostrando del 1 al 1 de 1 registros</div>
</div><div class="col-sm-12 col-md-7"><div class="dataTables_paginate paging_simple_numbers" id="DataTables_Table_0_paginate">
<ul class="pagination"><li class="paginate_button page-item previous disabled" id="DataTables_Table_0_previous">
<a href="#" aria-controls="DataTables_Table_0" data-dt-idx="0" tabindex="0" class="page-link">Anterior</a></li>
<li class="paginate_button page-item active"><a href="#" aria-controls="DataTables_Table_0" data-dt-idx="1" tabindex="0" class="page-link">1</a>
</li><li class="paginate_button page-item next disabled" id="DataTables_Table_0_next">
<a href="#" aria-controls="DataTables_Table_0" data-dt-idx="2" tabindex="0" class="page-link">Siguiente</a>
</li></ul></div></div></div></div>
          
        </div>
      </div>
    </div>
  </div>
  
  <div class="tab-pane fade" id="custom-tabs-four-cerrada" role="tabpanel" aria-labelledby="custom-tabs-four-cerrada-tab">
    <div class="correspondencia_wrapper dataTables_wrapper dt-bootstrap4">
      <div class="row">
        <div class="col-md-12">
          <div id="DataTables_Table_1_wrapper" class="dataTables_wrapper dt-bootstrap4 no-footer"><div class="row"><div class="col-sm-12 col-md-6"><div class="dataTables_length" id="DataTables_Table_1_length"><label>Mostrando <select name="DataTables_Table_1_length" aria-controls="DataTables_Table_1" class="custom-select custom-select-sm form-control form-control-sm"><option value="10">10</option><option value="25">25</option><option value="50">50</option><option value="100">100</option></select> registros</label></div></div><div class="col-sm-12 col-md-6"><div id="DataTables_Table_1_filter" class="dataTables_filter"><label>Buscar:<input type="search" class="form-control form-control-sm" placeholder="" aria-controls="DataTables_Table_1"></label></div></div></div><div class="row"><div class="col-sm-12"><table class="correspondencia table table-bordered table-striped dataTable dtr-inline no-footer" role="grid" aria-describedby="DataTables_Table_1_info" id="DataTables_Table_1">
            <thead>
              <tr role="row" class="text-center"><th class="sorting sorting_asc" tabindex="0" aria-controls="DataTables_Table_1" rowspan="1" colspan="1" aria-sort="ascending" aria-label="CODIGO: activate to sort column descending">CODIGO</th><th class="sorting" tabindex="0" aria-controls="DataTables_Table_1" rowspan="1" colspan="1" aria-label="DOCUMENTO: activate to sort column ascending">DOCUMENTO</th><th class="sorting" tabindex="0" aria-controls="DataTables_Table_1" rowspan="1" colspan="1" aria-label="TIPO: activate to sort column ascending">TIPO</th><th class="sorting" tabindex="0" aria-controls="DataTables_Table_1" rowspan="1" colspan="1" aria-label="DESTINATARIO: activate to sort column ascending">DESTINATARIO</th><th class="sorting" tabindex="0" aria-controls="DataTables_Table_1" rowspan="1" colspan="1" aria-label="DATO ADICIONAL: activate to sort column ascending">DATO ADICIONAL</th><th class="sorting" tabindex="0" aria-controls="DataTables_Table_1" rowspan="1" colspan="1" aria-label="ESTADO: activate to sort column ascending">ESTADO</th><th class="sorting" tabindex="0" aria-controls="DataTables_Table_1" rowspan="1" colspan="1" aria-label="REFERENCIA: activate to sort column ascending">REFERENCIA</th><th class="sorting" tabindex="0" aria-controls="DataTables_Table_1" rowspan="1" colspan="1" aria-label="ESTATUS: activate to sort column ascending">ESTATUS</th><th class="sorting" tabindex="0" aria-controls="DataTables_Table_1" rowspan="1" colspan="1" aria-label="OPCIONES: activate to sort column ascending">OPCIONES</th></tr>
            </thead>
            <tbody style="text-transform: uppercase;">
                           
            <tr class="odd"><td valign="top" colspan="9" class="dataTables_empty">No hay datos registrados</td></tr></tbody>
          </table></div></div><div class="row"><div class="col-sm-12 col-md-5">
          <div class="dataTables_info" id="DataTables_Table_1_info" role="status" aria-live="polite">Mostrando 0 de 0 registros</div></div>
          <div class="col-sm-12 col-md-7"><div class="dataTables_paginate paging_simple_numbers" id="DataTables_Table_1_paginate">
            <ul class="pagination"><li class="paginate_button page-item previous disabled" id="DataTables_Table_1_previous">
              <a href="#" aria-controls="DataTables_Table_1" data-dt-idx="0" tabindex="0" class="page-link">Anterior</a></li>
              <li class="paginate_button page-item next disabled" id="DataTables_Table_1_next">
                <a href="#" aria-controls="DataTables_Table_1" data-dt-idx="1" tabindex="0" class="page-link">Siguiente</a>
              </li></ul></div></div></div></div>
        </div>
      </div>
    </div>
  </div>
</div>
 </div>
  </div>
 </div>                          
 </div>
</div>
 </div>
</div>

<script src="http://sigecor.gob/vendor/jquery/jquery.min.js"></script>
<script src="http://sigecor.gob/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
<script src="http://sigecor.gob/vendor/overlayScrollbars/js/jquery.overlayScrollbars.min.js"></script>
<script src="//cdnjs.cloudflare.com/ajax/libs/select2/4.0.3/js/select2.min.js"></script>         
<script src="http://sigecor.gob/vendor/adminlte/dist/js/adminlte.min.js"></script>
<script src="http://sigecor.gob/js/jquery/jquery.js"></script>
<script type="text/javascript">

function mostrar(id){ 
if (id == "EVALUAR Y RECOMENDAR"){
$("#obsres").hide();
$("#obsfec").hide();
}
if (id == "CIRCULAR"){
$("#obsres").hide();
$("#obsfec").hide();
}
if (id == "REQUIERE RESPUESTA") {
$("#obsfec").show();
$("#obsres").hide();
}
if (id == "RESPUESTA A"){ 
$("#obsres").show();
$("#obsfec").hide();
}
if (id == "ARCHIVAR"){
$("#obsres").hide();
$("#obsfec").hide();
}
 }
function Estados(id){
var urlEInternos = "http://sigecor.gob/get/internos";
var urlEExternos = "http://sigecor.gob/get/externos";
var $el = $("#des");
if (id == 2){
$("#estado").show();
$(function () {
  $.get(urlEExternos, function(data, status)
  {
    $el.empty(); // remove old options
    $.each(data, function(key,value) {
      $el.append($("<option></option>")
         .attr("value", value.name).text(value.name));
    });
     console.log(data);
  });
});
}else{
$("#estado").hide();
$(function () {
  $.get(urlEInternos, function(data, status)
  {
    $el.empty(); // remove old options
    $.each(data, function(key,value) {
      $el.append($("<option></option>")
         .attr("value", value.name).text(value.name));
    });
     console.log(data);
  }).fail(function()
  {
     console.log("Error");
  });
});
}
}
function tipoDoc(id){ 
if (id == "OFICIO"){
$("#sOficio").show();
$("#nOficio").hide();
}else{
$("#nOficio").show();
$("#sOficio").hide();
}
}
function copia_a(id){
var urlEInternos = "http://sigecor.gob/get/internos";
var $cp = $("#cop");
if (id == "SI"){
$("#ccopy").show();

$(function () {
  $.get(urlEInternos, function(data, status)
  {
    $cp.empty(); // remove old options
    $.each(data, function(key,value) {
      $cp.append($("<option></option>")
         .attr("value", value.name).text(value.name));
    });
     console.log(data);
  }).fail(function()
  {
     console.log("Error");
  });
});
}else{
$("#ccopy").hide();
}
}
</script>

<script src="http://sigecor.gob/theme/lte/plugins/jquery/jquery.min.js"></script>
<script src="http://sigecor.gob/theme/lte/plugins/datatables/jquery.dataTables.min.js"></script>
<script src="http://sigecor.gob/theme/lte/plugins/datatables-bs4/js/dataTables.bootstrap4.min.js"></script>
<script src="http://sigecor.gob/theme/lte/plugins/datatables-responsive/js/dataTables.responsive.min.js"></script>
<script src="http://sigecor.gob/theme/lte/plugins/datatables-responsive/js/responsive.bootstrap4.min.js"></script>
<script src="http://sigecor.gob/theme/lte/plugins/datatables-buttons/js/dataTables.buttons.min.js"></script>
<script src="http://sigecor.gob/theme/lte/plugins/datatables-buttons/js/buttons.bootstrap4.min.js"></script>
<script src="http://sigecor.gob/theme/lte/plugins/jszip/jszip.min.js"></script>
<script src="http://sigecor.gob/theme/lte/plugins/pdfmake/pdfmake.min.js"></script>
<script src="http://sigecor.gob/theme/lte/plugins/pdfmake/vfs_fonts.js"></script>
<script src="http://sigecor.gob/theme/lte/plugins/datatables-buttons/js/buttons.html5.min.js"></script>
<script src="http://sigecor.gob/theme/lte/plugins/datatables-buttons/js/buttons.print.min.js"></script>
<script src="http://sigecor.gob/theme/lte/plugins/datatables-buttons/js/buttons.colVis.min.js"></script>

<script>
$(function () {
$(function () {
$(".correspondencia").DataTable({
    "responsive": true, 
    "lengthChange": true, 
    "autoWidth": true,
    "searching": true,
    "ordering": true,
    "info": true,
    // "buttons": ["copy", "csv", "excel", "pdf", "print", "colvis"]
}).container().appendTo('.correspondencia_wrapper .col-md-6:eq(0)');
});
$('#btn-creacion').on('click', function () {
  event.preventDefault();
  var url =  "http://sigecor.gob/get/users";
  var urlEstados =  "http://sigecor.gob/get/estados";
  // console.log(url);
  $.get(url, function(data, status)
  {
    var $el = $("#c_der");
    $el.empty(); // remove old options
    $.each(data, function(key,value) {
      $el.append($("<option></option>")
    .attr("value", value.id).text(value.name));
    });
     console.log(data);
  }).fail(function()
  {
     console.log("Error");
  });
  $.get(urlEstados, function(data, status)
  {
    var $el = $("#estados");
    $el.empty(); // remove old options
    $.each(data, function(key,value) {
      $el.append($("<option></option>")
    .attr("value", value.nombre).text(value.nombre));
    });
     console.log(data);
  }).fail(function()
  {
console.log("Error");
     });
   });
 });
</script>

@endsection