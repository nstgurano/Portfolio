select CustomerName as 会社名 from Customers where CustomerName like '%株式会社%';
select AVG(Height) as 平均身長 from Employees where EmployeeName like '%ー%';
select count(CustomerID) as 顧客数 from Customers where CustomerName not like '%株式会社%';
select EmployeeName as 名前に’り’を含み、身長が160以下の従業員名 from Employees where Height<=160 and EmployeeName like '%り%'; 
select * from Customers where CustomerName not like '%株式会社%' and Address like '%江戸川区%';

select EmployeeName as 社員名 ,case when Height<160 then 'A' when Height<170 then 'B' when Height<180 then 'C' else 'D'
end as ランク from Employees; 
select SalaryID as 給与ID ,case when Amount <150000 then 'D' when Amount <300000 then 'C'when Amount <500000 then 'B' else 'A' 
end as ランク from Salary;
select EmployeeName as 社員名, case when Weight<60 then 'A' when Weight<70 then 'B' when Weight<80 then 'C'else 'D' end as ランク from Employees;
select SaleID as 商品番号 ,case when 10<Quantity then 'A' else 'B' end as ランク from Sales;
select EmployeeName as 社員名, Height as 身長 ,case when Height<160 then 'A' when Height<170 then 'B' when Height<180 then 'C' else 'D' end as ランク from Employees;

select CustomerID as 顧客ID ,count(*) as 件数 from Sales group by CustomerID;
select EmployeeID as 社員ID,sum(Amount) as合計  from Salary group by EmployeeID;
select CustomerID as 顧客ID,ProductID as 商品ID, sum(Quantity)as 数量 from Sales group by CustomerID,ProductID;
select BloodType as 血液型, avg(Weight) as 体重の平均値, avg(Height) as 身長の平均値 from Employees group by BloodType;
select EmployeeID as 社員番号,count(*)as 給料支払い回数, avg(Amount) as 平均値 from Salary group by EmployeeID;

select EmployeeID as 社員ID,count(*) as 支給回数 from Salary group by EmployeeID having count(*)<12;
select PrefecturalID as 県ID, count(CustomerID) as 顧客数 from Customers group by PrefecturalID having count(*)>1;
select ProductID as 商品ID,count(*)as 売上レコード数 from Sales group by ProductID having 10<count(*) and count(*)<50;
select BloodType as 血液型, count(BloodType) as 10人以上いる血液型の合計人数  from Employees group by Bloodtype having 10<count(*);
select ProductID as 商品ID, sum(Quantity) as 商品数が100以上200以下の合計数 from Sales group by ProductID having 100<=sum(Quantity) and sum(Quantity)<=200;

select PrefecturalID as 県ID,count(*) as顧客数 from Customers where 10<PrefecturalID  group by PrefecturalID having 1<count(*);
select EmployeeID as 社員番号 ,count(*)as 支給回数 from Salary where EmployeeID>=20 group by EmployeeID having count(*)>=12;
select ProductID as 商品ID,count(*)as 売上レコード数 from Sales where 20<=ProductID and ProductID<=30 group by ProductID having 30<=count(*);
select BloodType as 血液型,count(*)as 人数 from Employees where 165<=Height group by BloodType having 5<=count(*);
select ProductID as 商品ID,sum(Quantity)as 合計 from Sales where '2007-06-01'<=SaleDate group by ProductID having 200<=sum(Quantity);

select HireFiscalYear as 入社年度
,sum(case when Height<=160 then 1 else 0 end)as '160cm以下'
,sum(case when Height<=170 then 1 else 0 end) as '170cm以下'
,sum(case when Height<=170 then 1 else 0 end) as '170cm以下'
,sum(case when Height<=180 then 1 else 0 end) as '180cm以下'
,sum(case when 180<=Height then 1 else 0 end) as '180cm以上' from Employees group by HireFiscalYear; 
select CategoryID as 商品カテゴリーID 
,sum(case when Price<100 then 1 else 0 end )as 'Priceが100円未満'
,sum(case when Price<400 then 1 else 0 end )as 'Priceが400円未満'
,sum(case when Price<1000 then 1 else 0 end )as 'Priceが1000円未満'
,sum(case when 1000<=Price then 1 else 0 end )as 'Priceが1000円以上' from Products group by CategoryID;
select CustomerID as 顧客ID
,sum(case when MONTH(SaleDate)=9 then Quantity else 0 end )as'9月'
,sum(case when MONTH(SaleDate)=10 then Quantity else 0 end )as'10月'
,sum(case when MONTH(SaleDate)=11 then Quantity else 0 end )as'11月' 
from Sales where year(SaleDate)=2006 group by CustomerID;
select PrefecturalID as 県ID
,sum(case when CustomerClassID=1 then 1 else 0 end)as'法人'
,sum(case when CustomerClassID=2 then 1 else 0 end)as'個人' from Customers group by PrefecturalID;
select HireFiscalYear as 入社年度
,sum(case when Weight<=50 then 1 else 0 end)as '50キロ以下' 
,sum(case when Weight<=60 then 1 else 0 end)as '60キロ以下'
,sum(case when Weight<=80 then 1 else 0 end)as '80キロ以下'
,sum(case when Weight<80 then 1 else 0 end)as '80キロ以上'from Employees group by HireFiscalYear;

select EmployeeID,EmployeeName,Birthday from Employees order by Birthday;
select SaleID,Quantity,CustomerID,ProductID,SaleDate from Sales order by CustomerID, ProductID,SaleDate desc;
select CategoryID,count(*)as 商品数 from Products where Price<=1000 group by CategoryID having count(*)<5 order by CategoryID;
select EmployeeID as 従業員ID, sum(Amount)as 給与合計 from Salary group by EmployeeID  order by 給与合計 desc;
select DepartmentID as 部署ID,count(*)as 現在の所属人数 from BelongTo where EndDate is null  group by DepartmentID order by 現在の所属人数 desc;

select distinct HireFiscalYear from Employees;
select distinct CustomerID,ProductID from Sales;
select distinct CustomerClassID,PrefecturalID from Customers;
select distinct CustomerID,ProductID,EmployeeID from Sales;
select Price, CategoryID from Products;
