-- phpMyAdmin SQL Dump
-- version 5.0.2
-- https://www.phpmyadmin.net/
--
-- Hôte : 127.0.0.1:3307
-- Généré le : jeu. 05 mai 2022 à 10:38
-- Version du serveur :  10.4.13-MariaDB
-- Version de PHP : 7.4.9

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de données : `projet_merveille`
--

-- --------------------------------------------------------

--
-- Structure de la table `articles`
--

DROP TABLE IF EXISTS `articles`;
CREATE TABLE IF NOT EXISTS `articles` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `id_aut` int(11) NOT NULL,
  `id_cat` int(11) NOT NULL,
  `titre` varchar(50) NOT NULL,
  `contenu` text NOT NULL,
  `image` varchar(255) NOT NULL,
  `prix` float NOT NULL DEFAULT 0,
  `en_ligne` tinyint(4) NOT NULL DEFAULT 0,
  `date_create` datetime NOT NULL DEFAULT current_timestamp(),
  `date_update` datetime DEFAULT NULL,
  PRIMARY KEY (`id`,`id_aut`,`id_cat`),
  KEY `id_aut` (`id_aut`),
  KEY `id_cat` (`id_cat`)
) ENGINE=InnoDB AUTO_INCREMENT=21 DEFAULT CHARSET=utf8;

--
-- Déchargement des données de la table `articles`
--

