CREATE SCHEMA IF NOT EXISTS dnd;

DROP TABLE IF EXISTS dnd.characters CASCADE;
DROP TABLE IF EXISTS dnd.inventory CASCADE;

CREATE TABLE dnd.characters(
	charid numeric PRIMARY KEY, 
	name text, 
	race text, 
	class text, 
	subclass text, 
	gender char(1), 
	inventoryid numeric
	); 

CREATE TABLE dnd.inventory(
	itemid numeric PRIMARY KEY, 
	itemname text, 
	price money, 
	weight numeric(7,1),
	inventoryid numeric REFERENCES dnd.characters
	);

INSERT INTO dnd.characters(charid, name, race, class, subclass, gender, inventoryid) VALUES
	(1, 'Sun', 'Victini', 'Wizard', 'Necromancer', 'M', 1),
	(2, 'Micheal', 'Human', 'Rat Enthusiast', 'Birthday Boy', 'M', 2),
	(3, 'Isabelle', 'Dog', 'Secretary', 'Demon-Killer', 'F', 3);

INSERT INTO dnd.inventory(itemid, itemname, price, weight, inventoryid) VALUES
	(1, 'Sun Sandwich', '15.00', 0.8, 1),
	(2, 'Gauntlets of Ogre Power', '500.00', 4, 1),
	(3, 'Clipboard', '1.00', 0.5, 3),
	(4, 'Cake and Ice Cream', '0', 2, 2);



