<?php
/**
 * Created by PhpStorm.
 * User: josefilho
 * Date: 26/08/18
 * Time: 13:04
 */

namespace App\Providers;

use Illuminate\Foundation\Support\Providers\AuthServiceProvider as ServiceProvider;
use App\Models\Usuario;

class CustomServiceProvider extends ServiceProvider
{
    /**
     * Validate a user against the given credentials.
     *
     * @param  \Illuminate\Contracts\Auth\Authenticatable  $user
     * @param  array  $credentials
     * @return bool
     */
    //public function validateCredentials(UserContract $user, array $credentials){
    public function validateCredentials(UserContract $user, array $credentials){
        $plain = $credentials['TX_SENHA'];

        return $this->hasher->check($plain, $user->getAuthPassword());
    }

}//class custom service provider
