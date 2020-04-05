<?php

/**
 * 460. LFU缓存
 * Class LFUCache
 * https://leetcode-cn.com/problems/lfu-cache/
 */
class LFUCache
{

    /**
     * @var int
     */
    private $capacity;

    /**
     * @var int
     */
    private $min_freq = 0;

    /**
     * @var LFUCacheNode[][]
     */
    private $freq_table = [];

    /**
     * @var array
     */
    private $key_table = [];

    /**
     * @param Integer $capacity
     */
    function __construct($capacity)
    {
        $this->capacity = $capacity;
    }

    /**
     * @param Integer $key
     * @return Integer
     */
    function get($key)
    {
        if (isset($this->key_table[$key])) {
            list($freq, $index) = $this->key_table[$key];
            $cache = $this->freq_table[$freq][$index];
            $cache->freq();
            unset($this->freq_table[$freq][$index]);
            if (count($this->freq_table[$this->min_freq]) == 0) {
                $this->min_freq++;
            }
            $this->freq_table[$cache->getFreq()][] = $cache;
            end($this->freq_table[$cache->getFreq()]);
            $this->key_table[$key] = [$cache->getFreq(), key($this->freq_table[$cache->getFreq()])];
            return $cache->getValue();
        }
        return -1;
    }

    /**
     * @param Integer $key
     * @param Integer $value
     * @return NULL
     */
    function put($key, $value)
    {
        if (!$this->capacity) {
            return;
        }
        if ($this->key_table[$key]) {
            //覆盖值
            list($freq, $index) = $this->key_table[$key];
            $cache = $this->freq_table[$freq][$index];
            $cache->freq();
            $cache->setValue($value);
            unset($this->freq_table[$freq][$index]);
            if (count($this->freq_table[$this->min_freq]) == 0) {
                $this->min_freq++;
            }
        } else {
            //新赋值
            if (count($this->key_table) >= $this->capacity) {
                $unset_cache = reset($this->freq_table[$this->min_freq]);
                unset($this->freq_table[$this->min_freq][key($this->freq_table[$this->min_freq])]);
                unset($this->key_table[$unset_cache->getKey()]);
            }
            $cache = new LFUCacheNode($key, $value);
            $this->min_freq = 1;
        }
        $this->freq_table[$cache->getFreq()][] = $cache;
        end($this->freq_table[$cache->getFreq()]);
        $this->key_table[$key] = [$cache->getFreq(), key($this->freq_table[$cache->getFreq()])];
    }
}

/**
 * Class LFUCacheNode
 * 缓存类
 */
class LFUCacheNode
{
    private $key;
    private $value;
    private $freq = 1;

    public function __construct($key, $value)
    {
        $this->key = $key;
        $this->value = $value;
    }

    public function freq()
    {
        $this->freq++;
    }

    /**
     * @return mixed
     */
    public function getKey()
    {
        return $this->key;
    }

    /**
     * @return mixed
     */
    public function getValue()
    {
        return $this->value;
    }

    /**
     * @param mixed $value
     * @return LFUCacheNode
     */
    public function setValue($value)
    {
        $this->value = $value;
        return $this;
    }

    /**
     * @return int
     */
    public function getFreq(): int
    {
        return $this->freq;
    }
}

/**
 * Your LFUCache object will be instantiated and called as such:
 * $obj = LFUCache($capacity);
 * $ret_1 = $obj->get($key);
 * $obj->put($key, $value);
 */