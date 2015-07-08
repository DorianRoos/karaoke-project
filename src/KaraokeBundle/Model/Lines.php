<?php
/**
 * Created by PhpStorm.
 * User: dorianroos
 * Date: 26/06/15
 * Time: 10:17
 */

namespace KaraokeBundle\Model;

use KaraokeBundle\Util\SplObjectStorageEnhanced;

class Lines extends SplObjectStorageEnhanced {
    /**
     * {@inheritdoc}
     *
     * @param  Line  $line
     * @return string
     */
    public function getHash($line)
    {
        return (string) $line->getId() ?: 'empty';
    }
}