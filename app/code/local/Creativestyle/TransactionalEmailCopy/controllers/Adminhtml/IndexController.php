<?php

class Creativestyle_TransactionalEmailCopy_Adminhtml_IndexController extends Mage_Adminhtml_Controller_Action{

    /*
     * Controller entry point for copying template models.
     */
    public function copyAction(){
        $templates = $this->getRequest()->getPost('email_template');
        $prefix = $this->getRequest()->getPost('prefix');
        $suffix = $this->getRequest()->getPost('suffix');

        foreach($templates as $templateToCopy){
            $templateModel = Mage::getModel('core/email_template')->load($templateToCopy);

            $newTemplate = $templateModel->setId(NULL);
            $newTemplate->setAddedAt(Mage::getModel('core/date')->gmtDate());
            $newTemplate->setModifiedAt(Mage::getModel('core/date')->gmtDate());
            $newTemplate->setTemplateCode($prefix.' '.$templateModel->getTemplateCode().' '.$suffix);
            try{
                $newTemplate->save();
                Mage::getSingleton('adminhtml/session')->addSuccess(Mage::helper('creativestyle_transactionalemailcopy')->__('Copied template: %s', $templateModel->getTemplateCode()));
            } catch(Exception $e){
                Mage::getSingleton('adminhtml/session')->addError(Mage::helper('creativestyle_transactionalemailcopy')->__('Failed to copy: %s', $e->getMessage()));
            }
        }

        $this->_redirectReferer();
    }

    /*
     * Controller entry point for deleting template models.
     */
    public function deleteAction(){
        $templates = $this->getRequest()->getPost('email_template');
        foreach($templates as $templateToCopy){
            $templateModel = Mage::getModel('core/email_template')->load($templateToCopy);
            $templateCode = $templateModel->getTemplateCode();
            try{
                $templateModel->delete();
                Mage::getSingleton('adminhtml/session')->addSuccess(Mage::helper('creativestyle_transactionalemailcopy')->__('Successfully deleted: %s', $templateCode));
            } catch (Exception $e){
                Mage::getSingleton('adminhtml/session')->addError(Mage::helper('creativestyle_transactionalemailcopy')->__('Failed to delete: %s', $e->getMessage()));
            }
        }

        $this->_redirectReferer();
    }
}