<!-- the class to connect to the database -->
 <?php 
//  creating the db h class for connecting to the database
class Dbh{
    // create some variables and the properties inside the class
    private $host = "localhost";
    private $dbname = "myfirstdatabase";
    private $dbusername = "root";
    private $dbpassword = "";

    // now accessing the private properties from the above class
    protected function connect(){
        try {
            // instantiate a new pdo object based on the pdo class
            // create a connection object to the databas
                $pdo = new PDO("mysql:host=" . $this->host . ";dbname=" . $this->dbname, $this->dbusername, $this->dbpassword);
            
                // attributes for the pdo connection
                $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

                // make sure because this is OOP
                return $pdo; 

            } catch (PDOException $e) {
                die("Connection failed" . $e->getMessage());
            }
            
    }


}