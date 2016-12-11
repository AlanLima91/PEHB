#------------------------------------------------------------
#        Script MySQL.
#------------------------------------------------------------

create database PEHB;
use PEHB;

#------------------------------------------------------------
# Table: Adherent
#------------------------------------------------------------

CREATE TABLE Adherent(
        Licence Int ,
        id      Int NOT NULL ,
        PRIMARY KEY (id )
)ENGINE=InnoDB;


#------------------------------------------------------------
# Table: Joueur
#------------------------------------------------------------

CREATE TABLE Joueur(
        Licence            Int NOT NULL ,
        Nom                Varchar (25) ,
        Prenom             Varchar (25) ,
        email              Varchar (25) ,
        Annee_de_naissance Year ,
        id                 Int NOT NULL ,
        PRIMARY KEY (Licence )
)ENGINE=InnoDB;


#------------------------------------------------------------
# Table: Equipe
#------------------------------------------------------------

CREATE TABLE Equipe(
        id           int (11) Auto_increment  NOT NULL ,
        categorie    Varchar (25) ,
        id_Categorie Int NOT NULL ,
        PRIMARY KEY (id )
)ENGINE=InnoDB;


#------------------------------------------------------------
# Table: Role
#------------------------------------------------------------

CREATE TABLE Role(
        licence int (11) Auto_increment  NOT NULL ,
        PRIMARY KEY (licence )
)ENGINE=InnoDB;


#------------------------------------------------------------
# Table: VisiteurLogin
#------------------------------------------------------------

CREATE TABLE VisiteurLogin(
        Nom    Varchar (25) NOT NULL ,
        Prenom Varchar (25) NOT NULL ,
        id     Int NOT NULL ,
        PRIMARY KEY (id )
)ENGINE=InnoDB;


#------------------------------------------------------------
# Table: User
#------------------------------------------------------------

CREATE TABLE User(
        id         int (11) Auto_increment  NOT NULL ,
        email      Varchar (25) NOT NULL ,
        password   Varchar (100) ,
        created_at TimeStamp NOT NULL ,
        updated_at TimeStamp NOT NULL ,
        licence    Int NOT NULL ,
        PRIMARY KEY (id )
)ENGINE=InnoDB;


#------------------------------------------------------------
# Table: VS
#------------------------------------------------------------

CREATE TABLE VS(
        id         int (11) Auto_increment  NOT NULL ,
        Adversaire Varchar (25) ,
        Adresse    Varchar (25) ,
        CP         Varchar (25) ,
        PRIMARY KEY (id )
)ENGINE=InnoDB;


#------------------------------------------------------------
# Table: Coach
#------------------------------------------------------------

CREATE TABLE Coach(
        licence Int NOT NULL ,
        PRIMARY KEY (licence )
)ENGINE=InnoDB;


#------------------------------------------------------------
# Table: Championnat
#------------------------------------------------------------

CREATE TABLE Championnat(
        id      int (11) Auto_increment  NOT NULL ,
        echelle Varchar (25) ,
        niveau  Varchar (25) ,
        PRIMARY KEY (id )
)ENGINE=InnoDB;


#------------------------------------------------------------
# Table: News
#------------------------------------------------------------

CREATE TABLE News(
        id         int (11) Auto_increment  NOT NULL ,
        article    Text ,
        created_at TimeStamp ,
        updated_at TimeStamp ,
        PRIMARY KEY (id )
)ENGINE=InnoDB;


#------------------------------------------------------------
# Table: Evenement
#------------------------------------------------------------

CREATE TABLE Evenement(
        id          int (11) Auto_increment  NOT NULL ,
        Description Text ,
        DateDeb     Date ,
        DateFin     Date ,
        id_Lieu     Int NOT NULL ,
        PRIMARY KEY (id )
)ENGINE=InnoDB;


#------------------------------------------------------------
# Table: Lieu
#------------------------------------------------------------

CREATE TABLE Lieu(
        id      int (11) Auto_increment  NOT NULL ,
        Adresse Varchar (25) NOT NULL ,
        Nom     Varchar (25) NOT NULL ,
        id_VS   Int NOT NULL ,
        PRIMARY KEY (id )
)ENGINE=InnoDB;


#------------------------------------------------------------
# Table: catégorie
#------------------------------------------------------------

CREATE TABLE categorie(
        id_Categorie int (11) Auto_increment  NOT NULL ,
        name         Varchar (25) ,
        created_at   TimeStamp NOT NULL ,
        updated_at   TimeStamp NOT NULL ,
        PRIMARY KEY (id_Categorie )
)ENGINE=InnoDB;


