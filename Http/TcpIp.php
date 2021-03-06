<?php

class TcpIp
{
    /** TCP/IP 三次握手*/
    # TCP Transmission Control Protocol (传输控制协议)
    # 面向有链接的传输层可靠的传输协议


    # 为什么要进行TCP三次握手 ?
    # 1、指定初始化序列号，为后面的可靠传输做准备
    # 2、如果是https协议的话， 还会对数字证书进行验证和加密秘钥的生成
    # 3、为了确认双方发送与接受状态都正常

    /** TCP 为什么不是一次、两次握手 ？ */
    # 防止服务端一直等待浪费资源
    # 防止已经失效的连接请求报文段发送到服务端，产生错误。如果此时客户端发送的延迟的握手请求到达服务端，
    # 服务器端认为与客户端建立了新的传输通道，但是客户端已经没建立链接的意思了，服务端一直等待客户端发送请求数据，白白浪费服务端资源

    # 白话版：客户端发起一次连接请求，因为一些异常未收到确认，再次发起一次连接，第二次连接成功后开始数据传输，
    # 传输完毕后释放了连接；此时第一个连接可能是因为某些网络原因延迟到达了，这是服务端以为再次请求建立链接，
    # 于是一直等待客户端发送数据，这样造成服务端资源浪费

    /** 为什么连接的时候是三次握手断开连接的时候是四次挥手？ */
    # 因为创建连接的时候客户端发送SYN后服务端可以直接发送SYN+ACK报文，SYN用来同步ACK用来确认应答。
    # 关闭连接时客户端发送FIN后服务端不一定能立马关闭socket，只能先告诉客户端我收到请求了，

    /** 为什么TIME_WAIT要经过2MSL(最大报文生存时间)才能返回到close状态? */
    # 有可能第四次挥手客户端发出的ACK报文丢失，这样服务端会再次重发FIN报文到客户端
    # 客户端发出ACK后会计时2MSL，在这期间如果ACK报文丢失，服务端会发送FIN，客户端继续发送ACK，
    # 如果在该时间段内没收到FIN报文，则认为服务端已经成功接收ACK，结束链接

    /** 如果建立连接后客户端出现故障了怎么办？  */
    # 服务端有一个计时器，客户端发送一次请求到服务端该计时器清零
    # 如果超过两个小时(默认两个小时)未收到请求，服务端会发送探测报文段，每75秒发送一次，
    # 若连续超过10个仍然没响应则直接断开tcp连接

    # TCP UDP的区别: (User Datagram Protocol)
    # TCP 有连接 传输速度较慢，可靠性高
    # UDP 无连接 传输速度更快，可靠性较差

    // ACK ACK=1 确认应答的字段有效 (确认号字段)
    // SYN 用于建立连接 SYN=1 表示希望建立连接 ()
    // FIN FIN=1 表示今后不再有数据发送，希望断开连接
    // seq 为序列号，为了连接以后传输数据使用
    // ack为确认号，为当前待接收的数据包的序列号

    /**
     *                          三次握手过程
     *          client                                   server
     *            ||             SYN=1 seq =x              ||
     *            ||------------------------------->>------||
     *            ||                                       ||
     *            ||                                       ||
     *            ||                                       ||
     *            ||    SYN=1,ACK=1,seq=y,ack=x+1          ||
     *            || -------------------<<-----------------||
     *            ||                                       ||
     *            ||                                       ||
     *            ||                                       ||
     *            ||      ACK=1, seq=x+1, ack=y+1          ||
     *            ||------------------------>>-------------||
     *            ||                                       ||
     *            ||                                       ||
     *            ||<<---------建立连接，开始传输数据-------->>||
     *            ||                                       ||
     * */


    /**
     *                      四次挥手过程
     *
     *          client                                   server
     *            ||              FIN=1 seq=u              ||
     *            ||------------------------------->>------||
     *            ||                                       ||
     *            ||                                       ||
     *            ||                                       ||
     *            ||        ACK=1 ack=u+1 seq=v            ||
     *            || -------------------<<-----------------||
     *            ||                                       ||
     *            ||                                       ||
     *            ||                                       ||
     *            ||                                       ||
     *            ||        FIN=1 ACK=1 ack=u+1  seq=w     ||
     *            ||---------------------<<----------------||
     *            ||                                       ||
     *            ||                                       ||
     *            ||                                       ||
     *            ||      ACK=1, seq=u+1, ack=w+1          ||
     * 等 2MSL    ||------------------------>>-------------||
     *            ||                                       ||
     *            ||                                       ||
     *            ||<<---------建立连接，开始传输数据-------->>||
     *            ||                                       ||
     */
}