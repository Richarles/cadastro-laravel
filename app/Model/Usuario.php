<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Http\Request;
use Carbon\Carbon;
use DB;
Use Hash;

class Usuario extends Model
{
    protected $connection = 'sqlite';
    protected $table = 'usuario';

    protected $fillable = ['nome','email','senha','data_cadastro'];

    public $timestamps = false;

    public static function listar(int $limite){
        $sql = self::select([
            "id",
            "nome",
            "email",
            "senha",
            "data_cadastro"
        ])
        ->limit($limite);
        //dd($sql->toSql());
        return $sql->get();
    }

    public static function cadastrar(Request $request){
        //DB::enableQueryLog();
        return self::insert([
            "nome"=>$request->input('nome'),
            "email"=>$request->input('email'),
            "senha"=>Hash::make($request->input('senha')),
            "data_cadastro" =>new Carbon()
        ]);
        //dd(DB::getQueryLog());
    }

    public  function editarr(Request $request){
        $sql = self::update([
            "nome"=>$request->input('nome'),
            "email"=>$request->input('email'),
            "senha"=>Hash::make($request->input('senha')),
            "data_cadastro"=>new Carbon()
        ]);
        return $sql->get();
        }

    /*public function search($pesquisa = null){
        $results = $this->where(function($query) use($pesquisa){
            if($pesquisa){
                $query->where('nome','LIKE',"%$pesquisa%");
            }
        })//->toSql();
        ->paginate();
        //dd($results);
       return $results;

    }*/
}
