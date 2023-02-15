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

namespace Ramsey\Uuid\Type;

use Ramsey\Uuid\Exception\InvalidArgumentException;
use ValueError;

use function preg_match;
use function sprintf;
<<<<<<< HEAD
=======
<<<<<<< HEAD
=======
<<<<<<< HEAD
=======
use function strpos;
use function strtolower;
>>>>>>> 09f7352615a49bcbd90ba54bdbb06a7258875f45
>>>>>>> 9c86e61f634a9df0335d01cacf2ce0597478a84a
>>>>>>> 0f040bdc1886cac621b42cde3077632f83f9ad41
use function substr;

/**
 * A value object representing a hexadecimal number
 *
 * This class exists for type-safety purposes, to ensure that hexadecimal numbers
 * returned from ramsey/uuid methods as strings are truly hexadecimal and not some
 * other kind of string.
 *
 * @psalm-immutable
 */
final class Hexadecimal implements TypeInterface
{
    private string $value;

    /**
     * @param self|string $value The hexadecimal value to store
     */
    public function __construct(self | string $value)
    {
        $this->value = $value instanceof self ? (string) $value : $this->prepareValue($value);
<<<<<<< HEAD
=======
=======
<<<<<<< HEAD
        $this->value = $value instanceof self ? (string) $value : $this->prepareValue($value);
=======
        $value = strtolower($value);

        if (strpos($value, '0x') === 0) {
            $value = substr($value, 2);
        }

        if (!ctype_xdigit($value)) {
            throw new InvalidArgumentException(
                'Value must be a hexadecimal number'
            );
        }

        $this->value = $value;
>>>>>>> 09f7352615a49bcbd90ba54bdbb06a7258875f45
>>>>>>> 9c86e61f634a9df0335d01cacf2ce0597478a84a
>>>>>>> 0f040bdc1886cac621b42cde3077632f83f9ad41
    }

    public function toString(): string
    {
        return $this->value;
    }

    public function __toString(): string
    {
        return $this->toString();
    }

    public function jsonSerialize(): string
    {
        return $this->toString();
    }

    public function serialize(): string
    {
        return $this->toString();
    }

    /**
     * @return array{string: string}
     */
    public function __serialize(): array
    {
        return ['string' => $this->toString()];
    }

    /**
     * Constructs the object from a serialized string representation
     *
     * @param string $data The serialized string representation of the object
     *
     * @psalm-suppress UnusedMethodCall
     */
    public function unserialize(string $data): void
    {
        $this->__construct($data);
    }

    /**
     * @param array{string?: string} $data
     */
    public function __unserialize(array $data): void
    {
        // @codeCoverageIgnoreStart
        if (!isset($data['string'])) {
            throw new ValueError(sprintf('%s(): Argument #1 ($data) is invalid', __METHOD__));
        }
        // @codeCoverageIgnoreEnd

        $this->unserialize($data['string']);
    }

    private function prepareValue(string $value): string
    {
        $value = strtolower($value);

        if (str_starts_with($value, '0x')) {
            $value = substr($value, 2);
        }

        if (!preg_match('/^[A-Fa-f0-9]+$/', $value)) {
            throw new InvalidArgumentException(
                'Value must be a hexadecimal number'
            );
        }

        return $value;
    }
}