#------------------------------------------------------------
# Table: être
#------------------------------------------------------------

CREATE TABLE etre(
        Licence Int NOT NULL ,
        id      Int NOT NULL ,
        PRIMARY KEY (Licence ,id )
)ENGINE=InnoDB;


#------------------------------------------------------------
# Table: Devenir
#------------------------------------------------------------

CREATE TABLE Devenir(
        id      Int NOT NULL ,
        licence Int NOT NULL ,
        PRIMARY KEY (id ,licence )
)ENGINE=InnoDB;


#------------------------------------------------------------
# Table: Participer
#------------------------------------------------------------

CREATE TABLE Participer(
        id             Int NOT NULL ,
        id_Championnat Int NOT NULL ,
        id_VS          Int NOT NULL ,
        PRIMARY KEY (id ,id_Championnat ,id_VS )
)ENGINE=InnoDB;


#------------------------------------------------------------
# Table: Entrainer
#------------------------------------------------------------

CREATE TABLE Entrainer(
        id      Int NOT NULL ,
        licence Int NOT NULL ,
        PRIMARY KEY (id ,licence )
)ENGINE=InnoDB;


#------------------------------------------------------------
# Table: Gérer
#------------------------------------------------------------

CREATE TABLE Gerer(
        id           Int NOT NULL ,
        id_News      Int NOT NULL ,
        id_Evenement Int NOT NULL ,
        PRIMARY KEY (id ,id_News ,id_Evenement )
)ENGINE=InnoDB;

ALTER TABLE Adherent ADD CONSTRAINT FK_Adherent_id FOREIGN KEY (id) REFERENCES User(id);
ALTER TABLE Joueur ADD CONSTRAINT FK_Joueur_id FOREIGN KEY (id) REFERENCES Equipe(id);
ALTER TABLE Equipe ADD CONSTRAINT FK_Equipe_id_Categorie FOREIGN KEY (id_Categorie) REFERENCES categorie(id_Categorie);
ALTER TABLE VisiteurLogin ADD CONSTRAINT FK_VisiteurLogin_id FOREIGN KEY (id) REFERENCES User(id);
ALTER TABLE User ADD CONSTRAINT FK_User_licence FOREIGN KEY (licence) REFERENCES Role(licence);
ALTER TABLE Evenement ADD CONSTRAINT FK_Evenement_id_Lieu FOREIGN KEY (id_Lieu) REFERENCES Lieu(id);
ALTER TABLE Lieu ADD CONSTRAINT FK_Lieu_id_VS FOREIGN KEY (id_VS) REFERENCES VS(id);
ALTER TABLE etre ADD CONSTRAINT FK_etre_Licence FOREIGN KEY (Licence) REFERENCES Joueur(Licence);
ALTER TABLE etre ADD CONSTRAINT FK_etre_id FOREIGN KEY (id) REFERENCES User(id);
ALTER TABLE Devenir ADD CONSTRAINT FK_Devenir_id FOREIGN KEY (id) REFERENCES User(id);
ALTER TABLE Devenir ADD CONSTRAINT FK_Devenir_licence FOREIGN KEY (licence) REFERENCES Coach(licence);
ALTER TABLE Participer ADD CONSTRAINT FK_Participer_id FOREIGN KEY (id) REFERENCES Equipe(id);
ALTER TABLE Participer ADD CONSTRAINT FK_Participer_id_Championnat FOREIGN KEY (id_Championnat) REFERENCES Championnat(id);
ALTER TABLE Participer ADD CONSTRAINT FK_Participer_id_VS FOREIGN KEY (id_VS) REFERENCES VS(id);
ALTER TABLE Entrainer ADD CONSTRAINT FK_Entrainer_id FOREIGN KEY (id) REFERENCES Equipe(id);
ALTER TABLE Entrainer ADD CONSTRAINT FK_Entrainer_licence FOREIGN KEY (licence) REFERENCES Coach(licence);
ALTER TABLE Gerer ADD CONSTRAINT FK_Gerer_id FOREIGN KEY (id) REFERENCES User(id);
ALTER TABLE Gerer ADD CONSTRAINT FK_Gerer_id_News FOREIGN KEY (id_News) REFERENCES News(id);
ALTER TABLE Gerer ADD CONSTRAINT FK_Gerer_id_Evenement FOREIGN KEY (id_Evenement) REFERENCES Evenement(id);
