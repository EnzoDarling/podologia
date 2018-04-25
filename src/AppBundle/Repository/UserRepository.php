<?php

namespace AppBundle\Repository;

/**
 * UserRepository
 *
 * This class was generated by the Doctrine ORM. Add your own custom
 * repository methods below.
 */
class UserRepository extends \Doctrine\ORM\EntityRepository implements UserLoaderInterface
{
  /**
   * Loads the user for the fiven username.
   * 
   * This method must return null if the user is not found
   * 
   * @param string $username the username
   * 
   * @return UserInterface|null
   */
  public function loadUserByUsername($username){
    return $this->createQueryBuilder('u')
            ->where('username = :username OR email = :email')
            ->setParameter('username', $username)
            ->setParameter('email', $username)
            ->getQuery()
            ->getOneOrNullResult();

  }
}
