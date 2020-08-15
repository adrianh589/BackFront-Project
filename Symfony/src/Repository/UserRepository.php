<?php

namespace App\Repository;

use App\Entity\User;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;

/**
 * @method User|null find($id, $lockMode = null, $lockVersion = null)
 * @method User|null findOneBy(array $criteria, array $orderBy = null)
 * @method User[]    findAll()
 * @method User[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class UserRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, User::class);
    }

     /**
      * @return User[] Returns an array of User objects
      */

    public function findAllToArray()
    {
        return $this->createQueryBuilder('u')
            ->select('u')
            ->getQuery()
            ->getArrayResult()
        ;
    }

    public function findOnebyToArray($email, $password)
    {
        return $this->createQueryBuilder('u')
            ->select('u')
            ->where('u.password = :password AND u.email = :email')
            ->setParameter('email', $email)
            ->setParameter('password', $password)
            ->getQuery()
            ->getArrayResult()
            ;
    }

    /*
    public function findOneBySomeField($value): ?User
    {
        return $this->createQueryBuilder('u')
            ->andWhere('u.exampleField = :val')
            ->setParameter('val', $value)
            ->getQuery()
            ->getOneOrNullResult()
        ;
    }
    */
}
