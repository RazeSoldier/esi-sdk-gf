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
use RazeSoldier\SerenityEsi\Model\Mail\MailHeader;

/**
 * 返回属于符合查询条件的最近50个角色邮件头。查询可以通过label进行过滤，last_mail_id可以用来向后分页
 * <pre>
 * Return the 50 most recent mail headers belonging to the character that match the query criteria.
 * Queries can be filtered by label, and last_mail_id can be used to paginate backwards
 * Route: /v1/characters/{character_id}/mail/
 * Cached for up to 30 seconds
 * </pre>
 * @package RazeSoldier\SerenityEsi\Api\Mail
 * @method MailHeader[] get()
 */
class MailHeaders extends AuthEsiBase
{
    protected string $endpoint = 'characters/{character_id}/mail';

    public static function v1(int $characterId, ?array $labels = null, ?int $lastMailId = null): self
    {
        $api = new self();
        $api->version = 'v1';
        $api->paramMap['character_id'] = $characterId;
        if (isset($labels)) {
            $api->queryMap['labels'] = implode(',', $labels);
        }
        if (isset($lastMailId)) {
            $api->queryMap['last_mail_id'] = $lastMailId;
        }
        return $api;
    }

    public static function latest(int $characterId, ?array $labels = null, ?int $lastMailId = null): self
    {
        return self::v1($characterId, $labels, $lastMailId);
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
        return MailHeader::class;
    }
}
