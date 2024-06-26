-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Hôte : 127.0.0.1
-- Généré le : lun. 15 avr. 2024 à 21:49
-- Version du serveur : 10.4.32-MariaDB
-- Version de PHP : 8.2.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de données : `bibliotheque`
--

-- --------------------------------------------------------

--
-- Structure de la table `adherent`
--

CREATE TABLE `adherent` (
  `id` int(11) NOT NULL,
  `nom` varchar(255) DEFAULT NULL,
  `prenom` varchar(255) DEFAULT NULL,
  `mot_de_passe` varchar(255) DEFAULT NULL,
  `mail` varchar(255) DEFAULT NULL,
  `date_inscription` date DEFAULT NULL,
  `admin` int(1) NOT NULL DEFAULT 0,
  `cle` int(11) NOT NULL,
  `mailConfirme` int(1) NOT NULL DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Déchargement des données de la table `adherent`
--

INSERT INTO `adherent` (`id`, `nom`, `prenom`, `mot_de_passe`, `mail`, `date_inscription`, `admin`, `cle`, `mailConfirme`) VALUES
(1, 'Dupont', 'Jean', '161ebd7d45089b3446ee4e0d86dbcf92', 'jean.dupont@example.com', '2022-01-05', 0, 0, 1),
(2, 'Durand', 'Marie', '161ebd7d45089b3446ee4e0d86dbcf92', 'marie.durand@example.com', '2022-02-10', 0, 0, 1),
(3, 'Martin', 'Pierre', '161ebd7d45089b3446ee4e0d86dbcf92', 'pierre.martin@example.com', '2023-05-15', 0, 0, 1),
(4, 'Tribaleau', 'Titouan', '161ebd7d45089b3446ee4e0d86dbcf92', 'titouan.martin@example.com', '2023-01-20', 0, 0, 1),
(5, 'Peixoto', 'Anthony', '161ebd7d45089b3446ee4e0d86dbcf92', 'anthony.peixoto@example.com', '2022-09-28', 0, 0, 1),
(6, 'Portolleau', 'Anaïs', '161ebd7d45089b3446ee4e0d86dbcf92', 'anaïs.portolleau@example.com', '2022-06-09', 0, 0, 1),
(7, 'Rialland', 'Stefen', '161ebd7d45089b3446ee4e0d86dbcf92', 'stefen.rialland@example.com', '2023-01-20', 0, 0, 1),
(8, 'Lonwell', 'Marius', '161ebd7d45089b3446ee4e0d86dbcf92', 'Marius.lonwell@KroniqueMail.eu', '2019-02-06', 0, 0, 1),
(9, 'Lonwell', 'Océanne', '161ebd7d45089b3446ee4e0d86dbcf92', 'Océanne.lonwell@KroniqueMail.eu', '2052-03-08', 0, 0, 1),
(10, 'Worms', 'Loric', '161ebd7d45089b3446ee4e0d86dbcf92', 'loric.worms@exemple.com', '2023-01-26', 0, 0, 1),
(17, 'Herison', 'Durian', '161ebd7d45089b3446ee4e0d86dbcf92', 'tom.labruyere44@gmail.com', '2024-04-03', 0, 0, 1),
(21, 'Talpot', 'Damien', '161ebd7d45089b3446ee4e0d86dbcf92', 'd.talpot@gmail.com', '2024-04-09', 1, 0, 1),
(23, 'Le BG', 'Damso', '161ebd7d45089b3446ee4e0d86dbcf92', 'b3std4m@gmail.com', '2024-04-12', 0, 0, 1),
(31, 'Aubusson', 'Titouan', '161ebd7d45089b3446ee4e0d86dbcf92', 'c.est.un.test2.0@gmail.com', '2024-04-14', 0, 0, 1),
(39, 'Shimzer', 'Louis', '161ebd7d45089b3446ee4e0d86dbcf92', 'xejojin961@etopys.com', '2024-04-14', 0, 8448134, 1),
(40, 'Admin', 'Admin', '161ebd7d45089b3446ee4e0d86dbcf92', 'admin@bookinerie.com', '2024-04-15', 1, 0, 1);

-- --------------------------------------------------------

--
-- Structure de la table `categorie`
--

CREATE TABLE `categorie` (
  `id` int(11) NOT NULL,
  `libelle` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Déchargement des données de la table `categorie`
--

INSERT INTO `categorie` (`id`, `libelle`) VALUES
(1, 'Roman'),
(2, 'Science-fiction'),
(3, 'Historique'),
(4, 'Manga'),
(5, 'Bande-Dessiné'),
(6, 'Policer'),
(7, 'Thriller'),
(8, 'Poésie'),
(9, 'Fantasy'),
(10, 'Fantastique'),
(11, 'Revue Scientifique'),
(12, 'Conte');

-- --------------------------------------------------------

--
-- Structure de la table `emprunt`
--

CREATE TABLE `emprunt` (
  `id` int(11) NOT NULL,
  `date_deb` date DEFAULT NULL,
  `date_fin` date DEFAULT NULL,
  `id_adherent` int(11) NOT NULL,
  `ref_livre` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Déchargement des données de la table `emprunt`
--

INSERT INTO `emprunt` (`id`, `date_deb`, `date_fin`, `id_adherent`, `ref_livre`) VALUES
(8, '2024-04-15', '2024-04-25', 39, 2);

-- --------------------------------------------------------

--
-- Structure de la table `livre`
--

CREATE TABLE `livre` (
  `ref` int(11) NOT NULL,
  `iban` varchar(255) DEFAULT NULL,
  `titre` varchar(255) DEFAULT NULL,
  `auteur` varchar(255) DEFAULT NULL,
  `langue` varchar(255) DEFAULT NULL,
  `annee` int(11) DEFAULT NULL,
  `id_cat` int(11) NOT NULL,
  `lien_image` varchar(1000) DEFAULT NULL,
  `description` varchar(1000) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Déchargement des données de la table `livre`
--

INSERT INTO `livre` (`ref`, `iban`, `titre`, `auteur`, `langue`, `annee`, `id_cat`, `lien_image`, `description`) VALUES
(1, '978-2871292934', 'One Piece tome 100', 'Eiichiro Oda', 'Français', 1997, 4, 'https://m.media-amazon.com/images/I/91LHaTx8csL._SY466_.jpg', 'Luffy et ses alliés défient Kaido et Big Mom au sommet du dôme où sont rassemblés les principaux acteurs de la bataille en cours ! Mais sont-ils seulement en mesure de vaincre ce duo surpuissant ?! Quel sort ce combat extrême réserve-t-il aux différents protagonistes ?!'),
(2, '978-2840554884', 'Le Chat et les 40 bougies', 'Philippe Geluck', 'Français', 1986, 5, 'https://www.casterman.com/media/cache/couverture_large/casterman_img/Couvertures/9782203222786.jpg', 'Il semble que \"Le Chat et les 40 bougies\" ne soit pas un conte ou une histoire connue. Il est possible que vous ayez mélangé deux éléments différents. \"Le Chat botté\" est un conte de fées classique de Charles Perrault, où un chat rusé aide son maître pauvre à devenir riche et à gagner le cœur d\'une princesse. Quant aux \"40 bougies\", cela pourrait faire référence à un tout autre contexte, comme une fête d\'anniversaire, par exemple. Pourriez-vous clarifier ou donner plus de détails sur ce que vous recherchez ? Je serais heureux de vous aider davantage.'),
(3, '978-2070423201', 'Ça', 'Stephen King', 'Anglais', 1986, 6, 'https://cdn.leslibraires.fr/UId4CuwEJ4Q9kRqG-SV6A6d3UFvgQg6nI0U-cJyvTns/s:337:400/OTk2MTEyOQ.webp', '\"Ça\" est un roman d\'horreur écrit par Stephen King et publié en 1986. L\'histoire se déroule dans la petite ville de Derry, dans le Maine, où un groupe d\'enfants confronte une entité maléfique connue sous le nom de \"Ça\", qui prend la forme de leurs pires peurs, notamment celle d\'un clown appelé Grippe-Sou.\n\nLe roman alterne entre deux périodes : l\'enfance des protagonistes dans les années 1950, où ils font face à \"Ça\" pour la première fois, et leur vie d\'adulte dans les années 1980, lorsque \"Ça\" ressurgit et qu\'ils doivent affronter à nouveau leurs peurs pour le vaincre.\n\n\"Ça\" explore des thèmes profonds tels que l\'amitié, le courage, les traumatismes de l\'enfance et le pouvoir de la peur. Le livre est devenu l\'un des romans les plus emblématiques de Stephen King et a été adapté en une mini-série télévisée en 1990, ainsi qu\'en deux films au cinéma en 2017 et 2019.'),
(4, '978-2070368220', 'Le Petit Prince', 'Antoine de Saint-Exupéry', 'Français', 1943, 1, 'https://pictures.abebooks.com/inventory/15500091271.jpg', 'C\'est l\'histoire intemporelle d\'un jeune prince qui quitte sa petite planète pour explorer d\'autres mondes. En chemin, il rencontre un aviateur échoué dans le désert. À travers leurs conversations, le Petit Prince partage ses observations sur la nature humaine, l\'amour, l\'amitié et la solitude. Le livre aborde des thèmes profonds tels que l\'importance de l\'imagination, la beauté de l\'enfance et la nécessité de voir au-delà de l\'apparence pour découvrir la véritable essence des choses. C\'est un conte poétique et philosophique qui continue à captiver les lecteurs de tous âges à travers le monde.'),
(5, '978-2266159888', 'Le Seigneur des Anneaux - La fraternité de l\'anneau', 'J.R.R. Tolkien', 'Anglais', 1954, 7, 'https://www.gallimard-jeunesse.fr/assets/media/cache/cover_medium/gallimard_img/image/J02275.jpg', 'Dans \"Le Seigneur des Anneaux - La Fraternité de l\'Anneau\" de J.R.R. Tolkien, Frodo Baggins, un hobbit paisible, hérite d\'un anneau mystérieux doté de grands pouvoirs. Avec l\'aide de ses amis hobbits, Sam, Merry et Pippin, ainsi que du magicien Gandalf et d\'autres compagnons, Frodo entreprend un voyage périlleux pour détruire l\'Anneau unique, forgé par le Seigneur Sombre Sauron. Leur quête les conduit à travers des contrées dangereuses et des rencontres avec des créatures fantastiques. Ils doivent faire face à de nombreux obstacles et dangers, notamment les serviteurs de Sauron, les Nazgûls. Le livre explore des thèmes de courage, d\'amitié, de sacrifice et de lutte contre le mal alors que la Fraternité de l\'Anneau se bat pour sauver la Terre du Milieu de la domination de Sauron.'),
(6, '978-2070454535', 'Les Fleurs du Mal', 'Charles Baudelaire', 'Français', 1857, 8, 'https://catalogue.immateriel.fr/resources/4c/c7/79b2d3142b7a66be86a0fe8d88d71f8357b35e0d3ccdf413f5448958aa4d.png', 'Les Fleurs du Mal\" est un recueil de poésie majeur écrit par Charles Baudelaire, publié pour la première fois en 1857. Cette œuvre emblématique de la littérature française explore les profondeurs de l\'âme humaine à travers des poèmes qui abordent des thèmes tels que l\'amour, la mort, la beauté, la modernité, la décadence et la dualité de l\'homme. Baudelaire utilise une variété de formes poétiques et un langage riche pour exprimer ses observations sur la condition humaine et la société de son époque. Malgré sa controverse initiale en raison de son contenu jugé immoral, \"Les Fleurs du Mal\" est aujourd\'hui reconnu comme un chef-d\'œuvre de la poésie symboliste et a profondément influencé la littérature française et mondiale.'),
(7, '978-4692250140', 'The Complete Weird Tale of H.P.Lovecraft', 'H.P.Lovecraft', 'anglais', 1997, 1, 'https://products-images.di-static.com/image/h-p-lovecraft-the-complete-weird-tales-of-h/9781473215320-475x500-1.jpg', '\"The Complete Weird Tales of H.P. Lovecraft\" est une collection exhaustive des œuvres de l\'écrivain américain H.P. Lovecraft, qui était célèbre pour ses contributions au genre de l\'horreur et du fantastique. Lovecraft est surtout connu pour sa création du mythe de Cthulhu, un panthéon de divinités cosmiques et de forces surnaturelles qui existent au-delà de la compréhension humaine. Ses histoires explorent souvent les thèmes de l\'horreur cosmique, de l\'aliénation, de la folie et de l\'incompréhensibilité de l\'univers. \"The Complete Weird Tales\" rassemble ses contes les plus célèbres, y compris des classiques comme \"The Call of Cthulhu\", \"At the Mountains of Madness\" et \"The Shadow over Innsmouth\", offrant aux lecteurs une plongée complète dans l\'univers sombre et fascinant de Lovecraft.'),
(8, '978-5492229987', 'Neph et Shéa I La Fuite', 'Aline Wheeler', 'Français', 2018, 1, 'https://m.media-amazon.com/images/I/81yEeP7xEhL._AC_UF1000,1000_QL80_.jpg', '\"Neph et Shéa I: La Fuite\" est le premier tome d\'une série de romans de fantasy écrits par l\'auteur français Fabien Clavel. L\'histoire se déroule dans un univers imaginaire où la magie et les créatures fantastiques existent. Le récit suit les aventures de Neph, un jeune garçon qui découvre qu\'il possède des pouvoirs magiques, et Shéa, une fille mystérieuse qui fuit un destin tragique. Ensemble, ils entreprennent un voyage dangereux pour échapper à leurs poursuivants et découvrir la vérité sur leurs origines. Sur fond de complots, de trahisons et de mystères, \"La Fuite\" plonge les lecteurs dans un monde riche en aventures et en surprises, où les personnages doivent affronter leurs peurs et leurs ennemis pour survivre.'),
(9, '978-963317966', 'Jujutsu Kaisen tome 07', 'Gege Akutami', 'Français', 2017, 4, 'https://m.media-amazon.com/images/I/71derxzhqzL._SY466_.jpg', 'Le tome 7 de \"Jujutsu Kaisen\" est le septième volume du manga écrit et illustré par Gege Akutami. Dans ce volume, l\'histoire continue de suivre Yuji Itadori, un lycéen qui a ingéré un objet maudit pour sauver ses amis. Il est maintenant un hôte pour un démon puissant et est enrôlé de force dans une école de jujutsu, où il apprend à contrôler ses pouvoirs et à combattre les malédictions. Dans ce tome, Yuji et ses camarades continuent leur entraînement et leurs missions contre les malédictions. De nouveaux défis et ennemis surgissent, mettant à l\'épreuve leurs compétences et leur détermination. Le tome 7 explore également davantage le passé des personnages principaux, dévoilant des secrets et des motivations cachées. C\'est un volume rempli d\'action, de suspense et de développements de personnages qui raviront les fans de la série.'),
(13, '978-5437770192', 'Jujutsu Kaisen tome 09', 'Gege Akutami', 'Français', 2018, 4, 'https://www.babelio.com/couv/CVT_Jujutsu-Kaisen-tome-9--Mort-prematuree_2151.jpg', 'Dans le tome 9 de \"Jujutsu Kaisen\", Yuji et ses alliés poursuivent leur lutte contre les malédictions. De nouveaux ennemis redoutables apparaissent, mettant à l\'épreuve leur courage et leurs compétences. Le volume approfondit également les histoires personnelles des personnages et révèle des secrets sur l\'univers du manga. Avec des combats palpitants et des moments de tension, ce tome offre une lecture immersive et excitante pour les fans de la série.'),
(16, '978-1644298882', 'Harry Potter L’ordre du Phoenix', 'J.K.Rowling', 'Anglais', 2003, 1, 'https://www.antretemps.com/upload/image/harry-potter-et-l-ordre-du-phenix-p-image-35028-grande.jpg', 'Dans \"Harry Potter et l\'Ordre du Phénix\", le cinquième tome de la série, Harry Potter fait face à de nouveaux défis alors qu\'il s\'oppose à Voldemort et forme secrètement l\'Armée de Dumbledore. Malgré le scepticisme du Ministère de la Magie, Harry cherche à préparer ses pairs à la menace grandissante. Le livre explore également le passé mystérieux de Voldemort, tout en mettant en avant des thèmes de courage et de résistance contre l\'oppression.'),
(19, '978-1587919417', 'Atlas Shrugged', 'Ayn Rand', 'Anglais', 1957, 1, 'https://m.media-amazon.com/images/I/612URtxh-qL._AC_UF1000,1000_QL80_.jpg', '\"Atlas Shrugged\" est un roman de l\'écrivaine et philosophe américaine Ayn Rand, publié en 1957. L\'histoire se déroule dans un futur dystopique où l\'économie est en crise et où les gouvernements exercent un contrôle accru sur l\'industrie et la société. Le roman suit les vies entrelacées de plusieurs personnages, dont Dagny Taggart, une dirigeante d\'une compagnie ferroviaire, et John Galt, un mystérieux innovateur et philosophe. Alors que le monde s\'effondre autour d\'eux, ces personnages entreprennent un voyage pour découvrir la vérité sur la disparition progressive des personnes les plus brillantes et les plus talentueuses de la société. \"Atlas Shrugged\" explore les thèmes de l\'individualisme, du capitalisme, de la liberté individuelle et de la morale de l\'égoïsme rationnel, mettant en avant les idées philosophiques d\'Ayn Rand, notamment son concept d\'objectivisme. Le roman a suscité des débats passionnés et reste un ouvrage influent dans la littérature et la philosophie américaines.'),
(20, '978-5182545990', 'Les Misérables', 'Victor Hugo', 'Français', 1862, 1, 'https://c8.alamy.com/compfr/2bd223k/premiere-de-couverture-victor-hugo-les-miserables-tome-8-jean-valjean-novembre-1934-2bd223k.jpg', '\"Les Misérables\" est un roman monumental écrit par l\'écrivain français Victor Hugo, publié en 1862. L\'histoire se déroule en France au XIXe siècle et suit les destins entrelacés de plusieurs personnages, principalement Jean Valjean, un ancien bagnard qui cherche à se racheter après avoir été libéré pour vol de pain, et l\'inspecteur Javert, déterminé à le ramener en prison. Le roman explore une multitude de thèmes, notamment la justice, la rédemption, l\'amour, l\'amitié et la lutte pour la dignité humaine. À travers les personnages de Valjean, Cosette, Fantine, Marius, Éponine et d\'autres, Victor Hugo peint un tableau vibrant de la société française de l\'époque, en mettant en lumière les injustices sociales, la pauvreté et les aspirations à la liberté. \"Les Misérables\" est non seulement un récit poignant et captivant, mais aussi une œuvre qui incarne les valeurs humanistes et qui a profondément influencé la littérature et la conscience sociale à travers le monde.'),
(21, '978-742141241', 'Le Prince', 'Nicolas Machiavel', 'Italien', 1532, 1, 'https://m.media-amazon.com/images/I/71+EDqvCBCL._AC_UF1000,1000_QL80_.jpg', '\"Le Prince\" est un traité politique écrit par Niccolò Machiavel au XVIe siècle, où il explore les principes de gouvernance et de maintien du pouvoir. Machiavel conseille aux dirigeants d\'utiliser tous les moyens nécessaires pour maintenir leur autorité, même si cela implique la ruse et la cruauté. Bien que controversé, ce texte reste une référence importante en politique.'),
(22, '978-9774423147', 'L’Homme qui Rit', 'Victor Hugo', 'Français', 1869, 1, 'https://pictures.abebooks.com/inventory/7679078556.jpg', '\"L\'Homme qui Rit\" est un roman écrit par l\'écrivain français Victor Hugo, publié en 1869. L\'histoire se déroule en Angleterre au XVIIIe siècle et suit les destins de plusieurs personnages, principalement celui de Gwynplaine, un homme défiguré par un horrible sourire figé sur son visage depuis l\'enfance. Recueilli par des forains, Gwynplaine devient une attraction de foire en raison de sa déformation faciale.\n\nLe roman explore les thèmes de l\'injustice sociale, de l\'amour, de la beauté intérieure et de la quête de l\'identité. Il dépeint également les inégalités et les abus subis par les plus démunis dans la société de l\'époque. \"L\'Homme qui Rit\" est une œuvre profonde et poignante qui offre une réflexion sur la condition humaine et qui a inspiré de nombreuses adaptations théâtrales et cinématographiques.');

-- --------------------------------------------------------

--
-- Structure de la table `recuperation_mdp`
--

CREATE TABLE `recuperation_mdp` (
  `id_player` int(11) NOT NULL,
  `cleRecup` int(11) NOT NULL,
  `heureDate_validiteLien` datetime NOT NULL,
  `idUserAdherent` int(11) NOT NULL,
  `lienUtilise` int(1) NOT NULL DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Déchargement des données de la table `recuperation_mdp`
--

INSERT INTO `recuperation_mdp` (`id_player`, `cleRecup`, `heureDate_validiteLien`, `idUserAdherent`, `lienUtilise`) VALUES
(3, 3093717, '2024-04-15 00:16:20', 39, 1);

--
-- Index pour les tables déchargées
--

--
-- Index pour la table `adherent`
--
ALTER TABLE `adherent`
  ADD PRIMARY KEY (`id`);

--
-- Index pour la table `categorie`
--
ALTER TABLE `categorie`
  ADD PRIMARY KEY (`id`);

--
-- Index pour la table `emprunt`
--
ALTER TABLE `emprunt`
  ADD PRIMARY KEY (`id`),
  ADD KEY `id_adherent` (`id_adherent`),
  ADD KEY `ref_livre` (`ref_livre`);

--
-- Index pour la table `livre`
--
ALTER TABLE `livre`
  ADD PRIMARY KEY (`ref`),
  ADD KEY `id_cat` (`id_cat`);

--
-- Index pour la table `recuperation_mdp`
--
ALTER TABLE `recuperation_mdp`
  ADD PRIMARY KEY (`id_player`),
  ADD KEY `idUserAdherent` (`idUserAdherent`);

--
-- AUTO_INCREMENT pour les tables déchargées
--

--
-- AUTO_INCREMENT pour la table `adherent`
--
ALTER TABLE `adherent`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=42;

--
-- AUTO_INCREMENT pour la table `categorie`
--
ALTER TABLE `categorie`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT pour la table `emprunt`
--
ALTER TABLE `emprunt`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT pour la table `livre`
--
ALTER TABLE `livre`
  MODIFY `ref` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=27;

--
-- AUTO_INCREMENT pour la table `recuperation_mdp`
--
ALTER TABLE `recuperation_mdp`
  MODIFY `id_player` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- Contraintes pour les tables déchargées
--

--
-- Contraintes pour la table `emprunt`
--
ALTER TABLE `emprunt`
  ADD CONSTRAINT `emprunt_ibfk_1` FOREIGN KEY (`id_adherent`) REFERENCES `adherent` (`id`),
  ADD CONSTRAINT `emprunt_ibfk_2` FOREIGN KEY (`ref_livre`) REFERENCES `livre` (`ref`);

--
-- Contraintes pour la table `livre`
--
ALTER TABLE `livre`
  ADD CONSTRAINT `livre_ibfk_1` FOREIGN KEY (`id_cat`) REFERENCES `categorie` (`id`);

--
-- Contraintes pour la table `recuperation_mdp`
--
ALTER TABLE `recuperation_mdp`
  ADD CONSTRAINT `idUserAdherent` FOREIGN KEY (`idUserAdherent`) REFERENCES `adherent` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
