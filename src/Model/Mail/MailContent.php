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

namespace RazeSoldier\SerenityEsi\Model\Mail;

/**
 * 代表一封EVE邮件的内容
 * @see https://esi.evepc.163.com/ui/#/Mail/get_characters_character_id_mail_mail_id
 * @see \RazeSoldier\SerenityEsi\Api\Mail\MailContent
 * @package RazeSoldier\SerenityEsi\Model\Mail
 */
class MailContent
{
    public ?string $body = null;
    /**
     * @var int|null From whom the mail was sent
     */
    public ?int $from = null;
    public ?bool $is_read = null;
    /**
     * @var int[]
     */
    public ?array $labels = null;
    /**
     * @var Recipient[]
     */
    public ?array $recipients = null;
    public ?string $subject = null;
    /**
     * @var string|null When the mail was sent
     */
    public ?string $timestamp = null;
}