INSERT INTO `articles` (`id`, `id_aut`, `id_cat`, `titre`, `contenu`, `image`, `prix`, `en_ligne`, `date_create`, `date_update`) VALUES
(1, 1, 1, 'Voyager pour Escapade Maltaise', 'Réserver un vol vers Escapade de Malte? Rien de plus facile. Réserver un vol vers Malte au meilleur prix ? Voilà qui est un peu plus compliqué… La variation des tarifs est en effet telle que nous craignons souvent de payer plus cher que les autres. Alors à quel prix acheter votre billet d’avion vers Malte ? Quelle est la meilleure période pour réserver vos vols ? De quel aéroport partir ? De quelle ville partir en vol direct ? L’équipe de Partir.com a décrypté toutes les formules et les offres du ciel pour vous répondre. ipsum dolor sit amet consectetur adipisicing elit. Iusto voluptas esse alias ex dicta ducimus dignissimos sunt ratione rerum quidem quasi incidunt numquam sapiente, facere ad impedit aperiam ab sint.    Lorem, ipsum dolor sit amet consectetur adipisicing elit. Iusto voluptas esse alias ex dicta ducimus dignissimos sunt ratione rerum quidem quasi incidunt numquam sapiente, facere ad impedit aperiam ab sint.    Lorem, ipsum dolor sit amet consectetur adipisicing elit. Iusto voluptas esse alias ex dicta ducimus dignissimos sunt ratione rerum quidem quasi incidunt numquam sapiente, facere ad impedit aperiam ab sint.    Lorem, ipsum dolor sit amet consectetur adipisicing elit. Iusto voluptas esse alias ex dicta ducimus dignissimos sunt ratione rerum quidem quasi incidunt numquam sapiente, facere ad impedit aperiam ab sint.    Lorem, ipsum dolor sit amet consectetur adipisicing elit. Iusto voluptas esse alias ex dicta ducimus dignissimos sunt ratione rerum quidem quasi incidunt numquam sapiente, facere ad impedit aperiam ab sint.    Lorem, ipsum dolor sit amet consectetur adipisicing elit. Iusto voluptas esse alias ex dicta ducimus dignissimos sunt ratione rerum quidem quasi incidunt numquam sapiente, facere ad impedit aperiam ab sint.    Lorem, ipsum dolor sit amet consectetur adipisicing elit. Iusto voluptas esse alias ex dicta ducimus dignissimos sunt ratione rerum quidem quasi incidunt numquam sapiente, facere ad impedit aperiam ab sint.    Lorem, ipsum dolor sit amet consectetur adipisicing elit. Iusto voluptas esse alias ex dicta ducimus dignissimos sunt ratione rerum quidem quasi incidunt numquam sapiente, facere ad impedit aperiam ab sint.v    Lorem, ipsum dolor sit amet consectetur adipisicing elit. Iusto voluptas esse alias ex dicta ducimus dignissimos sunt ratione rerum quidem quasi incidunt numquam sapiente, facere ad impedit aperiam ab sint.    Lorem, ipsum dolor sit amet consectetur adipisicing elit. Iusto voluptas esse alias ex dicta ducimus dignissimos sunt ratione rerum quidem quasi incidunt numquam sapiente, facere ad impedit aperiam ab sint.    Lorem, ipsum dolor sit amet consectetur adipisicing elit. Iusto voluptas esse alias ex dicta ducimus dignissimos sunt ratione rerum quidem quasi incidunt numquam sapiente, facere ad impedit aperiam ab sint.', 'Escapade.jpg', 855, 1, '2022-04-13 15:45:39', '2022-04-27 16:43:51'),
(2, 1, 2, 'Radisson Blu Resort', '    Lorem, ipsum dolor sit amet consectetur adipisicing elit. Iusto voluptas esse alias ex dicta ducimus dignissimos sunt ratione rerum quidem quasi incidunt numquam sapiente, facere ad impedit aperiam ab sint.    Lorem, ipsum dolor sit amet consectetur adipisicing elit. Iusto voluptas esse alias ex dicta ducimus dignissimos sunt ratione rerum quidem quasi incidunt numquam sapiente, facere ad impedit aperiam ab sint.    Lorem, ipsum dolor sit amet consectetur adipisicing elit. Iusto voluptas esse alias ex dicta ducimus dignissimos sunt ratione rerum quidem quasi incidunt numquam sapiente, facere ad impedit aperiam ab sint.    Lorem, ipsum dolor sit amet consectetur adipisicing elit. Iusto voluptas esse alias ex dicta ducimus dignissimos sunt ratione rerum quidem quasi incidunt numquam sapiente, facere ad impedit aperiam ab sint.    Lorem, ipsum dolor sit amet consectetur adipisicing elit. Iusto voluptas esse alias ex dicta ducimus dignissimos sunt ratione rerum quidem quasi incidunt numquam sapiente, facere ad impedit aperiam ab sint.    Lorem, ipsum dolor sit amet consectetur adipisicing elit. Iusto voluptas esse alias ex dicta ducimus dignissimos sunt ratione rerum quidem quasi incidunt numquam sapiente, facere ad impedit aperiam ab sint.    Lorem, ipsum dolor sit amet consectetur adipisicing elit. Iusto voluptas esse alias ex dicta ducimus dignissimos sunt ratione rerum quidem quasi incidunt numquam sapiente, facere ad impedit aperiam ab sint.    Lorem, ipsum dolor sit amet consectetur adipisicing elit. Iusto voluptas esse alias ex dicta ducimus dignissimos sunt ratione rerum quidem quasi incidunt numquam sapiente, facere ad impedit aperiam ab sint.    Lorem, ipsum dolor sit amet consectetur adipisicing elit. Iusto voluptas esse alias ex dicta ducimus dignissimos sunt ratione rerum quidem quasi incidunt numquam sapiente, facere ad impedit aperiam ab sint.    Lorem, ipsum dolor sit amet consectetur adipisicing elit. Iusto voluptas esse alias ex dicta ducimus dignissimos sunt ratione rerum quidem quasi incidunt numquam sapiente, facere ad impedit aperiam ab sint.    Lorem, ipsum dolor sit amet consectetur adipisicing elit. Iusto voluptas esse alias ex dicta ducimus dignissimos sunt ratione rerum quidem quasi incidunt numquam sapiente, facere ad impedit aperiam ab sint.', 'maidives-radisson.jpg', 2500, 1, '2022-04-13 15:45:39', NULL),
(3, 1, 3, 'Visiter la ville de ROME', '    Lorem, ipsum dolor sit amet consectetur adipisicing elit. Iusto voluptas esse alias ex dicta ducimus dignissimos sunt ratione rerum quidem quasi incidunt numquam sapiente, facere ad impedit aperiam ab sint.    Lorem, ipsum dolor sit amet consectetur adipisicing elit. Iusto voluptas esse alias ex dicta ducimus dignissimos sunt ratione rerum quidem quasi incidunt numquam sapiente, facere ad impedit aperiam ab sint.    Lorem, ipsum dolor sit amet consectetur adipisicing elit. Iusto voluptas esse alias ex dicta ducimus dignissimos sunt ratione rerum quidem quasi incidunt numquam sapiente, facere ad impedit aperiam ab sint.    Lorem, ipsum dolor sit amet consectetur adipisicing elit. Iusto voluptas esse alias ex dicta ducimus dignissimos sunt ratione rerum quidem quasi incidunt numquam sapiente, facere ad impedit aperiam ab sint.    Lorem, ipsum dolor sit amet consectetur adipisicing elit. Iusto voluptas esse alias ex dicta ducimus dignissimos sunt ratione rerum quidem quasi incidunt numquam sapiente, facere ad impedit aperiam ab sint.    Lorem, ipsum dolor sit amet consectetur adipisicing elit. Iusto voluptas esse alias ex dicta ducimus dignissimos sunt ratione rerum quidem quasi incidunt numquam sapiente, facere ad impedit aperiam ab sint.    Lorem, ipsum dolor sit amet consectetur adipisicing elit. Iusto voluptas esse alias ex dicta ducimus dignissimos sunt ratione rerum quidem quasi incidunt numquam sapiente, facere ad impedit aperiam ab sint.    Lorem, ipsum dolor sit amet consectetur adipisicing elit. Iusto voluptas esse alias ex dicta ducimus dignissimos sunt ratione rerum quidem quasi incidunt numquam sapiente, facere ad impedit aperiam ab sint.', 'i-rome.jpg', 740, 0, '2022-04-13 15:45:39', '2022-04-29 21:35:14'),
(4, 1, 1, 'Le lagon bleu de l\'île de Comino', '    Lorem, ipsum dolor sit amet consectetur adipisicing elit. Iusto voluptas esse alias ex dicta ducimus dignissimos sunt ratione rerum quidem quasi incidunt numquam sapiente, facere ad impedit aperiam ab sint.    Lorem, ipsum dolor sit amet consectetur adipisicing elit. Iusto voluptas esse alias ex dicta ducimus dignissimos sunt ratione rerum quidem quasi incidunt numquam sapiente, facere ad impedit aperiam ab sint.    Lorem, ipsum dolor sit amet consectetur adipisicing elit. Iusto voluptas esse alias ex dicta ducimus dignissimos sunt ratione rerum quidem quasi incidunt numquam sapiente, facere ad impedit aperiam ab sint.    Lorem, ipsum dolor sit amet consectetur adipisicing elit. Iusto voluptas esse alias ex dicta ducimus dignissimos sunt ratione rerum quidem quasi incidunt numquam sapiente, facere ad impedit aperiam ab sint.    Lorem, ipsum dolor sit amet consectetur adipisicing elit. Iusto voluptas esse alias ex dicta ducimus dignissimos sunt ratione rerum quidem quasi incidunt numquam sapiente, facere ad impedit aperiam ab sint.    Lorem, ipsum dolor sit amet consectetur adipisicing elit. Iusto voluptas esse alias ex dicta ducimus dignissimos sunt ratione rerum quidem quasi incidunt numquam sapiente, facere ad impedit aperiam ab sint.    Lorem, ipsum dolor sit amet consectetur adipisicing elit. Iusto voluptas esse alias ex dicta ducimus dignissimos sunt ratione rerum quidem quasi incidunt numquam sapiente, facere ad impedit aperiam ab sint.    Lorem, ipsum dolor sit amet consectetur adipisicing elit. Iusto voluptas esse alias ex dicta ducimus dignissimos sunt ratione rerum quidem quasi incidunt numquam sapiente, facere ad impedit aperiam ab sint.    Lorem, ipsum dolor sit amet consectetur adipisicing elit. Iusto voluptas esse alias ex dicta ducimus dignissimos sunt ratione rerum quidem quasi incidunt numquam sapiente, facere ad impedit aperiam ab sint.', 'lagon-bleu.jpg', 1200, 1, '2022-04-13 15:45:39', NULL),
(6, 1, 2, 'Hotel Lily Beach Ressort', '    Lorem, ipsum dolor sit amet consectetur adipisicing elit. Iusto voluptas esse alias ex dicta ducimus dignissimos sunt ratione rerum quidem quasi incidunt numquam sapiente, facere ad impedit aperiam ab sint.    Lorem, ipsum dolor sit amet consectetur adipisicing elit. Iusto voluptas esse alias ex dicta ducimus dignissimos sunt ratione rerum quidem quasi incidunt numquam sapiente, facere ad impedit aperiam ab sint.    Lorem, ipsum dolor sit amet consectetur adipisicing elit. Iusto voluptas esse alias ex dicta ducimus dignissimos sunt ratione rerum quidem quasi incidunt numquam sapiente, facere ad impedit aperiam ab sint.    Lorem, ipsum dolor sit amet consectetur adipisicing elit. Iusto voluptas esse alias ex dicta ducimus dignissimos sunt ratione rerum quidem quasi incidunt numquam sapiente, facere ad impedit aperiam ab sint.    Lorem, ipsum dolor sit amet consectetur adipisicing elit. Iusto voluptas esse alias ex dicta ducimus dignissimos sunt ratione rerum quidem quasi incidunt numquam sapiente, facere ad impedit aperiam ab sint.    Lorem, ipsum dolor sit amet consectetur adipisicing elit. Iusto voluptas esse alias ex dicta ducimus dignissimos sunt ratione rerum quidem quasi incidunt numquam sapiente, facere ad impedit aperiam ab sint.    Lorem, ipsum dolor sit amet consectetur adipisicing elit. Iusto voluptas esse alias ex dicta ducimus dignissimos sunt ratione rerum quidem quasi incidunt numquam sapiente, facere ad impedit aperiam ab sint.    Lorem, ipsum dolor sit amet consectetur adipisicing elit. Iusto voluptas esse alias ex dicta ducimus dignissimos sunt ratione rerum quidem quasi incidunt numquam sapiente, facere ad impedit aperiam ab sint.    Lorem, ipsum dolor sit amet consectetur adipisicing elit. Iusto voluptas esse alias ex dicta ducimus dignissimos sunt ratione rerum quidem quasi incidunt numquam sapiente, facere ad impedit aperiam ab sint.    Lorem, ipsum dolor sit amet consectetur adipisicing elit. Iusto voluptas esse alias ex dicta ducimus dignissimos sunt ratione rerum quidem quasi incidunt numquam sapiente, facere ad impedit aperiam ab sint.    Lorem, ipsum dolor sit amet consectetur adipisicing elit. Iusto voluptas esse alias ex dicta ducimus dignissimos sunt ratione rerum quidem quasi incidunt numquam sapiente, facere ad impedit aperiam ab sint.', 'maldives-hotel-lily.jpg', 2074, 1, '2022-04-13 15:45:39', NULL),
(7, 1, 3, 'Voyager pour VÉRONE', '    autre ville des amoureux, celle de Roméo & Juliette. Vérone est restée très médiévale et c’est ce qui en fait le charme. En se baladant de place en place, on est complètement immergé dans l’histoire de la ville et son charme pittoresque : la Piazza dei Signori, la statue de Dante et l’Arche Scaligere, le charme absolument délicieux de la Piazza delle Erbe et son marché, le Castelvecchio, ancien château-fort abritant plusieurs œuvres des écoles véronaise et vénitienne ainsi que les 3 superbes églises San Zeno, Sant’Anastasia et le Duomo. ❤ Évidemment, vous ne pourrez vous empêcher d’aller voir la Maison de Juliette avec le (faux) fameux balcon et… lui tripoter le sein… Autre lieu incontournable à Vérone, la Piazza Brà avec les Arènes qui accueillent aujourd’hui l’un des plus grands festivals d’opéra lyrique au monde.autre ville des amoureux, celle de Roméo & Juliette. Vérone est restée très médiévale et c’est ce qui en fait le charme. En se baladant de place en place, on est complètement immergé dans l’histoire de la ville et son charme pittoresque : la Piazza dei Signori, la statue de Dante et l’Arche Scaligere, le charme absolument délicieux de la Piazza delle Erbe et son marché, le Castelvecchio, ancien château-fort abritant plusieurs œuvres des écoles véronaise et vénitienne ainsi que les 3 superbes églises San Zeno, Sant’Anastasia et le Duomo. ❤ Évidemment, vous ne pourrez vous empêcher d’aller voir la Maison de Juliette avec le (faux) fameux balcon et… lui tripoter le sein… Autre lieu incontournable à Vérone, la Piazza Brà avec les Arènes qui accueillent aujourd’hui l’un des plus grands festivals d’opéra lyrique au monde.autre ville des amoureux, celle de Roméo & Juliette. Vérone est restée très médiévale et c’est ce qui en fait le charme. En se baladant de place en place, on est complètement immergé dans l’histoire de la ville et son charme pittoresque : la Piazza dei Signori, la statue de Dante et l’Arche Scaligere, le charme absolument délicieux de la Piazza delle Erbe et son marché, le Castelvecchio, ancien château-fort abritant plusieurs œuvres des écoles véronaise et vénitienne ainsi que les 3 superbes églises San Zeno, Sant’Anastasia et le Duomo. ❤ Évidemment, vous ne pourrez vous empêcher d’aller voir la Maison de Juliette avec le (faux) fameux balcon et… lui tripoter le sein… Autre lieu incontournable à Vérone, la Piazza Brà avec les Arènes qui accueillent aujourd’hui l’un des plus grands festivals d’opéra lyrique au monde.autre ville des amoureux, celle de Roméo & Juliette. Vérone est restée très médiévale et c’est ce qui en fait le charme. En se baladant de place en place, on est complètement immergé dans l’histoire de la ville et son charme pittoresque : la Piazza dei Signori, la statue de Dante et l’Arche Scaligere, le charme absolument délicieux de la Piazza delle Erbe et son marché, le Castelvecchio, ancien château-fort abritant plusieurs œuvres des écoles véronaise et vénitienne ainsi que les 3 superbes églises San Zeno, Sant’Anastasia et le Duomo. ❤ Évidemment, vous ne pourrez vous empêcher d’aller voir la Maison de Juliette avec le (faux) fameux balcon et… lui tripoter le sein… Autre lieu incontournable à Vérone, la Piazza Brà avec les Arènes qui accueillent aujourd’hui l’un des plus grands festivals d’opéra lyrique au monde.', 'i-verone.jpg', 545, 1, '2022-04-13 15:45:39', NULL),
(8, 1, 1, 'Voyager vers Le Nord de Malte', '    Lorem, ipsum dolor sit amet consectetur adipisicing elit. Iusto voluptas esse alias ex dicta ducimus dignissimos sunt ratione rerum quidem quasi incidunt numquam sapiente, facere ad impedit aperiam ab sint.    Lorem, ipsum dolor sit amet consectetur adipisicing elit. Iusto voluptas esse alias ex dicta ducimus dignissimos sunt ratione rerum quidem quasi incidunt numquam sapiente, facere ad impedit aperiam ab sint.    Lorem, ipsum dolor sit amet consectetur adipisicing elit. Iusto voluptas esse alias ex dicta ducimus dignissimos sunt ratione rerum quidem quasi incidunt numquam sapiente, facere ad impedit aperiam ab sint.    Lorem, ipsum dolor sit amet consectetur adipisicing elit. Iusto voluptas esse alias ex dicta ducimus dignissimos sunt ratione rerum quidem quasi incidunt numquam sapiente, facere ad impedit aperiam ab sint.    Lorem, ipsum dolor sit amet consectetur adipisicing elit. Iusto voluptas esse alias ex dicta ducimus dignissimos sunt ratione rerum quidem quasi incidunt numquam sapiente, facere ad impedit aperiam ab sint.    Lorem, ipsum dolor sit amet consectetur adipisicing elit. Iusto voluptas esse alias ex dicta ducimus dignissimos sunt ratione rerum quidem quasi incidunt numquam sapiente, facere ad impedit aperiam ab sint.    Lorem, ipsum dolor sit amet consectetur adipisicing elit. Iusto voluptas esse alias ex dicta ducimus dignissimos sunt ratione rerum quidem quasi incidunt numquam sapiente, facere ad impedit aperiam ab sint.    Lorem, ipsum dolor sit amet consectetur adipisicing elit. Iusto voluptas esse alias ex dicta ducimus dignissimos sunt ratione rerum quidem quasi incidunt numquam sapiente, facere ad impedit aperiam ab sint.    Lorem, ipsum dolor sit amet consectetur adipisicing elit. Iusto voluptas esse alias ex dicta ducimus dignissimos sunt ratione rerum quidem quasi incidunt numquam sapiente, facere ad impedit aperiam ab sint.', 'malte-nord-anchor.webp', 1300, 1, '2022-04-13 15:45:39', NULL),
(9, 1, 1, 'La valette, La capitale', 'ggsgsssssssss shNousge individuel ou en petit groupe, avec ou sans guide, classique ou authentique... Des voyages à  vous avons sélectionné parmi les meilleures agences de voyages françaises ou localesique ou authentique... Des voyages à  vous avons sélectionné parmi les meilleures agences de voyages françaises ou locales les plus beaux les plus beaux voyages : voyaique ou authentique... Des voyages à  vous avons sélectionné parmi les meilleures agences de voyages françaises ou locales les plus beauxique ou authentique... Des voyages à  vous avons sélectionné parmi les meilleures agences de voyages françaises ou locales les plus beauxique ou authentique... Des voyages à  vous avons sélectionné parmi les meilleures agences de voyages françaises ou locales les plus beauxique ou authentique... Des voyages à  vous avons sélectionné parmi les meilleures agences de voyages françaises ou locales les plus beauxique ou authentique... Des voyages à  vous avons sélectionné parmi les meilleures agences de voyages françaises ou locales les plus beauxvvvvvique ou authentique... Des voyages à  vous avons sélectionné parmi les meilleures agences de voyages françaises ou locales les plus beauxique ou authentique... Des voyages à  vous avons sélectionné parmi les meilleures agences de voyages françaises ou locales les plus beauxique ou authentique... Des voyages à  vous avons sélectionné parmi les meilleures agences de voyages françaises ou locales les plus beaux', 'malte-valette.webp', 550, 1, '2022-04-21 15:27:39', NULL),
(10, 1, 2, 'Visiter les typiques Maisons sur pilotis', ' sont en fait un seul et même petit bout de terre ou plutôt de côte composé de 5 villages mondialement connus pour leur beauté et leur sont en fait un seul et même petit bout de terre ou plutôt de côte composé de 5 villages mondialement connus pour leur beauté et leurvv sont en fait un seul et même petit bout de terre ou plutôt de côte composé de 5 villages mondialement connus pour leur beauté et leur sont en fait un seul et même petit bout de terre ou plutôt de côte composé de 5 villages mondialement connus pour leur beauté et leur sont en fait un seul et même petit bout de terre ou plutôt de côte composé de 5 villages mondialement connus pour leur beauté et leur sont en fait un seul et même petit bout de terre ou plutôt de côte composé de 5 villages mondialement connus pour leur beauté et leur', 'maldives-maisons-pilotis.webp', 1443, 1, '2022-04-21 15:40:15', '2022-04-29 12:27:58'),
(11, 1, 2, 'Voyager pour Mercure Kooddoo', ' sont en fait un seul et même petit bout de terre ou plutôt de côte composé de 5 villages mondialement connus pour leur beauté et leur sont en fait un seul et même petit bout de terre ou plutôt de côte composé de 5 villages mondialement connus pour leur beauté et leur sont en fait un seul et même petit bout de terre ou plutôt de côte composé de 5 villages mondialement connus pour leur beauté et leur sont en fait un seul et même petit bout de terre ou plutôt de côte composé de 5 villages mondialement connus pour leur beauté et leur sont en fait un seul et même petit bout de terre ou plutôt de côte composé de 5 villages mondialement connus pour leur beauté et leur sont en fait un seul et même petit bout de terre ou plutôt de côte composé de 5 villages mondialement connus pour leur beauté et leur sont en fait un seul et même petit bout de terre ou plutôt de côte composé de 5 villages mondialement connus pour leur beauté et leur sont en fait un seul et même petit bout de terre ou plutôt de côte composé de 5 villages mondialement connus pour leur beauté et leur sont en fait un seul et même petit bout de terre ou plutôt de côte composé de 5 villages mondialement connus pour leur beauté et leur sont en fait un seul et même petit bout de terre ou plutôt de côte composé de 5 villages mondialement connus pour leur beauté et leur sont en fait un seul et même petit bout de terre ou plutôt de côte composé de 5 villages mondialement connus pour leur beauté et leur', 'maldives-mercure.jpg', 1443, 1, '2022-04-21 15:40:15', NULL),
(12, 1, 3, 'Visiter la ville de FLORENCE', 'Florence rassemble en une seule et même ville pourtant modeste tout ce qui fait l’âme et la beauté de la Toscane et même l’Italie : d’abord un prodigieux patrimoine culturel et artistique où se succèdent églises, monuments, palais d’une richesse presque indécente. Mais attention il ne s’agit pas de n’importe quel patrimoine ! Devant vos yeux ébahis se déploient la plus grande concentration d’Art de la 1ère Renaissance Italienne (notamment au Musée des Offices) : Uccello, Fra Angelico, Giotto, Brunelleschi… nombre de figures artistiques du Quattrocento s’illustrent et s’épanouissent à Florence sous l’influence des Médicis. Partez à la conquête de ces merveilles de l’Art de la Renaissance, que ce soit dans les rues ou à l’intérieur des palais et musées.Florence rassemble en une seule et même ville pourtant modeste tout ce qui fait l’âme et la beauté de la Toscane et même l’Italie : d’abord un prodigieux patrimoine culturel et artistique où se succèdent églises, monuments, palais d’une richesse presque indécente. Mais attention il ne s’agit pas de n’importe quel patrimoine ! Devant vos yeux ébahis se déploient la plus grande concentration d’Art de la 1ère Renaissance Italienne (notamment au Musée des Offices) : Uccello, Fra Angelico, Giotto, Brunelleschi… nombre de figures artistiques du Quattrocento s’illustrent et s’épanouissent à Florence sous l’influence des Médicis. Partez à la conquête de ces merveilles de l’Art de la Renaissance, que ce soit dans les rues ou à l’intérieur des palais et musées.Florence rassemble en une seule et même ville pourtant modeste tout ce qui fait l’âme et la beauté de la Toscane et même l’Italie : d’abord un prodigieux patrimoine culturel et artistique où se succèdent églises, monuments, palais d’une richesse presque indécente. Mais attention il ne s’agit pas de n’importe quel patrimoine ! Devant vos yeux ébahis se déploient la plus grande concentration d’Art de la 1ère Renaissance Italienne (notamment au Musée des Offices) : Uccello, Fra Angelico, Giotto, Brunelleschi… nombre de figures artistiques du Quattrocento s’illustrent et s’épanouissent à Florence sous l’influence des Médicis. Partez à la conquête de ces merveilles de l’Art de la Renaissance, que ce soit dans les rues ou à l’intérieur des palais et musées.', 'i-florence.jpg', 870, 1, '2022-04-21 15:51:04', '2022-04-29 12:27:57'),
(13, 1, 3, 'CINQUE TERRE', 'Les Cinque Terre sont en fait un seul et même petit bout de terre ou plutôt de côte composé de 5 villages mondialement connus pour leur beauté et leur situation géographique spectaculaire. Ce haut-lieu touristique est très fréquenté en haute-saison.Les Cinque Terre sont en fait un seul et même petit bout de terre ou plutôt de côte composé de 5 villages mondialement connus pour leur beauté et leur situation géographique spectaculaire. Ce haut-lieu touristique est très fréquenté en haute-saison.Les Cinque Terre sont en fait un seul et même petit bout de terre ou plutôt de côte composé de 5 villages mondialement connus pour leur beauté et leur situation géographique spectaculaire. Ce haut-lieu touristique est très fréquenté en haute-saison.Les Cinque Terre sont en fait un seul et même petit bout de terre ou plutôt de côte composé de 5 villages mondialement connus pour leur beauté et leur situation géographique spectaculaire. Ce haut-lieu touristique est très fréquenté en haute-saison.Les Cinque Terre sont en fait un seul et même petit bout de terre ou plutôt de côte composé de 5 villages mondialement connus pour leur beauté et leur situation géographique spectaculaire. Ce haut-lieu touristique est très fréquenté en haute-saison.', 'i-cinque-terre.jpg', 550, 1, '2022-04-21 15:51:04', NULL),
(14, 1, 4, 'Voyager pour Barcelone', ' sont en fait un seul et même petit bout de terre ou plutôt de côte composé de 5 villages mondialement connus pour leur beauté et leur sont en fait un seul et même petit bout de terre ou plutôt de côte composé de 5 villages mondialement connus pour leur beauté et leur sont en fait un seul et même petit bout de terre ou plutôt de côte composé de 5 villages mondialement connus pour leur beauté et leur sont en fait un seul et même petit bout de terre ou plutôt de côte composé de 5 villages mondialement connus pour leur beauté et leur sont en fait un seul et même petit bout de terre ou plutôt de côte composé de 5 villages mondialement connus pour leur beauté et leur sont en fait un seul et même petit bout de terre ou plutôt de côte composé de 5 villages mondialement connus pour leur beauté et leur sont en fait un seul et même petit bout de terre ou plutôt de côte composé de 5 villages mondialement connus pour leur beauté et leur sont en fait un seul et même petit bout de terre ou plutôt de côte composé de 5 villages mondialement connus pour leur beauté et leur sont en fait un seul et même petit bout de terre ou plutôt de côte composé de 5 villages mondialement connus pour leur beauté et leur sont en fait un seul et même petit bout de terre ou plutôt de côte composé de 5 villages mondialement connus pour leur beauté et leur sont en fait un seul et même petit bout de terre ou plutôt de côte composé de 5 villages mondialement connus pour leur beauté et leur sont en fait un seul et même petit bout de terre ou plutôt de côte composé de 5 villages mondialement connus pour leur beauté et leur sont en fait un seul et même petit bout de terre ou plutôt de côte composé de 5 villages mondialement connus pour leur beauté et leur sont en fait un seul et même petit bout de terre ou plutôt de côte composé de 5 villages mondialement connus pour leur beauté et leur', 'e-barcelone.jpg', 2560, 1, '2022-04-21 15:56:32', NULL);

