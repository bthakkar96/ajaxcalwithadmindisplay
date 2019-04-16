<?php

namespace Ajaxphtml\Controllerphtml\Setup;

use Magento\Framework\Setup\UpgradeSchemaInterface;
use Magento\Framework\Setup\ModuleContextInterface;
use Magento\Framework\Setup\SchemaSetupInterface;

class UpgradeSchema implements UpgradeSchemaInterface
{

    /**
     * {@inheritdoc}
     */
    public function upgrade(
        SchemaSetupInterface $setup,
        ModuleContextInterface $context
    ) {
        $installer = $setup;

        $installer->startSetup();
       // if (version_compare($context->getVersion(), "3.0.0", "<")) {
        //Your upgrade script
      //  }
        if (version_compare($context->getVersion(), '3.0.0', '<')) {
          $installer->getConnection()->addColumn(
                $installer->getTable('ajaxphtml_controllerphtml_data'),
                'areacal',
                [
                    'type' => \Magento\Framework\DB\Ddl\Table::TYPE_INTEGER,
                    'length' => 10,
                    'nullable' => true,
                    'comment' => 'areacal'
                ]
            );
        }
        if (version_compare($context->getVersion(), '3.0.1', '<')) {
          $installer->getConnection()->addColumn(
                $installer->getTable('ajaxphtml_controllerphtml_data'),
                'areacal',
                [
                    'type' => \Magento\Framework\DB\Ddl\Table::TYPE_TEXT,
                    'length' => 255,
                    'nullable' => true,
                    'comment' => 'areacal'
                ]
            );
        }
        $installer->endSetup();
    }
}