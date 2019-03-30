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
        $lrCount = 2;
        $range = range(1, $this->meta->lastPage());

        $endDiff = max(0, $this->meta->page - ($this->meta->lastPage - $lrCount) + 1);

        $range = array_slice(
            array_slice($range, max(1, ($this->meta->page - $lrCount) - $endDiff)),
            0, ($lrCount * 2)
        );

        array_unshift($range, 1);
        $range[] = $this->meta->lastPage;

        return array_unique($range);
    }
}