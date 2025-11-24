-- MySQL dump 10.13  Distrib 8.4.7, for Linux (x86_64)
--
-- Host: localhost    Database: lowify
-- ------------------------------------------------------
-- Server version	8.4.7

/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */
;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */
;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */
;
/*!50503 SET NAMES utf8mb4 */
;
/*!40103 SET @OLD_TIME_ZONE=@@TIME_ZONE */
;
/*!40103 SET TIME_ZONE='+00:00' */
;
/*!40014 SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0 */
;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */
;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */
;
/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES, SQL_NOTES=0 */
;

--
-- Table structure for table `album`
--

DROP TABLE IF EXISTS `album`;
/*!40101 SET @saved_cs_client     = @@character_set_client */
;
/*!50503 SET character_set_client = utf8mb4 */
;
CREATE TABLE `album` (
    `id` int NOT NULL AUTO_INCREMENT,
    `name` varchar(255) NOT NULL,
    `artist_id` int NOT NULL,
    `cover` mediumtext,
    `release_date` datetime DEFAULT NULL,
    PRIMARY KEY (`id`),
    UNIQUE KEY `id` (`id`),
    KEY `artist_id` (`artist_id`),
    CONSTRAINT `album_ibfk_1` FOREIGN KEY (`artist_id`) REFERENCES `artist` (`id`)
) ENGINE = InnoDB AUTO_INCREMENT = 42 DEFAULT CHARSET = utf8mb4 COLLATE = utf8mb4_0900_ai_ci;

ALTER TABLE `album` ADD FULLTEXT (name);

/*!40101 SET character_set_client = @saved_cs_client */
;

--
-- Dumping data for table `album`
--

LOCK TABLES `album` WRITE;
/*!40000 ALTER TABLE `album` DISABLE KEYS */
;
INSERT INTO
    `album`
VALUES (
        1,
        'et ab cumque',
        1,
        'https://picsum.photos/seed/Ducimus ex occaecati consequatur non sed./800/800?random=66819',
        '2017-06-21 00:00:00'
    ),
    (
        2,
        'eum',
        1,
        'https://picsum.photos/seed/Maxime numquam et provident incidunt./800/800?random=22916',
        '2018-01-19 00:00:00'
    ),
    (
        3,
        'fugiat soluta',
        1,
        'https://picsum.photos/seed/Occaecati saepe eum aliquam blanditiis hic doloremque aut./800/800?random=82571',
        '2024-06-16 00:00:00'
    ),
    (
        4,
        'iure rerum vel',
        2,
        'https://picsum.photos/seed/Corporis eaque ea dolorum et saepe dolores./800/800?random=49045',
        '2022-05-30 00:00:00'
    ),
    (
        5,
        'voluptatem',
        2,
        'https://picsum.photos/seed/Quis ut exercitationem odit est nobis molestiae./800/800?random=34135',
        '2019-12-08 00:00:00'
    ),
    (
        6,
        'qui et perspiciatis',
        2,
        'https://picsum.photos/seed/Eius nulla incidunt voluptas enim./800/800?random=97406',
        '2023-05-13 00:00:00'
    ),
    (
        7,
        'ducimus',
        2,
        'https://picsum.photos/seed/Numquam illum id sapiente./800/800?random=13293',
        '2020-07-26 00:00:00'
    ),
    (
        8,
        'fuga odit',
        3,
        'https://picsum.photos/seed/Tenetur animi incidunt nesciunt aliquid aspernatur quo./800/800?random=35291',
        '2024-04-27 00:00:00'
    ),
    (
        9,
        'qui',
        3,
        'https://picsum.photos/seed/Reprehenderit quibusdam commodi vero vero eveniet./800/800?random=88331',
        '2022-11-08 00:00:00'
    ),
    (
        10,
        'odio beatae',
        3,
        'https://picsum.photos/seed/Est et est qui rerum eius aut./800/800?random=90021',
        '2021-06-21 00:00:00'
    ),
    (
        11,
        'expedita velit ut',
        4,
        'https://picsum.photos/seed/Ut ipsam modi sunt voluptas minus laborum temporibus./800/800?random=43258',
        '2023-02-11 00:00:00'
    ),
    (
        12,
        'ad est',
        4,
        'https://picsum.photos/seed/Saepe cum commodi quos enim assumenda voluptates saepe./800/800?random=65123',
        '2020-08-28 00:00:00'
    ),
    (
        13,
        'accusantium et',
        4,
        'https://picsum.photos/seed/Dolor est eveniet est./800/800?random=52970',
        '2019-04-20 00:00:00'
    ),
    (
        14,
        'omnis',
        4,
        'https://picsum.photos/seed/Alias voluptatem dignissimos sunt voluptatum mollitia./800/800?random=33015',
        '2022-01-14 00:00:00'
    ),
    (
        15,
        'labore distinctio eos',
        4,
        'https://picsum.photos/seed/Dolores ut et ipsa rerum pariatur./800/800?random=51645',
        '2023-04-10 00:00:00'
    ),
    (
        16,
        'et mollitia',
        5,
        'https://picsum.photos/seed/Et suscipit rerum officia voluptatum./800/800?random=42401',
        '2020-11-14 00:00:00'
    ),
    (
        17,
        'qui ab cupiditate',
        5,
        'https://picsum.photos/seed/Pariatur architecto temporibus voluptatem eveniet delectus./800/800?random=58751',
        '2017-09-21 00:00:00'
    ),
    (
        18,
        'odio',
        5,
        'https://picsum.photos/seed/Fugiat quia numquam unde sapiente nobis./800/800?random=48304',
        '2022-07-03 00:00:00'
    ),
    (
        19,
        'id',
        5,
        'https://picsum.photos/seed/Nihil et commodi sint eligendi sunt nobis in./800/800?random=41669',
        '2017-11-17 00:00:00'
    ),
    (
        20,
        'maiores',
        6,
        'https://picsum.photos/seed/Quia labore sapiente qui earum quam quo./800/800?random=44352',
        '2019-01-22 00:00:00'
    ),
    (
        21,
        'itaque blanditiis et',
        6,
        'https://picsum.photos/seed/Qui inventore et quis consequatur nemo aspernatur enim./800/800?random=45567',
        '2017-11-16 00:00:00'
    ),
    (
        22,
        'consequatur quos',
        6,
        'https://picsum.photos/seed/Eius voluptas distinctio distinctio quo facilis dolor sed./800/800?random=11678',
        '2018-10-21 00:00:00'
    ),
    (
        23,
        'quam reprehenderit',
        6,
        'https://picsum.photos/seed/Et suscipit maxime voluptatibus et./800/800?random=80720',
        '2025-03-31 00:00:00'
    ),
    (
        24,
        'ab distinctio natus',
        7,
        'https://picsum.photos/seed/Dolorum odit autem et et exercitationem./800/800?random=49743',
        '2023-12-03 00:00:00'
    ),
    (
        25,
        'voluptatum doloremque',
        7,
        'https://picsum.photos/seed/Aperiam enim ea magnam sapiente./800/800?random=70929',
        '2016-02-12 00:00:00'
    ),
    (
        26,
        'vel',
        7,
        'https://picsum.photos/seed/Sint rerum sed magni laborum rerum saepe./800/800?random=13208',
        '2023-09-26 00:00:00'
    ),
    (
        27,
        'et sed dolorem',
        8,
        'https://picsum.photos/seed/Est aliquam et iusto quia voluptatibus qui./800/800?random=52631',
        '2021-02-20 00:00:00'
    ),
    (
        28,
        'ut ut dolor',
        8,
        'https://picsum.photos/seed/Non rerum et voluptas at fugiat rerum molestias./800/800?random=84332',
        '2021-05-24 00:00:00'
    ),
    (
        29,
        'dicta sunt',
        8,
        'https://picsum.photos/seed/Pariatur atque qui voluptatibus./800/800?random=26214',
        '2016-03-28 00:00:00'
    ),
    (
        30,
        'sint',
        8,
        'https://picsum.photos/seed/Omnis autem quia fuga illum necessitatibus./800/800?random=32525',
        '2017-12-10 00:00:00'
    ),
    (
        31,
        'optio porro perspiciatis',
        8,
        'https://picsum.photos/seed/Saepe eveniet voluptatum delectus omnis similique./800/800?random=99981',
        '2023-07-11 00:00:00'
    ),
    (
        32,
        'temporibus nihil officia',
        9,
        'https://picsum.photos/seed/Neque libero aut autem repellendus./800/800?random=19520',
        '2018-11-28 00:00:00'
    ),
    (
        33,
        'et nam facilis',
        9,
        'https://picsum.photos/seed/Non rem enim dolorem alias quia corrupti exercitationem./800/800?random=39925',
        '2020-07-07 00:00:00'
    ),
    (
        34,
        'doloribus',
        9,
        'https://picsum.photos/seed/Earum voluptas temporibus vitae sed consequatur aut quisquam nulla./800/800?random=54015',
        '2017-11-07 00:00:00'
    ),
    (
        35,
        'quia',
        9,
        'https://picsum.photos/seed/Temporibus vel sint sunt eveniet illo./800/800?random=67878',
        '2018-03-19 00:00:00'
    ),
    (
        36,
        'tenetur perspiciatis',
        9,
        'https://picsum.photos/seed/Sit reprehenderit velit architecto doloribus quam tempora eum./800/800?random=95442',
        '2021-01-20 00:00:00'
    ),
    (
        37,
        'iste consectetur et',
        10,
        'https://picsum.photos/seed/Nobis labore non aliquam tempore minima voluptatem./800/800?random=47335',
        '2023-09-07 00:00:00'
    ),
    (
        38,
        'nihil numquam',
        10,
        'https://picsum.photos/seed/Similique animi velit vero fuga voluptatem odit./800/800?random=58634',
        '2023-02-17 00:00:00'
    ),
    (
        39,
        'eos omnis',
        10,
        'https://picsum.photos/seed/Aliquid sint hic harum./800/800?random=83005',
        '2018-05-08 00:00:00'
    ),
    (
        40,
        'corporis sit',
        10,
        'https://picsum.photos/seed/Ut iure quia nesciunt minima./800/800?random=50364',
        '2017-10-30 00:00:00'
    ),
    (
        41,
        'voluptatem',
        10,
        'https://picsum.photos/seed/Distinctio minima molestias quibusdam et accusamus quas eius./800/800?random=28257',
        '2022-09-14 00:00:00'
    );
