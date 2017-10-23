<?php

namespace My\Pages;

use My\Pages\Video\PopularVideoPage;

class BasePage extends AbstractComponent
{
    /**
     * Opens the video page
     * @return $this
     */
    public function openVideoPage()
    {
        $page = new PopularVideoPage($this);
        return $page;
    }
}