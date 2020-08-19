-- ‰—p‚P‚O
update Customers set CustomerCode=concat(CustomerClassID,lpad(PrefecturalID,2,0),lpad(CustomerID,4,0));
select c.CustomerCode=concat(c.CustomerClassID,lpad(c.PrefecturalID,2,0),lpad(c.CustomerID,4,0))as ŒÚ‹q”Ô† from Customers as c;
select c.CustomerID,c.CustomerClassID,lpad(c.PrefecturalID,2,0)as Œ§”Ô†,lpad(c.CustomerID,4,0)as ŒÚ‹q”Ô†,concat(c.CustomerClassID,lpad(c.PrefecturalID,2,0),lpad(c.CustomerID,4,0))as •ÏX from Customers as c;
select (c.CustomerClassID*1000000)+(c.PrefecturalID*10000)+c.CustomerID from Customers as c;
select *from Customers as c;
update Customers set CustomerCode=concat('a',CustomerID) where CustomerID=1;
update Customers set CustomerCode=concat('200',CustomerID) where CustomerID=1;

