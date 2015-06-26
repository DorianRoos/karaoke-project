<?php
/**
 * Created by PhpStorm.
 * User: dorianroos
 * Date: 26/06/15
 * Time: 10:19
 */

namespace KaraokeBundle\Util;


class SplObjectStorageEnhanced extends \SplObjectStorage
{
    /**
     * Map hashcode by index to retrieve objects by index
     *
     * @var array
     */
    protected $map = array();

    /**
     * Current index of storage
     *
     * @var int
     */
    protected $index = -1;

    /**
     * Add an object to the storage
     * @param object $object
     * @param mixed $data
     */
    public function attach($object, $data = null) {
        $this->offsetSet($object, $data);
    }

    /**
     * Remove an object from the storage
     * @param object object
     */
    public function detach($object) {
        $this->offsetUnset($object);
    }

    /**
     * Add an object to the storage and set the internal pointer on it
     * @param object $object
     * @param mixed $data
     */
    public function offsetSet($object, $data) {
        if (!parent::contains($object)) {
            parent::attach($object, $data);
            $this->map[++$this->index] = $this->getHash($object);
            while(parent::valid()) {
                parent::next();
            }
        }
    }

    /**
     * Remove an object from the storage
     * @param object object
     */
    public function offsetUnset($object) {
        if (parent::contains($object)) {
            parent::offsetUnset($object);
            $index = array_search($this->getHash($object), $this->map, true);
            unset($this->map[$index]);
        }
    }

    /**
     * Returns the object identified by its hashcode
     * @param string $hash
     *
     * @return object|null
     */
    public function getObjectByHash($hash) {
        $index = array_search((string) $hash, $this->map, true);
        if (false !== $index) {
            parent::rewind();
            while(parent::valid()) {
                if (parent::key() === $index) {
                    return parent::current();
                }
                parent::next();
            }
        }
    }

    /**
     * Returns the object identified by its position in the storage
     * @param int $key
     *
     * @return object|null
     */
    public function getObjectByKey($key) {
        if (isset($this->map[$key])) {
            parent::rewind();
            while(parent::valid()) {
                if (parent::key() === $key) {
                    return parent::current();
                }
                parent::next();
            }
        }
    }

    /**
     * Returns the position of an object in the storage
     * Object identified by its hashcode
     * @param string $hash
     *
     * @return int|null
     */
    public function getKeyByHash($hash) {
        $index = array_search((string) $hash, $this->map, true);
        return (false === $index) ? null : $index;
    }

    /**
     * Returns the hashcode of an object identified by its position
     * @param int $key
     *
     * @return string|null
     */
    public function getHashByKey($key) {
        return $this->map[$key];
    }

    /**
     * Move the internal pointer to an object identified by its hashcode
     * @param mixed $hash
     * @return bool false if the object doesn't exist
     */
    public function selectObjectByHash($hash) {
        $index = array_search((string) $hash, $this->map, true);
        return (false !== $index)
            ? $this->selectObjectByKey($index)
            : false;
    }

    /**
     * Move the internal pointer to an object identified by its position in the storage
     * @param int $key
     * @return bool false if the object doesn't exist
     */
    public function selectObjectByKey($key) {
        if (isset($this->map[$key])) {
            parent::rewind();
            while(parent::valid()) {
                if (parent::key() === $key) {
                    return true;
                }
                parent::next();
            }
        }
        return false;
    }

    /**
     * Removes all items
     *
     * @return SplObjectStorage
     */
    public function clear()
    {
        $this->rewind();
        while($this->valid()) {
            $this->offsetUnset($this->current());
        }

        if ($this->valid()) {
            $this->offsetUnset($this->current());
        }

        return $this;
    }
}
