-- BSIT221-A E-STORE-RIA DATABASE DATA
-- - De Borja, Abdul Aziz
-- - Rausa, Zyrha Alliah
-- - Celino, Andrea Charisse 
-- - Dinero, Khylle 
-- - Brofar, Euwayne Paulette

INSERT INTO `addons` (`id`, `category`, `addons1`, `addons2`, `addons3`, `addons4`, `price1`, `price2`, `price3`, `price4`, `status`) VALUES
(1, 'coffee', 'Espresso Shots', 'Sauce', 'Syrup', 'Drizzle', 20, 25, 25, 25, 'available'),
(2, 'latte', 'Espresso Shots', 'Sauce', 'Syrup', 'Drizzle', 20, 25, 25, 25, 'available'),
(3, 'specials', 'Espresso Shots', 'Sauce', 'Syrup', 'Drizzle', 20, 25, 25, 25, 'available');

INSERT INTO `attendance` (`id`, `eid`, `employee_id`, `status`, `name`, `rank`, `time_in`, `time_out`, `duty`, `day`, `month`, `year`) VALUES
(1, 2, 'EID2024-120111', 'off', 'De Borja, Abdul Aziz', 'Cashier', '11:50:07', '19:50:12', 'late', '05', '03', '24'),
(2, 2, 'EID2024-120111', 'off', 'De Borja, Abdul Aziz', 'Cashier', '11:51:21', '19:51:27', 'On time', '07', '03', '24'),
(3, 4, 'EID2024-120333', 'off', 'Celino, Andrea Charisse', 'Bartender', '19:05:42', '03:51:46', 'On time', '06', '03', '24'),
(4, 4, 'EID2024-120333', 'off', 'Celino, Andrea Charisse', 'Bartender', '13:55:20', '15:55:24', 'Early Out', '01', '03', '24'),
(5, 3, 'EID2024-120222', 'off', 'Brofar, Euwayne Paulette', 'Bartender', '10:56:38', '18:56:44', 'On time', '04', '03', '24'),
(6, 3, 'EID2024-120222', 'off', 'Brofar, Euwayne Paulette', 'Bartender', '13:58:06', '18:58:09', 'Early Out', '07', '03', '24'),
(7, 5, 'EID2024-120444', 'off', 'Dinero, Khylle Jefferson', 'Cashier', '18:58:19', '02:58:22', 'On time', '04', '03', '24'),
(8, 5, 'EID2024-120444', 'off', 'Dinero, Khylle Jefferson', 'Cashier', '14:00:01', '22:00:04', 'On time', '07', '03', '24'),
(9, 6, 'EID2024-120555', 'off', 'Rausa, Zyrha Alliah ', 'Manager', '12:00:21', '22:00:25', 'late', '03', '03', '24'),
(10, 6, 'EID2024-120555', 'off', 'Rausa, Zyrha Alliah ', 'Manager', '15:02:37', '23:02:40', 'On time', '07', '03', '24'),
(11, 4, 'EID2024-120333', 'on', 'Celino, Andrea Charisse', 'Bartender', '14:08:40', '0', 'On Time', '07', '03', '24');

INSERT INTO `customer` (`id`, `uid`, `name`, `username`, `email`, `address`, `contact`, `created`) VALUES
(1, 7, 'Young, Ethan', 'ethanegg', 'ethany@gmail.com', 'Brgy. Halang, Calamba City', 'No Contact', '03-07-24'),
(2, 8, 'Togado, Apple Jane', 'apple', 'applet@gmail.com', 'Magdalena, Laguna', 'No Contact', '03-07-24');

INSERT INTO `employee` (`id`, `eid`, `employee_id`, `rank`, `name`, `gender`, `age`, `birthdate`, `birthplace`, `address`, `contact`, `email`, `image`, `hire_date`) VALUES
(1, 2, 'EID2024-120111', 'Cashier', 'De Borja, Abdul Aziz', 'Male', '19', '2004-09-08', 'Bay', '0812 , Bay, Laguna,  4033', '09123456789', 'abduldb09@gmail.com', 'abdul.png', '2024-03-07'),
(2, 3, 'EID2024-120222', 'Bartender', 'Brofar, Euwayne Paulette', 'Female', '29', '2004-04-27', 'Calamba', '0427 Parian, Calamba , Laguna,  4027', '09123456789', 'euwayne@gmail.com', 'pau.png', '2024-03-07'),
(3, 4, 'EID2024-120333', 'Bartender', 'Celino, Andrea Charisse', 'Female', '20', '2003-10-27', 'Calamba', '1027 Del Remedio, San Pablo, Laguna,  4000', '09123456789', 'celinoandrea3@gmail.com', 'andrea.png', '2024-03-07'),
(4, 5, 'EID2024-120444', 'Cashier', 'Dinero, Khylle Jefferson', 'Male', '22', '2002-02-03', 'Calamba', '0302 Milagrosa, Calamba, Laguna,  4027', '09123456789', 'khylledinero@gmail.com', 'khylle.png', '2024-03-07'),
(5, 6, 'EID2024-120555', 'Manager', 'Rausa, Zyrha Alliah ', 'Female', '20', '2003-12-23', 'Calamba', '1223 Palo-Alto, Calamba, Laguna,  4027', '09123456789', 'rausazy@gmail.com', 'zyrha.png', '2024-03-07');

