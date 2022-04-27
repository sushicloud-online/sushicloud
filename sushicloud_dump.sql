-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: localhost
-- Generation Time: Apr 27, 2022 at 07:53 AM
-- Server version: 10.4.21-MariaDB
-- PHP Version: 8.0.15

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `sushicloud`
--

-- --------------------------------------------------------

--
-- Table structure for table `admin`
--

CREATE TABLE `admin` (
  `username` varchar(50) NOT NULL,
  `password` varchar(255) DEFAULT NULL,
  `email` varchar(50) DEFAULT NULL,
  `first_name` varchar(50) DEFAULT NULL,
  `last_name` varchar(50) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `admin`
--

INSERT INTO `admin` (`username`, `password`, `email`, `first_name`, `last_name`) VALUES
('admin_sushi', 'sushi_password', 'sushicloud@cloud.com', 'Sushi', 'Cloud');

-- --------------------------------------------------------

--
-- Table structure for table `anime`
--

CREATE TABLE `anime` (
  `title` varchar(50) DEFAULT NULL,
  `year` char(4) DEFAULT NULL,
  `season` varchar(50) DEFAULT NULL,
  `genre` varchar(50) DEFAULT NULL,
  `description` varchar(2000) DEFAULT NULL,
  `image_url` varchar(50) DEFAULT NULL,
  `episodes` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `anime`
--

INSERT INTO `anime` (`title`, `year`, `season`, `genre`, `description`, `image_url`, `episodes`) VALUES
('Spy x Family', '2022', 'Spring', 'Action, Comedy', 'For the agent known as \"Twilight,\" no order is too tall if it is for the sake of peace. Operating as Westalis master spy, Twilight works tirelessly to prevent extremists from sparking a war with neighboring country Ostania. For his latest mission, he must investigate Ostanian politician Donovan Desmond by infiltrating his sons school: the prestigious Eden Academy. Thus, the agent faces the most difficult task of his career: get married, have a child, and play family.', 'anime_assets/spyxfamily.jpg', 12),
('Demon Slayer', '2022', 'Winter', 'Action', 'The devastation of the Mugen Train incident still weighs heavily on the members of the Demon Slayer Corps. Despite being given time to recover, life must go on, as the wicked never sleep: a vicious demon is terrorizing the alluring women of the Yoshiwara Entertainment District. The Sound Pillar, Tengen Uzui, and his three wives are on the case. However, when he soon loses contact with his spouses, Tengen fears the worst and enlists the help of Tanjirou Kamado, Zenitsu Agatsuma, and Inosuke Hashibira to infiltrate the district\'s most prominent houses and locate the depraved Upper Rank demon.', 'anime_assets/demon-slayer.jpg', 11),
('My Dress-Up Darling', '2022', 'Winter', 'Romance, Slice Of Life', 'High school student Wakana Gojou spends his days perfecting the art of making hina dolls, hoping to eventually reach his grandfather\'s level of expertise. While his fellow teenagers busy themselves with pop culture, Gojou finds bliss in sewing clothes for his dolls. Nonetheless, he goes to great lengths to keep his unique hobby a secret, as he believes that he would be ridiculed were it revealed. Enter Marin Kitagawa, an extraordinarily pretty girl whose confidence and poise are in stark contrast to Gojou\'s meekness. It would defy common sense for the friendless Gojou to mix with the likes of Kitagawa, who is always surrounded by her peers. However, the unimaginable happens when Kitagawa discovers Gojou\'s prowess with a sewing machine and brightly confesses to him about her own hobby: cosplay. Because her sewing skills are pitiable, she decides to enlist his help.', 'anime_assets/dress-up-darling.jpg', 12),
('My Hero Academia Season 5', '2021', 'Spring', 'Action', 'UA Academy\'s Class 1-A has been the focus of a substantial amount of public attention due to the multiple villain attacks they have faced over the past school year. This attention has left Class 1-A\'s rivals, Class 1-B, feeling quite bitter. Desiring to prove their skills, they look forward to the opportunity that has been given to them: a set of mock battles between the students of each class. The classes are split into squads of four, each of which is tasked with capturing the other group members. The winner is the group who first secures all of the opposing team. While this sounds simple, a curveball is thrown into the mix with the inclusion of General Course Student Hitoshi Shinsou, who wishes to transfer into the Hero Course. Despite using his training with Class 1-A\'s homeroom teacher Shouta \'Eraserhead\' Aizawa to prove that he\'s capable of being a real hero, he is still far behind the others due to his lack of experience. However, Shinsou is determined to overcome this challenge. Thus begins the fiery competition between Class 1-A and 1-B as each tries to prove that they are superior to the other.', 'anime_assets/myheroacademia.jpg', 24),
('Dont Toy with Me, Miss Nagatoro', '2021', 'Spring', 'Comedy, Romance, Slice of Life', 'Every day, Naoto Hachiouji is teased relentlessly by Hayase Nagatoro, a first year student he meets one day in the library while working on his manga. After reading his story and seeing his awkward demeanor, she decides from that moment on to toy with him, even calling him \'Senpai\' in lieu of using his real name. At first, Nagatoro\'s relentless antics are more bothersome than anything and leave him feeling embarrassed, as he is forced to cater to her whims. However, as they spend more time together, a strange sort of friendship develops between them, and Naoto finds that life with Nagatoro can even be fun. But one thing\'s for sure: his days will never be dull again.', 'anime_assets/nagatoro.jpg', 12),
('Maid Sama!', '2010', 'Spring', 'Comedy, Romance', 'Misaki Ayuzawa is a unique phenomenon within Seika High School. In a predominantly male institution, she became the first-ever female student council president through her honesty and diligence. Ever since Misaki got promoted to the position, she has been working tirelessly to ensure a better school life for all girls. Despite that, Misaki is very strict with the boys, which has earned her the title \"Demon President.\"  One day, after hearing a girl cry in the hallway, Misaki encounters Takumi Usui—the most popular boy in the school—as he rejects a love confession. Enraged at what she is seeing, Misaki reprimands him for making the girl cry. However, Usui is indifferent and brushes it off as nothing.  Unexpectedly, Misaki soon runs into Usui again, but this time when she is working at a maid cafe! Embarrassed that someone has found out about her secret occupation, Misaki promises herself not to let Usui destroy her reputation. However, the mysterious boy now begins to visit the same cafe regularly to observe and tease Misaki. When push comes to shove, will Usui still be able to keep the president\'s secret?', 'anime_assets/maidsama.jpg', 26),
('Darling in the FranXX', '2018', 'Winter', 'Action, Drama, Romance, Sci-Fi', 'In the distant future, humanity has been driven to near-extinction by giant beasts known as Klaxosaurs, forcing the surviving humans to take refuge in massive fortress cities called Plantations. Children raised here are trained to pilot giant mechas known as FranXX—the only weapons known to be effective against the Klaxosaurs—in boy-girl pairs. Bred for the sole purpose of piloting these machines, these children know nothing of the outside world and are only able to prove their existence by defending their race.  Hiro, an aspiring FranXX pilot, has lost his motivation and self-confidence after failing an aptitude test. Skipping out on his class\' graduation ceremony, Hiro retreats to a forest lake, where he encounters a mysterious girl with two horns growing out of her head. She introduces herself by her codename Zero Two, which is known to belong to an infamous FranXX pilot known as the \"Partner Killer.\" Before Hiro can digest the encounter, the Plantation is rocked by a sudden Klaxosaur attack. Zero Two engages the creature in her FranXX, but it is heavily damaged in the skirmish and crashes near Hiro. Finding her partner dead, Zero Two invites Hiro to pilot the mecha with her, and the duo easily defeats the Klaxosaur in the ensuing fight. With a new partner by his side, Hiro has been given a chance at redemption for his past failures, but at what cost?', 'anime_assets/darling-in-the-franxx.jpg', 24),
('Black Clover', '2017', 'Fall', 'Action, Comedy, Fantasy', 'Asta and Yuno were abandoned at the same church on the same day. Raised together as children, they came to know of the \"Wizard King\"—a title given to the strongest mage in the kingdom—and promised that they would compete against each other for the position of the next Wizard King. However, as they grew up, the stark difference between them became evident. While Yuno is able to wield magic with amazing power and control, Asta cannot use magic at all and desperately tries to awaken his powers by training physically.  When they reach the age of 15, Yuno is bestowed a spectacular Grimoire with a four-leaf clover, while Asta receives nothing. However, soon after, Yuno is attacked by a person named Lebuty, whose main purpose is to obtain Yuno\'s Grimoire. Asta tries to fight Lebuty, but he is outmatched. Though without hope and on the brink of defeat, he finds the strength to continue when he hears Yuno\'s voice. Unleashing his inner emotions in a rage, Asta receives a five-leaf clover Grimoire, a \"Black Clover\" giving him enough power to defeat Lebuty. A few days later, the two friends head out into the world, both seeking the same goal—to become the Wizard King!', 'anime_assets/blackclover.jpg', 170),
('One Piece', '1999', 'Fall', 'Action, Adventure, Fantasy', 'Gol D. Roger was known as the \"Pirate King,\" the strongest and most infamous being to have sailed the Grand Line. The capture and execution of Roger by the World Government brought a change throughout the world. His last words before his death revealed the existence of the greatest treasure in the world, One Piece. It was this revelation that brought about the Grand Age of Pirates, men who dreamed of finding One Piece—which promises an unlimited amount of riches and fame—and quite possibly the pinnacle of glory and the title of the Pirate King.  Enter Monkey D. Luffy, a 17-year-old boy who defies your standard definition of a pirate. Rather than the popular persona of a wicked, hardened, toothless pirate ransacking villages for fun, Luffy\'s reason for being a pirate is one of pure wonder: the thought of an exciting adventure that leads him to intriguing people and ultimately, the promised treasure. Following in the footsteps of his childhood hero, Luffy and his crew travel across the Grand Line, experiencing crazy adventures, unveiling dark mysteries and battling strong enemies, all in order to reach the most coveted of all fortunes—One Piece.', 'anime_assets/onepiece.jpg', 1016),
('Naruto', '2002', 'Fall', 'Action, Adventure, Fantasy', 'Moments prior to Naruto Uzumaki\'s birth, a huge demon known as the Kyuubi, the Nine-Tailed Fox, attacked Konohagakure, the Hidden Leaf Village, and wreaked havoc. In order to put an end to the Kyuubi\'s rampage, the leader of the village, the Fourth Hokage, sacrificed his life and sealed the monstrous beast inside the newborn Naruto.  Now, Naruto is a hyperactive and knuckle-headed ninja still living in Konohagakure. Shunned because of the Kyuubi inside him, Naruto struggles to find his place in the village, while his burning desire to become the Hokage of Konohagakure leads him not only to some great new friends, but also some deadly foes.', 'anime_assets/naruto.jpg', 220),
('Bleach', '2004', 'Fall', 'Action, Adventure, Fantasy', 'Ichigo Kurosaki is an ordinary high schooler—until his family is attacked by a Hollow, a corrupt spirit that seeks to devour human souls. It is then that he meets a Soul Reaper named Rukia Kuchiki, who gets injured while protecting Ichigo\'s family from the assailant. To save his family, Ichigo accepts Rukia\'s offer of taking her powers and becomes a Soul Reaper as a result.  However, as Rukia is unable to regain her powers, Ichigo is given the daunting task of hunting down the Hollows that plague their town. However, he is not alone in his fight, as he is later joined by his friends—classmates Orihime Inoue, Yasutora Sado, and Uryuu Ishida—who each have their own unique abilities. As Ichigo and his comrades get used to their new duties and support each other on and off the battlefield, the young Soul Reaper soon learns that the Hollows are not the only real threat to the human world.', 'anime_assets/bleach.jpg', 366),
('Nisekoi: False Love', '2014', 'Winter', 'Comedy, Romance', 'Raku Ichijou, a first-year student at Bonyari High School, is the sole heir to an intimidating yakuza family. Ten years ago, Raku made a promise to his childhood friend. Now, all he has to go on is a pendant with a lock, which can only be unlocked with the key which the girl took with her when they parted.  Now, years later, Raku has grown into a typical teenager, and all he wants is to remain as uninvolved in his yakuza background as possible while spending his school days alongside his middle school crush Kosaki Onodera. However, when the American Bee Hive Gang invades his family\'s turf, Raku\'s idyllic romantic dreams are sent for a toss as he is dragged into a frustrating conflict: Raku is to pretend that he is in a romantic relationship with Chitoge Kirisaki, the beautiful daughter of the Bee Hive\'s chief, so as to reduce the friction between the two groups. Unfortunately, reality could not be farther from this whopping lie—Raku and Chitoge fall in hate at first sight, as the girl is convinced he is a pathetic pushover, and in Raku\'s eyes, Chitoge is about as attractive as a savage gorilla.  Nisekoi follows the daily antics of this mismatched couple who have been forced to get along for the sake of maintaining the city\'s peace. With many more girls popping up his life, all involved with Raku\'s past somehow, his search for the girl who holds his heart and his promise leads him in more unexpected directions than he expects.', 'anime_assets/nisekoi.jpg', 20),
('Fairy Tail', '2009', 'Fall', 'Action, Adventure, Fantasy', 'In the enchanted Kingdom of Fiore, the lively Lucy Heartfilia has one wish: to join the renowned Fairy Tail—one of the many magical wizard guilds scattered around the continent. Luckily, a chance encounter with Natsu Dragneel, the \"Salamander\" of Fairy Tail, whisks her into the legendary guild.  From Natsu\'s rivalrous antics with ice wizard Gray Fullbuster to the frightening presence of the unmatched combat goddess Erza Scarlet, Fairy Tail\'s powerful mages have a slight penchant for trouble. Through all the lucrative odd jobs and adventures to save the world from destruction lies an absolute and unyielding trust stronger than family that has formed between each guild member.  Teaming up with Natsu, Gray, and Erza, Lucy finds herself amidst the guild\'s most misfit wizards. But as they constantly stand in the eye of every danger, there is one name that never ceases to resurface: Zeref, the feared master of dark magic.', 'anime_assets/fairytail.jpg', 175),
('Haikyuu!!', '2014', 'Spring', 'Sports', 'Ever since having witnessed the \"Little Giant\" and his astonishing skills on the volleyball court, Shouyou Hinata has been bewitched by the dynamic nature of the sport. Even though his attempt to make his debut as a volleyball regular during a middle school tournament went up in flames, he longs to prove that his less-than-impressive height ceases to be a hindrance in the face of his sheer will and perseverance.  When Hinata enrolls in Karasuno High School, the Little Giant\'s alma mater, he believes that he is one step closer to his goal of becoming a professional volleyball player. Although the school only retains a shadow of its former glory, Hinata\'s conviction isn\'t shaken until he learns that Tobio Kageyama—the prodigy who humiliated Hinata\'s middle school volleyball team in a crushing defeat—is now his teammate.  To fulfill his desire of leaving a mark on the realm of volleyball—so often regarded as the domain of the tall and the strong—Hinata must smooth out his differences with Kageyama. Only when Hinata learns what it takes to be a part of a team will he be able to join the race to the top in earnest.', 'anime_assets/haikyuu.jpg', 25),
('Jujutsu Kaisen', '2020', 'Fall', 'Action, Fantasy', 'Idly indulging in baseless paranormal activities with the Occult Club, high schooler Yuuji Itadori spends his days at either the clubroom or the hospital, where he visits his bedridden grandfather. However, this leisurely lifestyle soon takes a turn for the strange when he unknowingly encounters a cursed item. Triggering a chain of supernatural occurrences, Yuuji finds himself suddenly thrust into the world of Curses—dreadful beings formed from human malice and negativity—after swallowing the said item, revealed to be a finger belonging to the demon Sukuna Ryoumen, the \"King of Curses.\"  Yuuji experiences first-hand the threat these Curses pose to society as he discovers his own newfound powers. Introduced to the Tokyo Metropolitan Jujutsu Technical High School, he begins to walk down a path from which he cannot return—the path of a Jujutsu sorcerer.', 'anime_assets/jujutsukaisen.jpg', 24);

-- --------------------------------------------------------

--
-- Table structure for table `list`
--

CREATE TABLE `list` (
  `username` varchar(50) NOT NULL,
  `title` varchar(50) DEFAULT NULL,
  `status` varchar(50) DEFAULT NULL,
  `episodes` int(11) DEFAULT NULL,
  `score` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `list`
--

INSERT INTO `list` (`username`, `title`, `status`, `episodes`, `score`) VALUES
('bri', 'Spy x Family', 'Currently Watching', 3, 10),
('bri', 'Demon Slayer', 'Finished', 11, 10),
('bri', 'Dont Toy with Me, Miss Nagatoro', 'Dropped', 3, 7),
('bri', 'Dont Toy with Me, Miss Nagatoro', 'Finished', 12, 10),

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `username` varchar(50) NOT NULL,
  `password` varchar(255) DEFAULT NULL,
  `email` varchar(50) DEFAULT NULL,
  `first_name` varchar(50) DEFAULT NULL,
  `last_name` varchar(50) DEFAULT NULL,
  `address` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`username`, `password`, `email`, `first_name`, `last_name`, `address`) VALUES
('bri', '$2y$10$piKaA2dZD0q/aF5/AXq1FOdhNVw5A1ToB4Hk/MpP87KxV3XOdGfzi', 'sarmientob1@montclair.edu', 'Brianna', 'Sarmiento', '1 Normal Ave, Montclair, NJ 07354');
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
