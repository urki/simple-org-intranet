<?php

namespace Muzej\SurveyBundle\Controller;

use Symfony\Component\HttpFoundation\Request;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;

use Muzej\SurveyBundle\Entity\Survey;
use Muzej\SurveyBundle\Form\SurveyType;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Template;

/**
 * Survey controller.
 *
 */
class SurveyController extends Controller
{
    /**
     * Lists all Survey entities.
     *
     */
    public function indexAction()
    {
        $em = $this->getDoctrine()->getManager();

        $entities = $em->getRepository('SurveyBundle:Survey')->findAll();

        return $this->render('SurveyBundle:Survey:index.html.twig', array(
            'entities' => $entities,
        ));
    }

     /**
     * List of places and data per day survey.
     *
     */
    public function listAction()
    {
        $em = $this->getDoctrine()->getManager();

        $entities = $em->getRepository('SurveyBundle:Survey')->findAll();

        return $this->render('SurveyBundle:Survey:index.html.twig', array(
            'entities' => $entities,
        ));
    }
        
    /**
     * Finds and displays a Survey entity.
     *
     */
    public function showAction($id)
    {
        $em = $this->getDoctrine()->getManager();

        $entity = $em->getRepository('SurveyBundle:Survey')->find($id);

        if (!$entity) {
            throw $this->createNotFoundException('Unable to find Survey entity.');
        }

        $deleteForm = $this->createDeleteForm($id);

        return $this->render('SurveyBundle:Survey:show.html.twig', array(
            'entity'      => $entity,
            'delete_form' => $deleteForm->createView(),        ));
    }
    /**
     * Displays a form to create a new Survey entity.
     *
     */
    public function newAction()
    {
        $entity = new Survey();
        $form   = $this->createForm(new SurveyType(), $entity);

        return $this->render('SurveyBundle:Survey:new.html.twig', array(
            'entity' => $entity,
            'form'   => $form->createView(),
        ));
    }

    /**
     * Creates a new Survey entity.
     *
     */
    public function createAction(Request $request)
    {
        $entity  = new Survey();
        $form = $this->createForm(new SurveyType(), $entity);
        $form->bind($request);
 
   
        if ($form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->persist($entity);
            $em->flush();

            return $this->redirect($this->generateUrl('survey_show', array('id' => $entity->getId())));
        }

        return $this->render('SurveyBundle:Survey:new.html.twig', array(
            'entity' => $entity,
            'form'   => $form->createView(),
        ));
    }

    /**
     * Displays a form to edit an existing Survey entity.
     *
     */
    public function editAction($id)
    {
        $em = $this->getDoctrine()->getManager();

        $entity = $em->getRepository('SurveyBundle:Survey')->find($id);

        if (!$entity) {
            throw $this->createNotFoundException('Unable to find Survey entity.');
        }

        $editForm = $this->createForm(new SurveyType(), $entity);
        $deleteForm = $this->createDeleteForm($id);

        return $this->render('SurveyBundle:Survey:edit.html.twig', array(
            'entity'      => $entity,
            'edit_form'   => $editForm->createView(),
            'delete_form' => $deleteForm->createView(),
        ));
    }

    /**
     * Edits an existing Survey entity.
     *
     */
    public function updateAction(Request $request, $id)
    {
        $em = $this->getDoctrine()->getManager();

        $entity = $em->getRepository('SurveyBundle:Survey')->find($id);

        if (!$entity) {
            throw $this->createNotFoundException('Unable to find Survey entity.');
        }

        $deleteForm = $this->createDeleteForm($id);
        $editForm = $this->createForm(new SurveyType(), $entity);
        $editForm->bind($request);

        if ($editForm->isValid()) {
            $em->persist($entity);
            $em->flush();

            return $this->redirect($this->generateUrl('survey_edit', array('id' => $id)));
        }

        return $this->render('SurveyBundle:Survey:edit.html.twig', array(
            'entity'      => $entity,
            'edit_form'   => $editForm->createView(),
            'delete_form' => $deleteForm->createView(),
        ));
    }

    /**
     * Deletes a Survey entity.
     *
     */
    public function deleteAction(Request $request, $id)
    {
        $form = $this->createDeleteForm($id);
        $form->bind($request);

        if ($form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $entity = $em->getRepository('SurveyBundle:Survey')->find($id);

            if (!$entity) {
                throw $this->createNotFoundException('Unable to find Survey entity.');
            }
         
            $em->remove($entity);
            $em->flush();
        }

        return $this->redirect($this->generateUrl('survey'));
    }

    private function createDeleteForm($id)
    {
        return $this->createFormBuilder(array('id' => $id))
            ->add('id', 'hidden')
            ->getForm()
        ;
    }
}
