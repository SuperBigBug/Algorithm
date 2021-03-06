<?php

class Base
{
    // CGI common gateway interface (人话: 通用网关接口)
    # web服务器和请求处理程序之间数据传输的一种标准或是协议，遵循这个标准就可以用任何动态语言实现程序处理

    // CGI 程序工作方式：
    # web服务器一般只处理静态请求，类似jpg， htm，html等，如果是一个动态脚本请求(php)，web服务器主进程会
    # fork一个子进程来启动CGI程序，也就是将动态脚本请求交给CGI来处理。
    # 启动CGI需要一个过程，比如加载配置文件、加载扩展等。CGI程序启动后会自动解析动态脚本，然后将结果返回给
    # 服务器，服务器将结果返回给客户端，fork的子进程也随之关闭。

    # 每次客户端去请求动态脚本，web服务器都需要fork一个子进程去处理，处理完毕后再释放掉，效率低下。

    // Fast CGI （快速通用网关接口） cgi的优化升级， 减少web服务器和cgi程序之间的互动开销
    # fast cgi 主要作用就是将CGI解释器进程保存在内存中来获取更高的性能
    # fast cgi进程管理器需要单独启动，启动后会生成一个fast-cgi主进程和多个子进程(就是cgi解释器)
    # 客户端请求web服务器上的动态脚本时，web服务器会将动态脚本交给fast-cgi主进程，fast-cgi根据情况
    # 安排子进程来解析动态脚本，处理完成后返回给web服务器，返回给客户端
    # fast-cgi子进程不会关闭而是继续等待主进程安排任务

    # cgi是所谓的短生命周期的应用程序，fast-cgi是长生命周期的应用程序

    // PHP-fpm
    # 是php fast-cgi运行模式的一个进程管理器
    # 进程管理器, 提供更好地php进程管理方式，可以有效的控制内存、平滑重载php配置等
    # fpm是多进程模型，由master fork出多个worker子进程完成请求的处理
    # master三种不同进程管理方式: 静态模式、动态模式、按需模式

    /** PHP显示客户端、服务端ip */
    # $_SERVER['REMOTE_ADDR']
    # $_SERVER['SERVER_ADDR']

    /** require include */
    # 在引入一个不存在文件时，include只会产生警告，require会导致一个致命的错误并中断程序
    # require_once 只引入一次，引入过的就不再引入了


}