<?php
/**
 * Created by PhpStorm.
 * User: zhongyu
 * Date: 2020/8/13
 * Time: 7:50 PM
 */

class Http
{

    // http请求报文结构  请求行 请求头 空行 请求体

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