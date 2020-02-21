<?php
namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Security\Http\Authentication\AuthenticationUtils;

class SecurityController extends AbstractController
{
    /**
     * @Route("/login", name="login")
     *
     * @param  Request $request
     * @param  AuthenticationUtils $authUtils
     *
     * @return Response
     */
    public function login(Request $request, AuthenticationUtils $authUtils)
    {
        $session = $request->getSession();

        $login_amount = $session->get('login_amount');
        $login_amount++;
        $session->set('login_amount', $login_amount);

        $isBlocked = false;
        if ($login_amount > 20) {
            $isBlocked = true;
        }

        // get the login error if there is one
        $error = $authUtils->getLastAuthenticationError();

        // last username entered by the user
        $lastUsername = $authUtils->getLastUsername();

        return $this->render('security/login.html.twig', [
            'last_username' => $lastUsername,
            'error'         => $error,
            'is_blocked'    => $isBlocked,
        ]);
    }
}
