<?php
/**
 * Created by PhpStorm.
 * User: zhongyu
 * Date: 2020/8/11
 * Time: 4:02 PM
 */

class InterfaceAndClass
{
    // 静态方法中调用静态方法  ::
    // 静态方法中调用普通方法(new self())->func
    // 普通方法调用静态方法 ::
    // 普通方法调用普通方法 -> ::
    // 类外调用静态方法 ::
    // 类外调用普通方法 ->
    // 声明关键字 const 访问 :: (self::   )   (ClassName::   )

    // 作用域修饰符 private protected public
    // public在任意位置可以访问
    // private 只能在当前类内访问 self::
    // protected 在当前类和当前类的子类可以访问, 当前类self::    子类parent::

    // interface 接口，通过关键字interface定义，使用时为implements关键字；抽象类是关键字abstract定义,通过类继承实现
    // 一个类可以实现多个接口，但是只能实现一个抽象类
    // 接口中的方法只能是public，抽象类中的可以通过private public protected等修饰


    // 接口 类中必须实现接口中的所有方法, 接口中的方法必须都是公有的，不能是private或是protected
    // 抽象类 抽象类不能被实例化 抽象类中不必须有抽象方法，抽象类中的抽象方法必须被子类全部实现，抽象类不可以将抽象方法定义为私有的private


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
    // 抽象类中的抽象方法由子类实现，抽象类中无方法体，无{}
    abstract protected function getName($u_id);
    abstract protected function getSex($u_id);

    public function test()
    {
        print_r($this->getName(100));
    }
}

class NameTest extends TestAbstractClass
{
    // 子类继承抽象类必须实现抽象类中的所有抽象方法, 子类中实现抽象方法的限制约束必须较父类等同或宽松
    // 如抽象类为protected， 子类实现可以使protected或是public但不可以是private
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

interface Car
{
    public function getCarName();
}

interface Road
{
    public function getLength();
}

class AAA implements Car, Road
{
    public function getCarName()
    {
        // TODO: Implement getCarName() method.
    }

    public function getLength()
    {
        // TODO: Implement getLength() method.
    }
}