-- --------------------------------------------------------

--
-- Structure de la table `categories`
--

DROP TABLE IF EXISTS `categories`;
CREATE TABLE IF NOT EXISTS `categories` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `nom` varchar(255) NOT NULL,
  `description` text NOT NULL,
  `date_create` datetime NOT NULL DEFAULT current_timestamp(),
  `date_update` datetime DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=13 DEFAULT CHARSET=utf8;

--
-- Déchargement des données de la table `categories`
--

INSERT INTO `categories` (`id`, `nom`, `description`, `date_create`, `date_update`) VALUES
(1, 'Maltes', 'bdbgdhdhdhdhd', '2022-04-13 15:41:43', NULL),
(2, 'Maldives', 'dhdhdhdbgcbdhdh', '2022-04-13 15:41:43', NULL),
(3, 'Italie', 'hdhdhjdhjd', '2022-04-13 15:41:43', NULL),
(4, 'Espagne', 'hfhfhfhcbncnbcbc Je suis la', '2022-04-21 13:32:34', '2022-04-29 10:59:35');

-- --------------------------------------------------------

--
-- Structure de la table `commentaires`
--

DROP TABLE IF EXISTS `commentaires`;
CREATE TABLE IF NOT EXISTS `commentaires` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `id_aut` int(11) NOT NULL,
  `id_art` int(11) NOT NULL,
  `contenu` text NOT NULL,
  `date_create` datetime NOT NULL DEFAULT current_timestamp(),
  `date_update` datetime DEFAULT NULL,
  PRIMARY KEY (`id`,`id_aut`,`id_art`),
  KEY `id_aut` (`id_aut`),
  KEY `id_art` (`id_art`)
) ENGINE=InnoDB AUTO_INCREMENT=16 DEFAULT CHARSET=utf8;

