@extends('layout.base')

@section('titulo','Lista de Registro')

@section('conteudo')

<form action = " " method = "post">
              {{csrf_field() }}
                  <input type = 'search' name = "pesquisa" value = "{{$busca}}" >
                  <input type = 'submit' value = "Pesquisar">
              </form>
              
        <a href = "{{route('home')}}"><input type="submit" value = "Cadastrar"></a>
              
   @if(count($lista)>0)
       <div class="panel panel-default">
          <div class="panel-heading">
              Currents usuarios
              </div>

              

        <div class= panel-body>
            <table class="table table-striped usuario-table">
                 <thead>
                     <th>Usuarios</th>
                     <th>&nbsp;</th>
                </thead>

            <tbody>
                @foreach($lista as $listas)
                   <tr>
                       <td>
                           <div>{{$listas->nome}}</div>
                           <div>{{$listas->email}}</div>
                       </td>
                       <td>
                       <div><a href="{{route('editar',$listas->id)}}">Editar</a></div>
                       <form action ="{{route('excluir',$listas->id)}}" method = "post">
                       @csrf
                       @method('DELETE')
                       <button type = "submit">Excluir</button>
                       </form>
                       </td>
                   </tr>
                @endforeach
            </tbody>    
            </table> 
        </div>
        </div>
    @endif
@endsection