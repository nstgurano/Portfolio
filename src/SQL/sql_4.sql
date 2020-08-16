select EmployeeID,EmployeeName from Employees where EmployeeID in(select EmployeeID from Salary group by EmployeeID having 300000<=max(Amount)) ;
select SaleID,Quantity,CustomerID,(select CustomerName from Customers where CustomerID=Sales.CustomerID)as ŒÚ‹q–¼ from Sales where 100<=Quantity;
select ProductID ProductName from Products where ProductID in (select ProductID from Sales group by ProductID having 100<=sum(Quantity));
select EmployeeID,EmployeeName,(select max(Amount) from Salary where EmployeeID=Employees.EmployeeID)as Å‚Šz from Employees where EmployeeID in(select EmployeeID from Salary group by EmployeeID having 300000<=max(Amount));
select SaleID,(select ProductName from Products where ProductID=Sales.ProductID)as ¤•i–¼,Quantity,CustomerID,(select CustomerName from Customers where CustomerID=Sales.CustomerID)as ŒÚ‹q–¼ from Sales where 100<=Quantity;

select B.EmployeeName,A.PayDate, A.Amount from Salary as A join Employees as B on A.EmployeeID=B.EmployeeID order by B.EmployeeID;
select A.Quantity,B.CustomerName,D.ProductName,C.EmployeeName from Sales as A
join Customers as B on A.CustomerID=B.CustomerID 
join Employees as C on A.EmployeeID=C.EmployeeID 
join Products as D on A.ProductID=D.ProductID where 200<=A.Quantity; 
select A.ProductID,B.ProductName, sum(A.Quantity)as ‡Œv from Sales as A 
join Products as B on A.ProductID=B.ProductID group by A.ProductID,B.ProductName having ‡Œv<=300;
select  A.Quantity,B.CustomerName,D.ProductName,C.EmployeeName from Sales as A ,Customers as B,Employees as C,Products as D 
where A.CustomerID=B.CustomerID and A.EmployeeID=C.EmployeeID and A.ProductID=D.ProductID and 200<=A.Quantity;
select A.CustomerName,B.PrefecturalName,C.CustomerClassName from Customers as A ,Prefecturals as B, CustomerClasses as C 
where A.PrefecturalID=B.PrefecturalID and A.CustomerClassID and C.CustomerClassID order by A.PrefecturalID;

select B.CategoryID,C.CategoryName as ƒJƒeƒSƒŠ[–¼,sum(A.Quantity) as ”—Ê‡Œv from Sales as A join Products as B on A.ProductID=B.ProductID
join Categories as C on B.CategoryID=C.CategoryID group by B.CategoryID;
select B.PrefecturalID,C.PrefecturalName asŒ§–¼,sum(Quantity)as ‡Œv”—Ê from Sales as A join Customers as B  on A.CustomerID=B.CustomerID 
join Prefecturals as C on C.PrefecturalID=B.PrefecturalID group by PrefecturalID;
select B.CustomerClassID, C.CustomerClassName,max(Quantity) from Sales as A 
join Customers as B on A.CustomerID=B.CustomerID 
join CustomerClasses as C on B.CustomerClassID=C.CustomerClassID group by B.CustomerClassID;
select B.PrefecturalID,C.PrefecturalName asŒ§–¼,sum(Quantity)as ‡Œv”—Ê from Sales as A,Customers as B ,Prefecturals as C
where A.CustomerID=B.CustomerID and C.PrefecturalID=B.PrefecturalID group by PrefecturalID;
select B.CustomerClassID, C.CustomerClassName,max(Quantity) from Sales as A ,Customers as B,CustomerClasses as C
where A.CustomerID=B.CustomerID and B.CustomerClassID=C.CustomerClassID group by B.CustomerClassID;

select A.CustomerID,sum(case when B.Quantity is null then 0 else B.Quantity end)as ”Ì”„”—Ê‡Œv from Customers as A left outer join Sales as B on A.CustomerID=B.CustomerID group by A.CustomerID;
select A.EmployeeID,max(A.EmployeeName) as ŽÐˆõ–¼, sum(case when B.EmployeeID is null then 0 else 1 end)as”Ì”„Œ” from Employees as A 
left outer join Sales as B on A.EmployeeID=B.EmployeeID group by A.EmployeeID;
select A.PrefecturalID,A.PrefecturalName,sum(case when A.PrefecturalName is null then 0 else 1 end)as ŒÚ‹q”
from Prefecturals as A left outer join Customers as B on A.PrefecturalID=B.PrefecturalID group by A.PrefecturalID;
select A.EmployeeID,case when B.CTN is null then 0 else B.CTN end as ŒÚ‹q” from Employees as A left outer join(select EmployeeID,count(*)as CTN from Sales as B group by EmployeeID)as B on A.EmployeeID=B.EmployeeID;
select A.EmployeeID,(case when B.Amount is null then  0 else B.Amount end)as Žx‹‹Šz from Employees as A left outer join (select EmployeeID,Amount from Salary where PayDate='2007-02-25')as B on A.EmployeeID=B.EmployeeID;

select p1.ProductName, p2.ProductName from Products as p1 join Products as p2 on p1.ProductID<p2.ProductID and p1.CategoryID=p2.CategoryID;
select c1.CustomerName,c2.CustomerName from Customers as c1 join Customers as c2 on c1.PrefecturalID=c2.PrefecturalID and c1.CustomerClassID=c2.CustomerClassID  and c1.CustomerID<c2.CustomerID;
select e1.EmployeeName,e2.EmployeeName from Employees as e1 join Employees as e2 on e1.Birthday<e2.Birthday;
select c1.CategoryName ,c2.CategoryName from  Categories as c1 join Categories as c2 on c1.CategoryID<c2.CategoryID;
select c1.PrefecturalID,c1.CustomerName,c2.PrefecturalID,c2.CustomerName from Customers as c1 join Customers as c2 on c1.PrefecturalID=c2.PrefecturalID and c1.CustomerClassID=c2.CustomerClassID  and c1.CustomerID<c2.CustomerID where c1.PrefecturalID<>13 ;

