<?php

/*
 * This file is part of the Symfony package.
 *
 * (c) Fabien Potencier <fabien@symfony.com>
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace Symfony\Component\Translation;

use Symfony\Component\Config\Resource\ResourceInterface;
use Symfony\Component\Translation\Exception\LogicException;

/**
 * @author Fabien Potencier <fabien@symfony.com>
 */
class MessageCatalogue implements MessageCatalogueInterface, MetadataAwareInterface, CatalogueMetadataAwareInterface
{
    private array $messages = [];
    private array $metadata = [];
    private array $catalogueMetadata = [];
    private array $resources = [];
    private string $locale;
    private ?MessageCatalogueInterface $fallbackCatalogue = null;
    private ?self $parent = null;

    /**
     * @param array $messages An array of messages classified by domain
     */
    public function __construct(string $locale, array $messages = [])
    {
        $this->locale = $locale;
        $this->messages = $messages;
    }

    public function getLocale(): string
<<<<<<< HEAD
=======
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
>>>>>>> 0f040bdc1886cac621b42cde3077632f83f9ad41
    {
        return $this->locale;
    }

    public function getDomains(): array
<<<<<<< HEAD
=======
=======
<<<<<<< HEAD
    public function getDomains(): array
=======
    /**
     * {@inheritdoc}
     */
    public function getDomains()
>>>>>>> 09f7352615a49bcbd90ba54bdbb06a7258875f45
>>>>>>> 9c86e61f634a9df0335d01cacf2ce0597478a84a
>>>>>>> 0f040bdc1886cac621b42cde3077632f83f9ad41
    {
        $domains = [];

        foreach ($this->messages as $domain => $messages) {
            if (str_ends_with($domain, self::INTL_DOMAIN_SUFFIX)) {
                $domain = substr($domain, 0, -\strlen(self::INTL_DOMAIN_SUFFIX));
            }
            $domains[$domain] = $domain;
        }

        return array_values($domains);
    }

    public function all(string $domain = null): array
<<<<<<< HEAD
=======
=======
<<<<<<< HEAD
    public function all(string $domain = null): array
=======
    /**
     * {@inheritdoc}
     */
    public function all(string $domain = null)
>>>>>>> 09f7352615a49bcbd90ba54bdbb06a7258875f45
>>>>>>> 9c86e61f634a9df0335d01cacf2ce0597478a84a
>>>>>>> 0f040bdc1886cac621b42cde3077632f83f9ad41
    {
        if (null !== $domain) {
            // skip messages merge if intl-icu requested explicitly
            if (str_ends_with($domain, self::INTL_DOMAIN_SUFFIX)) {
                return $this->messages[$domain] ?? [];
            }

            return ($this->messages[$domain.self::INTL_DOMAIN_SUFFIX] ?? []) + ($this->messages[$domain] ?? []);
        }

        $allMessages = [];

        foreach ($this->messages as $domain => $messages) {
            if (str_ends_with($domain, self::INTL_DOMAIN_SUFFIX)) {
                $domain = substr($domain, 0, -\strlen(self::INTL_DOMAIN_SUFFIX));
                $allMessages[$domain] = $messages + ($allMessages[$domain] ?? []);
            } else {
                $allMessages[$domain] = ($allMessages[$domain] ?? []) + $messages;
            }
        }

        return $allMessages;
    }

    public function set(string $id, string $translation, string $domain = 'messages')
    {
        $this->add([$id => $translation], $domain);
    }

    public function has(string $id, string $domain = 'messages'): bool
<<<<<<< HEAD
=======
=======
<<<<<<< HEAD
    public function has(string $id, string $domain = 'messages'): bool
=======
    /**
     * {@inheritdoc}
     */
    public function has(string $id, string $domain = 'messages')
>>>>>>> 09f7352615a49bcbd90ba54bdbb06a7258875f45
>>>>>>> 9c86e61f634a9df0335d01cacf2ce0597478a84a
>>>>>>> 0f040bdc1886cac621b42cde3077632f83f9ad41
    {
        if (isset($this->messages[$domain][$id]) || isset($this->messages[$domain.self::INTL_DOMAIN_SUFFIX][$id])) {
            return true;
        }

        if (null !== $this->fallbackCatalogue) {
            return $this->fallbackCatalogue->has($id, $domain);
        }

        return false;
    }

