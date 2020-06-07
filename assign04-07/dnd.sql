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
	hp numeric,
	str numeric,
	dex numeric,
	con numeric,
	wis numeric,
	int numeric,
	cha numeric,
	image text,
	inventoryid SERIAL
	); 

CREATE TABLE dnd.inventory(
	itemid SERIAL PRIMARY KEY, 
	itemname text, 
	price money, 
	weight numeric(7,1),
	inventoryid SERIAL REFERENCES dnd.characters
	);

INSERT INTO dnd.characters(name, race, class, subclass, gender, hp, str, dex, con, wis, int, cha, image) VALUES
	('Sun', 'Victini', 'Wizard', 'Necromancer', 'M', 144, 20, 19, 16, 18, 20, 18, 'https://images-wixmp-ed30a86b8c4ca887773594c2.wixmp.com/f/dd58e350-6762-44ba-a196-57d616d1e436/d70fflw-d367ef26-7820-4486-98c2-1fd3c4d3bc3a.png/v1/fill/w_300,h_300,strp/shiny_victini_global_link_art_by_trainerparshen_d70fflw-fullview.png?token=eyJ0eXAiOiJKV1QiLCJhbGciOiJIUzI1NiJ9.eyJzdWIiOiJ1cm46YXBwOiIsImlzcyI6InVybjphcHA6Iiwib2JqIjpbW3siaGVpZ2h0IjoiPD0zMDAiLCJwYXRoIjoiXC9mXC9kZDU4ZTM1MC02NzYyLTQ0YmEtYTE5Ni01N2Q2MTZkMWU0MzZcL2Q3MGZmbHctZDM2N2VmMjYtNzgyMC00NDg2LTk4YzItMWZkM2M0ZDNiYzNhLnBuZyIsIndpZHRoIjoiPD0zMDAifV1dLCJhdWQiOlsidXJuOnNlcnZpY2U6aW1hZ2Uub3BlcmF0aW9ucyJdfQ.9f7mJxJpxhoRUtJEzX8dlS2wEcKLIKZUKgiJjPLihMk'),
	('Micheal', 'Human', 'Rat Enthusiast', 'Birthday Boy', 'M', 10, 5, 1, 5, 10, 10, 20, 'https://i.redd.it/3n0kjhggwp921.png'),
	('Isabelle', 'Dog', 'Secretary', 'Demon-Killer', 'F', 100, 10, 16, 16, 18, 20, 20, 'https://pbs.twimg.com/profile_images/1078459324979134464/TogqDm3X_400x400.jpg');

INSERT INTO dnd.inventory(itemname, price, weight, inventoryid) VALUES
	('Sun Sandwich', '15.00', 0.8, 1),
	('Gauntlets of Ogre Power', '500.00', 4, 1),
	('Clipboard', '1.00', 0.5, 3),
	('Cake and Ice Cream', '0', 2, 2);



