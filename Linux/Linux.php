<?php

class Linux
{
    /**
     * =========================  Linux常用命令 Fuck  ===================================
     *
     * iftop                            显示网卡的实时流量(ip、端口等信息)    唱吧面试
     *
     * nohup                            后台运行脚本
     * tar -cvf filename                压缩文件
     * tar -zcvf filename               解压缩文件
     * kill -9 id                       杀掉进程
     * ps -ef | grep "xxx.service"      查询某个微服务进程
     * su                               切换用户到root
     * top                              查询内存占用
     * df -f                            查询磁盘使用空间
     * netstat
     *              -t                  tcp端口
     *              -u                  udp端口
     * netstat -nutlp | grep 80         查看所有80端口使用情况
     * ps -ef | grep "mysqld"           查看一个服务占用几个端口
     * mv                               重命名或是移动文件
     * more filename                    分页显示文件内容
     * cat                              直接显示所有内容
     * Head -n filename                 前n行
     * ps                               显示瞬间进程状态        pstre
     * date                             显示系统日期时间
     * ping                             查看网络是否畅通
     * telnet                           远程登录
     * wc                               统计
     *                      -l          行数
     *                      -c          字符数
     *                      -w          字数
     * file                             查看文件类型
     * chown                            改变文件所有者
     * chmod                            改变文件权限
     * jobs                             显示后台或是挂起的进程
     * sort -r                          逆序排序
     * crontab                          定时任务
     * ps aux                           查看服务器性能指标

     * ===========================  未完待续  =================================
     */

    /**
     * grep 命令
     *
     * 当你只想搜索某个单词时，比如你想搜索的是单词 error ，grep 命令会输出所有包含 error 字符串的行
     * 即它除了会输出包含 error 单词的行，还会输出包含 errorless 或 antiterrorists 等非 error 单词的行
     * 解决：
     * grep -w "error" error.log
     *
     * grep命令默认区分大小写
     * grep -i 'error' /usr/local/log/error.log 不区分大小写查找error
     *
     * grep匹配多个字符
     * grep 'str1\|str2' /log/test.log
     *
     *
     *
     */
}