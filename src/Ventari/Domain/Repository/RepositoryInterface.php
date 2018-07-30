<?php

namespace Tollwerk\Ventari\Domain\Repository;
use Tollwerk\Ventari\Domain\Model\AbstractModel;

/**
 * Interface Repository
 * @package Tollwerk\Ventari\Domain\Repository
 */
interface RepositoryInterface
{
    /**
     * @param $id
     * @return mixed
     */
    public function getById($id);

    /**
     * @return array
     */
    public function getAll();

    /**
     * @param AbstractModel $entity
     * @return $this
     */
    public function persist(AbstractModel $entity);

    /**
     * @return $this
     */
    public function begin();

    /**
     * @return $this
     */
    public function commit();
}
