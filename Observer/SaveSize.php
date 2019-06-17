<?php

/**
 * @author Krishaweb Team
 * @package Krishaweb_AdvanceFilter
 */
  
namespace Krishaweb\AdvanceFilter\Observer;
 
use Magento\Framework\Event\Observer;
use Magento\Framework\Event\ObserverInterface;
use Magento\Framework\Stdlib\CookieManagerInterface;
use Magento\Framework\Stdlib\Cookie\CookieMetadataFactory;

class SaveSize implements ObserverInterface
{   

    protected $cookieManager;
 
    protected $cookieMetadataFactory;

    public function __construct(
        \Magento\Framework\App\RequestInterface $request,
        CookieManagerInterface $cookieManager,
        CookieMetadataFactory $cookieMetadataFactory
    )
    {
        $this->_request = $request;
        $this->cookieManager = $cookieManager;
        $this->cookieMetadataFactory = $cookieMetadataFactory;
    }
    public function execute(Observer $observer)
    {
        
        $request = $this->_request;
        $handleName  = $request->getFullActionName();
        $params = $request->getParams();
        
        // check if remove size is triggered
        if(isset($params['remove_size'])){
            $metadata = $this->cookieMetadataFactory
                ->createPublicCookieMetadata()
                ->setPath('/')
                ->setDuration(time()-3600);
            $this->cookieManager
                ->setPublicCookie('size', "", $metadata);

            $size = array('size'=>"");
            $request->setParams($size); 
        }else{
            // if the user size is already stored
            $cookieValue = $this->cookieManager->getCookie('size');
            if(isset($cookieValue)){
                $size = array('size'=>$cookieValue);
                $request->setParams($size); 
            }else{
                if($handleName == 'catalog_category_view'){
                    if(isset($params['size'])){
                        $metadata = $this->cookieMetadataFactory
                            ->createPublicCookieMetadata()
                            ->setPath('/')
                            ->setDuration(time()+30*24*60*60);
                        $this->cookieManager
                            ->setPublicCookie('size', $params['size'], $metadata);
                    }
                }
            }    
        }
    }
}