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

use RazeSoldier\SerenityEsi\Api\AuthEsiBase;
use RazeSoldier\SerenityEsi\Api\Pageable;
use RazeSoldier\SerenityEsi\Api\PageableImp;

/**
 * 获得军团可用的合同列表
 * 返回军团是发起人、接受者或者指定者的合同列表。
 * 只会返回最近30天和状态是“正在进行”的合同
 * <pre>
 * Returns contracts available to a corporation, only if the corporation is issuer, acceptor or assignee.
 * Only returns contracts no older than 30 days, or if the status is "in_progress".
 * Route: /v1/corporations/{corporation_id}/contracts/
 * Cached for up to 300 seconds
 * </pre>
 * @package RazeSoldier\SerenityEsi\Api\Contract
 * @method \RazeSoldier\SerenityEsi\Model\Contract\CorporationContract[]|null get()
 */
class CorporationContract extends AuthEsiBase implements Pageable
{
    use PageableImp;

    protected string $endpoint = 'corporations/{corporation_id}/contracts';

    public static function v1(int $corporationId): self
    {
        $api = new self();
        $api->version = 'v1';
        $api->paramMap['corporation_id'] = $corporationId;
        return $api;
    }

    public static function latest(int $corporationId)
    {
        return self::v1($corporationId);
    }

    /**
     * @inheritDoc
     */
    protected function getModelClassName(): ?string
    {
        return \RazeSoldier\SerenityEsi\Model\Contract\CorporationContract::class;
    }

    /**
     * @inheritDoc
     */
    public function getScope(): string
    {
        return 'esi-contracts.read_corporation_contracts.v1';
    }
}
