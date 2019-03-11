@extends('dashboard.dashboard')

@section('mainContent')
<div id="page-wrapper">
        <div class="row">
            <div class="col-lg-12">
                <h1 class="page-header">Editar ADM</h1>
            </div>
            <!-- /.col-lg-12 -->
        </div>
        <!-- /.row -->
        <div class="row">
            <div class="col-lg-12">
                <a class="btn btn-primary btn-xs" href="{{route('users.index')}}"> 
                    voltar
                </a>
                <div class="panel panel-default">
                    <div class="panel-heading">
                        Informações do ADM - {{$user->name}}
                    </div>
                    <div class="panel-body">
                        <div class="row">
                            <div class="col-lg-12">
                            <form method="post" action="{{ route('users.update',['id' => $user->id]) }}" enctype="multipart/form-data">  
                                @if (session('error'))
                                    <div class="alert alert-danger" role="alert">{{session('error')}}</div>
                                @endif
                                @if (session('success'))
                                    <div class="alert alert-success" role="alert">{{session('success')}}</div>
                                @endif
                                @csrf 
                                @method('PATCH')
                                <div class="form-group">
                                    <input class="form-control" name="name" placeholder="novo Nome" value="{{$user->name}}" >
                                </div>
                                <div class="form-group">
                                    <input class="form-control" name="password" placeholder="Nova Senha" type="password">
                                </div> 

                                <button type="submit" class="btn btn-default">Salvar</button>
                            </form>
                            </div>
                            
                        </div>
                        <!-- /.row (nested) -->
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
@stop