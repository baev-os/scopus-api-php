<?php

namespace Scopus\Response;

class CiteScoreInfo
{
    /** @var array */
    protected $data;

    /** @var CiteScoreSubjectRank[] */
    protected $citeScoreSubjectRanks;

    public function __construct(array $data)
    {
        $this->data = $data;
    }

    public function getScholarlyOutput()
    {
        return isset($this->data['scholarlyOutput']) ? $this->data['scholarlyOutput'] : null;
    }
    public function getCitationCount()
    {
        return isset($this->data['citationCount']) ? $this->data['citationCount'] : null;
    }
    public function getCiteScore()
    {
        return isset($this->data['citeScore']) ? $this->data['citeScore'] : null;
    }
    public function getPercentCited()
    {
        return isset($this->data['percentCited']) ? $this->data['percentCited'] : null;
    }

    public function getCiteScoreSubjectRanks()
    {
        if (isset($this->data['citeScoreSubjectRank'])) {
            return $this->citeScoreSubjectRanks ?: $this->citeScoreSubjectRanks = array_map(function ($citeScoreSubjectRank) {
                return new CiteScoreSubjectRank($citeScoreSubjectRank);
            }, $this->data['citeScoreSubjectRank']);
        }
        return null;
    }
}
