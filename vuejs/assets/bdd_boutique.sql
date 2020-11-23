CREATE DATABASE vuejs;

USE vuejs;


CREATE TABLE membre (
  id_membre int(5) NOT NULL auto_increment,
  pseudo varchar(15) NOT NULL,
  mdp varchar(250) NOT NULL,
  nom varchar(20) NOT NULL,
  prenom varchar(20) NOT NULL,
  email varchar(20) NOT NULL,
  sexe enum('m','f') NOT NULL,
  ville varchar(20) NOT NULL,
  cp int(5) unsigned zerofill NOT NULL,
  adresse text NOT NULL,
  statut int(1) NOT NULL,
  PRIMARY KEY  (id_membre),
  UNIQUE KEY pseudo (pseudo)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 ;


INSERT INTO membre (id_membre, pseudo, mdp, nom, prenom, email, sexe, ville, cp, adresse, statut) VALUES
(1, 'test', 'test', 'test', 'test', 'test@site.fr', 'm', 'test', '92', 'test', 0),
(2, 'admin', 'admin', 'admin', 'admin', 'admin@site.fr', 'm', 'admin', '75', 'admin', 1);

