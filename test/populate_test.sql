PRAGMA foreign_keys=on;

/*POPULATE THE DATABASE FOR TESTING PURPOSES*/

/*RESTAURANTS*/

INSERT INTO Restaurant (name) VALUES ('Sushi Mania');
INSERT INTO Restaurant (name) VALUES ('Fajitas World');
INSERT INTO Restaurant (name) VALUES ('Pizzeria Della Nonna');
INSERT INTO Restaurant (name) VALUES ('One Piece');
INSERT INTO Restaurant (name) VALUES ('Chicken Crossed The Road');
INSERT INTO Restaurant (name) VALUES ('Cheesy Grill');

/*USERS*/

INSERT INTO User (username, password, phoneNumber) VALUES ('catarina38', '123456', '912365481');
INSERT INTO User (username, password, phoneNumber) VALUES ('josemaria', '1111', '912254451');
INSERT INTO User (username, password, phoneNumber) VALUES ('sergio12lopes', 'password', '925648781');
INSERT INTO User (username, password, phoneNumber) VALUES ('beamsl', 'naosei', '933615488');
INSERT INTO User (username, password, phoneNumber) VALUES ('joanamariaaa', 'maria12', '911225326');
INSERT INTO User (username, password, phoneNumber) VALUES ('fpmf', 'supermario', '914587236');
INSERT INTO User (username, password, phoneNumber) VALUES ('sandrasilva', 'ss23ss', '965253221');

/*RESTAURANTS OWNERS*/

INSERT INTO RestaurantOwner VALUES (2, 1);
INSERT INTO RestaurantOwner VALUES (3, 2);
INSERT INTO RestaurantOwner VALUES (7, 3);

/*DISHES*/

INSERT INTO Dish (restaurantID, name, price) VALUES (1, 'Sashimi', 8.50);
INSERT INTO Dish (restaurantID, name, price) VALUES (1, 'Temaki', 3.50);
INSERT INTO Dish (restaurantID, name, price) VALUES (1, 'Nigiri', 4.00);
INSERT INTO Dish (restaurantID, name, price) VALUES (3, 'Pizza Pepperoni', 9.50);
INSERT INTO Dish (restaurantID, name, price) VALUES (3, 'Pizza Mediterrânea', 13.50);
INSERT INTO Dish (restaurantID, name, price) VALUES (5, 'Frango Assado', 6.00);
INSERT INTO Dish (restaurantID, name, price) VALUES (5, 'Frango Assado c/ picante', 6.50);
INSERT INTO Dish (restaurantID, name, price) VALUES (5, 'Menu Frango Assado + Dose Batatas', 10.50);


/*USERS ORDERS*/

INSERT INTO UserOrder (userID) VALUES (1);
INSERT INTO OrderDish VALUES (1, 2, 3);
INSERT INTO UserOrder (userID) VALUES (4);
INSERT INTO OrderDish VALUES (2, 5, 1);
INSERT INTO UserOrder (userID) VALUES (5);
INSERT INTO OrderDish VALUES (3, 1, 6);
INSERT INTO UserOrder (userID) VALUES (6);
INSERT INTO OrderDish VALUES (4, 7, 2);
INSERT INTO UserOrder (userID) VALUES (7);

/*REVIEWS*/

INSERT INTO Review (score, userID, restaurantID) VALUES (4, 1, 1);
INSERT INTO Review (score, userID, restaurantID) VALUES (5, 4, 3);
INSERT INTO Review (score, userID, restaurantID) VALUES (3, 6, 5);
INSERT INTO Review (score, userID, restaurantID) VALUES (2, 7, 3);
