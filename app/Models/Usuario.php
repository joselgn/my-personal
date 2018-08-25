<?php

namespace App\Models;

use Illuminate\Contracts\Auth\Authenticatable;
use Illuminate\Database\Eloquent\Model;

class Usuario extends Model implements Authenticatable{
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = ['TX_NOME', 'TX_LOGIN','TX_SENHA','TX_SALT'];//Define os atributos que podem ser alterados na tabela

    /**
     * The attributes that aren't mass assignable.
     *
     * @var array
     */
    //protected $guarded = ['price'];//Atributos que nao podem ser alterados a tabela

    //ou se usa o $fillable ou se usa o $guarded - nao e recomendado utilzar os dois

    //Retorna um registro especifico atraves do login
    public function retornaLogin($login){
        $query = $this->where('TX_LOGIN', $login)
            ->orderBy('TX_LOGIN', 'ASC')
            ->take(10)//limit
            ->get();//metodo para retornar os registros
        return $query;
    }//Retorna registros

    //Retorna o registro atraves do ID
    public function retornaRegistro($id){
        $registro = $this->find($id);
        return $registro;
    }//retorna registro pelo ID

    //Retorna o registros atraves de um campo especifico
    public function retornaRegistroCondicao($campo,$valor){
        $registro = $this->where($campo,$valor);
        return $registro;
    }//retorna registro atraves de um campo especifico

    //Funçao para critpografar senha
    public function criptografaPassword($password, $salt){
        //Criando Hash de criptografia
        $txtRetorno = $password.$salt;
        for($i=0;$i<1000;$i++){
            $txtRetorno = hash('sha256', $txtRetorno);
        }//foreach has password

        return $txtRetorno;
    }//criptografa a senha baseado no SALT de referencia



    /**************************************************************************
     * METODOS PADROES - OBRIGATORIOS A SEREM IMPLEMENTADOS - IMPLEMENTS
     **************************************************************************/

    /**
     * CAMPO DE LOGIN PARA ACESSO
     * Get the name of the unique identifier for the user.     *
     *
     * @return string
     */
    public function getAuthIdentifierName(){
        return $this->TX_LOGIN;
    }//Auth Identifier Name

    /**
     * CAMPO DE ID DO USUARIO LOGADO
     * Get the unique identifier for the user.
     *
     * @return mixed
     */
    public function getAuthIdentifier(){
        return $this->ID;
    }//Auth ID

    /**
     * CAMPO DE SENHA
     * Get the password for the user.
     *
     * @return string
     */
    public function getAuthPassword(){
        return $this->TX_SENHA;
    }//Auth Password

    /**
     * CAMPO PADRAO LARAVEL
     * Get the token value for the "remember me" session.
     *
     * @return string
     */
    public function getRememberToken(){
        return $this->remember_token;
    }//Remember Token

    /**
     * SETA O CAMPO TOKEN REMEMBER
     * Set the token value for the "remember me" session.
     *
     * @param  string $value
     * @return void
     */
    public function setRememberToken($token){
        $this->remember_token = $token;
    }//Set token remember

    /**
     * Get the column name for the "remember me" token.
     *
     * @return string
     */
    public function getRememberTokenName(){
        Auth::guard('sessId');

    }//Rmember token name
}//class
