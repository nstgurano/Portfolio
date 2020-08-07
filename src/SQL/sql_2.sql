select EmployeeName as 社員名 from Employees;
select CustomerCode as 顧客コード ,CustomerName as 顧客名 from Customers;
select ProductCode as 商品コード, ProductName as 商品名, Price as 価格 from Products;
select CustomerName as  顧客名,CustomerName as 得意先名  from Customers;
select EmployeeName as 社員名,Email as メールアドレス, Email as 連絡先 from Employees  ;
select Amount *0.15 as  給与の１５％ from Salary;
select Height/2  as Heightの半分 from Employees;
select Weight*3-50 as 体重の3倍から50を引いたもの from Employees;
select (Price+100)*0.3 as 価格に100を足した30％ from Products;
select (Quantity+200)/3 as 量に200を足して3で割った値 from Sales;

select (Height*3)-(Weight*2.5) as 結果 from Employees;
select (HireFiscalYear/Weight)+Height as 結果 from Employees;
select Quantity*(CustomerID+ProductID+EmployeeID) as 結果 from Sales;
select Price-(ProductCode*CategoryID) as 結果 from Products;
select CustomerID+(pow(CustomerClassID,3)) as 結果 from Customers;

select concat(EmployeeName,'さん') as 社員名 from Employees;
select concat('E-MAIL:',Email) as メールアドレス from Employees;
select concat(concat(EmployeeName,'さんの'), concat('E-MAIL:',Email)) as 連絡先 from Employees;
select concat(CustomerName,'様のお住まいは',Address) as お得意様連絡先 from Customers;
select concat('社員',EmployeeName,'さんの血液型は',Bloodtype,'型') as 社員血液型 from Employees;

select count(CustomerID)as お得意様数 from Customers;
select sum(Weight)as 社員体重合計 from Employees;
select max(Price)as 　最高額価格 from Products;
select min(Weight)as 最軽量体重 from Employees;
select avg(Height)as 平均身長, avg(Weight)as 平均体重   from Employees;

select ProductName as 価格が2500以上 from Products where 2500<=Price;
select EmployeeName as 社員名, Weight as 体重が70以上 from Employees where 70<=Weight;
select EmployeeName as 社員名, Height as 身長160以上180以下 from Employees where Height between 160 and 180;
select SaleDate as 2007年6月1日以降 from Sales where '2007-06-01'<=SaleDate;
select EmployeeName as 社員名, Height as 身長170以上, Weight as 体重60以上 from Employees where 170<=Height and 60<=Weight;


