<?php

namespace AppBundle\Controller;

use AppBundle\Entity\Turno;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\Extension\Core\Type\DateTimeType;
use Symfony\Component\Form\Extension\Core\Type\SubmitType;
use Doctrine\DBAL\Exception\UniqueConstraintViolationException;

class TurnosController extends Controller
{
    /**
     * @Route("/turnos", name="turno_home")
     */
    public function indexAction(){
        $turnos = $this->getDoctrine()
            ->getRepository('AppBundle:Turno')
            ->findAll();
        // replace this example code with whatever you need
        return $this->render('turnos/inicio.html.twig', array('turno' => $turnos));
    }
    /**
     * @Route("/turnos/crear", name="turno_crear")
     */
     public function crearAction(Request $request){
         $turno = new Turno;
         $form = $this->createFormBuilder($turno)
            ->add('turnTelefono', TextType::class, array('label' => 'Telefono', 'attr' => array('class' => 'textField form-control', 'style' => 'margin-bottom: 15px')))
            ->add('turnApellido', TextType::class, array('label' => 'Apellido', 'attr' => array('class' => 'textField form-control', 'style' => 'margin-bottom: 15px')))
            ->add('turnNombre', TextType::class, array('label' => 'Nombre', 'attr' => array('class' => 'textField form-control', 'style' => 'margin-bottom: 15px')))            
            ->add('turnFecha', DateTimeType::class, array('label' => 'Fecha','attr' => array('style' => 'margin-bottom: 15px')))
            ->add('turnDireccion', TextType::class, array('label' => 'Direccion', 'attr' => array('class' => 'textField form-control', 'style' => 'margin-bottom: 15px')))
            ->add('Guardar Turno', SubmitType::class, array('label' => 'Guardar Turno', 'attr' => array('class' => 'btn btn-primary', 'style' => 'margin-bottom: 15px')))
            ->getForm();
        $form->handleRequest($request);
        if($form->isSubmitted() && $form->isValid()){
            $telefono = $form['turnTelefono']->getData();
            $apellido = $form['turnApellido']->getData();
            $nombre = $form['turnNombre']->getData();
            $fecha = $form['turnFecha']->getData();
            $direccion = $form['turnDireccion']->getData();
            $turno->setTurnTelefono($telefono);
            $turno->setTurnApellido($apellido);
            $turno->setTurnNombre($nombre);
            $turno->setTurnFecha($fecha);
            $turno->setTurnDireccion($direccion);
            if($form->isValid()){
                try{
                    $em = $this->getDoctrine()->getManager();
                    $em->persist($turno);
                    $em->flush();
                    $this->get('session')->getFlashBag()->add('notice', 'El turno fue agregado');
                }
                catch( UniqueConstraintViolationException $e){                    
                    $this->get('session')->getFlashBag()->add('error', 'Ya existe un turno con ese número de teléfono');                    
                }
                return $this->redirectToRoute('turno_home');
            }
        }
         // replace this example code with whatever you need
         return $this->render('turnos/crear.html.twig', array('form' => $form->createView()));
     }
     /**
     * @Route("/turnos/editar/{id}", name="turno_editar")
     */
    public function editarAction($id, Request $request){
        $turno = $this->getDoctrine()
        ->getRepository('AppBundle:Turno')
        ->find($id);
        $turno->setTurnTelefono($turno->getTurnTelefono());
        $turno->setTurnApellido($turno->getTurnApellido());
        $turno->setTurnNombre($turno->getTurnNombre());
        $turno->setTurnFecha($turno->getTurnFecha());
        $turno->setTurnDireccion($turno->getTurnDireccion());
        $form = $this->createFormBuilder($turno)
           ->add('turnTelefono', TextType::class, array('label' => 'Telefono', 'attr' => array('class' => 'form-control', 'style' => 'margin-bottom: 15px')))
           ->add('turnApellido', TextType::class, array('label' => 'Apellido', 'attr' => array('class' => 'form-control', 'style' => 'margin-bottom: 15px')))
           ->add('turnNombre', TextType::class, array('label' => 'Nombre', 'attr' => array('class' => 'form-control', 'style' => 'margin-bottom: 15px')))            
           ->add('turnFecha', DateTimeType::class, array('label' => 'Fecha', 'attr' => array('style' => 'margin-bottom: 15px')))
           ->add('turnDireccion', TextType::class, array('label' => 'Direccion', 'attr' => array('class' => 'form-control', 'style' => 'margin-bottom: 15px')))
           ->add('Editar Turno', SubmitType::class, array('label' => 'Editar Turno', 'attr' => array('class' => 'btn btn-primary', 'style' => 'margin-bottom: 15px')))
           ->getForm();
       $form->handleRequest($request);
       if($form->isSubmitted() && $form->isValid()){
           $telefono = $form['turnTelefono']->getData();
           $apellido = $form['turnApellido']->getData();
           $nombre = $form['turnNombre']->getData();
           $fecha = $form['turnFecha']->getData();
           $direccion = $form['turnDireccion']->getData();
           $em = $this->getDoctrine()->getManager();
           $turno = $this->getDoctrine()->getRepository('AppBundle:Turno')->find($id);
           $turno->setTurnTelefono($telefono);
           $turno->setTurnApellido($apellido);
           $turno->setTurnNombre($nombre);
           $turno->setTurnFecha($fecha);
           $turno->setTurnDireccion($direccion);
           $em->flush();
           $this->addFlash(
               'succes',
               'Turno Modificado'
           );
           return $this->redirectToRoute('turno_home');
       }
        // replace this example code with whatever you need
        return $this->render('turnos/editar.html.twig', array(
            'turno' => $turno,
            'form' => $form->createView()
        ));
    }
    /**
     * @Route("/turnos/detalle/{id}", name="turno_detalles")
     */
    public function detallesAction($id)
    {
        $turno = $this->getDoctrine()
        ->getRepository('AppBundle:Turno')
        ->find($id);
        // replace this example code with whatever you need
        return $this->render('turnos/detalles.html.twig', array('turno' => $turno));
    }
    /**
     * @Route("/turnos/eliminar/{id}", name="turno_eliminar")
     */
     public function eliminarAction($id)
     {
        $em = $this->getDoctrine()->getManager();
        $turno = $em->getRepository('AppBundle:Turno')->find($id);
         $em->remove($turno);
         $em->flush();
         $this->addFlash(
             'notice',
             'Turno Eliminado'
         );
         // replace this example code with whatever you need
         return $this->redirectToRoute('turno_home');
     }
}
