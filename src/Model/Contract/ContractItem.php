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

namespace RazeSoldier\SerenityEsi\Model\Contract;

/**
 * 代表游戏内合同的物品
 * @see https://esi.evepc.163.com/ui/#/Contracts/get_characters_character_id_contracts_contract_id_items
 */
class ContractItem
{
    /**
     * @var bool true if the contract issuer has submitted this item with the contract,
     *           false if the isser is asking for this item in the contract
     */
    public bool $is_included;
    public bool $is_singleton;
    /**
     * @var int Number of items in the stack
     */
    public int $quantity;
    /**
     * @var int|null -1 indicates that the item is a singleton (non-stackable).
     *                If the item happens to be a Blueprint, -1 is an Original and -2 is a Blueprint Copy
     */
    public ?int $raw_quantity = null;
    /**
     * @var int Unique ID for the item
     */
    public int $record_id;
    /**
     * @var int Type ID for item
     */
    public int $type_id;
}
