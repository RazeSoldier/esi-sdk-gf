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

namespace RazeSoldier\SerenityEsi\Http;

use Nyholm\Psr7\Uri as UriImp;
use Psr\Http\Message\UriInterface as Uri;

/**
 * ESI请求网址的构建器
 * @package RazeSoldier\SerenityEsi\Http
 * @mixin UriImp
 */
class URIBuilder
{
    private Uri $uri;

    private function __construct()
    {
        $this->uri = new UriImp();
    }

    public static function new(): self
    {
        return new self();
    }

    public function get(): Uri
    {
        return $this->uri;
    }

    public function withScheme(...$arguments): Uri
    {
        return $this->uri->withScheme(...$arguments);
    }

    public function __call($name, $arguments)
    {
        return $this->uri->$name(...$arguments);
    }
}
