<?php

namespace Tollwerk\Ventari\Domain\Model;

/**
 * Class AbstractModel
 * @package Tollwerk\Ventari\Domain\Entity
 */
abstract class AbstractModel
{
    /**
     * @var int
     */
    protected $id;

    /**
     * @return int
     */
    public function getId(){
        return $this->id;
    }

    /**
     * @param $id
     * @return $this
     */
    public function setId($id){
        $this->id = $id;
        return $this;
    }

    /***************************************************************
     * GET Functions
     **************************************************************/

    /***************************************************************
     * SET Functions
     **************************************************************/
}
