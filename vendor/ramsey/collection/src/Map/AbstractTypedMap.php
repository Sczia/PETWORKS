<?php

/**
 * This file is part of the ramsey/collection library
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 *
 * @copyright Copyright (c) Ben Ramsey <ben@benramsey.com>
 * @license http://opensource.org/licenses/MIT MIT
 */

declare(strict_types=1);

namespace Ramsey\Collection\Map;

use Ramsey\Collection\Exception\InvalidArgumentException;
use Ramsey\Collection\Tool\TypeTrait;
use Ramsey\Collection\Tool\ValueToStringTrait;

/**
 * This class provides a basic implementation of `TypedMapInterface`, to
 * minimize the effort required to implement this interface.
 *
 * @template K of array-key
 * @template T
 * @extends AbstractMap<K, T>
 * @implements TypedMapInterface<K, T>
 */
abstract class AbstractTypedMap extends AbstractMap implements TypedMapInterface
{
    use TypeTrait;
    use ValueToStringTrait;

    /**
     * @param K $offset
     * @param T $value
     *
     * @inheritDoc
<<<<<<< HEAD
=======
<<<<<<< HEAD
=======
<<<<<<< HEAD
>>>>>>> 9c86e61f634a9df0335d01cacf2ce0597478a84a
>>>>>>> 0f040bdc1886cac621b42cde3077632f83f9ad41
     * @psalm-suppress MoreSpecificImplementedParamType
     */
    public function offsetSet(mixed $offset, mixed $value): void
    {
<<<<<<< HEAD
=======
<<<<<<< HEAD
=======
<<<<<<< HEAD
=======
        if ($offset === null) {
            throw new InvalidArgumentException(
                'Map elements are key/value pairs; a key must be provided for '
                . 'value ' . var_export($value, true),
            );
        }

>>>>>>> 09f7352615a49bcbd90ba54bdbb06a7258875f45
>>>>>>> 9c86e61f634a9df0335d01cacf2ce0597478a84a
>>>>>>> 0f040bdc1886cac621b42cde3077632f83f9ad41
        if ($this->checkType($this->getKeyType(), $offset) === false) {
            throw new InvalidArgumentException(
                'Key must be of type ' . $this->getKeyType() . '; key is '
                . $this->toolValueToString($offset),
            );
        }

        if ($this->checkType($this->getValueType(), $value) === false) {
            throw new InvalidArgumentException(
                'Value must be of type ' . $this->getValueType() . '; value is '
                . $this->toolValueToString($value),
            );
        }

        parent::offsetSet($offset, $value);
    }
}
