<?php
/**
 * Created by PhpStorm.
 * User: julbel
 * Date: 30.03.19
 * Time: 19:42
 */

namespace App\Pagination\Renderers;

use App\Pagination\Meta;

abstract class RendererAbstract
{
    /**
     * @var Meta
     */
    protected $meta;

    /**
     * RendererAbstract constructor.
     * @param Meta $meta
     */
    public function __construct(Meta $meta)
    {
        $this->meta = $meta;
    }

    /**
     * @return array
     */
    public function pages()
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

    abstract public function render();
}