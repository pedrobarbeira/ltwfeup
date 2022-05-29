.mode columns
.headers on
.nullvalue NULL

/*PRINTS THE DATABASE*/

.print ''

.print 'RESTAURANTS'
.print ''

SELECT restaurantID, name
FROM Restaurant;

.print ''



.print ''

.print 'RESTAURANT OWNERS'
.print ''

SELECT  User.username as Owner,
        Restaurant.name as Restaurant
FROM RestaurantOwner, User, Restaurant
WHERE (RestaurantOwner.userID = User.userID) AND (RestaurantOwner.restaurantID = Restaurant.restaurantID);

.print ''



.print ''

.print 'TOTAL USERS'
.print ''

SELECT username FROM User;

.print ''



.print ''

.print 'USERS THAT ARE NOT RESTAURANT OWNERS'
.print ''

SELECT username FROM User
WHERE User.userID NOT IN (SELECT userID FROM RestaurantOwner);

.print ''


.print ''

.print 'DISHES PER RESTAURANT'
.print ''

SELECT  Restaurant.name as Restaurant,
        Dish.name as Dish
FROM Restaurant, Dish
WHERE (Restaurant.restaurantID = Dish.restaurantID)

ORDER BY Restaurant;

.print ''


.print ''

.print 'ORDERS PER RESTAURANT'
.print ''

SELECT  Restaurant.name as Restaurant,
        User.username as Customer,
        Dish.name as Dish,
        OrderDish.quantity as Quant,
        (Dish.price * OrderDish.quantity) as TotalPrice
FROM UserOrder, OrderDish, Restaurant, Dish, User
WHERE ((Restaurant.restaurantID = Dish.restaurantID)
AND (OrderDish.dishID = Dish.dishID)
AND (OrderDish.orderID = UserOrder.orderID)
AND (UserOrder.userID = User.userID))
ORDER BY RESTAURANT;
.print ''

.print ''

.print 'REVIEWS'
.print ''

SELECT  Restaurant.name as Restaurant,
        User.username as Customer,
        Review.score as Score,
        Review.timePublished as PublishedAt

FROM Restaurant, User, Review
WHERE ((Restaurant.restaurantID = Review.restaurantID)
AND (Review.userID = User.userID))
ORDER BY RESTAURANT;
.print ''