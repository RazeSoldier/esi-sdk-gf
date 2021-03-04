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

namespace RazeSoldier\SerenityEsi\Model\Location;

use RazeSoldier\SerenityEsi\Api\Location\CharacterOnline;

/**
 * 角色的在线状态的模型类
 * @see CharacterOnline
 * @see https://esi.evepc.163.com/ui/#/Location/get_characters_character_id_online
 * @package RazeSoldier\SerenityEsi\Model\Location
 */
class CharacterOnlineStatus
{
    /**
     * @var string|null Timestamp of the last login
     */
    public ?string $last_login = null;
    /**
     * @var string|null Timestamp of the last logout
     */
    public ?string $last_logout = null;
    /**
     * @var int|null Total number of times the character has logged in
     */
    public ?int $logins = null;
    /**
     * @var bool If the character is online
     */
    public bool $online;
}
