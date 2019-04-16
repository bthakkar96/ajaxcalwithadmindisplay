<?php

namespace Ajaxphtml\Controllerphtml\Model;
use Magento\Framework\Model\AbstractModel;

class Controllerphtml extends \Magento\Framework\Model\AbstractModel {

    protected function _construct() {
        $this->_init('Ajaxphtml\Controllerphtml\Model\ResourceModel\Controllerphtml');
    }
}