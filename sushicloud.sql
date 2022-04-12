CREATE TABLE `users` (
  `username` varchar(50),
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

CREATE TABLE `admin` (
  `username` varchar(50),
  `password` varchar(255),
  `email` varchar(50),
  `first_name` varchar(50),
  `last_name` varchar(50)
) 


/*TODO: INSERT ANIME INTO DATABASE*/