-- -----------------------------------
-- Schema db_bourvence
-- -----------------------------------
DROP SCHEMA IF EXISTS `db_bourvence` ;

-- -----------------------------------------------------
-- Schema db_bourvence
-- -----------------------------------------------------
CREATE SCHEMA IF NOT EXISTS `db_bourvence` DEFAULT CHARSET utf8 ;
USE `db_bourvence` ;

-- -----------------------------------------------------
-- Table `db_bourvence`.`appellations`
-- -----------------------------------------------------
DROP TABLE IF EXISTS `db_bourvence`.`appellations` ;

CREATE TABLE IF NOT EXISTS `db_bourvence`.`appellations` (
  `appell_id` INT(11) NOT NULL AUTO_INCREMENT,
  `appell_name` VARCHAR(45) NOT NULL,
  PRIMARY KEY (`appell_id`))
ENGINE = InnoDB
DEFAULT CHARSET = utf8;

-- -----------------------------------------------------
-- Table `db_bourvence`.`regions`
-- -----------------------------------------------------
DROP TABLE IF EXISTS `db_bourvence`.`regions` ;

CREATE TABLE IF NOT EXISTS `db_bourvence`.`regions` (
  `region_id` INT(11) NOT NULL AUTO_INCREMENT,
  `region_name` VARCHAR(45) NOT NULL,
  PRIMARY KEY (`region_id`))
ENGINE = InnoDB
DEFAULT CHARSET = utf8;

-- -----------------------------------------------------
-- Table `db_bourvence`.`actions`
-- -----------------------------------------------------
DROP TABLE IF EXISTS `db_bourvence`.`actions` ;

CREATE TABLE IF NOT EXISTS `db_bourvence`.`actions` (
  `action_id` INT(11) NOT NULL AUTO_INCREMENT,
  `action_name` VARCHAR(30) NOT NULL,
  `action_slug` VARCHAR(30) NOT NULL,
  PRIMARY KEY (`action_id`))
ENGINE = InnoDB
DEFAULT CHARSET = utf8;

-- -----------------------------------------------------
-- Table `db_bourvence`.`permiss`
-- -----------------------------------------------------
DROP TABLE IF EXISTS `db_bourvence`.`permiss` ;