--
-- Déchargement des données de la table `commentaires`
--

INSERT INTO `commentaires` (`id`, `id_aut`, `id_art`, `contenu`, `date_create`, `date_update`) VALUES
(1, 1, 1, 'C\'est bien', '2022-04-19 19:03:18', NULL),
(2, 1, 2, 'cool', '2022-04-19 19:05:17', NULL),
(3, 1, 2, 'cool', '2022-04-19 19:05:17', NULL),
(4, 1, 2, 'cool', '2022-04-19 19:05:18', NULL),
(5, 1, 3, 'ok', '2022-04-19 19:05:50', NULL),
(6, 1, 3, 'Je suis là', '2022-04-19 19:28:36', NULL),
(7, 1, 4, 'Salut\r\n', '2022-04-19 22:33:10', NULL),
(8, 1, 1, 'okokoko', '2022-04-19 22:51:48', NULL),
(9, 1, 9, 'Je suis donc', '2022-04-21 16:48:08', NULL),
(10, 1, 7, 'ok', '2022-04-21 17:08:17', NULL),
(11, 1, 4, 'C\'est très bien ce cours', '2022-04-22 09:39:39', NULL),
(12, 1, 14, 'jdjdj', '2022-04-29 15:32:08', NULL),
(13, 1, 4, 'Salut bro', '2022-04-29 16:26:24', NULL),
(15, 4, 14, 'Je commente', '2022-04-29 21:33:20', NULL);

