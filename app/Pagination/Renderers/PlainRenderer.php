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
        $iterator = $this->pages();

        $html = '<ul>';

        if ($iterator->hasPrevious()) {
            $html .= '<li>
                <a href="'. $this->query($this->meta->page - 1) .'">Previous</a>
            </li>';
        }

        foreach ($iterator as $page) {
            if ($iterator->isCurrentPage()) {
                $html .= '<li>
                    <strong><a href="'. $this->query($page) .'">' . $page . '</a></strong>
                </li>';
            } else {
                $html .= '<li>
                    <a href="'. $this->query($page) .'">' . $page . '</a>
                </li>';
            }
        }

        if ($iterator->hasNext()) {
            $html .= '<li>
                <a href="'. $this->query($this->meta->page + 1) .'">Next</a>
            </li>';
        }


        $html .= '</ul>';

        return $html;
    }

    /**
     * @param $page
     * @return string
     */
    protected function query($page)
    {
        return '?page=' . $page;
    }
}