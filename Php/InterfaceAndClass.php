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