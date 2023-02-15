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

use Symfony\Component\Translation\Exception\InvalidResourceException;

/**
 * JsonFileLoader loads translations from an json file.
 *
 * @author singles
 */
class JsonFileLoader extends FileLoader
{
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
        if ($data = file_get_contents($resource)) {
            $messages = json_decode($data, true);

            if (0 < $errorCode = json_last_error()) {
                throw new InvalidResourceException('Error parsing JSON: '.$this->getJSONErrorMessage($errorCode));
            }
        }

        return $messages;
    }

    /**
     * Translates JSON_ERROR_* constant into meaningful message.
     */
    private function getJSONErrorMessage(int $errorCode): string
    {
        return match ($errorCode) {
            \JSON_ERROR_DEPTH => 'Maximum stack depth exceeded',
            \JSON_ERROR_STATE_MISMATCH => 'Underflow or the modes mismatch',
            \JSON_ERROR_CTRL_CHAR => 'Unexpected control character found',
            \JSON_ERROR_SYNTAX => 'Syntax error, malformed JSON',
            \JSON_ERROR_UTF8 => 'Malformed UTF-8 characters, possibly incorrectly encoded',
            default => 'Unknown error',
        };
    }
}
