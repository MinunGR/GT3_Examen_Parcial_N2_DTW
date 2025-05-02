@extends('backend.menus.superior')

@section('content-admin-css')
    <link href="{{ asset('css/adminlte.min.css') }}" type="text/css" rel="stylesheet" />
    <link href="{{ asset('css/dataTables.bootstrap4.css') }}" type="text/css" rel="stylesheet" />
    <link href="{{ asset('css/toastr.min.css') }}" type="text/css" rel="stylesheet" />
    <link href="{{ asset('css/buttons_estilo.css') }}" rel="stylesheet">
@stop

<style>
    table {
        /*Ajusta las tablas*/
        table-layout: fixed;
    }
</style>


<!--
<div id="divcontenedor" style="display: none">
    <section class="content-header">
        <div class="container-fluid">
            <div class="col-sm-12">
                <h1>Listado de Libros</h1>
            </div>
            <br>
        </div>
    </section>

    <section class="content">
        <div class="container-fluid">
            <div class="card card-success">
                <div class="card-header">
                    <h3 class="card-title">Listado</h3>
                </div>
                <div class="card-body">
                    <div class="row">
                        <div class="col-md-12">
                            <div id="tablaDatatableXML"></div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

</div>
-->


<div id="divcontenedor" style="display: none;">
    <section class="content-header py-2">
        <div class="container-fluid px-2 d-flex justify-content-center"">
            <h1 class="h4 mb-0">Vista XML</h1>
        </div>
    </section>

    <section class="content">
        <div class="container-fluid px-2">
            <div class="card shadow-sm border-success mb-0">

                <div class="card-body py-2">
                    <div id="tablaDatatableXML" class="table-responsive">
                        <!-- Aquí se carga la tabla -->
                    </div>
                </div>
            </div>
        </div>
    </section>
</div>


@extends('backend.menus.footerjs')
@section('archivos-js')

    <script src="{{ asset('js/jquery.dataTables.js') }}" type="text/javascript"></script>
    <script src="{{ asset('js/dataTables.bootstrap4.js') }}" type="text/javascript"></script>

    <script src="{{ asset('js/toastr.min.js') }}" type="text/javascript"></script>
    <script src="{{ asset('js/axios.min.js') }}" type="text/javascript"></script>
    <script src="{{ asset('js/sweetalert2.all.min.js') }}"></script>
    <script src="{{ asset('js/alertaPersonalizada.js') }}"></script>


    <!-- Para incluir la tabla -->
    <script type="text/javascript">
        $(document).ready(function(){
            var ruta = "{{ URL::to('/parcial/xml/tabla') }}";
            $('#tablaDatatableXML').load(ruta);
            document.getElementById("divcontenedor").style.display = "block";
        });
    </script>

@stop