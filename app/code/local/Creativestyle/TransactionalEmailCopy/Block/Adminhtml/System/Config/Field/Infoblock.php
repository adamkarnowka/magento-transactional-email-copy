<?php
/**
 * User: Adam Karnowka <adam.karnowka@creativestyle.pl>
 * Date: 15.01.15 Time: 19:09
 */

/* @package Creativestyle_TransactionalEmailCopy */

class Creativestyle_TransactionalEmailCopy_Block_Adminhtml_System_Config_Field_Infoblock  extends  Mage_Adminhtml_Block_Abstract  implements  Varien_Data_Form_Element_Renderer_Interface
{
    public function render(Varien_Data_Form_Element_Abstract $element){
        return Mage::app()->getLayout()->createBlock('Mage_Core_Block_Template', 'Emailcopy_Infoblock', array('template' => 'creativestyle_transactionalemailcopy/infoblock.phtml'))->toHtml();
    }
}