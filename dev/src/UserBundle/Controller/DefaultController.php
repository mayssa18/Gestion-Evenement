<?php

namespace UserBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;

class  DefaultController extends Controller
{
    public function indexAction()

    {
        $user=null;
        if($this->get('security.authorization_checker')->isGranted('ROLE_ADMIN'))
        {
            return $this->redirectToRoute('indexadmin');
        }
        elseif($this->get('security.authorization_checker')->isGranted('ROLE_PARENT'))
        {
            return $this->render('@User/Default/index.html.twig');
        }
        else
        {
            return $this->render('@User/Default/index.html.twig');
        }


    }
    public function indexadminAction()
    {
        return $this->render('@User/Default/indexadmin.html.twig');
    }


}
