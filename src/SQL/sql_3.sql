select CustomerName as ïÐ¼ from Customers where CustomerName like '%®ïÐ%';
select AVG(Height) as ½Ïg· from Employees where EmployeeName like '%[%';
select count(CustomerID) as Úq from Customers where CustomerName not like '%®ïÐ%';
select EmployeeName as ¼OÉfèfðÜÝAg·ª160ÈºÌ]Æõ¼ from Employees where Height<=160 and EmployeeName like '%è%'; 
select * from Customers where CustomerName not like '%®ïÐ%' and Address like '%]Ëìæ%';

select EmployeeName as Ðõ¼ ,case when Height<160 then 'A' when Height<170 then 'B' when Height<180 then 'C' else 'D'
end as N from Employees; 
select SalaryID as ^ID ,case when Amount <150000 then 'D' when Amount <300000 then 'C'when Amount <500000 then 'B' else 'A' 
end as N from Salary;
select EmployeeName as Ðõ¼, case when Weight<60 then 'A' when Weight<70 then 'B' when Weight<80 then 'C'else 'D' end as N from Employees;
select SaleID as ¤iÔ ,case when 10<Quantity then 'A' else 'B' end as N from Sales;
select EmployeeName as Ðõ¼, Height as g· ,case when Height<160 then 'A' when Height<170 then 'B' when Height<180 then 'C' else 'D' end as N from Employees;

select CustomerID as ÚqID ,count(*) as  from Sales group by CustomerID;
select EmployeeID as ÐõID,sum(Amount) asv  from Salary group by EmployeeID;
select CustomerID as ÚqID,ProductID as ¤iID, sum(Quantity)as Ê from Sales group by CustomerID,ProductID;
select BloodType as t^, avg(Weight) as ÌdÌ½Ïl, avg(Height) as g·Ì½Ïl from Employees group by BloodType;
select EmployeeID as ÐõÔ,count(*)as ¿x¥¢ñ, avg(Amount) as ½Ïl from Salary group by EmployeeID;

select EmployeeID as ÐõID,count(*) as xñ from Salary group by EmployeeID having count(*)<12;
select PrefecturalID as §ID, count(CustomerID) as Úq from Customers group by PrefecturalID having count(*)>1;
select ProductID as ¤iID,count(*)as ãR[h from Sales group by ProductID having 10<count(*) and count(*)<50;
select BloodType as t^, count(BloodType) as 10lÈã¢ét^Ìvl  from Employees group by Bloodtype having 10<count(*);
select ProductID as ¤iID, sum(Quantity) as ¤iª100Èã200ÈºÌv from Sales group by ProductID having 100<=sum(Quantity) and sum(Quantity)<=200;

select PrefecturalID as §ID,count(*) asÚq from Customers where 10<PrefecturalID  group by PrefecturalID having 1<count(*);
select EmployeeID as ÐõÔ ,count(*)as xñ from Salary where EmployeeID>=20 group by EmployeeID having count(*)>=12;
select ProductID as ¤iID,count(*)as ãR[h from Sales where 20<=ProductID and ProductID<=30 group by ProductID having 30<=count(*);
select BloodType as t^,count(*)as l from Employees where 165<=Height group by BloodType having 5<=count(*);
select ProductID as ¤iID,sum(Quantity)as v from Sales where '2007-06-01'<=SaleDate group by ProductID having 200<=sum(Quantity);

select HireFiscalYear as üÐNx
,sum(case when Height<=160 then 1 else 0 end)as '160cmÈº'
,sum(case when Height<=170 then 1 else 0 end) as '170cmÈº'
,sum(case when Height<=170 then 1 else 0 end) as '170cmÈº'
,sum(case when Height<=180 then 1 else 0 end) as '180cmÈº'
,sum(case when 180<=Height then 1 else 0 end) as '180cmÈã' from Employees group by HireFiscalYear; 
select CategoryID as ¤iJeS[ID 
,sum(case when Price<100 then 1 else 0 end )as 'Priceª100~¢'
,sum(case when Price<400 then 1 else 0 end )as 'Priceª400~¢'
,sum(case when Price<1000 then 1 else 0 end )as 'Priceª1000~¢'
,sum(case when 1000<=Price then 1 else 0 end )as 'Priceª1000~Èã' from Products group by CategoryID;
select CustomerID as ÚqID
,sum(case when MONTH(SaleDate)=9 then Quantity else 0 end )as'9'
,sum(case when MONTH(SaleDate)=10 then Quantity else 0 end )as'10'
,sum(case when MONTH(SaleDate)=11 then Quantity else 0 end )as'11' 
from Sales where year(SaleDate)=2006 group by CustomerID;
select PrefecturalID as §ID
,sum(case when CustomerClassID=1 then 1 else 0 end)as'@l'
,sum(case when CustomerClassID=2 then 1 else 0 end)as'Âl' from Customers group by PrefecturalID;
select HireFiscalYear as üÐNx
,sum(case when Weight<=50 then 1 else 0 end)as '50LÈº' 
,sum(case when Weight<=60 then 1 else 0 end)as '60LÈº'
,sum(case when Weight<=80 then 1 else 0 end)as '80LÈº'
,sum(case when Weight<80 then 1 else 0 end)as '80LÈã'from Employees group by HireFiscalYear;

select EmployeeID,EmployeeName,Birthday from Employees order by Birthday;
select SaleID,Quantity,CustomerID,ProductID,SaleDate from Sales order by CustomerID, ProductID,SaleDate desc;
select CategoryID,count(*)as ¤i from Products where Price<=1000 group by CategoryID having count(*)<5 order by CategoryID;
select EmployeeID as ]ÆõID, sum(Amount)as ^v from Salary group by EmployeeID  order by ^v desc;
select DepartmentID as ID,count(*)as »ÝÌ®l from BelongTo where EndDate is null  group by DepartmentID order by »ÝÌ®l desc;

select distinct HireFiscalYear from Employees;
select distinct CustomerID,ProductID from Sales;
select distinct CustomerClassID,PrefecturalID from Customers;
select distinct CustomerID,ProductID,EmployeeID from Sales;
select Price, CategoryID from Products;
