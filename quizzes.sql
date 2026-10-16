/*M!999999\- enable the sandbox mode */ 

/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;
/*!40103 SET @OLD_TIME_ZONE=@@TIME_ZONE */;
/*!40103 SET TIME_ZONE='+00:00' */;
/*!40014 SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES, SQL_NOTES=0 */;
DROP TABLE IF EXISTS `pl_answers`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8mb4 */;
CREATE TABLE `pl_answers` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `title` varchar(250) DEFAULT NULL,
  `image` varchar(200) DEFAULT NULL,
  `question` int(11) DEFAULT 0,
  `quiz` int(11) DEFAULT 0,
  `author` int(11) DEFAULT 0,
  `created_at` int(11) DEFAULT NULL,
  `updated_at` int(11) DEFAULT NULL,
  `correct` tinyint(1) DEFAULT 0,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=233 DEFAULT CHARSET=utf8mb3 COLLATE=utf8mb3_general_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

LOCK TABLES `pl_answers` WRITE;
/*!40000 ALTER TABLE `pl_answers` DISABLE KEYS */;
INSERT INTO `pl_answers` VALUES
(1,'Hyperlinks and Text Markup Language',NULL,1,1,1,1694858021,NULL,0),
(2,'Hyper Text Markup Language',NULL,1,1,1,1694858050,1694860036,1),
(3,'Home Tool Markup Language',NULL,1,1,1,1694858061,NULL,0),
(4,'Microsoft',NULL,2,1,1,1694858151,NULL,0),
(5,'The World Wide Web Consortium',NULL,2,1,1,1694858168,1694860055,1),
(6,'Mozilla',NULL,2,1,1,1694858184,NULL,0),
(7,'Google',NULL,2,1,1,1694858195,NULL,0),
(8,'&lt;h6&gt;',NULL,3,1,1,1694858246,NULL,0),
(9,'&lt;heading&gt;',NULL,3,1,1,1694858256,NULL,0),
(10,'&lt;h1&gt;',NULL,3,1,1,1694858267,1694860062,1),
(11,'&lt;head&gt;',NULL,3,1,1,1694858276,NULL,0),
(12,'&lt;lb&gt;',NULL,4,1,1,1694858338,NULL,0),
(13,'&lt;break&gt;',NULL,4,1,1,1694858348,NULL,0),
(14,'&lt;br&gt;',NULL,4,1,1,1694858356,1694860080,1),
(15,'&lt;body bg=&quot;yellow&quot;&gt;',NULL,5,1,1,1694858431,NULL,0),
(16,'&lt;i&gt;',NULL,6,1,1,1694859414,NULL,0),
(17,'&lt;strong&gt;',NULL,6,1,1,1694859428,1694860101,1),
(18,'&lt;b&gt;',NULL,6,1,1,1694859442,NULL,0),
(19,'&lt;important&gt;',NULL,6,1,1,1694859461,NULL,0),
(20,'&lt;italic&gt;',NULL,7,1,1,1694859522,NULL,0),
(21,'&lt;em&gt;',NULL,7,1,1,1694859533,1694860108,1),
(22,'&lt;i&gt;',NULL,7,1,1,1694859550,NULL,0),
(23,'*',NULL,8,1,1,1694859618,NULL,0),
(24,'/',NULL,8,1,1,1694859628,NULL,0),
(25,'&lt;',NULL,8,1,1,1694859636,NULL,0),
(26,'^',NULL,8,1,1,1694859700,NULL,0),
(27,'&lt;a href=&quot;url&quot; target= &quot;new&quot;&gt;',NULL,9,1,1,1694859763,NULL,0),
(28,'&lt;a href=&quot;url&quot; new&gt;',NULL,9,1,1,1694859774,1694859792,0),
(29,'&lt;a href=&quot;url&quot; target=&quot;_blank&quot;&gt;',NULL,9,1,1,1694859807,1694860142,1),
(30,'&lt;table&gt;&lt;head&gt;&lt;tfoot&gt;',NULL,10,1,1,1694859870,NULL,0),
(31,'&lt;thead&gt;&lt;body&gt;&lt;tr&gt;',NULL,10,1,1,1694859881,NULL,0),
(32,'&lt;table&gt;&lt;tr&gt;&lt;td&gt;',NULL,10,1,1,1694859905,1694860167,1),
(33,'&lt;table&gt;&lt;tr&gt;&lt;tt&gt;',NULL,10,1,1,1694859916,NULL,0),
(34,'True',NULL,11,1,1,1694859944,NULL,1),
(35,'False',NULL,11,1,1,1694859944,NULL,0),
(36,'Colorful Style Sheets',NULL,12,2,1,1694860527,NULL,0),
(37,'Computer Style Sheets',NULL,12,2,1,1694860543,NULL,0),
(38,'Cascading Style Sheets',NULL,12,2,1,1694860554,1694860570,1),
(39,'Creative Style Sheets',NULL,12,2,1,1694860563,NULL,0),
(40,'text-size',NULL,13,2,1,1694860653,NULL,0),
(41,'font-style',NULL,13,2,1,1694860664,NULL,0),
(42,'text-style',NULL,13,2,1,1694860672,NULL,0),
(43,'font-size',NULL,13,2,1,1694860679,NULL,1),
(44,'text-color',NULL,14,2,1,1694860768,NULL,0),
(45,'color',NULL,14,2,1,1694860776,NULL,1),
(46,'fgcolor',NULL,14,2,1,1694860787,NULL,0),
(47,'&lt;p style=&quot;text-size:bold;&quot;&gt;',NULL,15,2,1,1694860834,NULL,0),
(48,'p {text-size:bold;}',NULL,15,2,1,1694860846,NULL,0),
(49,'p {font-weight:bold;}',NULL,15,2,1,1694860866,NULL,1),
(50,'&lt;p style=&quot;font-size:bold;&quot;&gt;',NULL,15,2,1,1694860871,NULL,0),
(51,'a {decoration:no-underline;}',NULL,16,2,1,1694860925,NULL,0),
(52,'a {underline:none;}',NULL,16,2,1,1694860935,NULL,0),
(53,'a {text-decoration:none;}',NULL,16,2,1,1694860951,NULL,1),
(54,'a {text-decoration:no-underline;}',NULL,16,2,1,1694860957,NULL,0),
(55,'margin-left',NULL,17,2,1,1694861019,NULL,1),
(56,'padding-left',NULL,17,2,1,1694861038,NULL,0),
(57,'indent',NULL,17,2,1,1694861044,NULL,0),
(58,'No',NULL,18,2,1,1694861118,NULL,1),
(59,'Yes',NULL,18,2,1,1694861125,NULL,0),
(60,'h1.all {background-color:#FFFFFF;}',NULL,19,2,1,1694861222,NULL,0),
(61,'all.h1 {background-color:#FFFFFF;}',NULL,19,2,1,1694861232,NULL,0),
(62,'h1 {background-color:#FFFFFF;}',NULL,19,2,1,1694861239,NULL,1),
(63,'border-width:10px 20px 5px 1px;',NULL,20,2,1,1694861347,NULL,0),
(64,'border-width:10px 5px 20px 1px;',NULL,20,2,1,1694861361,NULL,0),
(65,'border-width:5px 20px 10px 1px;',NULL,20,2,1,1694861370,NULL,0),
(66,'border-width:10px 1px 5px 20px;',NULL,20,2,1,1694861377,NULL,1),
(67,'*demo',NULL,21,2,1,1694861433,NULL,0),
(68,'.demo',NULL,21,2,1,1694861444,NULL,0),
(69,'#demo',NULL,21,2,1,1694861460,NULL,1),
(70,'demo',NULL,21,2,1,1694861466,NULL,0),
(71,'System.out.println(&quot;Hello World&quot;);',NULL,22,3,1,1694862052,NULL,1),
(72,'echo(&quot;Hello World&quot;);',NULL,22,3,1,1694862066,NULL,0),
(73,'Console.WriteLine(&quot;Hello World&quot;);',NULL,22,3,1,1694862075,NULL,0),
(74,'print (&quot;Hello World&quot;);',NULL,22,3,1,1694862081,NULL,0),
(75,'True',NULL,23,3,1,1694862103,NULL,0),
(76,'False',NULL,23,3,1,1694862103,NULL,1),
(77,'/* This is a comment',NULL,24,3,1,1694862142,NULL,0),
(78,'// This is a comment',NULL,24,3,1,1694862155,1694862169,1),
(79,'# This is a comment',NULL,24,3,1,1694862161,NULL,0),
(80,'String',NULL,25,3,1,1694862230,NULL,1),
(81,'string',NULL,25,3,1,1694862240,NULL,0),
(82,'Txt',NULL,25,3,1,1694862248,NULL,0),
(83,'myString',NULL,25,3,1,1694862253,NULL,0),
(84,'float x = 5;',NULL,26,3,1,1694862307,NULL,0),
(85,'x = 5;',NULL,26,3,1,1694862315,NULL,0),
(86,'num x = 5',NULL,26,3,1,1694862336,NULL,0),
(87,'int x = 5;',NULL,26,3,1,1694862344,NULL,1),
(88,'len()',NULL,27,3,1,1694862392,NULL,0),
(89,'length()',NULL,27,3,1,1694862407,NULL,1),
(90,'getLength()',NULL,27,3,1,1694862419,NULL,0),
(91,'getSize()',NULL,27,3,1,1694862427,NULL,0),
(92,'toUpperCase()',NULL,28,3,1,1694862560,NULL,1),
(93,'upperCase()',NULL,28,3,1,1694862571,NULL,0),
(94,'touppercase()',NULL,28,3,1,1694862580,NULL,0),
(95,'tuc()',NULL,28,3,1,1694862586,NULL,0),
(96,'&gt;&lt;',NULL,29,3,1,1694862626,NULL,0),
(97,'=',NULL,29,3,1,1694862635,NULL,0),
(98,'==',NULL,29,3,1,1694862648,NULL,1),
(99,'&lt;&gt;',NULL,29,3,1,1694862653,NULL,0),
(100,'()',NULL,30,3,1,1694862689,NULL,0),
(101,'[]',NULL,30,3,1,1694862702,NULL,1),
(102,'{}',NULL,30,3,1,1694862708,NULL,0),
(103,'class myObj = new MyClass();',NULL,31,3,1,1694862769,NULL,0),
(104,'new myObj = MyClass();',NULL,31,3,1,1694862780,NULL,0),
(105,'class MyClass = new myObj();',NULL,31,3,1,1694862790,NULL,0),
(106,'MyClass myObj = new MyClass();',NULL,31,3,1,1694862796,NULL,1),
(107,'echo &quot;Hello World&quot;',NULL,32,4,1,1694863546,NULL,0),
(108,'p(&quot;Hello World&quot;)',NULL,32,4,1,1694863556,NULL,0),
(109,'print(&quot;Hello World&quot;)',NULL,32,4,1,1694863569,NULL,1),
(110,'echo(&quot;Hello World&quot;);',NULL,32,4,1,1694863575,NULL,0),
(111,'Both the other answers are correct',NULL,33,4,1,1694863627,NULL,1),
(112,'x = 5',NULL,33,4,1,1694863636,NULL,0),
(113,'x = int(5)',NULL,33,4,1,1694863641,NULL,0),
(114,'True',NULL,34,4,1,1694863681,NULL,1),
(115,'False',NULL,34,4,1,1694863681,NULL,0),
(116,'if (x &gt; y)',NULL,35,4,1,1694863722,NULL,0),
(117,'if x &gt; y:',NULL,35,4,1,1694863734,NULL,1),
(118,'if x &gt; y then:',NULL,35,4,1,1694863740,NULL,0),
(119,'stop',NULL,36,4,1,1694863780,NULL,0),
(120,'exit',NULL,36,4,1,1694863790,NULL,0),
(121,'break',NULL,36,4,1,1694863804,NULL,1),
(122,'return',NULL,36,4,1,1694863812,NULL,0),
(123,'while x &gt; y {',NULL,37,4,1,1694863856,NULL,0),
(124,'x &gt; y while {',NULL,37,4,1,1694863866,NULL,0),
(125,'while (x &gt; y)',NULL,37,4,1,1694863874,NULL,0),
(126,'while x &gt; y:',NULL,37,4,1,1694863881,NULL,1),
(127,'#',NULL,38,4,1,1694863927,NULL,0),
(128,'*',NULL,38,4,1,1694863934,NULL,1),
(129,'%',NULL,38,4,1,1694863945,NULL,0),
(130,'x',NULL,38,4,1,1694863952,NULL,0),
(131,'x = &quot;Hello&quot;.sub(0, 1)',NULL,39,4,1,1694863994,NULL,0),
(132,'x = &quot;Hello&quot;[0]',NULL,39,4,1,1694864009,NULL,1),
(133,'x = sub(&quot;Hello&quot;, 0, 1)',NULL,39,4,1,1694864015,NULL,0),
(134,'&gt;&lt;',NULL,40,4,1,1694864057,NULL,0),
(135,'&lt;&gt;',NULL,40,4,1,1694864064,NULL,0),
(136,'==',NULL,40,4,1,1694864071,NULL,1),
(137,'=',NULL,40,4,1,1694864078,NULL,0),
(138,'TUPLE',NULL,41,4,1,1694864166,NULL,0),
(139,'SET',NULL,41,4,1,1694864181,NULL,1),
(140,'LIST',NULL,41,4,1,1694864188,NULL,0),
(141,'print (&quot;Hello World&quot;);',NULL,42,5,1,1694872990,NULL,0),
(142,'System.out.println(&quot;Hello World&quot;);',NULL,42,5,1,1694873000,NULL,0),
(143,'Console.WriteLine(&quot;Hello World&quot;);',NULL,42,5,1,1694873010,NULL,0),
(144,'cout &lt;&lt; &quot;Hello World&quot;;',NULL,42,5,1,1694873017,NULL,1),
(145,'True',NULL,43,5,1,1694873038,NULL,0),
(146,'False',NULL,43,5,1,1694873038,NULL,1),
(147,'// This is a comment',NULL,44,5,1,1694873087,NULL,1),
(148,'/* This is a comment',NULL,44,5,1,1694873100,NULL,0),
(149,'# This is a comment',NULL,44,5,1,1694873105,NULL,0),
(150,'string',NULL,45,5,1,1694873143,NULL,1),
(151,'Txt',NULL,45,5,1,1694873158,NULL,0),
(152,'myString',NULL,45,5,1,1694873166,NULL,0),
(153,'String',NULL,45,5,1,1694873172,NULL,0),
(154,'The * sign',NULL,46,5,1,1694873213,NULL,0),
(155,'The &amp; sign',NULL,46,5,1,1694873221,NULL,0),
(156,'The + sign',NULL,46,5,1,1694873227,NULL,1),
(157,'True',NULL,47,5,1,1694873247,NULL,0),
(158,'False',NULL,47,5,1,1694873247,NULL,1),
(159,'=',NULL,48,5,1,1694873285,NULL,0),
(160,'&gt;&lt;',NULL,48,5,1,1694873292,NULL,0),
(161,'==',NULL,48,5,1,1694873300,NULL,1),
(162,'&lt;&gt;',NULL,48,5,1,1694873308,NULL,0),
(163,'class',NULL,50,5,1,1694873601,NULL,1),
(164,'MyClass',NULL,50,5,1,1694873613,NULL,0),
(165,'className',NULL,50,5,1,1694873631,NULL,0),
(166,'class()',NULL,50,5,1,1694873639,NULL,0),
(167,'True',NULL,51,5,1,1694873673,NULL,1),
(168,'False',NULL,51,5,1,1694873673,NULL,0),
(169,'*',NULL,52,5,1,1694873707,NULL,1),
(170,'#',NULL,52,5,1,1694873716,NULL,0),
(171,'%',NULL,52,5,1,1694873724,NULL,0),
(172,'x',NULL,52,5,1,1694873730,NULL,0),
(173,'1',NULL,53,6,1,1695080382,NULL,0),
(174,'1/2',NULL,53,6,1,1695080391,1695118681,1),
(175,'3/4',NULL,53,6,1,1695080406,NULL,0),
(176,'1/4',NULL,54,6,1,1695080438,1695118646,1),
(177,'1/2',NULL,54,6,1,1695080444,NULL,0),
(178,'1',NULL,54,6,1,1695080449,NULL,0),
(179,'inférieure à 0,4.',NULL,55,6,1,1695080499,NULL,0),
(180,'égale à 0,4.',NULL,55,6,1,1695080519,1695118600,1),
(181,'égale à 0,6.',NULL,55,6,1,1695080528,NULL,0),
(182,'« obtenir une figure » et « obtenir un valet ».',NULL,56,6,1,1695080561,NULL,0),
(183,'« obtenir un sept » et « obtenir une figure ».',NULL,56,6,1,1695080569,1695118543,1),
(184,'« obtenir un coeur » et « obtenir une figure ».',NULL,56,6,1,1695080577,NULL,0),
(185,'0,45',NULL,57,6,1,1695080606,NULL,0),
(186,'0,55',NULL,57,6,1,1695080614,1695118490,1),
(187,'0,5',NULL,57,6,1,1695080625,NULL,0),
(188,'10 boules bleues.',NULL,58,6,1,1695080660,NULL,0),
(189,'14 boules bleues.',NULL,58,6,1,1695080669,NULL,0),
(190,'4 boules bleues.',NULL,58,6,1,1695080678,1695118849,1),
(191,'0,4',NULL,59,6,1,1695080774,1695118830,1),
(192,'0,6',NULL,59,6,1,1695080780,NULL,0),
(193,'0,3',NULL,59,6,1,1695080788,NULL,0),
(194,'1/2',NULL,60,6,1,1695080819,NULL,0),
(195,'1/3',NULL,60,6,1,1695080827,1695118798,1),
(196,'1/4',NULL,60,6,1,1695080834,NULL,0),
(197,'La loi de Fermat',NULL,61,7,1,1695119373,NULL,0),
(198,'La loi de Bernoulli',NULL,61,7,1,1695119386,NULL,1),
(199,'La loi d\'Euclide',NULL,61,7,1,1695119392,NULL,0),
(200,'Un lancer de pièce de monnaie',NULL,62,7,1,1695119526,NULL,0),
(201,'Un tirage d\'une carte dans un jeu de 32 cartes',NULL,62,7,1,1695119534,NULL,0),
(202,'Les deux',NULL,62,7,1,1695119542,NULL,1),
(203,'La variance',NULL,63,7,1,1695119596,NULL,1),
(204,'La probabilité de succès',NULL,63,7,1,1695119605,NULL,0),
(205,'Le nombre de répétitions',NULL,63,7,1,1695119610,NULL,0),
(206,'0,08875',NULL,64,7,1,1695119712,NULL,0),
(207,'0,15625',NULL,64,7,1,1695119720,NULL,1),
(208,'0,25',NULL,64,7,1,1695119726,NULL,0),
(209,'0,0064',NULL,65,7,1,1695119858,NULL,1),
(210,'0,0128',NULL,65,7,1,1695119865,NULL,0),
(211,'0,0512',NULL,65,7,1,1695119872,NULL,0),
(212,'Graphique A (probabilités entre 0 et 0,25)','uploads/users/test/answers/MV9VazVCZg-_1695120053.jpg',67,7,1,1695120071,NULL,1),
(213,'Graphique B (exponentielle, entre 0 et 0,08)','uploads/users/test/answers/Ml82MjR5aA-_1695120078.jpg',67,7,1,1695120088,NULL,0),
(214,'Graphique C (probabilités entre 0 et 2,5)','uploads/users/test/answers/M193MmVIOA-_1695120099.jpg',67,7,1,1695120102,NULL,0),
(215,'0,01024',NULL,68,7,1,1695120223,NULL,1),
(216,'0,0128',NULL,68,7,1,1695120293,NULL,0),
(217,'0,0192',NULL,68,7,1,1695120299,NULL,0),
(218,'0,746',NULL,69,7,1,1695120346,NULL,0),
(219,'0,821',NULL,69,7,1,1695120355,NULL,0),
(220,'0,896',NULL,69,7,1,1695120361,NULL,1),
(221,'0,8413',NULL,70,8,1,1695121010,NULL,1),
(222,'0,88',NULL,70,8,1,1695121018,NULL,0),
(223,'0,813',NULL,70,8,1,1695121024,NULL,0),
(224,'0,305',NULL,71,8,1,1695121086,NULL,1),
(225,'0,645',NULL,71,8,1,1695121095,NULL,0),
(226,'0,695',NULL,71,8,1,1695121100,NULL,0),
(227,'0,34',NULL,72,8,1,1695121143,NULL,1),
(228,'0,54',NULL,72,8,1,1695121152,NULL,0),
(229,'0,44',NULL,72,8,1,1695121157,NULL,0),
(230,'0,05',NULL,73,8,1,1695121197,NULL,0),
(231,'0,95',NULL,73,8,1,1695121207,NULL,1),
(232,'0,85',NULL,73,8,1,1695121216,NULL,0);
/*!40000 ALTER TABLE `pl_answers` ENABLE KEYS */;
UNLOCK TABLES;
DROP TABLE IF EXISTS `pl_categories`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8mb4 */;
CREATE TABLE `pl_categories` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(100) DEFAULT NULL,
  `icon` varchar(200) DEFAULT NULL,
  `created_at` int(11) DEFAULT NULL,
  `updated_at` int(11) DEFAULT NULL,
  `author` int(11) DEFAULT 0,
  `color` varchar(10) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8mb3 COLLATE=utf8mb3_general_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

