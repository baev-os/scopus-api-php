<?php

namespace Scopus;

class SearchQuerySerial
{
    const VIEW_STANDARD = 'STANDARD';
    const VIEW_ENHANCED = 'ENHANCED';
    const VIEW_CITESCORE = 'CITESCORE';

    protected $searchApi;

    protected $start;

    protected $count;

    protected $query;

    protected $view;

    public function __construct(ScopusApi $searchApi, $query)
    {
        $this->searchApi = $searchApi;
        $this->query = $query;
        $this->start = 0;
        $this->count = 25;
        $this->view = self::VIEW_STANDARD;
    }

    public function getStart()
    {
        return $this->start;
    }

    public function start($startIndex)
    {
        $this->start = $startIndex;
        return $this;
    }

    public function getCount()
    {
        return $this->count;
    }

    public function count($count)
    {
        $this->count = $count;
        return $this;
    }

    public function getQuery()
    {
        return $this->query;
    }

    public function query($query)
    {
        $this->query = $query;
        return $this;
    }

    public function getView()
    {
        return $this->view;
    }

    public function viewStandard()
    {
        $this->view = self::VIEW_STANDARD;
        return $this;
    }

    public function viewEnhanced()
    {
        $this->view = self::VIEW_ENHANCED;
        return $this;
    }

    public function viewCitescore()
    {
        $this->view = self::VIEW_CITESCORE;
        return $this;
    }

    /**
     * @return Response\SerialMetaDataResults
     */
    public function search()
    {
        return $this->searchApi->searchSerialTitles($this->toArray());
    }

    public function toArray()
    {
        return [
            'query' => $this->query,
            'start' => $this->start,
            'count' => $this->count,
            'view' => $this->view
        ];
    }
}
