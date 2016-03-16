<?php

namespace Proyecto\DeportesBundle\Controller;

use Symfony\Component\HttpFoundation\Request;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Method;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Template;
use Proyecto\DeportesBundle\Entity\InventarioDeportes;
use Proyecto\DeportesBundle\Form\InventarioDeportesType;

/**
 * InventarioDeportes controller.
 *
 * @Route("/ud/deportes/inventario")
 */
class InventarioDeportesController extends Controller
{

    /**
     * Lists all InventarioDeportes entities.
     *
     * @Route("/", name="ud_deportes_inventario")
     * @Method("GET")
     * @Template()
     */
    public function indexAction()
    {
        $em = $this->getDoctrine()->getManager();

        $entities = $em->getRepository('DeportesBundle:InventarioDeportes')->findAll();

        return array(
            'entities' => $entities,
        );
    }
    /**
     * Creates a new InventarioDeportes entity.
     *
     * @Route("/", name="ud_deportes_inventario_create")
     * @Method("POST")
     * @Template("DeportesBundle:InventarioDeportes:new.html.twig")
     */
    public function createAction(Request $request)
    {
        $entity = new InventarioDeportes();
        $form = $this->createCreateForm($entity);
        $form->handleRequest($request);

        if ($form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->persist($entity);
            $em->flush();

            return $this->redirect($this->generateUrl('ud_deportes_inventario_show', array('id' => $entity->getId())));
        }

        return array(
            'entity' => $entity,
            'form'   => $form->createView(),
        );
    }

    /**
     * Creates a form to create a InventarioDeportes entity.
     *
     * @param InventarioDeportes $entity The entity
     *
     * @return \Symfony\Component\Form\Form The form
     */
    private function createCreateForm(InventarioDeportes $entity)
    {
        $form = $this->createForm(new InventarioDeportesType(), $entity, array(
            'action' => $this->generateUrl('ud_deportes_inventario_create'),
            'method' => 'POST',
        ));

        $form->add('submit', 'submit', array('label' => 'Create'));

        return $form;
    }

    /**
     * Displays a form to create a new InventarioDeportes entity.
     *
     * @Route("/new", name="ud_deportes_inventario_new")
     * @Method("GET")
     * @Template()
     */
    public function newAction()
    {
        $entity = new InventarioDeportes();
        $form   = $this->createCreateForm($entity);

        return array(
            'entity' => $entity,
            'form'   => $form->createView(),
        );
    }

    /**
     * Finds and displays a InventarioDeportes entity.
     *
     * @Route("/{id}", name="ud_deportes_inventario_show")
     * @Method("GET")
     * @Template()
     */
    public function showAction($id)
    {
        $em = $this->getDoctrine()->getManager();

        $entity = $em->getRepository('DeportesBundle:InventarioDeportes')->find($id);

        if (!$entity) {
            throw $this->createNotFoundException('Unable to find InventarioDeportes entity.');
        }

        $deleteForm = $this->createDeleteForm($id);

        return array(
            'entity'      => $entity,
            'delete_form' => $deleteForm->createView(),
        );
    }

    /**
     * Displays a form to edit an existing InventarioDeportes entity.
     *
     * @Route("/{id}/edit", name="ud_deportes_inventario_edit")
     * @Method("GET")
     * @Template()
     */
    public function editAction($id)
    {
        $em = $this->getDoctrine()->getManager();

        $entity = $em->getRepository('DeportesBundle:InventarioDeportes')->find($id);

        if (!$entity) {
            throw $this->createNotFoundException('Unable to find InventarioDeportes entity.');
        }

        $editForm = $this->createEditForm($entity);
        $deleteForm = $this->createDeleteForm($id);

        return array(
            'entity'      => $entity,
            'edit_form'   => $editForm->createView(),
            'delete_form' => $deleteForm->createView(),
        );
    }

    /**
    * Creates a form to edit a InventarioDeportes entity.
    *
    * @param InventarioDeportes $entity The entity
    *
    * @return \Symfony\Component\Form\Form The form
    */
    private function createEditForm(InventarioDeportes $entity)
    {
        $form = $this->createForm(new InventarioDeportesType(), $entity, array(
            'action' => $this->generateUrl('ud_deportes_inventario_update', array('id' => $entity->getId())),
            'method' => 'PUT',
        ));

        $form->add('submit', 'submit', array('label' => 'Update'));

        return $form;
    }
    /**
     * Edits an existing InventarioDeportes entity.
     *
     * @Route("/{id}", name="ud_deportes_inventario_update")
     * @Method("PUT")
     * @Template("DeportesBundle:InventarioDeportes:edit.html.twig")
     */
    public function updateAction(Request $request, $id)
    {
        $em = $this->getDoctrine()->getManager();

        $entity = $em->getRepository('DeportesBundle:InventarioDeportes')->find($id);

        if (!$entity) {
            throw $this->createNotFoundException('Unable to find InventarioDeportes entity.');
        }

        $deleteForm = $this->createDeleteForm($id);
        $editForm = $this->createEditForm($entity);
        $editForm->handleRequest($request);

        if ($editForm->isValid()) {
            $em->flush();

            return $this->redirect($this->generateUrl('ud_deportes_inventario_edit', array('id' => $id)));
        }

        return array(
            'entity'      => $entity,
            'edit_form'   => $editForm->createView(),
            'delete_form' => $deleteForm->createView(),
        );
    }
    /**
     * Deletes a InventarioDeportes entity.
     *
     * @Route("/{id}", name="ud_deportes_inventario_delete")
     * @Method("DELETE")
     */
    public function deleteAction(Request $request, $id)
    {
        $form = $this->createDeleteForm($id);
        $form->handleRequest($request);

        if ($form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $entity = $em->getRepository('DeportesBundle:InventarioDeportes')->find($id);

            if (!$entity) {
                throw $this->createNotFoundException('Unable to find InventarioDeportes entity.');
            }

            $em->remove($entity);
            $em->flush();
        }

        return $this->redirect($this->generateUrl('ud_deportes_inventario'));
    }

    /**
     * Creates a form to delete a InventarioDeportes entity by id.
     *
     * @param mixed $id The entity id
     *
     * @return \Symfony\Component\Form\Form The form
     */
    private function createDeleteForm($id)
    {
        return $this->createFormBuilder()
            ->setAction($this->generateUrl('ud_deportes_inventario_delete', array('id' => $id)))
            ->setMethod('DELETE')
            ->add('submit', 'submit', array('label' => 'Delete'))
            ->getForm()
        ;
    }
}