    public function defines(string $id, string $domain = 'messages'): bool
<<<<<<< HEAD
=======
=======
<<<<<<< HEAD
    public function defines(string $id, string $domain = 'messages'): bool
=======
    /**
     * {@inheritdoc}
     */
    public function defines(string $id, string $domain = 'messages')
>>>>>>> 09f7352615a49bcbd90ba54bdbb06a7258875f45
>>>>>>> 9c86e61f634a9df0335d01cacf2ce0597478a84a
>>>>>>> 0f040bdc1886cac621b42cde3077632f83f9ad41
    {
        return isset($this->messages[$domain][$id]) || isset($this->messages[$domain.self::INTL_DOMAIN_SUFFIX][$id]);
    }

    public function get(string $id, string $domain = 'messages'): string
<<<<<<< HEAD
=======
=======
<<<<<<< HEAD
    public function get(string $id, string $domain = 'messages'): string
=======
    /**
     * {@inheritdoc}
     */
    public function get(string $id, string $domain = 'messages')
>>>>>>> 09f7352615a49bcbd90ba54bdbb06a7258875f45
>>>>>>> 9c86e61f634a9df0335d01cacf2ce0597478a84a
>>>>>>> 0f040bdc1886cac621b42cde3077632f83f9ad41
    {
        if (isset($this->messages[$domain.self::INTL_DOMAIN_SUFFIX][$id])) {
            return $this->messages[$domain.self::INTL_DOMAIN_SUFFIX][$id];
        }

        if (isset($this->messages[$domain][$id])) {
            return $this->messages[$domain][$id];
        }

        if (null !== $this->fallbackCatalogue) {
            return $this->fallbackCatalogue->get($id, $domain);
        }

        return $id;
    }

    public function replace(array $messages, string $domain = 'messages')
    {
        unset($this->messages[$domain], $this->messages[$domain.self::INTL_DOMAIN_SUFFIX]);

        $this->add($messages, $domain);
    }

    public function add(array $messages, string $domain = 'messages')
    {
        $altDomain = str_ends_with($domain, self::INTL_DOMAIN_SUFFIX) ? substr($domain, 0, -\strlen(self::INTL_DOMAIN_SUFFIX)) : $domain.self::INTL_DOMAIN_SUFFIX;
        foreach ($messages as $id => $message) {
            unset($this->messages[$altDomain][$id]);
            $this->messages[$domain][$id] = $message;
        }

        if ([] === ($this->messages[$altDomain] ?? null)) {
            unset($this->messages[$altDomain]);
        }
    }

    public function addCatalogue(MessageCatalogueInterface $catalogue)
    {
        if ($catalogue->getLocale() !== $this->locale) {
            throw new LogicException(sprintf('Cannot add a catalogue for locale "%s" as the current locale for this catalogue is "%s".', $catalogue->getLocale(), $this->locale));
        }

        foreach ($catalogue->all() as $domain => $messages) {
            if ($intlMessages = $catalogue->all($domain.self::INTL_DOMAIN_SUFFIX)) {
                $this->add($intlMessages, $domain.self::INTL_DOMAIN_SUFFIX);
                $messages = array_diff_key($messages, $intlMessages);
            }
            $this->add($messages, $domain);
        }

        foreach ($catalogue->getResources() as $resource) {
            $this->addResource($resource);
        }

        if ($catalogue instanceof MetadataAwareInterface) {
            $metadata = $catalogue->getMetadata('', '');
            $this->addMetadata($metadata);
        }

        if ($catalogue instanceof CatalogueMetadataAwareInterface) {
            $catalogueMetadata = $catalogue->getCatalogueMetadata('', '');
            $this->addCatalogueMetadata($catalogueMetadata);
        }
    }

    public function addFallbackCatalogue(MessageCatalogueInterface $catalogue)
    {
        // detect circular references
        $c = $catalogue;
        while ($c = $c->getFallbackCatalogue()) {
            if ($c->getLocale() === $this->getLocale()) {
                throw new LogicException(sprintf('Circular reference detected when adding a fallback catalogue for locale "%s".', $catalogue->getLocale()));
            }
        }

        $c = $this;
        do {
            if ($c->getLocale() === $catalogue->getLocale()) {
                throw new LogicException(sprintf('Circular reference detected when adding a fallback catalogue for locale "%s".', $catalogue->getLocale()));
            }

            foreach ($catalogue->getResources() as $resource) {
                $c->addResource($resource);
            }
        } while ($c = $c->parent);

        $catalogue->parent = $this;
        $this->fallbackCatalogue = $catalogue;

        foreach ($catalogue->getResources() as $resource) {
            $this->addResource($resource);
        }
    }

