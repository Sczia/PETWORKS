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

namespace Ramsey\Collection\Exception;

use RuntimeException;

/**
 * Thrown when attempting to evaluate a property, method, or array key
 * that doesn't exist on an element or cannot otherwise be evaluated in the
 * current context.
 */
<<<<<<< HEAD:vendor/ramsey/collection/src/Exception/InvalidPropertyOrMethod.php
class InvalidPropertyOrMethod extends RuntimeException implements CollectionException
=======
class ValueExtractionException extends RuntimeException
>>>>>>> 09f7352615a49bcbd90ba54bdbb06a7258875f45:vendor/ramsey/collection/src/Exception/ValueExtractionException.php
{
}
