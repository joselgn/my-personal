<?php

namespace App\Models;

use Illuminate\Contracts\Auth\Authenticatable;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Hash;

class Usuario extends Model implements Authenticatable{
    //Nome da Tabela
    protected $table = 'usuarios';

    /**
     * Primary Key
     * The table associated with the model.
     *
     * @var Integer
     */
    //protected $primaryKey = 'ID';//Define a coluna como chave primaria

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = ['TX_NOME', 'TX_LOGIN', 'password', 'TX_SALT'];//Define os atributos que podem ser alterados na tabela

    /**
     * The attributes that aren't mass assignable.
     *
     * @var array
     */
    //protected $guarded = ['price'];//Atributos que nao podem ser alterados a tabela

    //ou se usa o $fillable ou se usa o $guarded - nao e recomendado utilzar os dois

    //Retorna um registro especifico atraves do login
    public function retornaLogin($login)
    {
        $query = $this->where('TX_LOGIN', $login)
            ->orderBy('TX_LOGIN', 'ASC')
            ->take(10)//limit
            ->get();//metodo para retornar os registros
        return $query;
    }//Retorna registros

    //Retorna o registro atraves do ID
    public function retornaRegistro($id)
    {
        $registro = $this->find($id);
        return $registro;
    }//retorna registro pelo ID

    //Retorna o registros atraves de um campo especifico
    public function retornaRegistroCondicao($campo, $valor)
    {
        $registro = $this->where($campo, $valor);
        return $registro;
    }//retorna registro atraves de um campo especifico

    //Create new user Register
    public function novoRegistro($arrayData)
    {
        $userModel = new Usuario();
        $userModel->BL_ATIVO = 1;
        $userModel->TX_LOGIN = $arrayData['login'];

        //Create the password
        $salt = $this->_createSalt();
        $password = $this->_criptografaPassword($arrayData['pass'], $salt);
        $userModel->TX_SALT = $salt;
        $userModel->password = bcrypt($password);

        if ($userModel->save())
            return true;
        else
            return false;
    }//Novo Registro / New Register


    /**************************************************************************
     * FUNÇOES INTERNAS - INTERNAL FUNCTIONS
     **************************************************************************/

    //Funçao para critpografar senha
    public function _criptografaPassword($password, $salt)
    {
        //Criando Hash de criptografia
        $txtRetorno = $password . $salt;
        for ($i = 0; $i < 1000; $i++) {
            $txtRetorno = hash('sha256', $txtRetorno);
        }//foreach has password

        return $txtRetorno;
    }//criptografa a senha baseado no SALT de referencia

    //Funçao para Criar SALT - Create SALT
    public function _createSalt($min = 6, $max = 90)
    {
        $arrPossibilities = [
            'A', 'B', 'C', 'D', 'E', 'F', 'G', 'H', 'I', 'J', 'K', 'L', 'M', 'N', 'O', 'P', 'Q', 'R', 'S', 'T', 'U', 'V', 'W', 'X', 'Y', 'Z',
            'a', 'b', 'c', 'd', 'e', 'f', 'g', 'h', 'i', 'j', 'k', 'l', 'm', 'n', 'o', 'p', 'q', 'r', 's', 't', 'u', 'v', 'w', 'x', 'y', 'z',
            '0', '1', '2', '3', '4', '5', '6', '7', '8', '9', '$', '%', '/', '.', '@', '&', '-', '$', '#', '+', '*', '!', '?',
        ];//array

        $qntyChars = rand($min, $max);
        $strSalt = '';
        for ($i = 0; $i < $qntyChars; $i++) {
            $charpos = rand(0, (count($arrPossibilities) - 1));

            $strSalt .= $arrPossibilities[$charpos];
        }//for mounting SALT

        return $strSalt;
    }//create SALT



    /**************************************************************************
     * METODOS PADROES - OBRIGATORIOS A SEREM IMPLEMENTADOS - IMPLEMENTS - NAO PODEM SER APAGADAS
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
        return $this->id;
    }//Auth ID

    /**
     * CAMPO DE SENHA
     * Get the password for the user.
     *
     * @return string
     */
    public function getAuthPassword()
    {
        return $this->password;
    }//Auth Password

    /**
     * CAMPO PADRAO LARAVEL
     * Get the token value for the "remember me" session.
     *
     * @return string
     */
    public function getRememberToken()
    {
        return $this->remember_token;
    }//Remember Token

    /**
     * SETA O CAMPO TOKEN REMEMBER
     * Set the token value for the "remember me" session.
     *
     * @param  string $value
     * @return void
     */
    public function setRememberToken($token)
    {
        $this->remember_token = $token;
    }//Set token remember
    public function getRememberTokenName() {
       Auth::guard('sessIDAuth');
    }//Set token remember

    //Seta a criptografia na senha para coincidir com a do BD
    public function setPasswordAttribute($value){
        $this->attributes['password'] = bcrypt($value);
    }//set Password attributres
}//class
