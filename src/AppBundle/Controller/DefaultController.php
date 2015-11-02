<?php

namespace AppBundle\Controller;

use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use AppBundle\Entity\Doodle;
use AppBundle\Entity\User;
use AppBundle\Form\Type\DoodleType;
use AppBundle\Form\Type\UserType;
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
     * @Route("/register", name="user_registration")
     */
    public function registerAction(Request $request)
    {
        $user = new User();
        $form = $this->createForm(new UserType(), $user);

        // Handle form POST request
        $form->handleRequest($request);
        if ($form->isValid() && $form->isSubmitted()) {
            // Encode password
            $password = $this->get('security.password_encoder')
                ->encodePassword($user, $user->getPlainPassword());
            $user->setPassword($password);

            // Save the user to DB
            $em = $this->getDoctrine()->getManager();
            $em->persist($user);
            $em->flush();

            $this->addFlash('message', 'You have successfully registered!  Please log in.');

            return $this->redirectToRoute('Login');
        }

        return $this->render(
            'default/register.html.twig',
            array('form' => $form->createView())
        );
    }

    /**
    * @Route("/login", name="Login")
    */
    public function loginAction(Request $request)
    {
        return $this->render('default/login.html.twig');
    }

    /**
     * @Route("/api/{id}", name="doodle_api")
     */
    public function apiAction(Request $request, $id)
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
