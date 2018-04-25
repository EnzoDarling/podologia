<?php
  namespace AppBundle\DataFixtures\ORM;

  use AppBundle\Entity\User;
  use Doctrine\Bundle\FixturesBundle\Fixture;
  use Doctrine\Common\Persistence\ObjectManager;
  use Symfony\Component\DependencyInjection\ContainerAwareInterface;
  use Symfony\Component\DependencyInjection\ContainerInterface;  

  class LoadUserData extends Fixture {
    private $container;
    /**
     * Load data fixtures with the passed EntityManager
     * 
     * @param ObjectManager $manager
     */
    public function load(ObjectManager $manager)
    {
      $user = new User();
      $user->setUsername('admin');
      $user->setEmail('admin@admin.com');
      $encoder = $this->container->get('security.password_encoder');
      $password = $encoder->encodePassword($user, '12345');
      $user->setPassword($password);
      
      $manager->persist($user);
      $manager->flush();
    }

    /**
     * Sets the container.
     * 
     * @param ContainerInterface|null $container A ContainerInterface instance or null
     */
    public function setContainer(ContainerInterface $container = null)
    {
      $this->container = $container;
    }
  }