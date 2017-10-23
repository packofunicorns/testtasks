<?php
namespace My\Pages\Video;

use Lmc\Steward\Component\AbstractComponent;
use My\Pages\BasePage;

class PopularVideoPage extends BasePage
{
    const SEARCH_INPUT_CSS = ".header input[type='search']";
    const SEARCH_BUTTON_CSS = ".header .search2__button button";

    /**
     * Inputs the text to the search2 input
     * @param $text - the text to search
     * @return $this
     */
    public function inputSearchText($text)
    {
        $searchInput = $this->waitForCss(self::SEARCH_INPUT_CSS);
        $searchInput->sendKeys($text);
        return $this;
    }

    /**
     * Clicks on the search button
     */
    public function clickOnSearchButton()
    {
        $searchButton = $this->findByCss(self::SEARCH_BUTTON_CSS);
        $searchButton->click();
        return $this;
    }
}