LOCK TABLES `pl_categories` WRITE;
/*!40000 ALTER TABLE `pl_categories` DISABLE KEYS */;
INSERT INTO `pl_categories` VALUES
(1,'Appele','fab fa-apple',1694364253,NULL,1,'#ff0000'),
(2,'Langages Web','fas fa-code',1694856826,NULL,1,'#e78723'),
(3,'Mathématiques','fas fa-brain',1695080277,NULL,1,'#ead923');
/*!40000 ALTER TABLE `pl_categories` ENABLE KEYS */;
UNLOCK TABLES;
DROP TABLE IF EXISTS `pl_configs`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8mb4 */;
CREATE TABLE `pl_configs` (
  `id` tinyint(3) unsigned NOT NULL AUTO_INCREMENT,
  `variable` varchar(255) DEFAULT NULL,
  `value` text DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=71 DEFAULT CHARSET=utf8mb3 COLLATE=utf8mb3_general_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

LOCK TABLES `pl_configs` WRITE;
/*!40000 ALTER TABLE `pl_configs` DISABLE KEYS */;
INSERT INTO `pl_configs` VALUES
(1,'site_logo','assets/img/logo.svg'),
(2,'site_title','Quizy'),
(3,'site_url','puertokhalid.com'),
(4,'site_description','Puerto QUIZY Script is an awesome script that lets you run your own quizzes hosting site. It has been built from scratch using the latest web technologies available such as PHP7, HTML5, and CSS3.'),
(5,'site_keywords','quizy, quiz platform, online quizzes, create online quiz, quiz saas, viral quizzes'),
(6,'site_limit','12'),
(12,'site_image','assets/img/logo-color.png'),
(7,'site_register','0'),
(8,'site_forget','1'),
(51,'site_smtp_auth',''),
(50,'site_smtp_port',''),
(18,'site_author','Puerokhalid'),
(25,'site_country','US'),
(26,'site_noreply','donotreply@puertokhalid.com'),
(28,'fotget_password_msg',''),
(29,'email_verification_msg',''),
(30,'site_plans','1'),
(31,'login_facebook','0'),
(32,'login_twitter','0'),
(33,'login_google','0'),
(34,'login_fbAppId',''),
(35,'login_fbAppSecret',''),
(36,'login_fbAppVersion',''),
(37,'login_twConKey',''),
(38,'login_twConSecret',''),
(39,'login_ggClientId',''),
(40,'login_ggClientSecret',''),
(41,'site_paypal_id',''),
(42,'site_paypal_live','0'),
(43,'site_currency_name',''),
(44,'site_currency_symbol',''),
(45,'site_smtp','0'),
(46,'site_smtp_host',''),
(47,'site_smtp_username',''),
(48,'site_smtp_password',''),
(49,'site_smtp_encryption',''),
(52,'site_favicon','assets/img/fav.png'),
(61,'taxes','10'),
(53,'site_paypal_client_id',''),
(54,'site_paypal_client_secret',''),
(55,'site_users','0'),
(56,'site_facebook','sourour.bensalha.94'),
(57,'site_twitter',''),
(58,'site_instagram','sourourbensalha'),
(59,'site_youtube',''),
(60,'site_skype',''),
(62,'site_stripe_key',''),
(63,'site_stripe_secret',''),
(64,'ipinfo',''),
(65,'site_ads1',''),
(66,'site_ads2',''),
(67,'site_ads3',''),
(68,'site_ads4',''),
(69,'site_ads5',''),
(70,'site_ads6','');
/*!40000 ALTER TABLE `pl_configs` ENABLE KEYS */;
UNLOCK TABLES;
DROP TABLE IF EXISTS `pl_pages`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8mb4 */;
CREATE TABLE `pl_pages` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `title` varchar(200) DEFAULT NULL,
  `content` longtext DEFAULT NULL,
  `created_at` int(11) DEFAULT 0,
  `updated_at` int(11) DEFAULT 0,
  `footer` tinyint(1) DEFAULT 0,
  `link` varchar(255) DEFAULT NULL,
  `sort` smallint(6) DEFAULT 0,
  `keywords` text DEFAULT NULL,
  `description` text DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8mb3 COLLATE=utf8mb3_general_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

LOCK TABLES `pl_pages` WRITE;
/*!40000 ALTER TABLE `pl_pages` DISABLE KEYS */;
INSERT INTO `pl_pages` VALUES
(1,'contact','[center]sourour[/center]\r\n',1694869298,0,0,NULL,0,NULL,NULL);
/*!40000 ALTER TABLE `pl_pages` ENABLE KEYS */;
UNLOCK TABLES;
DROP TABLE IF EXISTS `pl_payments`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8mb4 */;
CREATE TABLE `pl_payments` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `plan` varchar(50) CHARACTER SET utf8mb3 COLLATE utf8mb3_unicode_ci DEFAULT NULL,
  `payment_id` varchar(150) CHARACTER SET utf8mb3 COLLATE utf8mb3_unicode_ci DEFAULT NULL,
  `payer_id` varchar(150) CHARACTER SET utf8mb3 COLLATE utf8mb3_unicode_ci DEFAULT NULL,
  `token` varchar(150) CHARACTER SET utf8mb3 COLLATE utf8mb3_unicode_ci DEFAULT NULL,
  `price` float(10,2) DEFAULT NULL,
  `currency` varchar(5) CHARACTER SET utf8mb3 COLLATE utf8mb3_unicode_ci DEFAULT NULL,
  `status` varchar(20) CHARACTER SET utf8mb3 COLLATE utf8mb3_unicode_ci DEFAULT NULL,
  `date` int(11) DEFAULT 0,
  `author` int(11) DEFAULT 0,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3 COLLATE=utf8mb3_general_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

LOCK TABLES `pl_payments` WRITE;
/*!40000 ALTER TABLE `pl_payments` DISABLE KEYS */;
/*!40000 ALTER TABLE `pl_payments` ENABLE KEYS */;
UNLOCK TABLES;
DROP TABLE IF EXISTS `pl_plans`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8mb4 */;
CREATE TABLE `pl_plans` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `plan` varchar(50) CHARACTER SET utf8mb3 COLLATE utf8mb3_unicode_ci DEFAULT NULL,
  `price` float(10,2) DEFAULT NULL,
  `currency` varchar(5) CHARACTER SET utf8mb3 COLLATE utf8mb3_unicode_ci DEFAULT NULL,
  `desc1` varchar(200) CHARACTER SET utf8mb3 COLLATE utf8mb3_unicode_ci DEFAULT NULL,
  `desc2` varchar(200) CHARACTER SET utf8mb3 COLLATE utf8mb3_unicode_ci DEFAULT NULL,
  `desc3` varchar(200) CHARACTER SET utf8mb3 COLLATE utf8mb3_unicode_ci DEFAULT NULL,
  `desc4` varchar(200) CHARACTER SET utf8mb3 COLLATE utf8mb3_unicode_ci DEFAULT NULL,
  `desc5` varchar(200) CHARACTER SET utf8mb3 COLLATE utf8mb3_unicode_ci DEFAULT NULL,
  `desc6` varchar(200) CHARACTER SET utf8mb3 COLLATE utf8mb3_unicode_ci DEFAULT NULL,
  `desc7` varchar(200) CHARACTER SET utf8mb3 COLLATE utf8mb3_unicode_ci DEFAULT NULL,
  `desc8` varchar(200) CHARACTER SET utf8mb3 COLLATE utf8mb3_unicode_ci DEFAULT NULL,
  `desc9` varchar(200) CHARACTER SET utf8mb3 COLLATE utf8mb3_unicode_ci DEFAULT NULL,
  `created_at` int(11) DEFAULT 0,
  `quizzes` int(11) DEFAULT 0,
  `takers` int(11) DEFAULT 0,
  `questions` int(11) DEFAULT 0,
  `export_statistics` tinyint(1) DEFAULT 0,
  `backgound` tinyint(1) DEFAULT 0,
  `statistics` tinyint(1) DEFAULT 0,
  `integrations` tinyint(1) DEFAULT 0,
  `show_ads` tinyint(1) DEFAULT 0,
  `support` tinyint(1) DEFAULT 0,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

LOCK TABLES `pl_plans` WRITE;
/*!40000 ALTER TABLE `pl_plans` DISABLE KEYS */;
INSERT INTO `pl_plans` VALUES
(1,'Free Plan',0.00,'DT','3 Quizzes','10 Quiz Takers','10 Questions Per a Quiz','Integrations','Custom Backgound','Statistics','Export statistics','No advertisements','Priority support',0,1,10,10,0,0,0,0,0,0),
(2,'Basic Plan',9.99,'$','12 Quizzes','50 Quiz Takers','20 Questions Per a Quiz','Integrations','Custom Backgound','Statistics','Export statistics','No advertisements','Priority support',0,12,50,20,0,1,1,1,0,0),
(3,'Regular Plan',19.99,'$','Unlimited Quizzes','Unlimited Quiz Takers','Unlimited Questions Per a Quiz','Integrations','Custom Backgound','Statistics','Export statistics','No advertisements','Priority support',0,999999,999999,999999,1,1,1,1,1,1);
/*!40000 ALTER TABLE `pl_plans` ENABLE KEYS */;
UNLOCK TABLES;
DROP TABLE IF EXISTS `pl_questions`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8mb4 */;
CREATE TABLE `pl_questions` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `title` varchar(250) DEFAULT NULL,
  `image` varchar(200) DEFAULT NULL,
  `type` varchar(40) DEFAULT NULL,
  `quiz` int(11) DEFAULT 0,
  `author` int(11) DEFAULT 0,
  `created_at` int(11) DEFAULT NULL,
  `updated_at` int(11) DEFAULT NULL,
  `single` tinyint(1) DEFAULT 0,
  `randoms` tinyint(1) DEFAULT 0,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=74 DEFAULT CHARSET=utf8mb3 COLLATE=utf8mb3_general_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

LOCK TABLES `pl_questions` WRITE;
/*!40000 ALTER TABLE `pl_questions` DISABLE KEYS */;
INSERT INTO `pl_questions` VALUES
(1,'What does HTML stand for?',NULL,'normal',1,1,1694857503,1694858119,1,0),
(2,'Who is making the Web standards?',NULL,'normal',1,1,1694858106,NULL,1,0),
(3,'Choose the correct HTML element for the largest heading:',NULL,'normal',1,1,1694858223,NULL,1,0),
(4,'What is the correct HTML element for inserting a line break?',NULL,'normal',1,1,1694858302,NULL,1,0),
(6,'Choose the correct HTML element to define important text',NULL,'normal',1,1,1694859390,NULL,1,0),
(7,'Choose the correct HTML element to define emphasized text',NULL,'normal',1,1,1694859496,NULL,1,0),
(8,'Which character is used to indicate an end tag?',NULL,'normal',1,1,1694859603,NULL,1,0),
(9,'How can you open a link in a new tab/browser window?',NULL,'normal',1,1,1694859725,NULL,1,0),
(10,'Which of these elements are all &lt;table&gt; elements?',NULL,'normal',1,1,1694859828,NULL,1,0),
(11,'Inline elements are normally displayed without starting a new line.',NULL,'objective',1,1,1694859944,1694860184,1,0),
(12,'What does CSS stand for?',NULL,'normal',2,1,1694860504,NULL,1,0),
(13,'Which CSS property controls the text size?',NULL,'normal',2,1,1694860631,NULL,1,0),
(14,'Which CSS property is used to change the text color of an element?',NULL,'normal',2,1,1694860737,NULL,1,0),
(15,'What is the correct CSS syntax for making all the &lt;p&gt; elements bold?',NULL,'normal',2,1,1694860819,NULL,1,0),
(16,'How do you display hyperlinks without an underline?',NULL,'normal',2,1,1694860908,NULL,1,0),
(17,'Which property is used to change the left margin of an element?',NULL,'normal',2,1,1694861002,NULL,1,0),
(18,'When using the padding property; are you allowed to use negative values?',NULL,'normal',2,1,1694861100,NULL,1,0),
(19,'How do you add a background color for all &lt;h1&gt; elements?',NULL,'normal',2,1,1694861193,NULL,1,0),
(20,'How do you display a border like this:  The top border = 10 pixels The bottom border = 5 pixels The left border = 20 pixels The right border = 1pixel?',NULL,'normal',2,1,1694861298,NULL,1,0),
(21,'How do you select an element with id \'demo\'?',NULL,'normal',2,1,1694861407,NULL,1,0),
(22,'What is a correct syntax to output &quot;Hello World&quot; in Java?',NULL,'normal',3,1,1694862026,NULL,1,0),
(23,'Java is short for &quot;JavaScript&quot;.',NULL,'objective',3,1,1694862103,NULL,1,0),
(24,'How do you insert COMMENTS in Java code?',NULL,'normal',3,1,1694862127,NULL,1,0),
(25,'Which data type is used to create a variable that should store text?',NULL,'normal',3,1,1694862211,NULL,1,0),
(26,'How do you create a variable with the numeric value 5?',NULL,'normal',3,1,1694862277,NULL,1,0),
(27,'Which method can be used to find the length of a string?',NULL,'normal',3,1,1694862375,NULL,1,0),
(28,'Which method can be used to return a string in upper case letters?',NULL,'normal',3,1,1694862536,NULL,1,0),
(29,'Which operator can be used to compare two values?',NULL,'normal',3,1,1694862610,NULL,1,0),
(30,'To declare an array in Java, define the variable type with:',NULL,'normal',3,1,1694862677,NULL,1,0),
(31,'What is the correct way to create an object called myObj of MyClass?',NULL,'normal',3,1,1694862746,NULL,1,0),
(32,'What is a correct syntax to output &quot;Hello World&quot; in Python?',NULL,'normal',4,1,1694863531,NULL,1,0),
(33,'How do you create a variable with the numeric value 5?',NULL,'normal',4,1,1694863606,NULL,1,0),
(34,'In Python, \'Hello\', is the same as &quot;Hello&quot;',NULL,'objective',4,1,1694863681,NULL,1,0),
(35,'How do you start writing an if statement in Python?',NULL,'normal',4,1,1694863706,NULL,1,0),
(36,'Which statement is used to stop a loop?',NULL,'normal',4,1,1694863766,NULL,1,0),
(37,'How do you start writing a while loop in Python?',NULL,'normal',4,1,1694863836,NULL,1,0),
(38,'Which operator is used to multiply numbers?',NULL,'normal',4,1,1694863915,NULL,1,0),
(39,'What is a correct syntax to return the first character in a string?',NULL,'normal',4,1,1694863978,NULL,1,0),
(40,'Which operator can be used to compare two values?',NULL,'normal',4,1,1694864044,NULL,1,0),
(41,'Which collection does not allow duplicate members?',NULL,'normal',4,1,1694864133,NULL,1,0),
(42,'What is a correct syntax to output &quot;Hello World&quot; in C++?',NULL,'normal',5,1,1694872975,NULL,1,0),
(43,'C++ is an alias of C#',NULL,'objective',5,1,1694873038,NULL,1,0),
(44,'How do you insert COMMENTS in C++ code?',NULL,'normal',5,1,1694873064,NULL,1,0),
(45,'Which data type is used to create a variable that should store text?',NULL,'normal',5,1,1694873130,NULL,1,0),
(46,'Which operator is used to add together two values?',NULL,'normal',5,1,1694873197,NULL,1,0),
(47,'The value of a string variable can be surrounded by single quotes.',NULL,'objective',5,1,1694873247,NULL,1,0),
(48,'Which operator can be used to compare two values?',NULL,'normal',5,1,1694873270,NULL,1,0),
(50,'Which keyword is used to create a class in C++?',NULL,'normal',5,1,1694873586,NULL,1,0),
(51,'In C++, it is possible to inherit attributes and methods from one class to another.',NULL,'objective',5,1,1694873673,NULL,1,0),
(52,'Which operator is used to multiply numbers?',NULL,'normal',5,1,1694873696,NULL,1,0),
(53,'On a lancé 3 fois d’affilée une pièce non truquée et on a obtenu 3 fois pile. La probabilité qu’on obtienne pile au tirage suivant est égale à :',NULL,'normal',6,1,1695080369,1695080458,1,0),
(54,'On lance deux fois d’affilée une pièce de monnaie non truquée. La probabilité d’obtenir deux fois face est :',NULL,'normal',6,1,1695080426,NULL,1,0),
(55,'A et B sont deux événements incompatibles. Si la probabilité de l’événement A est égale à 0,6, alors la probabilité de l’événement B est :',NULL,'normal',6,1,1695080479,NULL,1,0),
(56,'On tire au hasard une carte dans un jeu de 32 cartes. Deux événements incompatibles sont :',NULL,'normal',6,1,1695080547,NULL,1,0),
(57,'On lance une pièce truquée pour laquelle la probabilité d’obtenir pile est égale à 0,45. La probabilité d’obtenir face est égale à :',NULL,'normal',6,1,1695080593,NULL,1,0),
(58,'L’urne de la question précédente contient 35 boules. Il y a donc :',NULL,'normal',6,1,1695080643,NULL,1,0),
(59,'Une urne contient des boules rouges, bleues et vertes indiscernables au toucher. On tire une boule dans l’urne et on note sa couleur. L’arbre pondéré des possibles de cette expérience aléatoire est représenté ci-dessous. Sachant que la probabilité de','uploads/users/test/questions/M3E-_1695080747.png','normal',6,1,1695080755,NULL,1,0),
(60,'Une urne contient 4 boules rouges et 8 boules bleues indiscernables au toucher. On tire une boule dans l’urne. La probabilité de tirer une boule rouge est égale à :',NULL,'normal',6,1,1695080809,NULL,1,0),
(61,'Comment s\'appelle la loi de probabilité décrivant une expérience aléatoire à deux issues ?',NULL,'normal',7,1,1695119359,NULL,1,0),
(62,'Laquelle de ces situations peut être considérée comme un schéma de loi binomiale ?',NULL,'normal',7,1,1695119501,1695119803,1,0),
(63,'Quelle variable n\'intervient pas dans la formule de la loi binomiale ?',NULL,'normal',7,1,1695119580,NULL,1,0),
(64,'Mise en application de la formule de la loi binomiale. Supposons un lancer de pièce, non truquée. Quelle est la probabilité d\'obtenir quatre fois pile sur cinq lancers ?',NULL,'normal',7,1,1695119692,NULL,1,0),
(65,'Même question que la précédente, sauf que la pièce est truquée. La probabilité de succès n\'est plus que de 0,20.',NULL,'normal',7,1,1695119841,NULL,1,0),
(67,'À quel graphique une loi binomiale correspond-elle ?',NULL,'images',7,1,1695120041,NULL,1,0),
(68,'On tire au hasard une ble d\'une urne cinq fois de suite. Il y a dix boules dans cette urne, et chacune d\'entre elles possède un numéro entre 1 et 10. Chaque ble tirée est remise dans l\'urne. Quelle est la prob de tirer cinq num premiers ? (2, 3, 5, 7',NULL,'normal',7,1,1695120155,1695120271,1,0),
(69,'Supposons une partie de pierre-papier-ciseaux. Vous choisissez un de ces trois objets au hasard, tout comme votre adversaire. Jouez dix parties de suite. Quelle est la probabilité d\'obtenir au moins deux victoires, au millième près ?',NULL,'normal',7,1,1695120329,NULL,1,0),
(70,'Soit  X  une variable aléatoire qui suit la loi normale  N ( 500 ; (20)Puissance 2 ) . Calculer  P ( X &lt; 520 ) .',NULL,'normal',8,1,1695120985,NULL,1,0),
(71,'X  est une variable aléatoire suivant une loi normale  N ( 0 ; 1 ) .On donne de plus  P ( X &lt; 0 , 44 ) = 0 , 67  et  P ( X &lt; 1 , 96 ) = 0 , 975 .Alors : P(0,44 ? X ? 1,96) =',NULL,'normal',8,1,1695121049,NULL,1,0),
(72,'X  est une variable aléatoire suivant une loi normale  N ( 0 ; 1 ) On donne de plus  P ( X &lt; 0 , 44 ) = 0 , 67  et  P ( X &lt; 1 , 96 ) = 0 , 975 . P ( 0 , 44 &gt; X &gt; − 0 , 44 ) =',NULL,'normal',8,1,1695121125,NULL,1,0),
(73,'X  est une variable aléatoire suivant une loi normale  N ( 0 ; 1 ) On donne de plus  P ( X &lt; 0 , 44 ) = 0 , 67  et  P ( X &lt; 1 , 96 ) = 0 , 975 .Alors :  P ( − 1 , 96 &lt; X &lt; 1 , 96 ) =',NULL,'normal',8,1,1695121181,NULL,1,0);
/*!40000 ALTER TABLE `pl_questions` ENABLE KEYS */;
UNLOCK TABLES;
DROP TABLE IF EXISTS `pl_quizzes`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8mb4 */;
CREATE TABLE `pl_quizzes` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `title` varchar(200) DEFAULT NULL,
  `background` varchar(200) DEFAULT NULL,
  `created_at` int(11) DEFAULT NULL,
  `updated_at` int(11) DEFAULT NULL,
  `author` int(11) DEFAULT 0,
  `description` tinytext DEFAULT NULL,
  `boxed` tinyint(1) DEFAULT 0,
  `with_background` tinyint(1) DEFAULT 0,
  `category` int(11) DEFAULT 0,
  `duration` int(11) DEFAULT 0,
  `status` tinyint(1) DEFAULT 0,
  `randoms` tinyint(1) DEFAULT 0,
  `keywords` varchar(250) DEFAULT NULL,
  `thumbnail` varchar(255) DEFAULT NULL,
  `private` tinyint(1) NOT NULL DEFAULT 0,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=9 DEFAULT CHARSET=utf8mb3 COLLATE=utf8mb3_general_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

LOCK TABLES `pl_quizzes` WRITE;
/*!40000 ALTER TABLE `pl_quizzes` DISABLE KEYS */;
INSERT INTO `pl_quizzes` VALUES
(1,'HTML Quiz','assets/img/bg/7.jpg',1694857473,1694862928,1,'You can test your HTML skills with Quizy.\r\n\r\n',0,1,2,59,0,0,'','uploads/users/test/quizzes/aHRtbA-_1694862924.jpg',0),
(2,'CSS Quiz','assets/img/bg/1.png',1694860480,1694863180,1,'You can test your CSS skills with Quizy.\r\n\r\n',0,1,2,59,0,0,'','uploads/users/test/quizzes/dzNfY3NzLWFyMjE-_1694863177.png',0),
(3,'Java Quiz','assets/img/bg/1.png',1694862004,1694863104,1,'You can test your Java skills with Quiz.\r\n\r\n',0,1,2,59,0,0,'','uploads/users/test/quizzes/amF2YV9sb2dvX2ljb25fMTY4NjA5_1694863099.png',0),
(4,'Python Quiz','assets/img/bg/2.png',1694863434,1694864213,1,'You can test your Python skills with  Quiz.\r\n\r\n',0,2,2,600,0,0,'','uploads/users/test/quizzes/MV9tMEg2LXRVYlc2Z3JNbGV6bGI1Mnl3_1694863430.png',0),
(5,'C++ Quiz','assets/img/bg/1.png',1694872903,1694873657,1,'You can test your C++ skills with  Quiz.\r\n\r\n',0,2,2,600,0,0,'','uploads/users/test/quizzes/MV8zM01FTndQUjlrWUw0UVk5RDc0Sm5n_1694872900.png',0),
(6,'Probabilités Quiz','assets/img/bg/1.png',1695080352,1695119030,1,'',0,2,3,2400,0,0,'','uploads/users/test/quizzes/cHJvYmFiaWxpdMOpcy1yaXNxdWVz_1695119026.png',0),
(7,'Loi Binomiale Quiz','assets/img/bg/1.png',1695119153,1695120542,1,'',0,1,3,1800,0,0,'','uploads/users/test/quizzes/bXFkZWZhdWx0_1695120539.jpg',0),
(8,'Loi Normale Quiz','assets/img/bg/1.png',1695120785,1695121302,1,'',0,2,3,1800,0,0,'','uploads/users/test/quizzes/U3RhbmRhcmRfZGV2aWF0aW9uX2RpYWdyYW1fKGRlY2ltYWxfY29tbWEpLnN2Zw-_1695121299.png',0);
/*!40000 ALTER TABLE `pl_quizzes` ENABLE KEYS */;
UNLOCK TABLES;
DROP TABLE IF EXISTS `pl_results`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8mb4 */;
CREATE TABLE `pl_results` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `quiz` int(11) DEFAULT 0,
  `author` int(11) DEFAULT 0,
  `duration` varchar(8) DEFAULT NULL,
  `answers` text DEFAULT NULL,
  `score` int(11) DEFAULT 0,
  `user` int(11) DEFAULT 0,
  `cuisine` int(11) DEFAULT 0,
  `sizes` text DEFAULT NULL,
  `city` varchar(50) DEFAULT NULL,
  `created_at` int(11) DEFAULT NULL,
  `updated_at` int(11) DEFAULT NULL,
  `state` varchar(50) DEFAULT NULL,
  `country_code` varchar(50) DEFAULT NULL,
  `country_name` varchar(50) DEFAULT NULL,
  `browser` varchar(50) DEFAULT NULL,
  `device` varchar(50) DEFAULT NULL,
  `os` varchar(50) DEFAULT NULL,
  `ip` varchar(50) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=utf8mb3 COLLATE=utf8mb3_general_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

LOCK TABLES `pl_results` WRITE;
/*!40000 ALTER TABLE `pl_results` DISABLE KEYS */;
INSERT INTO `pl_results` VALUES
(1,1,1,'-10','{\"1\":\"2\",\"2\":\"5\",\"3\":\"10\",\"4\":\"14\",\"6\":\"17\",\"7\":\"21\",\"8\":\"24\",\"9\":\"29\",\"10\":\"32\",\"11\":\"34\"}',100,0,0,NULL,'',1694860262,NULL,'','','','Chrome','Computer','Windows 10',''),
(2,2,1,'-31','{\"12\":\"36\",\"14\":\"44\",\"15\":\"49\",\"16\":\"53\",\"17\":\"56\",\"18\":\"58\",\"19\":\"62\",\"20\":\"63\",\"21\":\"68\"}',40,0,0,NULL,'',1694861674,NULL,'','','','Chrome','Computer','Windows 10',''),
(3,3,1,'40','{\"26\":\"85\",\"27\":\"89\",\"28\":\"94\",\"29\":\"96\",\"30\":\"102\",\"31\":\"105\"}',10,0,0,NULL,'',1694862835,NULL,'','','','Chrome','Computer','Windows 10',''),
(4,6,1,'2369','{\"53\":\"174\",\"54\":\"177\",\"55\":\"180\",\"56\":\"183\",\"57\":\"186\",\"58\":\"190\",\"59\":\"191\",\"60\":\"196\"}',75,0,0,NULL,'',1695118899,NULL,'','','','Chrome','Computer','Windows 10',''),
(5,7,1,'1769','{\"61\":\"198\",\"62\":\"201\",\"63\":\"203\",\"64\":\"206\",\"65\":\"211\",\"67\":\"212\",\"68\":\"215\",\"69\":\"219\"}',50,0,0,NULL,'',1695120416,NULL,'','','','Chrome','Computer','Windows 10','');
/*!40000 ALTER TABLE `pl_results` ENABLE KEYS */;
UNLOCK TABLES;
DROP TABLE IF EXISTS `pl_subscribers`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8mb4 */;
CREATE TABLE `pl_subscribers` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `email` varchar(200) DEFAULT NULL,
  `content` text DEFAULT NULL,
  `created_at` int(11) DEFAULT 0,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8mb3 COLLATE=utf8mb3_general_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

LOCK TABLES `pl_subscribers` WRITE;
/*!40000 ALTER TABLE `pl_subscribers` DISABLE KEYS */;
/*!40000 ALTER TABLE `pl_subscribers` ENABLE KEYS */;
UNLOCK TABLES;
DROP TABLE IF EXISTS `pl_users`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8mb4 */;
CREATE TABLE `pl_users` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `firstname` varchar(100) DEFAULT NULL,
  `lastname` varchar(100) DEFAULT NULL,
  `username` varchar(255) DEFAULT NULL,
  `password` varchar(255) DEFAULT NULL,
  `photo` varchar(255) DEFAULT NULL,
  `cover` varchar(255) DEFAULT NULL,
  `date` int(11) DEFAULT NULL,
  `level` tinyint(1) unsigned DEFAULT 0,
  `email` varchar(255) DEFAULT NULL,
  `socials` varchar(255) DEFAULT NULL,
  `social_id` varchar(255) DEFAULT NULL,
  `social_name` varchar(255) DEFAULT NULL,
  `gender` tinyint(1) unsigned DEFAULT 0,
  `country` varchar(3) DEFAULT NULL,
  `city` varchar(15) DEFAULT NULL,
  `state` varchar(15) DEFAULT NULL,
  `address` text DEFAULT NULL,
  `birth` varchar(255) DEFAULT NULL,
  `statistics` text DEFAULT NULL,
  `moderat` varchar(255) DEFAULT '0',
  `verified` tinyint(1) unsigned DEFAULT 0,
  `balance` float unsigned DEFAULT 0,
  `description` varchar(255) DEFAULT NULL,
  `language` tinyint(1) unsigned DEFAULT NULL,
  `updated_at` int(10) unsigned DEFAULT NULL,
  `trash` tinyint(1) unsigned NOT NULL DEFAULT 0,
  `plan` tinyint(1) DEFAULT 1,
  `txn_id` varchar(200) DEFAULT NULL,
  `lastpayment` int(11) DEFAULT NULL,
  `phone` varchar(20) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=6 DEFAULT CHARSET=utf8mb3 COLLATE=utf8mb3_general_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

LOCK TABLES `pl_users` WRITE;
/*!40000 ALTER TABLE `pl_users` DISABLE KEYS */;
INSERT INTO `pl_users` VALUES
(1,NULL,NULL,'test','a94a8fe5ccb19ba61c4c0873d391e987982fbbd3',NULL,NULL,1693929451,6,'test@example.com',NULL,NULL,NULL,0,NULL,NULL,NULL,NULL,NULL,NULL,'0',0,0,NULL,NULL,NULL,0,1,NULL,NULL,NULL),
(3,NULL,NULL,'demo3','a94a8fe5ccb19ba61c4c0873d391e987982fbbd3',NULL,NULL,1694864397,1,'demo3@example.com',NULL,NULL,NULL,2,'TN',NULL,NULL,NULL,NULL,NULL,'0',0,0,NULL,NULL,1694868141,0,1,NULL,NULL,NULL),
(4,NULL,NULL,'demo4','a94a8fe5ccb19ba61c4c0873d391e987982fbbd3',NULL,NULL,1694864891,1,'demo4@example.com',NULL,NULL,NULL,0,NULL,NULL,NULL,NULL,NULL,NULL,'0',0,0,NULL,NULL,NULL,0,1,NULL,NULL,NULL),
(5,NULL,NULL,'demo5','a94a8fe5ccb19ba61c4c0873d391e987982fbbd3',NULL,NULL,1695079821,1,'demo5@example.com',NULL,NULL,NULL,0,NULL,NULL,NULL,NULL,NULL,NULL,'0',0,0,NULL,NULL,NULL,0,1,NULL,NULL,NULL);
/*!40000 ALTER TABLE `pl_users` ENABLE KEYS */;
UNLOCK TABLES;
/*!40103 SET TIME_ZONE=@OLD_TIME_ZONE */;

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;

