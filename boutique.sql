SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


CREATE TABLE `category` (
  `id` varchar(50) NOT NULL,
  `name` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

ALTER TABLE `category`
  ADD PRIMARY KEY (`id`);

CREATE TABLE `product` (
  `ref` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `type` varchar(64) NOT NULL,
  `price` double NOT NULL,
  `shipping` double NOT NULL,
  `description` text NOT NULL,
  `manufacturer` varchar(64) NOT NULL,
  `image` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

ALTER TABLE `product`
  ADD PRIMARY KEY (`ref`);

CREATE TABLE `prod_cat` (
  `prod_ref` int(11) NOT NULL,
  `cat_id` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

ALTER TABLE `prod_cat`
  ADD PRIMARY KEY (`prod_ref`,`cat_id`),
  ADD KEY `fk` (`cat_id`);

ALTER TABLE `prod_cat`
  ADD CONSTRAINT `fk_foreign_key_name` FOREIGN KEY (`prod_ref`) REFERENCES `product` (`ref`),
  ADD CONSTRAINT `prod_cat_ibfk_1` FOREIGN KEY (`cat_id`) REFERENCES `category` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;
