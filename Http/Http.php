<?php
/**
 * Created by PhpStorm.
 * User: zhongyu
 * Date: 2020/8/13
 * Time: 7:50 PM
 */

class Http
{

    // http�����Ľṹ  ������ ����ͷ ���� ������

    // ������ :  ����ʽGET��POST��Delete   �����ַ    http�汾 �ո�ֿ�

    // ����ͷ :
    //    Host : ����������
    //    Date : ��Ϣ��������
    //    User-Agent : ������������������͡�����ϵͳ����Ϣ
    //    Accept : �ͻ��˿�ʶ�����������
    //    Accept-Encoding : �ͻ��˿���ʶ��ı���
    //    Accept-Language : �ͻ���(�����)֧�ֵ���������
    //    Connection : �ͻ���/���������ӵ�һЩѡ��籣������: keep-alive
    //    Cookie : �ͻ���ͨ����cookie���������������
    //

    // http��Ӧ����  ��Ӧ�� ��Ӧͷ ��Ӧ��

    // ��Ӧ�� Э��汾 ״̬�� ����   http1.1  200 Success

    //  Allow => ������֧����Щ���󷽷�  GET POST
    //  Content-Encoding => �ĵ����뷽ʽ
    //  Content-Type => ������ĵ���ʲô���͵�
    //  Content-Length => ���ݳ���
    //  Date => ��ǰʱ��
    //  Refresh => ���������ˢ��ʱ�� (��λ��s)
    //  Transfer-Encoding => ������������ݵĴ��ͷ�ʽ
    //

    //  Http ��Ӧ״̬��
    //  101 �л�Э��   ������û������
    //  200 OK nice
    //  301 �������Դ�ѱ������ض���, ���ص���Ϣ�л�����µ�url����������Զ������µ�url
    //  302 ��ʱ�ƶ�������301������ֻ����ʱ��
    //  400 bad request �ͻ��������﷨���󣬷��������޷�����
    //  401 ��Ҫ��֤�û����
    //  402
    //  403 �ܾ�ִ��
    //  404 �Ҳ�����Դ
    //  405 ���󷽷�����ֹ
    //  500 �������ڲ�����
    //  501 ��������֧�������ܣ��޷��������
    //  502 ���յ���Ч������
    //  503 ��������ʱ�޷�����ͻ�������(����ϵͳ���ػ�ά��)
    //  504 ���������δ��ʱ��Զ�˷�������ȡ����
    //  505 ��������֧�������httpЭ��汾

    // ������д������ģʽ
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