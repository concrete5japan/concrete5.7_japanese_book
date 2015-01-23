<?php
namespace Package\FoundationSites;

use BlockType;
use Package;
use PageType;
use PageTemplate;
use PageTheme;
use Concrete\Core\Attribute\Key\Category;
use Concrete\Core\Attribute\Key\FileKey;
use Concrete\Core\File\Image\Thumbnail\Type\Type as ThumbnailType;
use Concrete\Core\Page\Type\PublishTarget\Type\Type as PublishTargetType;
use Concrete\Core\Asset\AssetList;
use View;

class Controller extends Package
{ 
    protected $pkgHandle = 'foundation_sites';
    protected $appVersionRequired = '5.7.0.4';
    protected $pkgVersion = '0.2';

    public function getPackageName() {
        return t("Foundation for Sites");
    }
    
    public function getPackageDescription() {
        return t("Foundation for Sites");
    }

    public function on_start () {
        $pkg = $this; 

        $al = AssetList::getInstance();
        $al->register('css', 'foundation-icon-fonts', 'themes/foundation_sites/bower_components/foundation-icon-fonts/foundation-icons.css', array('local' => true, 'version' => '3.0'), $pkg);
        $al->register('javascript', 'modernizr', 'themes/foundation_sites/bower_components/modernizr/modernizr.js', array('local' => true, 'version' => '2.8.3'), $pkg);
        $al->register('javascript', 'fastclick', 'themes/foundation_sites/bower_components/fastclick/lib/fastclick.js', array('local' => true, 'version' => '1.0.3'), $pkg);
        $al->register('javascript', 'jquery2', 'themes/foundation_sites/bower_components/jquery/dist/jquery.min.js', array('local' => true, 'version' => '2.1.1'), $pkg);
        $al->register('javascript', 'foundation', 'themes/foundation_sites/bower_components/foundation/js/foundation.min.js', array('local' => true, 'version' => '5.4.6'), $pkg);
        $al->register('javascript', 'app', 'themes/foundation_sites/js/app.js', array('local' => true, 'version' => '1.0'), $pkg);
    }

    public function install() {
        $pkg = parent::install();
        $this->installThemes($pkg);
        $this->installPageTemplates($pkg);
        $this->installPageTypes($pkg);
        $this->installBlocks($pkg);
        $this->installFileAttributes($pkg);
        $this->installResponsiveImageThumbnails($pkg);
        $this->installClearingLightboxThumbnails($pkg);
        $this->installOrbitSliderThumbnails($pkg);
    }

    private function installThemes($pkg) {
        PageTheme::add('foundation_sites', $pkg);
    }

    private function installPageTemplates($pkg) {
        if (!PageTemplate::getByHandle('full')) {
            PageTemplate::add('full', t('Full'), 'full.png', $pkg);
        }

        if (!PageTemplate::getByHandle('left_sidebar')) {
            PageTemplate::add('left_sidebar', t('Left Sidebar'), 'left_sidebar.png', $pkg);
        }

        if (!PageTemplate::getByHandle('right_sidebar')) {
            PageTemplate::add('right_sidebar', t('Right Sidebar'), 'right_sidebar.png', $pkg);
        }
    }

    private function installPageTypes($pkg) {
        if (PageTemplate::getByHandle('full') && !PageType::getByHandle('full')) {
            $pageType = PageType::add(array(
                'handle'                => 'full',
                'name'                  => t('Full'),
                'defaultTemplate'       => PageTemplate::getByHandle('full'),
                'ptIsFrequentlyAdded'   => 1,
                'ptLaunchInComposer'    => 0
            ), $pkg);

            $target       = PublishTargetType::getByHandle('all');
            $targetConfig = $target->configurePageTypePublishTarget($pageType, array(
                'ptID' => $pageType->getPageTypeID()
            ));
 
            // Set configured publish target
            $pageType->setConfiguredPageTypePublishTargetObject($targetConfig);
        }

        if (PageTemplate::getByHandle('left_sidebar') && !PageType::getByHandle('left_sidebar')) {
            $pageType = PageType::add(array(
                'handle'                => 'left_sidebar',
                'name'                  => t('Left Sidebar'),
                'defaultTemplate'       => PageTemplate::getByHandle('left_sidebar'),
                'ptIsFrequentlyAdded'   => 1,
                'ptLaunchInComposer'    => 0
            ), $pkg);

            $target       = PublishTargetType::getByHandle('all');
            $targetConfig = $target->configurePageTypePublishTarget($pageType, array(
                'ptID' => $pageType->getPageTypeID()
            ));
 
            // Set configured publish target
            $pageType->setConfiguredPageTypePublishTargetObject($targetConfig);
        }

        if (PageTemplate::getByHandle('right_sidebar') && !PageType::getByHandle('right_sidebar')) {
            $pageType = PageType::add(array(
                'handle'                => 'right_sidebar',
                'name'                  => t('Right Sidebar'),
                'defaultTemplate'       => PageTemplate::getByHandle('right_sidebar'),
                'ptIsFrequentlyAdded'   => 1,
                'ptLaunchInComposer'    => 0
            ), $pkg);

            $target       = PublishTargetType::getByHandle('all');
            $targetConfig = $target->configurePageTypePublishTarget($pageType, array(
                'ptID' => $pageType->getPageTypeID()
            ));
 
            // Set configured publish target
            $pageType->setConfiguredPageTypePublishTargetObject($targetConfig);
        }
    }

