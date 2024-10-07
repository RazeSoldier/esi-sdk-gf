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
 * 军团合同的模型类
 * @see \RazeSoldier\SerenityEsi\Api\Contract\CorporationContract
 * @see https://ali-esi.evepc.163.com/ui/#/Contracts/get_corporations_corporation_id_contracts
 * @package RazeSoldier\SerenityEsi\Model\Contract
 */
class CorporationContract
{
    /**
     * @var int Who will accept the contract
     */
    public int $acceptor_id;
    /**
     * @var int ID to whom the contract is assigned, can be corporation or character ID
     */
    public int $assignee_id;
    /**
     * @var string To whom the contract is available (Enum: [public, personal, corporation, alliance])
     */
    public string $availability;
    /**
     * @var float|null Buyout price (for Auctions only)
     */
    public ?float $buyout = null;
    /**
     * @var float|null Collateral price (for Couriers only)
     */
    public ?float $collateral = null;
    /**
     * @var int contract_id integer
     */
    public int $contract_id;
    /**
     * @var string|null Date of confirmation of contract
     */
    public ?string $date_accepted = null;
    /**
     * @var string|null Date of completed of contract
     */
    public ?string $date_completed = null;
    /**
     * @var string Expiration date of the contract
     */
    public string $date_expired;
    /**
     * @var string Сreation date of the contract
     */
    public string $date_issued;
    /**
     * @var int Number of days to perform the contract
     */
    public int $days_to_complete;
    /**
     * @var int End location ID (for Couriers contract)
     */
    public int $end_location_id;
    /**
     * @var bool true if the contract was issued on behalf of the issuer’s corporation
     */
    public bool $for_corporation;
    /**
     * @var int Character’s corporation ID for the issuer
     */
    public int $issuer_corporation_id;
    /**
     * @var int Character ID for the issuer
     */
    public int $issuer_id;
    /**
     * @var float|null Price of contract (for ItemsExchange and Auctions)
     */
    public ?float $price = null;
    /**
     * @var float|null Remuneration for contract (for Couriers only)
     */
    public ?float $reward = null;
    /**
     * @var int|null Start location ID (for Couriers contract)
     */
    public ?int $start_location_id = null;
    /**
     * @var string Status of the the contract (Enum: [outstanding, in_progress, finished_issuer, finished_contractor, finished, cancelled, rejected, failed, deleted, reversed])
     */
    public string $status;
    /**
     * @var string|null Title of the contract
     */
    public ?string $title = null;
    /**
     * @var string Type of the contract (Enum: [unknown, item_exchange, auction, courier, loan])
     */
    public string $type;
    /**
     * @var float|null Volume of items in the contract
     */
    public ?float $volume = null;
}
