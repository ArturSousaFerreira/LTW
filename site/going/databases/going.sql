.mode column
.headers on
/* Enable foreign keys. Default is OFF. We'll likely need this in the connection */
PRAGMA foreign_keys = ON;


CREATE TABLE IF NOT EXISTS Users (
	idUser INTEGER NOT NULL ,
	username VARCHAR(15),
	password VARCHAR(30),
	salt VARCHAR(30),
	name CHAR(20),
	email VARCHAR(30),
	birth_date DATE,
	CONSTRAINT pk_users PRIMARY KEY (idUser)
	CONSTRAINT u_user UNIQUE (username));


CREATE TABLE IF NOT EXISTS Events (
	idEvent INTEGER NOT NULL ,
	idUser INTEGER,
	description VARCHAR,
	event_type CHAR(30),
	image_link VARCHAR(50),
	event_date DATE,
	public BOOLEAN,
	CONSTRAINT pk_events PRIMARY KEY (idEvent),
	CONSTRAINT fk_users FOREIGN KEY (idUser) REFERENCES Users(idUser));
	

CREATE TABLE IF NOT EXISTS Registers (
	idRegister INTEGER NOT NULL ,
	idUser INTEGER,
	idEvent INTEGER,
	CONSTRAINT pk_registers PRIMARY KEY (idRegister),
	CONSTRAINT fk_users FOREIGN KEY (idUser) REFERENCES Users (idUser),
	CONSTRAINT fk_events FOREIGN KEY (idEvent) REFERENCES Events (idEvent));
	
	
CREATE TABLE IF NOT EXISTS Comments (
	idComment INTEGER NOT NULL ,
	idUser INTEGER,
	idEvent INTEGER,
	text VARCHAR,
	CONSTRAINT pk_comments PRIMARY KEY (idComment),
	CONSTRAINT fk_users FOREIGN KEY (idUser) REFERENCES Users (idUser),
	CONSTRAINT fk_events FOREIGN KEY (idEvent) REFERENCES Events (idEvent));

/* To do: review and update inserts */

INSERT INTO Users (username,password,salt,name,email) VALUES ('nv', '1', '19680419', 'Nuno', 'nv@gmail.com');