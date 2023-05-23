<?php

namespace Scopus\Response;

class CiteScoreSubjectRank
{
    /** @var array */
    protected $data;

    public function __construct(array $data)
    {
        $this->data = $data;
    }

    public function getSubjectCode()
    {
        return isset($this->data['subjectCode']) ? $this->data['subjectCode'] : null;
    }
    public function getRank()
    {
        return isset($this->data['rank']) ? $this->data['rank'] : null;
    }
    public function getPercentile()
    {
        return isset($this->data['percentile']) ? $this->data['percentile'] : null;
    }
}