CREATE TABLE IF NOT EXISTS `db_bourvence`.`permiss` (
  `perm_id` INT(11) NOT NULL AUTO_INCREMENT,
  `min_level` INT(11) NOT NULL,
  `action_id` INT(11) NOT NULL,
  PRIMARY KEY (`perm_id`),
  CONSTRAINT `fk_permiss_actions`
    FOREIGN KEY (`action_id`)
    REFERENCES `db_bourvence`.`actions` (`action_id`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB
DEFAULT CHARSET = utf8;

-- -----------------------------------------------------
-- Table `db_bourvence`.`roles`
-- -----------------------------------------------------
DROP TABLE IF EXISTS `db_bourvence`.`roles` ;

CREATE TABLE IF NOT EXISTS `db_bourvence`.`roles` (
  `role_id` INT(11) NOT NULL AUTO_INCREMENT,
  `role_name` VARCHAR(45) NOT NULL,
  `role_level` INT(11) NOT NULL,
  PRIMARY KEY (`role_id`))
ENGINE = InnoDB
DEFAULT CHARSET = utf8;

-- -----------------------------------------------------
-- Table `db_bourvence`.`users`
-- -----------------------------------------------------
DROP TABLE IF EXISTS `db_bourvence`.`users` ;

CREATE TABLE IF NOT EXISTS `db_bourvence`.`users` (
  `user_id` INT(11) NOT NULL AUTO_INCREMENT,
  `user_login` VARCHAR(20) NOT NULL,
  `user_mdp` VARCHAR(255) NOT NULL,
  `role_id` INT(11) NOT NULL,
  PRIMARY KEY (`user_id`),
  CONSTRAINT `fk_users_roles`
    FOREIGN KEY (`role_id`)
    REFERENCES `db_bourvence`.`roles` (`role_id`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB
DEFAULT CHARSET = utf8;

-- -----------------------------------------------------
-- Table `db_bourvence`.`contacts`
-- -----------------------------------------------------
DROP TABLE IF EXISTS `db_bourvence`.`contacts` ;

CREATE TABLE IF NOT EXISTS `db_bourvence`.`contacts` (
  `contact_id` INT(11) NOT NULL AUTO_INCREMENT,
  `contact_name` VARCHAR(20) NOT NULL,
  `contact_prenom` VARCHAR(20) NOT NULL,
  `contact_email` VARCHAR(50) NOT NULL,
  `contact_msg` TEXT NOT NULL,
  `date_msg` Date NOT NULL,
  PRIMARY KEY (`contact_id`))
ENGINE = InnoDB
DEFAULT CHARSET = utf8;

-- -----------------------------------------------------
-- Table `db_bourvence`.`stats`
-- -----------------------------------------------------
DROP TABLE IF EXISTS `db_bourvence`.`stats` ;

CREATE TABLE IF NOT EXISTS `db_bourvence`.`stats` (
  `stat_id` INT(11) NOT NULL AUTO_INCREMENT,
  `web_user_id` VARCHAR(20) NOT NULL,
  `web_user_visit` VARCHAR(20) NOT NULL,
  PRIMARY KEY (`stat_id`))
ENGINE = InnoDB
DEFAULT CHARSET = utf8;

-- -----------------------------------------------------
-- Table `db_bourvence`.`articles`
-- -----------------------------------------------------
DROP TABLE IF EXISTS `db_bourvence`.`posts` ;

CREATE TABLE IF NOT EXISTS `db_bourvence`.`posts` (
  `post_id` INT(11) NOT NULL AUTO_INCREMENT,
  `post_title` VARCHAR(45) NOT NULL,
  `post_text` TEXT NOT NULL,
  `post_img` VARCHAR(45) NOT NULL,
  `post_publie` TINYINT(4) NOT NULL,
  `post_date` Date NOT NULL,
  `user_id` INT(11) NOT NULL,
  PRIMARY KEY (`post_id`),
  CONSTRAINT `fk_posts_users`
    FOREIGN KEY (`user_id`)
    REFERENCES `db_bourvence`.`users` (`user_id`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB
DEFAULT CHARSET = utf8;

-- -----------------------------------------------------
-- Table `db_bourvence`.`contenants`
-- -----------------------------------------------------
DROP TABLE IF EXISTS `db_bourvence`.`contenants` ;

CREATE TABLE IF NOT EXISTS `db_bourvence`.`contenants` (
  `cont_id` INT(11) NOT NULL AUTO_INCREMENT,
  `cont_name` VARCHAR(45) NOT NULL,
  PRIMARY KEY (`cont_id`))
ENGINE = InnoDB
DEFAULT CHARSET = utf8;

-- -----------------------------------------------------
-- Table `db_bourvence`.`colors`
-- -----------------------------------------------------
DROP TABLE IF EXISTS `db_bourvence`.`colors` ;

CREATE TABLE IF NOT EXISTS `db_bourvence`.`colors` (
  `color_id` INT(11) NOT NULL AUTO_INCREMENT,
  `color_name` VARCHAR(45) NOT NULL,
  PRIMARY KEY (`color_id`))
ENGINE = InnoDB
DEFAULT CHARSET = utf8;

-- -----------------------------------------------------
-- Table `db_bourvence`.`families`
-- -----------------------------------------------------
DROP TABLE IF EXISTS `db_bourvence`.`families` ;

CREATE TABLE IF NOT EXISTS `db_bourvence`.`families` (
  `family_id` INT(11) NOT NULL AUTO_INCREMENT,
  `family_name` VARCHAR(45) NOT NULL,
  PRIMARY KEY (`family_id`))
ENGINE = InnoDB
DEFAULT CHARSET = utf8;

-- -----------------------------------------------------
-- Table `db_bourvence`.`fournisseurs`
-- -----------------------------------------------------
DROP TABLE IF EXISTS `db_bourvence`.`fournisseurs` ;

CREATE TABLE IF NOT EXISTS `db_bourvence`.`fournisseurs` (
  `frs_id` INT(11) NOT NULL AUTO_INCREMENT,
  `frs_name` VARCHAR(45) NOT NULL,
  `frs_img` VARCHAR(100) NULL,
  `frs_desc` TEXT NULL,
  `frs_site_web` VARCHAR(45) NULL,
  PRIMARY KEY (`frs_id`))
ENGINE = InnoDB
DEFAULT CHARSET = utf8;

-- -----------------------------------------------------
-- Table `db_bourvence`.`products`
-- -----------------------------------------------------
DROP TABLE IF EXISTS `db_bourvence`.`products` ;

CREATE TABLE IF NOT EXISTS `db_bourvence`.`products` (
  `prod_id` INT(11) NOT NULL,
  `prod_name` VARCHAR(45) NOT NULL,
  `prod_desc` TEXT NOT NULL,
  `prod_img` VARCHAR(100) NOT NULL,
  `prod_actif` TINYINT(4) NOT NULL,
  `family_id` INT(11) NOT NULL,
  `appell_id`INT(11) Null,
  `region_id` INT(11) Null,
  `frs_id` INT(11) NOT NULL,
  `color_id` INT(11),
  `cont_id`INT(11) Null,
  PRIMARY KEY (`prod_id`),
  CONSTRAINT `fk_products_families`
    FOREIGN KEY (`family_id`)
    REFERENCES `db_bourvence`.`families` (`family_id`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION,
  CONSTRAINT `fk_products_appellations`
    FOREIGN KEY (`appell_id`)
    REFERENCES `db_bourvence`.`appellations` (`appell_id`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION,
  CONSTRAINT `fk_products_regions`
    FOREIGN KEY (`region_id`)
    REFERENCES `db_bourvence`.`regions` (`region_id`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION,
  CONSTRAINT `fk_products_fournisseurs`
    FOREIGN KEY (`frs_id`)
    REFERENCES `db_bourvence`.`fournisseurs` (`frs_id`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION,
  CONSTRAINT `fk_products_colors`
    FOREIGN KEY (`color_id`)
    REFERENCES `db_bourvence`.`colors` (`color_id`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION,
  CONSTRAINT `fk_products_contenants`
    FOREIGN KEY (`cont_id`)
    REFERENCES `db_bourvence`.`contenants` (`cont_id`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB
DEFAULT CHARSET = utf8;

-- -------------------------------------------------
-- Insertion dans les tables
-- -------------------------------------------------

/* Table appellations*/
INSERT INTO appellations (appell_id, appell_name) VALUES
("0", "Non définie"),
("1", "Aloxe Corton"),
("2", "Bandol"),
("3", "Beaujolais"),
("4", "Beaumes de Venise"),
("5", "Beaune"),
("6", "Blaye Côtes de Bordeaux"),
("7", "Bordeaux"),
("8", "Bourgogne Aligoté"),
("9", "Bourgogne Chardonnay"),
("10", "Bourgogne Côtes Chalonnaises"),
("11", "Bourgogne Pinot Noir"),
("12", "Brouilly"),
("13", "Cairanne"),
("14", "Chablis"),
("15", "Chablis 1er Cru"),
("16", "Champagne"),
("17", "Chateauneuf du Pape"),
("18", "Chinon"),
("19", "Chorey les Beaunes"),
("20", "Condrieu"),
("21", "Corbières"),
("22", "Côte Rôtie"),
("23", "Côteaux Varois"),
("24", "Côtes Catalanes"),
("25", "Côtes de Provence"),
("26", "Côtes du Rhône"),
("27", "Côtes du Rhône Villages"),
("28", "Côtes du Rhône Villages Chusclan"),
("29", "Côtes du Rhône Villages St Gervais"),
("30", "Côtes du Roussillon"),
("31", "Crémant de Bourgogne"),
("32", "Crozes Hermitage"),
("33", "Fleurie"),
("34", "Gigondas"),
("35", "Graves"),
("36", "Haut-Médoc"),
("37", "IGP Côtes de Gascogne"),
("38", "IGP Gard"),
("39", "IGP Landes"),
("40", "IGP Loire"),
("41", "IGP Méditerranée"),
("42", "IGP OC"),
("43", "IGP Var"),
("44", "Ladoix"),
("45", "Lubéron"),
("46", "Macon La Roche"),
("47", "Macon Milly"),
("48", "Madiran"),
("49", "Marcillac"),
("50", "Mareuil"),
("51", "Minervois"),
("52", "Montagne St Emilion"),
("53", "Montagny 1er Cru"),
("54", "Morgon"),
("55", "Moulin à Vent"),
("56", "Pessac-Léognan"),
("57", "Petit Chablis"),
("58", "Pouilly Fuissé"),
("59", "Pouilly Fumé"),
("60", "Puisseguin St Emilion"),
("61", "Rasteau"),
("62", "Régnié"),
("63", "Reuilly"),
("64", "Rully"),
("65", "Saint Véran"),
("66", "Sancerre"),
("67", "Santenay"),
("68", "Saumur Champigny"),
("69", "Sauternes"),
("70", "Savigny Les Beaunes"),
("71", "St Emilion"),
("72", "St Emilion Grand Cru"),
("73", "St Estèphe"),
("74", "St Joseph"),
("75", "St Nicolas de Bourgueuil"),
("76", "St Péray"),
("77", "Vacqueras"),
("78", "Vin de France");

-- -------------------------------------------------
/* Table régions */
INSERT INTO regions (region_id, region_name) VALUES
("0", "Non définie"),
("1", "Afrique du Sud"),
("2", "Allemagne"),
("3", "Argentine"),
("4", "Armagnacs"),
("5", "Australie"),
("6", "Beaujolais"),
("7", "Bières"),
("8", "Bordelais"),
("9", "Bouchons"),
("10", "Bourgogne"),
("11", "Calvados"),
("12", "Champagne"),
("13", "Chili"),
("14", "Cognacs"),
("15", "Cornichons"),
("16", "Crèmes"),
("17", "Eaux de Vie"),
("18", "Espagne"),
("19", "Etats-Unis"),
("20", "France"),
("21", "Gins"),
("22", "Hongrie"),
("23", "Italie"),
("24", "Languedoc"),
("25", "Liban"),
("26", "Liqueurs"),
("27", "Loire"),
("28", "Maroc"),
("29", "Nouvelle Zélande"),
("30", "Portos"),
("31", "Portugal"),
("32", "Provence"),
("33", "Rhône"),
("34", "Rhums"),
("35", "Roussillon"),
("36", "Sud-Ouest"),
("37", "Tartinables"),
("38", "Téquilas"),
("39", "Verrerie"),
("40", "Vinaigres"),
("41", "Vodkas"),
("42", "Whiskies");

-- ----------------------------------------------------------
/* Table Rôles */
INSERT INTO roles (role_id, role_name, role_level) VALUES
(1, "Admin", 2),
(2, "Utilisateur", 1),
(3, "Aucun", 0);


-- ----------------------------------------------------------
/* Table Users */
INSERT INTO users (user_id, user_login, user_mdp, role_id) VALUES
(1, "RESPONSABLE", "$2y$10$o26fDh0Y7uAMTTSiWsrewuy6WASiAQBFGD2dDWouzRdJDCJSZfVsK", 1),
(2, "SALARIE", "$2y$10$U6GtEQKdvCJuWR6JQ6DLXO3OBisFjDDM2/buMaXS8iywfeXKh1dba", 2);


-- ----------------------------------------------------------
/* Table Actions */
INSERT INTO actions (action_id, action_name, action_slug) VALUES
(1, "Création d'un Post", "post/InsertPost"),
(2, "Liste des Posts", "post/listPost"),
(3, "Création d'un Produit", "product/insertProduct"),
(4, "Liste des Produits", "product/listProduct"),
(5, "Statistiques", "stats/stats");


-- ----------------------------------------------------------
/* Table permissions */
INSERT INTO permiss (perm_id, min_level, action_id) VALUES
(1, 1, 1),
(2, 1, 2),
(3, 2, 3),
(4, 2, 4),
(5, 2, 5);

- ----------------------------------------------------------
/* Table contenants */
INSERT INTO contenants (cont_id, cont_name) VALUES
("0", "Non définie"),
("1", "1 L"),
("2", "180 gr"),
("3", "20 cl"),
("4", "25 cl"),
("5", "26 cl"),
("6", "27 cl"),
("7", "3 L"),
("8", "33 cl"),
("9", "35 cl"),
("10", "36 cl"),
("11", "37.5 cl"),
("12", "48 cl"),
("13", "50 cl"),
("14", "65 cl"),
("15", "70 cl"),
("16", "75 cl"),
("17", "80 gr"),
("18", "Jéroboam"),
("19", "Magnum");

-- ----------------------------------------------------------
/* Table colors */
INSERT INTO colors (color_id, color_name) VALUES
("0", "Non définie"),
("1", "Ambrée"),
("2", "Blanc"),
("3", "Blanche"),
("4", "Blonde"),
("5", "Brune"),
("6", "IPA"),
("7", "Rosé"),
("8", "Rouge"),
("9", "Triple");

-- ----------------------------------------------------------
/* Table families */
INSERT INTO families (family_id, family_name) VALUES
("10", "Accessoires"),
("9", "Alimentation"),
("4", "Bag-In-Box"),
("8", "Bières"),
("5", "Champagnes"),
("6", "Effervescents"),
("7", "Spiritueux"),
("2", "Vins Blancs"),
("3", "Vins Rosés"),
("1", "Vins Rouges");

-- ----------------------------------------------------------
/* Table Fournisseurs */
INSERT INTO fournisseurs (frs_id, frs_name, frs_img, frs_desc, frs_site_web) VALUES
("1","Alain Geoffroy","geoffroy.jpg","Chablis et son univers sont à mi-chemin entre Beaune et Paris, sur la route du soleil. Nous y découvrons son vignoble, aux portes de la Bourgogne.<br/>Honoré Geoffroy, vers 1850, étendit l’exploitation sur les communes de 
Beine et la Chapelle Vaupelteigne, au coeur du vignoble chablisien.<br/>Alain Geoffroy fit passer la propriété au niveau de Domaine. Digne héritier de toutes les générations, il a su lui conserver le caractère familial et traditionnel.<br/>Beaucoup de 
récompenses ont mis à l’honneur nos vins. Avec 50 hectares en production, toute la famille oeuvre au développement du Domaine et s’est entourée d’une équipe dynamique pour produire, dans le respect de la tradition, des vins de Chablis frais et fruités avec une 
belle empreinte minérale.<br/>La vinification se fait en cuves inox pour conserver fraîcheur et typicité aux vins de Chablis. Et les vins issus de vieilles vignes sont vinifiés en fûts de chêne. La mise en bouteille se fait exclusivement au Domaine.<br/>Issus 
du cépage Chardonnay, les Chablis se distinguent par leur finesse, leur caractère minéral et leur longueur en bouche.<br/>Sereins et tranquilles dans votre cave, nos vins accepteront avec bonheur de vieillir quelques années.","https://www.chablis-geoffroy.com/
fr/"),
("2","Arnaud de Villeneuve","arnaud-de-villeneuve.jpg","Notre Maison, puise sa force dans les racines d’une histoire plus que centenaire, au cours de laquelle femmes et hommes se sont transmis passion et amour pour leur territoire et leurs vignes.<br/>Afin de 
faire fructifier cet héritage et de le transmettre à notre tour aux générations futures, nous sommes engagés dans une démarche de Responsabilité Sociétale (RSE) qui nous conduit à agir, au quotidien, en faveur d’une viticulture respectueuse de l’environnement 
et de la biodiversité.<br/>Chacun de nos vins est ainsi élaboré pour transmettre une partie de cette histoire avec la volonté d’offrir un plaisir immédiat à nos clients. Pour y parvenir, nous restons toujours à l’écoute de leurs goûts et de leurs envies.",
"https://arnauddevilleneuve.com/"),
("3","Bayerische Glaswerke Gmbh","","",""),
("4","Catrice Gourmet ","","",""),
("5","Cellier du Perigord","","",""),
("6","Champagne Jean-Noël Haton","haton.jpg","L’histoire de la Maison de Champagne Haton commence en 1610 sous le règne de LOUIS XIII avec l’acquisition des premières parcelles à Damery par François Haton. En 1928, Octave Haton donne une nouvelle impulsion à 
l’exploitation familiale en débutant la vinification de ses propres champagnes. Fière de ses racines et tournée vers l’avenir, la famille Haton incarne presque quatre siècles d’histoire champenoise.","https://www.champagne-haton.com/fr/"),
("7","Champagne Ruinart","","",""),
("8","Champagne Soutiran","soutiran.jpg","Une Maison artisanale :<br/>nous explorons et composons désormais à quatre mains…<br/>Aujourd’hui, c’est en tandem que nous façonnons chacune de nos cuvées. Rien n’est laissé au hasard : de nos vignes à l’élaboration et 
l’assemblage de nos vins de Champagne.<br/>Reflet de notre histoire et de nos convictions, nos créations cherchent à sublimer un terroir exceptionnel. Nous signons des cuvées rares et racées.<br/>Nos Champagnes SOUTIRAN Grand Cru s’affirment par leur 
tempérament, leur profondeur et leur belle singularité. Élégants et charmeurs, nos vins de Champagne procurent un grand plaisir en toute occasion. Ils s’adressent autant aux palais des explorateurs d’un jour qu’aux amateurs les plus avertis.","https://www.
soutiran.com/fr/"),
("9","Champagnes et Châteaux France","","",""),
("10","Château de Nages - Famille Gassier","","",""),
("11","Chef et Sommelier","","",""),
("12","Comptoir Des Sommeliers","","",""),
("13","Domaine Clavel","clavel.jpg","Descendante d’une famille qui travaille la vigne depuis 1640, Claire Clavel Femme Vigneronne oeuvre au quotidien pour continuer l’histoire de plusieurs générations. Epaulée par son père Denis et pouvant compter sur une 
équipe de femmes et d’hommes qui sont la richesse de son entreprise, Claire conduit les 80 hectares de son domaine à la recherche de toujours plus de caractères, d’authenticité et de convivialité. La richesse d’une entreprise, ce sont les hommes et les femmes 
qui sont la richesse de son entreprise, Claire conduit les 80 hectares de son domaine à la recherche de toujours plus de caractères, d’authenticité et de convivialité.","https://www.domaineclavel.com/"),
("14","Domaine Dalmeran","","",""),
("15","Domaine de La Goujonne","goujonne.jpg","L'authenticité d'un domaine familial : aucun membre de la famille Kraus n'échappe à la passion du vin qui se transmet de génération en génération! Sous le regard bienveillant des fondateurs, Magali et Denis, 
l'équipe produit en Bio des vins variés qui expriment tout le carctère de l'arrière-pays varois.<br\>Le vignoble et réparti sur les communes de Tourves et de Cabasse, et les chais installés au pied de la montagne de la Loube.","https://domaine-la-goujonne.fr/"),
("16","Domaine Dubost ","","",""),
("17","Domaine La Chretienne","chretienne.jpg","19 hectares de vignes sont répartis sur les communes de Saint Cyr sur Mer, La cadière et le Castellet. De ces parcelles sont produits : 12% de blancs, 40% de rouges et 48% de rosés. Les cépages pour les Rosés et 
Rouges sont le Grenache Cinsault, Carignan et Mourvèdre.<br\>Les cépages pour les Blancs sont la Clairette et l’Ugni blanc.<br\>Les sols sont principalement argilocalcaires : labourés dès le premier jour, nous leur prêtons une attention particulière. Ils sont 
amendés avec des fumiers de moutons, cochons et poules. Nos interventions saisonnières sont liées au climat. Nous n’utilisons aucun herbicide depuis toujours.<br\>Notre philosophie est la pratique de l’agriculture régénérative, ( en savoir plus )  dont 
l’objectif est d’augmenter la biodiversité. Nous revendiquons le fait de ne pas avoir de label ou de certification.","https://la-chretienne-vin-bandol.fr/"),
("18","Château de La Greffiere","greffiere.jpg","Nous sommes installés sur la commune de La Roche Vineuse, dans le Mâconnais, au sud de la Bourgogne. Cette région très vallonnée abrite différentes appellations comme « Bourgogne Aligoté » ou « Mâcon La 
Roche-Vineuse ». Nous travaillons les quatre cépages bourguignons « Chardonnay » – « Aligoté » pour les blancs et « Pinot noir » – « Gamay » pour les rouges. Ceux-ci ne sont pas implantés par hasard, ils conviennent à l’élaboration de vins de qualité sur nos 
terroirs si précieux. Comme le prouvent les différentes A.O.C. présentes dans notre région, ces cépages développent leurs caractéristiques et offrent une gamme de vins tout aussi différents qu’élégants, « Bourgogne », « Saint Véran ». Grâce à cette situation 
géographique privilégiée, nous vous proposons au domaine pas moins de huit appellations.","https://chateaudelagreffiere.com/"),
("19","Ecogast France Sas","","",""),
("20","Eurl Des Bocaux - Maison Marc","","",""),
("21","Famille Fabre ","fabre.jpg","Il était une fois une famille de vignerons amoureux de chacune de leurs parcelles. Au cours de repas animés ou de balades ventées dans la garrigue voisine, leur passion se transmettait d’une génération à l’autre. 2019 sonne 
le retour sur leurs terres de Clémence, Jeanne et Paule. Au-delà des liens de sang, c’est une famille au sens large qui œuvre chaque jour pour vous offrir une capture de ses terroirs.<br/>Famille Fabre est un ensemble de personnes convaincues de la nécessité de 
prendre soin de cette terre empruntée aux générations future, pour toujours pour vous donner ce qu’elle porte de meilleur. Nous levons nos chapeaux à ces talents réunis !","https://www.famillefabre.com/"),
("22","Gie Hub Vbs","","",""),
("23","Grands Vins du Vieux Monde","maldant.jpg","En tant que passeurs de témoin, l’équipe du Domaine s’inscrit dans une approche et une vision exigeantes, durables, visant à assurer la transmission des terres aux générations futures dans les meilleures 
conditions possibles.<br\>Le Domaine adopte ainsi une approche culturale qui respecte la charte Bio-Advanced, visant à rechercher et à appliquer, à toutes les étapes de la vie du vin (production, transformation, gestion et distribution), les techniques les plus 
respectueuses de l’identité du terroir et de son environnement.<br\>Cette démarche permet de cultiver les vignes et d’avoir des raisins de très grande qualité, afin d’élaborer des vins de renommée internationale.<br\>L’objectif final est bien entendu, 
également, d’offrir aux clients un produit empreint de singularité, et pérenne.","https://domaine-maldant.com/"),
("24","Joseph Cartron","cartron.jpg","La Bourgogne est le coeur et l’inspiration de la Maison Joseph Cartron. Les produits Joseph Cartron s'inscrivent dans la tradition des produits bourguignons: les liens étroits et durables créés avec les producteurs et 
distillateurs du terroir depuis plusieurs générations ont permis à la Maison Joseph Cartron de construire de véritables partenariats, d'acquérir une connaissance intime du fruit et de travailler ses créations avec les variétés de fruits les plus aromatiques, 
dans le respect des recettes originales.<br\>Aujourd'hui encore, la Maison Joseph Cartron achète 70% de ses fruits en Bourgogne, ce qui lui permet de choisir elle-même le moment de la récolte et de travailler les fruits à un stade de maturité optimum.
<br\>L'utilisation de ces variétés de fruits locales, souvent à faible rendement comme le cassis Noir de Bourgogne, permet des créations typiquement bourguignonnes absolument incomparables en terme de goût.","https://www.cartron.fr/"),
("25","La Compagnie de Burgondie","","",""),
("26","La Mentheuse","","",""),
("27","Le Cercle - Marchand D'Eaux de Vie","","",""),
("28","Leda","leda.jpg","Maison Léda est une entreprise familiale et indépendante spécialisée dans la distribution de vins et de spiritueux d’excellence. Maison Léda a été créée en 1982 par la Famille Lesgourgues, pour au départ, assurer directement la 
distribution de ses armagnacs (Château de Laubade) et de ses vins (Château Haut Selve, Château Le Bonnat et Château Peyros) auprès d’une clientèle spécialisée.<br\>Depuis quelques années, Arnaud et Denis Lesgourgues, qui représentent la 3ème génération, ont 
élargi le portefeuille de marques en distribution vers des Maisons reconnues pour leur savoir-faire remarquable, leur singularité et l’excellence de leurs vins et spiritueux.<br\>Présente en France et dans plus de 50 pays à l’exportation, Maison Léda est le 
partenaire privilégié en vins et spiritueux des cavistes, épiceries fines, restaurants, hôtels et bars. Les collaborateurs de Maison Léda sont tous ensemble engagés dans la poursuite du développement durable de la Maison, au service de ses clients et des 
marques qu’elle représente fièrement au quotidien.","https://maison-leda.com/"),
("29","Leonardi","","",""),
("30","Lionel Faury","faury.jpg","Au rythme des décennies, au fil des saisons, et au gré des aléas climatiques, la ferme familiale est devenue exploitation viticole. Les animaux ont laissé la place aux cuves et aux tonneaux alors que le matériel informatique 
s’est substitué à la réserve de charbon. Les terrasses où régnaient jadis chênes et acacias, accueillent désormais Syrah, Viognier, Marsanne ou Roussanne.<br\>Dépositaires du monde d’hier; artisans agricoles aujourd’hui; d’autres suivront demain…. nous ne 
sommes que de passage…","https://vins-lionel-faury.fr/"),
("31","Manoir du Capucin - Bayon-Pichon","capucin.jpg","Ancienne demeure (datant du XVIIème) du Capucin LUILLIER, auteur des « Noëls Mâconnais ». Le Manoir à colonnes toscanes est le témoin de cette époque.<br\>C’est Antoine FOREST l’arrière grand père de Chloé 
BAYON qui fit l’acquisition de la propriété en 1933, puis les vignes n’ont plus été exploitées par la famille durant 2 générations.<br\>Chloé a grandi à Nice, a fait des études de viticulture et d’oenologie et a décidé de reprendre ce domaine où règne l’âme de 
ses ancêtres et leur passion pour le vin.<br\>Le domaine compte 9,6 ha de Pouilly Fuissé, 2 ha de Mâcon Solutré-Pouilly, 1 ha de Mâcon villages et 0,88 ha de Saint Véran.","https://www.manoirducapucin.com/"),
("32","Mdcv ","","",""),
("33","Melody - Marc+Marlene","melody.jpg","Un domaine riche de différents terroirs avec des vignes qui remontent aux années 1945.<br\>Depuis 2010, Marc ROMAK, Marlène DURAND et Denis LARIVIERE ont uni leurs forces pour créer le Domaine Melody et mettre en 
valeur leur vignoble de 20 ha en Crozes-Hermitage.<br\>Dans un chai alliant tradition et modernité, nous travaillons pour offrir des vins élégants, fruités et structurés, pleins de finesse et de franchise.","https://www.domainemelody.fr/"),
("34","Pap.I","","",""),
("35","Rhone Rive Gauche","","",""),
("36"," Brunel Pere et Fils","","",""),
("37","Vignobles Mourat","","",""),
("38","Domaine Des Bormettes","bormettes.jpg","Niché autour du majestueux Pic Saint-Martin, le Domaine des Bormettes est une pépite familiale séculaire. Ce joyau se distingue par son vaste vignoble, un des plus anciens de la commune de La Londe les Maures, et 
sa cave voûtée exceptionnelle du XVIIème siècle, édifice unique et rare en Provence, qui abrite aujourd’hui une trentaine de barriques destinées à l’élevage des vins haut de gamme du Domaine.<br\>Reconnu chaque année par les médias prestigieux tels que Le Monde 
des Vins, Le Figaro, Le Point, l’Express, le Guide Hachette ou la Revue du Vin de France, le Château des Bormettes est également salué par le Guide Bettane et Desseauve comme une « étoile montante de l’appellation La Londe ».<br\>Le Château des Bormettes se 
démarque en effet au rythme des millésimes avec une collection de vins uniques, proposés à travers 4 gammes dans les trois couleurs.","https://chateaudesbormettes.com/"),
("39","Cellier Des Chartreux","chartreux.jpg","Conjuguer l’audace et la créativité des entreprises à taille humaine, au sens du réalisme et des responsabilités, telle est la feuille de route du Cellier des Chartreux. Mais répondre à cette ambition n’est 
possible qu’en résolvant l’équation à trois variables intimement imbriquées dans la gestion d’une cave coopérative : vignoble, process, marché.<br>C’est pourquoi le Cellier des Chartreux, intensifie constamment sa force de travail et d’inventivité sur ces trois 
fronts : LE VIGNOBLE : gestion et développement qualitatifs et éco-responsables; L’OUTIL DE PRODUCTION : optimisation constante des ressources et équipements de vinification, stockage et conditionnement. LA CRÉATIVITÉ: volonté permanente de proposer des vins 
offrant aux clients une réelle valeur ajoutée créative et qualitative.","http://www.cellierdeschartreux.fr/fr/accueil"),
("40","Domaine Durieu","","",""),
("41","Les Jardinettes","jardinettes.jpg","Notre domaine familial de 30 hectares est situé sur la commune de Villelaure, près de Pertuis dans la Vallée du Rhône. Toutes nos vignes sont cultivées en agriculture biologique et certifiées par l'organisme Ecocert. 
Notre objectif est de produire des grands vins, en laissant une terre saine aux générations futures.<br\>Notre terroir d'exception se trouve au sud du parc régional du Luberon. Nous mettons notre savoir et notre expérience au service de nos vignes, plantées sur 
des coteaux sud et en plaine.","https://www.domainedesjardinettes.com/"),
("42","Vinho Selection","vinho-selection.jpg","Vinho Sélection : importateur de vins du Monde<br\>À travers notre sélection de vins du Monde, nous vous proposons de découvrir des vins de grande qualité, élaborés par des femmes et des hommes passionnés. Tout au 
long de l'année, nous nous intéressons à de nouveaux pays, de nouvelles appellations et de nouveaux cépages afin de trouver la « pépite » qui vous surprendra.<br\>Fruit d'un travail de référencement passionnant, qui se déroule parfois sur plusieurs saisons, 
notre sélection vous permettra de découvrir des vins étonnants, issus de cépages autochtones peu connus, comme le Grillo en Italie, le Torrontes en Argentine, le Furmint en Hongrie, le Feteasca Negra en Roumanie et bien d'autres encore. Une invitation à 
partager de nouvelles notes gustatives.","https://www.vinhoselection.com/"),
("43","Vinolem","","",""),
("44","Vinum Nostrum - La Citadelle","","","");

-- ----------------------------------------------------------
-- Exemple de 10 articles
/* Table products */
INSERT INTO Products (prod_id, prod_name, prod_desc, frs_id, family_id, appell_id, region_id, color_id, cont_id, prod_img, prod_actif) VALUES
("00049", "Bas Armagnac Carafe Aramis Intemporel 12 ans", "Un Armagnac 12 ans d’une incroyable puissance et complexité aromatique. Idéal en digestif ou sur des fraises gariguettes.<br><br>Provenance : France (Landes et Lot-et-Garonne)<br><br>Cépages : Ugni 
blanc, Folle blanche, Baco et Colombard<br><br>Vieillissement : assemblage de 15 eaux-de-vie de 12 à 20 ans vieillies en fûts de chêne.<br><br>Dégustation : Robe ambrée foncée ; Nez de fruits confits, vanille, pruneaux et d’épices ; Bouche racée, puissante et 
riche. Son rancio typique des vieux bas armagnacs est net et persistant.<br><br>Le Château de Laubade est une propriété agricole et viticole située à Sorbets, dans le Gers, au cœur du terroir le plus noble du Bas Armagnac. Bâti en 1870, le domaine de 105 
hectares d’un seul tenant appartient à la Famille Lesgourgues depuis trois générations. En quête d’excellence, c’est actuellement Denis, épaulé par sa sœur Jeanne et son frère Arnaud, qui poursuit les efforts visant à créer des armagnacs des plus singuliers.", 
"28", "7", "0", "4","0", "15", "armagnac_laubade_intemporel_12_ans.png", "1"),
("00050", "Bas Armagnac Carafe Eclat VSOP Laubade", "Un Armagnac VSOP riche et élégant. Idéal en apéritif ou en digestif.<br><br>Provenance : France (Landes et Lot-et-Garonne)<br><br>Cépages : Ugni blanc et Folle blanche<br><br>Vieillissement : 6 à 12 ans en 
fûts de chêne.<br><br>Dégustation : Robe jaune doré ; Nez de fruits mûrs, vanille, prune et d’agrumes ; Bouche suave, délicat d’une belle longueur sur des notes patissières.<br><br>Le Château de Laubade est une propriété agricole et viticole située à Sorbets, 
dans le Gers, au cœur du terroir le plus noble du Bas Armagnac. Bâti en 1870, le domaine de 105 hectares d’un seul tenant appartient à la Famille Lesgourgues depuis trois générations. En quête d’excellence, c’est actuellement Denis, épaulé par sa sœur Jeanne et 
son frère Arnaud, qui poursuit les efforts visant à créer des armagnacs des plus singuliers.", "28", "7", "0", "4","0", "15", "armagnac_laubade_eclat_vsop.png", "1"),
("00053", "Bas Armagnac Laubade N°5 Carafe Intemporelle", "Un Armagnac Hors d’Age élégant, fin et d’une grande maturité. Parfait en digestif ou sur un dessert aux fruits frais.<br><br>Provenance : France (Landes et Lot-et-Garonne)<br><br>Cépages : Ugni blanc, 
Folle blanche, Baco et Colombard<br><br>Vieillissement : 30 à 40 ans en fûts de chêne.<br><br>Dégustation : Robe acajou ; Nez intense de pruneau, figue, cacao, pruneau, torréfaction ; Bouche souple, boisée, riche d’une finale exceptionnelle.<br><br>Le Château 
de Laubade est une propriété agricole et viticole située à Sorbets, dans le Gers, au cœur du terroir le plus noble du Bas Armagnac. Bâti en 1870, le domaine de 105 hectares d’un seul tenant appartient à la Famille Lesgourgues depuis trois générations. En quête 
d’excellence, c’est actuellement Denis, épaulé par sa sœur Jeanne et son frère Arnaud, qui poursuit les efforts visant à créer des armagnacs des plus singuliers.", "28", "7", "0", "4","0", "0", "armagnac_laubade_intemporel_n5.png", "1"),
("00054", "Bas Armagnac Laubade VS Carafe Signature", "Un Armagnac VS fruité et grillé/toasté. A déguster pur en apéritif ou à utiliser pour comme base de cocktail.<br><br>Provenance : France (Landes et Lot-et-Garonne)<br><br>Cépages : Ugni blanc, Colombard, 
Baco et Folle blanche<br><br>Vieillissement : 3 ans en fûts de chêne.<br><br>Dégustation : Robe dorée ; Nez intense et riche aux arômes de pêche, d’abricot et de prune ; Bouche souple et puissante aux notes épicées, vanillées et réglissées.<br><br>Le Château de 
Laubade est une propriété agricole et viticole située à Sorbets, dans le Gers, au cœur du terroir le plus noble du Bas Armagnac. Bâti en 1870, le domaine de 105 hectares d’un seul tenant appartient à la Famille Lesgourgues depuis trois générations. En quête 
d’excellence, c’est actuellement Denis, épaulé par sa sœur Jeanne et son frère Arnaud, qui poursuit les efforts visant à créer des armagnacs des plus singuliers.", "28", "7", "0", "4","0", "15", "armagnac_laubade_signature_vs.png", "1"),
("00059", "Calvados Pays d'Auge Roger Groult 3 ans", "Un Calvados 3ans à apprécier dans sa plus simple expression, idéal à déguster à l'apéritif, pur ou en cocktail.<br><br>Provenance : France (Normandie)<br><br>Vieillissement : double distillation au feu de 
bois + vieillissement de 3 ans en vieux fûts de chêne français.<br><br>Dégustation : Robe orange clair ; Nez d’arômes intense de pomme fraîche acidulée ; Bouche oncteuse et douce, idéal en cocktail, digestif, givré ou à température ambiante.<br><br>Situé sur 
les hauteur du Pays d’Auge à Saint Cyr du Ronceray, c’est en 1860 que Pierre Groult commença à distiller son cidre dans le but d’obtenir sa prope eau-de-vie. <br>Distillerie familiale, les traditions sont perpétuées car aujourd’hui ce sont Estelle, Charlotte et 
Jean-Roger qui gèrent la distillerie. Tout en maintenant certaines méthodes de production ancestrales telles la double distillation au feu de bois ou l'assemblage perpétuel.", "28", "7", "0", "11","0", "15", "calvados_roger_groult_3_ans.png", "1"),
("00060", "Calvados Pays d'Auge Roger Groult 8 ans", "Un Calvados 8 ans rond et gourmand. Idéal sur un plateau de fromage.<br><br>Provenance : France (Normandie)<br><br>Vieillissement : double distillation au feu de bois + vieillissement de 8 ans en vieux fûts 
de chêne français.<br><br>Dégustation : Robe orange clair ; Nez d’arômes intense de pomme légèrement cuite, de vanille et canelle ; Bouche gourmande, aromatique et longue. Idéal en digestif, givré ou avec un plateau de fromages.<br><br>Situé sur les hauteur du 
Pays d’Auge à Saint Cyr du Ronceray, c’est en 1860 que Pierre Groult commença à distiller son cidre dans le but d’obtenir sa prope eau-de-vie. <br>Distillerie familiale, les traditions sont perpétuées car aujourd’hui ce sont Estelle, Charlotte et Jean-Roger qui 
gèrent la distillerie. Tout en maintenant certaines méthodes de production ancestrales telles la double distillation au feu de bois ou l'assemblage perpétuel.", "28", "7", "0", "11","0", "15", "calvados_roger_groult_8_ans.png", "1"),
("00073", "Gin 42° Mac Malden", "Un Gin bourguignon qui dévoile toute sa fraîcheur pur sur glace ou dans un gin tonic ou dans un cocktail que vous aurez imaginé.<br><br>Provenance : France (Bourgogne)<br><br>Vieillissement : Macération de baies de genièvre de 3 
origines dans un mélange eau et alcool pendant plusieurs jours avant distillation. La bouteille est en aluminium dont le faible poids diminue le bilan carbone et est recyclable à l’infini.<br><br>Dégustation : Robe claire ; Nez de genièvre, de poivre et 
d’agrumes ; Bouche tendre, suave et grasse. A servir sur glace ou en cokctails.<br><br>Malden Spirits est une aventure qui, depuis sa naissance, tutoie l’innovation, la disruptivité, la différenciation : elle est née au cœur de la Bourgogne, au cœur du vignoble 
bourguignon, et a été imaginée par l’équipe du Domaine Maldant-Pauvelot.", "23", "7", "0", "21","0", "15", "gin_mac_malden.png", "1"),
("00080", "Liqueur Prunelle de Bourgogne Cartron 40°", "Une liqueur de prunelle gourmande et généreuse. Idéal sur glace ou en cocktail.<br><br>Provenance : France (Bourgogne)<br><br>Dégustation : Robe dorée ; Nez aromatique sur le fruit à noyau ; Bouche 
généréeuse, ronde d’une sucrosité discrète aux notes de fruits à noyaux. Superbe longueur.<br><br>La Bourgogne fait partie intégrante de l’histoire de la famille Cartron depuis plus de deux siècles.<br>En effet, Jean Cartron s’installe en Bourgogne, à Argilly, 
à quelques kilomètres de Nuits-Saint-Georges. Il devient rapidement propriétaire terrien grâce à son mariage avec une Bourguignonne.<br>Par la suite, son petit-fils, Pierre Cartron, le père de Joseph, s’installe à Nuits-Saint-Georges au début des années 1870. 
C’est dans cette ville que Joseph créera la société éponyme en 1882 où elle est toujours ancrée.", "24", "7", "0", "26","0", "15", "joseph_cartron_liqueur_prunelle.png", "1"),
("00101", "Rhum JM Vieux VSOP", "Un Rhum Agricole VSOP martiniquais boisé et torréfié. Idéal en apéritif, digestif ou sur un gâteau en chocolat.<br><br>Provenance : Martinique<br><br>Vieillissement : 3 ans en fûts neufs et en fûts d’ex-Bourbon + 1 an de 
finition en fûts de capacités et chauffes différentes<br><br>Dégustation : Robe ambrée ; Nez boisé, vanillé aux notes de tabac, d’épices et d’agrumes ; Bouche boisée, fumée, torréfiée et épicée.<br><br>Nichée au pied de la montagne Pelée dans un écrin luxuriant 
du Macouba à l’extrême-nord de la Martinique, la Distillerie J.M est reconnaissable à ses toits rouges. Considérées par la presse et les connaisseurs comme le meilleur rhum vieux du monde, les créations J.M ont une saveur unique. La richesse sauvage de ce 
terroir préservé, sa nature généreuse, son riche sol volcanique, son climat contrasté, son eau pure naturellement filtrée et sa canne à sucre ultra-fraîche donnent tout son caractère à ce AOC Rhum Agricole Martinique.", "24", "7", "0", "34","0", "15", 
"rhum_jm_vsop.png", "1"),
("00118", "Whisky Charolais Mac Malden 12 ans 50 cl", "Un Whisky écossais blended fin, élégant et très subtil. Idéal en digestif ou sur une tarte aux fruits.<br><br>Provenance : Ecosse<br><br>Vieillissement : en fût de Bourbon et affiné en fût de 
Corton-Renardes (Bourgogne).<br><br>Dégustation : Robe ambrée ; Nez subtile et gourmand sur la mirabelle, la fraise et la noisette torréfiée ; Bouche ample, complexe sur des notes de gingembre, pamplemousse. Finale d’une grande finesse et longue.<br><br>Malden 
Spirits est une aventure qui, depuis sa naissance, tutoie l’innovation, la disruptivité, la différenciation : elle est née au cœur de la Bourgogne, au cœur du vignoble bourguignon, et a été imaginée par l’équipe du Domaine Maldant-Pauvelot.", "23", "7", "0", 
"42","0", "13", "whisky_mac_malden_charolais.png", "1");

COMMIT;