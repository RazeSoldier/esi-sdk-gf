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
 * 角色公开信息的模型类
 * @see \RazeSoldier\SerenityEsi\Api\Character\CharacterPublicInformation
 * @see https://esi.evepc.163.com/ui/#/Character/get_characters_character_id
 * @package RazeSoldier\SerenityEsi\Model\Character
 */
class CharacterPublicInformation
{
    public ?int $alliance_id = null;
    public string $birthday;
    public int $bloodline_id;
    public int $corporation_id;
    public ?string $description = null;
    public ?string $faction_id = null;
    public string $gender;
    public string $name;
    public int $race_id;
    public ?float $security_status = null;
    public ?string $title = null;
}
