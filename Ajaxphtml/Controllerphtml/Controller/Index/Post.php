<?php
namespace Ajaxphtml\Controllerphtml\Controller\Index;
use Magento\Framework\App\Action\Context;
use Magento\Framework\View\Result\PageFactory;
use Magento\Framework\Controller\Result\JsonFactory;
use Ajaxphtml\Controllerphtml\Model\ControllerphtmlFactory;


class Post extends \Magento\Framework\App\Action\Action
{
     /**
     * @var Magento\Framework\View\Result\PageFactory
     */
    protected $_crud;

    protected $resultPageFactory;
    protected $resultJsonFactory; 
    /**
     * @param Context     $context
     * @param PageFactory $resultPageFactory
     */
    public function __construct(
        Context $context,
        ControllerphtmlFactory $crud,
        PageFactory $resultPageFactory,
        JsonFactory $resultJsonFactory
        )
    {
        $this->_crud = $crud;
        $this->resultPageFactory = $resultPageFactory;
        $this->resultJsonFactory = $resultJsonFactory; 
        return parent::__construct($context);
    }
    public function execute()
    {
        $height = $this->getRequest()->getParam('height');
        $weight = $this->getRequest()->getParam('weight');
        $areacal = $height * $weight;
        $data=array('height' => $height, 'weight' => $weight, 'areacal' => $areacal);
        //$data = $this->getRequest()->getParams();
        $cruddata = $this->_crud->create();
        $cruddata->setData($data);


       
        //$this->_cruddemo->create()->setData($data)->save();


        $cruddata->save();
        
        $areacal = $height*$weight;
        $result = $this->resultJsonFactory->create();
        $resultPage = $this->resultPageFactory->create();
        $block = $resultPage->getLayout()
                ->createBlock('Ajaxphtml\Controllerphtml\Block\Index\Index')
                ->setTemplate('Ajaxphtml_Controllerphtml::result.phtml')
                ->setData('height',$height)
                ->setData('weight',$weight)
                ->setData('areacal',$areacal)
                ->toHtml();
        $result->setData(['output' => $block]);
        return $result;
    } 
}