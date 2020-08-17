select e.EmployeeID,e.EmployeeName from Employees as e where e.EmployeeID in(select s.EmployeeID from Salary as s group by s.EmployeeID having max(s.Amount)>=300000);
select s.SaleID,s.Quantity,s.CustomerID,(select c.CustomerName from Customers as c where s.CustomerID=c.CustomerID)as ŒÚ‹q–¼ from Sales as s where 100<=s.Quantity;

select EmployeeID,sum(case when EmployeeID) from Employees as e outer join Sales as s on e.EmployeeID=s.EmployeeID group by EmployeeID;

select e.EmployeeID,case when A.cn is null then 0 else A.cn end as ”Ì”„Œ” from Employees as e left outer join 
(select s.EmployeeID as ID,count(*)as cn from Sales as s Group by s.EmployeeID) as A on A.ID=e.EmployeeID;
select e.EmployeeName,case when A.Amount is null then 0 else A.Amount end as x‹‹‹àŠz from Employees as e left outer join 
(select s.EmployeeID ,s.Amount from Salary as s where  s.PayDate='2007-02-25') as A on A.EmployeeID=e.EmployeeID;

select distinct B.ProductID,B.ProductName,B.ma as —Ê  from Sales as A 
join(select p.ProductID,p.ProductName,max(A2.Quantity)as ma from Products as p join Sales as A2 on p.ProductID=A2.ProductID
 group by ProductID)as B on A.ProductID=B.ProductID order by B.ProductID;
 
select A.ProductID,B.ProductName,A.Quantity from (select ProductID,max(Quantity)as Quantity from Sales group by ProductID)as A
join Products as B on A.ProductID=B.ProductID order by A.ProductID;

select A.ProductID,p.ProductName from 
(select s1.ProductID,avg(s1.Quantity)as AV,max(s1.Quantity)as MA from Sales as s1 group by s1.ProductID having AV<MA/10)as A
join Products as p on p.ProductID=A.ProductID  order by A.ProductID;
select ProductID,ProductName from Products as A where ProductID in
(select ProductID from Sales as B where A.ProductID=B.ProductID having avg(Quantity)<=Max(Quantity)/10)order by ProductID;

select CustomerID,ProductID from Sales where 10<=Quantity and SaleDate between '2006-10-01' and '2006-12-31'
union select CustomerID,ProductID from Sales where 10<=Quantity and SaleDate between '2007-01-01' and '2007-03-31'
union select CustomerID,ProductID from Sales where 10<=Quantity and SaleDate between '2007-04-01' and '2007-06-30'order by CustomerID,ProductID;
select s.ProductID from Sales as s join Customers as c on s.CustomerID=c.CustomerID where 10<Quantity and CustomerClassID=2
union select s.ProductID from Sales as s join Customers as c on s.CustomerID=c.CustomerID where 100<Quantity and CustomerClassID=1
order by ProductID;

select EmployeeID,EmployeeName from Employees where EmployeeID in(select EmployeeID from Salary group by EmployeeID having 300000<=max(Amount));

select e.EmployeeID,(case when CN is null then 0 else CN end)as ”Ì”„Œ” from Employees as e left outer join(select s.EmployeeID,count(*)as CN from Sales as s group by s.EmployeeID)as A  on e.EmployeeID=A.EmployeeID;
-- ‰—p2
select A.YM,sum(A.Amount) from 
(select date_format(SaleDate,'%Y-%m')as YM,s.Quantity*p.Price as Amount  from Sales as s join Products as p on s.ProductID=p.ProductID)as A
group by A.YM order by A.YM;
-- ‰—p‚R
select e.EmployeeID,e.EmployeeName,(case when A.YM is null then '”Ì”„‚È‚µ' else A.YM end) as '”Ì”„Œ', sum(case when A.Amount is null then 0 else A.Amount end)as ”Ì”„‹àŠz from Employees as e left outer join
(select s.EmployeeID as ID, date_format(SaleDate,'%Y-%m')as YM,s.Quantity*p.Price as Amount  from Sales as s join Products as p on s.ProductID=p.ProductID)as A
on e.EmployeeID=A.ID group by e.EmployeeID,e.EmployeeName,A.YM order by EmployeeID,e.EmployeeName,A.YM;

-- ‰—p4
select A.ID,A.CID,A.Name,A.YM,sum(A.Amount)as AM from 
(select p2.ProductName as Name,p2.CategoryID as CID,s.ProductID as ID, date_format(SaleDate,'%Y-%m')as YM,s.Quantity*p2.Price as Amount  from Sales as s join Products as p2 on s.ProductID=p2.ProductID)as A
where A.CID=1 or A.CID=3 or A.CID=9 group by A.ID,A.Name,A.YM having 5000<=AM order by A.ID,A.Name,A.YM desc;


select p.ProductID,p.ProductName,s.YM,sum(s.Quantity*p.Price) from (select ProductID,date_format(SaleDate,'%Y-%m')as YM,Quantity from Sales)as s 
join Products as p on s.ProductID=p.ProductID where p.CategoryID in(1,3,9)
group by p.ProductID,p.ProductName,s.YM 
having sum(s.Quantity*p.Price)>5000
order by p.ProductID,p.ProductName,s.YM desc;

-- ‰—p‚T
select s.CustomerID,c.CustomerName,p.ProductName,sum(s.Quantity*p.Price)as ”Ì”„‡Œv‹àŠz  from Sales as s 
join Products as p on s.ProductID=p.ProductID
join Customers as c on s.CustomerID=c.CustomerID
group by s.CustomerID,c.CustomerName,p.ProductName
order by s.CustomerID,c.CustomerName,p.ProductName; 

-- ‰—p6


