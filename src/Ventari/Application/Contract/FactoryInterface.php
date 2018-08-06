<?php
/**
 * Created by PhpStorm.
 * User: philipsaa
 * Date: 8/6/18
 * Time: 16:56
 */

namespace Tollwerk\Ventari\Application\Contract;

use Tollwerk\Ventari\Domain\Contract\ModelInterface;

interface FactoryInterface
{
    /**
     * Create a model instance from a JSON object
     *
     * @param \stdClass $json JSON object
     *
     * @return ModelInterface Model
     * @throws \Exception
     */
    public static function createFromJson($json): ModelInterface;
}