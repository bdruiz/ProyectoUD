<?php

namespace Proyecto\DeportesBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;

class DefaultController extends Controller
{
    public function indexAction($name)
    {
        return $this->render('DeportesBundle:Default:index.html.twig', array('name' => $name));
    }
}
