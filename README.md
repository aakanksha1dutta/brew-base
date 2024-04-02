# brewbase

A cafe database for workers, managers and customers alike.

## Schema Information
### Customer

| Field              | Type         | Null | Key | Default | Extra |
| ------------------ | ------------ | ---- | --- | ------- | ----- | 
| CustomerID         | varchar(20)  | NO   | PRI | NULL    |       |
| Customer_FirstName | varchar(20)  | NO   |     | NULL    |       |
| Customer_LastName  | varchar(20)  | NO   |     | NULL    |       |
| Customer_Email     | varchar(40)  | NO   |     | NULL    |       |
| Customer_Phone     | char(10)     | NO   | UNI | NULL    |       |
| DOB                | date         | NO   |     | NULL    |       |
| Customer_Street    | varchar(255) | NO   |     | NULL    |       |
| Customer_City      | varchar(20)  | NO   |     | NULL    |       |
| Customer_State     | char(2)      | NO   |     | NULL    |       |
| Customer_Zip       | char(5)      | NO   |     | NULL    |       |

### Worker

| Field            | Type         | Null | Key | Default | Extra |
| ---------------- | ------------ | ---- | --- | ------- | ----- |
| WorkerSSN        | char(9)      | NO   | PRI | NULL    |       |
| Worker_FirstName | varchar(20)  | NO   |     | NULL    |       |
| Worker_LastName  | varchar(20)  | NO   |     | NULL    |       |
| Worker_Email     | varchar(40)  | NO   | UNI | NULL    |       |
| Worker_Phone     | char(10)     | NO   | UNI | NULL    |       |
| SupervisorSSN    | char(9)      | YES  | MUL | NULL    |       |
| Wage             | decimal(4,2) | YES  |     | 15.00   |       |
| Hire_date        | date         | NO   |     | NULL    |       |
| Worker_Street    | varchar(255) | NO   |     | NULL    |       |
| Worker_City      | varchar(20)  | NO   |     | NULL    |       |
| Worker_State     | char(2)      | NO   |     | NULL    |       |
| Worker_Zip       | char(5)      | NO   |     | NULL    |       |

## MenuCategories

| Field    | Type        | Null | Key | Default | Extra |
| -------- | ----------- | ---- | --- | ------- | ----- |
| Category | varchar(20) | NO   | PRI | NULL    |       |


## Menu
| Field           | Type         | Null | Key | Default        | Extra          |
| --------------- | ------------ | ---- | --- | -------------- | -------------- |
| ItemID          | int          | NO   | PRI | NULL           | auto_increment |
| ItemName        | varchar(20)  | NO   | UNI | NULL           |                |
| ItemDescription | varchar(235) | YES  |     | No Description |                |
| Price           | decimal(4,2) | NO   |     | NULL           |                |
| Category        | varchar(20)  | NO   | MUL | NULL           |                |

## Order_Item


| Field         | Type         | Null | Key | Default | Extra |
| ------------- | ------------ | ---- | --- | ------- | ----- |
| TransactionID | int          | NO   | PRI | NULL    |       |
| ItemID        | int          | NO   | PRI | NULL    |       |
| Quantity      | int          | YES  |     | NULL    |       |
| Subtotal      | decimal(5,2) | YES  |     | NULL    |       |

## Transaction

| Field         | Type         | Null | Key | Default | Extra |
| ------------- | ------------ | ---- | --- | ------- | ----- |
| TransactionID | int          | NO   | PRI | NULL    |       |
| Timestamp     | datetime     | NO   |     | NULL    |       |
| TotalAmt      | decimal(5,2) | NO   |     | NULL    |       |
| CustomerID    | varchar(20)  | NO   | MUL | NULL    |       |
| WorkerSSN     | char(9)      | NO   | MUL | NULL    |       |



