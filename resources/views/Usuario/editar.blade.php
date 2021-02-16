@extends('layout.base')

@section('titulo','Edição de usuário')

@section('conteudo')
   <form action = "{{ route('alterar', $editar->id)}}" method="POST">
       {{ csrf_field() }}
       <div class="field">
          <label for="nome">Nome:</label>
          <input type="text" name="nome" id="nome" value="{{$editar->nome}}"/>   
                 <strong class="erro"></strong>    
       </div>

       <div class="field">
          <label for="email">Email:</label>
          <input type="email" name="email" id="email" value = "{{$editar->email}}"/>  
                 <strong class="erro"></strong>
       </div>

       <div class="field">
          <label for="senha">Senha:</label>
          <input type="password" name="senha" id="senha" value = "{{$editar->senha}}"/>   
                 <strong class="erro"></strong>
       </div>
       <input type="hidden" name="id" value = "{{$editar->id}}">

       <div class="btn">
          <input type="submit" value="alterar">
       </div>
   </form>
@endsection