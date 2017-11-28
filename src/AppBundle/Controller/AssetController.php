<?php

namespace AppBundle\Controller;

use AppBundle\Entity\Asset;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Method;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;use Symfony\Component\HttpFoundation\Request;

/**
 * Asset controller.
 *
 * @Route("asset")
 */
class AssetController extends Controller
{
    /**
     * Lists all asset entities.
     *
     * @Route("/", name="asset_index")
     * @Method("GET")
     */
    public function indexAction()
    {
        $em = $this->getDoctrine()->getManager();

        $assets = $em->getRepository('AppBundle:Asset')->findAll();

        return $this->render('asset/index.html.twig', array(
            'assets' => $assets,
        ));
    }

    /**
     * Creates a new asset entity.
     *
     * @Route("/new", name="asset_new")
     * @Method({"GET", "POST"})
     */
    public function newAction(Request $request)
    {
        $asset = new Asset();
        $form = $this->createForm('AppBundle\Form\AssetType', $asset);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->persist($asset);
            $em->flush();

            return $this->redirectToRoute('asset_show', array('id' => $asset->getId()));
        }

        return $this->render('asset/new.html.twig', array(
            'asset' => $asset,
            'form' => $form->createView(),
        ));
    }

    /**
     * Finds and displays a asset entity.
     *
     * @Route("/{id}", name="asset_show")
     * @Method("GET")
     */
    public function showAction(Asset $asset)
    {
        return $this->render('asset/show.html.twig', array(
            'asset' => $asset,
        ));
    }

    /**
     * Displays a form to edit an existing asset entity.
     *
     * @Route("/{id}/edit", name="asset_edit")
     * @Method({"GET", "POST"})
     */
    public function editAction(Request $request, Asset $asset)
    {
        $editForm = $this->createForm('AppBundle\Form\AssetType', $asset);
        $editForm->handleRequest($request);

        if ($editForm->isSubmitted() && $editForm->isValid()) {
            $this->getDoctrine()->getManager()->flush();
            $this->addFlash('success', 'Your changes were saved successfully!');
            return $this->redirectToRoute('asset_edit', array('id' => $asset->getId()));
        }

        return $this->render('asset/edit.html.twig', array(
            'asset' => $asset,
            'edit_form' => $editForm->createView()
        ));
    }

    /**
     * Deletes a asset entity.
     *
     * @Route("/{id}/delete", name="asset_delete")
     */
    public function deleteAction(Asset $asset) {
        $em = $this->getDoctrine()->getManager();
        $em->remove($asset);
        $em->flush();
        return $this->redirectToRoute('asset_index');
    }
}
