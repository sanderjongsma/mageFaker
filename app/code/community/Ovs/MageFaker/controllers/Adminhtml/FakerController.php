<?php
/**
 * Class Ovs_MageFaker_Adminhtml_FakerController
 *
 * Main controller
 */
class Ovs_MageFaker_Adminhtml_FakerController extends Mage_Adminhtml_Controller_Action{

    //protected $_publicActions = array('index');

    /**
     * render main layout
     */
    public function indexAction(){

        $this->loadLayout();

        $this->_title('Faker data');
        $this->_setActiveMenu('system');

        $this->renderLayout();
    }

    /**
     * Process
     */
    public function saveAction(){

        $model = Mage::getModel('ovs_magefaker/faker');

        if($model->insertProducts($this->getRequest()->getParam('products'))){
            Mage::getSingleton('adminhtml/session')->addSuccess($this->getRequest()->getParam('products') . ' ' . $this->__('Product(s) inserted'));
            $this->_redirectReferer();
        }
        else{
            Mage::getSingleton('adminhtml/session')->addError($this->__('An error occurred while inserting'));
            $this->_redirectReferer();
        }

    }
}