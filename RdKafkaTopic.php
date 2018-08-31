<?php

namespace Enqueue\RdKafka;

use Interop\Queue\PsrQueue;
use Interop\Queue\PsrTopic;
use RdKafka\TopicConf;

class RdKafkaTopic implements PsrTopic, PsrQueue
{
    /**
     * @var string
     */
    private $name;

    /**
     * @var TopicConf
     */
    private $conf;

    /**
     * @var array
     */
    private $partitions = [];

    /**
     * @var string|null
     */
    private $key;

    /**
     * @param string $name
     */
    public function __construct($name)
    {
        $this->name = $name;
    }

    /**
     * {@inheritdoc}
     */
    public function getTopicName()
    {
        return $this->name;
    }

    /**
     * {@inheritdoc}
     */
    public function getQueueName()
    {
        return $this->name;
    }

    /**
     * @return TopicConf|null
     */
    public function getConf()
    {
        return $this->conf;
    }

    /**
     * @param TopicConf|null $conf
     */
    public function setConf(TopicConf $conf = null)
    {
        $this->conf = $conf;
    }

    /**
     * BC.
     *
     * @return int
     *
     * @deprecated use getPartitions() method instead
     */
    public function getPartition()
    {
        return $this->partitions[0] ?? null;
    }

    /**
     * BC.
     *
     * @param int $partition
     *
     * @deprecated use setPartitions() method instead
     */
    public function setPartition($partition)
    {
        $this->partitions = [$partition];
    }

    /**
     * @return array
     */
    public function getPartitions()
    {
        return $this->partitions;
    }

    /**
     * @param array $partitions
     */
    public function setPartitions($partitions)
    {
        $this->partitions = $partitions;
    }

    /**
     * @return string|null
     */
    public function getKey()
    {
        return $this->key;
    }

    /**
     * @param string|null $key
     */
    public function setKey($key)
    {
        $this->key = $key;
    }
}
