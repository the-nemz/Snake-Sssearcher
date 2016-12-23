<?php

    /**
     * File that takes the user input for the variables desired in the query.
     */

?>

<html>
    
    <head>
        <style>
            body {
                text-align: center;
                background-color: #262626;
                font-family: Tahoma;
                text-shadow: -1px 0 black, 0 1px black, 1px 0 black, 0 -1px black;
            }
            input, select {
                border-style: solid;
                border-color: black;
                border-radius: 3px;
                border-width: 2px; 
            }
            h1 {
                text-shadow: -2px 0 black, 0 2px black, 2px 0 black, 0 -2px black;
                margin-bottom: 0;
                padding-bottom: 7px;
            }
            h3 {
                display: inline;
            }
            select, input {
                margin-bottom: 5px;
            }
        </style>
    </head>

    <body text="red">

<!--     <div style="width: 100%; display: table;">
        <div style="display: table-row;">
            <div style="width: 38%; display: table-cell;" align="right"><img src="snake-clip2.png" height="20%"></div>
            <div style="display: table-cell;" align="left"><h1>Sack's Snake Sssearcher</h1></div>
        </div>
    </div> -->

    <div style="float: center; margin-top: 20px;">
        <img src="snake-clip2.png" height="20%"><br>
        <h1>Sack's Snake Sssearcher</h1>
        <h3>by Isaac Nemzer</h3><br><br>
    </div>

    <form action="build.php" method="post">

    Genus: <input type="text" name="genus" style="background-color: #595959"><br>

    Species: <input type="text" name="species" style="background-color: #595959"><br>

    Higher taxa: <input type="text" name="htaxa" style="background-color: #595959"><br>

    Common name: <input type="text" name="cname" style="background-color: #595959"><br>

    Continent: <select name="cont" style="background-color: #595959">
      <option value=""></option>
      <option value="Africa">Africa</option>
      <option value="Asia">Asia</option>
      <option value="Europe">Europe</option>
      <option value="North America">North America</option>
      <option value="South America">South America</option>
      <option value="Oceania">Oceania</option>
    </select><br>

    Country: <input type="text" name="cnrty" style="background-color: #595959"><br>

    With population: <select name="comp" style="background-color: #595959">
      <option value=""></option>
      <option value=">">More than</option>
      <option value="<">Less than</option>
      <option value="=">Equal to</option>
    </select> <input type="text" name="pop" style="background-color: #595959"><br>

    Discoverer: <input type="text" name="auth" style="background-color: #595959"><br>

    Year discovered: <select name="tframe" style="background-color: #595959">
      <option value=""></option>
      <option value="<">Before</option>
      <option value=">">After</option>
      <option value="=">In</option>
    </select> <input type="text" name="yeardis" style="background-color: #595959"><br>

    Venomous: <select name="venom" style="background-color: #595959">
      <option value=""></option>
      <option value="='Yes'">Yes</option>
      <option value="='No'">No</option>
    </select><br>

    Live bearing: <select name="liveb" style="background-color: #595959">
      <option value=""></option>
      <option value="='Yes'">Yes</option>
      <option value="='No'">No</option>
    </select><br>

    Count the: <select name="group" style="background-color: #595959">
      <option value=""></option>
      <option value="S.genus_species">Countries with each Species</option>
      <option value="L.country">Species in each Country</option>
    </select><br>

    Sort by: <select name="sort1" style="background-color: #595959">
      <option value=""></option>
      <option value="COUNT(*)">Count</option>
      <option value="S.genus_species">Species</option>
      <option value="C.continent">Continent</option>
      <option value="L.country">Country</option>
      <option value="S.author">Discoverer</option>
      <option value="S.year">Year discovered</option>
      <option value="C.population">Population</option>
      <option value="S.venomous">Venomous</option>
      <option value="S.live_bearing">Live bearing</option>
    </select> <select name="sort1dir" style="background-color: #595959">
      <option value="">Direction</option>
      <option value="ASC">Ascending</option>
      <option value="DESC">Descencding</option>
    </select> and <select name="sort2" style="background-color: #595959">
      <option value=""></option>
      <option value="COUNT(*)">Count</option>
      <option value="S.genus_species">Species</option>
      <option value="C.continent">Continent</option>
      <option value="L.country">Country</option>
      <option value="S.author">Discoverer</option>
      <option value="S.year">Year discovered</option>
      <option value="C.population">Population</option>
      <option value="S.venomous">Venomous</option>
      <option value="S.live_bearing">Live bearing</option>
    </select> <select name="sort2dir" style="background-color: #595959">
      <option value="">Direction</option>
      <option value="ASC">Ascending</option>
      <option value="DESC">Descencding</option>
    </select><br>

    <input type="submit" value="Sssearch!" style="background-color: #77b300; height: 32px; width: 80px; margin-top: 10px">
    </form>

    </body>

</html>