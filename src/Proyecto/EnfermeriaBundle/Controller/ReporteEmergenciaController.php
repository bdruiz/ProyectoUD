<?php

namespace Proyecto\EnfermeriaBundle\Controller;


use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Method;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Template;
use Proyecto\EnfermeriaBundle\Entity\ReporteEmergencia;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\HttpFoundation\Request;
use Proyecto\EnfermeriaBundle\Form\ReporteEmergenciaType;
use Proyecto\EnfermeriaBundle\Entity\SeguridadSocial;
/**
 * ReporteEmergencia controller.
 *
 * @Route("/ud/enfermeria/reporte")
 */
class ReporteEmergenciaController extends Controller
{

    /**
     * Lists all ReporteEmergencia entities.
     *
     * @Route("/", name="ud_enfermeria_reporte")
     * @Method("GET")
     * @Template()
     */
    public function indexAction()
    {
        $em = $this->getDoctrine()->getManager();

        $entities = $em->getRepository('EnfermeriaBundle:ReporteEmergencia')->findAll();

        return array(
            'entities' => $entities,
        );
    }

    /**
     * Finds and displays a ReporteEmergencia entity.
     *
     * @Route("/{id}", name="ud_enfermeria_reporte_show")
     * @Method("GET")
     * @Template()
     */
    public function showAction($id)
    {
        $em = $this->getDoctrine()->getManager();

        $entity = $em->getRepository('EnfermeriaBundle:ReporteEmergencia')->find($id);

        if (!$entity) {
            throw $this->createNotFoundException('Unable to find ReporteEmergencia entity.');
        }

        return array(
            'entity'      => $entity,
        );
    }

    /**
     *
     * @Route("/", name="ud_enfermeria_reporte_create")
     * @Method("POST")
     * @Template("EnfermeriaBundle:ReporteEmergencia:new.html.twig")
     */

    public function createAction(Request $request){

        $entity = new ReporteEmergencia();
        $form = $this->createCreateForm($entity);
        $form->handleRequest($request);

        if ($form->isValid()){

            $em = $this->getDoctrine()->getEntityManager();
            $em->persist($entity);
            $em->flush();

            return $this->redirect($this->generateUrl('ud_enfermeria_reporte_show', array('id' => $entity->getId())));
        }
        return array(
            'entity' => $entity,
            'form' => $form,
        );
    }

    /**
     *
     * @Route("/new", name="ud_enfermeria_reporte_new" )
     * @Method("POST")
     * @Template()
     */
    public function newAction()
    {
        $entity = new ReporteEmergencia();
        $form = $this->createCreateForm($entity);

        return array(
            'entity' => $entity,
            'form' => $form->createView(),
        );
    }

    private function createCreateForm(ReporteEmergencia $entity)
    {
        $form = $this->createForm(new ReporteEmergenciaType(), $entity, array(
            'action' => $this->generateUrl('ud_enfermeria_reporte_create'),
            'method' => 'POST',
        ));

        $form->add('submit', 'submit', array('label' => 'crear'));

        return $form;
    }

    /**
     * @Route("/search/{id}" , name="ud_enfermeria_reporte_search", options={"expose"=true})
     * @Method("GET")
     */
    public function searchAction($id){
        $em = $this->getDoctrine()->getEntityManager();

        $consulta = $em->getRepository('EnfermeriaBundle:SeguridadSocial')->findBySsocial($id);

        if(!$consulta){
            //throw $this->createNotFoundException('No se encuentra el usuario');
            return new JsonResponse(array('mensaje' =>'El usuario no existe'), 404);
        }

        /*return new JsonResponse(array(
            'consulta' => $consulta,
            //'id' => $consulta->usuario->getId(),
        ));*/
        return new JsonResponse($consulta);
    }
}
