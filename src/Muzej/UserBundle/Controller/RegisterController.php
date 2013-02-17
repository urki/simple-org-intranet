<?php

namespace Muzej\UserBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Template;
use Symfony\Component\HttpFoundation\Request;
use Muzej\UserBundle\Entity\User;
use Muzej\UserBundle\Form\RegisterFormType;
use Symfony\Component\Security\Core\User\UserInterface;
use Symfony\Component\Security\Core\Authentication\Token\UsernamePasswordToken;


class RegisterController extends Controller {

    /**
     * @Route("/register", name="user_register")
     * @Template()
     */
    public function registerAction(Request $request) {

        $defaultUser = new User();
        $defaultUser->setUsername('foo');
        $form = $this->createForm(new RegisterFormType(), $defaultUser);
        if ($request->isMethod('POST')) {
            $form->bind($request);

            if ($form->isValid()) {
                $user = $form->getData();
                $user->setPassword($this->encodePassword($user, $user->getPlainPassword()));
                $em = $this->getDoctrine()->getEntityManager();
                $em->persist($user);
                $em->flush();

                $request->getSession()->setFlash('success', 'Registration went super well!');

                $url = $this->generateUrl('survey');
                // authenticates the user right now
                $this->authenticateUser($user);
                
                return $this->redirect($url);
            }
        }
        return array('form' => $form->createView());
    }

    public function encodePassword($user, $plainPassword) {
        $encoder = $this->container->get('security.encoder_factory')
                ->getEncoder($user);
        return $encoder->encodePassword($plainPassword, $user->getSalt());
    }
   private function authenticateUser(UserInterface $user)
    {
        $providerKey = 'secured_area'; // your firewall name
        $token = new UsernamePasswordToken($user, null, $providerKey, $user->getRoles());

        $this->container->get('security.context')->setToken($token);
    }
}