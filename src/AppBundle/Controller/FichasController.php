<?php

namespace AppBundle\Controller;
use AppBundle\Entity\Fichas;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\Extension\Core\Type\ChoiceType;
use Symfony\Component\Form\Extension\Core\Type\SubmitType;

class FichasController extends Controller
{
    /**
     * @Route("/fichas", name="ficha_inicio")
     */
    public function indexAction()
    {
        $ficha = $this->getDoctrine()
            ->getRepository('AppBundle:Fichas')
            ->findAll();
        // replace this example code with whatever you need
        return $this->render('fichas/inicio.html.twig', array('ficha' => $ficha));
    }
    /**
     * @Route("/fichas/crear", name="ficha_crear")
     */
    public function crearAction(Request $request)
    {
        $ficha = new Fichas;
        $form = $this->createFormBuilder($ficha)
            ->add('fichaApellido', TextType::class, array('label' => 'Apellido', 'attr' => array('class' => 'form-control', 'style' => 'margin-bottom: 15px')))
            ->add('fichaNombre', TextType::class, array('label' => 'Nombre','attr' => array('class' => 'form-control', 'style' => 'margin-bottom: 15px')))
            ->add('fichaEdad', TextType::class, array('label' => 'Edad','attr' => array('class' => 'form-control', 'style' => 'margin-bottom: 15px')))
            ->add('fichaDireccion', TextType::class, array('label' => 'Direccion','attr' => array('class' => 'form-control', 'style' => 'margin-bottom: 15px')))
            ->add('fichaHiperhidro', ChoiceType::class, array('label' => 'Hiperhidrosis','choices' => array('Si' => 'Si', 'No' => 'No'),'attr' => array('class' => 'form-control', 'style' => 'margin-bottom: 15px')))
            ->add('fichaMicosis', ChoiceType::class, array('label' => 'Micosis','choices' => array('Si' => 'Si', 'No' => 'No'),'attr' => array('class' => 'form-control', 'style' => 'margin-bottom: 15px')))
            ->add('fichaAnticua', ChoiceType::class, array('label' => 'Anticuagulado', 'choices' => array('Si' => 'Si', 'No' => 'No'),'attr' => array('class' => 'form-control', 'style' => 'margin-bottom: 15px')))
            ->add('fichaDbt', ChoiceType::class, array('label' => 'DBT', 'choices' => array('Si' => 'Si', 'No' => 'No'),'attr' => array('class' => 'form-control', 'style' => 'margin-bottom: 15px')))
            ->add('fichaOnicocri', ChoiceType::class, array('label' => 'Onicocriptosis', 'choices' => array('Si' => 'Si', 'No' => 'No'),'attr' => array('class' => 'form-control', 'style' => 'margin-bottom: 15px')))
            ->add('fichaEdema', ChoiceType::class, array('label' => 'Edema', 'choices' => array('Si' => 'Si', 'No' => 'No'),'attr' => array('class' => 'form-control', 'style' => 'margin-bottom: 15px')))
            ->add('fichaTalon', ChoiceType::class, array('label' => 'Talon Agrietado', 'choices' => array('Si' => 'Si', 'No' => 'No'),'attr' => array('class' => 'form-control', 'style' => 'margin-bottom: 15px')))
            ->add('fichaAfecciones', ChoiceType::class, array('label' => 'Afecciones Cardiacas', 'choices' => array('Si' => 'Si', 'No' => 'No'),'attr' => array('class' => 'form-control', 'style' => 'margin-bottom: 15px')))
            ->add('fichaHiperquera', ChoiceType::class, array( 'choices' => array('Si' => 'Si', 'No' => 'No'),'attr' => array('class' => 'form-control', 'style' => 'margin-bottom: 15px')))
            ->add('Guardar', SubmitType::class, array('label' => 'Crear Paciente','attr' => array('class' => 'btn btn-primary', 'style' => 'margin-bottom: 15px')))            
            ->getForm();
        $form->handleRequest($request);
        if($form->isSubmitted() && $form->isValid()){
            $fichaApellido = $form['fichaApellido']->getData();
            $fichaNombre = $form['fichaNombre']->getData();
            $fichaEdad = $form['fichaEdad']->getData();
            $fichaDireccion = $form['fichaDireccion']->getData();
            $fichaHiperhidro = $form['fichaHiperhidro']->getData();
            $fichaMicosis = $form['fichaMicosis']->getData();
            $fichaAnticua = $form['fichaAnticua']->getData();
            $fichaDbt = $form['fichaDbt']->getData();
            $fichaOnicocri = $form['fichaOnicocri']->getData();
            $fichaEdema = $form['fichaEdema']->getData();
            $fichaTalon = $form['fichaTalon']->getData();
            $fichaAfecciones = $form['fichaAfecciones']->getData();
            $fichaHiperquera = $form['fichaHiperquera']->getData();
            $ficha->setFichaApellido($fichaApellido);
            $ficha->setFichaNombre($fichaNombre);
            $ficha->setFichaEdad($fichaEdad);
            $ficha->setFichaDireccion($fichaDireccion);
            $ficha->setFichaHiperhidro($fichaHiperhidro);
            $ficha->setFichaMicosis($fichaMicosis);
            $ficha->setFichaAnticua($fichaAnticua);
            $ficha->setFichaDbt($fichaDbt);
            $ficha->setFichaOnicocri($fichaOnicocri);
            $ficha->setFichaEdema($fichaEdema);
            $ficha->setFichaTalon($fichaTalon);
            $ficha->setFichaAfecciones($fichaAfecciones);
            $ficha->setFichaHiperquera($fichaHiperquera);          
            $em = $this->getDoctrine()->getManager();
            $em->persist($ficha);
            $em->flush();
            $this->addFlash(
                'succes',
                'Ficha Guardada'
            );
            return $this->redirectToRoute('ficha_inicio');
        }
        // replace this example code with whatever you need
        return $this->render('fichas/crear.html.twig', array('form' => $form->createView()));
    }
    /**
     * @Route("/fichas/editar/{id}", name="ficha_editar")
     */
    public function editarAction($id, Request $request)
    {
        $ficha = $this->getDoctrine()
        ->getRepository('AppBundle:Fichas')
        ->find($id);
        $ficha->setFichaApellido($ficha->getFichaNombre());
            $ficha->setFichaNombre($ficha->getFichaNombre());
            $ficha->setFichaEdad($ficha->getFichaEdad());
            $ficha->setFichaDireccion($ficha->getFichaDireccion());
            $ficha->setFichaHiperhidro($ficha->getFichaHiperhidro());
            $ficha->setFichaMicosis($ficha->getFichaMicosis());
            $ficha->setFichaAnticua($ficha->getFichaAnticua());
            $ficha->setFichaDbt($ficha->getFichaDbt());
            $ficha->setFichaOnicocri($ficha->getFichaOnicocri());
            $ficha->setFichaEdema($ficha->getFichaEdema());
            $ficha->setFichaTalon($ficha->getFichaTalon());
            $ficha->setFichaAfecciones($ficha->getFichaAfecciones());
            $ficha->setFichaHiperquera($ficha->getFichaHiperquera());
        $form = $this->createFormBuilder($ficha)
            ->add('fichaApellido', TextType::class, array('attr' => array('class' => 'form-control', 'style' => 'margin-bottom: 15px')))
            ->add('fichaNombre', TextType::class, array('attr' => array('class' => 'form-control', 'style' => 'margin-bottom: 15px')))
            ->add('fichaEdad', TextType::class, array('attr' => array('class' => 'form-control', 'style' => 'margin-bottom: 15px')))
            ->add('fichaDireccion', TextType::class, array('attr' => array('class' => 'form-control', 'style' => 'margin-bottom: 15px')))
            ->add('fichaHiperhidro', ChoiceType::class, array('choices' => array('Si' => 'Si', 'No' => 'No'),'attr' => array('class' => 'form-control', 'style' => 'margin-bottom: 15px')))
            ->add('fichaMicosis', ChoiceType::class, array( 'choices' => array('Si' => 'Si', 'No' => 'No'),'attr' => array('class' => 'form-control', 'style' => 'margin-bottom: 15px')))
            ->add('fichaAnticua', ChoiceType::class, array( 'choices' => array('Si' => 'Si', 'No' => 'No'),'attr' => array('class' => 'form-control', 'style' => 'margin-bottom: 15px')))
            ->add('fichaOnicocri', ChoiceType::class, array( 'choices' => array('Si' => 'Si', 'No' => 'No'),'attr' => array('class' => 'form-control', 'style' => 'margin-bottom: 15px')))
            ->add('fichaEdema', ChoiceType::class, array( 'choices' => array('Si' => 'Si', 'No' => 'No'),'attr' => array('class' => 'form-control', 'style' => 'margin-bottom: 15px')))
            ->add('fichaTalon', ChoiceType::class, array( 'choices' => array('Si' => 'Si', 'No' => 'No'),'attr' => array('class' => 'form-control', 'style' => 'margin-bottom: 15px')))
            ->add('fichaAfecciones', ChoiceType::class, array( 'choices' => array('Si' => 'Si', 'No' => 'No'),'attr' => array('class' => 'form-control', 'style' => 'margin-bottom: 15px')))
            ->add('fichaHiperquera', ChoiceType::class, array( 'choices' => array('Si' => 'Si', 'No' => 'No'),'attr' => array('class' => 'form-control', 'style' => 'margin-bottom: 15px')))
            ->add('Guardar', SubmitType::class, array('label' => 'Crear Paciente','attr' => array('class' => 'btn btn-primary', 'style' => 'margin-bottom: 15px')))            
            ->getForm();
        $form->handleRequest($request);
        if($form->isSubmitted() && $form->isValid()){
            $fichaApellido = $form['fichaApellido']->getData();
            $fichaNombre = $form['fichaNombre']->getData();
            $fichaEdad = $form['fichaEdad']->getData();
            $fichaDireccion = $form['fichaDireccion']->getData();
            $fichaHiperhidro = $form['fichaHiperhidro']->getData();
            $fichaMicosis = $form['fichaMicosis']->getData();
            $fichaAnticua = $form['fichaAnticua']->getData();
            $fichaDbt = $form['fichaDbt']->getData();
            $fichaOnicocri = $form['fichaOnicocri']->getData();
            $fichaEdema = $form['fichaEdema']->getData();
            $fichaTalon = $form['fichaTalon']->getData();
            $fichaAfecciones = $form['fichaAfecciones']->getData();
            $fichaHiperquera = $form['fichaHiperquera']->getData();
            $em = $this->getDoctrine()->getManager();
            $ficha = $this->getDoctrine()
              ->getRepository('AppBundle:Fichas')
              ->find($id);
            $ficha->setFichaApellido($fichaApellido);
            $ficha->setFichaNombre($fichaNombre);
            $ficha->setFichaEdad($fichaEdad);
            $ficha->setFichaDireccion($fichaDireccion);
            $ficha->setFichaHiperhidro($fichaHiperhidro);
            $ficha->setFichaMicosis($fichaMicosis);
            $ficha->setFichaAnticua($fichaAnticua);
            $ficha->setFichaDbt($fichaDbt);
            $ficha->setFichaOnicocri($fichaOnicocri);
            $ficha->setFichaEdema($fichaEdema);
            $ficha->setFichaTalon($fichaTalon);
            $ficha->setFichaAfecciones($fichaAfecciones);
            $ficha->setFichaHiperquera($fichaHiperquera);          
            $em = $this->getDoctrine()->getManager();
            $em->persist($ficha);
            $em->flush();
            $this->addFlash(
                'succes',
                'Ficha Modificada'
            );
            return $this->redirectToRoute('ficha_inicio');
          }
        return $this->render('fichas/editar.html.twig', array('ficha' => $ficha, 'form' => $form->createView()));
      }
    /**
     * @Route("/fichas/detalle/{id}", name="ficha_detalle")
     */
    public function detalleAction($id)
    {
        $ficha = $this->getDoctrine()
        ->getRepository('AppBundle:Fichas')
        ->find($id);
        // replace this example code with whatever you need
        return $this->render('fichas/detalle.html.twig', array('ficha' => $ficha));
    }
    /**
     * @Route("/fichas/eliminar/{id}", name="ficha_eliminar")
     */
    public function eliminarAction($id)
    {
        $em = $this->getDoctrine()->getManager();
        $ficha = $em->getRepository('AppBundle:Fichas')->find($id);
        $em->remove($ficha);
        $em->flush();
        $this->addFlash(
            'notice',
            'Ficha Eliminada'
        );
        return $this->redirectToRoute('ficha_inicio');
    }
}
