#------------------------------------------------------------
#        Script MySQL.
#------------------------------------------------------------


#------------------------------------------------------------
# Table: Artiste
#------------------------------------------------------------

CREATE TABLE Artiste(
        id_artiste           Int NOT NULL ,
        nom_artiste          Varchar (35) NOT NULL ,
        prenom               Varchar (35) NOT NULL ,
        pseudo               Varchar (70) ,
        img_name             Varchar (70) ,
        email                Varchar (70) NOT NULL ,
        telephone            Varchar (15) ,
        adresse              Varchar (70) ,
        description          Mediumtext ,
        activitees           Varchar (70) ,
        description_anglais  Mediumtext NOT NULL ,
        description_allemand Mediumtext NOT NULL ,
        description_russe    Mediumtext NOT NULL ,
        description_chinois  Mediumtext NOT NULL ,
        activitees_anglais   Varchar (70) ,
        activitees_allemand  Varchar (70) ,
        activitees_russe     Varchar (70) ,
        activitees_chinois   Varchar (70) ,
        PRIMARY KEY (id_artiste )
)ENGINE=InnoDB;


#------------------------------------------------------------
# Table: Exposition
#------------------------------------------------------------

CREATE TABLE Exposition(
        id_exposition Int NOT NULL ,
        nom           Varchar (35) NOT NULL ,
        theme         Varchar (35) ,
        date_debut    Date ,
        date_fin      Date ,
        PRIMARY KEY (id_exposition )
)ENGINE=InnoDB;


#------------------------------------------------------------
# Table: utilisateur
#------------------------------------------------------------

CREATE TABLE utilisateur(
        id_utilisateur Smallint NOT NULL ,
        nom            Varchar (35) NOT NULL ,
        prenom         Varchar (35) NOT NULL ,
        email          Varchar (70) NOT NULL ,
        password       Char (60) ,
        droits         Text NOT NULL ,
        PRIMARY KEY (id_utilisateur )
)ENGINE=InnoDB;


#------------------------------------------------------------
# Table: oeuvre
#------------------------------------------------------------

CREATE TABLE oeuvre(
        id_oeuvre          Int NOT NULL ,
        nom                Varchar (35) NOT NULL ,
        type_oeuvre        Text NOT NULL ,
        img_name           Varchar (100) ,
        dimension          Varchar (35) ,
        poid               Smallint ,
        description_oeuvre Mediumtext ,
        date_creation      Date ,
        Livraison          Bool ,
        PRIMARY KEY (id_oeuvre )
)ENGINE=InnoDB;


#------------------------------------------------------------
# Table: traduction oeuvre
#------------------------------------------------------------

CREATE TABLE traduction_oeuvre(
        id_traduction Int NOT NULL ,
        nom           Varchar (35) ,
        type_oeuvre   Text ,
        description   Mediumtext ,
        langue        Text NOT NULL ,
        id_oeuvre     Int NOT NULL ,
        PRIMARY KEY (id_traduction )
)ENGINE=InnoDB;


#------------------------------------------------------------
# Table: statistique
#------------------------------------------------------------

CREATE TABLE statistique(
        id_stats             Int NOT NULL ,
        date_stats           Date ,
        nb_visite_oeuvre     Mediumint ,
        nb_visite_exposition Mediumint ,
        id_exposition        Int ,
        id_oeuvre            Int NOT NULL ,
        PRIMARY KEY (id_stats )
)ENGINE=InnoDB;


#------------------------------------------------------------
# Table: media
#------------------------------------------------------------

CREATE TABLE media(
        id_media      Int NOT NULL ,
        nom_media     Text NOT NULL ,
        type_media    Text ,
        id_artiste    Int NOT NULL ,
        id_oeuvre     Int NOT NULL ,
        id_exposition Int ,
        PRIMARY KEY (id_media )
)ENGINE=InnoDB;


#------------------------------------------------------------
# Table: livre
#------------------------------------------------------------

CREATE TABLE livre(
        id_livraison   Int ,
        date_livraison Datetime ,
        retour_artiste Datetime ,
        livreur        Varchar (35) NOT NULL ,
        id_artiste     Int NOT NULL ,
        id_oeuvre      Int NOT NULL ,
        PRIMARY KEY (id_artiste ,id_oeuvre )
)ENGINE=InnoDB;


#------------------------------------------------------------
# Table: liste_expose
#------------------------------------------------------------

CREATE TABLE liste_expose(
        id_expose     Int ,
        coordonnee_x  Numeric ,
        coordonnee_y  Numeric ,
        id_exposition Int NOT NULL ,
        id_oeuvre     Int NOT NULL ,
        PRIMARY KEY (id_exposition ,id_oeuvre )
)ENGINE=InnoDB;


#------------------------------------------------------------
# Table: expose
#------------------------------------------------------------

CREATE TABLE expose(
        id            Int ,
        id_artiste    Int NOT NULL ,
        id_exposition Int NOT NULL ,
        PRIMARY KEY (id_artiste ,id_exposition )
)ENGINE=InnoDB;

ALTER TABLE traduction_oeuvre ADD CONSTRAINT FK_traduction_oeuvre_id_oeuvre FOREIGN KEY (id_oeuvre) REFERENCES oeuvre(id_oeuvre);
ALTER TABLE statistique ADD CONSTRAINT FK_statistique_id_exposition FOREIGN KEY (id_exposition) REFERENCES Exposition(id_exposition);
ALTER TABLE statistique ADD CONSTRAINT FK_statistique_id_oeuvre FOREIGN KEY (id_oeuvre) REFERENCES oeuvre(id_oeuvre);
ALTER TABLE media ADD CONSTRAINT FK_media_id_artiste FOREIGN KEY (id_artiste) REFERENCES Artiste(id_artiste);
ALTER TABLE media ADD CONSTRAINT FK_media_id_oeuvre FOREIGN KEY (id_oeuvre) REFERENCES oeuvre(id_oeuvre);
ALTER TABLE media ADD CONSTRAINT FK_media_id_exposition FOREIGN KEY (id_exposition) REFERENCES Exposition(id_exposition);
ALTER TABLE livre ADD CONSTRAINT FK_livre_id_artiste FOREIGN KEY (id_artiste) REFERENCES Artiste(id_artiste);
ALTER TABLE livre ADD CONSTRAINT FK_livre_id_oeuvre FOREIGN KEY (id_oeuvre) REFERENCES oeuvre(id_oeuvre);
ALTER TABLE liste_expose ADD CONSTRAINT FK_liste_expose_id_exposition FOREIGN KEY (id_exposition) REFERENCES Exposition(id_exposition);
ALTER TABLE liste_expose ADD CONSTRAINT FK_liste_expose_id_oeuvre FOREIGN KEY (id_oeuvre) REFERENCES oeuvre(id_oeuvre);
ALTER TABLE expose ADD CONSTRAINT FK_expose_id_artiste FOREIGN KEY (id_artiste) REFERENCES Artiste(id_artiste);
ALTER TABLE expose ADD CONSTRAINT FK_expose_id_exposition FOREIGN KEY (id_exposition) REFERENCES Exposition(id_exposition);
