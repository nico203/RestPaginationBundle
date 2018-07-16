<?php

namespace Rest\PaginatorBundle\Event\EventListener;

use Symfony\Component\HttpKernel\Event\GetResponseForControllerResultEvent;
use Doctrine\ORM\Query;
use Rest\PaginatorBundle\Annotations\Paginate;
use Knp\Component\Pager\Paginator;

class ViewListener
{
    private $paginator;
    private $itemsPaginacion;


    public function __construct($itemsPaginacion)
    {
        $this->paginator = new Paginator();
        $this->itemsPaginacion = $itemsPaginacion;
    }
    
    public function onKernelView(GetResponseForControllerResultEvent $event) {
        $request = $event->getRequest();
        
        $paginate = $request->attributes->get('_paginate', false);
        
        if(!$paginate || (($paginate instanceof Paginate) && !$paginate->getPaginate())) {
            return false;
        }
        
        $data = $event->getControllerResult();
        if(!($data instanceof Query)) {
            return false;
        }
        
        $pagination = $this->paginator->paginate(
            $data, 
            $request->query->getInt('page', 1), 
            ($paginate->getPageRange()) ? $paginate->getPageRange() : $this->itemsPaginacion
        );
        
        $event->setControllerResult(array(
            'data' => $pagination->getItems(),
            'totalPageCount' => ceil($pagination->getTotalItemCount()/$pagination->getItemNumberPerPage()),
            'totalItemCount' => $pagination->getTotalItemCount(),
            'currentPageNumber' => $pagination->getCurrentPageNumber()
        ));
    }
}
