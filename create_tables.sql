CREATE TABLE IF NOT EXISTS snake(
	genus_species VARCHAR(100) NOT NULL,
	high_taxa VARCHAR(150),
	genus VARCHAR(50) NOT NULL,
	species VARCHAR(50) NOT NULL,
	author VARCHAR(100),
	year INT,
	common_name VARCHAR(256),
	venomous VARCHAR(5),
	live_bearing VARCHAR(5),
	PRIMARY KEY (genus_species)
);

CREATE TABLE IF NOT EXISTS country(
	name VARCHAR(256) NOT NULL,
	population INT,
	continent VARCHAR(256) NOT NULL
);

CREATE TABLE IF NOT EXISTS lives_in(
	genus_species VARCHAR(100),
	country VARCHAR(256)
);
