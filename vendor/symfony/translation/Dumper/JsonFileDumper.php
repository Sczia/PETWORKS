<?php

/*
 * This file is part of the Symfony package.
 *
 * (c) Fabien Potencier <fabien@symfony.com>
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace Symfony\Component\Translation\Dumper;

use Symfony\Component\Translation\MessageCatalogue;

/**
 * JsonFileDumper generates an json formatted string representation of a message catalogue.
 *
 * @author singles
 */
class JsonFileDumper extends FileDumper
{
    public function formatCatalogue(MessageCatalogue $messages, string $domain, array $options = []): string
<<<<<<< HEAD
=======
=======
<<<<<<< HEAD
    public function formatCatalogue(MessageCatalogue $messages, string $domain, array $options = []): string
=======
    /**
     * {@inheritdoc}
     */
    public function formatCatalogue(MessageCatalogue $messages, string $domain, array $options = [])
>>>>>>> 09f7352615a49bcbd90ba54bdbb06a7258875f45
>>>>>>> 9c86e61f634a9df0335d01cacf2ce0597478a84a
>>>>>>> 0f040bdc1886cac621b42cde3077632f83f9ad41
    {
        $flags = $options['json_encoding'] ?? \JSON_PRETTY_PRINT;

        return json_encode($messages->all($domain), $flags);
    }

    protected function getExtension(): string
<<<<<<< HEAD
=======
=======
<<<<<<< HEAD
    protected function getExtension(): string
=======
    /**
     * {@inheritdoc}
     */
    protected function getExtension()
>>>>>>> 09f7352615a49bcbd90ba54bdbb06a7258875f45
>>>>>>> 9c86e61f634a9df0335d01cacf2ce0597478a84a
>>>>>>> 0f040bdc1886cac621b42cde3077632f83f9ad41
    {
        return 'json';
    }
}
