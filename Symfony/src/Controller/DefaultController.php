<?php

namespace App\Controller;

use App\Entity\User;
use App\Services\JwtAuth;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\Validator\Constraints as Assert;
use Symfony\Component\Validator\Validator\ValidatorInterface;

class DefaultController extends AbstractController
{
    /**
     * @Route("/default", name="default")
     */
    public function index()
    {
        return $this->json([
            'mensaje' => 'funcionando'
        ]);
    }

    /**
     * @Route ("/prueba", name="prueba", methods={"POST"})
     */
    public function pruebasAction(Request $request, JwtAuth $jwtAuth) // Inyectar el servicio
    {
        $token = $request->headers->get('Authorization', null); // Si nos llega, se pone esa key, si no NULL
        $jwt_auth = $jwtAuth; // Cargar el servicio


        if($token && $jwt_auth->checkToken($token)){
            $em = $this->getDoctrine()->getManager();
            $UserRepo = $this->getDoctrine()->getRepository(User::class);

            $usuarios = $UserRepo->findAllToArray();


            return $this->json($usuarios);
        }

        return $this->json([
                    'status' => 'Error',
                    'data' => 'Token incorrecto'
        ]);

    }

    /**
     * @Route("/login", name="login")
     */
    public function login(Request $request, ValidatorInterface $validator, JwtAuth $jwtAuth)
    {
        //Recibir JSON por post
        $json = $request->get('json', null);

        $data = array(
            'status' => 'error',
            'data' => 'Send JSON via POST'
        );

        if($json){

            $params = json_decode($json);

            $email = (isset($params->email)) ? $params->email : null;
            $password = (isset($params->password)) ? $params->password : null;
            $getHash = (isset($params->getHash)) ? $params->getHash : null;

            $emailConstraint = new Assert\Email();
            $emailConstraint->message = "Email invalido";
            $errors = $validator->validate($email, $emailConstraint);

            if(0 === count($errors) && $password){

                $jwt_auth = $jwtAuth;//Asi se llama un serivicio, mediante inyeccion

                if($getHash == null || $getHash == false){// En caso de que las credenciales sean correctas
                    $signup = $jwt_auth->signUp($email, $password);
                }else{
                    $signup = $jwt_auth->signUp($email, $password, true);
                }

                return $this->json($signup);
            }else{
                $data = array(
                    'status' => 'error',
                    'data' => 'Email or password incorrect'
                );
            }

        }
        return $this->json($data);
    }


}
