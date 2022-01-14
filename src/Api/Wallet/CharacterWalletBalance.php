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

namespace RazeSoldier\SerenityEsi\Api\Wallet;

use RazeSoldier\SerenityEsi\Api\AuthEsiBase;

/**
 * 获得一个角色的钱包余额
 * <pre>
 * Returns a character’s wallet balance
 * Route: /v1/characters/{character_id}/wallet/
 * This route is cached for up to 120 seconds
 * </pre>
 * @package RazeSoldier\SerenityEsi\Api\Wallet
 * @method float get()
 */
class CharacterWalletBalance extends AuthEsiBase
{
    protected string $endpoint = 'characters/{character_id}/wallet';

    public static function v1(int $characterId)
    {
        $api = new self();
        $api->version = 'v1';
        $api->paramMap['character_id'] = $characterId;
        return $api;
    }

    public static function latest(int $characterId): self
    {
        return self::v1($characterId);
    }

    /**
     * @inheritDoc
     */
    public function getScope(): string
    {
        return 'esi-wallet.read_character_wallet.v1';
    }

    /**
     * @inheritDoc
     */
    protected function getModelClassName(): ?string
    {
        return null;
    }
}
