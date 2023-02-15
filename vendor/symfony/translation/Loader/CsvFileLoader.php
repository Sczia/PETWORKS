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

use Symfony\Component\Translation\Exception\NotFoundResourceException;

/**
 * CsvFileLoader loads translations from CSV files.
 *
 * @author Saša Stamenković <umpirsky@gmail.com>
 */
class CsvFileLoader extends FileLoader
{
    private string $delimiter = ';';
    private string $enclosure = '"';
    private string $escape = '\\';

    protected function loadResource(string $resource): array
<<<<<<< HEAD
=======
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
>>>>>>> 0f040bdc1886cac621b42cde3077632f83f9ad41
    {
        $messages = [];

        try {
            $file = new \SplFileObject($resource, 'rb');
        } catch (\RuntimeException $e) {
            throw new NotFoundResourceException(sprintf('Error opening file "%s".', $resource), 0, $e);
        }

        $file->setFlags(\SplFileObject::READ_CSV | \SplFileObject::SKIP_EMPTY);
        $file->setCsvControl($this->delimiter, $this->enclosure, $this->escape);

        foreach ($file as $data) {
            if (false === $data) {
                continue;
            }

            if (!str_starts_with($data[0], '#') && isset($data[1]) && 2 === \count($data)) {
                $messages[$data[0]] = $data[1];
            }
        }

        return $messages;
    }

    /**
     * Sets the delimiter, enclosure, and escape character for CSV.
     */
    public function setCsvControl(string $delimiter = ';', string $enclosure = '"', string $escape = '\\')
    {
        $this->delimiter = $delimiter;
        $this->enclosure = $enclosure;
        $this->escape = $escape;
    }
}
