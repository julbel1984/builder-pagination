<?php
/**
 * Created by PhpStorm.
 * User: julbel
 * Date: 29.03.19
 * Time: 17:12
 */

namespace App\Pagination\Renderers;

use App\Pagination\Meta;
use App\Pagination\Renderers\RendererAbstract;

class PlainRenderer extends RendererAbstract
{
    /**
     * @return
     */
    public function render()
    {
        dump($this->pages());
    }
}