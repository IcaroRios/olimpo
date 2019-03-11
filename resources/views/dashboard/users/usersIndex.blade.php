@extends('dashboard.dashboard')
@section('extraPreScripts')
    <!-- DataTables CSS -->
    <link href="/assets/vendor/datatables-plugins/dataTables.bootstrap.css" rel="stylesheet">
    <!-- DataTables Responsive CSS -->
    <link href="/assets/vendor/datatables-responsive/dataTables.responsive.css" rel="stylesheet">
@stop

@section('mainContent')
<div id="page-wrapper">
    <div class="row">
        <div class="col-lg-12">
            <h1 class="page-header">Administradores</h1>
        </div>
        <!-- /.col-lg-12 -->
    </div>
    @if (session('error'))
        <div class="alert alert-danger" role="alert">{{session('error')}}</div>
    @endif
    <!-- /.row -->
    <div class="row">
        <div class="col-lg-12">
            <a  data-toggle="modal" data-target="#myModal" class="btn btn-primary btn-xs"> 
                Novo ADM
            </a>     
            <div class="panel panel-default">
                <div class="panel-heading">
                    Lista de Administradores
                </div>
                <!-- /.panel-heading -->
                <div class="panel-body">
                    <table width="100%" class="table table-striped table-bordered table-hover" id="dataTables-adms">
                        <thead>
                            <tr>
                                <th>Nome</th>
                                <th></th>
                            </tr>
                        </thead>
                        <tbody>  
                            @foreach($users as $user)
                                <tr class="gradeA">
                                    <td>
                                        {{$user->name}}
                                    </td>
                                    <td>  
                                        <a href="{{ route('users.edit', $user->id) }}" class="btn btn-primary btn-xs">Edit</a> 
                                        <form action="{{route('users.destroy', $user->id) }}" method="POST" style="display:inline">
                                            @method('DELETE')
                                            @csrf
                                            <button type="submit" class="btn btn-danger btn-xs" > Delete</button>
                                        </form>
                                    </td>      
                                </tr> 
                            @endforeach
                        </tbody>
                    </table>
                    <!-- /.table-responsive -->
                </div>
                <!-- /.panel-body -->
            </div>
            <!-- /.panel -->
        </div>
        <!-- /.col-lg-12 -->
    </div>
    <!-- /.row -->
</div>
<!-- /#page-wrapper -->

<!-- Modal -->
<div class="modal fade" id="myModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                <h4 class="modal-title" id="myModalLabel">Novo ADM</h4>
            </div>
            <form autocomplete="ofaasf" method="post" action="{{ route('users.store') }}" enctype="multipart/form-data">  
                @csrf
                <div class="modal-body">
                    <div class="form-group">
                        <input  autocomplete="anyrandomstring"  class="form-control" name="name" placeholder="Nome" type="text" autofocus required>
                    </div>
                    <div class="form-group">
                        <input autocomplete="anyrandomstring"  class="form-control" name="password" placeholder="Senha" type="password" required>
                    </div>    
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-default" data-dismiss="modal">Cancelar</button>
                    <button type="submit" class="btn btn-default">Salvar</button>
                </div>
            </form>
        </div>
        <!-- /.modal-content -->
    </div>
    <!-- /.modal-dialog -->
</div>
<!-- /.modal -->
@stop




@section('extraScripts')
    <!-- DataTables JavaScript -->
    <script src="/assets/vendor/datatables/js/jquery.dataTables.min.js"></script>
    <script src="/assets/vendor/datatables-plugins/dataTables.bootstrap.min.js"></script>
    <script src="/assets/vendor/datatables-responsive/dataTables.responsive.js"></script>
    <script>
        $(document).ready(function() {
            $('#dataTables-adms').DataTable({
                responsive: true,
                ordering:false,
                "language": {
                    "lengthMenu": "Mostrar _MENU_  Por Página",
                    "zeroRecords": "Nada Encontrado",
                    "info": "Mostrando _PAGE_ de _PAGES_",
                    "infoEmpty": "Nada disponível",
                    "infoFiltered": "(Buscado em _MAX_ Itens)"
                }
            });
        });
    </script>
@stop
