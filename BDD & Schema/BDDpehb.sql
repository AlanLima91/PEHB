create database PEHB;
use PEHB;

create table categories(
	id int(11) not null auto_increment,
	name varchar(20),
	updated_at timestamp,
	created_at timestamp,
	primary key(id)
);
create table equipe(
	id int(11) not null auto_increment,
	nom varchar(20),
	id_categories int(11),
	updated_at timestamp,
	created_at timestamp,
	foreign key (id_categories) references categories(id),
	primary key(id)
);
create table lieux(
	id int(11) not null auto_increment,
	lieux varchar(20),
	primary key(id)
);
create table planning(
	id int(11) not null auto_increment,
	name varchar(20),
	ddebut date,
	dfin date,
	id_lieux int(11),
	updated_at timestamp,
	created_at timestamp,
	foreign key (id_lieux) references lieux(id),
	primary key(id)
);
create table role(
	id int(11) not null auto_increment,
	name varchar(20),
	primary key(id)
);
create table utilisateur(
	id int(11) not null auto_increment,
	nom varchar(20),
	prenom varchar(20),
	NumLicence int(13),
	id_equipe int(11),
	email varchar(50),
	password varchar(100),
	updated_at timestamp,
	created_at timestamp,
	name varchar(50),
	foreign key (id_equipe) references equipe(id),
	primary key(id)
);

#Table relationnelle entre utilisateur et role
create table user_role(
	id_user int(11) not null,
	id_role int(11)not null,
	foreign key (id_user) references utilisateur(id),
	foreign key (id_role) references role(id)
);

create table planning_equipe(
	id_planning int(11) not null,
	id_equipe int(11)not null,
	foreign key (id_planning) references planning(id),
	foreign key (id_equipe) references equipe(id)
);

create table news(
	id int(11) not null auto_increment,
	name varchar(20),
	updated_at timestamp,
	created_at timestamp,
	primary key(id)
);
