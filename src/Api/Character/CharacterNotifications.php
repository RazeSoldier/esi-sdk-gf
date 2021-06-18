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

namespace RazeSoldier\SerenityEsi\Api\Character;

use RazeSoldier\SerenityEsi\Api\AuthEsiBase;
use RazeSoldier\SerenityEsi\Model\Character\CharacterNotification;

/**
 * 获得角色的通知
 * <pre>
 * Return character notifications
 *
 * Route: /v6/characters/{character_id}/notifications/
 * Cached for up 600 seconds
 * </pre>
 * @package RazeSoldier\SerenityEsi\Api\Character
 * @method CharacterNotification[]|null get()
 */
class CharacterNotifications extends AuthEsiBase
{
    protected string $endpoint = 'characters/{character_id}/notifications';

    public static function v6(int $characterId): self
    {
        $api = new self();
        $api->version = 'v6';
        $api->paramMap['character_id'] = $characterId;
        return $api;
    }

    public static function latest(int $characterId)
    {
        return self::v6($characterId);
    }

    public function getScope(): string
    {
        return 'esi-characters.read_notifications.v1';
    }

    protected function getModelClassName(): ?string
    {
        return CharacterNotification::class;
    }
}
