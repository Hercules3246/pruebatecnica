@extends('layouts.app')

@section('title')
    PRUEBA | Consultar
@endsection
@section('content')

@section('css')
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css" />
    <link rel="stylesheet" type="text/css"
        href="https://cdn.datatables.net/v/bs4/jszip-2.5.0/dt-1.10.20/b-1.6.1/b-flash-1.6.1/b-html5-1.6.1/b-print-1.6.1/r-2.2.3/datatables.min.css" />
    <link rel="stylesheet"
        href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.8.0/css/bootstrap-datepicker.css" />
    <style type="text/css">
    </style>
@endsection

<section class="content d-flex justify-content-center">
    <div class="card ">
        <div class="card-header text-center">
            <h4> <i class="fas fa-mail-bulk" style="color:grey !important;"></i> Lista de usuarios</h4>
        </div>
        <div class="row mt-3 ml-1">
            <div class="col-md-3">
                <div class="input-group mb-3">
                    <div class="input-group-prepend">
                        <span class="input-group-text text-white" style="background: #17a2b8" id="basic-addon1"><i
                                class="fas fa-calendar-alt"></i></span>
                    </div>
                    <input type="date" class="form-control" id="start_date" onChange="cambioFecha"
                        placeholder="Fecha Inicial" disabled />
                </div>
            </div>
            <div class="col-md-3">
                <div class="input-group mb-3">
                    <div class="input-group-prepend">
                        <span class="input-group-text text-white" style="background: #17a2b8" id="basic-addon1"><i
                                class="fas fa-calendar-alt"></i></span>
                    </div>
                    <input type="date" class="form-control" id="end_date" placeholder="Fecha Final" disabled />
                </div>
            </div>
            <div class="col-md-3 text-center">
                <button id="filter" class="btn btn-outline-info btn-sm" disabled>
                    <i class="fas fa-search"></i> Filtrar
                </button>
                <button id="reset" class="btn btn-outline-danger btn-sm" disabled>
                    <i class="fas fa-trash-alt"></i> Limpiar
                </button>

            </div>
            <div class="col-md-3">
                <div class="input-group mt-0 input-group-sm" style="width: 200px">
                </div>
            </div>
            <div class="col-12">
                <loading :loading="loading"></loading>
            </div>
        </div>

        <div class="card-body">
            <div class="table-responsive ">
                <table class="table yajra-datatable  table-hover table-borderless display nowrap table-striped" id="records"
                    style="width: 100%;">
                    <thead>
                        <tr>
                            <th>Code</th>
                            <th>First Name</th>
                            <th>Second Name</th>
                            <th>First Lastname</th>
                            <th>Second LastName</th>
                            <th>Tipo Documento</th>
                            <th>ID</th>
                            <th>Email</th>
                            <th>Fecha de creacion</th>
                            <th>Fecha de actualizacion</th>
                        </tr>
                    </thead>

                </table>
            </div>
        </div>
    </div>
</section>


