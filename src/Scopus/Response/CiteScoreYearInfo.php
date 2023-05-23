<?php

namespace Scopus\Response;

class CiteScoreYearInfo
{
    /** @var array */
    protected $data;

    /** @var CiteScoreSubjectRank[] */
    protected $citeScoreSubjectRanks;

    public function __construct(array $data)
    {
        parent::__construct($data);
    }

    public function getYear()
    {
        return isset($this->data['@year']) ? $this->data['@year'] : null;
    }

    public function getStatus()
    {
        return isset($this->data['@status']) ? $this->data['@status'] : null;
    }

    public function getScholarlyOutput()
    {
        return isset($this->data['citeScoreInformationList']['citeScoreInfo']['scholarlyOutput']) ? $this->data['citeScoreInformationList']['citeScoreInfo']['scholarlyOutput'] : null;
    }
    public function getCitationCount()
    {
        return isset($this->data['citeScoreInformationList']['citeScoreInfo']['citationCount']) ? $this->data['citeScoreInformationList']['citeScoreInfo']['citationCount'] : null;
    }
    public function getCiteScore()
    {
        return isset($this->data['citeScoreInformationList']['citeScoreInfo']['citeScore']) ? $this->data['citeScoreInformationList']['citeScoreInfo']['citeScore'] : null;
    }
    public function getPercentCited()
    {
        return isset($this->data['citeScoreInformationList']['citeScoreInfo']['percentCited']) ? $this->data['citeScoreInformationList']['citeScoreInfo']['percentCited'] : null;
    }

    public function getCiteScoreSubjectRanks()
    {
        if (isset($this->data['citeScoreInformationList']['citeScoreInfo']['citeScoreSubjectRank'])) {
            return $this->citeScoreSubjectRanks ?: $this->citeScoreSubjectRanks = array_map(function ($citeScoreSubjectRank) {
                return new CiteScoreSubjectRank($citeScoreSubjectRank);
            }, $this->data['citeScoreInformationList']['citeScoreInfo']['citeScoreSubjectRank']);
        }
        return null;
    }
}
