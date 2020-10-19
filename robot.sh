#!/bin/bash
echo "current time is $(date -d "today" +"%Y-%m-%d-%H-%M-%S")"

#系统分配的区总量
mem_total=`free | grep "Mem:" |awk '{print $2}'`
echo "mem_total is $mem_total "


#当前剩余的大小
mem_free=`free | grep 'buffers/cache' | awk '{print $3}'`
 echo "mem_free is $mem_free"


 #当前已使用的used大小
 mem_used=`free -m | grep Mem | awk '{print  $3}'`
 echo "mem_used is $mem_used"


 #如果已被使用，则计算当前剩余free所占总量的百分比，用小数来表示，要在小数点前面补一个整数位0
 mem_per=0`echo "scale=2;$mem_free/$mem_total" | bc`
 echo mem_per
 mem="free percent is $mem_per"

 DATA="$(date -d "today" +"%Y-%m-%d-%H-%M-%S") free percent is : $mem_per"
 echo $DATA

 #取当前空闲cpu百份比值（只取整数部分）
 cpu_idle=`top -b -n 1 | grep Cpu | awk '{print $5}' | cut -f 1 -d "."`
 echo "cpu_idle percent is $cpu_idle，cpu 剩余量充足"
 cpu_total="cpu_idle percent is $cpu_idle，cpu 剩余量充足，警告值是当剩余不足30%时，自动清理"

 // todo $url 微信地址
 curl -i -X POST -H "'Content-type':'application/json'" -d '{"CPU":"'$cpu_total'","MEM":"'$mem'"}' $url