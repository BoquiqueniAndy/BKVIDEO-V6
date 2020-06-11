#------------------------------------------------------------
#        Script MySQL.
#------------------------------------------------------------


#------------------------------------------------------------
# Table: Utilisateur
#------------------------------------------------------------

CREATE TABLE Utilisateur(
        id     Int  Auto_increment  NOT NULL ,
        pseudo Varchar (50) NOT NULL ,
        mail   Varchar (50) NOT NULL ,
        mdp    Varchar (50) NOT NULL
	,CONSTRAINT Utilisateur_PK PRIMARY KEY (id)
)ENGINE=InnoDB;


#------------------------------------------------------------
# Table: Produits
#------------------------------------------------------------

CREATE TABLE Produits(
        numprod    Int  Auto_increment  NOT NULL ,
        nompro     Varchar (50) NOT NULL ,
        plateforme Varchar (50) NOT NULL ,
        prix       Float NOT NULL ,
        categorie  Varchar (50) NOT NULL ,
        lien       Varchar (250) NOT NULL
	,CONSTRAINT Produits_PK PRIMARY KEY (numprod)
)ENGINE=InnoDB;


#------------------------------------------------------------
# Table: administrateur
#------------------------------------------------------------

CREATE TABLE administrateur(
        idadmin       Int NOT NULL ,
        nomadmin      Varchar (250) NOT NULL ,
        afficheradmin Varchar (250) NOT NULL ,
        mdpadmin      Varchar (250) NOT NULL ,
        emailadmin    Varchar (250) NOT NULL
	,CONSTRAINT administrateur_PK PRIMARY KEY (idadmin)
)ENGINE=InnoDB;


#------------------------------------------------------------
# Table: interagir
#------------------------------------------------------------

CREATE TABLE interagir(
        idadmin Int NOT NULL ,
        numprod Int NOT NULL
	,CONSTRAINT interagir_PK PRIMARY KEY (idadmin,numprod)
)ENGINE=InnoDB;


#------------------------------------------------------------
# Table: Commade
#------------------------------------------------------------

CREATE TABLE Commade(
        numcom  Int NOT NULL ,
        datecom Date NOT NULL ,
        id      Int NOT NULL ,
        idp     Int NOT NULL
	,CONSTRAINT Commade_PK PRIMARY KEY (numcom)
)ENGINE=InnoDB;


#------------------------------------------------------------
# Table: Paiment
#------------------------------------------------------------

CREATE TABLE Paiment(
        idp            Int NOT NULL ,
        prixtotal      Float NOT NULL ,
        numcard        Varchar (50) NOT NULL ,
        nomtitulaire   Varchar (50) NOT NULL ,
        dateexpiration Varchar (50) NOT NULL ,
        Crytovisuel    Int NOT NULL ,
        numcom         Int NOT NULL ,
        Numfact        Int NOT NULL
	,CONSTRAINT Paiment_PK PRIMARY KEY (idp)
)ENGINE=InnoDB;


#------------------------------------------------------------
# Table: Facture
#------------------------------------------------------------

CREATE TABLE Facture(
        Numfact Int  Auto_increment  NOT NULL ,
        idp     Int NOT NULL
	,CONSTRAINT Facture_PK PRIMARY KEY (Numfact)
)ENGINE=InnoDB;


#------------------------------------------------------------
# Table: Appartenir
#------------------------------------------------------------

CREATE TABLE Appartenir(
        numprod Int NOT NULL ,
        numcom  Int NOT NULL
	,CONSTRAINT Appartenir_PK PRIMARY KEY (numprod,numcom)
)ENGINE=InnoDB;




ALTER TABLE interagir
	ADD CONSTRAINT interagir_administrateur0_FK
	FOREIGN KEY (idadmin)
	REFERENCES administrateur(idadmin);

ALTER TABLE interagir
	ADD CONSTRAINT interagir_Produits1_FK
	FOREIGN KEY (numprod)
	REFERENCES Produits(numprod);

ALTER TABLE Commade
	ADD CONSTRAINT Commade_Utilisateur0_FK
	FOREIGN KEY (id)
	REFERENCES Utilisateur(id);

ALTER TABLE Commade
	ADD CONSTRAINT Commade_Paiment1_FK
	FOREIGN KEY (idp)
	REFERENCES Paiment(idp);

ALTER TABLE Commade 
	ADD CONSTRAINT Commade_Paiment0_AK 
	UNIQUE (idp);

ALTER TABLE Paiment
	ADD CONSTRAINT Paiment_Commade0_FK
	FOREIGN KEY (numcom)
	REFERENCES Commade(numcom);

ALTER TABLE Paiment
	ADD CONSTRAINT Paiment_Facture1_FK
	FOREIGN KEY (Numfact)
	REFERENCES Facture(Numfact);

ALTER TABLE Paiment 
	ADD CONSTRAINT Paiment_Commade0_AK 
	UNIQUE (numcom);

ALTER TABLE Paiment 
	ADD CONSTRAINT Paiment_Facture1_AK 
	UNIQUE (Numfact);

ALTER TABLE Facture
	ADD CONSTRAINT Facture_Paiment0_FK
	FOREIGN KEY (idp)
	REFERENCES Paiment(idp);

ALTER TABLE Facture 
	ADD CONSTRAINT Facture_Paiment0_AK 
	UNIQUE (idp);

ALTER TABLE Appartenir
	ADD CONSTRAINT Appartenir_Produits0_FK
	FOREIGN KEY (numprod)
	REFERENCES Produits(numprod);

ALTER TABLE Appartenir
	ADD CONSTRAINT Appartenir_Commade1_FK
	FOREIGN KEY (numcom)
	REFERENCES Commade(numcom);
