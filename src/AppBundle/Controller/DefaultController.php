<?php

namespace AppBundle\Controller;

use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;

class DefaultController extends Controller
{
    /**
     * @Route("/bacon", name="doodle!")
     */
    public function doodleAction(Request $request)
    {
        $name = 'Bacon';
        $data = array(
            'name' => $name,
            'title' => 'BaconDoodle!',
        );
        // replace this example code with whatever you need
        return $this->render('default/doodle.html.twig', array('data' => $data));
    }
}