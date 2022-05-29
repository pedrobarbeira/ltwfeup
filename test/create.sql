PRAGMA foreign_keys=on;

/*ELIMINAR TABELAS CASO EXISTAM*/

DROP TABLE IF EXISTS Authenticate;
DROP TABLE IF EXISTS UserOrder;
DROP TABLE IF EXISTS OrderDish;
DROP TABLE IF EXISTS Dish;
DROP TABLE IF EXISTS Review;
DROP TABLE IF EXISTS RestaurantOwner;
DROP TABLE IF EXISTS User;
DROP TABLE IF EXISTS Restaurant;
DROP TABLE IF EXISTS Receipt;
DROP TABLE IF EXISTS Photo;
DROP TABLE IF EXISTS Category;
DROP TABLE IF EXISTS Answer;

/*CRIAR TABELAS*/

CREATE TABLE User (
    userID      INTEGER PRIMARY KEY,
    address      text,
    name        text,
    phoneNumber char(9)         NOT NULL,
    profilePic  INTEGER REFERENCES Photo  
);

CREATE TABLE Authenticate(
    username varchar(20),
    password varchar(30),
    userID INTEGER REFERENCES User,
    PRIMARY KEY(username, password)
);


CREATE TABLE RestaurantOwner (
    userID      INTEGER PRIMARY KEY REFERENCES User
                ON DELETE CASCADE
                ON UPDATE CASCADE,
    restaurantID INTEGER REFERENCES Restaurant        
);

CREATE TABLE Restaurant(
    restaurantID    INTEGER PRIMARY KEY,
    name            varchar(50)     NOT NULL UNIQUE,
    address         text,
    category        text REFERENCES Category,
    photoID         text REFERENCES Photo  
);

CREATE TABLE Dish(
    dishID INTEGER PRIMARY KEY, 
    restaurantID INTEGER REFERENCES Restaurant,
    name    varchar(30) NOT NULL,
    price   real        NOT NULL,
    category        text REFERENCES Category,
    photoID INTEGER REFERENCES Photo
);

CREATE TABLE UserOrder(
    orderID     INTEGER PRIMARY KEY,
    state       varchar(20) DEFAULT 'received',
    userID      INTEGER REFERENCES User
                ON DELETE RESTRICT
                ON UPDATE CASCADE,

    CONSTRAINT order_state_check    CHECK ((state = 'received')
                                    OR (state = 'preparing')
                                    OR (state = 'ready')
                                    OR (state = 'delivered'))
);

CREATE TABLE OrderDish(
    orderID INTEGER REFERENCES UserOrder
            ON DELETE CASCADE
            ON UPDATE CASCADE,
    dishID INTEGER REFERENCES Dish
            ON DELETE RESTRICT
            ON UPDATE CASCADE,
    quantity INTEGER
);

CREATE TABLE Photo(
    photoID     INTEGER PRIMARY KEY,
    photoURL    varchar(256)
);

CREATE TABLE Category(
    categoryID int PRIMARY KEY,
    name        text
);

CREATE TABLE Review(
    reviewID INTEGER PRIMARY KEY,
    comment     text,
    score       int,
    reviewDate  DATE,
    userID      INTEGER REFERENCES User
                ON DELETE SET NULL
                ON UPDATE CASCADE,
    restaurantID INTEGER REFERENCES Restaurant
                ON DELETE CASCADE
                ON UPDATE CASCADE
);

CREATE TABLE Answer(
    answerID int PRIMARY KEY,
    reviewID INT REFERENCES Review,
    comment text,
    answerDate date
);


/*PHOTO*/
INSERT INTO Photo(photoID, photoURL)
    VALUES(1, 'https://i.pinimg.com/564x/c2/9b/b4/c29bb4d00163e458c8b1c2884fb85f40.jpg');
INSERT INTO Photo(photoID, photoURL)
    VALUES(2, 'https://echoboomer.pt/wp-content/uploads/2020/10/burger-king-sao-joao.jpg');
INSERT INTO Photo(photoID, photoURL)
    VALUES(3, 'https://cardapio.menu/storage/media/dishes_main/1827381/image.jpeg');
INSERT INTO Photo(photoID, photoURL)
    VALUES(4, 'https://br.web.img2.acsta.net/pictures/19/12/19/19/35/2432972.jpg');

/*USER*/
INSERT INTO User(userID, address, name, phoneNumber, profilePic)
    VALUES(1, 'LTW', 'Chad Giga', 912345678, 1);
INSERT INTO User(userID, address, name, phoneNumber, profilePic)
    VALUES(2, 'FEUP', 'Joao Cena', 912345670, 4);

/*AUTHENTICATE*/
INSERT INTO Authenticate(username, password, userID)
    VALUES('admin', 'admin', 1);
INSERT INTO Authenticate(username, password, userID)
    VALUES('John', 'doe12345', 2);

/*CATEGORY*/
INSERT INTO Category(categoryID, name)
    VALUES(1, 'burguer');

/*RESTAURANT*/
INSERT INTO Restaurant(restaurantID, name, address, category, photoID)
    VALUES(1, 'BurgerKing S. João', 'Tv. Asprela, 4200-162 Porto', 1, 2);

/*RESTAURANTOWNER*/
INSERT INTO RestaurantOwner(userID, restaurantID)
    VALUES(1, 1);

/*DISH*/
INSERT INTO Dish(dishID, restaurantID, name, price, category, photoID)
    VALUES(1, 1, "Big King", 5, 1, 3);

/*USERORDER*/
INSERT INTO UserOrder(orderId, state, userID)
    VALUES(1, 'preparing', 2);

/*ORDERDISH*/
INSERT INTO OrderDish(orderId, dishId, quantity)
    VALUES(1, 1, 5);


/*REVIEW*/
INSERT INTO Review(reviewID, comment, score, reviewDate, userID, restaurantID)
    VALUES(1, 'this place is great. total mouthgasm', 5, '2022-05-22', 2, 1);

/*ANSWER*/
INSERT INTO Answer(answerID, reviewID, comment, answerDate)
    VALUES(1, 1, "thank you so much. we do work hard!", '2022-05-28');
