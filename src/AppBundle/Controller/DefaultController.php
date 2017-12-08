<?php

namespace AppBundle\Controller;

use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;

class DefaultController extends Controller
{
    /**
     * @Route("/", name="index")
     */
    public function indexAction(Request $request)
    {
        $em = $this->getDoctrine()->getManager();

        $assets = $em->getRepository('AppBundle:Asset')->findAll();
        $threats = $em->getRepository('AppBundle:Threat')->findAll();

        return $this->render('default/index.html.twig', [
            'assets' => $assets,
            'threats' => $threats,
            'totalAssets' => count($assets),
            'totalThreats' => count($threats)
        ]);
    }
}
