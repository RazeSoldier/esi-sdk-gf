<?php
/**
 * This program is free software; you can redistribute it and/or modify
 * it under the terms of the GNU General Public License as published by
 * the Free Software Foundation; either version 2 of the License, or
 * (at your option) any later version.
 *
 * This program is distributed in the hope that it will be useful,
 * but WITHOUT ANY WARRANTY; without even the implied warranty of
 * MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE. See the
 * GNU General Public License for more details.
 *
 * You should have received a copy of the GNU General Public License along
 * with this program; if not, write to the Free Software Foundation, Inc.,
 * 51 Franklin Street, Fifth Floor, Boston, MA 02110-1301, USA.
 * http://www.gnu.org/copyleft/gpl.html
 *
 * @file
 */

namespace RazeSoldier\SerenityEsi\Api\Contract;

/**
 * 获得一个合同内的物品列表
 * <pre>
 * Lists items of a particular contract
 * Route: /v1/corporations/{corporation_id}/contracts/{contract_id}/items/
 * Cached for up to 3600 seconds
 * </pre>
 * @package RazeSoldier\SerenityEsi\Api\Contract
 * @method ContractItem[] get()
 */

use RazeSoldier\SerenityEsi\Api\AuthEsiBase;
use RazeSoldier\SerenityEsi\Model\Contract\ContractItem;

class CorporationContractItems extends AuthEsiBase
{
    protected string $endpoint = 'corporations/{corporation_id}/contracts/{contract_id}/items';

    public static function latest(int $corporationId, int $contractId): self
    {
        return self::v1($corporationId, $contractId);
    }

    public static function v1(int $corporationId, int $contractId): self
    {
        $api = new self();
        $api->version = 'v1';
        $api->paramMap['corporation_id'] = $corporationId;
        $api->paramMap['contract_id'] = $contractId;
        return $api;
    }

    /**
     * @inheritDoc
     */
    public function getScope(): string
    {
        return 'esi-contracts.read_corporation_contracts.v1';
    }

    /**
     * @inheritDoc
     */
    protected function getModelClassName(): ?string
    {
        return ContractItem::class;
    }
}
