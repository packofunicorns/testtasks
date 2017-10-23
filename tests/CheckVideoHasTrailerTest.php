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
        $this->page->inputSearchTextToSearchInput("ураган");
        $this->page->clickSearchButton();
        $this->page->hoverMouseToTheSecondVideo();
        $hasTrailerChanged = $this->page->hasVideoTrailerChanged();

        $this->assertTrue($hasTrailerChanged, "Video trailer has not changed within ".TestProperties::TIMEOUT);
    }


    /**
     * How the test could look.
     * Each method returns a page with this method interacts.
     * If a method clicks on a button, it returns a page
     * that appears after clicking.
     * This style's called 'noodle' and allows to quickly
     * create automatic tests.
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