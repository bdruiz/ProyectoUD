<?php

namespace Proyecto\AdminBundle\Controller;

use Symfony\Component\HttpFoundation\Request;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Method;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Template;
use Proyecto\AdminBundle\Entity\Roles;
use Proyecto\AdminBundle\Form\RolesType;

/**
 * Roles controller.
 *
 * @Route("/ud/admin/roles")
 */
class RolesController extends Controller
{

    /**
     * Lists all Roles entities.
     *
     * @Route("/", name="ud_admin_roles")
     * @Method("GET")
     * @Template()
     */
    public function indexAction()
    {
        $em = $this->getDoctrine()->getManager();

        $entities = $em->getRepository('AdminBundle:Roles')->findAll();

        return array(
            'entities' => $entities,
        );
    }
    /**
     * Creates a new Roles entity.
     *
     * @Route("/", name="ud_admin_roles_create")
     * @Method("POST")
     * @Template("AdminBundle:Roles:new.html.twig")
     */
    public function createAction(Request $request)
    {
        $entity = new Roles();
        $form = $this->createCreateForm($entity);
        $form->handleRequest($request);

        if ($form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->persist($entity);
            $em->flush();

            return $this->redirect($this->generateUrl('ud_admin_roles_show', array('id' => $entity->getId())));
        }

        return array(
            'entity' => $entity,
            'form'   => $form->createView(),
        );
    }

    /**
     * Creates a form to create a Roles entity.
     *
     * @param Roles $entity The entity
     *
     * @return \Symfony\Component\Form\Form The form
     */
    private function createCreateForm(Roles $entity)
    {
        $form = $this->createForm(new RolesType(), $entity, array(
            'action' => $this->generateUrl('ud_admin_roles_create'),
            'method' => 'POST',
        ));

        $form->add('submit', 'submit', array('label' => 'Create'));

        return $form;
    }

    /**
     * Displays a form to create a new Roles entity.
     *
     * @Route("/new", name="ud_admin_roles_new")
     * @Method("GET")
     * @Template()
     */
    public function newAction()
    {
        $entity = new Roles();
        $form   = $this->createCreateForm($entity);

        return array(
            'entity' => $entity,
            'form'   => $form->createView(),
        );
    }

    /**
     * Finds and displays a Roles entity.
     *
     * @Route("/{id}", name="ud_admin_roles_show")
     * @Method("GET")
     * @Template()
     */
    public function showAction($id)
    {
        $em = $this->getDoctrine()->getManager();

        $entity = $em->getRepository('AdminBundle:Roles')->find($id);

        if (!$entity) {
            throw $this->createNotFoundException('Unable to find Roles entity.');
        }

        $deleteForm = $this->createDeleteForm($id);

        return array(
            'entity'      => $entity,
            'delete_form' => $deleteForm->createView(),
        );
    }

    /**
     * Displays a form to edit an existing Roles entity.
     *
     * @Route("/{id}/edit", name="ud_admin_roles_edit")
     * @Method("GET")
     * @Template()
     */
    public function editAction($id)
    {
        $em = $this->getDoctrine()->getManager();

        $entity = $em->getRepository('AdminBundle:Roles')->find($id);

        if (!$entity) {
            throw $this->createNotFoundException('Unable to find Roles entity.');
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
    * Creates a form to edit a Roles entity.
    *
    * @param Roles $entity The entity
    *
    * @return \Symfony\Component\Form\Form The form
    */
    private function createEditForm(Roles $entity)
    {
        $form = $this->createForm(new RolesType(), $entity, array(
            'action' => $this->generateUrl('ud_admin_roles_update', array('id' => $entity->getId())),
            'method' => 'PUT',
        ));

        $form->add('submit', 'submit', array('label' => 'Update'));

        return $form;
    }
    /**
     * Edits an existing Roles entity.
     *
     * @Route("/{id}", name="ud_admin_roles_update")
     * @Method("PUT")
     * @Template("AdminBundle:Roles:edit.html.twig")
     */
    public function updateAction(Request $request, $id)
    {
        $em = $this->getDoctrine()->getManager();

        $entity = $em->getRepository('AdminBundle:Roles')->find($id);

        if (!$entity) {
            throw $this->createNotFoundException('Unable to find Roles entity.');
        }

        $deleteForm = $this->createDeleteForm($id);
        $editForm = $this->createEditForm($entity);
        $editForm->handleRequest($request);

        if ($editForm->isValid()) {
            $em->flush();

            return $this->redirect($this->generateUrl('ud_admin_roles_edit', array('id' => $id)));
        }

        return array(
            'entity'      => $entity,
            'edit_form'   => $editForm->createView(),
            'delete_form' => $deleteForm->createView(),
        );
    }
    /**
     * Deletes a Roles entity.
     *
     * @Route("/{id}", name="ud_admin_roles_delete")
     * @Method("DELETE")
     */
    public function deleteAction(Request $request, $id)
    {
        $form = $this->createDeleteForm($id);
        $form->handleRequest($request);

        if ($form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $entity = $em->getRepository('AdminBundle:Roles')->find($id);

            if (!$entity) {
                throw $this->createNotFoundException('Unable to find Roles entity.');
            }

            $em->remove($entity);
            $em->flush();
        }

        return $this->redirect($this->generateUrl('ud_admin_roles'));
    }

    /**
     * Creates a form to delete a Roles entity by id.
     *
     * @param mixed $id The entity id
     *
     * @return \Symfony\Component\Form\Form The form
     */
    private function createDeleteForm($id)
    {
        return $this->createFormBuilder()
            ->setAction($this->generateUrl('ud_admin_roles_delete', array('id' => $id)))
            ->setMethod('DELETE')
            ->add('submit', 'submit', array('label' => 'Delete'))
            ->getForm()
        ;
    }
}
