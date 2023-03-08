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

namespace RazeSoldier\SerenityEsi\Api\Mail;

use RazeSoldier\SerenityEsi\Api\AuthEsiBase;

/**
 * 返回一封EVE邮件的内容
 * <pre>
 * Return the contents of an EVE mail
 * Route: /v1/characters/{character_id}/mail/{mail_id}/
 * Cached for up to 30 seconds
 * </pre>
 * @package RazeSoldier\SerenityEsi\Api\Mail
 * @method \RazeSoldier\SerenityEsi\Model\Mail\MailContent get()
 */
class MailContent extends AuthEsiBase
{
    protected string $endpoint = 'characters/{character_id}/mail/{mail_id}';

    public static function v1(int $characterId, int $mailId): self
    {
        $api = new self();
        $api->version = 'v1';
        $api->paramMap['character_id'] = $characterId;
        $api->paramMap['mail_id'] = $mailId;
        return $api;
    }

    public static function latest(int $characterId, int $mailId): self
    {
        return self::v1($characterId, $mailId);
    }

    /**
     * @inheritDoc
     */
    public function getScope(): string
    {
        return 'esi-mail.read_mail.v1';
    }

    /**
     * @inheritDoc
     */
    protected function getModelClassName(): ?string
    {
        return \RazeSoldier\SerenityEsi\Model\Mail\MailContent::class;
    }
}