    public function getFallbackCatalogue(): ?MessageCatalogueInterface
<<<<<<< HEAD
=======
=======
<<<<<<< HEAD
    public function getFallbackCatalogue(): ?MessageCatalogueInterface
=======
    /**
     * {@inheritdoc}
     */
    public function getFallbackCatalogue()
>>>>>>> 09f7352615a49bcbd90ba54bdbb06a7258875f45
>>>>>>> 9c86e61f634a9df0335d01cacf2ce0597478a84a
>>>>>>> 0f040bdc1886cac621b42cde3077632f83f9ad41
    {
        return $this->fallbackCatalogue;
    }

    public function getResources(): array
<<<<<<< HEAD
=======
=======
<<<<<<< HEAD
    public function getResources(): array
=======
    /**
     * {@inheritdoc}
     */
    public function getResources()
>>>>>>> 09f7352615a49bcbd90ba54bdbb06a7258875f45
>>>>>>> 9c86e61f634a9df0335d01cacf2ce0597478a84a
>>>>>>> 0f040bdc1886cac621b42cde3077632f83f9ad41
    {
        return array_values($this->resources);
    }

    public function addResource(ResourceInterface $resource)
    {
        $this->resources[$resource->__toString()] = $resource;
    }

    public function getMetadata(string $key = '', string $domain = 'messages'): mixed
<<<<<<< HEAD
=======
=======
<<<<<<< HEAD
    public function getMetadata(string $key = '', string $domain = 'messages'): mixed
=======
    /**
     * {@inheritdoc}
     */
    public function getMetadata(string $key = '', string $domain = 'messages')
>>>>>>> 09f7352615a49bcbd90ba54bdbb06a7258875f45
>>>>>>> 9c86e61f634a9df0335d01cacf2ce0597478a84a
>>>>>>> 0f040bdc1886cac621b42cde3077632f83f9ad41
    {
        if ('' == $domain) {
            return $this->metadata;
        }

        if (isset($this->metadata[$domain])) {
            if ('' == $key) {
                return $this->metadata[$domain];
            }

            if (isset($this->metadata[$domain][$key])) {
                return $this->metadata[$domain][$key];
            }
        }

        return null;
    }

    public function setMetadata(string $key, mixed $value, string $domain = 'messages')
<<<<<<< HEAD
=======
=======
<<<<<<< HEAD
    public function setMetadata(string $key, mixed $value, string $domain = 'messages')
=======
    /**
     * {@inheritdoc}
     */
    public function setMetadata(string $key, $value, string $domain = 'messages')
>>>>>>> 09f7352615a49bcbd90ba54bdbb06a7258875f45
>>>>>>> 9c86e61f634a9df0335d01cacf2ce0597478a84a
>>>>>>> 0f040bdc1886cac621b42cde3077632f83f9ad41
    {
        $this->metadata[$domain][$key] = $value;
    }

    public function deleteMetadata(string $key = '', string $domain = 'messages')
    {
        if ('' == $domain) {
            $this->metadata = [];
        } elseif ('' == $key) {
            unset($this->metadata[$domain]);
        } else {
            unset($this->metadata[$domain][$key]);
        }
    }

<<<<<<< HEAD
=======
<<<<<<< HEAD
=======
<<<<<<< HEAD
>>>>>>> 9c86e61f634a9df0335d01cacf2ce0597478a84a
>>>>>>> 0f040bdc1886cac621b42cde3077632f83f9ad41
    public function getCatalogueMetadata(string $key = '', string $domain = 'messages'): mixed
    {
        if (!$domain) {
            return $this->catalogueMetadata;
        }

        if (isset($this->catalogueMetadata[$domain])) {
            if (!$key) {
                return $this->catalogueMetadata[$domain];
            }

            if (isset($this->catalogueMetadata[$domain][$key])) {
                return $this->catalogueMetadata[$domain][$key];
            }
        }

        return null;
    }

    public function setCatalogueMetadata(string $key, mixed $value, string $domain = 'messages')
    {
        $this->catalogueMetadata[$domain][$key] = $value;
    }

    public function deleteCatalogueMetadata(string $key = '', string $domain = 'messages')
    {
        if (!$domain) {
            $this->catalogueMetadata = [];
        } elseif (!$key) {
            unset($this->catalogueMetadata[$domain]);
        } else {
            unset($this->catalogueMetadata[$domain][$key]);
        }
    }

    /**
     * Adds current values with the new values.
     *
     * @param array $values Values to add
     */
    private function addMetadata(array $values)
    {
        foreach ($values as $domain => $keys) {
            foreach ($keys as $key => $value) {
                $this->setMetadata($key, $value, $domain);
            }
        }
    }

    private function addCatalogueMetadata(array $values)
    {
        foreach ($values as $domain => $keys) {
            foreach ($keys as $key => $value) {
                $this->setCatalogueMetadata($key, $value, $domain);
            }
        }
    }
}
