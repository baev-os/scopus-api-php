<?php

namespace Scopus\Response;

class Abstracts implements IAbstract
{
    /** @var array */
    protected $data;
    
    /** @var AbstractCoredata */
    protected $coredata;
    
    /** @var AbstractAuthor[] */
    protected $authors;
    
    /** @var AbstractItem */
    protected $item;
    
    public function __construct(array $data)
    {
        $this->data = $data;
    }
    
    public function getCoredata()
    {
        return $this->coredata ?: $this->coredata = new AbstractCoredata($this->data['coredata']);
    }

    /**
     * @return AbstractAuthor[]
     */
    public function getAuthors()
    {
        if (isset($this->data['authors']['author'])) {
            return $this->authors ?: $this->authors = array_map(function($author) {
                return new AbstractAuthor($author);
            }, $this->data['authors']['author']);
        }
    }

    /**
     * @return int
     */
    public function countAuthors()
    {
        return isset($this->data['authors']['author']) ? count($this->data['authors']['author']) : 0;
    }
    
    public function getItem()
    {
        return $this->item ?: $this->item = new AbstractItem($this->data['item']);
    }
}