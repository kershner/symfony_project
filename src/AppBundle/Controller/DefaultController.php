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

        $user = $this->getUser();

        // Instantiating Doodle object
        $doodle = new Doodle();

        // Variables for final response
        $data = array(
            'title' => 'BaconDoodle!',
            'user' => $user,
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
        $user = $this->getUser();

        $new_user = new User();
        $form = $this->createForm(new UserType(), $new_user);

        // Handle form POST request
        $form->handleRequest($request);
        if ($form->isValid() && $form->isSubmitted()) {
            // Encode password
            $password = $this->get('security.password_encoder')
                ->encodePassword($new_user, $new_user->getPlainPassword());
            $new_user->setPassword($password);

            // Save the user to DB
            $em = $this->getDoctrine()->getManager();
            $em->persist($new_user);
            $em->flush();

            $this->addFlash('message', 'You have successfully registered!  Please log in.');

            return $this->redirectToRoute('Login');
        }

        return $this->render('security/register.html.twig', array('form' => $form->createView(), 'data' => ['user' => $user]));
    }

    /**
     * @Route("/login", name="login_route")
     */
    public function loginAction(Request $request)
    {
        $authenticationUtils = $this->get('security.authentication_utils');
        $error = $authenticationUtils->getLastAuthenticationError();
        $lastUsername = $authenticationUtils->getLastUsername();
        $user = $this->getUser();

        return $this->render(
            'security/login.html.twig',
            array(
                'last_username' => $lastUsername,
                'error' => $error,
                'data' => ['user' => $user],
            )
        );
    }

    /**
     * @Route("/login_check", name="login_check")
     */
    public function loginCheckAction(Request $request)
    {

    }

    /**
     * @Route("/view_users", name="view_users")
     */
    public function viewUsersAction(Request $request)
    {
        $users = $this->getDoctrine()
            ->getRepository('AppBundle:User')
            ->findAll();

        $data = array(
            'users' => $users
        );
        return $this->render('default/view_users.html.twig', array('data' => $data));
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
