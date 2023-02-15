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

namespace Ramsey\Collection\Tool;

use function is_array;
use function is_bool;
use function is_callable;
use function is_float;
use function is_int;
use function is_numeric;
use function is_object;
use function is_resource;
use function is_scalar;
use function is_string;

/**
 * Provides functionality to check values for specific types.
 */
trait TypeTrait
{
    /**
     * Returns `true` if value is of the specified type.
     *
     * @param string $type The type to check the value against.
     * @param mixed $value The value to check.
     */
    protected function checkType(string $type, mixed $value): bool
<<<<<<< HEAD
=======
=======
<<<<<<< HEAD
    protected function checkType(string $type, mixed $value): bool
=======
    // phpcs:ignore SlevomatCodingStandard.TypeHints.ParameterTypeHint.MissingNativeTypeHint
    protected function checkType(string $type, $value): bool
>>>>>>> 09f7352615a49bcbd90ba54bdbb06a7258875f45
>>>>>>> 9c86e61f634a9df0335d01cacf2ce0597478a84a
>>>>>>> 0f040bdc1886cac621b42cde3077632f83f9ad41
    {
        return match ($type) {
            'array' => is_array($value),
            'bool', 'boolean' => is_bool($value),
            'callable' => is_callable($value),
            'float', 'double' => is_float($value),
            'int', 'integer' => is_int($value),
            'null' => $value === null,
            'numeric' => is_numeric($value),
            'object' => is_object($value),
            'resource' => is_resource($value),
            'scalar' => is_scalar($value),
            'string' => is_string($value),
            'mixed' => true,
            default => $value instanceof $type,
        };
    }
}
