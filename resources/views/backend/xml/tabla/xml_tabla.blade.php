<!--
<section class="content">
    <div class="container-fluid">
        <div class="row">
            <div class="col-12">
                <div class="card">
                    <!-- /.card-header -->
                    <!--div class="card-body">
                        <table id="tabla" class="table table-bordered table-striped">
                            <thead>
                                <tr>
                                    <th style="width: 10%">Titulo</th>
                                    <th style="width: 10%">Autor</th>
                                    <th style="width: 10%">Año</th>
                                    <th style="width: 10%">Género</th>
                                    <th style="width: 10%">Publisher</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($books as $book)
                                    <tr>
                                        <td>{{ $book['title'] }}</td>
                                        <td>{{ $book['author'] }}</td>
                                        <td>{{ $book['year'] }}</td>
                                        <td>{{ $book['genre'] }}</td>
                                        <td>{{ $book['publisher'] }}</td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
-->
<section class="content">
    <div class="container-fluid px-2">
        <div class="row">
            <div class="col-12">
                <div class="card shadow-sm border-0">
                    <div class="card-header bg-primary text-white text-center">
                        <h5 class="mb-0">Lista de Libros</h5>
                    </div>
                    <div class="card-body p-3">
                        <div class="table-responsive">
                            <table id="tabla" class="table table-hover table-bordered align-middle text-center">
                                <thead class="table-dark">
                                    <tr>
                                        <th style="width: 20%">Título</th>
                                        <th style="width: 20%">Autor</th>
                                        <th style="width: 15%">Año</th>
                                        <th style="width: 20%">Género</th>
                                        <th style="width: 25%">Editorial</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($books as $book)
                                        <tr>
                                            <td>{{ $book['title'] }}</td>
                                            <td>{{ $book['author'] }}</td>
                                            <td>{{ $book['year'] }}</td>
                                            <td>{{ $book['genre'] }}</td>
                                            <td>{{ $book['publisher'] }}</td>
                                        </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

<script>
    $(function() {
        $("#tabla").DataTable({
            "paging": true,
            "lengthChange": true,
            "searching": true,
            "ordering": true,
            "info": true,
            "autoWidth": false,
            "pagingType": "full_numbers",
            "lengthMenu": [
                [10, 25, 50, 100, 150, -1],
                [10, 25, 50, 100, 150, "Todo"]
            ],
            "language": {

                "sProcessing": "Procesando...",
                "sLengthMenu": "Mostrar _MENU_ registros",
                "sZeroRecords": "No se encontraron resultados",
                "sEmptyTable": "Ningún dato disponible en esta tabla",
                "sInfo": "Mostrando registros del _START_ al _END_ de un total de _TOTAL_ registros",
                "sInfoEmpty": "Mostrando registros del 0 al 0 de un total de 0 registros",
                "sInfoFiltered": "(filtrado de un total de _MAX_ registros)",
                "sInfoPostFix": "",
                "sSearch": "Buscar:",
                "sUrl": "",
                "sInfoThousands": ",",
                "sLoadingRecords": "Cargando...",
                "oPaginate": {
                    "sFirst": "Primero",
                    "sLast": "Último",
                    "sNext": "Siguiente",
                    "sPrevious": "Anterior"
                },
                "oAria": {
                    "sSortAscending": ": Activar para ordenar la columna de manera ascendente",
                    "sSortDescending": ": Activar para ordenar la columna de manera descendente"
                }

            },
            "responsive": true,
            "lengthChange": true,
            "autoWidth": false,
        });
    });
</script>