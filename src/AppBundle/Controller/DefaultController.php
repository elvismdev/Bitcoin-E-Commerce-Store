<?php

namespace AppBundle\Controller;

use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;

class DefaultController extends Controller
{
    /**
     * @Route("/", name="homepage")
     */
    public function indexAction(Request $request)
    {
        $em = $this->getDoctrine()->getManager();

        $products = $em->getRepository('AppBundle:Product')->findAll();

        return $this->render('default/index.html.twig', array(
            'products' => $products,
        ));
    }


    /**
     * Finds and displays a product entity.
     *
     * @Route("/checkout", name="checkout")
     */
    public function checkoutAction(Request $request)
    {

        // If no product in session.
        $session = $request->getSession();
        if ( !$session->get( 'product' ) ) {
            $this->addFlash(
                'notice',
                'No product chosen to buy yet!'
            );

            return $this->redirectToRoute( 'homepage' );
        }

        return $this->render('default/checkout.html.twig', array(
            'tobtc_endpoint' => $this->container->getParameter('tobtc_endpoint')
        ));
    }


    public function toBTC( $usd_price ) {
        $endpointToBTC = $this->container->getParameter('tobtc_endpoint');
        $endpointToBTC .= $usd_price;
        $response = \Requests::get( $endpointToBTC );
        // Store Bitcoin price in Product.
        return $response->body;
    }

}
