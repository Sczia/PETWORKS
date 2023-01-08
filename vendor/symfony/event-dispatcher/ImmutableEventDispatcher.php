<?php

/*
 * This file is part of the Symfony package.
 *
 * (c) Fabien Potencier <fabien@symfony.com>
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace Symfony\Component\EventDispatcher;

/**
 * A read-only proxy for an event dispatcher.
 *
 * @author Bernhard Schussek <bschussek@gmail.com>
 */
class ImmutableEventDispatcher implements EventDispatcherInterface
{
    private $dispatcher;

    public function __construct(EventDispatcherInterface $dispatcher)
    {
        $this->dispatcher = $dispatcher;
    }

    public function dispatch(object $event, string $eventName = null): object
    {
        return $this->dispatcher->dispatch($event, $eventName);
    }

<<<<<<< HEAD
    public function addListener(string $eventName, callable|array $listener, int $priority = 0)
=======
    /**
     * {@inheritdoc}
     */
    public function addListener(string $eventName, $listener, int $priority = 0)
>>>>>>> 09f7352615a49bcbd90ba54bdbb06a7258875f45
    {
        throw new \BadMethodCallException('Unmodifiable event dispatchers must not be modified.');
    }

    public function addSubscriber(EventSubscriberInterface $subscriber)
    {
        throw new \BadMethodCallException('Unmodifiable event dispatchers must not be modified.');
    }

<<<<<<< HEAD
    public function removeListener(string $eventName, callable|array $listener)
=======
    /**
     * {@inheritdoc}
     */
    public function removeListener(string $eventName, $listener)
>>>>>>> 09f7352615a49bcbd90ba54bdbb06a7258875f45
    {
        throw new \BadMethodCallException('Unmodifiable event dispatchers must not be modified.');
    }

    public function removeSubscriber(EventSubscriberInterface $subscriber)
    {
        throw new \BadMethodCallException('Unmodifiable event dispatchers must not be modified.');
    }

<<<<<<< HEAD
    public function getListeners(string $eventName = null): array
=======
    /**
     * {@inheritdoc}
     */
    public function getListeners(string $eventName = null)
>>>>>>> 09f7352615a49bcbd90ba54bdbb06a7258875f45
    {
        return $this->dispatcher->getListeners($eventName);
    }

<<<<<<< HEAD
    public function getListenerPriority(string $eventName, callable|array $listener): ?int
=======
    /**
     * {@inheritdoc}
     */
    public function getListenerPriority(string $eventName, $listener)
>>>>>>> 09f7352615a49bcbd90ba54bdbb06a7258875f45
    {
        return $this->dispatcher->getListenerPriority($eventName, $listener);
    }

<<<<<<< HEAD
    public function hasListeners(string $eventName = null): bool
=======
    /**
     * {@inheritdoc}
     */
    public function hasListeners(string $eventName = null)
>>>>>>> 09f7352615a49bcbd90ba54bdbb06a7258875f45
    {
        return $this->dispatcher->hasListeners($eventName);
    }
}
