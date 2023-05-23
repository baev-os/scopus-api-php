<?php

namespace Scopus\Response;

class CiteScoreInformationList
{
    /** @var array */
    protected $data;

    /** @var CiteScoreInfo[] */
    protected $citeScoreInfos;

    public function __construct(array $data)
    {
        $this->data = $data;
    }

    public function getCiteScoreInfos()
    {
        if (isset($this->data['citeScoreInfo'])) {
            return $this->citeScoreInfos ?: $this->citeScoreInfos = array_map(function ($citeScoreInfo) {
                return new CiteScoreInformationList($citeScoreInfo);
            }, $this->data['citeScoreInfo']);
        }
        return null;
    }
}
