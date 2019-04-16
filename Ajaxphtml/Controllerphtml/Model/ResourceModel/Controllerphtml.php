<?php

namespace Ajaxphtml\Controllerphtml\Model\ResourceModel;
use Magento\Framework\Model\ResourceModel\Db\AbstractDb;
class Controllerphtml extends AbstractDb
{
    /**
     * Initialize resource model
     *
     * @return void
     */
    protected function _construct()
    {
        $this->_init('ajaxphtml_controllerphtml_data', 'post_id');
    }
}