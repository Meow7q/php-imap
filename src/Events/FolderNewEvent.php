<?php
/*
* File:     FolderNewEvent.php
* Category: Event
* Author:   M. Goldenbaum
* Created:  25.11.20 22:21
* Updated:  -
*
* Description:
*  -
*/

namespace Meow7\Phpimap\Events;

use Meow7\Phpimap\Folder;

/**
 * Class FolderNewEvent
 *
 * @package Meow7\Phpimap\Events
 */
class FolderNewEvent extends Event {

    /** @var Folder $folder */
    public Folder $folder;

    /**
     * Create a new event instance.
     * @var Folder[] $folders
     *
     * @return void
     */
    public function __construct(array $folders) {
        $this->folder = $folders[0];
    }
}
