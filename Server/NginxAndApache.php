<?php

class NginxAndApache
{
    /** apache */
    # apache 是一个连接一个进程，每个请求都会建立一个进程



    /** nginx */
    # nginx 是一个进程可以处理多个请求



    /** nginx较apache 的优点 */
    # 轻量级，同样的web服务占用的内存及资源更少
    # 高并发，nginx处理请求是异步非阻塞的，apache是阻塞型


    /** apache 较 nginx 的优点 */
    # rewrite功能更为强大
    # bug较nginx更少
    # 稳定
}