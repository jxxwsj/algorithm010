<?php
class Solution {

    /**
     * @param Integer[] $nums
     * @return Integer[][]
     */
    function threeSum($nums) {
        //数组个数小于3时
        if(count($nums) < 3) {
            return [];
        }
        //对数组进行升序排序
        sort($nums);
        $n = count($nums);
        $arr = [];
       
        for($i=0;$i<$n; $i++) {
            if($nums[$i] > 0) return $arr;

            if($i>0 && $nums[$i] == $nums[$i-1]) continue;
            $l = $i + 1;
            $r = $n - 1;
            while($l < $r) {
                $sum = $nums[$i] + $nums[$l] + $nums[$r];
                if($sum == 0) {
                    array_push($arr,array($nums[$i],$nums[$l],$nums[$r]));
                    
                    while(($nums[$l] == $nums[$l+1]) && ($l+1)<$n) ++$l;//这里注意index下标不能超过数组的范围
                    while(($nums[$r] == $nums[$r-1]) && ($r-1)>0) --$r;
                    ++$l;
                    --$r;
                }else if($sum < 0) {
                    ++$l;
                }else {
                    --$r;
                }
            }
        }
        return $arr;
    }
}