<?php
/**
 * Created by PhpStorm.
 * User: julbel
 * Date: 29.03.19
 * Time: 16:37
 */

namespace App\Pagination;

use App\Pagination\Meta;
use App\Pagination\Renderers\PlainRenderer;

class Results
{
    /**
     * @var array
     */
    protected $results;

    /**
     * @var \App\Pagination\Meta
     */
    protected $meta;

    /**
     * Results constructor.
     * @param array $results
     * @param \App\Pagination\Meta $meta
     */
    public function __construct(array $results, Meta $meta)
    {
        $this->results = $results;
        $this->meta = $meta;
    }

    /**
     * @return array
     */
    public function get()
    {
        return $this->results;
    }

    /**
     * @return
     */
    public function render()
    {
       return (new PlainRenderer($this->meta))->render();
    }
}