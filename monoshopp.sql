-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Hôte : 127.0.0.1:3307
-- Généré le : lun. 30 jan. 2023 à 21:55
-- Version du serveur : 10.4.27-MariaDB
-- Version de PHP : 8.1.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de données : `monoshop`
--

-- --------------------------------------------------------

--
-- Structure de la table `category`
--

CREATE TABLE `category` (
  `id` int(11) NOT NULL,
  `catégorie` varchar(30) NOT NULL,
  `image` varchar(200) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Déchargement des données de la table `category`
--

INSERT INTO `category` (`id`, `catégorie`, `image`) VALUES
(1, 'beauty&makeup', ''),
(2, 'men', ''),
(3, 'accessories', 'https://cdn.imgbin.com/20/16/16/imgbin-handbag-computer-icons-leather-clothing-accessories-bag-Vh1M70Mu1DSj0qKBXBmZVJQkx.jpg'),
(5, 'women', ''),
(6, 'lunette', ''),
(7, 'watches', '');

-- --------------------------------------------------------

--
-- Structure de la table `checkout`
--

CREATE TABLE `checkout` (
  `id` int(11) NOT NULL,
  `clt_id` int(11) DEFAULT NULL,
  `email` varchar(100) NOT NULL,
  `full_name` varchar(50) NOT NULL,
  `adress` varchar(255) NOT NULL,
  `total_price` int(11) DEFAULT NULL,
  `city` varchar(50) NOT NULL,
  `stat` varchar(50) NOT NULL,
  `zip` int(5) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Déchargement des données de la table `checkout`
--

INSERT INTO `checkout` (`id`, `clt_id`, `email`, `full_name`, `adress`, `total_price`, `city`, `stat`, `zip`) VALUES
(49, 3, 'soukaina@gmail.com', 'soukaina zahti', '59, hay benkirane rue130', 209, 'tanger', '425', 90000),
(50, 3, 'sara@mail.com', 'sara', 'tanger1235', 190, 'ssssss', '555', 50000);

-- --------------------------------------------------------

--
-- Structure de la table `order_items`
--

CREATE TABLE `order_items` (
  `id` int(11) NOT NULL,
  `order_id` int(11) DEFAULT NULL,
  `item_id` int(11) DEFAULT NULL,
  `quantity` int(11) DEFAULT NULL,
  `prix` decimal(10,0) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Déchargement des données de la table `order_items`
--

INSERT INTO `order_items` (`id`, `order_id`, `item_id`, `quantity`, `prix`) VALUES
(34, 49, 55, 1, '108'),
(35, 49, 52, 1, '3'),
(36, 49, 54, 1, '95'),
(37, 49, 50, 1, '3'),
(38, 50, 60, 1, '190');

-- --------------------------------------------------------

--
-- Structure de la table `produits`
--

CREATE TABLE `produits` (
  `id` int(11) NOT NULL,
  `image` text NOT NULL,
  `nom` varchar(50) NOT NULL,
  `prix` int(11) NOT NULL,
  `description` text NOT NULL,
  `cat_id` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

--
-- Déchargement des données de la table `produits`
--

INSERT INTO `produits` (`id`, `image`, `nom`, `prix`, `description`, `cat_id`) VALUES
(2, 'https://sites.create-cdn.net/siteimages/28/4/9/284928/15/7/9/15798435/919x1208.jpg?1505296014', 'red dress', 20, 'red dress\r\nSarin Mathews Womens Off The Shoulder Short Sleeve High Low Cocktail Skater Dress', 5),
(6, 'https://clutchtotebags.com/wp-content/uploads/2018/04/The-Circle-Bag-Clutch-Leather-HandBag-Crossbody-Leather-Bags-for-Women-Shoulder-bag-leather-with-circle-handle-zipper-WINE-RED-.jpg\r\n\r\n', 'hand bag', 59, 'red hand bag...', 3),
(7, 'https://www.zinabel.ma/5863-home_default/mascara-lash-princess-false-lash-effect-waterproof-essence.jpg', 'Mascara Lash Princess', 8, 'Mascara Lash Princess\r\n12 ml\r\nLe mascara idéal pour tous les modes de vie hyperactifs. Le sport, la piscine, les larmes, ce mascara peut tout endurer et votre maquillage restera absolument impeccable.', 1),
(8, 'https://i.insider.com/59aebd71b065da3b008b4ab7?width=1000&format=jpeg&auto=webp', 'Hills Stick Foundation', 25, 'Hills Stick Foundation\r\nThe Anastasia Beverly Hills Stick Foundation is a no-mess alternative for those who don\'t want to bother with liquid.', 1),
(11, 'prod/les bagues/6.jpg', 'Bague ouverte à détail cœur', 1, 'Sexe:	Femme,Couleur:	Or jaune,Tissu/matériel:	Alliage de zinc,Style:	À la mode,détails:Cœur', 3),
(13, 'prod/les bagues/4.jpg', 'Bague ouverte avec strass', 1, 'Sexe: Femme,Couleur:	Argent,Tissu/matériel:	Cuivre,détails:	Strass', 3),
(14, 'prod/les bagues/1.jpg', 'Bague ouverte ajouré', 2, 'Sexe:	Femme,Couleur:Argent,Tissu/matériel:Acier inoxydableStyle:	À la modedétails:	maille', 3),
(15, 'prod/les bagues/2.jpg', 'Bague ouverte en alliage', 3, 'Sexe:	Femme, Couleur:	Blanc, Tissu/matériel:	plastique ,Style:	À la mode', 3),
(16, 'prod/les bagues/3.jpg', 'Bague ouverte rectangle', 3, 'Sexe:	Femme ,Couleur:	Multicolore ,Tissu/matériel:	Alliage de zinc ,Style:	À la mode ,détails:	Géométrique', 3),
(17, 'prod/les bagues/7.jpg', 'Bague ouverte minimaliste', 4, 'Couleur:	Argent , Tissu/matériel:	Fer', 3),
(18, 'prod/accessoire cheveux/3.jpg', '2 pièces Pince à cheveux avec imprimé léopard', 4, 'Style:	Casual , Couleur:	Multicolore , Type de motif:	Imprimé léopard , Type:	Barrettes crocodiles , Tissu/matériel:	Fer', 3),
(19, 'prod/accessoire cheveux/4.jpg', '4 pièces Épingle à cheveux à chaîne', 7, 'Style:	Casual ,Couleur:Noir ,Type de motif:	Unicolore , détails:	Brillant ,Type:	Barrettes crocodiles ,Tissu/matériel:	EVA', 3),
(20, 'prod/accessoire cheveux/5.jpg', 'Griffe de cheveux dacide acétique', 13, 'Style:	Casual ,Couleur:	Multicolore ,Forme:	Griffe , Tissu/matériel:	EVA ,Type:	Pince à cheveux moyenne', 3),
(21, 'prod/accessoire cheveux/8.jpg', '4 pièces Large pince à cheveux à imprimé fleur', 2, 'Style:	Casual , Couleur:	Multicolore ,Type de motif:	imprimé floral ,Forme:	Original ,Tissu/matériel:	PVC ,Type:	Larges pinces à cheveux', 3),
(22, 'prod/lunette/1.jpg', '2 paires Lunettes de mode à monture carrée', 24, 'AVERTISSEMENT : lunettes tendance. Ne pas porter à lextérieur pour protéger les yeux contre le fort ensoleillement ,Couleur des verres:	Multicolore ,Style:	Bohème ,Forme:	Carré,Matériau du monture:	plastique ,Matériau de la lentille:	PC,Type:Lunettes à monture complète ,Tissu/matériel:	PC', 6),
(23, 'prod/lunette/2.jpg', 'Homme Lunettes de soleil à monture en métal', 26, 'Couleur des verres:	Noir ,Style:	Casual ,Forme:	Rond ,Fonction des verres:	Décoration ,Matériau de la lentille:	PC ,Matériau du monture:	Acier inoxydable', 2),
(24, 'prod/lunette/3.jpg', 'Lunettes de mode à verres teintés', 27, 'AVERTISSEMENT : lunettes tendance. Ne pas porter à lextérieur pour protéger les yeux contre le fort ensoleillement. Non conçu ou destiné à être utilisé dans le jeu par des enfants ,Couleur du monture:	Multicolore ,Style:	Bohème ,Forme:	Carré ,Matériau du monture:	plastique', 6),
(25, 'prod/lunette/4.jpg', 'Lunettes de mode à monture carrée à verres ombrés', 27, 'AVERTISSEMENT : lunettes tendance. Ne pas porter à lextérieur pour protéger les yeux contre le fort ensoleillement du monture:	Multicolore ,Style:	Bohème,Forme:	Carré , Matériau du monture:	PC, Type:	Lunettes à monture complète', 6),
(26, 'prod/lunette/5.jpg', 'Lunettes de mode à monture carrée avec chaîne de l', 26, 'AVERTISSEMENT : lunettes tendance. Ne pas porter à lextérieur pour protéger les yeux contre le fort ensoleillement, Couleur du monture:	Prune ,Style:	Bohème ,Forme:	Carré ,Matériau du monture:	plastique, Matériau de la lentille:	PC ,Type:	Lunettes à monture complète', 6),
(27, 'prod/lunette/6.jpg', '2 paires Lunettes de mode à verres ombrés', 25, 'AVERTISSEMENT : lunettes tendance. Ne pas porter à lextérieur pour protéger les yeux contre le fort ensoleillement. Non conçu ou destiné à être utilisé dans le jeu par des enfants ,Couleur des verres:	Multicolore ,Style:	Bohème ,Forme:	Rond ,Matériau du monture:	Cuivre, Matériau de la lentille:	PC ,Type:	Lunettes à monture complète ,Tissu/matériel:	PC', 6),
(28, 'prod/lunette/7.jpg', '2 paires Lunettes de mode couple à monture en méta', 21, 'AVERTISSEMENT : lunettes tendance. Ne pas porter à lextérieur pour protéger les yeux contre le fort ensoleillement. Non conçu ou destiné à être utilisé dans le jeu par des enfants ,Couleur des verres:	Multicolore ,Style:	Bohème ,Forme:	Ovale ,Matériau du monture:	Cuivre ,Tissu/matériel:	PMMA', 6),
(29, 'prod/sac/1.jpg', 'Sac carré mini à carreaux à détail en métal', 85, 'Couleur:	Multicolore ,détails:	Broderie ,Taille du sac:	Mini,Type de motif:	Blocs de couleur, Carreau ,Type de brides (cm):	Chaîne ,Style:	À la mode ,Type:	Sac carré ,Tissu/matériel:	PU', 8),
(30, 'prod/sac/2.jpg', 'Sac carré mini à chevron à chaîne', 34, 'Couleur:	Noir ,détails:	Chaîne ,Taille du sac:	Mini ,Type de motif:	Chevron ,Type de brides (cm):	Ajustable ,Style:	À la mode ,Type:	Sac carré ,Tissu/matériel:	Cuir PU', 8),
(34, 'prod/sac/6.jpg', 'Sac carré minimaliste géométrique en relief de à r', 36, 'Couleur:	Vert, Taille du sac:	Petit, Type de motif:	Unicolore, Type de brides (cm):	Ajustable, Poignée supérieure, Style:	À la mode, Type:	Sac carré, Revêtement:	100% Polyuréthane, Composition:	100% Polyuréthane, Tissu/matériel:	Cuir PU', 8),
(36, 'prod/sac/7.jpg', 'Sac carré en relief de crocodile à ruché avec poig', 44, 'Couleur:	Kaki, détails:	Plissé, Taille du sac:	Petit, Type de motif:	Imprimé croco, Type de brides (cm):	Ajustable, Poignée supérieure, Style: Élégant, Type:Sac carré, Revêtement:	100% Polyuréthane, Composition:	100% Polyuréthane, Tissu/matériel:	Cuir PU', 8),
(37, 'prod/les montres/1.jpg', 'Montre intelligente surveillance de la fréquence c', 8, 'Couleur:	Multicolore, Compatibilité des marques:	Apple, Type de motif:	Marbre, Tissu/matériel:	Polyamide ', 7),
(38, 'prod/les montres/2.jpg', 'Homme Montre mécanique à strass', 125, 'détails:	Strass, Sexe:	Homme, Type:	Montres-bracelets, Couleur de boîtier:	Multicolore, Caractéristiques:	Calendriers, Style:	Glamour, Forme de montre:	Rond, Résistant à leau:	Pas étanche, Matériel de boîtier:	Alliage de zinc, Matériel de bracelet:	Cuir PU', 2),
(39, 'prod/les montres/3.jpg', 'Montre à quartz à pointeur rond', 14, 'Montres Quartz Matériel de boîtier:	Alliage de zinc, Sexe:	Femme, Type:	Set de montres, Boîtes incluses:	Non, Caractéristiques:	D’Autre, Résistant à leau:	Pas étanche', 7),
(41, 'prod/les montres/6.jpg', 'Homme Montre à quartz à date à pointeur rond', 31, 'Forme de montre:	Rond, Matériel de boîtier:	Alliage de zinc, Matériel de bracelet:	Cuir PU, Couleur de cadran:	Blanc, Résistant à leau:	Pas étanche, Sexe:	Homme, Style:	Casual, Type:	Montres-bracelets, Affichage de la balance: Échelle des barres', 7),
(42, 'prod/les montres/7.jpg', 'Montre à quartz à pointeur rond avec strass', 27, 'Forme de montre:	Rond, Matériel de boîtier:	Alliage, Matériel de bracelet:	Cuir PU, Couleur de bracelet:	Rouge, Résistant à leau:	Pas étanche, détails:	Strass, Sexe:	Femme, Style:	Casual,Type:	Montres-bracelets', 7),
(43, 'prod/les montres/8.jpg', 'Montre à quartz à pointeur carré', 20, 'Montres Quartz Matériel de boîtier:	Alliage de zinc, Sexe:	Homme, Type:	Set de montres, Caractéristiques:	D’Autre, Couleur de boîtier:	Or rose, Résistant à leau:	Pas étanche', 7),
(44, 'prod/les bracelets/1.jpg', 'Bracelet structuré multicouche', 9, 'Couleur:	Multicolore, Magnétique:	Non, Sexe:	Femme, détails:	Torsadé, Style:	À la mode, Tissu/matériel:	plastique', 3),
(45, 'prod/les bracelets/2.jpg', 'Bracelet perlé à fausse perle', 5, 'Couleur:	Multicolore, Magnétique:	Non, Sexe:	Femme, détails:	Perle, Tissu/matériel:	plastique', 3),
(46, 'prod/les bracelets/3.jpg', 'Bracelet à pierre', 7, 'Couleur:	Multicolore, Sexe:	Femme, Tissu/matériel:	pierre, Magnétique:	Non, Style:	À la mode', 3),
(48, 'prod/les bracelets/6.jpg', 'Bracelet perlé à perle naturelle', 9, 'Couleur:	Blanc, Sexe:	Femme, Style:	Glamour, Tissu/matériel:	Perle de culture', 3),
(49, 'prod/collier/1.jpg', 'Collier avec strass et cœur', 3, 'Couleur:	Argent, Sexe:	Femme, Tissu/matériel:	Alliage de zinc, Style:	À la mode, détails:	Cœur, Strass', 3),
(50, 'prod/collier/3.jpg', 'Homme Collier avec pendentif astronaute', 3, 'Couleur:	Argent, Sexe:	Homme, Tissu/matériel:	Alliage de zinc, Style:	À la mode', 2),
(51, 'prod/collier/2.jpg', 'Homme Collier à breloque cactus', 3, 'Couleur:	Or jaune, Sexe:	Homme, Tissu/matériel:	Alliage de zinc, Style:	À la mode', 3),
(52, 'prod/collier/6.jpg', 'Homme Collier à breloque planète', 3, 'Couleur:	Or jaune, Sexe:	Homme, Tissu/matériel:	Alliage de zinc, Style:	À la mode, détails:	Espace, Magnétique:	Non', 3),
(54, 'prod/jean/1.jpg', ' Pantalon taille haute droit en cuir PU', 95, 'Couleur:	Noir, Style:	Soirée, Type de motif:	Unicolore, Type:	Coupe droite, Type de fermeture:	Zippé, détails:	Boutons, Poche, Tour de taille:	Taille haute, Longueur:	Long, Tissu:	Extensibilité légère, Tissu/matériel:	Étoffe, Composition:	100% Polyester, Instructions dentretien:	Lavage à la main ou nettoyage à sec professionnel, Doublure:	Sans doublure, Transparent:	Non', 5),
(55, 'prod/jean/2.jpg', 'Jean droit à imprimé papillon déchiré', 108, 'Couleur:	Kaki, Type de motif:	Papillon, Type:	Coupe droite, Type de fermeture:	Zippé, détails:	Boutons, Poche, Déchiré, Fermeture éclair, Tour de taille:	Taille haute, Longueur:	Long, Type dajustement:	Coupe régulière, Tissu:	Pas de lextensibilité, Tissu/matériel:	Jean, Composition:	100% Coton, Instructions dentretien:	Lavage en machine, ne pas laver à sec, Doublure:	Sans doublure, Transparent:	Non', 5),
(57, 'prod/jean/4.jpg', 'Jeans ample à imprimé dragon chinois et éclairs', 118, 'Couleur:	Noir et Blanc, Type de motif:	Animal, Type:	ample, Type de fermeture:	Zippé, détails:	Boutons, Poche, Fermeture éclair, Tour de taille:	Taille haute, Longueur:	Long, Type dajustement:	Large, Tissu:	Pas de lextensibilité, Tissu/matériel:	Jean, Composition:	100% Coton, Instructions dentretien:	Lavage en machine, ne pas laver à sec, Doublure:	Sans doublure, Transparent:	Non', 5),
(58, 'prod/jean/5.jpg', 'Homme Jean skinny unicolore poche', 168, 'Couleur:	Noir, Type de motif:	Unicolore, détails:	Poche, Type:	Skinny, Type de fermeture:	Zippé, Tour de taille:	Naturel, Longueur:	Long, Type dajustement:	Skinny, Tissu:	Extensibilité légère, Tissu/matériel:	Jean, Composition:	80% Coton, 20% Polyester, Instructions dentretien:	Lavage en machine, ne pas laver à sec, Doublure:	Sans doublure', 2),
(59, 'prod/jean/6.jpg', 'Homme Jean à poche unicolore', 131, 'Couleur:	Kaki, Type de motif:	Unicolore,Type de fermeture:	Zippé, Tour de taille:	Naturel, Longueur:	Long, Type dajustement:	Coupe régulière, Tissu:	Pas de lextensibilité, Tissu/matériel:	Jean, Composition:	95% Coton, 5% Élasthanne, Instructions dentretien:	Lavage en machine, ne pas laver à sec, Doublure:	Sans doublure, Transparent:	Non', 2),
(60, 'https://xcdn.next.co.uk/Common/Items/Default/Default/ItemImages/Search/224x336/T16658.jpg', 'Homme Jean droit à poche ajusté', 190, 'Couleur:	Jean brut, Type de motif:	Unicolore, détails:	Boutons, Poche, Fermeture éclair, Délavé, Type:	Slim et droit, Type de fermeture:	Zippé, Tour de taille:	Naturel, Longueur:	Long, Type dajustement:	Coupe régulière, Tissu:	Élasticité moyenne, Tissu/matériel:	Jean, Composition:	67% Coton, 32% Polyester, 1% Élasthanne, Instructions dentretien:	Lavage en machine, ne pas laver à sec, Doublure:	Sans doublure, Transparent:	Non', 2);

-- --------------------------------------------------------

--
-- Structure de la table `users`
--

CREATE TABLE `users` (
  `user_id` int(11) NOT NULL,
  `nom` varchar(10) NOT NULL,
  `prenom` varchar(10) NOT NULL,
  `email` varchar(255) NOT NULL,
  `motdepasse` varchar(255) NOT NULL,
  `shipping_address` varchar(255) NOT NULL,
  `billing_info` varchar(255) DEFAULT NULL,
  `phone_number` varchar(255) DEFAULT NULL,
  `role` enum('admin','client') NOT NULL DEFAULT 'client'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Déchargement des données de la table `users`
--

INSERT INTO `users` (`user_id`, `nom`, `prenom`, `email`, `motdepasse`, `shipping_address`, `billing_info`, `phone_number`, `role`) VALUES
(1, 'sara', 'wardi', 'sara@admin.com', 'sara', '', NULL, NULL, 'admin'),
(3, 'sara', 'wardi', 'sara@mail.com', 'sara123', '', NULL, NULL, 'client');

--
-- Index pour les tables déchargées
--

--
-- Index pour la table `category`
--
ALTER TABLE `category`
  ADD PRIMARY KEY (`id`);

--
-- Index pour la table `checkout`
--
ALTER TABLE `checkout`
  ADD PRIMARY KEY (`id`),
  ADD KEY `clt_id` (`clt_id`);

--
-- Index pour la table `order_items`
--
ALTER TABLE `order_items`
  ADD PRIMARY KEY (`id`),
  ADD KEY `item_id` (`item_id`),
  ADD KEY `order_items_ibfk_3` (`order_id`);

--
-- Index pour la table `produits`
--
ALTER TABLE `produits`
  ADD PRIMARY KEY (`id`);

--
-- Index pour la table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`user_id`);

--
-- AUTO_INCREMENT pour les tables déchargées
--

--
-- AUTO_INCREMENT pour la table `category`
--
ALTER TABLE `category`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT pour la table `checkout`
--
ALTER TABLE `checkout`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=51;

--
-- AUTO_INCREMENT pour la table `order_items`
--
ALTER TABLE `order_items`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=39;

--
-- AUTO_INCREMENT pour la table `users`
--
ALTER TABLE `users`
  MODIFY `user_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- Contraintes pour les tables déchargées
--

--
-- Contraintes pour la table `checkout`
--
ALTER TABLE `checkout`
  ADD CONSTRAINT `checkout_ibfk_1` FOREIGN KEY (`clt_id`) REFERENCES `users` (`user_id`);

--
-- Contraintes pour la table `order_items`
--
ALTER TABLE `order_items`
  ADD CONSTRAINT `order_items_ibfk_1` FOREIGN KEY (`order_id`) REFERENCES `checkout` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `order_items_ibfk_2` FOREIGN KEY (`item_id`) REFERENCES `produits` (`id`),
  ADD CONSTRAINT `order_items_ibfk_3` FOREIGN KEY (`order_id`) REFERENCES `checkout` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
