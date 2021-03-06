
<?php

    /**
     * File that takes the user input and builds the query.
     */

    $joined = False;
    $where = False;

    $sort1 = $_POST['sort1'];
    $sort2 = $_POST['sort2'];
    $group = $_POST['group'];

    if ($sort1 == "C.continent" || $sort1 == "C.population" ||
        $sort2 == "C.continent" || $sort2 == "C.population" ||
        $group == "L.country") {
        $ordjoin = True;
    } else {
        $ordjoin = False;
    }

    // check if all tables need to be joined
    if ($ordjoin || $cont = $_POST['cont'] || $pop = $_POST['pop']) {
        $heads = array("S.genus_species", "S.common_name", "C.continent",
                       "L.country", "C.population", "S.author", "S.year",
                       "S.venomous", "S.live_bearing");

        // joining the tables
        $joined = True;
        $qry = " snake S INNER JOIN lives_in L";
        $qry .= " ON S.genus_species=L.genus_species";
        $qry .= " INNER JOIN country C ON L.country=C.name";

        // for searching on continent
        if ($cont = $_POST['cont']) {
            if ($where) {
                $qry .= " AND C.continent='" . $cont . "'";
            } else {
                $qry .= " WHERE C.continent='" . $cont . "'";
                $where = True;
            }
            $heads = array_diff($heads, array("C.continent"));
        }

        // for searching on population
        if ($pop = $_POST['pop']) {
            if ($comp = $_POST['comp']) {
                $adder = "C.population" . $comp . $pop;
                if ($where) {
                    $qry .= " AND " . $adder;
                } else {
                    $qry .= " WHERE " . $adder;
                    $where = True;
                }
                if ($comp == "=") {
                    $heads = array_diff($heads, array("C.population"));
                }
            }
        // removing population from headers if it is extraneous
        } elseif ($sort1 != "C.population" && $sort2 != "C.population") {
            $heads = array_diff($heads, array("C.population"));
        }

    } else {
        // only joining snake and lives_in
        $heads = array("S.genus_species", "S.common_name", "L.country",
                       "S.author", "S.year", "S.venomous", "S.live_bearing");
        $qry = " snake S INNER JOIN lives_in L";
        $qry .= " ON S.genus_species=L.genus_species";
    }

    // if searching on genus
    if ($genus = $_POST['genus']) {
        if ($where) {
            $qry .= " AND S.genus='" . $genus . "'";
        } else {
            $qry .= " WHERE S.genus='" . $genus . "'";
            $where = True;
        }
    }
    // if searching on species
    if ($species = $_POST['species']) {
        if ($where) {
            $qry .= " AND S.species='" . $species . "'";
        } else {
            $qry .= " WHERE S.species='" . $species . "'";
            $where = True;
        }
    }
    // if searching on higher taxa
    if ($htaxa = $_POST['htaxa']) {
        if ($where) {
            $qry .= " AND S.high_taxa LIKE '%" . $htaxa . "%'";
        } else {
            $qry .= " WHERE S.high_taxa LIKE '%" . $htaxa . "%'";
            $where = True;
        }
        // add higher taxa to the headers
        array_unshift($heads, "high_taxa");
    }
    // if searching on the common name
    if ($cname = $_POST['cname']) {
        if ($where) {
            $qry .= " AND S.common_name LIKE '%" . $cname . "%'";
        } else {
            $qry .= " WHERE S.common_name LIKE '%" . $cname . "%'";
            $where = True;
        }
    }
    // if searching on country
    if ($cnrty = $_POST['cnrty']) {
        if ($where) {
            $qry .= " AND L.country='" . $cnrty . "'";
        } else {
            $qry .= " WHERE L.country='" . $cnrty . "'";
            $where = True;
        }
    }
    // if searching on author/discoverer
    if ($auth = $_POST['auth']) {
        if ($where) {
            $qry .= " AND S.author LIKE '%" . $auth . "%'";
        } else {
            $qry .= " WHERE S.author LIKE '%" . $auth . "%'";
            $where = True;
        }
    }
    // if searching on year discovered
    if ($yeardis = $_POST['yeardis']) {
        // tframe is > | < | =
        if ($tframe = $_POST['tframe']) {
            $adder = "S.year" . $tframe . $yeardis;
            if ($where) {
                $qry .= " AND " . $adder;
            } else {
                $qry .= " WHERE " . $adder;
                $where = True;
            }
            if ($tframe == "=") {
                $heads = array_diff($heads, array("S.year"));
            }
        }
    }
    // if searching on venomous
    if ($venom = $_POST['venom']) {
        $adder = "S.venomous" . $venom;
        if ($where) {
            $qry .= " AND " . $adder;
        } else {
            $qry .= " WHERE " . $adder;
            $where = True;
        }
    }
    // if searching on live bearing
    if ($liveb = $_POST['liveb']) {
        $adder = "S.live_bearing" . $liveb;
        if ($where) {
            $qry .= " AND " . $adder;
        } else {
            $qry .= " WHERE " . $adder;
            $where = True;
        }
    }

    // if grouping and counting
    if ($groupby = $_POST['group']) {
        if ($groupby == "S.genus_species") {
            $endqry = " GROUP BY S.genus_species ";
            // moving those items to the front
            $heads = array_diff($heads, array("L.country", "L.population", "S.genus_species", "S.common_name"));
            array_unshift($heads, "S.genus_species", "S.common_name", "COUNT(*)");
        }
        if ($groupby == "L.country") {
            $endqry = " GROUP BY L.country ";
            // these are the only headers necessary
            $heads = array("L.country", "C.population", "COUNT(*)");

        }
    } else {
        $endqry = "";
    }

    if ($sort1 = $_POST['sort1']) {

        // check that not sorting on count without specifiying something to count
        if (!($sort1 == "COUNT(*)" && !$_POST['group'])) {

            // first order by
            $endqry .= " ORDER BY " . $sort1;
            if ($sort1dir = $_POST['sort1dir']) {
                $endqry .= " " . $sort1dir;
            }

            // second orcer by
            if ($sort2 = $_POST['sort2']) {
                $endqry .= ", " . $sort2;
                if ($sort2dir = $_POST['sort2dir']) {
                    $endqry .= " " . $sort2dir;
                }
                // moving those headers to the front
                if ($sort2 == "C.population") {
                    $heads = array_diff($heads, array("L.country", "C.population"));
                    array_unshift($heads, "L.country", "C.population");
                } else if ($sort2 == "COUNT(*)") {
                } else {
                    $heads = array_diff($heads, array($sort2));
                    array_unshift($heads, $sort2);
                }

            }

            // moving those headers to the front
            if ($sort1 == "C.population") {
                $heads = array_diff($heads, array("L.country", "C.population"));
                array_unshift($heads, "L.country", "C.population");
            } else if ($sort1 == "COUNT(*)") {
            } else {
                $heads = array_diff($heads, array($sort1));
                array_unshift($heads, $sort1);
            }
        }
    }

    // expanding header array
    $qrybeg = "SELECT " . implode(", ", $heads) . " FROM";
    $allqry = $qrybeg . $qry . $endqry;

    echo $allqry;

    session_start();
    $_SESSION['headers'] = $heads;
    $_SESSION['querystring'] = $allqry;

    // redirecting
    header("Location: https://snake-sssearcher.herokuapp.com/php/display.php"); /* Redirect browser */
    exit();

?>