INSERT INTO `orders` (`id`, `user_id`, `fname`, `lname`, `product`, `size`, `type`, `addons`, `info`, `contact`, `note`, `payment`, `total`, `date`, `status`, `transaction`, `reference`) VALUES
(1, 7, 'Young', 'Ethan', '1 Matcha, 1 Macadamia, 1 Flat White', '22 oz, 22 oz, 22 oz', 'iced, iced, hot', '[] | ,  [\"Espresso Shots\",\"Sauce\",\"Syrup\",\"Drizzle\"] | ,  [\"Espresso Shots\",\"Sauce\",\"Syrup\",\"Drizzle\"] | ', 'Halang, Calamba City | Burger King', '0923456794', '', 'cash ', 627, '02:10PM 03-07-24 ', 'completed', 'delivery', 'Istoria1818a4a10b9c'),
(2, 8, 'Apple Jane', 'Togado', '1 Caramel Macchiato, 1 Strawberry Milk', '16 oz, 22 oz', 'iced, iced', '[\"Espresso Shots\",\"Sauce\",\"Syrup\",\"Drizzle\"] | ,  [] | ', '2024-03-07 | 15:36', '09324568421', '', 'gcash 09345683492', 383, '02:15PM 03-07-24 ', 'pending', 'pickup', 'Istoria2118b761879e');

INSERT INTO `review` (`id`, `user_id`, `name`, `orders`, `comment`, `image`, `rating`, `reference`, `date`) VALUES
(1, 7, 'Anonymous', '1 Matcha, 1 Macadamia, 1 Flat White', 'YUMMY!', 'matcha.png', 0, 'Istoria1818a4a10b9c', '03-07-24');


INSERT INTO `sales` (`id`, `eid`, `total`, `type`, `date`, `time`, `reference`) VALUES
(1, 4, 627, 'online', '07-03-24', '14:10:41 PM', 'Istoria1818a4a10b9c');


INSERT INTO `user` (`id`, `type`, `email`, `password`) VALUES
(2, 'employee', 'abdul@employee', 'abdul123'),
(3, 'employee', 'pau@employee', 'pau123'),
(4, 'employee', 'dea@employee', 'dea123'),
(5, 'employee', 'khylle@employee', 'khylle123'),
(6, 'employee', 'zy@employee', 'zy123'),
(7, 'user', 'ethany@gmail.com', 'Ethan123-'),
(8, 'user', 'applet@gmail.com', 'Apple123-');


INSERT INTO `products` (`id`, `name`, `price`, `price_range`, `image`, `category`, `status`) VALUES
(1, 'Americano', 69, '99', 'hot americano.png', 'coffee', 'available'),
(2, 'Capuccino', 79, '109', 'cappucino.png', 'coffee', 'available'),
(3, 'Flat White', 79, '109', 'flat white.png', 'coffee', 'available'),
(4, 'Baristas Choice', 129, '159', '3.png', 'specials', 'available'),
(5, 'Caramel Macchiato', 129, '159', 'caramel mach.png', 'specials', 'available'),
(6, 'Cinnamon Agave', 129, '159', 'cinnamon agaive.png', 'specials', 'available'),
(7, 'Salted Caramel', 129, '159', 'salted caramel.png', 'specials', 'available'),
(8, 'Strawberry Macchiato', 129, '159', 'strawberry macchiato.png', 'specials', 'available'),
(9, 'Butterscotch ', 99, '129', 'butterscotch.png', 'latte', 'available'),
(10, 'Caramel Latte', 99, '129', 'caramel latte.png', 'latte', 'available'),
(11, 'French Vanilla', 99, '129', 'french vanilla.png', 'latte', 'available'),
(12, 'Hazelnut', 99, '129', 'hazelnut latte.png', 'latte', 'available'),
(13, 'Macadamia', 99, '129', 'macademia.png', 'latte', 'available'),
(14, 'Spanish Latte', 99, '129', 'spanish (2).png', 'latte', 'available'),
(15, 'Sea Salt', 99, '129', 'seasalt.png', 'latte', 'available'),
(16, 'Vanilla ', 99, '129', 'vanilla latte.png', 'latte', 'available'),
(17, 'White Chocolate', 99, '129', 'white chocolate.png', 'latte', 'available'),
(18, 'Choco', 119, '149', 'choco.png', 'noncoffee', 'available'),
(19, 'Choco Hazelnut', 119, '149', 'choco hazelnut.png', 'noncoffee', 'available'),
(20, 'Matcha', 119, '149', 'matcha.png', 'noncoffee', 'available'),
(21, 'Strawberry Milk', 119, '149', 'strawberry milk.png', 'noncoffee', 'available');
