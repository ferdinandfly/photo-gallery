<?php
/**
 * This file is part of the <orientation> project.
 *
 * (c) <Hao TAN> <h.tan@kreactive.com>
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace Application\Sonata\MediaBundle\Component;

/**
 * Class UploaderFunctions
 * @package Application\Sonata\MediaBundle\Component
 */
class UploaderFunctions
{
    private static $msgShowed = false;

    /**
     * @return bool
     */
    public static function getMsgShowed()
    {
        return self::$msgShowed;
    }

    /**
     * @return mixed
     */
    public static function getLimit()
    {
        $maxUpload = (int) (ini_get('upload_max_filesize'));
        $maxPost = (int) (ini_get('post_max_size'));
        $memoryLimit = (int) (ini_get('memory_limit'));
        self::$msgShowed = true;

        return min($maxUpload, $maxPost, $memoryLimit);
    }
}