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

namespace RazeSoldier\SerenityEsi\Model\Insurance;

use RazeSoldier\SerenityEsi\Api\Insurance\ListInsuranceLevel;

/**
 * 代表一种船型的保险价格
 * @see ListInsuranceLevel
 * @see https://esi.evepc.163.com/ui/#/Insurance/get_insurance_prices
 * @package RazeSoldier\SerenityEsi\Model\Insurance
 */
class InsurancePrices
{
    /**
     * @var InsuranceLevels[]
     */
    public array $levels;
    public int $type_id;
}
