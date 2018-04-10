<?php

namespace AppBundle\Controller;

use App\Form\UserType;
use App\Entity\User;
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
    			$password = $passwordEncoder->encodePassword($user, $user->getPassword());
    			$user->setPassword($password);

    			//Guardar el usuario
    			$entityManager = $this->getDoctrine()->getManager();
    			$entityManager->persist($user);
    			$entityManager->flush();
			    return $this->redirectToRoute('homepage');
    		}
    return $this->render('registration/register.html.twig', array('form'=>$form->createView())
  	);
  }
}