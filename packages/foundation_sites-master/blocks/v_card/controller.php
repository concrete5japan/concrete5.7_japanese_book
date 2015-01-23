<?php  
namespace Concrete\Package\FoundationSites\Block\VCard;

use \Concrete\Core\Block\BlockController;

class Controller extends BlockController {
    
    protected $btTable = 'btVCard';
    protected $btInterfaceWidth = "400";
    protected $btInterfaceHeight = "500";
    protected $btWrapperClass = 'ccm-ui';
    
    public function getBlockTypeDescription()
    {
        return t("Displays microformat-friendly contact information.");
    }

    public function getBlockTypeName()
    {
        return t("V-Card");
    }
}
