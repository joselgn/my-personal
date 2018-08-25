<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

//Validador
use Illuminate\Validation\Validator;

//Criando login proprio - Autenticaçao propria
use Illuminate\Support\Facades\Auth;
use Illuminate\Foundation\Auth\AuthenticatesUsers;

//Sessao
use Illuminate\Support\Facades\Session;

//Database - Credential to login
use App\Models\Usuario;

class LoginownController extends Controller{

    use AuthenticatesUsers;

    /**
     * Where to redirect users after login.
     *
     * @var string
     */
    protected $redirectTo = '/painel';

    //Define the username
    public function username(){
        return 'TX_LOGIN';
    }//username

    //Validaçao de Login
    //Funçao para autenticar usuario e senha
    public function entrar(Request $request){
        $erro=0;
        $msg='';

        //Fazendo a validaçao dos dados
        $validation = validator($request->all(),$this->_rulesLogin(),$this->_rulesMessagesLogin());

        //Verificando se possui erros na validaçao
        if($validation->fails()){
            $erro=1;

            //Tratando retorno dos erros - Mensagens Personalizadas
            $verifErros = $validation->errors();
            foreach ($verifErros->messages() as $errosArray){
                foreach($errosArray as $erroStr){
                    $msg .= trim($erroStr).'<br>';
                }//foreach msgs erros
            }//foreach valida erross
        }//validando dados

        //Autenticando
        if($erro==0){
            //Trata Usuario
            $usuario = trim(addslashes(htmlentities($request->username)));
            //trata senha
            $senha = trim(addslashes(htmlentities($request->userpass)));

            //Verifica dados do usuario atraves do login
            if(!$this->_authenticate($usuario,$senha)){
                $erro=1;
                $msg='Usu&aacute;rio e/ou senha inv&aacute;lido! Tente novamente.';
            }else{
                //Redireciona em caso de sucesso de login
                return redirect()->intended('painel');
            }//if error login
        }//if autentica

        //Retornando ao JSON
       // return json_encode(array('erro'=>$erro,'msg'=>$msg));
        return redirect()->guest('/meu-login/'.$erro.'#content')->with('info',$msg);
    }//function entrar




    /**************************************************************************
     * FUNÇOES INTERNAS CUSTOMIZADAS
     **************************************************************************/
    //Metodo para autenticaçao
    private function _authenticate($usuario,$senha){
        //DB Access
        $modelUsuario = new Usuario();
        $dbUsuario = $modelUsuario->retornaRegistroCondicao('TX_LOGIN', $usuario);

        //Verificando se possui registro do usuario no DB atraves do Login
        if($dbUsuario->count()>0){
            $dadosUsuario = $dbUsuario->first();//Pega o Primeiro resultado da query senao tenta pegara uma Collection (lista de varios Resultados)

            //Preparando dados para Criptografar a senha
            $salt = $dadosUsuario->TX_SALT;
            $pass = $modelUsuario->_criptografaPassword($senha, $salt);

            //Preparando os dados para a validaçao do login
            $credentials = array(
                'TX_LOGIN'  => $usuario,
                'TX_SENHA'  => $pass,
                'BL_ATIVO' => 1,//Apenas usuario ativo
            );//credenciais

            //Metodo Auth::attempt => retorna true em caso de autenticaçao bem sucedida e false caso nao seja bem sucedida.
            if(Auth::attempt($credentials)){
                //Authentication Success - Start Session
                 $this->_openSessId($dbUsuario);
                 return true;
            }else{
                //Authentication failed
                return false;
            }//if / else authentication success
        }else{
            //Nao existe registro de Usuario no BD
            return false;
        }//if / else autenticable User data
    }//authenticate

    //Funçao de regras para validar inputs
    private function _rulesLogin(){
        //Tipos de Validaçao
        return [
            'username' => 'bail|required|min:3|max:50',
            'userpass' => 'bail|required|min:3|max:200',
        ];
    }//rules for login variables

    //Funçao de mensagens de erros de validaçao
    private function _rulesMessagesLogin(){
        //Mensagens de Validaçao
        return [
            //Input Usuario
            'username.required' => '- O campo <b>USU&Aacute;RIO</b> &eacute; de preenchimento obrigat&oacute;rio!',
            'username.min' => '- O campo <b>USU&Aacute;RIO</b> deve possuir o M&Iacute;NIMO de 3 caracteres',
            'username.max' => '- O campo <b>USU&Aacute;RIO</b> n&atilde;o deve exceder o M&Aacute;XIMO de 50 caracteres',

            //Input Senha
            'userpass.required' => '- O campo <b>SENHA</b> &eacute; de preenchimento obrigat&oacute;rio!',
            'userpass.min' => '- O campo <b>SENHA</b> deve possuir o M&Iacute;NIMO de 3 caracteres',
            'userpass.max' => '- O campo <b>SENHA</b> n&atilde;o deve exceder o M&Aacute;XIMO de 200 caracteres',
        ];
    }//rules message logins

    //Cria sessao - Autenticaçao OK
    private function _openSessId(Usuario $dataUser){
        Auth::guard('sessIDAuth');
        Auth::loginUsingId($dataUser->ID, true);
        Auth::once($dataUser);
    }//open Session ID

    //Fecha a sessao
    private function _closeSessId(){
        Auth::logout();
    }//close Session ID

}//Class