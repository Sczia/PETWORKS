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

<<<<<<< HEAD
namespace Ramsey\Collection;
=======
namespace Ramsey\Collection\Exception;
>>>>>>> 9c86e61f634a9df0335d01cacf2ce0597478a84a

use RuntimeException;

/**
<<<<<<< HEAD
<<<<<<<< HEAD:vendor/ramsey/collection/src/Exception/InvalidPropertyOrMethod.php
=======
>>>>>>> 9c86e61f634a9df0335d01cacf2ce0597478a84a
 * Thrown when attempting to evaluate a property, method, or array key
 * that doesn't exist on an element or cannot otherwise be evaluated in the
 * current context.
 */
<<<<<<< HEAD
=======
<<<<<<< HEAD
class InvalidPropertyOrMethod extends RuntimeException implements CollectionException
========
 * Collection sorting
 */
enum Sort: string
>>>>>>>> 9c86e61f634a9df0335d01cacf2ce0597478a84a:vendor/ramsey/collection/src/Sort.php
{
    /**
     * Sort items in a collection in ascending order.
     */
    case Ascending = 'asc';

    /**
     * Sort items in a collection in descending order.
     */
    case Descending = 'desc';
=======
<<<<<<< HEAD:vendor/ramsey/collection/src/Exception/InvalidPropertyOrMethod.php
>>>>>>> 0f040bdc1886cac621b42cde3077632f83f9ad41
class InvalidPropertyOrMethod extends RuntimeException implements CollectionException
{
>>>>>>> 9c86e61f634a9df0335d01cacf2ce0597478a84a
}
