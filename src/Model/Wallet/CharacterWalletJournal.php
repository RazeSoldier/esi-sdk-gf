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

namespace RazeSoldier\SerenityEsi\Model\Wallet;

/**
 * 角色钱包日志的模型类
 * @see \RazeSoldier\SerenityEsi\Api\Wallet\CharacterWalletJournal
 * @see https://esi.evepc.163.com/ui/#/Wallet/get_characters_character_id_wallet_journal
 * @package RazeSoldier\SerenityEsi\Model\Wallet
 */
class CharacterWalletJournal
{
    /**
     * @var float|null The amount of ISK given or taken from the wallet as a result of the given transaction. Positive when ISK is deposited into the wallet and negative when ISK is withdrawn
     */
    public ?float $amount = null;
    /**
     * @var float|null Wallet balance after transaction occurred
     */
    public ?float $balance = null;
    /**
     * @var int|null An ID that gives extra context to the particular transaction. Because of legacy reasons the context is completely different per ref_type and means different things. It is also possible to not have a context_id
     */
    public ?int $context_id = null;
    /**
     * @var string|null The type of the given context_id if present
     */
    public ?string $context_id_type = null;
    /**
     * @var string Date and time of transaction
     */
    public string $date;
    /**
     * @var string The reason for the transaction, mirrors what is seen in the client
     */
    public string $description;
    /**
     * @var int|null The id of the first party involved in the transaction. This attribute has no consistency and is different or non existant for particular ref_types. The description attribute will help make sense of what this attribute means. For more info about the given ID it can be dropped into the /universe/names/ ESI route to determine its type and name
     */
    public ?int $first_party_id = null;
    /**
     * @var int Unique journal reference ID
     */
    public int $id;
    /**
     * @var string|null The user stated reason for the transaction. Only applies to some ref_types
     */
    public ?string $reason = null;
    /**
     * @var string “The transaction type for the given. transaction. Different transaction types will populate different attributes.”
     */
    public string $ref_type;
    /**
     * @var int|null The id of the second party involved in the transaction. This attribute has no consistency and is different or non existant for particular ref_types. The description attribute will help make sense of what this attribute means. For more info about the given ID it can be dropped into the /universe/names/ ESI route to determine its type and name
     */
    public ?int $second_party_id = null;
    /**
     * @var float|null Tax amount received. Only applies to tax related transactions
     */
    public ?float $tax = null;
    /**
     * @var int|null The corporation ID receiving any tax paid. Only applies to tax related transactions
     */
    public ?int $tax_receiver_id = null;
}
