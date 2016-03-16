<?php

namespace Proyecto\DeportesBundle\Controller;

use Symfony\Component\HttpFoundation\Request;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Method;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Template;
use Proyecto\DeportesBundle\Entity\ElementosDeportes;
use Proyecto\DeportesBundle\Form\ElementosDeportesType;

/**
 * ElementosDeportes controller.
 *
 * @Route("/ud/deportes/elementos")
 */
class ElementosDeportesController extends Controller
{

    /**
     * Lists all ElementosDeportes entities.
     *
     * @Route("/", name="ud_deportes_elementos")
     * @Method("GET")
     * @Template()
     */
    public function indexAction()
    {
        $em = $this->getDoctrine()->getManager();

        $entities = $em->getRepository('DeportesBundle:ElementosDeportes')->findAll();

        return array(
            'entities' => $entities,
        );
    }
    /**
     * Creates a new ElementosDeportes entity.
     *
     * @Route("/", name="ud_deportes_elementos_create")
     * @Method("POST")
     * @Template("DeportesBundle:ElementosDeportes:new.html.twig")
     */
    public function createAction(Request $request)
    {
        $entity = new ElementosDeportes();
        $form = $this->createCreateForm($entity);
        $form->handleRequest($request);

        if ($form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->persist($entity);
            $em->flush();

            return $this->redirect($this->generateUrl('ud_deportes_elementos_show', array('id' => $entity->getId())));
        }

        return array(
            'entity' => $entity,
            'form'   => $form->createView(),
        );
    }

    /**
     * Creates a form to create a ElementosDeportes entity.
     *
     * @param ElementosDeportes $entity The entity
     *
     * @return \Symfony\Component\Form\Form The form
     */
    private function createCreateForm(ElementosDeportes $entity)
    {
        $form = $this->createForm(new ElementosDeportesType(), $entity, array(
            'action' => $this->generateUrl('ud_deportes_elementos_create'),
            'method' => 'POST',
        ));

        $form->add('submit', 'submit', array('label' => 'Create'));

        return $form;
    }

    /**
     * Displays a form to create a new ElementosDeportes entity.
     *
     * @Route("/new", name="ud_deportes_elementos_new")
     * @Method("GET")
     * @Template()
     */
    public function newAction()
    {
        $entity = new ElementosDeportes();
        $form   = $this->createCreateForm($entity);

        return array(
            'entity' => $entity,
            'form'   => $form->createView(),
        );
    }

    /**
     * Finds and displays a ElementosDeportes entity.
     *
     * @Route("/{id}", name="ud_deportes_elementos_show")
     * @Method("GET")
     * @Template()
     */
    public function showAction($id)
    {
        $em = $this->getDoctrine()->getManager();

        $entity = $em->getRepository('DeportesBundle:ElementosDeportes')->find($id);

        if (!$entity) {
            throw $this->createNotFoundException('Unable to find ElementosDeportes entity.');
        }

        $deleteForm = $this->createDeleteForm($id);

        return array(
            'entity'      => $entity,
            'delete_form' => $deleteForm->createView(),
        );
    }

    /**
     * Displays a form to edit an existing ElementosDeportes entity.
     *
     * @Route("/{id}/edit", name="ud_deportes_elementos_edit")
     * @Method("GET")
     * @Template()
     */
    public function editAction($id)
    {
        $em = $this->getDoctrine()->getManager();

        $entity = $em->getRepository('DeportesBundle:ElementosDeportes')->find($id);

        if (!$entity) {
            throw $this->createNotFoundException('Unable to find ElementosDeportes entity.');
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
    * Creates a form to edit a ElementosDeportes entity.
    *
    * @param ElementosDeportes $entity The entity
    *
    * @return \Symfony\Component\Form\Form The form
    */
    private function createEditForm(ElementosDeportes $entity)
    {
        $form = $this->createForm(new ElementosDeportesType(), $entity, array(
            'action' => $this->generateUrl('ud_deportes_elementos_update', array('id' => $entity->getId())),
            'method' => 'PUT',
        ));

        $form->add('submit', 'submit', array('label' => 'Update'));

        return $form;
    }
    /**
     * Edits an existing ElementosDeportes entity.
     *
     * @Route("/{id}", name="ud_deportes_elementos_update")
     * @Method("PUT")
     * @Template("DeportesBundle:ElementosDeportes:edit.html.twig")
     */
    public function updateAction(Request $request, $id)
    {
        $em = $this->getDoctrine()->getManager();

        $entity = $em->getRepository('DeportesBundle:ElementosDeportes')->find($id);

        if (!$entity) {
            throw $this->createNotFoundException('Unable to find ElementosDeportes entity.');
        }

        $deleteForm = $this->createDeleteForm($id);
        $editForm = $this->createEditForm($entity);
        $editForm->handleRequest($request);

        if ($editForm->isValid()) {
            $em->flush();

            return $this->redirect($this->generateUrl('ud_deportes_elementos_edit', array('id' => $id)));
        }

        return array(
            'entity'      => $entity,
            'edit_form'   => $editForm->createView(),
            'delete_form' => $deleteForm->createView(),
        );
    }
    /**
     * Deletes a ElementosDeportes entity.
     *
     * @Route("/{id}", name="ud_deportes_elementos_delete")
     * @Method("DELETE")
     */
    public function deleteAction(Request $request, $id)
    {
        $form = $this->createDeleteForm($id);
        $form->handleRequest($request);

        if ($form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $entity = $em->getRepository('DeportesBundle:ElementosDeportes')->find($id);

            if (!$entity) {
                throw $this->createNotFoundException('Unable to find ElementosDeportes entity.');
            }

            $em->remove($entity);
            $em->flush();
        }

        return $this->redirect($this->generateUrl('ud_deportes_elementos'));
    }

    /**
     * Creates a form to delete a ElementosDeportes entity by id.
     *
     * @param mixed $id The entity id
     *
     * @return \Symfony\Component\Form\Form The form
     */
    private function createDeleteForm($id)
    {
        return $this->createFormBuilder()
            ->setAction($this->generateUrl('ud_deportes_elementos_delete', array('id' => $id)))
            ->setMethod('DELETE')
            //>add('submit', 'submit', array('label' => 'Delete'))
            ->getForm()
        ;
    }
}
