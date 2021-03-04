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

namespace RazeSoldier\SerenityEsi\Model\Universe;

/**
 * 类型信息的模型类
 * @see \RazeSoldier\SerenityEsi\Api\Universe\TypeInformation
 * @see https://esi.evepc.163.com/ui/#/Universe/get_universe_types_type_id
 * @package RazeSoldier\SerenityEsi\Model\Universe
 */
class TypeInformation
{
    public ?float $capacity = null;
    public string $description;
    /**
     * @var TypeDogmaAttribute[]
     */
    public ?array $dogma_attributes = null;
    /**
     * @var TypeDogmaEffect[]
     */
    public ?array $dogma_effects = null;
    public ?int $graphic_id = null;
    public int $group_id;
    public ?int $icon_id;
    public ?int $market_group_id = null;
    public ?float $mass = null;
    public string $name;
    public ?float $packaged_volume;
    public ?int $portion_size = null;
    public bool $published;
    public ?float $radius = null;
    public int $type_id;
    public ?float $volume = null;
}
