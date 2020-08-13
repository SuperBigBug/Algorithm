<?php
/**
 * Created by PhpStorm.
 * User: zhongyu
 * Date: 2020/8/13
 * Time: 2:43 PM
 */
class Index
{
    public function mysqlIndex()
    {
        /*
        1. 什么是索引?常见的索引有哪些？
        ​ 索引是一种数据结构,可以帮助我们快速的进行数据的查找.   普通索引 唯一索引 主键索引 组合索引 全文索引 空间索引

        2. 索引是个什么样的数据结构呢?
        ​ 索引的数据结构和具体存储引擎的实现有关, 在MySQL中使用较多的索引有Hash索引,B+树索引等,而我们经常使用的InnoDB存储引擎的默认索引实现为:B+树索引.

        3. Hash索引和B+树所有有什么区别或者说优劣呢?
         ​  Hash索引和B+树索引的底层实现原理:

​           hash索引底层就是hash表,进行查找时,调用一次hash函数就可以获取到相应的键值,之后进行回表查询获得实际数据.B+树底层实现是多路平衡查找树.对于每一次的查询都是从根节点出发,查找到叶子节点方可以获得所查键值,然后根据查询判断是否需要回表查询数据.
    ​       Hash索引与B+树的不同：
​           hash索引进行等值查询更快(一般情况下),但是却无法进行范围查询.因为在hash索引中经过hash函数建立索引之后,索引的顺序与原顺序无法保持一致,不能支持范围查询
​           B+树的的所有节点皆遵循(左节点小于父节点,右节点大于父节点,多叉树也类似),天然支持范围.
           hash索引不支持使用索引进行排序，hash索引不支持模糊查询以及多列索引的最左前缀匹配.原理也是因为hash函数的不可预测.AAAA和AAAAB的索引没有相关性.Hash索引任何时候都避免不了回表查询数据
        ​   B+树在符合某些条件(聚簇索引,覆盖索引等)的时候可以只通过索引完成查询.
           hash索引虽然在等值查询上较快,但是不稳定.性能不可预测,当某个键值存在大量重复的时候,发生hash碰撞,此时效率可能极差.
           B+树的查询效率比较稳定,对于所有的查询都是从根节点到叶子节点,且树的高度较低

        4. B+树在满足聚簇索引和覆盖索引的时候不需要回表查询数据,什么是聚簇索引?
        ​   在B+树的索引中,叶子节点可能存储了当前的key值,也可能存储了当前的key值以及整行的数据,这就是聚簇索引和非聚簇索引.
           在InnoDB中,只有主键索引是聚簇索引,如果没有主键,则挑选一个唯一键建立聚簇索引.如果没有唯一键,则隐式的生成一个键来建立聚簇索引.
           当查询使用聚簇索引时,在对应的叶子节点,可以获取到整行数据,因此不用再次进行回表查询

        5. 非聚簇索引一定会回表查询吗?
           不一定,这涉及到查询语句所要求的字段是否全部命中了索引,如果全部命中了索引,那么就不必再进行回表查询

        6. 在建立索引的时候,都有哪些需要考虑的因素呢?
           建立索引的时候一般要考虑到字段的使用频率,经常作为条件进行查询的字段比较适合.如果需要建立联合索引的话,还需要考虑联合索引中的顺序.
           此外也要考虑其他方面,比如防止过多的所有对表造成太大的压力.这些都和实际的表结构以及查询方式有关
           非空字段：应该指定列为NOT NULL，除非你想存储NULL。
           在mysql中，含有空值的列很难进行查询优化，因为它们使得索引、索引的统计信息以及比较运算更加复杂。你应该用0、一个特殊的值或者一个空串代替空值；
           取值离散大的字段：（变量各个取值之间的差异程度）的列放到联合索引的前面，可以通过count()函数查看字段的差异值，返回值越大说明字段的唯一值越多字段的离散程度高；
           索引字段越小越好：数据库的数据存储以页为单位一页存储的数据越多一次IO操作获取的数据越大效率越高。

        7. 创建的索引有没有被使用到?或者说怎么才可以知道这条语句运行很慢的原因?
        ​   MySQL提供了explain命令来查看语句的执行计划,MySQL在执行某个语句之前,会将该语句过一遍查询优化器,之后会拿到对语句的分析,也就是执行计划,
           其中包含了许多信息. 可以通过其中和索引有关的信息来分析是否命中了索引,例如possilbe_key,key,key_len等字段,分别说明了此语句可能会使用的索引,实际使用的索引以及使用的索引长度.

        8. 那么在哪些情况下会发生针对该列创建了索引但是在查询的时候并没有使用呢?

           使用不等于查询,列参与了数学运算或者函数在字符串like时左边是通配符.类似于’%aaa’
           当mysql分析全表扫描比使用索引快的时候不使用索引
           当使用联合索引,前面一个条件为范围查询,后面的即使符合最左前缀原则,也无法使用索引

        9. MySQL中索引的优点和缺点和使用原则
           优点：
           1、所有的MySql列类型(字段类型)都可以被索引，也就是可以给任意字段设置索引
           2、大大加快数据的查询速度
           缺点：
           1、创建索引和维护索引要耗费时间，并且随着数据量的增加所耗费的时间也会增加
           2、索引也需要占空间，我们知道数据表中的数据也会有最大上线设置的，如果我们有大量的索引，索引文件可能会比数据文件更快达到上线值
           3、当对表中的数据进行增加、删除、修改时，索引也需要动态的维护，降低了数据的维护速度。

        事务相关
        1. ACID是什么?可以详细说一下吗?
           A=Atomicity 原子性,就是上面说的,要么全部成功,要么全部失败.不可能只执行一部分操作.
           C=Consistency 系统(数据库)总是从一个一致性的状态转移到另一个一致性的状态,不会存在中间状态.
           I=Isolation 隔离性: 通常来说:一个事务在完全提交之前,对其他事务是不可见的.注意前面的通常来说加了红色,意味着有例外情况.
           D=Durability 持久性,一旦事务提交,那么就永远是这样子了,哪怕系统崩溃也不会影响到这个事务的结果.

        2.同时有多个事务在进行会怎么样呢?
           多事务的并发进行一般会造成以下几个问题:
           更新丢失：事物ab同事操作一条记录，事物a更新完后事物b更新，事物a的更新被覆盖
           脏读: A事务读取到了B事务未提交的内容,而B事务后面进行了回滚.
           不可重复读: 当设置A事务只能读取B事务已经提交的部分,会造成在A事务内的两次查询,结果竟然不一样,因为在此期间B事务进行了提交操作.
           幻读: A事务读取了一个范围的内容,而同时B事务在此期间插入了一条数据.造成"幻觉".
    3.MySQL的事务隔离级别了解吗?

        ​ MySQL的四种隔离级别如下:

未提交读(READ UNCOMMITTED)
这就是上面所说的例外情况了,这个隔离级别下,其他事务可以看到本事务没有提交的部分修改.因此会造成脏读的问题(读取到了其他事务未提交的部分,而之后该事务进行了回滚).

    这个级别的性能没有足够大的优势,但是又有很多的问题,因此很少使用.

    已提交读(READ COMMITTED)
其他事务只能读取到本事务已经提交的部分.这个隔离级别有 不可重复读的问题,在同一个事务内的两次读取,拿到的结果竟然不一样,因为另外一个事务对数据进行了修改.

    REPEATABLE READ(可重复读)
可重复读隔离级别解决了上面不可重复读的问题(看名字也知道),但是仍然有一个新问题,就是 幻读,当你读取id> 10 的数据行时,对涉及到的所有行加上了读锁,此时例外一个事务新插入了一条id=11的数据,因为是新插入的,所以不会触发上面的锁的排斥,那么进行本事务进行下一次的查询时会发现有一条id=11的数据,而上次的查询操作并没有获取到,再进行插入就会有主键冲突的问题.

    SERIALIZABLE(可串行化)
这是最高的隔离级别,可以解决上面提到的所有问题,因为他强制将所以的操作串行执行,这会导致并发性能极速下降,因此也不是很常用.

    4 Innodb使用的是哪种隔离级别呢?

        InnoDB默认使用的是可重复读隔离级别.

        锁相关
        1. MySQL的锁了解吗?

        ​ 当数据库有并发事务的时候,可能会产生数据的不一致,这时候需要一些机制来保证访问的次序,锁机制就是这样的一个机制.就像酒店的房间,如果大家随意进出,就会出现多人抢夺同一个房间的情况,而在房间上装上锁,申请到钥匙的人才可以入住并且将房间锁起来,其他人只有等他使用完毕才可以再次使用.

    2.MySQL都有哪些锁呢?像上面那样子进行锁定岂不是有点阻碍并发效率了?

        ​ 从锁的类别上来讲,有共享锁和排他锁.

    ​ 共享锁: 又叫做读锁. 当用户要进行数据的读取时,对数据加上共享锁.共享锁可以同时加上多个.

    ​ 排他锁: 又叫做写锁. 当用户要进行数据的写入时,对数据加上排他锁.排他锁只可以加一个,他和其他的排他锁,共享锁都相斥.

    ​ 用上面的例子来说就是用户的行为有两种,一种是来看房,多个用户一起看房是可以接受的. 一种是真正的入住一晚,在这期间,无论是想入住的还是想看房的都不可以.

    锁的粒度取决于具体的存储引擎,InnoDB实现了行级锁,页级锁,表级锁.他们的加锁开销从大大小,并发能力也是从大到小.

    3.什么是乐观锁？什么是悲观锁？

悲观锁（Pessimistic Lock）

当我们要对一个数据库中的一条数据进行修改的时候，为了避免同时被其他人修改，最好的办法就是直接对该数据进行加锁以防止并发。这种借助数据库锁机制，在修改数据之前先锁定，再修改的方式被称之为悲观并发控制（又名“悲观锁”，Pessimistic Concurrency Control，缩写“PCC”）。

悲观锁主要是共享锁或排他锁

共享锁又称为读锁，简称S锁。顾名思义，共享锁就是多个事务对于同一数据可以共享一把锁，都能访问到数据，但是只能读不能修改。
排他锁又称为写锁，简称X锁。顾名思义，排他锁就是不能与其他锁并存，如果一个事务获取了一个数据行的排他锁，其他事务就不能再获取该行的其他锁，包括共享锁和排他锁，但是获取排他锁的事务是可以对数据行读取和修改。
悲观并发控制实际上是“先取锁再访问”的保守策略，为数据处理的安全提供了保证。
但是在效率方面，处理加锁的机制会让数据库产生额外的开销，还有增加产生死锁的机会。另外还会降低并行性，一个事务如果锁定了某行数据，其他事务就必须等待该事务处理完才可以处理那行数据。
乐观锁（ Optimistic Locking ）

乐观锁是相对悲观锁而言的，乐观锁假设数据一般情况下不会造成冲突，所以在数据进行提交更新的时候，才会正式对数据的冲突与否进行检测，如果发现冲突了，则返回给用户错误的信息，让用户决定如何去做。

乐观并发控制相信事务之间的数据竞争(data race)的概率是比较小的，因此尽可能直接做下去，直到提交的时候才去锁定，所以不会产生任何锁和死锁。

在乐观锁与悲观锁的选择上面，主要看下两者的区别以及适用场景就可以了。

乐观锁并未真正加锁，效率高。一旦锁的粒度掌握不好，更新失败的概率就会比较高，容易发生业务失败。
悲观锁依赖数据库锁，效率低。更新失败的概率比较低。
存储引擎相关
1. MySQL支持哪些存储引擎?

        MySQL支持多种存储引擎,比如InnoDB,MyISAM,Memory,Archive等等.在大多数的情况下,直接选择使用InnoDB引擎都是最合适的,InnoDB也是MySQL的默认存储引擎.

    InnoDB和MyISAM有什么区别?
        InnoDB支持事物，而MyISAM不支持事物
        InnoDB支持行级锁，而MyISAM支持表级锁
InnoDB支持MVCC, 而MyISAM不支持
InnoDB支持外键，而MyISAM不支持
InnoDB不支持全文索引，而MyISAM支持。
2. 什么是存储过程？有哪些优缺点？

​ 存储过程是一些预编译的SQL语句。1、更加直白的理解：存储过程可以说是一个记录集，它是由一些T-SQL语句组成的代码块，这些T-SQL语句代码像一个方法一样实现一些功能（对单表或多表的增删改查），然后再给这个代码块取一个名字，在用到这个功能的时候调用他就行了。2、存储过程是一个预编译的代码块，执行效率比较高,一个存储过程替代大量T_SQL语句 ，可以降低网络通信量，提高通信速率,可以一定程度上确保数据安全

3.关心过业务系统里面的sql耗时吗?统计过慢查询吗?对慢查询都怎么优化过?

        慢查询的优化首先要搞明白慢的原因是什么? 是查询条件没有命中索引?是load了不需要的数据列?还是数据量太大?

            所以优化也是针对这三个方向来的,

首先分析语句,看看是否load了额外的数据,可能是查询了多余的行并且抛弃掉了,可能是加载了许多结果中并不需要的列,对语句进行分析以及重写.
    分析语句的执行计划,然后获得其使用索引的情况,之后修改语句或者修改索引,使得语句可以尽可能的命中索引.
    如果对语句的优化已经无法进行,可以考虑表中的数据量是否太大,如果是的话可以进行横向或者纵向的分表
零散试题相关
​ 1.列设置为 AUTO INCREMENT 时，如果在表中达到最大值，会发生什么情况?

        ​ 它会停止递增，任何进一步的插入都将产生错误，因为密钥已被使用。

​ 2.一张表，里面有 ID 自增主键，当 insert 了 17 条记录之后，删除了第 15,16,17 条记录， 再把 Mysql 重启，再 insert 一条记录，这条记录的 ID 是 18 还是 15 ?

        ​ 如果表的类型是 MyISAM，那么是 18。因为 MyISAM 表会把自增主键的最大 ID 记录到数据文件里，重启 MySQL 自增主键的最大ID 也不会丢失。

​ 如果表的类型是 InnoDB，那么是 15。InnoDB 表只是把自增主键的最大 ID 记录到内存中，所以重启数据库或者是对表进行OPTIMIZE 操作，都会导致最大 ID 丢失。

​ 3.数据库三范式是什么?

        ​ 第一范式(1NF):字段具有原子性,不可再分。(所有关系型数据库系 统都满足第一范式数据库表中的字段都是单一属性的，不可再分)

​ 第二范式(2NF)是在第一范式(1NF)的基础上建立起来的，即满足 第二范式(2NF)必须先满足第一范式(1NF)。要求数据库表中的每 个实例或行必须可以被惟一地区分。通常需要为表加上一个列，以存储 各个实例的惟一标识。这个惟一属性列被称为主关键字或主键。

​ 满足第三范式(3NF)必须先满足第二范式(2NF)。简而言之，第三 范式(3NF)要求一个数据库表中不包含已在其它表中已包含的非主关 键字信息。>所以第三范式具有如下特征: >>1. 每一列只有一个 值 >>2. 每一行都能区分。>>3. 每一个表都不包含其他表已经包含 的非主关键字信息。

​ 4.mysql 的复制原理以及流程？

​ Mysql 内建的复制功能是构建大型，高性能应用程序的基础。将 Mysql 的数据 分布到多个系统上去，这种分布的机制，是通过将 Mysql 的某一台主机的数据 复制到其它主机(slaves)上，并重新执行一遍来实现的。* 复制过程中一 个服务器充当主服务器，而一个或多个其它服务器充当从服务器。主服务器将 更新写入二进制日志文件，并维护文件的一个索引以跟踪日志循环。这些日志 可以记录发送到从服务器的更新。当一个从服务器连接主服务器时，它通知主 服务器在日志中读取的最后一次成功更新的位置。从服务器接收从那时起发生 的任何更新，然后封锁并等待主服务器通知新的更新。

过程如下 ：

主服务器 把更新记录到二进制日志文件中。

从服务器把主服务器的二进制日志拷贝 到自己的中继日志(replay log)中。

从服务器重做中继日志中的时间， 把更新应用到自己的数据库上。

5.#{}和${}的区别是什么?

{}是预编译处理，${}是字符串替换。

Mybatis 在处理#{}时，会将 sql 中的#{}替换为?号，调用 PreparedStatement 的 set 方法 来赋值。

Mybatis 在处理时，就是把时，就是把{}替换成变量的值。

使用#{}可以有效的防止 SQL 注入，提高系统安全性。

6.#{}和${}的区别是什么?

​ 索引的数据结构和具体存储引擎的实现有关, 在MySQL中使用较多的索引有Hash索引,B+树索引等。而我们经常使用的InnoDB存储引擎的默认索引实现为:B+树索引。

7.一条sql执行过长的时间，你如何优化，从哪些方面？

​ 1、查看sql是否涉及多表的联表或者子查询，如果有，看是否能进行业务拆分，相关字段冗余或者合并成临时表（业务和算法的优化）。

​ 2、涉及链表的查询，是否能进行分表查询，单表查询之后的结果进行字段整合。

​ 3、如果以上两种都不能操作，非要链表查询，那么考虑对相对应的查询条件做索引。加快查询速度。

​ 4、针对数量大的表进行历史表分离（如交易流水表）。

​ 5、数据库主从分离，读写分离，降低读写针对同一表同时的压力，至于主从同步，mysql有自带的binlog实现 主从同步。

​ 6、explain分析sql语句，查看执行计划，分析索引是否用上，分析扫描行数等等

8.UNION 和 UNION ALL 有什么区别？

​ UNION 用于 合并两个或多个 SELECT 语句的结果集，并消去表中任何重复行。UNION 内部的 SELECT 语句必须拥有相同数量的列，列也必须拥有相似的数据类型。同时，每条 SELECT 语句中的列的顺序必须相同。

UNION ALL基本使用和UNION是一致的，但是UNION ALL不会消除表中的重复行。

9.MySQL中空值和NULL的区别？

空值(”)是不占用空间的，判断空字符用 = ” 或者 <> ” 来进行处理。

NULL值是未知的，且占用空间，不走索引；判断 NULL 用 IS NULL 或者 is not null ，SQL 语句函数中可以使用 ifnull ()函数来进行处理。

无法比较 NULL 和 0；它们是不等价的。

无法使用比较运算符来测试 NULL 值，比如 =, <, 或者 <>。

NULL 值可以使用 <=> 符号进行比较，该符号与等号作用相似，但对NULL有意义。

进行 count ()统计某列的记录数的时候，如果采用的 NULL 值，会别系统自动忽略掉，但是空值是统计到其中。

10.mysql数据库常见的故障有哪些？如何处理

SQL执行计划改变导致SQL占用大量CPU。

统计SQL在数据量增大后占用大量磁盘IO和CPU。

SQL中存在NULL条件，导致执行计划走错。

存储过程没有使用预处理和绑定变量，导致解析SQL占用大量SQL。

大批量修改操作没有SET AUTOCOMMIT=0，导致每条SQL均提交，效率低。

SQL未经审核上线，导致没有建立索引，执行计划为全表扫描。

11.如何做 MySQL 的性能优化？

为搜索字段创建索引。
避免使用 select *，列出需要查询的字段。
垂直分割分表。
选择正确的存储引擎。
*/
    }

    public function mysqlLock()
    {
        // Innodb的行锁是通过锁索引实现的
        $sql = 'select * from TABLE_NAME where id= 1 for UPDATE ';

        // id是主键索引，for update 可以根据条件锁定指定行
        // 如果id 不是索引列, 则innodb会发起表锁而不是行锁
    }
}