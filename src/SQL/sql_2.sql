select EmployeeName as �Ј��� from Employees;
select CustomerCode as �ڋq�R�[�h ,CustomerName as �ڋq�� from Customers;
select ProductCode as ���i�R�[�h, ProductName as ���i��, Price as ���i from Products;
select CustomerName as  �ڋq��,CustomerName as ���Ӑ於  from Customers;
select EmployeeName as �Ј���,Email as ���[���A�h���X, Email as �A���� from Employees  ;
select Amount *0.15 as  ���^�̂P�T�� from Salary;
select Height/2  as Height�̔��� from Employees;
select Weight*3-50 as �̏d��3�{����50������������ from Employees;
select (Price+100)*0.3 as ���i��100�𑫂���30�� from Products;
select (Quantity+200)/3 as �ʂ�200�𑫂���3�Ŋ������l from Sales;

select (Height*3)-(Weight*2.5) as ���� from Employees;
select (HireFiscalYear/Weight)+Height as ���� from Employees;
select Quantity*(CustomerID+ProductID+EmployeeID) as ���� from Sales;
select Price-(ProductCode*CategoryID) as ���� from Products;
select CustomerID+(pow(CustomerClassID,3)) as ���� from Customers;

select concat(EmployeeName,'����') as �Ј��� from Employees;
select concat('E-MAIL:',Email) as ���[���A�h���X from Employees;
select concat(concat(EmployeeName,'�����'), concat('E-MAIL:',Email)) as �A���� from Employees;
select concat(CustomerName,'�l�̂��Z�܂���',Address) as �����ӗl�A���� from Customers;
select concat('�Ј�',EmployeeName,'����̌��t�^��',Bloodtype,'�^') as �Ј����t�^ from Employees;

select count(CustomerID)as �����ӗl�� from Customers;
select sum(Weight)as �Ј��̏d���v from Employees;
select max(Price)as �@�ō��z���i from Products;
select min(Weight)as �Ōy�ʑ̏d from Employees;
select avg(Height)as ���ϐg��, avg(Weight)as ���ϑ̏d   from Employees;

select ProductName as ���i��2500�ȏ� from Products where 2500<=Price;
select EmployeeName as �Ј���, Weight as �̏d��70�ȏ� from Employees where 70<=Weight;
select EmployeeName as �Ј���, Height as �g��160�ȏ�180�ȉ� from Employees where Height between 160 and 180;
select SaleDate as 2007�N6��1���ȍ~ from Sales where '2007-06-01'<=SaleDate;
select EmployeeName as �Ј���, Height as �g��170�ȏ�, Weight as �̏d60�ȏ� from Employees where 170<=Height and 60<=Weight;


