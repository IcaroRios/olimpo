@extends('dashboard.dashboard')

@section('mainContent')
<div id="page-wrapper">
        <div class="row">
            <div class="col-lg-12">
                <h1 class="page-header">Inserir Estudante</h1>
            </div>
            <!-- /.col-lg-12 -->
        </div>
        <!-- /.row -->
        <div class="row">
            <div class="col-lg-12">
                <div class="panel panel-default">
                    <div class="panel-heading">
                        Informações do novo Estudante
                    </div>
                    <div class="panel-body">
                        <div class="row">
                            <div class="col-lg-12">
                            <form method="post" action="{{ route('students.store')}}" enctype="multipart/form-data">  
                                @if (session('error'))
                                    <div class="alert alert-danger" role="alert">{{session('error')}}</div>
                                @endif
                                @if (session('success'))
                                    <div class="alert alert-success" role="alert">{{session('success')}}</div>
                                @endif
                                @csrf 
                                <div class="panel panel-default">
                                    <div class="panel-heading">
                                        Informações Pessoais:
                                    </div>
                                    <div class="panel-body">
                                        <div class="row">  
                                            <div class=" form-group col-lg-12">                                
                                                <div class="col-lg-3 " style="margin-top:25px">                                                                        
                                                    <input autocomplete="anyrandomstring" class="form-control" name="name" placeholder="Nome do aluno" required>
                                                </div>
                                                <div class="col-lg-3 " style="margin-top:25px">                                                                        
                                                    <input class="form-control" name="CPF" placeholder="CPF do Aluno " required>
                                                </div>  
                                                <div class="col-lg-3" style="margin-top:25px">  
                                                    <input class="form-control" name="RG" placeholder="RG do Aluno " required>
                                                </div>                               
                                                <div class="col-lg-3">
                                                    <label>Data de nascimento</label>
                                                    <input class="form-control" name="birthDate" type="date" max="3000-01-01" required>
                                                </div> 
                                            </div>
                                            <div class=" form-group col-lg-12">                                
                                                <div class="col-lg-3 " >                                                                        
                                                    <input autocomplete="anyrandomstring" class="form-control" name="sponsorCPF" placeholder="Telefone" required>
                                                </div>
                                                <div class="col-lg-3 " >                                                                        
                                                    <input class="form-control" name="sponsorCPF" placeholder="CPF do responsável ">
                                                </div>  
                                                <div class="col-lg-3" >  
                                                    <input class="form-control" name="sponsorRG" placeholder="RG do responsável ">
                                                </div>
                                                <div class="col-lg-3 " >                                                                        
                                                    <input autocomplete="anyrandomstring" class="form-control" name="mail" placeholder="Email">
                                                </div>
                                            </div>
                                        </div> 
                                    </div>
                                </div>

                                <div class="panel panel-default">
                                    <div class="panel-heading">
                                        Endereço:
                                    </div>
                                    <div class="panel-body">
                                        <div class="row">     
                                            <div class=" form-group col-lg-12"> 
                                                <div class="col-lg-3 ">                                                                                                               
                                                    <input autocomplete="anyrandomstring" class="form-control" name="city" placeholder="Cidade" required>
                                                </div>                                 
                                                <div class="col-lg-3 ">                                                                                                               
                                                    <input autocomplete="anyrandomstring" class="form-control" name="street" placeholder="Rua" required>
                                                </div>  
                                                <div class="col-lg-3 ">                                                                                                               
                                                    <input autocomplete="anyrandomstring" class="form-control" name="neighborhood" placeholder="bairro" required>
                                                </div>  
                                                <div class="col-lg-3 ">                                                                                                               
                                                    <input autocomplete="anyrandomstring" class="form-control" name="CEP" placeholder="CEP" required>
                                                </div>  
                                            </div>          
                                        </div>              
                                    </div>                    
                                </div>

                                <div class="panel panel-default">
                                    <div class="panel-heading">
                                        Histórico Familiar, Medicamento de uso contínuo:
                                    </div>
                                    <div class="panel-body">
                                        <div class="row">     
                                            <div class=" form-group col-lg-12"> 
                                                <div class="col-lg-6">                                                                                                               
                                                    <input autocomplete="anyrandomstring" class="form-control" name="familyHistory" placeholder="Histórico Familiar">
                                                </div>                                 
                                                <div class="form-group col-lg-2" style="margin-top:5px">      
                                                    <label> Medicamento?:   </label>                                       
                                                        <input type="checkbox" name="medicine" >
                                                </div>
                                                <div class="col-lg-4">                                                                                                               
                                                    <input autocomplete="anyrandomstring" class="form-control" name="medicineName" placeholder="Nome do medicamento">
                                                </div>  
                                            </div>          
                                        </div>              
                                    </div>                    
                                </div>

                                <div class="panel panel-default">
                                    <div class="panel-heading">
                                        Sobre as aulas:
                                    </div>
                                    <div class="panel-body">
                                        <div class="row">     
                                            <div class=" form-group col-lg-12">                          
                                                <div class="form-group col-lg-6">      
                                                    Frequência:                                          
                                                    <select name="frequency" class="form-control">
                                                        <option value="all">Frequente</option>
                                                        <option value="2Times">2X por semana</option>
                                                        <option value="3Times">3X por semana</option>
                                                    </select>
                                                </div>
                                            </div>          
                                        </div>              
                                    </div>                    
                                </div>

                                <div class="panel panel-default">
                                    <div class="panel-heading">
                                        Pagamento
                                    </div>
                                    <div class="panel-body">
                                        <div class="row">     
                                            <div class=" form-group col-lg-12"> 
                                                <div class="col-lg-6"  style="margin-top:25px" >                                                                                                               
                                                    <input class="form-control" name="paymentAmount" placeholder="Valor da mensalidade" type="number" step="0.01" required>
                                                </div> 
                                                <div class="col-lg-3">
                                                    <label>dia de pagamento</label>
                                                    <input class="form-control" name="paymentDay" type="number" min="01" max="30" required>
                                                </div>                          
                                            </div>          
                                        </div>              
                                    </div>                    
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