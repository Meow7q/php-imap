<?php
/*
* File:     MessageMovedEvent.php
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
 * Class MessageMovedEvent
 *
 * @package Meow7\Phpimap\Events
 */
class MessageMovedEvent extends Event {

    /** @var Message $old_message */
    public Message $old_message;

    /** @var Message $new_message */
    public Message $new_message;

    /**
     * Create a new event instance.
     * @var Message[] $messages
     *
     * @return void
     */
    public function __construct(array $messages) {
        $this->old_message = $messages[0];
        $this->new_message = $messages[1];
    }
}
