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
 */class AW_AdvancedReviews_Block_Footer extends Mage_Core_Block_Template
{
    protected $_reviewId;

    public function setReviewId($reviewId)
    {
        $this->_reviewId = $reviewId;
        return $this;
    }

    public function getReviewId()
    {
        return $this->_reviewId;
    }

    public function canShowAbuse()
    {
        /*
        if(Mage::helper('advancedreviews')->isMarkedAbuse($this->_reviewId))
            return false;
        */
        if( Mage::helper('advancedreviews')->confAllowOnlyLoggedToAbuse() )
        {
            return (Mage::helper('advancedreviews')->isUserLogged()
                    && Mage::helper('advancedreviews')->confShowReportAbuse()
                    && !( Mage::helper('advancedreviews')->isAbuseRegistered($this->_reviewId) ) );
        }
        else
        {
            return (Mage::helper('advancedreviews')->confShowReportAbuse()
                    && !( Mage::helper('advancedreviews')->isAbuseRegistered($this->_reviewId) ) );            
        }
    }

    public function canShowSocial()
    {
        return Mage::helper('advancedreviews')->confShowSocialShare();
    }

    public function canShowHelpfulness()
    {
        return Mage::helper('advancedreviews')->confShowHelpfulness();
    }

}