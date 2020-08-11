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

    // interface �ӿڣ�ͨ���ؼ���interface���壬ʹ��ʱΪimplements�ؼ��֣��������ǹؼ���abstract����,ͨ����̳�ʵ��
    // һ�������ʵ�ֶ���ӿڣ�����ֻ��ʵ��һ��������
    // �ӿ��еķ���ֻ����public���������еĿ���ͨ��private public protected������


    // �ӿ� ���б���ʵ�ֽӿ��е����з���
    // ������ �����಻�ܱ�ʵ���� �������в������г��󷽷����������еĳ��󷽷����뱻����ȫ��ʵ�֣������಻���Խ����󷽷�����Ϊ˽�е�private


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

abstract class TestAbstractClass
{
    // �������еĳ��󷽷�������ʵ�֣����������޷����壬��{}
    abstract protected function getName($u_id);
    abstract protected function getSex($u_id);

    public function test()
    {
        print_r($this->getName(100));
    }
}

class NameTest extends TestAbstractClass
{
    // ����̳г��������ʵ�ֳ������е����г��󷽷�, ������ʵ�ֳ��󷽷�������Լ������ϸ����ͬ�����
    // �������Ϊprotected�� ����ʵ�ֿ���ʹprotected����public����������private
    protected function getName($u_id)
    {
        if (empty($u_id)) {
            return '';
        }
        return 'xiaoming';
    }

    public function getSex($u_id)
    {
        return 'girl';
    }
}