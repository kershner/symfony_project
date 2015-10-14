<?php

namespace AppBundle\Controller;

use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use AppBundle\Entity\Doodle;
use AppBundle\Form\Type\DoodleType;
use \DateTime;

class DefaultController extends Controller
{
    /**
     * @Route("/", name="Home")
     */
    public function doodleAction(Request $request)
    {
        $entries = $this->getDoctrine()
            ->getRepository('AppBundle:Doodle')
            ->findAll();

        // Instantiating Doodle object
        $doodle = new Doodle();

        // Variables for final response
        $data = array(
            'title' => 'BaconDoodle!',
            'entries' => $entries,
        );

        // Initializing form
        $form = $this->createForm(new DoodleType(), $doodle);
        $form->handleRequest($request);

        // Handling form submission
        if ($form->isValid()) {
            $formData = $form->getData();

            $now = new DateTime();

            // Setting Doodle object
            $doodle->setCreated($now);
            $doodle->setAuthor($formData->author);
            $doodle->setTitle($formData->title);
            $doodle->setData($formData->data);

            // Calling doctrine entity manager
            $em = $this->getDoctrine()->getManager();
            $em->persist($doodle);
            $em->flush();

            return $this->redirectToRoute('Home');
        }

        return $this->render('default/doodle.html.twig', array('data' => $data, 'form' => $form->createView()));
    }

    /**
     * @Route("/api/{id}", name="doodle_api")
     */
    public function apiAction (Request $request, $id)
    {
        $doodle = $this->getDoctrine()
            ->getRepository('AppBundle:Doodle')
            ->find($id);

        if (!$doodle) {
            $message = 'No doodle found for id '.$id;

            $response = new Response(json_encode(array('error' => $message)));
            $response->headers->set('Content-Type', 'application/json');

            return $response;
        }

        $created = $doodle->created;
        $title = $doodle->title;
        $author = $doodle->author;
        $dataUrl = $doodle->data;

        $data = array(
            'id' => $id,
            'created' => $created,
            'title' => $title,
            'author' => $author,
            'dataUrl' => $dataUrl
            );

        $response = new Response(json_encode(array('doodle' => $data)));
        $response->headers->set('Content-Type', 'application/json');

        return $response;
    }
}
