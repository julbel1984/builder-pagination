<?php
/**
 * Created by PhpStorm.
 * User: julbel
 * Date: 29.03.19
 * Time: 14:33
 */

namespace App\Pagination;

class Meta
{
    /**
     * @var
     */
    protected $page;

    /**
     * @var
     */
    protected $perPage;

    /**
     * @var
     */
    protected $total;

    /**
     * Meta constructor.
     * @param $page
     * @param $perPage
     * @param $total
     */
    public function __construct($page, $perPage, $total)
    {
        $this->page = $page;
        $this->perPage = $perPage;
        $this->total = $total;
    }

    /**
     * @return int
     */
    public function page()
    {
        return (int) $this->page;
    }

    /**
     * @return int
     */
    public function perPage()
    {
        return (int) $this->perPage;
    }

    /**
     * @return int
     */
    public function total()
    {
        return (int) $this->total;
    }

    /**
     * @return float|int
     */
    public function lastPage()
    {
        return (int) ceil($this->total() / $this->perPage());
    }

    /**
     * @param $property
     * @return |null
     */
    public function __get($property)
    {
        if (method_exists($this, $property)) {
            return $this->{$property}();
        }

        return null;
    }

}