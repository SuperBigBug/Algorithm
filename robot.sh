#!/bin/bash
echo "current time is $(date -d "today" +"%Y-%m-%d-%H-%M-%S")"

#ϵͳ�����������
mem_total=`free | grep "Mem:" |awk '{print $2}'`
echo "mem_total is $mem_total "


#��ǰʣ��Ĵ�С
mem_free=`free | grep 'buffers/cache' | awk '{print $3}'`
 echo "mem_free is $mem_free"


 #��ǰ��ʹ�õ�used��С
 mem_used=`free -m | grep Mem | awk '{print  $3}'`
 echo "mem_used is $mem_used"


 #����ѱ�ʹ�ã�����㵱ǰʣ��free��ռ�����İٷֱȣ���С������ʾ��Ҫ��С����ǰ�油һ������λ0
 mem_per=0`echo "scale=2;$mem_free/$mem_total" | bc`
 echo mem_per
 mem="free percent is $mem_per"

 DATA="$(date -d "today" +"%Y-%m-%d-%H-%M-%S") free percent is : $mem_per"
 echo $DATA

 #ȡ��ǰ����cpu�ٷݱ�ֵ��ֻȡ�������֣�
 cpu_idle=`top -b -n 1 | grep Cpu | awk '{print $5}' | cut -f 1 -d "."`
 echo "cpu_idle percent is $cpu_idle��cpu ʣ��������"
 cpu_total="cpu_idle percent is $cpu_idle��cpu ʣ�������㣬����ֵ�ǵ�ʣ�಻��30%ʱ���Զ�����"

 // todo $url ΢�ŵ�ַ
 curl -i -X POST -H "'Content-type':'application/json'" -d '{"CPU":"'$cpu_total'","MEM":"'$mem'"}' $url