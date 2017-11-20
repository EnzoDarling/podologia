<?php

namespace AppBundle\Controller;
use AppBundle\Entity\Paciente;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\Extension\Core\Type\SubmitType;
use Doctrine\DBAL\Exception\UniqueConstraintViolationException;

class PacientesController extends Controller{
    /**
     * @Route("/pacientes", name="paciente_inicio")
     */
    public function indexAction(){
        $pacientes = $this->getDoctrine()
            ->getRepository('AppBundle:Paciente')
            ->findAll();
        // replace this example code with whatever you need
        return $this->render('pacientes/inicio.html.twig', array('paciente' => $pacientes));
    }
    /**
     * @Route("/pacientes/crear", name="paciente_crear")
     */
    public function crearAction(Request $request){
        $paciente = new Paciente;
        $form = $this->createFormBuilder($paciente)
            ->add('telefono', TextType::class, array('attr' => array('class' => 'form-control', 'style' => 'margin-bottom: 15px')))
            ->add('apellido', TextType::class, array('attr' => array('class' => 'form-control', 'style' => 'margin-bottom: 15px')))
            ->add('nombre', TextType::class, array('attr' => array('class' => 'form-control', 'style' => 'margin-bottom: 15px')))
            ->add('domicilio', TextType::class, array('attr' => array('class' => 'form-control', 'style' => 'margin-bottom: 15px')))
            ->add('Guardar', SubmitType::class, array('label' => 'Crear Paciente','attr' => array('class' => 'btn btn-primary', 'style' => 'margin-bottom: 15px')))            
            ->getForm();
        $form->handleRequest($request);
        if($form->isSubmitted() && $form->isValid()){
            $telefono = $form['telefono']->getData();
            $apellido = $form['apellido']->getData();
            $nombre = $form['nombre']->getData();
            $domicilio = $form['domicilio']->getData();
            $paciente->setTelefono($telefono);
            $paciente->setApellido($apellido);
            $paciente->setNombre($nombre);
            $paciente->setDomicilio($domicilio);
            if($form->isValid()){
                try{
                    $em = $this->getDoctrine()->getManager();
                    $em->persist($paciente);
                    $em->flush();
                    $this->get('session')->getFlashBag()->add('notice', 'El paciente fue agregado');
                }
                catch( UniqueConstraintViolationException $e){                    
                    $this->get('session')->getFlashBag()->add('error', 'Ya existe un paciente con ese número de teléfono');                    
                }
                return $this->redirectToRoute('paciente_inicio');
            }
        }
        // replace this example code with whatever you need
        return $this->render('pacientes/crear.html.twig', array('form' => $form->createView()));
    }
    /**
     * @Route("/pacientes/editar/{id}", name="paciente_editar")
     */
    public function editarAction($id, Request $request){
        $paciente = $this->getDoctrine()
        ->getRepository('AppBundle:Paciente')
        ->find($id);
        $paciente->setTelefono($paciente->getTelefono());
        $paciente->setApellido($paciente->getApellido());
        $paciente->setNombre($paciente->getNombre());
        $paciente->setDomicilio($paciente->getDomicilio());
        $form = $this->createFormBuilder($paciente)
            ->add('telefono', TextType::class, array('attr' => array('class' => 'form-control', 'style' => 'margin-bottom: 15px')))
            ->add('apellido', TextType::class, array('attr' => array('class' => 'form-control', 'style' => 'margin-bottom: 15px')))
            ->add('nombre', TextType::class, array('attr' => array('class' => 'form-control', 'style' => 'margin-bottom: 15px')))
            ->add('domicilio', TextType::class, array('attr' => array('class' => 'form-control', 'style' => 'margin-bottom: 15px')))
            ->add('Guardar', SubmitType::class, array('label' => 'Modificar Paciente','attr' => array('class' => 'btn btn-primary', 'style' => 'margin-bottom: 15px')))            
            ->getForm();
        $form->handleRequest($request);
        if($form->isSubmitted() && $form->isValid()){
            $telefono = $form['telefono']->getData();
            $apellido = $form['apellido']->getData();
            $nombre = $form['nombre']->getData();
            $domicilio = $form['domicilio']->getData();
            $em = $this->getDoctrine()->getManager();
            $paciente = $em->getRepository('AppBundle:Paciente')->find($id);
            $paciente->setTelefono($telefono);
            $paciente->setApellido($apellido);
            $paciente->setNombre($nombre);
            $paciente->setDomicilio($domicilio);
            $em->flush();
            $this->addFlash(
                'notice',
                'Paciente Modificado'
            );
            return $this->redirectToRoute('paciente_inicio');
        }        
        return $this->render('pacientes/editar.html.twig', array(
            'paciente' => $paciente,
            'form' => $form->createView()
        ));
    }
    /**
     * @Route("/pacientes/detalles/{id}", name="paciente_detalle")
     */
    public function detallesAction($id){
        $paciente = $this->getDoctrine()
        ->getRepository('AppBundle:Paciente')
        ->find($id);
   
        return $this->render('pacientes/detalles.html.twig', array('paciente' => $paciente));
    }
    /**
     * @Route("/pacientes/eliminar/{id}", name="paciente_eliminar")
     */
     public function eliminarAction($id){
        $em = $this->getDoctrine()->getManager();
        $paciente = $em->getRepository('AppBundle:Paciente')->find($id);
        $em->remove($paciente);
        $em->flush();
        $this->addFlash(
            'notice',
            'Paciente Eliminado'
        );
        return $this->redirectToRoute('paciente_inicio');
    }
}
