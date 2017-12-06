<?php

namespace AppBundle\Controller;

use AppBundle\Entity\Threat;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Method;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Symfony\Component\HttpFoundation\RedirectResponse;
use Symfony\Component\HttpFoundation\Request;

/**
 * Threat controller.
 *
 * @Route("threat")
 */
class ThreatController extends Controller
{
    /**
     * Lists all threat entities.
     *
     * @Route("/", name="threat_index")
     * @Method("GET")
     */
    public function indexAction()
    {
        $em = $this->getDoctrine()->getManager();

        $threats = $em->getRepository('AppBundle:Threat')->findAll();

        return $this->render('threat/index.html.twig', array(
            'threats' => $threats,
        ));
    }

    /**
     * Creates a new threat entity.
     *
     * @Route("/new", name="threat_new")
     * @Method({"GET", "POST"})
     */
    public function newAction(Request $request)
    {
        $threat = new Threat();
        $form = $this->createForm('AppBundle\Form\ThreatType', $threat);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->persist($threat);
            $em->flush();

            return $this->redirectToRoute('threat_show', array('id' => $threat->getId()));
        }

        return $this->render('threat/new.html.twig', array(
            'threat' => $threat,
            'form' => $form->createView(),
        ));
    }

    /**
     * Finds and displays a threat entity.
     *
     * @Route("/{id}", name="threat_show")
     * @Method("GET")
     */
    public function showAction(Threat $threat)
    {
        $deleteForm = $this->createDeleteForm($threat);

        return $this->render('threat/show.html.twig', array(
            'threat' => $threat,
            'delete_form' => $deleteForm->createView(),
        ));
    }

    /**
     * Displays a form to edit an existing threat entity.
     *
     * @Route("/{id}/edit", name="threat_edit")
     * @Method({"GET", "POST"})
     */
    public function editAction(Request $request, Threat $threat)
    {
        $deleteForm = $this->createDeleteForm($threat);
        $editForm = $this->createForm('AppBundle\Form\ThreatType', $threat);
        $editForm->handleRequest($request);

        if ($editForm->isSubmitted() && $editForm->isValid()) {
            $this->getDoctrine()->getManager()->flush();

            return $this->redirectToRoute('threat_edit', array('id' => $threat->getId()));
        }

        return $this->render('threat/edit.html.twig', array(
            'threat' => $threat,
            'edit_form' => $editForm->createView(),
            'delete_form' => $deleteForm->createView(),
        ));
    }

    /**
     * Deletes a threat entity.
     *
     * @Route("/{id}", name="threat_delete")
     * @Method("DELETE")
     */
    public function deleteAction(Request $request, Threat $threat)
    {
        $form = $this->createDeleteForm($threat);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->remove($threat);
            $em->flush();
        }

        return $this->redirectToRoute('threat_index');
    }

    /**
     * @param Threat $threat The threat entity
     * @return RedirectResponse
     */
    private function createDeleteForm(Threat $threat)
    {
        $em = $this->getDoctrine()->getManager();
        $em->remove($threat);
        $em->flush();
        return $this->redirectToRoute('threat_index');
    }
}
