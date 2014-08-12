<?php
/**
 * aheadWorks Co.
 *
 * NOTICE OF LICENSE
 *
 * This source file is subject to the EULA
 * that is bundled with this package in the file LICENSE.txt.
 * It is also available through the world-wide-web at this URL:
 * http://ecommerce.aheadworks.com/AW-LICENSE-COMMUNITY.txt
 * 
 * =================================================================
 *                 MAGENTO EDITION USAGE NOTICE
 * =================================================================
 * This package designed for Magento COMMUNITY edition
 * aheadWorks does not guarantee correct work of this extension
 * on any other Magento edition except Magento COMMUNITY edition.
 * aheadWorks does not provide extension support in case of
 * incorrect edition usage.
 * =================================================================
 *
 * @category   AW
 * @package    AW_AdvancedReviews
 * @copyright  Copyright (c) 2010-2011 aheadWorks Co. (http://www.aheadworks.com)
 * @license    http://ecommerce.aheadworks.com/AW-LICENSE-COMMUNITY.txt
 */class AW_AdvancedReviews_Block_Product_Form extends Mage_Review_Block_Form
{
    protected function _construct()
    {
        parent::_construct();
        $this->setTemplate('advancedreviews/review/form.phtml');
    }

    public function renderView()
    {
        $this->setTemplate('advancedreviews/review/form.phtml');
        return parent::renderView();
    }

    public function isNeedEmailField(){
        if(!Mage::helper('advancedreviews')->isUserLogged() && Mage::helper('advancedreviews/hdu')->isHDUActive() && Mage::helper('advancedreviews/hdu')->isHDUEnabled())
            return true;
        else
            return false;
    }

}