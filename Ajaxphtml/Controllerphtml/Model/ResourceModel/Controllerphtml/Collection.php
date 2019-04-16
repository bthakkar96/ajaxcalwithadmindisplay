<?php

namespace Ajaxphtml\Controllerphtml\Model\ResourceModel\Controllerphtml;

use Magento\Framework\Model\ResourceModel\Db\Collection\AbstractCollection;

class Collection extends AbstractCollection{
    protected function _construct()
    {
        $this->_init('Ajaxphtml\Controllerphtml\Model\Controllerphtml', 'Ajaxphtml\Controllerphtml\Model\ResourceModel\Controllerphtml');
    }
}
