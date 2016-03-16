<?php

namespace Proyecto\EnfermeriaBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\Serializer\Serializer;
use Symfony\Component\Serializer\Encoder\XmlEncoder;
use Symfony\Component\Serializer\Encoder\JsonEncoder;
use Symfony\Component\Serializer\Normalizer\GetSetMethodNormalizer;
use Proyecto\AdminBundle\Entity\Usuarios;

class DefaultController extends Controller
{
    public function indexAction()
    {
        return $this->render('EnfermeriaBundle:Default:index.html.twig');
    }

    public function pruebaAction(){

    }
}
