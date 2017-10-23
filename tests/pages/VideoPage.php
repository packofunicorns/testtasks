<?php

namespace My\Pages;

use Lmc\Steward\Component\AbstractComponent;
use My\TestProperties;

class VideoPage extends AbstractComponent
{
    const SEARCH_INPUT_CSS = ".header input[type='search']";
    const SEARCH_BUTTON_CSS = ".header .search2__button button";
    const SECOND_VIDEO_IMAGE_CSS = ".serp-list > div:nth-of-type(2) .serp-item__preview img"; //because only second video has a trailer

    /**
     * Inputs the text to the search2 input
     * @param $text - the text to search
     * @return $this
     */
    public function inputSearchTextToSearchInput($text)
    {
        $searchInput = $this->findByCss(self::SEARCH_INPUT_CSS);
        $searchInput->sendKeys($text);
    }

    /**
     * Clicks on the search button
     */
    public function clickSearchButton()
    {
        $searchButton = $this->findByCss(self::SEARCH_BUTTON_CSS);
        $searchButton->click();
    }

    /**
     * Hover mouse to the second video
     */
    public function hoverMouseToTheSecondVideo()
    {
        $secondVideo = $this->findByCss(self::SECOND_VIDEO_IMAGE_CSS);
        $this->wd->getMouse()->mouseMove(
            $secondVideo->getCoordinates(),10,10
        );
    }

    /**
     * Checks that the trailer changes
     */
    public function hasVideoTrailerChanged()
    {
        $trailerSrc = $this->getTrailerImageSrcForSecondVideo();

        for ($i=1; $i < TestProperties::TIMEOUT; $i++) {
            sleep($i);
            if ($trailerSrc !== $this->getTrailerImageSrcForSecondVideo()) {
                return true;
            }
        }

        return false;
    }

    /*
     * Returns the src only for the second video
     */
    private function getTrailerImageSrcForSecondVideo()
    {
        return $this
            ->findByCss(self::SECOND_VIDEO_IMAGE_CSS)
            ->getAttribute("src");
    }
}