@section('scripts')
    <script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.8.0/js/bootstrap-datepicker.js"></script>
    <script src="https://code.jquery.com/jquery-3.5.0.min.js"
        integrity="sha256-xNzN2a4ltkB44Mc/Jz3pT4iU1cmeR0FkXs4pru/JxaQ=" crossorigin="anonymous"></script>
    <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.36/pdfmake.min.js"></script>
    <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.36/vfs_fonts.js"></script>
    <script type="text/javascript"
        src="https://cdn.datatables.net/v/bs4/jszip-2.5.0/dt-1.10.20/b-1.6.1/b-flash-1.6.1/b-html5-1.6.1/b-print-1.6.1/r-2.2.3/datatables.min.js">
    </script>
    <script src="https://kit.fontawesome.com/310e572d8b.js" crossorigin="anonymous"></script>

    <script type="text/javascript">
        function cambioFecha() {
            alert('Entrando');
            $(".yajra-datatable").DataTable().destroy();
            $(".yajra-datatable").DataTable().clear().draw();
        }
        $(function() {
            let today = new Date()
            let table;
            let feci;
            let fecf;
            load_data();

            function load_data(start_date = '', end_date = '') {
                this.feci = start_date;
                this.fecf = end_date;

                table = $('.yajra-datatable').DataTable({
                    processing: true,
                    iDisplayLength: 10,
                    serverSide: true,
                    responsive: true,
                    autoWidth: false,
                    
                    order: [
                        [0, "desc"]
                    ],
                    "language": {
                        "url": "//cdn.datatables.net/plug-ins/1.10.21/i18n/Spanish.json"
                    },
                    "lengthMenu": [
                        [10, 25, 50],
                        [10, 25, 50]
                    ],
                    ajax: {
                        url: "{{ route('getusers') }}",
                        "type": "GET",
                        data: {
                            start_date: start_date,
                            end_date: end_date
                        },
                        dataSrc: function(json) {
                            document.getElementById("start_date").disabled = false;
                            document.getElementById("end_date").disabled = false;
                            document.getElementById("filter").disabled = false;
                            document.getElementById("reset").disabled = false;
                            return json.data;
                        }
                    },
                    scrollY: 500,
                    scrollX: true,
                    "dom": "<'row'<'col-sm-12 col-md-4'l<'#myFilter'>><'col-sm-12 col-md-4'><'col-sm-12 col-md-4'>>" +
                        "<'row'<'col-sm-12'tr>>" +
                        "<'row'<'col-sm-12 col-md-5'i><'col-sm-12 col-md-7'p>>",
                    columns: [
                   
                        {
                            data: 'id',
                            name: 'u.id',
                            className: 'text-center '
                        },
                        {
                            data: 'firstname',
                            name: 'u.firstname'
                        
                        },
                        {
                            data: 'secondname',
                            name: 'u.secondname'
                        },
                        {
                            data: 'firstlastname',
                            name: 'u.firstlastname'
                        },
                        {
                            data: 'secondlastname',
                            name: 'u.secondlastname'
                        },
                        {
                            data: 'numeroid',
                            name: 'u.numeroid'
                        },
                        {
                            data: 'email',
                            name: 'u.email'
                        },
                        {
                            data: 'tipodocumento',
                            name: 'u.tipodocumento'
                        },
                        {
                            data: 'created_at',
                            name: 'u.created_at'
                        },
                        {
                            data: 'updated_at',
                            name: 'u.updated_at'
                        }
                    

                    ],
                   
                });

            }
            $("#start_date,#end_date").change(function() {
                $(".yajra-datatable").html("");
            });

            function formatDate(date) {
                var d = new Date(date),
                    month = '' + (d.getMonth() + 1),
                    day = '' + d.getDate(),
                    year = d.getFullYear();

                if (month.length < 2)
                    month = '0' + month;
                if (day.length < 2)
                    day = '0' + day;

                return [year, month, day].join('-');
            }

           
      
            

            $('#filter').click(function() {
                var from_date = $('#start_date').val();
                var to_date = $('#end_date').val();
                document.getElementById("start_date").disabled = true;
                document.getElementById("end_date").disabled = true;
                document.getElementById("filter").disabled = true;
                document.getElementById("reset").disabled = true;
                if (from_date != '' && to_date != '') {
                    $('#records').DataTable().destroy();
                    load_data(from_date, to_date);
                } else {
                    document.getElementById("start_date").disabled = false;
                    document.getElementById("end_date").disabled = false;
                    document.getElementById("filter").disabled = false;
                    document.getElementById("reset").disabled = false;
                    alert('Para realizar la busqueda, necesitas ingresar Fecha Inicial y Fecha Final');
                }
            });

            $('#reset').click(function() {
                var from_date = $('#start_date').val();
                var to_date = $('#end_date').val();
                if (from_date != '' && to_date != '') {
                $('#start_date').val('');
                $('#end_date').val('');
                $('#records').DataTable().destroy();
                load_data();
            } 
            });

        });
    </script>
@endsection
@endsection
