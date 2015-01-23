<?php
namespace Application\Theme\OliveSample;
class PageTheme extends \Concrete\Core\Page\Theme\Theme {

    public function registerAssets() {
       //foundation
        $this->requireAsset('css', 'foundation-icon-fonts');
        $this->requireAsset('javascript', 'modernizr');
        $this->requireAsset('javascript', 'fastclick');
        $this->requireAsset('javascript', 'jquery2');
        $this->requireAsset('javascript', 'foundation');
        $this->requireAsset('javascript', 'app');

        //responsive images
        $this->requireAsset('javascript', 'picturefill');
    }

	protected $pThemeGridFrameworkHandle = 'foundation';
}