-- --------------------------------------------------------

--
-- Structure de la table `utilisateurs`
--

DROP TABLE IF EXISTS `utilisateurs`;
CREATE TABLE IF NOT EXISTS `utilisateurs` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `nom` varchar(50) NOT NULL,
  `prenom` varchar(50) NOT NULL,
  `email` varchar(100) NOT NULL,
  `admin` tinyint(4) NOT NULL DEFAULT 0,
  `password` varchar(255) NOT NULL,
  `photo` varchar(255) NOT NULL,
  `date_create` datetime NOT NULL DEFAULT current_timestamp(),
  `date_update` datetime DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8;

--
-- Déchargement des données de la table `utilisateurs`
--

INSERT INTO `utilisateurs` (`id`, `nom`, `prenom`, `email`, `admin`, `password`, `photo`, `date_create`, `date_update`) VALUES
(1, 'SODJINOU', 'Robert Enagnon', 'ronasdev@gmail.com', 1, '$2y$10$Cd5GNb87wdE2/evpiCo9Je20ZJUyE2iMm/4GTRL4po6qAACbbBFWq', '1651240699_20190713_152437.jpg', '2022-04-19 16:32:47', '2022-04-29 14:58:19'),
(4, 'MAHINOU', 'Gisèle', 'gisele@gmail.com', 0, '$2y$10$LDXoeJBwCv4Bzt0vvmSvyOArtTmB.quGmywqKUdM1yIZxgWyqr52K', '1651264353_2.jpeg', '2022-04-29 21:32:33', '2022-04-29 21:38:52');

--
-- Contraintes pour les tables déchargées
--

--
-- Contraintes pour la table `articles`
--
ALTER TABLE `articles`
  ADD CONSTRAINT `articles_ibfk_1` FOREIGN KEY (`id_aut`) REFERENCES `utilisateurs` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `articles_ibfk_2` FOREIGN KEY (`id_cat`) REFERENCES `categories` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Contraintes pour la table `commentaires`
--
ALTER TABLE `commentaires`
  ADD CONSTRAINT `commentaires_ibfk_1` FOREIGN KEY (`id_aut`) REFERENCES `utilisateurs` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `commentaires_ibfk_2` FOREIGN KEY (`id_art`) REFERENCES `articles` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
