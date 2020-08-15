<?php

namespace App\Controller;

use App\Entity\User;
use App\Services\JwtAuth;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Bundle\MakerBundle\Validator;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\Validator\Constraints as Assert;
use Symfony\Component\Validator\Validator\ValidatorInterface;

class UserController extends AbstractController
{
    /**
     * @Route("/user/new", name="user_new", methods={"POST"})
     */
    public function index(Request $request, ValidatorInterface $validator)
    {
        $json = $request->get('json', null);
        $params = json_decode($json);
        $data = array(
            'status' => 'error',
            'code' => 400,
            'message' => 'User not created'
        );

        if($json){
            $createdAt = new \DateTime();
            $role = 'user';
            $email = (isset($params->email)) ? $params->email : null;
            $name = (isset($params->name)) ? $params->name : null;
            $surname = (isset($params->surname)) ? $params->surname : null;
            $password = (isset($params->password)) ? $params->password : null;

            $emailConstraint = new Assert\Email();
            $emailConstraint->message = 'This email is not valid';
            $validate_email = $validator->validate($email, $emailConstraint);

            if($email && count($validate_email) == 0 && $password && $name && $surname){
                $user = new User();
                $user->setCreatedAt($createdAt)
                    ->setUpdatedAt($createdAt)
                    ->setEmail($email)
                    ->setSurname($surname)
                    ->setRol('user')
                    ->setName($name);

                $em = $this->getDoctrine()->getManager();
                $userRepo = $this->getDoctrine()->getRepository(User::class);

                $isset_user = $userRepo->findBy(array(
                   "email" => $email,
                ));


                if (count($isset_user) == 0){
                    $em->persist($user);
                    $em->flush();
                    $data = array(
                        'status' => 'success',
                        'code' => 200,
                        'message' => 'Creado correctamente',
                        'user' => $user
                    );
                }else{
                    $data = array(
                        'status' => 'error',
                        'code' => 400,
                        'message' => 'User not created, duplicated'
                    );
                }
            }
        }

        return $this->json($data);
    }

    /**
     * @Route("/user/edit", name="user_new", methods={"PUT"})
     */
    public function editAction(Request $request, ValidatorInterface $validator, JwtAuth $jwtAuth)
    {
        $json = $request->get('json', null);
        $jwt_auth = $jwtAuth;

        $token = $request->get('Authorization', null);
        $authCheck = $jwt_auth->checkToken($token);

        if($authCheck) {

            //Entity manager
            $em = $this->getDoctrine()->getManager();

            //Conseguir los datos del usuario identificado via token
            $identity = $jwt_auth->checkToken($token, true);

            //Conseguir el objeto actualizar
            $user = $em->getRepository(User::class)->findOneBy(array(
                'id' => $identity->sub
            ));

            //Recoger datos post
            $params = json_decode($json);

            //Array de error por defecto
            $data = array(
                'status' => 'error',
                'code' => 400,
                'message' => 'User not updated'
            );

            if ($json) {
                $createdAt = new \DateTime();
                $role = 'user';
                $email = (isset($params->email)) ? $params->email : null;
                $name = (isset($params->name)) ? $params->name : null;
                $surname = (isset($params->surname)) ? $params->surname : null;
                $password = (isset($params->password)) ? $params->password : null;

                $emailConstraint = new Assert\Email();
                $emailConstraint->message = 'This email is not valid';
                $validate_email = $validator->validate($email, $emailConstraint);

                if ($email && count($validate_email) == 0 && $password && $name && $surname) {

                    //cifrar la password
                    $pwd = hash('sha256', $password);

                    $user->setCreatedAt($createdAt)
                        ->setUpdatedAt($createdAt)
                        ->setEmail($email)
                        ->setSurname($surname)
                        ->setRol('user')
                        ->setName($name)
                        ->setPassword($pwd);


                    $userRepo = $this->getDoctrine()->getRepository(User::class);

                    $isset_user = $userRepo->findBy(array(
                        "email" => $email,
                    ));


                    if (count($isset_user) == 0 || $identity->email === $email) {
                        $em->persist($user);
                        $em->flush();
                        $data = array(
                            'status' => 'success',
                            'code' => 200,
                            'message' => 'User updated',
                            'user' => $user
                        );
                    } else {
                        $data = array(
                            'status' => 'error',
                            'code' => 400,
                            'message' => 'User not updated'
                        );
                    }
                }
            }
        }else{
            $data = array(
                'status' => 'error',
                'code' => 400,
                'message' => 'Authorization not valid'
            );
        }

        return $this->json($data);
    }
}
