<?php

namespace AppBundle\Controller;

use AppBundle\Form\UserType;
use AppBundle\Entity\User;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\Security\Core\Encoder\UserPasswordEncoderInterface;

class RegistrationController extends Controller
{
    /**
     * @Route("/register", name="user_registration")
     */
    public function registerAction(Request $request, UserPasswordEncoderInterface $passwordEncoder)
    {
    		//Construir el formulario
    		$user = new User();
    		$form = $this->createForm(UserType::class, $user);
    		//Manejar el submit (solo pasara en un POST)    		
    		$form->handleRequest($request);
    		if($form->isSubmitted() && $form->isValid()){
    			//Codificar la contraseña
    			$user->setPassword($passwordEncoder->encodePassword($user, $user->getPassword()));
    			//Guardar el usuario
    			$entityManager = $this->getDoctrine()->getManager();
    			$entityManager->persist($user);
    			$entityManager->flush();
			    return $this->redirectToRoute('login');
    		}
    return $this->render('registration/register.html.twig', array('form'=>$form->createView())
  	);
  }
}