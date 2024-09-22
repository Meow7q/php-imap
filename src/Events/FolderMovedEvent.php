<?php
/*
* File:     FolderMovedEvent.php
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
 * Class FolderMovedEvent
 *
 * @package Meow7\Phpimap\Events
 */
class FolderMovedEvent extends Event {

    /** @var Folder $old_folder */
    public Folder $old_folder;

    /** @var Folder $new_folder */
    public Folder $new_folder;

    /**
     * Create a new event instance.
     * @var Folder[] $folders
     *
     * @return void
     */
    public function __construct(array $folders) {
        $this->old_folder = $folders[0];
        $this->new_folder = $folders[1];
    }
}
