<?php
/**
 * Created by PhpStorm.
 * User: zhongyu
 * Date: 2020/9/14
 * Time: 4:11 PM
 */

class DataStructureArray
{
    /**
     * ��������: �������ڴ�ռ䡢Ԫ������һ��    ɱ�������: �������
     * But, �����б�, insert delete��Ҫ�����������ݰ��˹���
     */

    /**
     * �������Ԫ�صĹ��̣�
     */
    # �������Ϊ�ڴ��ÿ���洢��Ԫ����һ����ַ, ͨ����ַ�������ڴ��е�����, ����Ҫ����ĳ��Ԫ��ʱ���ȼ���Ԫ�ص�ַ, ���ݵ�ַȥ����
    # a[int 10] �����Ϊ���������һ���������ڴ�, �ڴ����׵�ַΪbaseAddress
    # address[i] = baseAddress + data_type_size * i
    # ��������±�������ʵ�ʱ�临�Ӷ���O(1)

    /**
     * Ϊʲô������±��0��ʼ������1 ��
     */
    # ��������Ԫ�ؼ���Ԫ�ص�ַʱΪa[k] = baseAddress + data_type_size * k
    # ����Ǵ�1��ʼ, a[k] = baseAddress + data_type_size * ( k-1 ) �����һ�μ��ļ���
}