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

namespace RazeSoldier\SerenityEsi\Model\Character;

/**
 * 角色通知的模型类
 * @see \RazeSoldier\SerenityEsi\Api\Character\CharacterNotifications
 * @see https://esi.evepc.163.com/ui/#/Character/get_characters_character_id_notifications
 * @package RazeSoldier\SerenityEsi\Model\Character
 */
class CharacterNotification
{
    public ?bool $is_read = null;
    public int $notification_id;
    public int $sender_id;
    public string $sender_type;
    public ?string $text = null;
    public string $timestamp;
    public string $type;
}
