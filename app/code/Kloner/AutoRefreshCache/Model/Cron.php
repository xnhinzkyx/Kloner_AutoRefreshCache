<?php
namespace Kloner\AutoRefreshCache\Model;
use Magento\Backend\App\Action\Context;
use Magento\Backend\App\Action;
use Magento\Framework\App\Cache\Manager as CacheManager;
use Magento\Framework\App\Cache\TypeListInterface as CacheTypeListInterface;
class Cron
{
    public function __construct(\Magento\Framework\Model\Context $context,\Magento\Framework\App\Cache\TypeListInterface $cacheTypeList,\Magento\Framework\App\Cache\Frontend\Pool $cacheFrontendPool)
    {
        $this->_cacheTypeList = $cacheTypeList;
        $this->_cacheFrontendPool = $cacheFrontendPool;
    }
  
    public function myCronFunction()
    {
        $cache_types = array('config','layout','block_html','collections','reflection','db_ddl','eav','config_integration','config_integration_api','full_page','translate','config_webservice','amasty_shopby','customer_notification');
        foreach ($cache_types as $type) {
            $this->_cacheTypeList->cleanType($type);
        }
        foreach ($this->_cacheFrontendPool as $cache_clean_flush) {
            $cache_clean_flush->getBackend()->clean();
        }
    }
}
