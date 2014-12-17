<?php

namespace Uek\DemoBundle\Controller;

use Symfony\Component\HttpFoundation\Request;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;

use Uek\DemoBundle\Entity\Questionnaire;
use Uek\DemoBundle\Form\QuestionnaireType;

/**
 * Questionnaire controller.
 *
 */
class QuestionnaireController extends Controller
{

    /**
     * Lists all Questionnaire entities.
     *
     */
    public function indexAction()
    {
        $em = $this->getDoctrine()->getManager();

        $entities = $em->getRepository('UekDemoBundle:Questionnaire')->findAll();

        return $this->render('UekDemoBundle:Questionnaire:index.html.twig', array(
            'entities' => $entities,
        ));
    }
    /**
     * Creates a new Questionnaire entity.
     *
     */
    public function createAction(Request $request)
    {
        $entity = new Questionnaire();
        $form = $this->createCreateForm($entity);
        $form->handleRequest($request);

        if ($form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->persist($entity);
            $em->flush();

            return $this->redirect($this->generateUrl('questionnaire_show', array('id' => $entity->getId())));
        }

        return $this->render('UekDemoBundle:Questionnaire:new.html.twig', array(
            'entity' => $entity,
            'form'   => $form->createView(),
        ));
    }

    /**
     * Creates a form to create a Questionnaire entity.
     *
     * @param Questionnaire $entity The entity
     *
     * @return \Symfony\Component\Form\Form The form
     */
    private function createCreateForm(Questionnaire $entity)
    {
        $form = $this->createForm(new QuestionnaireType(), $entity, array(
            'action' => $this->generateUrl('questionnaire_create'),
            'method' => 'POST',
        ));

        $form->add('submit', 'submit', array('label' => 'Create'));

        return $form;
    }

    /**
     * Displays a form to create a new Questionnaire entity.
     *
     */
    public function newAction()
    {
        $entity = new Questionnaire();
        $form   = $this->createCreateForm($entity);

        return $this->render('UekDemoBundle:Questionnaire:new.html.twig', array(
            'entity' => $entity,
            'form'   => $form->createView(),
        ));
    }

    /**
     * Finds and displays a Questionnaire entity.
     *
     */
    public function showAction($id)
    {
        $em = $this->getDoctrine()->getManager();

        $entity = $em->getRepository('UekDemoBundle:Questionnaire')->find($id);

        if (!$entity) {
            throw $this->createNotFoundException('Unable to find Questionnaire entity.');
        }

        $deleteForm = $this->createDeleteForm($id);

        return $this->render('UekDemoBundle:Questionnaire:show.html.twig', array(
            'entity'      => $entity,
            'delete_form' => $deleteForm->createView(),
        ));
    }
	
	public function showByLastnameAction($lastname)
    {
        $em = $this->getDoctrine()->getManager();

        $entity = $em->getRepository('UekDemoBundle:Questionnaire')->findOneBy(array(
			'lastname' => $lastname
		));

        if (!$entity) {
            throw $this->createNotFoundException('Unable to find Questionnaire entity.');
        }

        $deleteForm = $this->createDeleteForm($entity->getId());

        return $this->render('UekDemoBundle:Questionnaire:show.html.twig', array(
            'entity'      => $entity,
            'delete_form' => $deleteForm->createView(),
        ));
    }

    /**
     * Displays a form to edit an existing Questionnaire entity.
     *
     */
    public function editAction($id)
    {
        $em = $this->getDoctrine()->getManager();

        $entity = $em->getRepository('UekDemoBundle:Questionnaire')->find($id);

        if (!$entity) {
            throw $this->createNotFoundException('Unable to find Questionnaire entity.');
        }

        $editForm = $this->createEditForm($entity);
        $deleteForm = $this->createDeleteForm($id);

        return $this->render('UekDemoBundle:Questionnaire:edit.html.twig', array(
            'entity'      => $entity,
            'edit_form'   => $editForm->createView(),
            'delete_form' => $deleteForm->createView(),
        ));
    }

    /**
    * Creates a form to edit a Questionnaire entity.
    *
    * @param Questionnaire $entity The entity
    *
    * @return \Symfony\Component\Form\Form The form
    */
    private function createEditForm(Questionnaire $entity)
    {
        $form = $this->createForm(new QuestionnaireType(), $entity, array(
            'action' => $this->generateUrl('questionnaire_update', array('id' => $entity->getId())),
            'method' => 'PUT',
        ));

        $form->add('submit', 'submit', array('label' => 'Update'));

        return $form;
    }
    /**
     * Edits an existing Questionnaire entity.
     *
     */
    public function updateAction(Request $request, $id)
    {
        $em = $this->getDoctrine()->getManager();

        $entity = $em->getRepository('UekDemoBundle:Questionnaire')->find($id);

        if (!$entity) {
            throw $this->createNotFoundException('Unable to find Questionnaire entity.');
        }

        $deleteForm = $this->createDeleteForm($id);
        $editForm = $this->createEditForm($entity);
        $editForm->handleRequest($request);

        if ($editForm->isValid()) {
            $em->flush();

            return $this->redirect($this->generateUrl('questionnaire_edit', array('id' => $id)));
        }

        return $this->render('UekDemoBundle:Questionnaire:edit.html.twig', array(
            'entity'      => $entity,
            'edit_form'   => $editForm->createView(),
            'delete_form' => $deleteForm->createView(),
        ));
    }
    /**
     * Deletes a Questionnaire entity.
     *
     */
    public function deleteAction(Request $request, $id)
    {
        $form = $this->createDeleteForm($id);
        $form->handleRequest($request);

        if ($form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $entity = $em->getRepository('UekDemoBundle:Questionnaire')->find($id);

            if (!$entity) {
                throw $this->createNotFoundException('Unable to find Questionnaire entity.');
            }

            $em->remove($entity);
            $em->flush();
        }

        return $this->redirect($this->generateUrl('questionnaire'));
    }

    /**
     * Creates a form to delete a Questionnaire entity by id.
     *
     * @param mixed $id The entity id
     *
     * @return \Symfony\Component\Form\Form The form
     */
    private function createDeleteForm($id)
    {
        return $this->createFormBuilder()
            ->setAction($this->generateUrl('questionnaire_delete', array('id' => $id)))
            ->setMethod('DELETE')
            ->add('submit', 'submit', array('label' => 'Delete'))
            ->getForm()
        ;
    }
}
