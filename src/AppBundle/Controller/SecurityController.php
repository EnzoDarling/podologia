<?php
	namespace AppBundle\Controller;
	use Symfony\Bundle\FrameworkBundle\Controller\Controller;
	use Symfony\Component\HttpFoundation\Request;
	use Symfony\Component\Routing\Annotation\Route;
	

	class SecurityController extends Controller{
		/**
			*@Route("/login", name="Login")
			*/
		public function loginAction(Request $request){

		}
	}