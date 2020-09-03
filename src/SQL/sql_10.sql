--Q1
select
    concat( 
        'insert into DB values('
        , PrefecturalID
        , ','
        , PrefecturalName
        , ');'
    ) as A 
from
    Prefecturals; 

--Q2
select
    A.YM
    , sum(Amount) as îÃîÑçáåvã‡äz 
from
    ( 
        select
            date_format(SaleDate, '%Y-%m') as YM
            , (s.Quantity * p.Price) as Amount 
        from
            Sales as s join Products as p 
                on s.ProductID = p.ProductID
    ) as A 
group by
    A.YM 
order by
    A.YM; 

--Q3
select
    e.EmployeeID
    , e.EmployeeName
    , (case when A.YM is null then 'ñ≥Çµ' else A.YM end) as îÃîÑåé
    , sum( 
        case 
            when A.Amount is null 
                then 0 
            else A.Amount 
            end
    ) as îÃîÑçáåvã‡äz 
from
    Employees as e 
    left outer join ( 
        select
            s.EmployeeID
            , date_format(s.SaleDate, '%Y-%m') as YM
            , (s.Quantity * p.Price) as Amount 
        from
            Sales as s join Products as p 
                on s.ProductID = p.ProductID
    ) as A 
        on e.EmployeeID = A.EmployeeID 
group by
    e.EmployeeID
    , e.EmployeeName
    , A.YM 
order by
    e.EmployeeID
    , e.EmployeeName
    , A.YM; 

--Q4
select
    A.ProductID
    , A.ProductName
    , A.YM
    , sum(A.Amount) as SUM 
from
    ( 
        select
            s.ProductID
            , p.ProductName
            , date_format(s.SaleDate, '%Y-%m') as YM
            , s.Quantity * p.Price as Amount 
        from
            Sales as s join Products as p 
                on s.ProductID = p.ProductID 
        where
            p.CategoryID in (1, 3, 9)
    ) as A 
group by
    A.ProductID
    , A.ProductName
    , A.YM 
having
    5000 <= SUM 
order by
    A.ProductID
    , A.ProductName
    , A.YM; 

--Q5
select
    A.CustomerID
    , A.CustomerName
    , p.ProductName
    , sum(A.Quantity * p.Price) as îÃîÑçáåvã‡äz 
from
    ( 
        select
            c.CustomerID
            , c.CustomerName
            , s.Quantity
            , s.ProductID 
        from
            Customers as c 
            left outer join Sales as s 
                on c.CustomerID = s.CustomerID
    ) as A join Products as p 
        on p.ProductID = A.ProductID 
group by
    A.CustomerID
    , A.CustomerName
    , p.ProductName 
order by
    A.CustomerID
    , A.CustomerName
    , p.ProductName; 

select
    s.CustomerID
    , c.CustomerName
    , p.ProductName
    , sum(s.Quantity * p.Price) 
from
    Sales as s join Customers as c 
        on s.CustomerID = c.CustomerID join Products as p 
        on s.ProductID = p.ProductID 
group by
    s.CustomerID
    , c.CustomerName
    , p.ProductName 
order by
    s.CustomerID
    , c.CustomerName
    , p.ProductName; 

--Q6
select
    pre.PrefecturalID
    , pre.PrefecturalName
    , p.ProductName
    , sum(p.Price * s.Quantity) as çáåvîÃîÑã‡äz 
from
    Sales as s join Products as p 
        on s.ProductID = p.ProductID join Customers as c 
        on c.CustomerID = s.CustomerID join Prefecturals as pre 
        on pre.PrefecturalID = c.PrefecturalID 
group by
    pre.PrefecturalID
    , pre.PrefecturalName
    , p.ProductName 
order by
    pre.PrefecturalID
    , pre.PrefecturalName
    , p.ProductName; 

--Q7
select
    A.DepartmentID
    , d.DepartmentName
    , A.YM
    , avg(A.Amount) as avg 
from
    ( 
        select
            b.DepartmentID
            , date_format(s.PayDate, '%Y-%m') as YM
            , s.Amount 
        from
            Salary as s join BelongTo as b 
                on s.EmployeeID = b.EmployeeID 
        where
            date_format(PayDate, '%Y') = 2007
    ) as A join Departments as d 
        on d.DepartmentID = A.DepartmentID 
group by
    A.DepartmentID
    , d.DepartmentName
    , YM 
order by
    A.DepartmentID
    , d.DepartmentName
    , YM; 

--Q8

select A.YM,
sum(case when A.CategoryID=1 then A.Amount else 0 end)as Ct1,
sum(case when A.CategoryID=2 then A.Amount else 0 end)as Ct2,
sum(case when A.CategoryID=3 then A.Amount else 0 end)as Ct3,
sum(case when A.CategoryID=4 then A.Amount else 0 end)as Ct4,
sum(case when A.CategoryID=5 then A.Amount else 0 end)as Ct5,
sum(case when A.CategoryID=6 then A.Amount else 0 end)as Ct6,
sum(case when A.CategoryID=7 then A.Amount else 0 end)as Ct7,
sum(case when A.CategoryID=8 then A.Amount else 0 end)as Ct8,
sum(case when A.CategoryID=9 then A.Amount else 0 end)as Ct9,
sum(case when A.CategoryID=10 then A.Amount else 0 end)as Ct10
from
(select p.CategoryID,(s.Quantity*p.Price) as Amount,date_format(s.SaleDate,'%Y-%m')as YM 
from Sales as s 
join Products as p on s.ProductID=p.ProductID)as A 
group by A.YM
order by A.YM;


--Q9