/*!40000 ALTER TABLE `album` ENABLE KEYS */
;
UNLOCK TABLES;

--
-- Table structure for table `artist`
--

DROP TABLE IF EXISTS `artist`;
/*!40101 SET @saved_cs_client     = @@character_set_client */
;
/*!50503 SET character_set_client = utf8mb4 */
;
CREATE TABLE `artist` (
    `id` int NOT NULL AUTO_INCREMENT,
    `name` varchar(255) NOT NULL,
    `biography` mediumtext,
    `cover` mediumtext,
    `monthly_listeners` int DEFAULT '0',
    PRIMARY KEY (`id`),
    UNIQUE KEY `id` (`id`)
) ENGINE = InnoDB AUTO_INCREMENT = 11 DEFAULT CHARSET = utf8mb4 COLLATE = utf8mb4_0900_ai_ci;

ALTER TABLE `artist` ADD FULLTEXT (name);
/*!40101 SET character_set_client = @saved_cs_client */
;

--
-- Dumping data for table `artist`
--

LOCK TABLES `artist` WRITE;
/*!40000 ALTER TABLE `artist` DISABLE KEYS */
;
INSERT INTO
    `artist`
VALUES (
        1,
        'Matthieu Leblanc',
        'Velit maiores vel et sit omnis dolores iure. Doloribus autem rem saepe. Ut et sint excepturi.',
        'https://picsum.photos/seed/Dolor similique corrupti autem eos ipsam sit autem./800/800?random=67979',
        11132310
    ),
    (
        2,
        'Timothée Fernandes',
        'Quia asperiores adipisci sit veritatis ad. Placeat dolores est magnam perferendis hic provident itaque. Iusto velit dolorum quas itaque consequatur.',
        'https://picsum.photos/seed/Non debitis dolores accusantium labore./800/800?random=88899',
        81162533
    ),
    (
        3,
        'Charles-Raymond Rocher',
        'A aspernatur dolor qui deleniti qui alias. Asperiores omnis eum nihil facere vero exercitationem. Quisquam consequatur aut quod labore animi. Vero et dolor est est nisi.',
        'https://picsum.photos/seed/Laborum ea nisi cupiditate magni dicta consequatur soluta./800/800?random=97613',
        95832615
    ),
    (
        4,
        'Emmanuelle Le Langlois',
        'Aut aut aut eum reprehenderit. Eos repellendus non ab minus aut ratione aut voluptas. Repellendus consequatur consectetur cumque mollitia deleniti laboriosam. Fugiat quia neque nemo ut et adipisci.',
        'https://picsum.photos/seed/Architecto maiores id sint consequatur nulla deserunt velit tempora./800/800?random=84268',
        5203492
    ),
    (
        5,
        'Stéphanie Legendre',
        'In ea ducimus vel corrupti libero aut doloremque. Quis et facilis aliquam numquam ab. Ea illo voluptas ipsam voluptatem possimus numquam eum. Dicta aut aut rem ea.',
        'https://picsum.photos/seed/Et eos omnis cum reprehenderit./800/800?random=95875',
        63636242
    ),
    (
        6,
        'Olivier Poulain',
        'Qui et et eaque eius error maiores. Quo debitis sed eius. Qui enim ratione eos impedit quaerat sint sed. Qui et aut ducimus quo reprehenderit sed.',
        'https://picsum.photos/seed/Est nesciunt atque possimus./800/800?random=85070',
        37135634
    ),
    (
        7,
        'Bernard Remy',
        'Quo aut voluptatem aut. Natus provident vel provident repellat. Id consequatur consequatur explicabo a totam.',
        'https://picsum.photos/seed/Consequatur quia quod harum./800/800?random=50445',
        36513491
    ),
    (
        8,
        'Martine-Nathalie Leclerc',
        'Dolore earum sequi hic. Aut esse aliquid molestiae. Aperiam architecto est officiis et. Laborum sed est suscipit rem deserunt qui aut. Neque consequatur quia autem nihil enim.',
        'https://picsum.photos/seed/Aut deserunt earum voluptas itaque qui./800/800?random=19781',
        72518266
    ),
    (
        9,
        'Michèle Fontaine-Lecoq',
        'Repudiandae ea laudantium asperiores voluptas velit dolor neque. Aut exercitationem sunt magni ut. Est ut et illum vero ea.',
        'https://picsum.photos/seed/Nihil quia ut voluptatum non id odit necessitatibus consequatur./800/800?random=60466',
        18017924
    ),
    (
        10,
        'Geneviève Aubry',
        'Sequi illum voluptatem voluptas non ipsam minus. Ipsa labore deserunt officia laboriosam nihil debitis. Illo ullam sed eum nemo quas debitis.',
        'https://picsum.photos/seed/Quo officiis provident aut enim delectus./800/800?random=49254',
        39373845
    );
/*!40000 ALTER TABLE `artist` ENABLE KEYS */
;
UNLOCK TABLES;

--
-- Table structure for table `song`
--

