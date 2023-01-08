<?php

/*
 * This file is part of the Symfony package.
 *
 * (c) Fabien Potencier <fabien@symfony.com>
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace Symfony\Component\Translation\Loader;

/**
 * IniFileLoader loads translations from an ini file.
 *
 * @author stealth35
 */
class IniFileLoader extends FileLoader
{
<<<<<<< HEAD
    protected function loadResource(string $resource): array
=======
<<<<<<< HEAD
    protected function loadResource(string $resource): array
=======
    /**
     * {@inheritdoc}
     */
    protected function loadResource(string $resource)
>>>>>>> 09f7352615a49bcbd90ba54bdbb06a7258875f45
>>>>>>> 9c86e61f634a9df0335d01cacf2ce0597478a84a
    {
        return parse_ini_file($resource, true);
    }
}
