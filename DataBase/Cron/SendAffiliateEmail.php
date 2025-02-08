<?php

namespace Shezo\DataBase\Cron;

use Psr\Log\LoggerInterface;
use Magento\Framework\App\ResourceConnection;
use Magento\Framework\Mail\Template\TransportBuilder;
use Magento\Store\Model\StoreManagerInterface;

class SendAffiliateEmail
{
    protected $logger;
    protected $resource;
    protected $transportBuilder;
    protected $storeManager;

    public function __construct(
        LoggerInterface $logger,
        ResourceConnection $resource,
        TransportBuilder $transportBuilder,
        StoreManagerInterface $storeManager
    ) {
        $this->logger = $logger;
        $this->resource = $resource;
        $this->transportBuilder = $transportBuilder;
        $this->storeManager = $storeManager;
    }

    public function execute()
    {
        $this->logger->info('Shezo Affiliate Email Cron Started.');

        // Get database connection
        $connection = $this->resource->getConnection();
        $tableName = $this->resource->getTableName('shezo_affiliate_members');

        // Fetch customers with status = 1
        $query = "SELECT * FROM $tableName WHERE status = 1";
        $customers = $connection->fetchAll($query);

        if (empty($customers)) {
            $this->logger->info('No active affiliate members found.');
            return;
        }

        foreach ($customers as $customer) {
            $this->sendEmail($customer);
        }

        $this->logger->info('Shezo Affiliate Email Cron Completed.');
    }

    private function sendEmail($customer)
    {
        try {
            $store = $this->storeManager->getStore();
            $transport = $this->transportBuilder
                ->setTemplateIdentifier('shezo_affiliate_email_template') // Email template identifier
                ->setTemplateOptions([
                    'area' => \Magento\Framework\App\Area::AREA_FRONTEND,
                    'store' => $store->getId()
                ])
                ->setTemplateVars([
                    'name' => $customer['name'],
                    'address' => $customer['address']
                ])
                ->setFrom(['email' => 'admin@example.com', 'name' => 'Admin'])
                ->addTo('customer@example.com', $customer['name']) // Replace with the actual customer email
                ->getTransport();

            $transport->sendMessage();
            $this->logger->info('Email sent to: ' . $customer['name']);
        } catch (\Exception $e) {
            $this->logger->error('Error sending email: ' . $e->getMessage());
        }
    }
}
