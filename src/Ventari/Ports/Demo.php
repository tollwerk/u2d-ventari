<?php
/**
 * Created by PhpStorm.
 * User: tollwerk
 * Date: 21.07.2018
 * Time: 18:48
 */

namespace Tollwerk\Ventari\Ports;


class Demo
{
    /**
     * Demo property
     *
     * @var string
     */
    protected $property;

    /**
     * Demo constructor.
     * @param string $property
     */
    public function __construct(string $property)
    {
        $this->property = $property;
    }

    /**
     * @return string
     */
    public function getProperty(): string
    {
        return $this->property;
    }

    /**
     * @param string $property
     */
    public function setProperty(string $property): void
    {
        $this->property = $property;
    }
}
