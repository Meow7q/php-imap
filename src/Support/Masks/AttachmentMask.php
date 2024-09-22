<?php
/*
* File: AttachmentMask.php
* Category: Mask
* Author: M.Goldenbaum
* Created: 14.03.19 20:49
* Updated: -
*
* Description:
*  -
*/

namespace Meow7\Phpimap\Support\Masks;

use Meow7\Phpimap\Attachment;

/**
 * Class AttachmentMask
 *
 * @package Meow7\Phpimap\Support\Masks
 * @mixin Attachment
 */
class AttachmentMask extends Mask {

    /** @var Attachment $parent */
    protected mixed $parent;

    /**
     * Get the attachment content base64 encoded
     *
     * @return string|null
     */
    public function getContentBase64Encoded(): ?string {
        return base64_encode($this->parent->content);
    }

    /**
     * Get a base64 image src string
     *
     * @return string|null
     */
    public function getImageSrc(): ?string {
        return 'data:'.$this->parent->content_type.';base64,'.$this->getContentBase64Encoded();
    }
}