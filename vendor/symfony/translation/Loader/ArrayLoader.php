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

use Symfony\Component\Translation\MessageCatalogue;

/**
 * ArrayLoader loads translations from a PHP array.
 *
 * @author Fabien Potencier <fabien@symfony.com>
 */
class ArrayLoader implements LoaderInterface
{
    public function load(mixed $resource, string $locale, string $domain = 'messages'): MessageCatalogue
<<<<<<< HEAD
=======
=======
<<<<<<< HEAD
    public function load(mixed $resource, string $locale, string $domain = 'messages'): MessageCatalogue
=======
    /**
     * {@inheritdoc}
     */
    public function load($resource, string $locale, string $domain = 'messages')
>>>>>>> 09f7352615a49bcbd90ba54bdbb06a7258875f45
>>>>>>> 9c86e61f634a9df0335d01cacf2ce0597478a84a
>>>>>>> 0f040bdc1886cac621b42cde3077632f83f9ad41
    {
        $resource = $this->flatten($resource);
        $catalogue = new MessageCatalogue($locale);
        $catalogue->add($resource, $domain);

        return $catalogue;
    }

    /**
     * Flattens an nested array of translations.
     *
     * The scheme used is:
     *   'key' => ['key2' => ['key3' => 'value']]
     * Becomes:
     *   'key.key2.key3' => 'value'
     */
    private function flatten(array $messages): array
    {
        $result = [];
        foreach ($messages as $key => $value) {
            if (\is_array($value)) {
                foreach ($this->flatten($value) as $k => $v) {
                    $result[$key.'.'.$k] = $v;
                }
            } else {
                $result[$key] = $value;
            }
        }

        return $result;
    }
}
