<?php

namespace AppBundle\Controller;

use AppBundle\Entity\Asset;
use AppBundle\Entity\Threat;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Security;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Method;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
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
     * @Security("has_role('ROLE_USER')")
     * @Method("GET")
     */
    public function indexAction()
    {
        $em = $this->getDoctrine()->getManager();

        $threats = $em->getRepository('AppBundle:Threat')->findBy([], ['risk' => 'DESC']);

        return $this->render('threat/index.html.twig', array(
            'threats' => $threats,
        ));
    }

    /**
     * Creates a new threat entity.
     *
     * @Route("/new/{id}", name="threat_new")
     * @Method({"GET", "POST"})
     * @Security("has_role('ROLE_ADMIN')")
     */
    public function newAction(Request $request, Asset $asset)
    {
        $threat = new Threat();
        $form = $this->createForm('AppBundle\Form\ThreatType', $threat);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            /** @var float $likelihoodValue */
            $likelihoodValue = ($threat->getLikelihood() * $threat->getValue());
            /** @var float $knownMitigation */
            $knownMitigation = $threat->getMitigation() * $likelihoodValue;
            /** @var float $uncertainty */
            $uncertainty = $threat->getUncertainty() * $likelihoodValue;
            $threat->setRisk($likelihoodValue - $knownMitigation + $uncertainty);
            $threat->setAsset($asset);

            $em = $this->getDoctrine()->getManager();
            $em->persist($threat);
            $em->persist($asset);
            $em->flush();

            return $this->redirectToRoute('asset_edit', array('id' => $asset->getId()));
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
     * @Security("has_role('ROLE_USER')")
     */
    public function showAction(Threat $threat)
    {
        return $this->render('threat/show.html.twig', array(
            'threat' => $threat,
        ));
    }

    /**
     * Displays a form to edit an existing threat entity.
     *
     * @Route("/{id}/edit", name="threat_edit")
     * @Method({"GET", "POST"})
     * @Security("has_role('ROLE_ADMIN')")

     */
    public function editAction(Request $request, Threat $threat)
    {
        $editForm = $this->createForm('AppBundle\Form\ThreatType', $threat);
        $editForm->handleRequest($request);

        if ($editForm->isSubmitted() && $editForm->isValid()) {
            $this->getDoctrine()->getManager()->flush();

            return $this->redirectToRoute('threat_edit', array('id' => $threat->getId()));
        }

        return $this->render('threat/edit.html.twig', array(
            'threat' => $threat,
            'edit_form' => $editForm->createView(),
        ));
    }

    /**
     * Deletes a threat entity.
     * @Security("has_role('ROLE_ADMIN')")
     * @Route("/delete/{id}", name="threat_delete")
     */
    public function deleteAction(Request $request, Threat $threat)
    {
        {
            $em = $this->getDoctrine()->getManager();
            $em->remove($threat);
            $em->flush();
        }

        return $this->redirectToRoute('threat_index');
    }
}
