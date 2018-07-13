<?php

namespace Rest\PaginatorBundle\Annotations;

use Sensio\Bundle\FrameworkExtraBundle\Configuration\ConfigurationAnnotation;

/**
 * @Annotation
 */
class Paginate extends ConfigurationAnnotation
{
    /**
     * @var bool
     */
    protected $paginate = true;
    
    /**
     * @var int
     */
    protected $pageRange;
    
    /**
     * @param bool $val
     */
    public function setPaginate($val)
    {
        $this->paginate = $val;
    }
    
    /**
     * @return bool
     */
    public function getPaginate() {
        return $this->paginate;
    }
    
    /**
     * Sets page range to paginate
     * 
     * @param int $pageRange
     */
    public function setPageRange($pageRange)
    {
        $this->pageRange = $pageRange;
    }
    
    /**
     * Get page range to paginate
     * 
     * @return int
     */
    public function getPageRange()
    {
        return $this->pageRange;
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
