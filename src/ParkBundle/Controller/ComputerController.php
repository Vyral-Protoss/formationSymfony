<?php

namespace ParkBundle\Controller;

use Symfony\Component\HttpFoundation\Request;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Method;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Template;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Security;
use ParkBundle\Entity\Computer;
use ParkBundle\Form\ComputerType;

/**
 * Computer controller.
 *
 * @Route("/computer")
 */
class ComputerController extends Controller
{

    /**
     * Lists all Computer entities.
     *
     * @Route("/", name="computer")
     * @Method("GET")
     * @Template()
     */
    public function indexAction()
    {
        $em = $this->getDoctrine()->getManager();

        $entities = $em->getRepository('ParkBundle:Computer')->findAll();

        return array(
            'entities' => $entities,
        );
    }
    /**
     * Creates a new Computer entity.
     *
     * @Route("/", name="computer_create")
     * @Method("POST")
     * @Template("ParkBundle:Computer:new.html.twig")
     */
    public function createAction(Request $request)
    {
        $entity = new Computer();
        $form = $this->createCreateForm($entity);
        $form->handleRequest($request);

        if ($form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->persist($entity);
            $em->flush();

            return $this->redirect($this->generateUrl('computer_show', array('id' => $entity->getId())));
        }

        return array(
            'entity' => $entity,
            'form'   => $form->createView(),
        );
    }

    /**
     * Creates a form to create a Computer entity.
     *
     * @param Computer $entity The entity
     *
     * @return \Symfony\Component\Form\Form The form
     */
    private function createCreateForm(Computer $entity)
    {
        $form = $this->createForm(new ComputerType(), $entity, array(
            'action' => $this->generateUrl('computer_create'),
            'method' => 'POST',
        ));

        $form->add('submit', 'submit', array('label' => 'Create'));

        return $form;
    }

    /**
     * Displays a form to create a new Computer entity.
     *
     * @Route("/new", name="computer_new")
     * @Security("has_role('ROLE_ADMIN')")
     * @Method("GET")
     * @Template()
     */
    public function newAction()
    {
        $entity = new Computer();
        $form   = $this->createCreateForm($entity);

        return array(
            'entity' => $entity,
            'form'   => $form->createView(),
        );
    }

    /**
     * Finds and displays a Computer entity.
     *
     * @Route("/{id}", name="computer_show")
     * @Method("GET")
     * @Template()
     */
    public function showAction($id)
    {
        $em = $this->getDoctrine()->getManager();

        $entity = $em->getRepository('ParkBundle:Computer')->find($id);

        if (!$entity) {
            throw $this->createNotFoundException('Unable to find Computer entity.');
        }

        $deleteForm = $this->createDeleteForm($id);

        return array(
            'entity'      => $entity,
            'delete_form' => $deleteForm->createView(),
        );
    }

    /**
     * Displays a form to edit an existing Computer entity.
     *
     * @Route("/{id}/edit", name="computer_edit")
     * @Method("GET")
     * @Security("has_role('ROLE_MODERATOR')")
     * @Template()
     */
    public function editAction($id)
    {
        $em = $this->getDoctrine()->getManager();

        $entity = $em->getRepository('ParkBundle:Computer')->find($id);

        if (!$entity) {
            throw $this->createNotFoundException('Unable to find Computer entity.');
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
    * Creates a form to edit a Computer entity.
    *
    * @param Computer $entity The entity
    *
    * @return \Symfony\Component\Form\Form The form
    */
    private function createEditForm(Computer $entity)
    {
        $form = $this->createForm(new ComputerType(), $entity, array(
            'action' => $this->generateUrl('computer_update', array('id' => $entity->getId())),
            'method' => 'PUT',
        ));

        $form->add('submit', 'submit', array('label' => 'Update'));

        return $form;
    }
    /**
     * Edits an existing Computer entity.
     *
     * @Route("/{id}", name="computer_update")
     * @Method("PUT")
     * @Security("has_role('ROLE_MODERATOR')")
     * @Template("ParkBundle:Computer:edit.html.twig")
     */
    public function updateAction(Request $request, $id)
    {
        $em = $this->getDoctrine()->getManager();

        $entity = $em->getRepository('ParkBundle:Computer')->find($id);

        if (!$entity) {
            throw $this->createNotFoundException('Unable to find Computer entity.');
        }

        $deleteForm = $this->createDeleteForm($id);
        $editForm = $this->createEditForm($entity);
        $editForm->handleRequest($request);

        if ($editForm->isValid()) {
            $em->flush();

            return $this->redirect($this->generateUrl('computer_show', array('id' => $id)));
        }

        return array(
            'entity'      => $entity,
            'edit_form'   => $editForm->createView(),
            'delete_form' => $deleteForm->createView(),
        );
    }
    /**
     * Deletes a Computer entity.
     *
     * @Route("/{id}", name="computer_delete")
     * @Security("has_role('ROLE_SUPER_ADMIN')")
     * @Method("DELETE")
     */
    public function deleteAction(Request $request, $id)
    {
        $form = $this->createDeleteForm($id);
        $form->handleRequest($request);

        if ($form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $entity = $em->getRepository('ParkBundle:Computer')->find($id);

            if (!$entity) {
                throw $this->createNotFoundException('Unable to find Computer entity.');
            }

            $em->remove($entity);
            $em->flush();
        }

        return $this->redirect($this->generateUrl('computer'));
    }

    /**
     * Creates a form to delete a Computer entity by id.
     *
     * @param mixed $id The entity id
     *
     * @return \Symfony\Component\Form\Form The form
     */
    private function createDeleteForm($id)
    {
        return $this->createFormBuilder()
            ->setAction($this->generateUrl('computer_delete', array('id' => $id)))
            ->setMethod('DELETE')
            ->add('submit', 'submit', array('label' => 'Delete'))
            ->getForm()
        ;
    }

    /**
     * Sum variables. Nothing to do with computer.
     *
     * @Route("/calculator/{a}/{b}",
     * name="somme",
     * defaults={"a" = 1,"b" = 2},
     *     requirements={
     *         "a": "^[0-9]+",
     *         "b": "^[0-9]+"
     *     }
     * )
     *
     * @Template()
     */
    public function sommeAction($a,$b)
    {
        return array(
            'somme' => $this->get('park.calculator')->somme($a,$b)
        );
    }
}
