<?php

namespace KaraokeBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;

class DefaultController extends Controller
{
    public function indexAction()
    {
        $name = "Dorian";
        return $this->render('KaraokeBundle:Default:index.html.twig', array('name' => $name));
    }
}
