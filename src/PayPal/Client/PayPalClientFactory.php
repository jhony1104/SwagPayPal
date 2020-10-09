<?php declare(strict_types=1);
/*
 * (c) shopware AG <info@shopware.com>
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace Swag\PayPal\PayPal\Client;

use Psr\Log\LoggerInterface;
use Swag\PayPal\PayPal\PartnerAttributionId;
use Swag\PayPal\PayPal\Resource\TokenResource;
use Swag\PayPal\Setting\Service\SettingsServiceInterface;

class PayPalClientFactory
{
    /**
     * @var TokenResource
     */
    private $tokenResource;

    /**
     * @var SettingsServiceInterface
     */
    private $settingsService;

    /**
     * @var LoggerInterface
     */
    private $logger;

    /**
     * @var PayPalClient|null
     */
    private $payPalClient;

    public function __construct(
        TokenResource $tokenResource,
        SettingsServiceInterface $settingsService,
        LoggerInterface $logger
    ) {
        $this->tokenResource = $tokenResource;
        $this->settingsService = $settingsService;
        $this->logger = $logger;
    }

    public function getPayPalClient(
        ?string $salesChannelId,
        string $partnerAttributionId = PartnerAttributionId::PAYPAL_CLASSIC
    ): PayPalClient {
        $settings = $this->settingsService->getSettings($salesChannelId);

        if ($this->payPalClient === null) {
            $this->payPalClient = new PayPalClient(
                $this->tokenResource,
                $settings,
                $this->logger,
                $partnerAttributionId
            );
        }

        return $this->payPalClient;
    }

    /**
     * @deprecated tag:v2.0.0 - Will be removed. Use PayPalClientFactory::getPayPalClient instead
     */
    public function createPaymentClient(
        ?string $salesChannelId,
        string $partnerAttributionId = PartnerAttributionId::PAYPAL_CLASSIC
    ): PayPalClient {
        $this->logger->error(
            \sprintf(
                '%s::%s is deprecated. Use %s::getPayPalClient instead',
                static::class,
                __METHOD__,
                static::class
            )
        );

        return $this->getPayPalClient($salesChannelId, $partnerAttributionId);
    }
}
