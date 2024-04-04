USE brewbase;

INSERT INTO MENUCATEGORIES VALUES("BEVERAGE"),("APPETIZER"),("DESSERT"),("ENTREE");

INSERT INTO MENU(ItemID, ItemName, ItemDescription, Price, Category) values (1, "Double Hot Chocolate", "Indulgent Drink", 5.00, "Beverage");
INSERT INTO MENU(ItemID, ItemName, ItemDescription, Price, Category) values (2, "Iced Caramel Macchiato", "Caramel Laced Shot of Flavor", 6.00, "Beverage");
INSERT INTO MENU(ItemID, ItemName, ItemDescription, Price, Category) values (3, "Hot Jasmine Tea", "Sensual Jasmine Bliss", 6.00, "Beverage");
INSERT INTO MENU(ItemID, ItemName, ItemDescription, Price, Category) values (4, "Iced Lavender Latte", "Icy Lavender Delight", 7.00, "Beverage");
INSERT INTO MENU(ItemID, ItemName, ItemDescription, Price, Category) values (5, "Iced Americano", "Refreshing Cool-Down", 5.00, "Beverage");

INSERT INTO MENU(ItemID, ItemName, ItemDescription, Price, Category) values (10, "Baby Corn Crisps", "Bite-sized Crunchy Goodness", 9.00, "Appetizer");
INSERT INTO MENU(ItemID, ItemName, ItemDescription, Price, Category) values (11, "Caesar Salad", "Crisp Greens, Tangy Dressing", 10.00, "Appetizer");
INSERT INTO MENU(ItemID, ItemName, ItemDescription, Price, Category) values (12, "Lox Bagel", "Buttery Bliss with Smoked Salmon", 10.00, "Appetizer");

INSERT INTO MENU(ItemID, ItemName, ItemDescription, Price, Category) values (13, "BBQ Tofu", "Tangy, Grilled Vegan Goodness", 16.00, "Entree");
INSERT INTO MENU(ItemID, ItemName, ItemDescription, Price, Category) values (21, "Miso Ramen", "Umami Heaven in a Bowl", 18.00, "Entree");
INSERT INTO MENU(ItemID, ItemName, ItemDescription, Price, Category) values (22, "Crispy Rice Rolls", "Crunchy Delight, Bite-sized Joy", 17.00, "Entree");
INSERT INTO MENU(ItemID, ItemName, ItemDescription, Price, Category) values (23, "Aglio e Olio Pasta", "Garlic-infused Elegance, Pasta Perfection", 20.00, "Entree");

INSERT INTO MENU(ItemID, ItemName, ItemDescription, Price, Category) values (30, "Carrot Cake", "Layers of Moist Carrot Infusion", 11.00, "Dessert");
INSERT INTO MENU(ItemID, ItemName, ItemDescription, Price, Category) values (31, "Black Forest Cake", "Rich Chocolate Layers, Tart Cherry Bliss", 13.00, "Dessert");
INSERT INTO MENU(ItemID, ItemName, ItemDescription, Price, Category) values (32, "Glazed Doughnut", "Golden Rings of Sweet Perfection", 10.00, "Dessert");
INSERT INTO MENU(ItemID, ItemName, ItemDescription, Price, Category) values (33, "Mint Choco Ice Cream", "Refreshing Mint, Indulgent Chocolate", 9.00, "Dessert");

INSERT INTO WORKER(WorkerSSN, Worker_FirstName, Worker_LastName, Worker_Email, Worker_Phone, Wage, Hire_date, Worker_Street, Worker_City, Worker_State, Worker_Zip) values ("926583759", "Harper", "Bennet", "hbennet@gmail.com", "1234567890", 25.00, "2010-05-15", "123 Main Street", "Rochester", "NY", "14608");
INSERT INTO WORKER(WorkerSSN, Worker_FirstName, Worker_LastName, Worker_Email, Worker_Phone, SupervisorSSN, Wage, Hire_date, Worker_Street, Worker_City, Worker_State, Worker_Zip) values ("164924476", "Aurora", "Hayes", "ahayes@gmail.com", "2345678901", "926583759", 18.00, "2022-10-30", "567 Elmwood Avenue", "Rochester", "NY", "14620");
INSERT INTO WORKER(WorkerSSN, Worker_FirstName, Worker_LastName, Worker_Email, Worker_Phone, SupervisorSSN, Wage, Hire_date, Worker_Street, Worker_City, Worker_State, Worker_Zip) values ("561954832", "Daniel", "Greene", "dgreene@gmail.com", "3456789012", "926583759", 15.00, "2024-01-12", "789 Maple Street", "Rochester", "NY", "14611");

INSERT INTO CUSTOMER(CustomerID, Customer_FirstName, Customer_LastName, Customer_Email, Customer_Phone, DOB, Customer_Street, Customer_City, Customer_State, Customer_Zip) 
values ("sarcher123", "Serena", "Archer", "sarcher@gmail.com", "4567890123", "2000-02-24", "321 Oakwood Avenue", "Rochester", "NY", "14613");

INSERT INTO TRANSACTION(TransactionID, Timestamp, TotalAmt, CustomerID) values (2340109, "2024-04-01 13:34:05", 85.00, "sarcher123");

INSERT INTO ORDER_ITEM(TransactionID, ItemID, Quantity, Subtotal) values (2340109, 2, 2, 12.00);
INSERT INTO ORDER_ITEM(TransactionID, ItemID, Quantity, Subtotal) values (2340109, 10, 1, 9.00);
INSERT INTO ORDER_ITEM(TransactionID, ItemID, Quantity, Subtotal) values (2340109, 23, 1, 20.00);
INSERT INTO ORDER_ITEM(TransactionID, ItemID, Quantity, Subtotal) values (2340109, 21, 1, 18.00);
INSERT INTO ORDER_ITEM(TransactionID, ItemID, Quantity, Subtotal) values (2340109, 31, 2, 26.00);
