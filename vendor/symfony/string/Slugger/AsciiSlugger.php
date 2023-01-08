<?php

/*
 * This file is part of the Symfony package.
 *
 * (c) Fabien Potencier <fabien@symfony.com>
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace Symfony\Component\String\Slugger;

use Symfony\Component\Intl\Transliterator\EmojiTransliterator;
use Symfony\Component\String\AbstractUnicodeString;
use Symfony\Component\String\UnicodeString;
use Symfony\Contracts\Translation\LocaleAwareInterface;

if (!interface_exists(LocaleAwareInterface::class)) {
    throw new \LogicException('You cannot use the "Symfony\Component\String\Slugger\AsciiSlugger" as the "symfony/translation-contracts" package is not installed. Try running "composer require symfony/translation-contracts".');
}

/**
 * @author Titouan Galopin <galopintitouan@gmail.com>
 */
class AsciiSlugger implements SluggerInterface, LocaleAwareInterface
{
    private const LOCALE_TO_TRANSLITERATOR_ID = [
        'am' => 'Amharic-Latin',
        'ar' => 'Arabic-Latin',
        'az' => 'Azerbaijani-Latin',
        'be' => 'Belarusian-Latin',
        'bg' => 'Bulgarian-Latin',
        'bn' => 'Bengali-Latin',
        'de' => 'de-ASCII',
        'el' => 'Greek-Latin',
        'fa' => 'Persian-Latin',
        'he' => 'Hebrew-Latin',
        'hy' => 'Armenian-Latin',
        'ka' => 'Georgian-Latin',
        'kk' => 'Kazakh-Latin',
        'ky' => 'Kirghiz-Latin',
        'ko' => 'Korean-Latin',
        'mk' => 'Macedonian-Latin',
        'mn' => 'Mongolian-Latin',
        'or' => 'Oriya-Latin',
        'ps' => 'Pashto-Latin',
        'ru' => 'Russian-Latin',
        'sr' => 'Serbian-Latin',
        'sr_Cyrl' => 'Serbian-Latin',
        'th' => 'Thai-Latin',
        'tk' => 'Turkmen-Latin',
        'uk' => 'Ukrainian-Latin',
        'uz' => 'Uzbek-Latin',
        'zh' => 'Han-Latin',
    ];

    private $defaultLocale;
    private $symbolsMap = [
        'en' => ['@' => 'at', '&' => 'and'],
    ];
    private bool|string $emoji = false;

    /**
     * Cache of transliterators per locale.
     *
     * @var \Transliterator[]
     */
    private $transliterators = [];

    /**
     * @param array|\Closure|null $symbolsMap
     */
    public function __construct(string $defaultLocale = null, $symbolsMap = null)
    {
        if (null !== $symbolsMap && !\is_array($symbolsMap) && !$symbolsMap instanceof \Closure) {
            throw new \TypeError(sprintf('Argument 2 passed to "%s()" must be array, Closure or null, "%s" given.', __METHOD__, \gettype($symbolsMap)));
        }

        $this->defaultLocale = $defaultLocale;
        $this->symbolsMap = $symbolsMap ?? $this->symbolsMap;
    }

<<<<<<< HEAD
    public function setLocale(string $locale)
=======
<<<<<<< HEAD
    public function setLocale(string $locale)
=======
    /**
     * {@inheritdoc}
     */
    public function setLocale($locale)
>>>>>>> 09f7352615a49bcbd90ba54bdbb06a7258875f45
>>>>>>> 9c86e61f634a9df0335d01cacf2ce0597478a84a
    {
        $this->defaultLocale = $locale;
    }

<<<<<<< HEAD
    public function getLocale(): string
=======
<<<<<<< HEAD
    public function getLocale(): string
=======
    /**
     * {@inheritdoc}
     */
    public function getLocale()
>>>>>>> 09f7352615a49bcbd90ba54bdbb06a7258875f45
>>>>>>> 9c86e61f634a9df0335d01cacf2ce0597478a84a
    {
        return $this->defaultLocale;
    }

