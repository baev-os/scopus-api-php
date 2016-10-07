<?php

namespace Scopus\Response;

class AuthorGroup
{
    /** @var array */
    protected $data;

    /** @var AbstractAuthor[] */
    protected $authors;

    public function __construct(array $data)
    {
        $this->data = $data;
    }

    public function getAuthors()
    {
        if (isset($this->data['author'])) {
            return $this->authors ?: $this->authors = array_map(function($author) {
                return new AbstractAuthor($author);
            }, $this->data['author']);
        }
    }
}