<?php
/**
 * @author Krishaweb Team
 * @package Krishaweb_AdvanceFilter
 */
 
namespace Krishaweb\AdvanceFilter\Block\Rewrite\LayeredNavigation;

class RenderLayered extends \Magento\Swatches\Block\LayeredNavigation\RenderLayered
{
	public function buildUrl($attributeCode, $optionId)
    {
    	// change url for swatch
    	$query = [$attributeCode => $optionId,'remove_size' => null];
        return $this->_urlBuilder->getUrl('*/*/*', ['_current' => true, '_use_rewrite' => true, '_query' => $query]);
    }
}