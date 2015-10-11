<?php

namespace AppBundle\Controller;

use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use AppBundle\Entity\Doodle;
use AppBundle\Form\Type\DoodleType;

class DefaultController extends Controller
{
    /**
     * @Route("/bacon", name="doodle!")
     */
    public function doodleAction(Request $request)
    {
        $doodle = new Doodle();
        $form = $this->createForm(new DoodleType(), $doodle);
        $form->handleRequest($request);
        if ($form->isValid()) {
            $formData = $form->getData();
            print_r($formData);
        }

        $data = array(
            'title' => 'BaconDoodle!',
        );

        return $this->render('default/doodle.html.twig', array('data' => $data, 'form' => $form->createView()));
    }
}
