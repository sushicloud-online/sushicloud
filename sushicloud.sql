CREATE TABLE `users` (
  `username` varchar(50) NOT NULL,
  `password` varchar(255) DEFAULT NULL,
  `email` varchar(50) DEFAULT NULL,
  `first_name` varchar(50) DEFAULT NULL,
  `last_name` varchar(50) DEFAULT NULL,
  `address` varchar(255) DEFAULT NULL
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
  `username` varchar(50) NOT NULL,
  `password` varchar(255) NOT NULL,
  `email` varchar(50) DEFAULT NULL,
  `first_name` varchar(50) DEFAULT NULL,
  `last_name` varchar(50) DEFAULT NULL
) 


/*TODO: INSERT ANIME INTO DATABASE*/

INSERT INTO `anime` (`title`, `year`, `season`, `genre`, `description`, `image_url`) VALUES 
('Spy x Family', '2022', 'Spring 2022', 'Action, Comedy', 'For the agent known as "Twilight," no order is too tall if it is for the sake of peace. Operating as Westalis master spy, Twilight works tirelessly to prevent extremists from sparking a war with neighboring country Ostania. For his latest mission, he must investigate Ostanian politician Donovan Desmond by infiltrating his sons school: the prestigious Eden Academy. Thus, the agent faces the most difficult task of his career: get married, have a child, and play family.', 'anime_assets/spyxfamily.jpg'),
('Demon Slayer', '2022', 'Winter 2022', 'Action', "The devastation of the Mugen Train incident still weighs heavily on the members of the Demon Slayer Corps. Despite being given time to recover, life must go on, as the wicked never sleep: a vicious demon is terrorizing the alluring women of the Yoshiwara Entertainment District. The Sound Pillar, Tengen Uzui, and his three wives are on the case. However, when he soon loses contact with his spouses, Tengen fears the worst and enlists the help of Tanjirou Kamado, Zenitsu Agatsuma, and Inosuke Hashibira to infiltrate the district's most prominent houses and locate the depraved Upper Rank demon.", 'anime_assets/demon-slayer.jpg'),
('My Dress-Up Darling','2022','Winter 2022','Romance, Slice Of Life',"High school student Wakana Gojou spends his days perfecting the art of making hina dolls, hoping to eventually reach his grandfather's level of expertise. While his fellow teenagers busy themselves with pop culture, Gojou finds bliss in sewing clothes for his dolls. Nonetheless, he goes to great lengths to keep his unique hobby a secret, as he believes that he would be ridiculed were it revealed. Enter Marin Kitagawa, an extraordinarily pretty girl whose confidence and poise are in stark contrast to Gojou's meekness. It would defy common sense for the friendless Gojou to mix with the likes of Kitagawa, who is always surrounded by her peers. However, the unimaginable happens when Kitagawa discovers Gojou's prowess with a sewing machine and brightly confesses to him about her own hobby: cosplay. Because her sewing skills are pitiable, she decides to enlist his help.",'anime_assets/dress-up-darling.jpg'),
('My Hero Academia Season 5','2021','Spring 2021','Action',"UA Academy's Class 1-A has been the focus of a substantial amount of public attention due to the multiple villain attacks they have faced over the past school year. This attention has left Class 1-A's rivals, Class 1-B, feeling quite bitter. Desiring to prove their skills, they look forward to the opportunity that has been given to them: a set of mock battles between the students of each class. The classes are split into squads of four, each of which is tasked with capturing the other group members. The winner is the group who first secures all of the opposing team. While this sounds simple, a curveball is thrown into the mix with the inclusion of General Course Student Hitoshi Shinsou, who wishes to transfer into the Hero Course. Despite using his training with Class 1-A's homeroom teacher Shouta 'Eraserhead' Aizawa to prove that he's capable of being a real hero, he is still far behind the others due to his lack of experience. However, Shinsou is determined to overcome this challenge. Thus begins the fiery competition between Class 1-A and 1-B as each tries to prove that they are superior to the other.",'anime_assets/myheroacademia.jpg'),
("Don't Toy with Me, Miss Nagatoro",'2021','Spring 2021','Comedy, Romance, Slice of Life',"Every day, Naoto Hachiouji is teased relentlessly by Hayase Nagatoro, a first year student he meets one day in the library while working on his manga. After reading his story and seeing his awkward demeanor, she decides from that moment on to toy with him, even calling him 'Senpai' in lieu of using his real name. At first, Nagatoro's relentless antics are more bothersome than anything and leave him feeling embarrassed, as he is forced to cater to her whims. However, as they spend more time together, a strange sort of friendship develops between them, and Naoto finds that life with Nagatoro can even be fun. But one thing's for sure: his days will never be dull again.",'anime_assets/nagatoro.jpg') ;