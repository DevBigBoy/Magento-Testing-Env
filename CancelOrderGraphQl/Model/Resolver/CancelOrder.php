<?php

namespace Shezo\CancelOrderGraphQl\Model\Resolver;

use Magento\Framework\Exception\LocalizedException;
use Magento\Sales\Api\OrderRepositoryInterface;
use Magento\Sales\Model\Order;
use Magento\Framework\GraphQl\Config\Element\Field;
use Magento\Framework\GraphQl\Query\ResolverInterface;
use Magento\Framework\GraphQl\Query\Resolver\ContextInterface;
use Magento\Framework\GraphQl\Schema\Type\ResolveInfo;
use Magento\Framework\GraphQl\Exception\GraphQlAuthorizationException;
use Magento\Framework\GraphQl\Exception\GraphQlInputException;
use Shezo\CancelOrder\Model\CancelOrderService;

class CancelOrder implements ResolverInterface
{
    protected $orderRepository;
    protected $cancelOrderService;

    public function __construct(
        OrderRepositoryInterface $orderRepository,
        CancelOrderService $cancelOrderService
    ) {
        $this->orderRepository = $orderRepository;
        $this->cancelOrderService = $cancelOrderService;
    }

    /**
     * GraphQL Resolver for canceling orders.
     *
     * @param Field $field
     * @param ContextInterface $context
     * @param ResolveInfo $info
     * @param array|null $value
     * @param array|null $args
     * @return array
     * @throws GraphQlAuthorizationException
     * @throws GraphQlInputException
     * @throws LocalizedException
     */
    public function resolve(
        Field $field,
              $context,
        ResolveInfo $info,
        array $value = null,
        array $args = null
    )
    {
        // Ensure the user is logged in
        if (!$context->getExtensionAttributes()->getIsCustomer()) {
            throw new GraphQlAuthorizationException(__('You must be logged in to cancel an order.'));
        }

        $customerId = $context->getUserId();

        // Validate order ID
        if (!isset($args['order_id']) || !is_numeric($args['order_id'])) {
            throw new GraphQlInputException(__('Invalid order ID.'));
        }

        $orderId = (int) $args['order_id'];
        $comment = $args['comment'] ?? '';

        // Load the order
        try {
            $order = $this->orderRepository->get($orderId);
        } catch (\Exception $e) {
            throw new GraphQlInputException(__('Order not found.'));
        }

        // Ensure the order belongs to the logged-in customer
        if ($order->getCustomerId() !== (int) $customerId) {
            throw new GraphQlAuthorizationException(__('You do not have permission to cancel this order.'));
        }

        // Attempt to cancel the order
        try {
            $this->cancelOrderService->execute($orderId, $comment);
            return ['success' => true, 'message' => __('Order canceled successfully.')];
        } catch (LocalizedException $e) {
            return ['success' => false, 'message' => $e->getMessage()];
        } catch (\Exception $e) {
            return ['success' => false, 'message' => __('An error occurred while canceling the order.')];
        }
    }
}
