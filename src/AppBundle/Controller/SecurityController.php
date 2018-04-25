<?php
	namespace AppBundle\Controller;
	use Symfony\Bundle\FrameworkBundle\Controller\Controller;
	use Symfony\Component\HttpFoundation\Request;
	use Symfony\Component\Routing\Annotation\Route;
	use Symfony\Component\Security\Http\Authentication\AuthenticationUtils;
	class SecurityController extends Controller{
		/**
			*@Route("/login", name="login")
			*/
		public function loginAction(Request $request, AuthenticationUtils $authenticationUtils){
			$error = $authenticationUtils->getLastAuthenticationError();
			$lastUsername = $authenticationUtils->getLastUserName();
			return $this->render('seguridad/login.html.twig', array(
				'last_username' => $lastUsername,
				'error' => $error,
			));
		}
		/**
		 * @Route("/logout", name="logout")
		*/
		public function logoutAction(){

		}
	}