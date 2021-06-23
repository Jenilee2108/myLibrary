-- MySQL dump 10.13  Distrib 5.7.24, for Win64 (x86_64)
--
-- Host: localhost    Database: mylibrary
-- ------------------------------------------------------
-- Server version	5.7.24

/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;
/*!40103 SET @OLD_TIME_ZONE=@@TIME_ZONE */;
/*!40103 SET TIME_ZONE='+00:00' */;
/*!40014 SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES, SQL_NOTES=0 */;

--
-- Current Database: `mylibrary`
--

CREATE DATABASE /*!32312 IF NOT EXISTS*/ `mylibrary` /*!40100 DEFAULT CHARACTER SET utf8 */;

USE `mylibrary`;

--
-- Table structure for table `admins`
--

DROP TABLE IF EXISTS `admins`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `admins` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `pseudo` varchar(255) NOT NULL,
  `name` varchar(255) DEFAULT NULL,
  `mail` varchar(255) DEFAULT NULL,
  `password` longtext NOT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `pseudo` (`pseudo`),
  UNIQUE KEY `pseudo_2` (`pseudo`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `admins`
--

LOCK TABLES `admins` WRITE;
/*!40000 ALTER TABLE `admins` DISABLE KEYS */;
/*!40000 ALTER TABLE `admins` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `authorlivres`
--

DROP TABLE IF EXISTS `authorlivres`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `authorlivres` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `idAuthor` int(11) NOT NULL,
  `idLivre` int(11) NOT NULL,
  `tome` varchar(255) DEFAULT NULL,
  `noteMoyenne` int(11) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=32 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `authorlivres`
--

LOCK TABLES `authorlivres` WRITE;
/*!40000 ALTER TABLE `authorlivres` DISABLE KEYS */;
INSERT INTO `authorlivres` VALUES (2,5,1,'1',NULL),(4,5,3,NULL,NULL),(5,5,4,NULL,NULL),(6,2,5,NULL,NULL),(7,5,2,NULL,NULL),(8,3,6,'1',NULL),(9,1,7,'3',NULL),(10,6,11,NULL,NULL),(11,7,12,'1',12),(12,7,12,'2',12),(13,7,12,'3',12),(14,7,12,'4',12),(15,7,12,'5',12),(16,7,12,'7',12),(17,7,12,'8',12),(18,7,12,'9',12),(19,8,13,'2019',12),(20,8,14,'2020',12),(21,8,15,'2019',12),(22,9,16,'1',15),(23,9,16,'2',15),(24,9,16,'3',15),(25,9,16,'4',17),(26,9,16,'5',15),(27,9,16,'6',15),(28,9,16,'7',17),(29,9,16,'8',17),(30,9,16,'9',17),(31,9,16,'10',20);
/*!40000 ALTER TABLE `authorlivres` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `authors`
--

DROP TABLE IF EXISTS `authors`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `authors` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name_author` varchar(255) DEFAULT NULL,
  `firstname_author` varchar(255) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=10 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `authors`
--

LOCK TABLES `authors` WRITE;
/*!40000 ALTER TABLE `authors` DISABLE KEYS */;
INSERT INTO `authors` VALUES (1,'MAURER','Robert'),(2,'ANGELOU','Maya'),(3,'ANONYME','L\'auteur'),(4,'GOUNELLE','Laurent'),(5,'GREENE','Robert'),(6,'Sun','Tzu'),(7,'OKADA','Shinichi'),(8,'Auteurs','Multiples'),(9,'MASE','Motorô');
/*!40000 ALTER TABLE `authors` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `comms`
--

DROP TABLE IF EXISTS `comms`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `comms` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `content` varchar(255) NOT NULL,
  `note` int(4) NOT NULL DEFAULT '0',
  `date_ajout` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `idUser` int(11) NOT NULL,
  `idAuthorLivre` int(11) NOT NULL,
  PRIMARY KEY (`id`),
  KEY `fk1_titleLivre` (`idAuthorLivre`),
  KEY `fk2_userPseudo` (`idUser`),
  CONSTRAINT `fk1_titleLivre` FOREIGN KEY (`idAuthorLivre`) REFERENCES `authorlivres` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  CONSTRAINT `fk2_userPseudo` FOREIGN KEY (`idUser`) REFERENCES `users` (`id`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=33 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `comms`
--

LOCK TABLES `comms` WRITE;
/*!40000 ALTER TABLE `comms` DISABLE KEYS */;
INSERT INTO `comms` VALUES (1,'rien a dire',10,'2021-06-02 10:43:52',10,4),(2,'super livre',15,'2021-04-19 20:40:25',10,2),(3,'rien de special',15,'2021-05-25 08:33:15',10,4),(17,'nouveau Commentaire',17,'2021-06-08 04:12:25',1,8),(27,'page 60',17,'2021-06-10 07:36:04',1,10),(28,'page 45',16,'2021-06-10 08:23:57',10,9),(29,'page 30  ',18,'2021-06-10 08:34:15',1,6),(30,'klsg',15,'2021-06-10 09:42:27',10,10),(31,'tres bon livre',17,'2021-06-10 20:27:19',10,23),(32,'',17,'2021-06-16 20:08:27',21,23);
/*!40000 ALTER TABLE `comms` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `livres`
--

DROP TABLE IF EXISTS `livres`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `livres` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `title` varchar(255) NOT NULL,
  `category` varchar(255) NOT NULL,
  `content` longtext,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=17 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `livres`
--

LOCK TABLES `livres` WRITE;
/*!40000 ALTER TABLE `livres` DISABLE KEYS */;
INSERT INTO `livres` VALUES (1,'Power','DPers','\'Le sentiment de n\'avoir aucun pouvoir sur les gens et les événements est difficilement supportable : l\'impuissance rend malheureux. Personne ne réclame moins de pouvoir, tout le monde en veut davantage.\'\n\nAmoral, intelligent, impitoyable et captivant, cet ouvrage colossal condense 3 000 ans d\'histoire du pouvoir en 48 lois. Véritable manuel de la manipulation, il analyse la quintessence de cette sagesse millénaire, tirée de la vie des plus illustres stratèges (Sun Zi, Clausewitz), hommes d\'État (Louis XIV, Bismarck, Talleyrand), courtisans (Castiglione, Gracián), séducteurs (Ninon de Lenclos, Casanova) et escrocs de l\'histoire.\n\nCertaines lois reposent sur la prudence (loi no 1 : Ne surpassez jamais le maître), d\'autres demandent de la dissimulation (loi no 7 : Laissez le travail aux autres, mais recueillez-en les lauriers), d\'autres encore une absence totale de compassion (loi no 15 : Écrasez complètement l\'ennemi). Toutes ces lois trouveront des applications dans votre vie de tous les jours... Car, soyez en certain : le monde est une immense cour où se trament toutes sortes d\'intrigues. Au lieu de nier l\'évidence, tâchez d\'exceller dans la course au pouvoir.'),(2,'Seduction','Dpers',NULL),(3,'Strategie','Dpers','Lorem ipsum dolor sit amet consectetur adipisicing elit. Tempore nobis eos omnis commodi mollitia adipisci quas? Eos obcaecati velit alias dignissimos consectetur enim recusandae excepturi tempore fugiat nemo quae ab explicabo modi illum quas dolore reprehenderit, itaque perferendis quisquam, ad impedit. Error velit nobis odit, voluptatem aliquid autem dolorum eius a culpa quae incidunt labore molestiae dolor quibusdam architecto qui assumenda aperiam? Nam, repudiandae. Quam veritatis, pariatur debitis laborum mollitia iure maxime atque in at totam adipisci laboriosam eligendi quo facilis libero nihil iste expedita hic. Voluptas porro aperiam pariatur, praesentium maxime error voluptates, laborum unde optio eum officia minima!'),(4,'La 50eme Loi','Dpers','Lorem ipsum dolor sit amet consectetur adipisicing elit. Tempore nobis eos omnis commodi mollitia adipisci quas? Eos obcaecati velit alias dignissimos consectetur enim recusandae excepturi tempore fugiat nemo quae ab explicabo modi illum quas dolore reprehenderit, itaque perferendis quisquam, ad impedit. Error velit nobis odit, voluptatem aliquid autem dolorum eius a culpa quae incidunt labore molestiae dolor quibusdam architecto qui assumenda aperiam? Nam, repudiandae. Quam veritatis, pariatur debitis laborum mollitia iure maxime atque in at totam adipisci laboriosam eligendi quo facilis libero nihil iste expedita hic. Voluptas porro aperiam pariatur, praesentium maxime error voluptates, laborum unde optio eum officia minima!'),(5,'Je sais pourquoi chante l\'oiseau en cage','Roman','Lorem ipsum dolor sit amet consectetur adipisicing elit. Tempore nobis eos omnis commodi mollitia adipisci quas? Eos obcaecati velit alias dignissimos consectetur enim recusandae excepturi tempore fugiat nemo quae ab explicabo modi illum quas dolore reprehenderit, itaque perferendis quisquam, ad impedit. Error velit nobis odit, voluptatem aliquid autem dolorum eius a culpa quae incidunt labore molestiae dolor quibusdam architecto qui assumenda aperiam? Nam, repudiandae. Quam veritatis, pariatur debitis laborum mollitia iure maxime atque in at totam adipisci laboriosam eligendi quo facilis libero nihil iste expedita hic. Voluptas porro aperiam pariatur, praesentium maxime error voluptates, laborum unde optio eum officia minima!'),(6,'Le livre sans nom','Roman','Lorem ipsum dolor sit amet consectetur adipisicing elit. Tempore nobis eos omnis commodi mollitia adipisci quas? Eos obcaecati velit alias dignissimos consectetur enim recusandae excepturi tempore fugiat nemo quae ab explicabo modi illum quas dolore reprehenderit, itaque perferendis quisquam, ad impedit. Error velit nobis odit, voluptatem aliquid autem dolorum eius a culpa quae incidunt labore molestiae dolor quibusdam architecto qui assumenda aperiam? Nam, repudiandae. Quam veritatis, pariatur debitis laborum mollitia iure maxime atque in at totam adipisci laboriosam eligendi quo facilis libero nihil iste expedita hic. Voluptas porro aperiam pariatur, praesentium maxime error voluptates, laborum unde optio eum officia minima!'),(7,'L\'art de la guerre','Roman','un livre sur la stratégie qui se transmet depuis des siècles'),(8,'L\'homme qui voulait etre heurerux','Dpers',''),(9,'Mme en retard','Enfants','Monsieur Madame'),(10,'M. Personne','Enfants','Monsieur Madame'),(11,'L\'art de la guerre','Roman','un livre sur la stratégie qui se transmet depuis des siècles'),(12,'La cité des esclaves','Manga','Envi, soif de vengeance,volonté de domination? Le scm est fait pour vous!'),(13,'Code Penal','Droit',NULL),(14,'Code Civil','Droit',NULL),(15,'Code de procédure pénale','Droit',NULL),(16,'IKIGAMI - preavis de mort','Manga','Que feriez-vous de vos dernières 24 heures');
/*!40000 ALTER TABLE `livres` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `users`
--

DROP TABLE IF EXISTS `users`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `users` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `pseudo` varchar(255) NOT NULL,
  `name_user` varchar(255) DEFAULT NULL,
  `mail` varchar(255) DEFAULT NULL,
  `password` longtext NOT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `pseudo` (`pseudo`)
) ENGINE=InnoDB AUTO_INCREMENT=38 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `users`
--

LOCK TABLES `users` WRITE;
/*!40000 ALTER TABLE `users` DISABLE KEYS */;
INSERT INTO `users` VALUES (1,'Ju','Julien','lui@lui.lui21','$2y$10$CZNUFCtpACNzLtgFgCHFlO6wzX4VZQT.x8MiI.d/h8z08buWmA/Ni'),(8,'Ro','Ronely','eux@eux.eux','$2y$10$njpLvgXzH.c7YclC1XToCuexOJSql0HMjOWuJBnMM6BxE895SkWHi'),(10,'maman','Yvette','elles@elles.elles2','$2y$10$JsvPI5XjgtaM9McNFqrMiekvD7OrWjvrAl8vEfwMcf/sgYU5qzQ5y'),(12,'moimoi','moimoi','123@456.879','$2y$10$VNROhGw14Vml7Yg1S0Kp2u7P1L.AhluqHKKIm9baOWTgEk2cDye.W'),(14,'moimoi2','moimoi','123@456.789','$2y$10$OG3/0keQliXhzj795DWYO.1XLW/m9.uI.Kqp.cNniZMNn607U609O'),(15,'azerty','quisais','moi@moi.moi','$2y$10$6dSlWhXLD/X3a.1qIv0Iy.BzB/sXp/xMS8AXlVyTVJZeyTqpOuqI6'),(16,'azerty2','quisais','moi@moi.moi','$2y$10$HLUG3F17vJCP4gel/QN4AeIrNQv.MbAJ3AmWEgZlokz0LT9XL/j4u'),(17,'azerty3','quisais','moi@moi.moi','$2y$10$YGNdeiR9WEUcCszKZ/PNIeIkrmAOnhOfoYwhPXjbajLM6DfKlU6WS'),(18,'azerty4','quisais','moi@moi.moi','$2y$10$cjB5R6694406MhrwkaQ6D.Q/WhTFF1B2k1szzwWtLET0wjMWKCfg2'),(19,'Jenilee','Jenilee','jenilee@jenilee.jenilee','$2y$10$tT7r8vbfWo8mfIiRKbXf7OCBEUBYqXVXVQ1L9joKuZLhE78K.vr8G'),(21,'moimoimoimoi','moimoimoi','moi@moi.moi','$2y$10$j2ecX0KeSRSSAupJ6fpWoe51cLvNezgIxbVRJaOLKCZUM5grGY0RC'),(22,'toitoi','toitoi','toi@toi.toi','$2y$10$PzT.Br8wRVD7TP0AZBxMSOmy1LQ.3JhrNFBythi/OXreWl6P/QfqC'),(23,'toitoitoi','toitoi','toi@toi.toi','$2y$10$iK8kukWRlpNE/fXt.qqwje5ujVu5tnRBaXuA0lW.XwE4/0OzFipXS'),(24,'toitoitoitoi','toitoi','toi@toi.toi','$2y$10$1.G9PaF.lEodEzHPcow39.48LbBRQtvfNwue0xBubFH67wvOGzrKm'),(25,'toitoitoitoitoi','toitoi','toi@toi.toi','$2y$10$hn9rWsqepukKsI4ZJKNEiODbH6kqVzFGa9pZI6QjJE4B4D64COmxO'),(26,'azertyuiop','toitoi','toi@toi.toi','$2y$10$paLMQp3MlIde.cP4AYmnYOf53oQ4ofKYHLndSJuZjmMZouF7JH1/G'),(27,'azertyui','moimoimoimoi','azertyui@azerty.azerty','$2y$10$UAGA1zj6SDTl.J5UZwfXie1Ata.RM/C.koLoTeDs8jg/jLp1lFs86'),(28,'azertyuio','moimoimoimoi','azertyui@azerty.azerty','$2y$10$Kz6UUr4nfvlBBgjVUbWUZ.0laqKXGv.78ze7PeKLSGN3VNJ/0l72u'),(29,'azertyuiom','moimoimoimoi','azertyui@azerty.azerty','$2y$10$eGli1l7jEJzHoPxwZgbv8u3yu0h/bwqtwV7wM05zZ62y84uIcqTT2'),(30,'azertyuiomn','moimoimoimoi','azertyui@azerty.azerty','$2y$10$P3JOJNZr7WQXXfZiF23WzuHFTCVpXhThCUsK9VzUSffxmFvKfoPmq'),(31,'azertyuiomnp','moimoimoimoi','azertyui@azerty.azerty','$2y$10$pfJeMIgT4yMhMW2bi1jR9.ZoealrnctLvZgwh/mbqvxUKGvK6xuAC'),(32,'azertyuiomnpo','moimoimoimoi','azertyui@azerty.azerty','$2y$10$xUUkPOKqS7RE54SwJImVyeXtC6ofwr6QMA7RpuYmVR50l00j6.AyS'),(33,'azertyuiomnpor','moimoimoimoi','azertyui@azerty.azerty','$2y$10$/UDAwkoIE6fvdzangarjSemjv7bKhh66sfPB3qWd8yCmNfix5IwNq'),(34,'azertyuiomnport','moimoimoimoi','azertyui@azerty.azerty','$2y$10$b3D1.3c8ab84JItdBeOw.uH6aQbLH7OK6Hp90yxmcPZJRkeY0nG5u'),(35,'azertyuiomnportp','moimoimoimoi','azertyui@azerty.azerty','$2y$10$12I/h6Zppi7hWdf8crEHieEhBjeiZXFL48qGvYMpuGrWuYbUphAu6'),(37,'ratus','ratus','moi@moi.moi','$2y$10$hMMf5zFeBQKmIRBdUx/fxO1O9oaTUrDJ.PEXijBgrAqHBRpL5IkZS');
/*!40000 ALTER TABLE `users` ENABLE KEYS */;
UNLOCK TABLES;
/*!40103 SET TIME_ZONE=@OLD_TIME_ZONE */;

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;

-- Dump completed on 2021-06-16 23:31:46


SELECT comms.`id`, `comms`.`content` AS content, note, date_ajout, CONCAT(authors.`firstname_author`,' ' ,authors.`name_author`) AS name_author, `livres`.`title` AS title, `users`.`pseudo`
FROM  `comms` 
INNER JOIN  `authorLivres`
ON  `comms`.`idAuthorLivre` = `authorLivres`.id
INNER JOIN `livres`
ON `authorLivres`.`idlivre` = `livres`.id 
INNER JOIN `authors`
ON `authorLivres`.`idAuthor` = `authors`.id 
INNER JOIN `users`
ON  `comms`.`idUser` = `users`.id
    WHERE `users`.`pseudo` = "Maman"
ORDER BY title;