<?php

class Todo
{
    // todo dns域名解析过程
    // https://blog.csdn.net/qq_18254385/article/details/100052417
    /**
     * 1、DNS客户端（DNS_Client）检查HOSTS文件及本地DNS缓存，没有找到对应的记录；
     * 2、DNS_Client 联系本地的DNS服务器（DNS_Server），查询域名www.google.com；
     * 3、DNS_Server 联系根提示中的某个根域服务器（Root_Server），查询域名www.google.com；
     * 4、根域名服务器（Root_Server）也不知道www.google.com的对应值，于是向 DNS_Server 返回一个参考答复，告诉其.com顶级域的权威DNS服务器（.com_DNS_Server）;
     * 5、DNS_Server 联系 .com_DNS_Server ，查询域名 www.google.com；
     * 6、.com_DNS_Server 也不知道www.google.com的对应值，于是就向 DNS_Server 返回一个参考答复，告诉它google.com域的权威DNS服务器（google.com_DNS_Server）地址；
     * 7、DNS_Server 联系 google.com_DNS_Server，查询域名 www.google.com；
     * 8、google.com_DNS_Server 知道对应IP地址（IP_Address），并将其返回给DNS_Server；
     * 9、DNS_Server 向 DNS_Client 返回 www.google.com 的 IP_Address；
     * 0、DNS_Client 向 IP_Address 的服务器发送数据传输请求，建立连接，解析完毕。
     *
     */
}