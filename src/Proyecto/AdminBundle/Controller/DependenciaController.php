<?php

namespace Proyecto\AdminBundle\Controller;

use Symfony\Component\HttpFoundation\Request;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Method;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Template;
use Proyecto\AdminBundle\Entity\Dependencia;
use Proyecto\AdminBundle\Form\DependenciaType;

/**
 * Dependencia controller.
 *
 * @Route("/ud/admin/dependencia")
 */
class DependenciaController extends Controller
{

    /**
     * Lists all Dependencia entities.
     *
     * @Route("/", name="ud_admin_dependencia")
     * @Method("GET")
     * @Template()
     */
    public function indexAction()
    {
        $em = $this->getDoctrine()->getManager();

        $entities = $em->getRepository('AdminBundle:Dependencia')->findAll();

        return array(
            'entities' => $entities,
        );
    }
    /**
     * Creates a new Dependencia entity.
     *
     * @Route("/", name="ud_admin_dependencia_create")
     * @Method("POST")
     * @Template("AdminBundle:Dependencia:new.html.twig")
     */
    public function createAction(Request $request)
    {
        $entity = new Dependencia();
        $form = $this->createCreateForm($entity);
        $form->handleRequest($request);

        if ($form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->persist($entity);
            $em->flush();

            return $this->redirect($this->generateUrl('ud_admin_dependencia_show', array('id' => $entity->getId())));
        }

        return array(
            'entity' => $entity,
            'form'   => $form->createView(),
        );
    }

    /**
     * Creates a form to create a Dependencia entity.
     *
     * @param Dependencia $entity The entity
     *
     * @return \Symfony\Component\Form\Form The form
     */
    private function createCreateForm(Dependencia $entity)
    {
        $form = $this->createForm(new DependenciaType(), $entity, array(
            'action' => $this->generateUrl('ud_admin_dependencia_create'),
            'method' => 'POST',
        ));

        $form->add('submit', 'submit', array('label' => 'Create'));

        return $form;
    }

    /**
     * Displays a form to create a new Dependencia entity.
     *
     * @Route("/new", name="ud_admin_dependencia_new")
     * @Method("GET")
     * @Template()
     */
    public function newAction()
    {
        $entity = new Dependencia();
        $form   = $this->createCreateForm($entity);

        return array(
            'entity' => $entity,
            'form'   => $form->createView(),
        );
    }

    /**
     * Finds and displays a Dependencia entity.
     *
     * @Route("/{id}", name="ud_admin_dependencia_show")
     * @Method("GET")
     * @Template()
     */
    public function showAction($id)
    {
        $em = $this->getDoctrine()->getManager();

        $entity = $em->getRepository('AdminBundle:Dependencia')->find($id);

        if (!$entity) {
            throw $this->createNotFoundException('Unable to find Dependencia entity.');
        }

        $deleteForm = $this->createDeleteForm($id);

        return array(
            'entity'      => $entity,
            'delete_form' => $deleteForm->createView(),
        );
    }

    /**
     * Displays a form to edit an existing Dependencia entity.
     *
     * @Route("/{id}/edit", name="ud_admin_dependencia_edit")
     * @Method("GET")
     * @Template()
     */
    public function editAction($id)
    {
        $em = $this->getDoctrine()->getManager();

        $entity = $em->getRepository('AdminBundle:Dependencia')->find($id);

        if (!$entity) {
            throw $this->createNotFoundException('Unable to find Dependencia entity.');
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
    * Creates a form to edit a Dependencia entity.
    *
    * @param Dependencia $entity The entity
    *
    * @return \Symfony\Component\Form\Form The form
    */
    private function createEditForm(Dependencia $entity)
    {
        $form = $this->createForm(new DependenciaType(), $entity, array(
            'action' => $this->generateUrl('ud_admin_dependencia_update', array('id' => $entity->getId())),
            'method' => 'PUT',
        ));

        $form->add('submit', 'submit', array('label' => 'Update'));

        return $form;
    }
    /**
     * Edits an existing Dependencia entity.
     *
     * @Route("/{id}", name="ud_admin_dependencia_update")
     * @Method("PUT")
     * @Template("AdminBundle:Dependencia:edit.html.twig")
     */
    public function updateAction(Request $request, $id)
    {
        $em = $this->getDoctrine()->getManager();

        $entity = $em->getRepository('AdminBundle:Dependencia')->find($id);

        if (!$entity) {
            throw $this->createNotFoundException('Unable to find Dependencia entity.');
        }

        $deleteForm = $this->createDeleteForm($id);
        $editForm = $this->createEditForm($entity);
        $editForm->handleRequest($request);

        if ($editForm->isValid()) {
            $em->flush();

            return $this->redirect($this->generateUrl('ud_admin_dependencia_edit', array('id' => $id)));
        }

        return array(
            'entity'      => $entity,
            'edit_form'   => $editForm->createView(),
            'delete_form' => $deleteForm->createView(),
        );
    }
    /**
     * Deletes a Dependencia entity.
     *
     * @Route("/{id}", name="ud_admin_dependencia_delete")
     * @Method("DELETE")
     */
    public function deleteAction(Request $request, $id)
    {
        $form = $this->createDeleteForm($id);
        $form->handleRequest($request);

        if ($form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $entity = $em->getRepository('AdminBundle:Dependencia')->find($id);

            if (!$entity) {
                throw $this->createNotFoundException('Unable to find Dependencia entity.');
            }

            $em->remove($entity);
            $em->flush();
        }

        return $this->redirect($this->generateUrl('ud_admin_dependencia'));
    }

    /**
     * Creates a form to delete a Dependencia entity by id.
     *
     * @param mixed $id The entity id
     *
     * @return \Symfony\Component\Form\Form The form
     */
    private function createDeleteForm($id)
    {
        return $this->createFormBuilder()
            ->setAction($this->generateUrl('ud_admin_dependencia_delete', array('id' => $id)))
            ->setMethod('DELETE')
            ->add('submit', 'submit', array('label' => 'Delete'))
            ->getForm()
        ;
    }
}
