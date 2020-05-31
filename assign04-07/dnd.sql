CREATE SCHEMA IF NOT EXISTS dnd;

DROP TABLE IF EXISTS dnd.characters CASCADE;
DROP TABLE IF EXISTS dnd.inventory CASCADE;

CREATE TABLE dnd.characters(
	charid SERIAL PRIMARY KEY, 
	name text, 
	race text, 
	class text, 
	subclass text, 
	gender char(1), 
	inventoryid SERIAL
	); 

CREATE TABLE dnd.inventory(
	itemid SERIAL PRIMARY KEY, 
	itemname text, 
	price money, 
	weight numeric(7,1),
	inventoryid SERIAL REFERENCES dnd.characters
	);

INSERT INTO dnd.characters(name, race, class, subclass, gender) VALUES
	('Sun', 'Victini', 'Wizard', 'Necromancer', 'M'),
	('Micheal', 'Human', 'Rat Enthusiast', 'Birthday Boy', 'M'),
	('Isabelle', 'Dog', 'Secretary', 'Demon-Killer', 'F');

INSERT INTO dnd.inventory(itemname, price, weight, inventoryid) VALUES
	('Sun Sandwich', '15.00', 0.8, 1),
	('Gauntlets of Ogre Power', '500.00', 4, 1),
	('Clipboard', '1.00', 0.5, 3),
	('Cake and Ice Cream', '0', 2, 2);



