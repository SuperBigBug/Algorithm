<?php
/**
 * Created by PhpStorm.
 * User: zhongyu
 * Date: 2020/8/11
 * Time: 4:02 PM
 */

class InterfaceAndClass
{
    // ��̬�����е��þ�̬����  ::
    // ��̬�����е�����ͨ����(new self())->func
    // ��ͨ�������þ�̬���� ::
    // ��ͨ����������ͨ���� -> ::
    // ������þ�̬���� ::
    // ���������ͨ���� ->
    // �����ؼ��� const ���� :: (self::   )   (ClassName::   )

    // ���������η� private protected public
    // public������λ�ÿ��Է���
    // private ֻ���ڵ�ǰ���ڷ��� self::
    // protected �ڵ�ǰ��͵�ǰ���������Է���, ��ǰ��self::    ����parent::


    public function eat()
    {
        self::read();
        $this->people();
        self::people();
    }

    static public function read()
    {

    }

    public function people()
    {
        $this->eat();

        self::read();
        self::eat();
    }

    static public function man()
    {
        self::read();

        // false
        //self::eat();
        (new self())->eat();
    }

    protected function laugh()
    {
        return 'hhah';
    }
    private function cry()
    {
        return 'wuwuwu';
    }

    public function test(){
        self::laugh();
        self::cry();
    }
}

class Test extends InterfaceAndClass
{
    public function woman()
    {
        parent::laugh();
    }

}

InterfaceAndClass::read();

$obj = new InterfaceAndClass();
$obj->eat();
$obj->people();