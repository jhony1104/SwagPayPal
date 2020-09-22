<?php declare(strict_types=1);
/*
 * (c) shopware AG <info@shopware.com>
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace Swag\PayPal\Pos\Api\Authentification\ApiKey;

use Swag\PayPal\Pos\Api\Common\PosStruct;

/**
 * JWT Header
 */
class Header extends PosStruct
{
    /**
     * Key ID
     *
     * @var string
     */
    private $kid;

    /**
     * Type
     *
     * @var string
     */
    private $typ;

    /**
     * Algorithm
     *
     * @var string
     */
    private $alg;

    protected function setKid(string $kid): void
    {
        $this->kid = $kid;
    }

    protected function setTyp(string $typ): void
    {
        $this->typ = $typ;
    }

    protected function setAlg(string $alg): void
    {
        $this->alg = $alg;
    }
}