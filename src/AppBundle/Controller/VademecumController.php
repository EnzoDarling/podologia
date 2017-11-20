<?php

namespace AppBundle\Controller;
use AppBundle\Entity\Vade;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\Extension\Core\Type\TextareaType;
use Symfony\Component\Form\Extension\Core\Type\SubmitType;

class VademecumController extends Controller
{
    /**
     * @Route("/vademecum", name="vade_home")
     */
    public function indexAction()
    {
        $vademecum = $this->getDoctrine()
            ->getRepository('AppBundle:Vade')
            ->findAll();
        return $this->render('vade/inicio.html.twig', array('vademecum' => $vademecum));
    }
    /**
     * @Route("/vademecum/crear", name="vade_crear")
     */
     public function crearAction(Request $request)
     {
        $vademecum = new Vade;
        $form = $this->createFormBuilder($vademecum)
           ->add('vadeNombre', TextType::class, array('label' => 'Nombre', 'attr' => array('class' => 'form-control', 'style' => 'margin-bottom: 15px')))
           ->add('vadePosologia', TextType::class, array('label' => 'Posología', 'attr' => array('class' => 'form-control', 'style' => 'margin-bottom: 15px')))
           ->add('vadeIndicacion', TextareaType::class, array('label' => 'Indicaciones', 'attr' => array('class' => 'form-control', 'style' => 'margin-bottom: 15px')))           
           ->add('Guardar Turno', SubmitType::class, array('label' => 'Guardar Posologia', 'attr' => array('class' => 'btn btn-primary', 'style' => 'margin-bottom: 15px')))
           ->getForm();
       $form->handleRequest($request);
       if($form->isSubmitted() && $form->isValid()){
           $nombre = $form['vadeNombre']->getData();
           $posologia = $form['vadePosologia']->getData();
           $indicacion = $form['vadeIndicacion']->getData();
           $vademecum->setVadeNombre($nombre);
           $vademecum->setVadePosologia($posologia);
           $vademecum->setVadeIndicacion($indicacion);
           $em = $this->getDoctrine()->getManager();
           $em->persist($vademecum);
           $em->flush();
           $this->addFlash(
               'succes',
               'Posologia Agregada'
           );
           return $this->redirectToRoute('vade_home');
       }
        // replace this example code with whatever you need
        return $this->render('vade/crear.html.twig', array('form' => $form->createView()));
     }
     /**
     * @Route("/vademecum/editar/{id}", name="vade_editar")
     */
    public function editarAction($id, Request $request)
    {
       $vademecum = $this->getDoctrine()
        ->getRepository('AppBundle:Vade')
        ->find($id);
        $vademecum->setVadeNombre($vademecum->getVadeNombre());
        $vademecum->setVadePosologia($vademecum->getVadePosologia());
        $vademecum->setVadeIndicacion($vademecum->getVadeIndicacion());
        $form = $this->createFormBuilder($vademecum)
           ->add('vadeNombre', TextType::class, array('label' => 'Nombre', 'attr' => array('class' => 'form-control', 'style' => 'margin-bottom: 15px')))
           ->add('vadePosologia', TextType::class, array('label' => 'Posología', 'attr' => array('class' => 'form-control', 'style' => 'margin-bottom: 15px')))
           ->add('vadeIndicacion', TextareaType::class, array('label' => 'Indicaciones', 'attr' => array('class' => 'form-control', 'style' => 'margin-bottom: 15px')))           
           ->add('Guardar Turno', SubmitType::class, array('label' => 'Guardar Posologia', 'attr' => array('class' => 'btn btn-primary', 'style' => 'margin-bottom: 15px')))
           ->getForm();
       $form->handleRequest($request);
       if($form->isSubmitted() && $form->isValid()){
           $nombre = $form['vadeNombre']->getData();
           $posologia = $form['vadePosologia']->getData();
           $indicacion = $form['vadeIndicacion']->getData();
           $em = $this->getDoctrine()->getManager();
           $vademecum = $this->getDoctrine()
            ->getRepository('AppBundle:Vade')
            ->find($id);
           $vademecum->setVadeNombre($nombre);
           $vademecum->setVadePosologia($posologia);
           $vademecum->setVadeIndicacion($indicacion);
           $em->persist($vademecum);
           $em->flush();
           $this->addFlash(
               'succes',
               'Posologia Modificada'
           );
           return $this->redirectToRoute('vade_home');
       }
        // replace this example code with whatever you need
        return $this->render('vade/editar.html.twig', array('vademecum' => $vademecum, 'form' => $form->createView()));
    }
    /**
     * @Route("/vademecum/detalle/{id}", name="vade_detalles")
     */
     public function detallesAction($id)
     {
        $vademecum = $this->getDoctrine()
        ->getRepository('AppBundle:Vade')
        ->find($id);
        // replace this example code with whatever you need
        return $this->render('vade/detalle.html.twig', array('vademecum' => $vademecum));
     }
     /**
     * @Route("/vademecum/eliminar/{id}", name="vade_eliminar")
     */
     public function eliminarAction($id)
     {
        $em = $this->getDoctrine()->getManager();
        $vademecum = $em->getRepository('AppBundle:Vade')->find($id);
        $em->remove($vademecum);
        $em->flush();
        $this->addFlash(
          'notice',
          'Posologia Eliminada'
        );
        // replace this example code with whatever you need
        return $this->redirectToRoute('vade_home');
     } 
}
