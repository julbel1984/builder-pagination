<?php


namespace App\Pagination;

use App\Pagination\Meta;
use Iterator;

class PageIterator implements Iterator
{
    /**
     * @var array
     */
    protected $pages;

    /**
     * @var \App\Pagination\Meta
     */
    protected $meta;

    /**
     * @var int
     */
    protected $position = 0;

    /**
     * PageIterator constructor.
     * @param array $pages
     * @param \App\Pagination\Meta $meta
     */
    public function __construct(array $pages, Meta $meta)
    {
        $this->pages = $pages;
        $this->meta = $meta;
    }

    /**
     * @return bool
     */
    public function isCurrentPage()
    {
        return $this->current() === $this->meta->page;
    }

    /**
     * @return bool
     */
    public function hasPrevious()
    {
        if ($this->meta->page <= 0) {
            return false;
        }

        return $this->meta->page > 1;
    }

    /**
     * @return bool
     */
    public function hasNext()
    {
        return $this->meta->page < $this->meta->lastPage;
    }

    /**
     * @return mixed
     */
    public function current()
    {
        return $this->pages[$this->position];
    }

    /**
     * @return int|mixed
     */
    public function key()
    {
        return $this->position;
    }

    /**
     *
     */
    public function next()
    {
        ++$this->position;
    }

    /**
     *
     */
    public function rewind()
    {
        $this->position = 0;
    }

    /**
     * @return bool
     */
    public function valid()
    {
        return isset($this->pages[$this->position]);
    }
}