    /**
     * @param bool|string $emoji true will use the same locale,
     *                           false will disable emoji,
     *                           and a string to use a specific locale
     */
    public function withEmoji(bool|string $emoji = true): static
    {
        if (false !== $emoji && !class_exists(EmojiTransliterator::class)) {
            throw new \LogicException(sprintf('You cannot use the "%s()" method as the "symfony/intl" package is not installed. Try running "composer require symfony/intl".', __METHOD__));
        }

        $new = clone $this;
        $new->emoji = $emoji;

        return $new;
    }

    public function slug(string $string, string $separator = '-', string $locale = null): AbstractUnicodeString
    {
        $locale = $locale ?? $this->defaultLocale;

        $transliterator = [];
        if ($locale && ('de' === $locale || 0 === strpos($locale, 'de_'))) {
            // Use the shortcut for German in UnicodeString::ascii() if possible (faster and no requirement on intl)
            $transliterator = ['de-ASCII'];
        } elseif (\function_exists('transliterator_transliterate') && $locale) {
            $transliterator = (array) $this->createTransliterator($locale);
        }

        if ($emojiTransliterator = $this->createEmojiTransliterator($locale)) {
            $transliterator[] = $emojiTransliterator;
        }

        if ($this->symbolsMap instanceof \Closure) {
            // If the symbols map is passed as a closure, there is no need to fallback to the parent locale
            // as the closure can just provide substitutions for all locales of interest.
            $symbolsMap = $this->symbolsMap;
            array_unshift($transliterator, static function ($s) use ($symbolsMap, $locale) {
                return $symbolsMap($s, $locale);
            });
        }

        $unicodeString = (new UnicodeString($string))->ascii($transliterator);

        if (\is_array($this->symbolsMap)) {
            $map = null;
            if (isset($this->symbolsMap[$locale])) {
                $map = $this->symbolsMap[$locale];
            } else {
                $parent = self::getParentLocale($locale);
                if ($parent && isset($this->symbolsMap[$parent])) {
                    $map = $this->symbolsMap[$parent];
                }
            }
            if ($map) {
                foreach ($map as $char => $replace) {
                    $unicodeString = $unicodeString->replace($char, ' '.$replace.' ');
                }
            }
        }

        return $unicodeString
            ->replaceMatches('/[^A-Za-z0-9]++/', $separator)
            ->trim($separator)
        ;
    }

    private function createTransliterator(string $locale): ?\Transliterator
    {
        if (\array_key_exists($locale, $this->transliterators)) {
            return $this->transliterators[$locale];
        }

        // Exact locale supported, cache and return
        if ($id = self::LOCALE_TO_TRANSLITERATOR_ID[$locale] ?? null) {
            return $this->transliterators[$locale] = \Transliterator::create($id.'/BGN') ?? \Transliterator::create($id);
        }

        // Locale not supported and no parent, fallback to any-latin
        if (!$parent = self::getParentLocale($locale)) {
            return $this->transliterators[$locale] = null;
        }

        // Try to use the parent locale (ie. try "de" for "de_AT") and cache both locales
        if ($id = self::LOCALE_TO_TRANSLITERATOR_ID[$parent] ?? null) {
            $transliterator = \Transliterator::create($id.'/BGN') ?? \Transliterator::create($id);
        }

        return $this->transliterators[$locale] = $this->transliterators[$parent] = $transliterator ?? null;
    }

    private function createEmojiTransliterator(?string $locale): ?EmojiTransliterator
    {
        if (\is_string($this->emoji)) {
            $locale = $this->emoji;
        } elseif (!$this->emoji) {
            return null;
        }

        while (null !== $locale) {
            try {
                return EmojiTransliterator::create("emoji-$locale");
            } catch (\IntlException) {
                $locale = self::getParentLocale($locale);
            }
        }

        return null;
    }

    private static function getParentLocale(?string $locale): ?string
    {
        if (!$locale) {
            return null;
        }
        if (false === $str = strrchr($locale, '_')) {
            // no parent locale
            return null;
        }

        return substr($locale, 0, -\strlen($str));
    }
}
