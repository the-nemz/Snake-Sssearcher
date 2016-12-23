SELECT S.genus_species, L.country
FROM snake INNER JOIN lives_in
ON S.genus_species=L.genus_species
LIMIT 10;