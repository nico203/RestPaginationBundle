<?php

namespace Rest\PaginatorBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;

class DefaultController extends Controller
{
    public function indexAction()
    {
        return $this->render('RestPaginatorBundle:Default:index.html.twig');
    }
}
