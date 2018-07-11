<?php

namespace Rest\PaginatorBundle\Annotations;

use Sensio\Bundle\FrameworkExtraBundle\Configuration\ConfigurationAnnotation;

/**
 * @Annotation
 */
class Paginate extends ConfigurationAnnotation
{
    protected $paginate = true;
    
    public function setPaginate($val)
    {
        $this->paginate = $val;
    }
    
    public function getPaginate() {
        return $this->paginate;
    }
    
    public function __construct($values)
    {
        parent::__construct($values);
    }

    public function allowArray()
    {
        return false;
    }

    public function getAliasName()
    {
        return 'paginate';
    }
}
