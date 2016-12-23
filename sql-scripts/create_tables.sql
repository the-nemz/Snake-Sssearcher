CREATE TABLE IF NOT EXISTS snake(
	genus_species VARCHAR(256) NOT NULL,
	high_taxa VARCHAR(256),
	genus VARCHAR(256) NOT NULL,
	species VARCHAR(256) NOT NULL,
	author VARCHAR(256),
	year INT,
	common_name VARCHAR(256),
	venomous VARCHAR(256),
	live_bearing VARCHAR(256),
	PRIMARY KEY (genus_species)
);

CREATE TABLE IF NOT EXISTS country(
	name VARCHAR(256) NOT NULL,
	population INT,
	continent VARCHAR(256) NOT NULL
);

CREATE TABLE IF NOT EXISTS lives_in(
	genus_species VARCHAR(256),
	country VARCHAR(256)
);
