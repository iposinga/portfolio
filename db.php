<?php
$db_connection = null;
$db_statement = null;

/*
 * dbConnect
 * Maakt een verbinding met de database server
 */
function dbConnect()
{
   global $db_connection;
   try {
      // Proberen we de code uit

      // Stap 1. Connectie met de database
      $db_connection = new PDO(
         'mysql:host=37.97.201.78;dbname=alfacollege',
         'webgebruiker',
         super_secret: ${{ secrets.Wachtwoord }}
      );
   } catch(PDOException $error) {
      return false;
   }

   return true;
}

/*
 * dbQuery
 * Verstuur een SQL-statement naar de
 * database server en laat deze uitvoeren
 */
function dbQuery($sql_statement)
{
   global $db_connection, $db_statement;

   // Stap 3. SQL-opdracht naar de DB-server sturen
   $db_statement = $db_connection->prepare($sql_statement);
   $db_statement->execute();
}

/*
 * dbGetAll
 * Haal alle records op die als resultaat
 * van een SQL-statement nu klaar staan
 * op de database server
 */
function dbGetAll()
{
   global $db_statement;

   return $db_statement->fetchAll(PDO::FETCH_ASSOC);
}
