<?php
/**
 * Created by PhpStorm.
 * User: zhongyu
 * Date: 2020/8/27
 * Time: 11:21 AM
 */

class DNS
{
    /** DNS解析域名过程 */
    # 1、 浏览器最先检查本地缓存有没有当前域名对应的ip缓存, 有解析结束;
    # 2、 浏览器缓存没有, 浏览器会检测操作系统中的有没有对应的结果(etc/hosts) ,有 解析结束
    # 3、 操作系统也没有, 请求本地域名服务解析(LDNS), 该服务器一般在当前城市某个角落, 会缓存大部分域名, 可以解决80%, 查到, 解析结束
    # 4、 如果LDNS也没查到, 则去root serve请求解析
    # 5、 根域名服务器返回给LDNS一个所查询域名的主域名服务器地址(dTLD Server 国际顶尖域名服务器 .com .cn 等)
    # 6、 此时LDNS发送请求到gTDL Server
    # 7、 LDNS缓存ip信息并返回给客户端, 域名解析结束


}