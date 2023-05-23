<?php

namespace Scopus\Response;

class CiteScoreYearInfo
{
    /** @var array */
    protected $data;

    /** @var CiteScoreInformationList[] */
    protected $citeScoreInformationLists;

    public function __construct(array $data)
    {
        $this->data = $data;
    }

    public function getYear()
    {
        return isset($this->data['@year']) ? $this->data['@year'] : null;
    }

    public function getStatus()
    {
        return isset($this->data['@status']) ? $this->data['@status'] : null;
    }

    public function getCiteScoreInformationLists()
    {
        if (isset($this->data['citeScoreInformationList'])) {
            return $this->citeScoreInformationLists ?: $this->citeScoreInformationLists = array_map(function ($citeScoreInformationList) {
                return new CiteScoreInformationList($citeScoreInformationList);
            }, $this->data['citeScoreInformationList']);
        }
        return null;
    }
}
