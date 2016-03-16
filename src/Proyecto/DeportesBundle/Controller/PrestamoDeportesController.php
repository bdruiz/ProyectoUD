<?php

namespace Proyecto\DeportesBundle\Controller;


use Proyecto\DeportesBundle\Form\PrestamoDeportesType;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Method;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Template;
use Proyecto\DeportesBundle\Entity\PrestamoDeportes;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\HttpFoundation\Request;

/**
 * PrestamoDeportes controller.
 *
 * @Route("/ud/deportes/prestamo")
 */
class PrestamoDeportesController extends Controller
{

    /**
     * Lists all PrestamoDeportes entities.
     *
     * @Route("/", name="ud_deportes_prestamo")
     * @Method("GET")
     * @Template()
     */
    public function indexAction()
    {
        $em = $this->getDoctrine()->getManager();

        $entities = $em->getRepository('DeportesBundle:PrestamoDeportes')->findAll();

        return array(
            'entities' => $entities,
        );
    }

    /**
     * Finds and displays a PrestamoDeportes entity.
     *
     * @Route("/{id}", name="ud_deportes_prestamo_show")
     * @Method("GET")
     * @Template()
     */
    public function showAction($id)
    {
        $em = $this->getDoctrine()->getManager();

        $entity = $em->getRepository('DeportesBundle:PrestamoDeportes')->find($id);

        if (!$entity) {
            throw $this->createNotFoundException('Unable to find PrestamoDeportes entity.');
        }

        return array(
            'entity'      => $entity,
        );
    }

    /**
     * Creates a new PrestamoDeportes entity.
     *
     * @Route("/", name="ud_deportes_prestamo_create")
     * @Method("POST")
     * @Template("DeportesBundle:PrestamoDeportes:new.html.twig")
     */
    public function createAction(Request $request){
        $entity = new PrestamoDeportes();
        $form = $this->createCreateForm($entity);
        $form->handleRequest($request);

        $em = $this->getDoctrine()->getManager();

        if($form->isValid()){
            $em = $this->getDoctrine()->getManager();
            $em->persist($entity);
            $em->flush();

            return $this->redirect($this->generateUrl('ud_deportes_prestamo_show', array('id' => $entity->getId())));
        }

        return array(
            'entity' => $entity,
            'form' => $form
        );
    }

    /**
     * Creates a form to create a PrestamoDeportes entity.
     *
     * @param PrestamoDeportes $entity The entity
     *
     * @return \Symfony\Component\Form\Form The form
     */
    private function createCreateForm($entity)
    {
        $form = $this->createForm(new PrestamoDeportesType(), $entity, array(
            'action' => $this->generateUrl('ud_deportes_prestamo_create'),
            'method' => 'POST',
        ));

        $form->add('submit', 'submit', array('label' =>'crear'));

        return $form;
    }

    /**
     * Displays a form to create a new PrestamoDeportes entity.
     *
     * @Route("/new", name="ud_deportes_prestamo_new")
     * @Method("GET")
     * @Template()
     */
    public function newAction(){
        $entity = new PrestamoDeportes();
        $form = $this->createCreateForm($entity);

        return array(
            'entity' => $entity,
            'form' => $form->createView(),
        );
    }

    /**
     * @Route("/cantidad/{id}" , name="ud_deportes_prestamo_cantidad", options={"expose"=true})
     * @Method("GET")
     */
    public function cantidadAction($id)
    {
        $em = $this->getDoctrine()->getEntityManager();
        $consulta = $em->getRepository('DeportesBundle:InventarioDeportes')->find($id);

        $cantidad = $consulta->getCantidad();

        return new JsonResponse($cantidad);
    }

}

