<?php declare(strict_types=1);
/**
 * (c) shopware AG <info@shopware.com>
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace Swag\PayPal\Setting\Service;

use Swag\PayPal\Setting\Exception\PayPalSettingsNotFoundException;
use Swag\PayPal\Setting\SwagPayPalSettingGeneralStruct;

interface SettingsServiceInterface
{
    /**
     * @throws PayPalSettingsNotFoundException
     */
    public function getSettings(?string $salesChannelId = null): SwagPayPalSettingGeneralStruct;

    public function updateSettings(array $settings, ?string $salesChannelId = null): void;
}
