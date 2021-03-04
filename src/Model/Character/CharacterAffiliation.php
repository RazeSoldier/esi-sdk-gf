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
 * 角色势力的模型类
 * @see \RazeSoldier\SerenityEsi\Api\Character\CharacterAffiliation
 * @see https://esi.evepc.163.com/ui/#/Character/post_characters_affiliation
 * @package RazeSoldier\SerenityEsi\Model\Character
 */
class CharacterAffiliation
{
    /**
     * @var int|null The character’s alliance ID, if their corporation is in an alliance
     */
    public ?int $alliance_id = null;
    /**
     * @var int The character’s ID
     */
    public int $character_id;
    /**
     * @var int The character’s corporation ID
     */
    public int $corporation_id;
    /**
     * @var int|null The character’s faction ID, if their corporation is in a faction
     */
    public ?int $faction_id = null;
}
