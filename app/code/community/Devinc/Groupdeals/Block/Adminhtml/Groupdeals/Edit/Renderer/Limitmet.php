<?php
/**
 * Magento
 *
 * NOTICE OF LICENSE
 *
 * This source file is subject to the Open Software License (OSL 3.0)
 * that is bundled with this package in the file LICENSE.txt.
 * It is also available through the world-wide-web at this URL:
 * http://opensource.org/licenses/osl-3.0.php
 * If you did not receive a copy of the license and are unable to
 * obtain it through the world-wide-web, please send an email
 * to license@magentocommerce.com so we can send you a copy immediately.
 *
 * DISCLAIMER
 *
 * Do not edit or add to this file if you wish to upgrade Magento to newer
 * versions in the future. If you wish to customize Magento for your
 * needs please refer to http://www.magentocommerce.com for more information.
 *
 * @category    Mage
 * @package     Mage_Adminhtml
 * @copyright   Copyright (c) 2010 Magento Inc. (http://www.magentocommerce.com)
 * @license     http://opensource.org/licenses/osl-3.0.php  Open Software License (OSL 3.0)
 */


/**
 * Adminhtml AdminNotification Severity Renderer
 *
 * @category   Mage
 * @package    Mage_Adminhtml
 * @author      Magento Core Team <core@magentocommerce.com>
 */
class Devinc_Groupdeals_Block_Adminhtml_Groupdeals_Edit_Renderer_Limitmet extends Mage_Adminhtml_Block_Widget_Grid_Column_Renderer_Abstract
{
    /**
     * Renders grid column
     *
     * @param   Varien_Object $row
     * @return  string
     */
	public function render(Varien_Object $row)
    {	
		$subscriber_id = $row->getData($this->getColumn()->getIndex());
		$subscriber = Mage::getModel('groupdeals/subscribers')->load($subscriber_id);	
		$storeId = $subscriber->getStoreId();	
		$website_id = Mage::getModel('core/store')->load($storeId)->getWebsiteId();
		$notification = Mage::getModel('groupdeals/notifications')->getCollection()->addFieldToFilter('type', 'limit_met')->addFieldToFilter('groupdeals_id', $this->getRequest()->getParam('groupdeals_id'))->addFieldToFilter('website_id', $website_id)->setOrder('notification_id', 'DESC')->getFirstItem();
		if ($notification) {
			$unnotified_subscriber_ids = explode(',',$notification->getUnnotifiedSubscriberIds());
			$notified_subscriber_ids = explode(',',$notification->getNotifiedSubscriberIds());
			
			if (in_array($subscriber_id, $unnotified_subscriber_ids)) {
				return 'Pending';
			} elseif (in_array($subscriber_id, $notified_subscriber_ids)) {
				return 'Sent';
			} else {
				return 'Not Sent';		
			}
		} else {
			return 'Not Sent';				
		}
    }
	 
   
}
