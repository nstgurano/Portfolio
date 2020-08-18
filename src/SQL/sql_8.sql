-- 応用6
select pre.PrefecturalID,pre.PrefecturalName,p.ProductName,sum(s.Quantity*p.Price)as '販売合計金額' from Sales as s 
join Products as p on s.ProductID=p.ProductID
join Customers as c on s.CustomerID=c.CustomerID
join Prefecturals as pre on c.PrefecturalID=pre.PrefecturalID
group by pre.PrefecturalID,pre.PrefecturalName,p.ProductName order by pre.PrefecturalID,pre.PrefecturalName,p.ProductName;

-- 応用7
select A.DepartmentID,d.DepartmentName,A.YM,avg(A.Amount)as 平均給与 from 
(select date_format(PayDate,'%Y-%m')as YM,b.DepartmentID,s.Amount from Salary as s 
join BelongTo as b on b.EmployeeID=s.EmployeeID 
where b.EndDate is null and s.PayDate between '2007-01-01'and '2007-12-31')as A 
join Departments as d on A.DepartmentID=d.DepartmentID
group by A.DepartmentID,d.DepartmentName,A.YM order by A.DepartmentID,d.DepartmentName,A.YM;


-- 応用8
select 
concat('Ct',A.CategoryID)as カテゴリー,
sum(case when date_format(A.SaleDate,'%m')=01 then A.Amount else 0 end )as '1月',
sum(case when date_format(A.SaleDate,'%m')=02 then A.Amount else 0 end )as '2月',
sum(case when date_format(A.SaleDate,'%m')=03 then A.Amount else 0 end )as '3月',
sum(case when date_format(A.SaleDate,'%m')=04 then A.Amount else 0 end )as '4月',
sum(case when date_format(A.SaleDate,'%m')=05 then A.Amount else 0 end )as '5月',
sum(case when date_format(A.SaleDate,'%m')=06 then A.Amount else 0 end )as '6月',
sum(case when date_format(A.SaleDate,'%m')=07 then A.Amount else 0 end )as '7月',
sum(case when date_format(A.SaleDate,'%m')=08 then A.Amount else 0 end )as '8月',
sum(case when date_format(A.SaleDate,'%m')=09 then A.Amount else 0 end )as '9月',
sum(case when date_format(A.SaleDate,'%m')=10 then A.Amount else 0 end )as '10月',
sum(case when date_format(A.SaleDate,'%m')=11 then A.Amount else 0 end )as '11月',
sum(case when date_format(A.SaleDate,'%m')=12 then A.Amount else 0 end )as '12月'
from
(select p.CategoryID,s.SaleDate,s.Quantity*p.Price as Amount from Sales as s 
join Products as p on s.ProductID=p.ProductID)as A
group by A.CategoryID
order by A.CategoryID;

-- 応用9
select A.ProductID,
A.ProductName,
A.June as 6月,
A.July as 7月,
(case when A.June<A.July then '↑' when A.July<A.June then '↓' else '→' end)as 対6月増減,
A.August as 8月,
(case when A.July<A.August then '↑' when A.August<A.July then '↓' else '→' end)as 対7月増減
from
(select p.ProductID,p.ProductName,
sum(case when s.SaleDate is null then 0 when date_format(s.SaleDate,'%Y-%m')='2007-06' then s.Quantity*p.Price else 0 end)as June, 
sum(case when s.SaleDate is null then 0 when date_format(s.SaleDate,'%Y-%m')='2007-07' then s.Quantity*p.Price else 0 end)as July, 
sum(case when s.SaleDate is null then 0 when date_format(s.SaleDate,'%Y-%m')='2007-08' then s.Quantity*p.Price else 0 end)as August 
from Products as p 
left outer join Sales as s on p.ProductID=s.ProductID 
group by p.ProductID,p.ProductName)as A;


-- 応用2
select A.YM,sum(A.Amount)as 販売合計金額 from 
(select date_format(s.SaleDate,'%Y-%m')as YM, s.Quantity*p.Price as Amount from Sales as s 
join Products as p on s.ProductID=p.ProductID)as A group by A.YM order by A.YM;

-- 応用３
select A.EmployeeID,e.EmployeeName,A.YM,sum(A.Amount)as 販売合計金額 from Employees as e left outer join
(select s.EmployeeID, date_format(s.SaleDate,'%Y-%m')as YM, s.Quantity*p.Price as Amount from Sales as s 
join Products as p on s.ProductID=p.ProductID)as A
on e.EmployeeID=A.EmployeeID group by A.EmployeeID,e.EmployeeName,A.YM
order by A.EmployeeID,e.EmployeeName,A.YM;

select A.EmployeeID,A.EmployeeName,A.YM,sum(A.Quantity*p.Price)as 販売合計金額 from 
(select e.EmployeeID,e.EmployeeName,s.ProductID, date_format(s.SaleDate,'%Y-%m')as YM,s.Quantity from Employees as e 
left outer join Sales as s on e.EmployeeID=s.EmployeeID)as A 
left outer join Products as p on p.ProductID=A.ProductID
group by A.EmployeeID,A.EmployeeName,A.YM order by A.EmployeeID,A.EmployeeName,A.YM;

-- 応用5
select s.CustomerID,c.CustomerName,p.ProductName,sum(s.Quantity*p.Price)as 販売合計金額 from Sales as s 
join Customers as c on s.CustomerID=c.CustomerID 
join Products as p on p.ProductID=s.ProductID
group by s.CustomerID,c.CustomerName,p.ProductName
order by s.CustomerID,c.CustomerName,p.ProductName;

-- chapter4
--3,Q5
update Customers set CustomerName=(case when CustomerClassID=1 then concat(CustomerName,'御中') when CustomerClassID=2 then concat(CustomerName,'様')end); 

--4,Q5 
update Products set Price=(case when 2000<=Price then Price*0.8 when 1000<=Price then Price*0.9 else Price end) where CategoryID=7;

-- 5,Q4
update Salary set Amount=Amount*0.9 where PayDate='2007-08-25' and EmployeeID not in(
select s.EmployeeID from Sales as s where s.SaleDate<'2007-08-25'); 

-- 6,Q1
update Customers set Address=
concat((select p.PrefecturalName from Prefecturals as p  where p.PrefecturalID=Customers.PrefecturalID),Address
)
where exists(select* from Prefecturals  where Prefecturals.PrefecturalID=Customers.PrefecturalID);


-- 6,Q2
update Salary set Amount=Amount+(select sum(s.Quantity*p.Price)*0.03 from Sales as s join Products as p on s.ProductID=p.ProductID where SaleDate<'2007-08-25' and Salary.EmployeeID=s.EmployeeID) 
where PayDate='2007-08-25'and exists (select * from Sales where SaleDate<'2007-08-25' and Salary.EmployeeID=Sales.EmployeeID) ;
-- 6,Q3
update Products set Price=(select avg(Sales.Quantity*Products.Price) from Sales where Sales.ProductID=Products.ProductID
)where exists(select *from  Sales where Sales.ProductID=Products.ProductID );
-- 6,Q5
update Products set ProductName=
concat('『',(select sum(Sales.Quantity) from Sales where 500<=Quantity and Sales.ProductID=Products.ProductID),'個も売れているヒット商品！',ProductName,'』')
where (select sum(Quantity) from Sales where Sales.ProductID=Products.ProductID)>=500;

-- 8,Q5
delete from Customers where CustomerID=2 and PrefecturalID in(3,5,7,13);
-- 9,Q5
delete from Sales where exists(select * from Employees where Department=3);

