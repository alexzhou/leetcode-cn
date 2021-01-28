#176. 第二高的薪水
select IFNULL((
    select salary  from  Employee  Group By salary Order By salary desc limit 1,1
),null) as SecondHighestSalary