DROP TABLE IF EXISTS `song`;
/*!40101 SET @saved_cs_client     = @@character_set_client */
;
/*!50503 SET character_set_client = utf8mb4 */
;
CREATE TABLE `song` (
    `id` int NOT NULL AUTO_INCREMENT,
    `name` varchar(255) NOT NULL,
    `artist_id` int NOT NULL,
    `album_id` int NOT NULL,
    `duration` int NOT NULL,
    `note` double NOT NULL DEFAULT '0',
    PRIMARY KEY (`id`),
    UNIQUE KEY `id` (`id`),
    KEY `album_id` (`album_id`),
    KEY `artist_id` (`artist_id`),
    CONSTRAINT `song_ibfk_1` FOREIGN KEY (`album_id`) REFERENCES `album` (`id`),
    CONSTRAINT `song_ibfk_2` FOREIGN KEY (`artist_id`) REFERENCES `artist` (`id`)
) ENGINE = InnoDB AUTO_INCREMENT = 379 DEFAULT CHARSET = utf8mb4 COLLATE = utf8mb4_0900_ai_ci;

ALTER TABLE `song` ADD FULLTEXT (name);

/*!40101 SET character_set_client = @saved_cs_client */
;

--
-- Dumping data for table `song`
--

LOCK TABLES `song` WRITE;
/*!40000 ALTER TABLE `song` DISABLE KEYS */
;
INSERT INTO
    `song`
