<?php

namespace Shezo\CancelOrder\Model;

use Shezo\CancelOrder\Api\CancelOrderServiceInterface;
use Magento\Sales\Api\OrderRepositoryInterface;
use Magento\Sales\Model\Order;
use Magento\Sales\Model\Service\CreditmemoService;
use Magento\Sales\Model\Order\CreditmemoFactory;
use Magento\Sales\Api\InvoiceRepositoryInterface;
use Magento\Sales\Api\CreditmemoRepositoryInterface;
use Magento\Sales\Model\Order\Payment\Transaction\Repository as TransactionRepository;
use Magento\Framework\Exception\LocalizedException;
use Psr\Log\LoggerInterface;

class CancelOrderService implements CancelOrderServiceInterface
{
    protected $orderRepository;
    protected $creditmemoService;
    protected $creditmemoFactory;
    protected $invoiceRepository;
    protected $creditmemoRepository;
    protected $transactionRepository;
    protected $logger;

    public function __construct(
        OrderRepositoryInterface $orderRepository,
        CreditmemoService $creditmemoService,
        CreditmemoFactory $creditmemoFactory,
        InvoiceRepositoryInterface $invoiceRepository,
        CreditmemoRepositoryInterface $creditmemoRepository,
        TransactionRepository $transactionRepository,
        LoggerInterface $logger
    ) {
        $this->orderRepository = $orderRepository;
        $this->creditmemoService = $creditmemoService;
        $this->creditmemoFactory = $creditmemoFactory;
        $this->invoiceRepository = $invoiceRepository;
        $this->creditmemoRepository = $creditmemoRepository;
        $this->transactionRepository = $transactionRepository;
        $this->logger = $logger;
    }

    /**
     * Cancel an order if it's pending or processing and refund if necessary.
     *
     * @param int $orderId
     * @param string|null $comment
     * @return bool
     * @throws LocalizedException
     */
    public function execute(int $orderId, ?string $comment = null): bool
    {
        // Load the order
        $order = $this->orderRepository->get($orderId);

        // Validate if the order can be canceled
        if (!$this->canCancel($order)) {
            throw new LocalizedException(__('The order cannot be canceled.'));
        }

        try {
            if ($this->hasInvoice($order)) {
                // Refund the order
                $this->refundOrder($order);
            }

            // Cancel the order
            $order->cancel();

            // Add a cancellation comment
            if ($comment) {
                $order->addCommentToStatusHistory(__('Order canceled: %1', $comment));
            }

            // Save the order
            $this->orderRepository->save($order);

            // Log the cancellation
            $this->logger->info(sprintf('Order ID %d has been canceled.', $orderId));

            return true;
        } catch (\Exception $e) {
            $this->logger->error(sprintf('Error canceling order ID %d: %s', $orderId, $e->getMessage()));
            throw new LocalizedException(__('An error occurred while canceling the order.'));
        }
    }

    /**
     * Check if an order can be canceled (only if status is 'pending' or 'processing').
     *
     * @param Order $order
     * @return bool
     */
    public function canCancel(Order $order): bool
    {
        $orderStatus = $order->getStatus();
        return in_array($orderStatus, [Order::STATE_NEW, Order::STATE_PROCESSING]);
    }

    /**
     * Check if an order has an invoice (meaning it was paid).
     *
     * @param Order $order
     * @return bool
     */
    public function hasInvoice(Order $order): bool
    {
        return $order->hasInvoices();
    }

    /**
     * Refund an invoiced order by creating a Credit Memo.
     *
     * @param Order $order
     * @throws LocalizedException
     */
    public function refundOrder(Order $order): void
    {
        foreach ($order->getInvoiceCollection() as $invoice) {
            if ($invoice->canRefund()) {
                // Create a credit memo
                $creditMemo = $this->creditmemoFactory->createByOrder($order);

                // Refund the payment
                $this->creditmemoService->refund($creditMemo);

                // Save the credit memo
                $this->creditmemoRepository->save($creditMemo);

                // Log refund
                $this->logger->info(sprintf('Order ID %d: Payment refunded.', $order->getId()));

                return;
            }
        }

        throw new LocalizedException(__('Unable to refund the order.'));
    }
}
