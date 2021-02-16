<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Model\Usuario as UsuarioModel;
use Hash;

class Usuario extends Controller
{
   /* private $repository;
    protected $request;
    public function __construct(Request $request, Usuario $listas)
    {
           $this->request = $request;     
            $this->repository = $listas;
    }*/
    public function cadastrar(){
        return view('Usuario.cadastro');
        //dd(Hash::make('123'),md5('123'),Sha1('123'));
    }
    public function lista(Request $request){
        //$lista = UsuarioModel::listar(20);

        $busca=$request->get('pesquisa');
        $lista = UsuarioModel::where('nome','LIKE','%'.$busca.'%')->paginate(20);
        

        return view('Usuario.lista',compact('lista','busca'));

    }

    public function salvar(Request $request){
        $request->validate([
            "nome"=>"required",
            "email"=>"required|email",
            "senha"=>"required|min:5"
        
        ]);
        if(UsuarioModel::cadastrar($request)){
             return view('Usuario.sucesso',[
                 "fulano"=>$request->input('nome')
             ]);
        }else{
            echo "Ops!Falhou ao cadastrar";
        }
        //dd($request->all());
    }

    public function editar($id){
        $editar=UsuarioModel::find($id);
        return view('Usuario.editar',compact('editar'));
    }

   public function alterar(Request $request,$id){
    $request->validate([
        'nome'=>'required',
        'email'=>'required',
        'senha'=>'required'
    ]);

        //$id = Input::get('id');
        $usuario = UsuarioModel::find($id);

        $usuario->nome=$request->get('nome');
        $usuario->email=$request->get('email');
        $usuario->senha=$request->get('senha');
        $usuario->data_cadastro=$request->get("data_cadastro");
            $usuario->save();
           // $alterar=UsuarioModel::all();
           return redirect('/lista')->with('sucesso','Usuario alterado');
    }

    public function excluir($id)
    {
        $delete = UsuarioModel::find($id);
        $delete->delete();

        return redirect('/lista')->with('success', 'Usuario deletado!');
        
    }

   /* public function busca(Request $request )
    {
       // $busca=$request->get('pesquisa');
        //$filtro = UsuarioModel::where('nome','LIKE','%'.$request->get('pesquisa').'%')->paginate(2);
        
       // return view('Usuario.lista',compact('filtro'));
       //dd($request->all());
       $listas = $this->repository->search($request->pesquisa);

        return view('Usuario.lista',compact('listas'));

    }*/
    
}
