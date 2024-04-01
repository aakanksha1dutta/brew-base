USE brewbase;

INSERT INTO MENUCATEGORIES VALUES("BEVERAGE"),("APPETIZER"),("DESSERT"),("ENTREE");

INSERT INTO MENU(ItemName, ItemDescription, Price, Category) values ("Double Hot Chocolate", "Indulgent Drink", 10.00, "Beverage");
INSERT INTO MENU(ItemName, ItemDescription, Price, Category) values ("Iced Caramel Macchiato", "Caramel Laced Shot of Flavor", 11.00, "Beverage");


/*

add this !!


BEVERAGES:
"Hot Jasmine Tea"
"Iced Lavender Latte"
"Iced Americano"

APPETIZER
"Baby Corn Crisps"
"Caesar Salad"
"Lox Bagel"

ENTREE
"BBQ Tofu"
"Miso Ramen"
"Crispy Rice Rolls"
"Aglio e Olio Pasta"

DESSERT
"Carrot Cake"
"Black Forest Cake" 
"Glazed Doughnut"
"Mint Choco Ice Cream"
*/

-- TO BE DONE: WORKER WITH ONE OF THEM AS A MANAGER, CUSTOMER TABLE: 1 CUSTOMER , TRANSACTION 1 TRANSACTION, ORDER_ITEMS ORDER ITEMS FROM ONE TRANSACTION.