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

namespace RazeSoldier\SerenityEsi\Model\Corporation;

use RazeSoldier\SerenityEsi\Api\Character\CharacterPublicInformation;

/**
 * 军团公开信息的模型类
 * @see CharacterPublicInformation
 * @see https://esi.evepc.163.com/ui/#/Corporation/get_corporations_corporation_id
 * @package RazeSoldier\SerenityEsi\Model\Corporation
 */
class CorporationPublicInformation
{
    public ?int $alliance_id = null;
    public int $ceo_id;
    public int $creator_id;
    public ?string $date_founded = null;
    public ?string $description = null;
    public ?int $faction_id = null;
    public ?int $home_station_id = null;
    public int $member_count;
    public string $name;
    public int $shares;
    public float $tax_rate;
    public string $ticker;
    public ?string $url = null;
    public ?bool $war_eligible = null;
}
