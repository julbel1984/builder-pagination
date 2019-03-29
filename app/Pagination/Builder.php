<?php
/**
 * Created by PhpStorm.
 * User: julbel
 * Date: 29.03.19
 * Time: 10:28
 */

namespace App\Pagination;

class Builder
{
    /**
     * @var $builder
     */
    protected $builder;

    /**
     * Builder constructor.
     * @param $builder
     */
    public function __construct($builder)
    {
        $this->builder = $builder;
    }

    /**
     * @param int $page
     * @param int $perPage
     */
    public function paginate($page = 1, $perPage = 10)
    {
        $page = max(1, $page);

        $total = $this->builder->execute()->rowCount();

        $result = $this->builder
            ->setFirstResult(
                $this->getFirstResultIndex($page, $perPage)
            )
            ->setMaxResults($perPage)
            ->execute()
            ->fetchAll();

        return new Results(
            $result,
            $meta = new Meta($page, $perPage, $total)
    );

    }

    /**
     * @param $page
     * @param $perPage
     * @return float|int
     */
    protected function getFirstResultIndex($page, $perPage)
    {
        return ($page - 1) * $perPage;
    }
}