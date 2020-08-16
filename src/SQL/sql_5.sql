select distinct s1.ProductID,p1.ProductName,s1.Quantity from Sales as s1 join Products as p1 on s1.ProductID=p1.ProductID 
where s1.Quantity=(select max(s2.Quantity) from Sales as s2 where s1.ProductID=s2.ProductID ) order by s1.ProductID; 
select p1.ProductID,p1.ProductName from Products as p1 where exists (select * from Sales as s1 where  p1.ProductID=s1.ProductID);
select p1.ProductID,p1.ProductName from Products as p1 where not exists (select * from Sales as s1 where p1.ProductID=s1.ProductID);
select distinct s1.ProductID,p1.ProductName,max(s1.Quantity) from Sales as s1 join Products as p1 on s1.ProductID=p1.ProductID 
group by s1.ProductID order by s1.ProductID; 
select A.ProductID,B.ProductName,A.Quantity from (select ProductID,max(Quantity)as Quantity from Sales group by ProductID)as A join Products as B on A.ProductID= B.ProductID order by A.ProductID;
select p1.ProductID,avg(s1.Quantity) as 平均値, max(s1.Quantity)as 最大値 from Sales as s1 join Products as p1 on s1.ProductID=p1.ProductID group by s1.ProductID having 最大値/10<平均値;
select ProductID,ProductName from Products as A where ProductID in(select ProductID from Sales as B where A.ProductID=B.ProductID having avg(Quantity)<=max(Quantity)/10)order by ProductID;

select d.DepartmentID as ID,d.DepartmentName as 名前 from Departments as d union all select c.CategoryID as ID,c.CategoryName from Categories as c;
select 'Departments'as テーブル名,d.DepartmentID as ID,d.DepartmentName as 名前 from Departments as d 
union all select 'Categories'as テーブル名,c.CategoryID as ID,c.CategoryName as 名前 from Categories as c order by ID ;
select d.DepartmentID as ID,d.DepartmentName as 名前 from Departments as d
union all select c.CustomerClassID as ID,c.CustomerClassName as 名前 from CustomerClasses as c
union all select ca.CategoryID as ID,ca.CategoryName as 名前 from Categories as ca
union all select p.PrefecturalID as ID,p.PrefecturalName as 名前 from Prefecturals as p;
select 'Departments'as テーブル名, d.DepartmentID as ID,d.DepartmentName as 名前 from Departments as d
union all select 'CustomerClasses'as テーブル名, c.CustomerClassID as ID,c.CustomerClassName as 名前 from CustomerClasses as c
union all select 'Categories'as テーブル名, ca.CategoryID as ID,ca.CategoryName as 名前 from Categories as ca
union all select 'Prefecturals'as テーブル名, p.PrefecturalID as ID,p.PrefecturalName as 名前 from Prefecturals as p order by テーブル名,ID;
select c.CustomerID,s.SaleID,s.ProductID,c.CustomerClassID,c.CustomerName from Sales as s join Customers as c on s.CustomerID=c.CustomerID where c.CustomerClassID=2 and 10<=s.Quantity
union all select c.CustomerID,s.SaleID,s.ProductID,c.CustomerClassID,c.CustomerName from Sales as s join Customers as c on s.CustomerID=c.CustomerID where c.CustomerClassID=1 and 100<=s.Quantity;

select c.CustomerID as ID,c.CustomerName as 名前 from Customers as c
union select e.EmployeeID as ID,e.EmployeeName as 名前 from Employees as e order by ID;
select e.EmployeeID as ID,e.EmployeeName as 名前 from Employees as e
union select e1.EmployeeID as ID,e1.EmployeeName as 名前 from Employees as e1 order by ID;
select ProductID as ID from Products union select ProductID as ID from Sales order by ID;
select CustomerID,ProductID from Sales where 10<=Quantity and SaleDate between '2006-10-01' and '2006-12-31'
union select CustomerID,ProductID from Sales where 10<=Quantity and SaleDate between '2007-01-01' and '2007-03-31'
union select CustomerID,ProductID from Sales where 10<=Quantity and SaleDate between '2007-04-01' and '2007-06-30';
select s.ProductID from Sales as s where 10<=s.Quantity and s.CustomerID=(select c.CustomerID from Customers as c where c.CustomerClassID=2);
select s.ProductID from Sales as s join Customers as c on s.CustomerID=c.CustomerID where 10<=s.Quantity and c.CustomerClassID=2
union select s2.ProductID from Sales as s2 join Customers as c2 on s2.CustomerID=c2.CustomerID where 100<=s2.Quantity and c2.CustomerClassID=1 order by ProductID;

select CustomerID as ID, CustomerName as 名前 from Customers
intersect select EmployeeID as ID,EmployeeName as 名前 from Employees order by ID; 

insert into Employees(EmployeeID,EmployeeName,Height,Weight,EMail,HireFiscalYear,Birthday,BloodType)
values(31,'モクモク',170,60,'moku@nekoyasudo',2007,'1989-08-08','AB');
select * from Employees;
insert into BelongTo (BelongID,EmployeeID,DepartmentID, StartDate)values(35,31,1,'2007-09-01');
select *from BelongTo;
insert into Sales (SaleID,Quantity,CustomerID,ProductID,EmployeeID,SaleDate)values(1006,10,1,40,31,'2007-09-10');
select * from Sales;
insert into Salary (SalaryID,EmployeeID,PayDate,Amount) values(354,31,'2007-09-05',100000);
update Salary set Amount=100000 where SalaryID=354;
select *from Salary;
insert into Customers (CustomerID,CustomerName,Address,CustomerClassID,PrefecturalID)values (31,'有限会社狢商会','和歌山県吉野郡',1,31);
select* from Customers;

insert into Salary (SalaryID,EmployeeID,PayDate,Amount) select EmployeeID+20000,EmployeeID,'2007-10-01',20000 from Employees where HireFiscalYear<='1993';
select * from Salary;
insert into Customers(CustomerCode,CustomerID,Address,PrefecturalID,CustomerClassID,CustomerName)select EmployeeID+10000,EmployeeID+10000, '江戸川区西小岩',13,2,EmployeeName from Employees where HireFiscalYear<'1988';
select *from Customers;
insert into Sales (SaleID,Quantity,CustomerID,ProductID,SaleDate)select EmployeeID+30000,10,10,20,'2007-09-01' from Employees where BloodType='O';
select *from Sales;
insert into Sales (SaleID,Quantity,EmployeeID,ProductID,SaleDate)select CustomerID+40000,20,5,21,'2007-09-05' from Customers where PrefecturalID=8;
select * from Sales;
insert into Sales (SaleID,Quantity,CustomerID,EmployeeID,SaleDate)select ProductID+50000,30,15,2,'2007-09-10' from Products where CategoryID=5;
select *from Sales;

update Customers set CustomerCode=CustomerCode+1000;
update Employees set Height=Height+2, Weight=Weight-5;
update Departments set DepartmentName= concat(`DepartmentName` ,'部');
select *from Departments;
update Customers set ,case when CustomerClass=1 then concat(`CustomerName` ,'御中') else concat(`CustomerName` ,'様')end;
select Customers set ,case when CustomerClass=1 then concat(`CustomerName` ,'御中') else concat(`CustomerName` ,'様')end from Customers;
update Customers set CustomerName = case when CustomerClassID=1 then concat(`CustomerName`,'御中')  else concat(`CustomerName`,'様') end;