    private function installBlocks($pkg) {
        
        if (!BlockType::getByHandle('v_card')) {
            BlockType::installBlockTypeFromPackage('v_card', $pkg);
        }

        if (!BlockType::getByHandle('clearing_lightbox')) {
            BlockType::installBlockTypeFromPackage('clearing_lightbox', $pkg);
        }
    }

    private function installFileAttributes($pkg) {

        $fakc = Category::getByHandle('file');
        
        // Multiple means an attribute can be in more than one set, but you 
        // can't choose what set they show up in for the gui
        // $fakc->setAllowAttributeSets(AttributeKeyCategory::ASET_ALLOW_MULTIPLE);
        // $fakc->setAllowAttributeSets(AttributeKeyCategory::ASET_ALLOW_NONE);
        $fakc->setAllowAttributeSets(Category::ASET_ALLOW_SINGLE);
        $fas = $fakc->addSet('foundation_sites', 
                             t('Foundation for Sites'), $pkg);
        
        //add boolean attributes
        $bp_boolean = FileKey::getByHandle('bp_boolean');
           if (!$bp_boolean instanceof FileKey) {
                   $bp_boolean = FileKey::add('boolean', array(
                                     'akHandle' => 'is_featured',
                                     'akName' => t('Is Featured'),
                                     'akIsSearchable' => true,
                                     'akIsSearchableIndexed' => true), $pkg)->setAttributeSet($fas);
           }

        //add text attributes
        $bp_text = FileKey::getByHandle('bp_text');
           if (!$bp_text instanceof FileKey) {
                   $bp_text = FileKey::add('text', array(
                                     'akHandle' => 'url',
                                     'akName' => t('URL'),
                                     'akIsSearchable' => true,
                                     'akIsSearchableIndexed' => true), $pkg)->setAttributeSet($fas);
           }
    }

    private function installResponsiveImageThumbnails() {
        $type = ThumbnailType::getByHandle('small');
        if (!$type instanceof ThumbnailType) {
            $type = new ThumbnailType();
            $type->setWidth(740);
            $type->setName('Small image');
            $type->setHandle('small');
            $type->save();
        }

        $type = ThumbnailType::getByHandle('medium');
        if (!$type instanceof ThumbnailType) {
            $type = new ThumbnailType();
            $type->setWidth(1000);
            $type->setName('Medium image');
            $type->setHandle('medium');
            $type->save();
        }
    }

    private function installClearingLightboxThumbnails() {
        $type = ThumbnailType::getByHandle('clearing_lightbox');
        if (!$type instanceof ThumbnailType) {
            $type = new ThumbnailType();
            $type->setWidth(180);
            $type->setHeight(180);
            $type->setName('Clearing Lightbox');
            $type->setHandle('clearing_lightbox');
            $type->save();
        }
        
    }

        private function installOrbitSliderThumbnails() {
        $type = ThumbnailType::getByHandle('orbit_slider');
        if (!$type instanceof ThumbnailType) {
            $type = new ThumbnailType();
            $type->setWidth(1000);
            $type->setHeight(400);
            $type->setName('Orbit Slider');
            $type->setHandle('orbit_slider');
            $type->save();
        }
        
    }

}
