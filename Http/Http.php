<?php
/**
 * Created by PhpStorm.
 * User: zhongyu
 * Date: 2020/8/13
 * Time: 7:50 PM
 */

class Http
{

    /** 网络七层模型 */

    # 物理层 :
    # 数据链路层 : 接受物理层的位流形式的数据转转换成帧并传输到上一层; 数据单位:帧
    # 网络层 : 协议ip等 数据单位(数据包) 负责寻址和路由选择
    # 传输层 : TCP、UDP等协议
    # 会话层 : 负责建立和断开通信连接
    # 表示层 : 将数据格式转换为网络标准格式
    # 应用层 : 为应用提供相应服务 http ftp dns smtp等协议

    /** 一个页面从输入URL到页面加载显示完成，这个过程都发生什么？  */

    # 在浏览器输入url，浏览器查询缓存，如果有直接渲染数据
    # dns域名解析，获取相应的IP地址
    # 浏览器发起tcp三次握手，建立连接
    # 客户端与服务器建立连接后，客户端向服务器发送http请求，请求数据包
    # 服务器处理收到的请求，将数据返回给客户端浏览器
    # 浏览器收到响应后读取数据，解析渲染
    # 三次挥手关闭链接
    #

    /** http请求报文结构  请求行 请求头 空行 请求体 */

    // 请求行 :  请求方式GET、POST、Delete   请求地址    http版本 空格分开

    // 请求头 :
    //    Host : 请求主机名
    //    Date : 消息产生日期
    //    User-Agent : 发送请求浏览器的类型、操作系统的信息
    //    Accept : 客户端可识别的内容类型
    //    Accept-Encoding : 客户端可以识别的编码
    //    Accept-Language : 客户端(浏览器)支持的语言类型
    //    Connection : 客户端/服务器连接的一些选项，如保持连接: keep-alive
    //    Cookie : 客户端通过该cookie向服务器带送数据
    //

    // http响应报文  响应行 响应头 响应体

    // 响应行 协议版本 状态码 描述   http1.1  200 Success

    //  Allow => 服务器支持哪些请求方法  GET POST
    //  Content-Encoding => 文档编码方式
    //  Content-Type => 后面的文档是什么类型的
    //  Content-Length => 内容长度
    //  Date => 当前时间
    //  Refresh => 告诉浏览器刷新时间 (单位：s)
    //  Transfer-Encoding => 告诉浏览器数据的传送方式
    //

    //  Http 响应状态码
    //  101 切换协议   这玩意没见到过
    //  200 OK nice
    //  301 请求的资源已被永久重定向, 返回的信息中会包含新的url，浏览器会自动定向到新的url
    //  302 临时移动，类似301，但是只是临时的
    //  400 bad request 客户端请求语法错误，服务器端无法解析
    //  401 需要认证用户身份
    //  402
    //  403 拒绝执行
    //  404 找不到资源
    //  405 请求方法被禁止
    //  500 服务器内部错误
    //  501 服务器不支持请求功能，无法完成请求
    //  502 接收到无效的请求
    //  503 服务器暂时无法处理客户端请求(由于系统超载或维护)
    //  504 代理服务器未及时从远端服务器获取请求
    //  505 故武器不支持请求的http协议版本

    // http和https的区别
    //   http明文传输，如果截取了报文就能直接看懂，https安全套接字层超文本传输协议，https在http的基础上添加了ssl/tls协议，
    //   使用证书验证身份，并对传输的数据进行加密

    // 连练手写个单例模式
    static private $instance;

    private function __clone()
    {
        // TODO: Implement __clone() method.
    }

    private function __construct()
    {
    }

    static function getInstance()
    {
        if (!self::$instance instanceof self) {
            self::$instance = new self();
        }
        return self::$instance;
    }

    public function test()
    {
        return 'Hello zhong yu!';
    }
}

$msg = Http::getInstance()->test();