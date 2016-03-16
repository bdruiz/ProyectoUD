<?php

namespace Proyecto\EnfermeriaBundle\Controller;

use Symfony\Component\HttpFoundation\Request;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Method;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Template;
use Proyecto\EnfermeriaBundle\Entity\SeguridadSocial;
use Proyecto\EnfermeriaBundle\Form\SeguridadSocialType;

/**
 * SeguridadSocial controller.
 *
 * @Route("/ud/enfermeria/ssocial")
 */
class SeguridadSocialController extends Controller
{

    /**
     * Lists all SeguridadSocial entities.
     *
     * @Route("/", name="ud_enfermeria_ssocial")
     * @Method("GET")
     * @Template()
     */
    public function indexAction()
    {
        $em = $this->getDoctrine()->getManager();

        $entities = $em->getRepository('EnfermeriaBundle:SeguridadSocial')->findAll();

        return array(
            'entities' => $entities,
        );
    }
    /**
     * Creates a new SeguridadSocial entity.
     *
     * @Route("/", name="ud_enfermeria_ssocial_create")
     * @Method("POST")
     * @Template("EnfermeriaBundle:SeguridadSocial:new.html.twig")
     */
    public function createAction(Request $request)
    {
        $entity = new SeguridadSocial();
        $form = $this->createCreateForm($entity);
        $form->handleRequest($request);

        if ($form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->persist($entity);
            $em->flush();

            return $this->redirect($this->generateUrl('ud_enfermeria_ssocial_show', array('id' => $entity->getId())));
        }

        return array(
            'entity' => $entity,
            'form'   => $form->createView(),
        );
    }

    /**
     * Creates a form to create a SeguridadSocial entity.
     *
     * @param SeguridadSocial $entity The entity
     *
     * @return \Symfony\Component\Form\Form The form
     */
    private function createCreateForm(SeguridadSocial $entity)
    {
        $form = $this->createForm(new SeguridadSocialType(), $entity, array(
            'action' => $this->generateUrl('ud_enfermeria_ssocial_create'),
            'method' => 'POST',
        ));

        $form->add('submit', 'submit', array('label' => 'Create'));

        return $form;
    }

    /**
     * Displays a form to create a new SeguridadSocial entity.
     *
     * @Route("/new", name="ud_enfermeria_ssocial_new")
     * @Method("GET")
     * @Template()
     */
    public function newAction()
    {
        $entity = new SeguridadSocial();
        $form   = $this->createCreateForm($entity);

        return array(
            'entity' => $entity,
            'form'   => $form->createView(),
        );
    }

    /**
     * Finds and displays a SeguridadSocial entity.
     *
     * @Route("/{id}", name="ud_enfermeria_ssocial_show")
     * @Method("GET")
     * @Template()
     */
    public function showAction($id)
    {
        $em = $this->getDoctrine()->getManager();

        $entity = $em->getRepository('EnfermeriaBundle:SeguridadSocial')->find($id);

        if (!$entity) {
            throw $this->createNotFoundException('Unable to find SeguridadSocial entity.');
        }

        $deleteForm = $this->createDeleteForm($id);

        return array(
            'entity'      => $entity,
            'delete_form' => $deleteForm->createView(),
        );
    }

    /**
     * Displays a form to edit an existing SeguridadSocial entity.
     *
     * @Route("/{id}/edit", name="ud_enfermeria_ssocial_edit")
     * @Method("GET")
     * @Template()
     */
    public function editAction($id)
    {
        $em = $this->getDoctrine()->getManager();

        $entity = $em->getRepository('EnfermeriaBundle:SeguridadSocial')->find($id);

        if (!$entity) {
            throw $this->createNotFoundException('Unable to find SeguridadSocial entity.');
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
    * Creates a form to edit a SeguridadSocial entity.
    *
    * @param SeguridadSocial $entity The entity
    *
    * @return \Symfony\Component\Form\Form The form
    */
    private function createEditForm(SeguridadSocial $entity)
    {
        $form = $this->createForm(new SeguridadSocialType(), $entity, array(
            'action' => $this->generateUrl('ud_enfermeria_ssocial_update', array('id' => $entity->getId())),
            'method' => 'PUT',
        ));

        $form->add('submit', 'submit', array('label' => 'Update'));

        return $form;
    }
    /**
     * Edits an existing SeguridadSocial entity.
     *
     * @Route("/{id}", name="ud_enfermeria_ssocial_update")
     * @Method("PUT")
     * @Template("EnfermeriaBundle:SeguridadSocial:edit.html.twig")
     */
    public function updateAction(Request $request, $id)
    {
        $em = $this->getDoctrine()->getManager();

        $entity = $em->getRepository('EnfermeriaBundle:SeguridadSocial')->find($id);

        if (!$entity) {
            throw $this->createNotFoundException('Unable to find SeguridadSocial entity.');
        }

        $deleteForm = $this->createDeleteForm($id);
        $editForm = $this->createEditForm($entity);
        $editForm->handleRequest($request);

        if ($editForm->isValid()) {
            $em->flush();

            return $this->redirect($this->generateUrl('ud_enfermeria_ssocial_edit', array('id' => $id)));
        }

        return array(
            'entity'      => $entity,
            'edit_form'   => $editForm->createView(),
            'delete_form' => $deleteForm->createView(),
        );
    }
    /**
     * Deletes a SeguridadSocial entity.
     *
     * @Route("/{id}", name="ud_enfermeria_ssocial_delete")
     * @Method("DELETE")
     */
    public function deleteAction(Request $request, $id)
    {
        $form = $this->createDeleteForm($id);
        $form->handleRequest($request);

        if ($form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $entity = $em->getRepository('EnfermeriaBundle:SeguridadSocial')->find($id);

            if (!$entity) {
                throw $this->createNotFoundException('Unable to find SeguridadSocial entity.');
            }

            $em->remove($entity);
            $em->flush();
        }

        return $this->redirect($this->generateUrl('ud_enfermeria_ssocial'));
    }

    /**
     * Creates a form to delete a SeguridadSocial entity by id.
     *
     * @param mixed $id The entity id
     *
     * @return \Symfony\Component\Form\Form The form
     */
    private function createDeleteForm($id)
    {
        return $this->createFormBuilder()
            ->setAction($this->generateUrl('ud_enfermeria_ssocial_delete', array('id' => $id)))
            ->setMethod('DELETE')
            ->add('submit', 'submit', array('label' => 'Delete'))
            ->getForm()
        ;
    }
}
