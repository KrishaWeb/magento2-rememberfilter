<?php
/**
 * @author Krishaweb Team
 * @package Krishaweb_AdvanceFilter
 */
     
namespace Krishaweb\AdvanceFilter\Model\Rewrite\Layer\Filter;

class Item extends \Magento\Catalog\Model\Layer\Filter\Item
{
    public function getUrl()
    {   
        $query = [
            $this->getFilter()->getRequestVar() => $this->getValue(),
            // exclude current page from urls
            $this->_htmlPagerBlock->getPageVarName() => null,
            'remove_size' => null,
        ];
        return $this->_url->getUrl('*/*', ['_current' => true, '_use_rewrite' => true, '_query' => $query]);
    }

    /**
     * Get url for remove item from filter
     *
     * @return string
     */
    public function getRemoveUrl()
    {

        if($this->getFilter()->getRequestVar() == 'size'){
            $query = [
                $this->getFilter()->getRequestVar() => $this->getFilter()->getResetValue(),
                'remove_size' => true
            ];
        }else{
            $query = [
            $this->getFilter()->getRequestVar() => $this->getFilter()->getResetValue(),
            ];
        }
        
        $params['_current'] = true;
        $params['_use_rewrite'] = true;
        $params['_query'] = $query;
        $params['_escape'] = true;
        return $this->_url->getUrl('*/*/*', $params);
    }
    /**
     * Get url for "clear" link
     *
     * @return false|string
     */
    public function getClearLinkUrl()
    {
        $clearLinkText = $this->getFilter()->getClearLinkText();
        if (!$clearLinkText) {
            return false;
        }
        
        $urlParams = [
            '_current' => true,
            '_use_rewrite' => true,
            '_query' => [$this->getFilter()->getRequestVar() => null, 'remove_size' => true],
            '_escape' => true,
        ];
        return $this->_url->getUrl('*/*/*', $urlParams);
    }
}