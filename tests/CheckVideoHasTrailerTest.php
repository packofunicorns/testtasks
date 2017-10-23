<?php

namespace My;

use Lmc\Steward\Test\AbstractTestCase;
use My\Pages\VideoPage;

class CheckVideoHasTrailerTest extends AbstractTestCase
{
    protected $page;

    /**
     * @before
     */
    public function init()
    {
        $this->wd->get(TestProperties::BASE_URL);

        $this->page = new VideoPage($this);
    }

    /**
     * Just the required test.
     */
    public function testChecksVideoTrailer()
    {
        $this->page->searchText("ураган");
        $this->page->clickSearchButton();
        $this->page->hoverMouseToTheSecondVideo();
        $hasTrailerChanged = $this->page->hasVideoTrailerChanged();

        $this->assertTrue($hasTrailerChanged, "Video trailer has not changed within ".TestProperties::TIMEOUT);
    }


    /**
     * How the test could look. It calls the 'noodles' test style.
     * Each method returns exactly the page
     * where the method transfers.
     * E.g., clickOnSearchButton() returns the page ResultsVideoPage
     * which contains only methods for working with (hoverMouseToTheSecondVideo()
     * and checkThatTrailerIsPresent()).
     */
//    public function howTheTestCanLookLike() {
//        $this
//            ->openVideoPage()
//            ->inputSearchText("ураган")
//            ->clickOnSearchButton()
//            ->hoverMouseToTheSecondVideo()
//            ->checkThatTrailerHasChanged();
//    }
}