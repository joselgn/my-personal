<?php

namespace App\Http\Controllers;

use App\Models\Usuario;
use Illuminate\Http\Request;

class IndexController extends Controller
{
    //Index - Home
    public function Index(){
        return view('templateown.index');
    }//Index Action

    //Login
    public function Login(){
        return view('templateown.meu-login');
    }//Login Action

    //Tela cadastro de novo usuario
    public function NovoCadastro(){
        return view('templateown.novo-cadastro');
    }//Tela Novo cadastro action


    //Açao para novo Registro - Save new Register
    public function Novo(Request $request){
        $erro = 0;
        $msg  = '';

        //Fazendo a validaçao dos dados
        $validation = validator($request->all(),$this->_rulesNewRegister(),$this->_rulesMessagesNewRegister());

        //Verify the data records validation return
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

        //Verifica se ja possui algum usuario com este login
        if($erro==0){
            $modelUser = new Usuario();
            $verifRepeatUsername = $modelUser->retornaLogin($request->username);

            if(count($verifRepeatUsername)>0){
                $erro = 1;
                $msg .= 'Este USU&Aacute;RIO est&aacute; indispon&iacute;vel.';
            }//if count username register
        }//if error duplicate username


        //Prepara os dados para salvar no BD - Save register at DB
        if($erro==0){
            $dataNewReg = [ 'login'=>$request->username,'pass'=>$request->userpass ];

            if(!$modelUser->novoRegistro($dataNewReg)){
                $erro=1;
                $msg .= 'Erro ao salvar registo no BD.';
            }//if new register DB
        }//save new register

        //Redireciona para a rota de cadastro de novo usuario
        return redirect()->guest('/novo-cadastro/'.$erro.'#content')->with('info',$msg);
    }//novo Registro


    /**************************************************************************
     * FUNÇOES INTERNAS - Internal Functions
     **************************************************************************/

    //Funçao de regras para validar inputs
    private function _rulesNewRegister(){
        //Tipos de Validaçao
        return [
            'username' => 'bail|required|min:3|max:50',
            'userpass' => 'bail|required|min:5|max:200',
            'passconfirm' => 'bail|same:userpass|required|min:5|max:200',
        ];
    }//rules for new register variables

    private function _rulesMessagesNewRegister(){
        //Mensagens de Validaçao
        return [
            //Input Usuario
            'username.required' => '- O campo <b>USU&Aacute;RIO</b> &eacute; de preenchimento obrigat&oacute;rio!',
            'username.min' => '- O campo <b>USU&Aacute;RIO</b> deve possuir o M&Iacute;NIMO de 3 caracteres',
            'username.max' => '- O campo <b>USU&Aacute;RIO</b> n&atilde;o deve exceder o M&Aacute;XIMO de 50 caracteres',

            //Input Senha
            'userpass.required' => '- O campo <b>SENHA</b> &eacute; de preenchimento obrigat&oacute;rio!',
            'userpass.min' => '- O campo <b>SENHA</b> deve possuir o M&Iacute;NIMO de 5 caracteres',
            'userpass.max' => '- O campo <b>SENHA</b> n&atilde;o deve exceder o M&Aacute;XIMO de 200 caracteres',

            //Input Confirmaçao de Senha
            'passconfirm.required' => '- O campo <b>CONFIRMA&Ccedil;&Atilde;O DE SENHA</b> &eacute; de preenchimento obrigat&oacute;rio!',
            'passconfirm.min' => '- O campo <b>CONFIRMA&Ccedil;&Atilde;O DE SENHA</b> deve possuir o M&Iacute;NIMO de 5 caracteres',
            'passconfirm.max' => '- O campo <b>CONFIRMA&Ccedil;&Atilde;O DE SENHA</b> n&atilde;o deve exceder o M&Aacute;XIMO de 200 caracteres',
            'passconfirm.same' => ' - O campo <b>CONFIRMA&Ccedil;&Atilde;O DE SENHA</b> deve possuir o mesmo valor do campo SENHA',
        ];
    //Funçao de mensagens de erros de validaçao
    }//rules message new register

}//class
