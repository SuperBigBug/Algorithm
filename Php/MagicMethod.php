<?php
/**
 * Created by PhpStorm.
 * User: zhongyu
 * Date: 2020/8/11
 * Time: 4:02 PM
 */

class MagicMethod
{
    public function __autoload()
    {
        // �Զ�����
        // ��ʵ����һ����������ʱ�򣬻��Զ����ø÷����������Ӧ���ļ�
    }


    public function __construct()
    {
        //���췽��
        // ʵ����һ�������ʱ��ϵͳ���Զ����øú���, �ò���֧�ֲ���
    }

    public function __destruct()
    {
        // TODO: Implement __destruct() method.
        // ���������Ƕ���������֮ǰ�Զ����õ�
    }

    public function __clone()
    {
        // TODO: Implement __clone() method.
        // �ڿ�¡һ�������ʱ���Զ�����, ��¡�����Ķ����ǲ������һ��ʵ���أ� ����ʹ��instanceof�ж�, ����true or false
    }

    // __get() ������һ��δ����������ʱ��(�����Ե�ǰ�ࡢ���಻����ʱ)���ø÷������������Ϊ������
    // __set() ����һ��δ���������Ը�ֵʱ���ø÷���������ֵΪ��������ֵ

}