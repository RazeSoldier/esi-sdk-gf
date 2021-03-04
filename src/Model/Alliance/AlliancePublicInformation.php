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

namespace RazeSoldier\SerenityEsi\Model\Alliance;

/**
 * 联盟公开信息的模型类
 * @see \RazeSoldier\SerenityEsi\Api\Alliance\AlliancePublicInformation
 * @see https://esi.evepc.163.com/ui/#/Alliance/get_alliances_alliance_id
 * @package RazeSoldier\SerenityEsi\Model\Alliance
 */
class AlliancePublicInformation
{
    /**
     * @var int ID of the corporation that created the alliance
     */
    public int $creator_corporation_id;
    /**
     * @var int ID of the character that created the alliance
     */
    public int $creator_id;
    /**
     * @var string date_founded string
     */
    public string $date_founded;
    /**
     * @var int|null the executor corporation ID, if this alliance is not closed
     */
    public ?int $executor_corporation_id = null;
    /**
     * @var int|null Faction ID this alliance is fighting for, if this alliance is enlisted in factional warfare
     */
    public ?int $faction_id = null;
    /**
     * @var string the full name of the alliance
     */
    public string $name;
    /**
     * @var string the short name of the alliance
     */
    public string $ticker;
}
