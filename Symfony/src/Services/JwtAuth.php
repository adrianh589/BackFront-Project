<?php
namespace App\Services;

use App\Entity\User;
use Doctrine\ORM\EntityManagerInterface;
use Firebase\JWT\JWT;

class JwtAuth{

    public $manager;
    public $key;

    public function __construct(EntityManagerInterface $manager)
    {
        $this->manager = $manager;
        $this->key = 'HolaSoyLaClaveSecreta'; // Por lo general son valores aleatorios
    }

    public function signUp($email, $password, $getHash = null){

        $user = $this->manager->getRepository(User::class)
            ->findOneBy(array(
                'email' =>$email,
                'password' => $password));

        $signup = false;
        if(is_object($user)){
            $signup = true;
        }

        if($signup){

            // GENERAR TOKEN JWT

            $token = array(
                'sub' => $user->getId(),
                'email' => $user->getEmail(),
                'name' => $user->getName(),
                'surname' => $user->getSurname(),
                'iat' => time(),
                'exp' => time() + (7 * 24 * 60 * 60) // Asi expirara en una semana
            );

            $jwt = JWT::encode($token, $this->key, 'HS256'); //Codificar el token ,llave y forma de codificación
            $decode = JWT::decode($jwt, $this->key, array('HS256'));// Por si ingreso algo por el getHash y obtener el jwt decodificado

            if($getHash){
                $data = $decode;
            }else{
                $data = $jwt;
            }

        }else{
            $data = array(
                'status' => 'error',
                'data' => 'Login failed'
            );
        }

        return $data;
    }

    public function checkToken($jwt, $getIdentity = false)
    {
        $auth = false;
        try {
            $decode = JWT::decode($jwt, $this->key, array('HS256'));
        }catch (\UnexpectedValueException $e){
            $auth = false;
        }catch (\DomainException $e){
            $auth = false;
        }

        if(isset($decode) && is_object($decode) && isset($decode->sub)){
            $auth = true;
        }else{
            $auth = false;
        }

        if(!$getIdentity){
            return $auth;
        }else{
            return $decode;
        }
    }

}