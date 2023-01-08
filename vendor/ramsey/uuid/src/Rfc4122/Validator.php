<?php

/**
 * This file is part of the ramsey/uuid library
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 *
 * @copyright Copyright (c) Ben Ramsey <ben@benramsey.com>
 * @license http://opensource.org/licenses/MIT MIT
 */

declare(strict_types=1);

namespace Ramsey\Uuid\Rfc4122;

use Ramsey\Uuid\Uuid;
use Ramsey\Uuid\Validator\ValidatorInterface;

use function preg_match;
use function str_replace;

/**
 * Rfc4122\Validator validates strings as UUIDs of the RFC 4122 variant
 *
 * @psalm-immutable
 */
final class Validator implements ValidatorInterface
{
    private const VALID_PATTERN = '\A[0-9A-Fa-f]{8}-[0-9A-Fa-f]{4}-'
<<<<<<< HEAD
        . '[1-8][0-9A-Fa-f]{3}-[ABab89][0-9A-Fa-f]{3}-[0-9A-Fa-f]{12}\z';
=======
<<<<<<< HEAD
        . '[1-8][0-9A-Fa-f]{3}-[ABab89][0-9A-Fa-f]{3}-[0-9A-Fa-f]{12}\z';
=======
        . '[1-5]{1}[0-9A-Fa-f]{3}-[ABab89]{1}[0-9A-Fa-f]{3}-[0-9A-Fa-f]{12}\z';
>>>>>>> 09f7352615a49bcbd90ba54bdbb06a7258875f45
>>>>>>> 9c86e61f634a9df0335d01cacf2ce0597478a84a

    /**
     * @psalm-return non-empty-string
     * @psalm-suppress MoreSpecificReturnType we know that the retrieved `string` is never empty
     * @psalm-suppress LessSpecificReturnStatement we know that the retrieved `string` is never empty
     */
    public function getPattern(): string
    {
        return self::VALID_PATTERN;
    }

    public function validate(string $uuid): bool
    {
        $uuid = str_replace(['urn:', 'uuid:', 'URN:', 'UUID:', '{', '}'], '', $uuid);

        return $uuid === Uuid::NIL || preg_match('/' . self::VALID_PATTERN . '/Dms', $uuid);
    }
}
