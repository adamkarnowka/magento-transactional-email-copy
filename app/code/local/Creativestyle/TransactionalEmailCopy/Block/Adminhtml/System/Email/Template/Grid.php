<?php
/**
 * User: Adam Karnowka <adam.karnowka@creativestyle.pl>
 * Date: 15.01.15 Time: 19:09
 */ 
class Creativestyle_TransactionalEmailCopy_Block_Adminhtml_System_Email_Template_Grid extends Mage_Adminhtml_Block_System_Email_Template_Grid {

    protected function _prepareMassaction()
    {
        $this->setMassactionIdField('template_id');
        $this->getMassactionBlock()->setFormFieldName('email_template');

        $this->getMassactionBlock()->addItem('copy', array(
                'label'=> Mage::helper('creativestyle_transactionalemailcopy')->__('Copy template(s)'),
                'url'  => $this->getUrl('transactionalcopy/adminhtml_index/copy'),
                'confirm' => Mage::helper('creativestyle_transactionalemailcopy')->__('This action will make 1:1 copy of selected e-mail templates with provided prefix and suffix in template name (code). Are you sure?'),
                'additional' => array(
                    'prefix' => array(
                        'name' => 'prefix',
                        'type' => 'text',
                        'label' => Mage::helper('creativestyle_transactionalemailcopy')->__('Prefix:').' ',
                        'title' => Mage::helper('creativestyle_transactionalemailcopy')->__('Provide text which will be added to template code from the left side.')
                    ),
                    'suffix' => array(
                        'name' => 'suffix',
                        'type' => 'text',
                        'label' => Mage::helper('creativestyle_transactionalemailcopy')->__('Suffix:').' ',
                        'title' => Mage::helper('creativestyle_transactionalemailcopy')->__('Provide text which will be added to template code from the right side.')
                    )
                )
            ));

        $this->getMassactionBlock()->addItem('delete', array(
                'label'=> Mage::helper('creativestyle_transactionalemailcopy')->__('Delete template(s)'),
                'url'  => $this->getUrl('transactionalcopy/adminhtml_index/delete', array('_current'=>true)),
                'confirm' => Mage::helper('creativestyle_transactionalemailcopy')->__('Selected template(s) will be deleted permanently! Are you sure?')
        ));

        Mage::dispatchEvent('adminhtml_system_email_email_template_prepare_massaction', array('block' => $this));
        return $this;
    }
}