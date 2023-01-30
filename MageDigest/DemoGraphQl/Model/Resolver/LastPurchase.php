<?php

namespace MageDigest\DemoGraphQl\Model\Resolver;

use Magento\Framework\GraphQl\Config\Element\Field;
use Magento\Framework\GraphQl\Exception\GraphQlInputException;
use Magento\Framework\GraphQl\Query\ResolverInterface;
use Magento\Framework\GraphQl\Schema\Type\ResolveInfo;
use Magento\Framework\Validator\EmailAddress as EmailValidator;
use MageDigest\DemoGraphQl\Model\Customer\Order as CustomerOrder;
use Magento\Framework\Exception\NoSuchEntityException;

/**
 * Class LastPurchase
 * @package MageDigest\DemoGraphQl\Model\Resolver
 */
class LastPurchase implements ResolverInterface
{
    /**
     * @var CustomerOrder $customerOrder
     */
    public $customerOrder;

    /**
     * @var EmailValidator $emailValidator
     */
    public $emailValidator;

    /**
     * LastPurchase constructor.
     * @param CustomerOrder $customerOrder
     * @param EmailValidator $emailValidator
     */
    public function __construct(
        CustomerOrder $customerOrder,
        EmailValidator $emailValidator
    )
    {
        $this->customerOrder = $customerOrder;
        $this->emailValidator = $emailValidator;
    }


    /**
     * @param Field $field
     * @param \Magento\Framework\GraphQl\Query\Resolver\ContextInterface $context
     * @param ResolveInfo $info
     * @param array|null $value
     * @param array|null $args
     * @return array|\Magento\Framework\GraphQl\Query\Resolver\Value|mixed
     * @throws GraphQlInputException
     */
    public function resolve(
        Field $field,
        $context,
        ResolveInfo $info,
        array $value = null,
        array $args = null
    )
    {

        $om = \Magento\Framework\App\ObjectManager::getInstance();
        $customerSession = $om->get('Magento\Customer\Model\Session');
//        $customerData = $customerSession->getCustomer()->getData(); //get all data of customerData
        $customerData = $customerSession->getCustomer()->getEmail();//get Email of customer
        var_dump($customerData);
        var_dump($args['email']);
//        $latestOrderItems = array();
        if (empty($args['email'])) {
            throw new GraphQlInputException(__('Email must be specified'));
        }

        if (!$this->emailValidator->isValid($args['email'])) {
            throw new GraphQlInputException(__('Email must be valid'));
        }

        if(($args['email']) !== ($customerData)) {
            try {
                $latestOrderItems = $this->customerOrder->getLatestOrder($args["email"]);
            } catch (NoSuchEntityException $exception) {
                throw new NoSuchEntityException(__($exception->getMessage()));
            }
//        $logger->info(var_dump($latestOrderItems));
            return $latestOrderItems[0];
        }
        else {
            throw new GraphQlInputException(__('Customer is not authorized to access details'));
        }

    }

}