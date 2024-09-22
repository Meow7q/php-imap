<?php
/*
* File:     FlagNewEvent.php
* Category: Event
* Author:   M. Goldenbaum
* Created:  25.11.20 22:21
* Updated:  -
*
* Description:
*  -
*/

namespace Meow7\Phpimap\Events;

use Meow7\Phpimap\Message;

/**
 * Class FlagNewEvent
 *
 * @package Meow7\Phpimap\Events
 */
class FlagNewEvent extends Event {

    /** @var Message $message */
    public Message $message;

    /** @var string $flag */
    public string $flag;

    /**
     * Create a new event instance.
     * @var array $arguments
     *
     * @return void
     */
    public function __construct(array $arguments) {
        $this->message = $arguments[0];
        $this->flag = $arguments[1];
    }
}
