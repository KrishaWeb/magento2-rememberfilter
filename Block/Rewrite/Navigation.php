<?php
/**
 * @author Krishaweb Team
 * @package Krishaweb_AdvanceFilter
 */

namespace Krishaweb\AdvanceFilter\Block\Rewrite;

class Navigation extends \Magento\LayeredNavigation\Block\Navigation
{
	/**
     * Remove block from cache
     *
     */
    protected function _construct()
    {
        $this->addData(array('cache_lifetime' => false));
        $this->addCacheTag(array(
            Mage_Core_Model_Store::CACHE_TAG,
            Mage_Cms_Model_Block::CACHE_TAG
        ));
    }
}