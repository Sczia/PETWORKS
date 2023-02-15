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

use Symfony\Component\Translation\Exception\LogicException;
use Symfony\Component\Translation\MessageCatalogue;
use Symfony\Component\Translation\Util\ArrayConverter;
use Symfony\Component\Yaml\Yaml;

/**
 * YamlFileDumper generates yaml files from a message catalogue.
 *
 * @author Michel Salib <michelsalib@hotmail.com>
 */
class YamlFileDumper extends FileDumper
{
    private string $extension;

    public function __construct(string $extension = 'yml')
    {
        $this->extension = $extension;
    }

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
        if (!class_exists(Yaml::class)) {
            throw new LogicException('Dumping translations in the YAML format requires the Symfony Yaml component.');
        }

        $data = $messages->all($domain);

        if (isset($options['as_tree']) && $options['as_tree']) {
            $data = ArrayConverter::expandToTree($data);
        }

        if (isset($options['inline']) && ($inline = (int) $options['inline']) > 0) {
            return Yaml::dump($data, $inline);
        }

        return Yaml::dump($data);
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
        return $this->extension;
    }
}
