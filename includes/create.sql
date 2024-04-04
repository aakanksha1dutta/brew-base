-- Create the database
CREATE DATABASE IF NOT EXISTS brewbase;
USE brewbase;


CREATE TABLE IF NOT EXISTS CUSTOMER(
    CustomerID VARCHAR(20) PRIMARY KEY,
    Customer_FirstName VARCHAR(20) NOT NULL,
    Customer_LastName VARCHAR(20) NOT NULL,
    Customer_Email VARCHAR(40) NOT NULL,
    Customer_Phone CHAR(10) UNIQUE NOT NULL,
    DOB DATE NOT NULL,
    Customer_Street VARCHAR(255) NOT NULL,
    Customer_City VARCHAR(20) NOT NULL,
    Customer_State CHAR(2) NOT NULL,
    Customer_Zip CHAR(5) NOT NULL
);


CREATE TABLE IF NOT EXISTS WORKER(
    WorkerSSN CHAR(9) PRIMARY KEY,
    Worker_FirstName VARCHAR(20) NOT NULL,
    Worker_LastName VARCHAR(20) NOT NULL,
    Worker_Email VARCHAR(40) UNIQUE NOT NULL,
    Worker_Phone CHAR(10) UNIQUE NOT NULL,
    SupervisorSSN CHAR(9),
    Wage DECIMAL(4,2) DEFAULT 15.00,
    Hire_date DATE NOT NULL,
    Worker_Street VARCHAR(255) NOT NULL,
    Worker_City VARCHAR(20) NOT NULL,
    Worker_State CHAR(2) NOT NULL,
    Worker_Zip CHAR(5) NOT NULL,
    FOREIGN KEY(SupervisorSSN) REFERENCES WORKER(WorkerSSN)
);


CREATE TABLE IF NOT EXISTS TRANSACTION(
    TransactionID INT PRIMARY KEY,
    Timestamp DATETIME NOT NULL,
    TotalAmt decimal(5,2) NOT NULL,
    CustomerID VARCHAR(20) NOT NULL,
    FOREIGN KEY(CustomerID) REFERENCES CUSTOMER(CustomerID) ON UPDATE CASCADE
);

CREATE TABLE IF NOT EXISTS MenuCategories(
    Category VARCHAR(20) PRIMARY KEY
);

CREATE TABLE IF NOT EXISTS MENU(
    ItemID INT AUTO_INCREMENT PRIMARY KEY,
    ItemName varchar(100) NOT NULL UNIQUE,
    ItemDescription varchar(235) DEFAULT "No Description",
    Price decimal(4,2) NOT NULL,
    Category varchar(20) NOT NULL,
    FOREIGN KEY(Category) REFERENCES MenuCategories(Category) ON UPDATE CASCADE
);


CREATE TABLE IF NOT EXISTS Order_Item(
    TransactionID INT,
    ItemID INT,
    Quantity INT,
    Subtotal DECIMAL(5,2),
    CONSTRAINT PK_Order_Item PRIMARY KEY (TransactionID, ItemID),
    FOREIGN KEY(TransactionID) REFERENCES Transaction(TransactionID) ON DELETE CASCADE,
    FOREIGN KEY(ItemID) REFERENCES Menu(ItemID)
);







