<?php

class RabbitMq
{
    /**
     * 基于AMQP协议的消息中间件
     * 作用： 异步、削峰、解耦
     * queue 具有自己的 erlang 进程；exchange 内部实现为保存 binding 关系的查找表；
     * channel 是实际进行路由工作的实体，即负责按照 routing_key 将 message 投递给 queue 。
     * 由 AMQP 协议描述可知，channel 是真实 TCP 连接之上的虚拟连接，所有 AMQP 命令都是通过 channel 发送的，且每一个 channel 有唯一的 ID。
     * 一个 channel 只能被单独一个操作系统线程使用，故投递到特定 channel 上的 message 是有顺序的。但一个操作系统线程上允许使用多个 channel
     *
     * 如何保证RabbitMQ不被重复消费？
     *  正常情况下消息消费后会发送确认给消息队列，但是因为网络问题可能没发成功； 写入队列的数据做唯一标识，消费的时候根据唯一标识判断是否被消费过
     *
     *
     * 如何保证RabbitMQ消息的可靠传输？
     *  生产者丢失：
     *      transaction机制就是说：发送消息前，开启事务
     * 消息队列丢数据：
     *      开启磁盘持久化(将queue的持久化标识durable设置为true,则代表是一个持久的队列)
     * 消费者丢失数据：
     *      消费者消费数据后会自动回复确认，改为手动确认
     *
     *
     * 如何保证RabbitMQ消息的顺序性？
     *      单线程消费保障消息的顺序性；
     *      对消息进行编号，消费者处理消息根据消息的编号进行处理
     */
}