VALUES (
        1,
        'labore ut non minus est',
        1,
        1,
        242,
        2.63
    ),
    (2, 'dolor', 1, 1, 271, 3.96),
    (
        3,
        'fugit rerum provident soluta placeat ab ex',
        1,
        1,
        321,
        0.62
    ),
    (
        4,
        'dicta omnis inventore qui fuga asperiores esse',
        1,
        1,
        684,
        4.56
    ),
    (
        5,
        'omnis excepturi qui officia asperiores',
        1,
        1,
        333,
        3.36
    ),
    (
        6,
        'voluptas',
        1,
        1,
        466,
        3.45
    ),
    (
        7,
        'quod blanditiis quia ab ut fugiat voluptatem',
        1,
        2,
        500,
        1.28
    ),
    (
        8,
        'mollitia sint aut quo similique enim cum qui culpa tempore',
        1,
        2,
        193,
        0.82
    ),
    (
        9,
        'unde voluptatum necessitatibus ea molestias quis doloribus et voluptatibus eum',
        1,
        2,
        551,
        4.02
    ),
    (
        10,
        'ut deleniti modi et sit',
        1,
        2,
        497,
        4.23
    ),
    (
        11,
        'id cumque repellat at et corporis laboriosam',
        1,
        2,
        623,
        4.59
    ),
    (
        12,
        'fugiat dolores',
        1,
        2,
        399,
        1.89
    ),
    (
        13,
        'architecto repellat ratione exercitationem',
        1,
        2,
        348,
        1.17
    ),
    (
        14,
        'rerum facilis labore veritatis eos et',
        1,
        2,
        521,
        2.35
    ),
    (
        15,
        'voluptatum sint exercitationem aliquid sint facilis eius perferendis hic',
        1,
        2,
        343,
        4.26
    ),
    (
        16,
        'reiciendis',
        1,
        2,
        321,
        0.75
    ),
    (
        17,
        'sit dolores eum voluptatem deserunt tenetur commodi deleniti',
        1,
        2,
        402,
        4.81
    ),
    (
        18,
        'ipsa harum doloremque distinctio quod dolores quas sed sed',
        1,
        2,
        297,
        3.83
    ),
    (
        19,
        'minima quibusdam temporibus harum voluptatum nemo autem animi tempore',
        1,
        2,
        237,
        1.27
    ),
    (20, 'quo', 1, 2, 313, 2.47),
    (
        21,
        'dicta voluptas odio et facere dolorem minus non enim nemo',
        1,
        2,
        280,
        4.82
    ),
    (
        22,
        'voluptatem et quia recusandae quia dolorem',
        1,
        3,
        554,
        3.74
    ),
    (
        23,
        'quisquam veritatis non autem iste fugiat reiciendis ipsa laboriosam eius',
        1,
        3,
        666,
        4.3
    ),
    (
        24,
        'dolorem quisquam dolores est consequatur recusandae totam tempora et perferendis',
        1,
        3,
        263,
        4.71
    ),
    (
        25,
        'consectetur fugit ea sit ea ut',
        1,
        3,
        572,
        0.34
    ),
    (
        26,
        'eius aut et et',
        1,
        3,
        257,
        3.75
    ),
    (
        27,
        'totam ut repellat aut',
        1,
        3,
        394,
        1.06
    ),
    (
        28,
        'at officiis temporibus asperiores qui aut magni placeat quidem',
        1,
        3,
        441,
        4.79
    ),
    (
        29,
        'adipisci sequi velit qui et',
        1,
        3,
        361,
        4.28
    ),
    (
        30,
        'iste quia voluptatum mollitia non maxime sint est',
        1,
        3,
        718,
        4.78
    ),
    (
        31,
        'sit et totam aut et aut',
        1,
        3,
        664,
        3.14
    ),
    (
        32,
        'doloribus perferendis expedita quo ut minima a rem',
        1,
        3,
        303,
        4.19
    ),
    (
        33,
        'enim autem dolores aspernatur',
        1,
        3,
        653,
        2.13
    ),
    (
        34,
        'ut dolorum natus omnis quae autem molestiae',
        2,
        4,
        210,
        3.76
    ),
    (
        35,
        'dolorem saepe eum voluptas asperiores',
        2,
        4,
        325,
        2.98
    ),
    (
        36,
        'vel amet occaecati eum facilis est ea labore',
        2,
        4,
        567,
        3.15
    ),
    (
        37,
        'non consequatur quo dolor deleniti et quam distinctio',
        2,
        4,
        706,
        4.18
    ),
    (38, 'quia', 2, 4, 263, 0.64),
    (
        39,
        'eaque laboriosam ipsa et saepe dolorum',
        2,
        4,
        607,
        1.66
    ),
    (
        40,
        'architecto',
        2,
        4,
        452,
        2.37
    ),
    (
        41,
        'atque dolore',
        2,
        4,
        631,
        4.45
    ),
    (
        42,
        'aliquid quibusdam',
        2,
        4,
        650,
        0.09
    ),
    (
        43,
        'molestiae repellendus autem eaque delectus unde excepturi deserunt suscipit vel',
        2,
        5,
        709,
        3.94
    ),
    (44, 'dolor', 2, 5, 603, 3.71),
    (
        45,
        'velit et error',
        2,
        5,
        270,
        0.23
    ),
    (
        46,
        'ut in enim non voluptas recusandae quasi eos',
        2,
        5,
        259,
        1.09
    ),
    (
        47,
        'optio tempore consequatur mollitia eaque maxime dolore est quae labore',
        2,
        5,
        383,
        4.12
    ),
    (
        48,
        'voluptas vero placeat veniam et aliquam sed',
        2,
        5,
        699,
        3.37
    ),
    (
        49,
        'qui est et molestiae nihil harum repellendus vitae voluptate',
        2,
        5,
        359,
        4.58
    ),
    (50, 'omnis', 2, 5, 378, 0.96),
    (
        51,
        'possimus excepturi modi',
        2,
        5,
        408,
        2.48
    ),
    (
        52,
        'quisquam ea repudiandae perspiciatis',
        2,
        5,
        670,
        2.24
    ),
    (
        53,
        'minima beatae officia enim sit unde dolor',
        2,
        5,
        507,
        1.77
    ),
    (
        54,
        'ut quaerat magni',
        2,
        5,
        204,
        0.05
    ),
    (
        55,
        'voluptates quaerat necessitatibus laudantium et eum fuga',
        2,
        6,
        678,
        4.6
    ),
    (
        56,
        'eos quo magni dignissimos eum',
        2,
        6,
        546,
        1.88
    ),
    (
        57,
        'quia rerum explicabo et culpa molestias iure',
        2,
        6,
        209,
        4.22
    ),
    (
        58,
        'asperiores iure facere id veritatis',
        2,
        6,
        575,
        2.42
    ),
    (
        59,
        'eos hic et quis',
        2,
        6,
        578,
        3.76
    ),
    (
        60,
        'qui quod esse tenetur',
        2,
        6,
        315,
        4.11
    ),
    (
        61,
        'ut iste ut adipisci amet voluptate',
        2,
        6,
        630,
        2.57
    ),
    (
        62,
        'ullam doloremque et aspernatur deserunt et',
        2,
        7,
        241,
        2.68
    ),
    (
        63,
        'voluptatem suscipit dolorem similique debitis adipisci voluptatibus',
        2,
        7,
        712,
        2.55
    ),
    (
        64,
        'impedit dolore quae eveniet officia explicabo',
        2,
        7,
        494,
        4.58
    ),
    (
        65,
        'eum quidem nulla necessitatibus vel est',
        2,
        7,
        270,
        2.74
    ),
    (
        66,
        'magnam et autem',
        2,
        7,
        546,
        0.84
    ),
    (
        67,
        'ut eius repellendus enim consectetur nesciunt',
        2,
        7,
        600,
        3.28
    ),
    (
        68,
        'nihil aliquam fuga quia sunt in',
        2,
        7,
        371,
        2.54
    ),
    (
        69,
        'nostrum aliquid quisquam iste voluptas sunt aut ipsa commodi',
        2,
        7,
        579,
        1.82
    ),
    (
        70,
        'modi tenetur omnis consequatur fugit enim repellat',
        2,
        7,
        616,
        1.79
    ),
    (
        71,
        'dignissimos iure saepe ut architecto',
        2,
        7,
        375,
        3.81
    ),
    (
        72,
        'similique laborum nulla voluptas aut voluptas in omnis voluptas',
        2,
        7,
        337,
        3.83
    ),
    (
        73,
        'voluptas esse nulla unde autem nihil dolore culpa',
        2,
        7,
        187,
        3.75
    ),
    (
        74,
        'ipsa assumenda dignissimos distinctio tenetur',
        3,
        8,
        406,
        1.86
    ),
    (
        75,
        'consequuntur',
        3,
        8,
        279,
        0.17
    ),
    (
        76,
        'voluptas exercitationem illo qui ratione repellat',
        3,
        8,
        219,
        4.52
    ),
    (
        77,
        'ducimus voluptatem odit nihil officia veritatis',
        3,
        8,
        520,
        1.36
    ),
    (78, 'sit', 3, 8, 330, 0.47),
    (
        79,
        'eveniet delectus excepturi voluptatem sequi et libero sit',
        3,
        8,
        282,
        3.35
    ),
    (
        80,
        'possimus soluta provident fugit in omnis',
        3,
        8,
        621,
        3.39
    ),
    (
        81,
        'reprehenderit ad asperiores ad tenetur porro nobis',
        3,
        8,
        544,
        3.26
    ),
    (
        82,
        'consequatur eum odit nihil consequatur occaecati',
        3,
        9,
        229,
        2.45
    ),
    (
        83,
        'soluta perspiciatis odit qui qui modi aliquid consequatur',
        3,
        9,
        637,
        2.21
    ),
    (
        84,
        'accusantium distinctio porro sequi dolore cumque eligendi ipsam',
        3,
        9,
        634,
        2.85
    ),
    (
        85,
        'dolor illum accusamus facere quis consequatur tenetur blanditiis omnis',
        3,
        9,
        474,
        0.94
    ),
    (
        86,
        'illo quos est architecto tempora nesciunt inventore quo facilis quis',
        3,
        9,
        308,
        2.7
    ),
    (
        87,
        'sit reprehenderit provident odio tempora pariatur enim sit suscipit',
        3,
        10,
        190,
        4.06
    ),
    (
        88,
        'et repellat aut ut',
        3,
        10,
        567,
        2.44
    ),
    (
        89,
        'repellendus ut',
        3,
        10,
        619,
        1.98
    ),
    (
        90,
        'eum eos autem minima fugiat sit',
        3,
        10,
        249,
        3.34
    ),
    (
        91,
        'unde nihil facilis culpa vel',
        3,
        10,
        614,
        0.28
    ),
    (
        92,
        'omnis vel dolorem facilis dolor nobis velit architecto non',
        3,
        10,
        211,
        2.74
    ),
    (
        93,
        'aliquid sapiente praesentium recusandae earum commodi',
        3,
        10,
        396,
        4.86
    ),
    (
        94,
        'rerum dolorum recusandae molestiae nisi itaque cupiditate expedita doloremque aut',
        3,
        10,
        257,
        4.98
    ),
    (
        95,
        'sed amet et error',
        3,
        10,
        568,
        3.69
    ),
    (96, 'vitae', 3, 10, 284, 3.68),
    (
        97,
        'repellendus ut vitae cum nihil ut quis ut officia provident',
        3,
        10,
        388,
        1.28
    ),
    (
        98,
        'aut et accusamus natus',
        3,
        10,
        220,
        3.49
    ),
    (
        99,
        'aut ut',
        3,
        10,
        405,
        2.74
    ),
    (
        100,
        'sed ipsum omnis error praesentium quasi laboriosam',
        3,
        10,
        440,
        4.2
    ),
    (
        101,
        'officiis voluptatibus odio veniam velit aut',
        4,
        11,
        233,
        0.1
    ),
    (
        102,
        'consequatur ducimus accusantium',
        4,
        11,
        278,
        3.39
    ),
    (
        103,
        'eos cum nesciunt nesciunt doloribus',
        4,
        11,
        255,
        0.59
    ),
    (
        104,
        'nemo commodi consectetur',
        4,
        11,
        609,
        3.46
    ),
    (
        105,
        'asperiores quas quae',
        4,
        11,
        254,
        0
    ),
    (
        106,
        'omnis harum',
        4,
        11,
        637,
        3.41
    ),
    (
        107,
        'voluptatem quo eos debitis commodi odio aut non officiis dignissimos',
        4,
        11,
        296,
        1.79
    ),
    (
        108,
        'perspiciatis quasi rerum officia aperiam',
        4,
        11,
        183,
        4.57
    ),
    (
        109,
        'modi qui ut unde doloremque reiciendis',
        4,
        11,
        586,
        0.97
    ),
    (110, 'quod', 4, 11, 440, 3.56),
    (
        111,
        'molestias',
        4,
        12,
        391,
        4.59
    ),
    (
        112,
        'officia numquam qui officiis',
        4,
        12,
        440,
        3.04
    ),
    (
        113,
        'illo et ea nulla perspiciatis in ut id a commodi',
        4,
        12,
        250,
        2.99
    ),
    (
        114,
        'impedit',
        4,
        12,
        654,
        2.66
    ),
    (
        115,
        'officia a totam voluptate et velit velit odit',
        4,
        12,
        587,
        3.06
    ),
    (
        116,
        'voluptate beatae qui hic vero et sunt rerum ut',
        4,
        12,
        551,
        1.78
    ),
    (
        117,
        'vitae facilis qui non',
        4,
        12,
        458,
        2.63
    ),
    (
        118,
        'aut libero incidunt eum voluptatem et',
        4,
        12,
        497,
        3.97
    ),
    (
        119,
        'impedit est maxime',
        4,
        12,
        467,
        1.04
    ),
    (
        120,
        'accusamus distinctio perspiciatis minima recusandae voluptas voluptas',
        4,
        12,
        681,
        3.09
    ),
    (121, 'qui', 4, 13, 200, 2.15),
    (
        122,
        'facere cupiditate facere eius dolorem ipsum tempora possimus sit earum',
        4,
        13,
        337,
        0.39
    ),
    (
        123,
        'quasi exercitationem quos non placeat harum voluptas qui earum officiis',
        4,
        13,
        359,
        1.32
    ),
    (
        124,
        'ea inventore est et est',
        4,
        13,
        559,
        0.44
    ),
    (125, 'ut', 4, 13, 273, 4.34),
    (
        126,
        'quasi',
        4,
        13,
        618,
        0.74
    ),
    (
        127,
        'quis quia et voluptate rerum architecto doloribus',
        4,
        13,
        575,
        4.15
    ),
    (
        128,
        'molestias sunt',
        4,
        13,
        369,
        4.61
    ),
    (129, 'modi', 4, 13, 486, 4.82),
    (
        130,
        'fuga eum',
        4,
        13,
        647,
        1.59
    ),
    (
        131,
        'ut autem tempora quis optio itaque odio ipsam qui',
        4,
        13,
        567,
        3.33
    ),
    (
        132,
        'nostrum amet aut doloremque',
        4,
        13,
        518,
        4.45
    ),
    (
        133,
        'tempore delectus nam earum placeat dolor aut dicta iure veritatis',
        4,
        13,
        509,
        4.54
    ),
    (
        134,
        'et similique dolorem optio quia incidunt quo blanditiis error',
        4,
        14,
        322,
        4.77
    ),
    (
        135,
        'voluptas tempore iste velit voluptatem molestiae voluptatum rerum nisi',
        4,
        14,
        266,
        0.98
    ),
    (
        136,
        'non sit',
        4,
        14,
        284,
        3.01
    ),
    (
        137,
        'numquam',
        4,
        14,
        627,
        1.95
    ),
    (
        138,
        'voluptatum',
        4,
        14,
        507,
        3.65
    ),
    (
        139,
        'vitae est quis et eveniet laborum in repudiandae architecto maxime',
        4,
        14,
        306,
        3.9
    ),
    (
        140,
        'nihil',
        4,
        14,
        635,
        4.61
    ),
    (
        141,
        'accusamus officiis nemo animi libero',
        4,
        14,
        442,
        4.45
    ),
    (
        142,
        'nobis harum quasi debitis iste officiis nemo corrupti quis sequi',
        4,
        14,
        396,
        1.68
    ),
    (
        143,
        'voluptatem error unde omnis totam aspernatur ut expedita',
        4,
        14,
        634,
        2.53
    ),
    (
        144,
        'qui soluta eveniet mollitia',
        4,
        14,
        425,
        0.43
    ),
    (
        145,
        'veritatis aut',
        4,
        14,
        546,
        4.76
    ),
    (
        146,
        'ut et maiores',
        4,
        15,
        604,
        2.84
    ),
    (
        147,
        'dolores eum non exercitationem est maiores',
        4,
        15,
        635,
        0.58
    ),
    (
        148,
        'rerum accusantium aspernatur et velit commodi quisquam voluptatem qui quia',
        4,
        15,
        637,
        4.55
    ),
    (
        149,
        'atque consectetur aliquid ullam dolorem molestiae mollitia aut',
        4,
        15,
        236,
        2.47
    ),
    (
        150,
        'explicabo id',
        4,
        15,
        440,
        0.8
    ),
    (
        151,
        'ipsa facere nisi',
        4,
        15,
        708,
        4
    ),
    (
        152,
        'et aut sint et placeat praesentium ratione vitae harum',
        4,
        15,
        648,
        0.93
    ),
    (
        153,
        'odio itaque eaque doloribus in sit pariatur dolore qui enim',
        4,
        15,
        305,
        1.44
    ),
    (
        154,
        'omnis vero iure dolores eveniet',
        4,
        15,
        685,
        4.2
    ),
    (
        155,
        'consequuntur',
        4,
        15,
        231,
        1.01
    ),
    (
        156,
        'autem labore perspiciatis',
        4,
        15,
        348,
        1.17
    ),
    (
        157,
        'amet blanditiis non dignissimos dignissimos',
        5,
        16,
        621,
        0.87
    ),
    (
        158,
        'assumenda quibusdam quo esse odio perferendis',
        5,
        16,
        291,
        2.75
    ),
    (
        159,
        'dolore alias aut excepturi sint harum ea quaerat atque',
        5,
        16,
        246,
        1.05
    ),
    (
        160,
        'architecto ducimus ad voluptatem delectus sint temporibus delectus quasi',
        5,
        16,
        615,
        1.18
    ),
    (
        161,
        'ipsam in earum ut sed voluptas beatae ex perferendis adipisci',
        5,
        16,
        612,
        4.02
    ),
    (
        162,
        'recusandae nihil',
        5,
        16,
        588,
        2.59
    ),
    (
        163,
        'quas laborum deleniti eligendi eum nemo est voluptate officia',
        5,
        16,
        717,
        3.75
    ),
    (
        164,
        'reprehenderit repellendus libero delectus veniam doloribus magni',
        5,
        16,
        411,
        1.62
    ),
    (
        165,
        'voluptas aperiam quas ratione',
        5,
        16,
        554,
        1.63
    ),
    (
        166,
        'voluptatem sunt qui consequatur sunt ut id',
        5,
        16,
        666,
        0.88
    ),
    (
        167,
        'voluptatem perspiciatis impedit sit',
        5,
        16,
        581,
        3.52
    ),
    (
        168,
        'odio quas molestiae dolor corporis ipsam nesciunt qui ad facere',
        5,
        16,
        658,
        4.74
    ),
    (
        169,
        'eos adipisci qui facilis libero quibusdam fuga quia libero',
        5,
        17,
        232,
        2.24
    ),
    (
        170,
        'labore',
        5,
        17,
        436,
        1.65
    ),
    (
        171,
        'repudiandae magni non voluptate illum ex modi',
        5,
        17,
        367,
        4.45
    ),
    (
        172,
        'architecto cupiditate quo ullam occaecati at ullam et deserunt',
        5,
        17,
        378,
        2.89
    ),
    (
        173,
        'a nam',
        5,
        17,
        465,
        1.01
    ),
    (
        174,
        'sunt ut iure',
        5,
        17,
        425,
        1.31
    ),
    (
        175,
        'dignissimos nihil similique sint doloribus debitis animi quidem illum sunt',
        5,
        17,
        200,
        2.09
    ),
    (
        176,
        'omnis optio eos odio dolor maxime fugit explicabo placeat recusandae',
        5,
        17,
        390,
        0.2
    ),
    (
        177,
        'fugiat officiis voluptatibus est quidem consequatur',
        5,
        17,
        620,
        3.43
    ),
    (
        178,
        'cumque est excepturi eligendi autem nemo deleniti rerum',
        5,
        17,
        301,
        3.48
    ),
    (
        179,
        'voluptas officia dolorem tenetur',
        5,
        17,
        330,
        0.22
    ),
    (
        180,
        'corrupti dolores consequatur necessitatibus aut',
        5,
        17,
        195,
        3.01
    ),
    (
        181,
        'quia ut blanditiis debitis perferendis consequuntur hic quia corrupti et',
        5,
        17,
        615,
        4.75
    ),
    (182, 'enim', 5, 18, 418, 4.56),
    (
        183,
        'adipisci amet quasi ea et consectetur eius et eaque',
        5,
        18,
        239,
        2.29
    ),
    (
        184,
        'qui soluta commodi hic tenetur',
        5,
        18,
        418,
        1.85
    ),
    (
        185,
        'earum',
        5,
        18,
        370,
        0.48
    ),
    (
        186,
        'corrupti quia recusandae optio asperiores occaecati tempora ipsam iure vel',
        5,
        18,
        247,
        2.83
    ),
    (
        187,
        'non eos maxime similique blanditiis nobis impedit doloremque voluptate quisquam',
        5,
        18,
        593,
        2.31
    ),
    (
        188,
        'sit aut',
        5,
        18,
        479,
        2.87
    ),
    (
        189,
        'ut at',
        5,
        18,
        685,
        4.53
    ),
    (
        190,
        'aut est quia',
        5,
        18,
        512,
        1.79
    ),
    (
        191,
        'magnam reiciendis vel ducimus eum veniam asperiores placeat consequatur enim',
        5,
        19,
        206,
        2.33
    ),
    (
        192,
        'facere nisi nulla sed rerum ad in aut',
        5,
        19,
        708,
        3.7
    ),
    (
        193,
        'repudiandae eius molestiae',
        5,
        19,
        450,
        0.37
    ),
    (
        194,
        'est aut consectetur dolores dolorem quidem temporibus',
        5,
        19,
        598,
        1.82
    ),
    (195, 'sint', 5, 19, 448, 4.95),
    (
        196,
        'commodi illo fuga et soluta consequatur deserunt sunt est',
        5,
        19,
        414,
        4.53
    ),
    (
        197,
        'voluptatem magnam explicabo itaque aut consequatur reiciendis et ea cum',
        6,
        20,
        523,
        2.26
    ),
    (
        198,
        'et ipsam fugit ut earum sapiente et velit voluptates',
        6,
        20,
        688,
        2.53
    ),
    (
        199,
        'et tenetur sit recusandae',
        6,
        20,
        187,
        0.28
    ),
    (
        200,
        'nesciunt',
        6,
        20,
        681,
        4.35
    ),
    (
        201,
        'quasi accusamus iusto atque',
        6,
        20,
        617,
        0.97
    ),
    (
        202,
        'officiis alias quibusdam voluptas non saepe in in perferendis',
        6,
        20,
        280,
        2.04
    ),
    (
        203,
        'voluptatibus autem est iusto sequi omnis dolores nam corrupti et',
        6,
        20,
        608,
        4.21
    ),
    (
        204,
        'iure qui',
        6,
        20,
        332,
        0.26
    ),
    (
        205,
        'quas quo incidunt sit neque in quia tenetur',
        6,
        20,
        669,
        1.1
    ),
    (
        206,
        'alias nam ipsum non quibusdam',
        6,
        20,
        194,
        0.38
    ),
    (
        207,
        'optio aut dolores et est minus dolorem',
        6,
        21,
        606,
        2.57
    ),
    (
        208,
        'sapiente repellendus recusandae',
        6,
        21,
        602,
        4.83
    ),
    (
        209,
        'qui sint',
        6,
        21,
        673,
        0.95
    ),
    (
        210,
        'voluptatum perspiciatis',
        6,
        21,
        548,
        3.69
    ),
    (
        211,
        'praesentium eveniet ipsum soluta tenetur illum eos ratione dolor',
        6,
        21,
        277,
        4.71
    ),
    (
        212,
        'et vel excepturi quibusdam pariatur autem asperiores officia incidunt',
        6,
        21,
        709,
        2.56
    ),
    (
        213,
        'tempore aliquid molestias fugit quidem sint porro sapiente consequuntur',
        6,
        21,
        383,
        3.85
    ),
    (
        214,
        'magnam magnam',
        6,
        22,
        297,
        1.35
    ),
    (
        215,
        'ipsam quasi accusantium neque non aut eos',
        6,
        22,
        207,
        4.16
    ),
    (
        216,
        'nobis nobis itaque aut et ipsum placeat error aut ea',
        6,
        22,
        313,
        4.34
    ),
    (
        217,
        'accusamus quod pariatur nam explicabo minus accusamus est',
        6,
        22,
        658,
        1.13
    ),
    (
        218,
        'omnis omnis qui',
        6,
        22,
        307,
        0.8
    ),
    (
        219,
        'architecto optio aut veritatis',
        6,
        22,
        547,
        0.31
    ),
    (
        220,
        'numquam tenetur est sed quis voluptates eum et voluptates aspernatur',
        6,
        23,
        602,
        0.16
    ),
    (
        221,
        'aperiam aperiam commodi',
        6,
        23,
        627,
        1.57
    ),
    (
        222,
        'inventore sed velit cupiditate voluptas',
        6,
        23,
        470,
        0.44
    ),
    (
        223,
        'doloribus beatae et',
        6,
        23,
        365,
        2.13
    ),
    (
        224,
        'temporibus totam omnis et inventore eos assumenda voluptas voluptatem',
        6,
        23,
        624,
        4.79
    ),
    (
        225,
        'dolorem consequatur libero in velit sunt soluta',
        6,
        23,
        514,
        1.66
    ),
    (
        226,
        'id suscipit',
        6,
        23,
        556,
        3.62
    ),
    (
        227,
        'omnis cum eum labore animi sit',
        6,
        23,
        496,
        4.43
    ),
    (
        228,
        'consequatur qui perferendis doloremque voluptatibus sapiente',
        6,
        23,
        510,
        4.31
    ),
    (
        229,
        'quia in est reprehenderit delectus voluptatem doloremque',
        6,
        23,
        240,
        4.77
    ),
    (
        230,
        'quisquam ut repudiandae ut ut qui et assumenda',
        6,
        23,
        260,
        3.36
    ),
    (
        231,
        'nulla non quos consequatur soluta minus est cumque',
        7,
        24,
        255,
        0.26
    ),
    (
        232,
        'fugiat officiis deserunt consequatur quia vitae qui aut',
        7,
        24,
        531,
        1.02
    ),
    (
        233,
        'et aperiam dolores atque sed provident consequatur iste',
        7,
        24,
        555,
        3.14
    ),
    (
        234,
        'quis voluptas cum repellendus',
        7,
        24,
        569,
        4.77
    ),
    (
        235,
        'commodi magnam architecto',
        7,
        24,
        354,
        4.91
    ),
    (
        236,
        'beatae illum aut ratione omnis eveniet saepe in non deserunt',
        7,
        24,
        217,
        0.97
    ),
    (
        237,
        'blanditiis repellat aut qui aut illum voluptas',
        7,
        25,
        560,
        0.76
    ),
    (
        238,
        'ex enim et esse nihil culpa maiores fugiat corrupti',
        7,
        25,
        597,
        1.61
    ),
    (
        239,
        'mollitia',
        7,
        25,
        627,
        2.45
    ),
    (
        240,
        'omnis',
        7,
        25,
        442,
        3.23
    ),
    (
        241,
        'ut odit',
        7,
        26,
        183,
        4.03
    ),
    (
        242,
        'aspernatur cum',
        7,
        26,
        706,
        2.47
    ),
    (
        243,
        'ut aliquid quibusdam sit et debitis itaque ut fugit consequatur',
        7,
        26,
        408,
        0.16
    ),
    (
        244,
        'adipisci facilis earum earum dolorem voluptatem nemo',
        7,
        26,
        226,
        3.3
    ),
    (245, 'ea', 7, 26, 718, 4.34),
    (
        246,
        'consectetur temporibus repellendus id',
        8,
        27,
        314,
        1.82
    ),
    (
        247,
        'harum porro dolores consequatur inventore voluptates delectus sunt cupiditate praesentium',
        8,
        27,
        619,
        0.69
    ),
    (
        248,
        'sed ea accusantium id molestiae',
        8,
        27,
        624,
        0.33
    ),
    (
        249,
        'eos illo quia dolorum blanditiis debitis et qui possimus magnam',
        8,
        27,
        661,
        0.15
    ),
    (
        250,
        'sit quidem saepe et beatae ut quod',
        8,
        27,
        703,
        3.57
    ),
    (
        251,
        'ex iste amet quam pariatur vel similique',
        8,
        27,
        460,
        3.35
    ),
    (
        252,
        'cum id itaque corporis est',
        8,
        27,
        660,
        4.2
    ),
    (
        253,
        'fuga odio aut veniam',
        8,
        27,
        205,
        1.97
    ),
    (254, 'qui', 8, 27, 519, 0.16),
    (
        255,
        'aut qui qui et adipisci',
        8,
        27,
        613,
        4.41
    ),
    (
        256,
        'eos omnis eos nobis perspiciatis impedit',
        8,
        27,
        387,
        2.92
    ),
    (257, 'aut', 8, 27, 305, 0.17),
    (
        258,
        'iusto veniam soluta molestiae nobis',
        8,
        27,
        638,
        4.3
    ),
    (
        259,
        'reiciendis pariatur rerum voluptatem reprehenderit et',
        8,
        28,
        700,
        2.86
    ),
    (
        260,
        'id maiores quam veritatis iste et iste temporibus harum',
        8,
        28,
        689,
        0.43
    ),
    (
        261,
        'laborum atque dolore quis quia',
        8,
        28,
        264,
        2.9
    ),
    (
        262,
        'quo repellat magnam facere dolor sit accusamus',
        8,
        28,
        457,
        4.78
    ),
    (
        263,
        'asperiores quam earum ratione sapiente assumenda quia necessitatibus',
        8,
        28,
        543,
        1.7
    ),
    (
        264,
        'voluptatibus',
        8,
        28,
        679,
        0.56
    ),
    (
        265,
        'culpa sapiente ratione qui',
        8,
        28,
        663,
        4.96
    ),
    (
        266,
        'adipisci eos ab et quis eligendi itaque magni voluptatem',
        8,
        29,
        257,
        0.36
    ),
    (
        267,
        'aut similique',
        8,
        29,
        508,
        2.72
    ),
    (
        268,
        'labore est numquam culpa culpa fugit eos',
        8,
        29,
        490,
        2.73
    ),
    (
        269,
        'maxime totam officia et vel laborum fugit',
        8,
        29,
        457,
        3.1
    ),
    (
        270,
        'necessitatibus explicabo',
        8,
        30,
        383,
        4.25
    ),
    (
        271,
        'quis sunt ratione corporis',
        8,
        30,
        374,
        1.08
    ),
    (
        272,
        'quod dolores soluta est',
        8,
        30,
        252,
        4.18
    ),
    (
        273,
        'architecto perspiciatis omnis voluptatem mollitia dolores minima molestiae',
        8,
        30,
        605,
        3.99
    ),
    (
        274,
        'porro ex culpa qui quasi quae modi asperiores beatae quas',
        8,
        30,
        219,
        1.49
    ),
    (
        275,
        'ut laborum cupiditate et quidem officia et reprehenderit',
        8,
        30,
        640,
        3.71
    ),
    (
        276,
        'voluptatem quia nihil in mollitia eaque similique',
        8,
        30,
        453,
        3.76
    ),
    (
        277,
        'et recusandae beatae maiores vero accusamus in nobis',
        8,
        30,
        655,
        0.51
    ),
    (
        278,
        'doloremque',
        8,
        30,
        295,
        4.92
    ),
    (
        279,
        'nam asperiores et accusantium',
        8,
        30,
        187,
        2.78
    ),
    (
        280,
        'quis qui similique',
        8,
        30,
        491,
        3.21
    ),
    (
        281,
        'omnis enim quo est sit quia et in soluta eveniet',
        8,
        30,
        720,
        0.16
    ),
    (
        282,
        'ex placeat',
        8,
        30,
        545,
        0.75
    ),
    (
        283,
        'laudantium',
        8,
        30,
        209,
        3.56
    ),
    (
        284,
        'ducimus adipisci eos consequuntur hic ut',
        8,
        31,
        501,
        4.84
    ),
    (
        285,
        'nobis et minus voluptatem',
        8,
        31,
        591,
        3.67
    ),
    (
        286,
        'ab fugit sint et corrupti adipisci aut ex',
        8,
        31,
        613,
        2.35
    ),
    (
        287,
        'ut enim excepturi exercitationem iure vel',
        8,
        31,
        498,
        0.3
    ),
    (288, 'quod', 8, 31, 518, 2.7),
    (
        289,
        'autem a dolor ut sit',
        8,
        31,
        289,
        3.86
    ),
    (
        290,
        'ea debitis dolorum sequi mollitia dolores',
        8,
        31,
        456,
        4.9
    ),
    (
        291,
        'quasi sint ut',
        8,
        31,
        222,
        0.99
    ),
    (
        292,
        'maxime veniam accusantium qui est laudantium sint esse',
        8,
        31,
        374,
        3.91
    ),
    (
        293,
        'debitis tenetur vel alias accusantium similique exercitationem quia autem',
        8,
        31,
        186,
        1.6
    ),
    (
        294,
        'impedit et qui voluptatum',
        8,
        31,
        230,
        4.75
    ),
    (
        295,
        'rerum voluptatem asperiores delectus voluptatem aspernatur numquam tempora a in',
        9,
        32,
        380,
        4.91
    ),
    (
        296,
        'amet ea et alias cum quaerat et quo necessitatibus occaecati',
        9,
        32,
        337,
        3.43
    ),
    (
        297,
        'debitis magnam quibusdam doloribus delectus modi non',
        9,
        32,
        432,
        0.59
    ),
    (
        298,
        'quaerat non sit facilis debitis',
        9,
        32,
        611,
        2.15
    ),
    (
        299,
        'quibusdam beatae quo quidem vero id dolor',
        9,
        32,
        334,
        0.22
    ),
    (300, 'aut', 9, 32, 514, 4.39),
    (
        301,
        'mollitia dolorem iusto animi',
        9,
        32,
        614,
        0.12
    ),
    (
        302,
        'voluptatum ut',
        9,
        32,
        712,
        0.78
    ),
    (
        303,
        'natus eaque et qui dolores dolorum quidem qui',
        9,
        32,
        480,
        3.14
    ),
    (
        304,
        'tenetur vitae dolorem culpa ipsa consequuntur minima',
        9,
        32,
        200,
        3.77
    ),
    (
        305,
        'molestiae alias unde nobis eum ullam aut et occaecati',
        9,
        32,
        649,
        4.58
    ),
    (
        306,
        'consequatur ea',
        9,
        33,
        649,
        4.03
    ),
    (
        307,
        'architecto ut adipisci magnam nemo a doloribus',
        9,
        33,
        561,
        0.33
    ),
    (
        308,
        'repellendus exercitationem nam similique ratione quod exercitationem quae incidunt',
        9,
        33,
        536,
        0.81
    ),
    (
        309,
        'numquam corrupti et eos consectetur',
        9,
        33,
        542,
        4.63
    ),
    (
        310,
        'aut at voluptatem occaecati ipsum rem',
        9,
        33,
        611,
        4.79
    ),
    (
        311,
        'ab sequi a dolorem quo',
        9,
        33,
        536,
        1.55
    ),
    (
        312,
        'ut hic',
        9,
        33,
        213,
        0.35
    ),
    (
        313,
        'ea autem nobis non rerum quam sint excepturi',
        9,
        33,
        487,
        0.47
    ),
    (
        314,
        'ipsum sed repudiandae non aliquam facilis dolorem',
        9,
        33,
        227,
        2.93
    ),
    (
        315,
        'cumque nisi qui',
        9,
        33,
        711,
        4.13
    ),
    (
        316,
        'sint veniam et',
        9,
        33,
        677,
        4.75
    ),
    (317, 'iure', 9, 33, 596, 0.75),
    (
        318,
        'dolorem facere qui dolorem dignissimos qui vero',
        9,
        34,
        712,
        3.41
    ),
    (
        319,
        'ut repellendus aut error labore voluptatem sunt est',
        9,
        34,
        510,
        2.64
    ),
    (
        320,
        'labore nesciunt fugiat asperiores voluptatibus quae',
        9,
        34,
        346,
        2.45
    ),
    (
        321,
        'dolorem cupiditate',
        9,
        34,
        386,
        0.73
    ),
    (
        322,
        'a sit sunt qui consequatur laudantium expedita ad',
        9,
        34,
        664,
        4.84
    ),
    (
        323,
        'vel non dolor',
        9,
        34,
        342,
        2.14
    ),
    (
        324,
        'nesciunt architecto iusto cupiditate at odit suscipit',
        9,
        35,
        279,
        1.38
    ),
    (
        325,
        'explicabo consequuntur unde',
        9,
        35,
        385,
        4.41
    ),
    (
        326,
        'voluptatem laborum ut delectus cum modi est exercitationem ipsum dolores',
        9,
        35,
        224,
        0.48
    ),
    (
        327,
        'recusandae omnis accusamus',
        9,
        35,
        227,
        2.38
    ),
    (
        328,
        'et voluptas id nulla voluptatem eligendi at',
        9,
        36,
        286,
        0.87
    ),
    (
        329,
        'quas fugiat qui',
        9,
        36,
        378,
        2.18
    ),
    (
        330,
        'voluptatem et et minima facilis',
        9,
        36,
        668,
        3.08
    ),
    (
        331,
        'at ea tenetur minima nisi molestiae molestias amet reprehenderit perferendis',
        9,
        36,
        719,
        4.48
    ),
    (
        332,
        'et consequatur quos maxime',
        9,
        36,
        560,
        4.22
    ),
    (
        333,
        'eum officia molestiae harum dolorem unde',
        9,
        36,
        323,
        4.39
    ),
    (
        334,
        'inventore placeat est consequatur voluptate consequatur eius sequi',
        9,
        36,
        433,
        2.58
    ),
    (
        335,
        'et ad ea vel modi',
        10,
        37,
        281,
        1.54
    ),
    (
        336,
        'tenetur dignissimos veniam voluptatum natus',
        10,
        37,
        581,
        4.1
    ),
    (
        337,
        'nesciunt sit vitae magnam expedita ea ab ducimus sed et',
        10,
        37,
        305,
        4
    ),
    (
        338,
        'eos neque itaque ut aliquam ut',
        10,
        37,
        253,
        3.38
    ),
    (
        339,
        'voluptas',
        10,
        37,
        569,
        1.7
    ),
    (
        340,
        'qui explicabo ullam magni beatae officia tenetur eum sed',
        10,
        37,
        323,
        2.34
    ),
    (
        341,
        'inventore placeat et eligendi aliquam quas',
        10,
        37,
        379,
        1.92
    ),
    (
        342,
        'temporibus eos natus architecto dolorem',
        10,
        37,
        416,
        4.9
    ),
    (
        343,
        'libero pariatur eveniet ut enim aliquid',
        10,
        37,
        707,
        1.4
    ),
    (
        344,
        'laudantium quia facere',
        10,
        37,
        593,
        1.18
    ),
    (
        345,
        'quo labore optio perferendis et qui dolor veniam enim nisi',
        10,
        37,
        606,
        3.23
    ),
    (
        346,
        'dolores minima',
        10,
        37,
        365,
        1.82
    ),
    (
        347,
        'repellendus reiciendis impedit dolores ab nemo aut qui dignissimos',
        10,
        38,
        471,
        4.09
    ),
    (
        348,
        'similique voluptas autem',
        10,
        38,
        314,
        2.15
    ),
    (
        349,
        'vitae quos ad',
        10,
        38,
        386,
        3.97
    ),
    (
        350,
        'perspiciatis sequi illo voluptatum et',
        10,
        38,
        488,
        3.55
    ),
    (
        351,
        'magnam voluptas iusto labore quo vero id est',
        10,
        38,
        537,
        0.35
    ),
    (
        352,
        'natus ipsum consequatur debitis nesciunt',
        10,
        38,
        212,
        4.67
    ),
    (
        353,
        'deleniti praesentium laboriosam cumque asperiores eveniet deleniti quam dolore quibusdam',
        10,
        38,
        680,
        2.59
    ),
    (
        354,
        'non iusto dolor voluptate labore dolor modi',
        10,
        39,
        641,
        1.66
    ),
    (
        355,
        'dolores ut voluptatem ut',
        10,
        39,
        593,
        0.49
    ),
    (
        356,
        'eaque esse corrupti sint laudantium aperiam totam',
        10,
        39,
        437,
        0.44
    ),
    (
        357,
        'quia magni est et ea laudantium iusto repellendus omnis',
        10,
        39,
        577,
        4.09
    ),
    (
        358,
        'laborum tempora voluptatum doloribus minima voluptate sunt',
        10,
        40,
        591,
        1.73
    ),
    (
        359,
        'ducimus dolorem autem',
        10,
        40,
        700,
        4.7
    ),
    (
        360,
        'accusamus',
        10,
        40,
        387,
        0.86
    ),
    (
        361,
        'eveniet perferendis sit aut',
        10,
        40,
        181,
        2.85
    ),
    (
        362,
        'pariatur nulla consequatur quaerat veniam laborum',
        10,
        40,
        657,
        0.77
    ),
    (
        363,
        'et sit doloremque omnis itaque corporis',
        10,
        40,
        250,
        3.28
    ),
    (
        364,
        'odit est itaque optio corporis',
        10,
        40,
        617,
        2.97
    ),
    (
        365,
        'nisi repellat illum debitis necessitatibus quos',
        10,
        40,
        453,
        3.16
    ),
    (
        366,
        'eum reiciendis dolorem impedit aut nihil',
        10,
        41,
        627,
        0.96
    ),
    (
        367,
        'odit aperiam possimus et suscipit dolore cumque',
        10,
        41,
        496,
        2.59
    ),
    (
        368,
        'perspiciatis rem unde aut dolorem sint ad porro quam placeat',
        10,
        41,
        623,
        2.34
    ),
    (
        369,
        'eaque perferendis tempora in ut dicta voluptas consectetur',
        10,
        41,
        355,
        3.93
    ),
    (
        370,
        'voluptate aperiam sed sapiente magni porro',
        10,
        41,
        245,
        4.46
    ),
    (
        371,
        'non et aliquid',
        10,
        41,
        303,
        3.85
    ),
    (
        372,
        'quia iste eos voluptatem aperiam',
        10,
        41,
        544,
        1.09
    ),
    (
        373,
        'qui nihil consequatur consequatur repellendus culpa rerum ut',
        10,
        41,
        223,
        1.41
    ),
    (
        374,
        'explicabo deleniti porro et aperiam ut',
        10,
        41,
        294,
        3.44
    ),
    (
        375,
        'facilis laudantium quae ab',
        10,
        41,
        237,
        2.27
    ),
    (
        376,
        'labore sunt',
        10,
        41,
        674,
        2
    ),
    (377, 'et', 10, 41, 261, 0.46),
    (
        378,
        'id quis optio beatae officia dolorem ducimus dolores asperiores',
        10,
        41,
        565,
        1.21
    );
/*!40000 ALTER TABLE `song` ENABLE KEYS */
;
UNLOCK TABLES;
/*!40103 SET TIME_ZONE=@OLD_TIME_ZONE */
;

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */
;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */
;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */
;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */
;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */
;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */
;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */
;

-- Dump completed on 2025-11-09 10:44:30