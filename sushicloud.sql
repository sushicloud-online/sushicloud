CREATE TABLE `users` (
  `username` varchar(50) NOT NULL,
  `password` varchar(255),
  `email` varchar(50),
  `first_name` varchar(50),
  `last_name` varchar(50),
  `address` varchar(255)
) 

CREATE TABLE `anime` (
  `title` varchar(50),
  `year` char(4),
  `season` varchar(50),
  `genre` varchar(50),
  `description` varchar(255),
  `image_url` varchar(50)
)

CREATE TABLE `users` (
  `username` varchar(50) NOT NULL,
  `pass` varchar(255) DEFAULT NULL,
  `email` varchar(50) DEFAULT NULL,
  `first_name` varchar(50) DEFAULT NULL,
  `last_name` varchar(50) DEFAULT NULL
) 


/*TODO: INSERT ANIME INTO DATABASE*/