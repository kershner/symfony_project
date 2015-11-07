<?php

namespace AppBundle\Controller;

use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\Security\Core\Authorization\AuthorizationChecker;
use Symfony\Component\Security\Core\Exception\AccessDeniedException;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use AppBundle\Entity\User;
use AppBundle\Entity\Doodle;
use AppBundle\Entity\Comment;
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
        $data = [
            'title' => 'BaconDoodle!',
            'entries' => $entries,
        ];

        // Initializing form
        $form = $this->createForm(new DoodleType(), $doodle);
        $form->handleRequest($request);

        // Handling form submission
        if ($form->isValid()) {
            $formData = $form->getData();
            $user = $this->getUser();
            $now = new DateTime();

            // Setting Doodle values
            $doodle->setCreated($now);
            $doodle->setTitle($formData->title);
            $doodle->setData($formData->data);
            $doodle->setUser($user);
            if ($user) {
                $doodle->setAuthor($user->username);
            } else {
                $doodle->setAuthor('Anonymous');
            }

            // Calling doctrine entity manager
            $em = $this->getDoctrine()->getManager();
            $em->persist($doodle);
            $em->flush();

            return $this->redirectToRoute('Home');
        }

        return $this->render('default/doodle.html.twig', [
            'data' => $data,
            'form' => $form->createView()
            ]);
    }

    /**
     * @Route("/comment", name="Comment")
     */
    public function commentAction(Request $request)
    {
        $user = $this->getUser();
        $comment = new Comment();
        $now = new DateTime();

        $doodle_id = $request->get('id');
        $text = $request->get('comment');

        $doodle = $this->getDoctrine()
            ->getRepository('AppBundle:Doodle')
            ->find($doodle_id);

        $comment->setUser($user);
        $comment->setDoodle($doodle);
        $comment->setCreated($now);
        $comment->setText($text);
        if ($user) {
            $comment->setAuthor($user->username);
        } else {
            $comment->setAuthor('Anonymous');
        }

        $em = $this->getDoctrine()->getManager();
        $em->persist($comment);
        $em->flush();

        $data = [
            'message' => 'Success!',
            'id' => $doodle_id,
            'text' => $text
        ];

        $response = new Response(json_encode(['response' => $data]));
        $response->headers->set('Content-Type', 'application/json');

        return $response;
    }

    /**
     * @Route("/get-comments", name="get_comments")
     */
    public function getCommentsAction(Request $request)
    {
        $doodle_id = $request->get('id');

        $doodle = $this->getDoctrine()
            ->getRepository('AppBundle:Doodle')
            ->find($doodle_id);

        $comments = $doodle->comments;
        $new_comments = [];
        foreach ($comments as $comment) {
            $attr = [
                'created' => $comment->created,
                'author' => $comment->author,
                'text' => $comment->text
            ];
            array_push($new_comments, $attr);
        }

        $data = [
            'message' => 'Success!',
            'comments' => $new_comments
        ];

        $response = new Response(json_encode(['response' => $data]));
        $response->headers->set('Content-Type', 'application/json');

        return $response;
    }

    /**
     * @Route("/u/{username}", name="view_profile")
     */
    public function viewProfileAction(Request $request, $username)
    {
        $profile = $this->getDoctrine()
            ->getRepository('AppBundle:User')
            ->findOneBy(['username' => $username]);

        $data = [
            'title' => 'BaconDoodle! - View Profile',
            'profile' => $profile,
        ];
        return $this->render('default/view_profile.html.twig', ['data' => $data]);
    }

    /**
     * @Route("/doodle/{id}", name="view_doodle")
     */
    public function viewDoodleAction(Request $request, $id)
    {
        $doodle = $this->getDoctrine()
            ->getRepository('AppBundle:Doodle')
            ->find($id);

        $data = [
            'title' => 'BaconDoodle! - View Profile',
            'doodle' => $doodle,
        ];
        return $this->render('default/view_doodle.html.twig', ['data' => $data]);
    }

    /**
     * @Route("/register", name="user_registration")
     */
    public function registerAction(Request $request)
    {
        $new_user = new User();
        $form = $this->createForm(new UserType(), $new_user);

        $data = [
            'title' => 'Register - BaconDoodle!'
        ];

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

        return $this->render('security/register.html.twig', [
            'form' => $form->createView(),
            'data' => $data
        ]);
    }

    /**
     * @Route("/login", name="login_route")
     */
    public function loginAction(Request $request)
    {
        $authenticationUtils = $this->get('security.authentication_utils');
        $error = $authenticationUtils->getLastAuthenticationError();
        $lastUsername = $authenticationUtils->getLastUsername();

        $data = [
            'title' => 'Login - BaconDoodle!'
        ];

        return $this->render(
            'security/login.html.twig', [
                'last_username' => $lastUsername,
                'error' => $error,
                'data' => $data
            ]);
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

        $data = ['users' => $users];
        return $this->render('default/view_users.html.twig', ['data' => $data]);
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

        $data = [
            'id' => $id,
            'created' => $created,
            'title' => $title,
            'author' => $author,
            'dataUrl' => $dataUrl
        ];

        $response = new Response(json_encode(['doodle' => $data]));
        $response->headers->set('Content-Type', 'application/json');

        return $response;
    }
}
