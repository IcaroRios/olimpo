@extends('dashboard.dashboard')
@section('mainContent')
<div id="page-wrapper">
        <div class="row">
            <div class="col-lg-12">
                <h1 class="page-header">{{$student->name}}</h1>
            </div>
            <!-- /.col-lg-12 -->
        </div>
        <!-- /.row -->
        <div class="row">
            <div class="col-lg-12">
                <div class="panel panel-default">
                    <div class="panel-heading">
                        Informações do Estudante
                    </div>
                    <div class="panel-body">
                        <div class="row">
                            <div class="col-lg-12">
                                <div class="panel panel-default">
                                    <div class="panel-heading">
                                        Informações Pessoais:
                                    </div>
                                    <div class="panel-body">
                                        <div class="row">  
                                            <div class=" form-group col-lg-12">                                
                                                <div class="col-lg-3"> 
                                                    <label for=""> Nome:</label>
                                                    <h4>{{$student->name}} </h4>                                                                       
                                                </div>
                                                <div class="col-lg-3">
                                                    <label for=""> CPF do Aluno:</label>                                                                      
                                                    <h4>{{$student->CPF}} </h4>
                                                </div>  
                                                <div class="col-lg-3">  
                                                    <label for="">RG do Aluno:</label>
                                                    <h4>{{$student->RG}} </h4>
                                                </div>                               
                                                <div class="col-lg-3">
                                                    <label>Data de nascimento:</label>
                                                    <h4>
                                                    @php
                                                        $date=date_create($student->birthDate);
                                                        echo date_format($date,"Y/m/d");
                                                    @endphp
                                                    </h4>
                                                </div> 
                                            </div>
                                            <div class=" form-group col-lg-12">                                
                                                <div class="col-lg-3 " >
                                                    <label for="">Telefone:</label>
                                                    <h4>
                                                        {{$student->cellphone}}
                                                    </h4>
                                                </div>
                                                <div class="col-lg-3 " >             
                                                    <label for="">CPF do responsável :</label>
                                                    <h4>
                                                        {{$student->sponsorCPF}}
                                                    </h4>
                                                </div>  
                                                <div class="col-lg-3" >  
                                                    <label for="">RG do responsável:</label>
                                                    <h4>
                                                        {{$student->sponsorRG}}
                                                    </h4>
                                                </div>
                                                <div class="col-lg-3 " >    
                                                    <label for="">Email:</label>
                                                    <h4>
                                                        {{$student->mail}}
                                                    </h4>
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
                                                    <label for=""> Cidade:</label>
                                                    <h4>
                                                        {{$student->city}}
                                                    </h4>
                                                </div>                                 
                                                <div class="col-lg-3 ">         
                                                    <label for="">Rua :</label>                                                                                                      
                                                    <h4>
                                                        {{$student->street}}
                                                    </h4>
                                                </div>  
                                                <div class="col-lg-3 ">       
                                                    <label for=""> Bairro:</label>                                                                                                        
                                                    <h4>
                                                        {{$student->neighborhood}}
                                                    </h4>
                                                </div>  
                                                <div class="col-lg-3 ">   
                                                    <label for="">CEP:</label>  
                                                    <h4>
                                                        {{$student->CEP}}
                                                    </h4>                                                                                                          
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
                                                    <label for=""> Histórico:</label>                                                                                                             
                                                    <h4>
                                                        {{$student->familyHistory}}
                                                    </h4>
                                                </div>                                 
                                                <div class="col-lg-6">  
                                                    <label for="">Nome do Medicamento:</label>                                                                                                             
                                                    <h4>
                                                        {{$student->medicineName}}
                                                    </h4>
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
                                                    <label for="">
                                                        Frequência:         
                                                    :</label>    
                                                    <h4>
                                                        @if($student->frequency == 'all')
                                                            Frequente
                                                        @elseif($student->frequency == '2Times')
                                                            2X por semana
                                                        @else
                                                            3X por semana
                                                        @endif
                                                    </h4>
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
                                                <div class="col-lg-6" >         
                                                    <label for=""> Valor da mensalidade:</label>   
                                                    <h4>
                                                        {{$student->paymentAmount}}
                                                    </h4>                                                                                                   
                                                </div> 
                                                <div class="col-lg-3">
                                                    <label>dia de pagamento:</label>
                                                    <h4>
                                                        {{$student->paymentDay}}
                                                    </h4>
                                                </div>                          
                                            </div>          
                                        </div>              
                                    </div>
                                </div>
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