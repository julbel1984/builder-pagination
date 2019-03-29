<?php
/**
 * Created by PhpStorm.
 * User: julbel
 * Date: 29.03.19
 * Time: 17:12
 */

namespace App\Pagination\Renderers;

use App\Pagination\Meta;

class PlainRenderer
{
    protected $meta;

    public function __construct(Meta $meta)
    {
        $this->meta = $meta;
    }

    public function render()
    {
        dump($this->meta);
    }
}