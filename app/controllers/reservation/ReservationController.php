<?php

namespace App\reservation;
require_once __DIR__ . '/../../../vendor/autoload.php';

use App\dao\DaoInterface;
use App\database\DbConfig;
use App\models\Reservation;
use Exception;

class ReservationController implements DaoInterface
{

    private $database;

    /**
     * @param $database
     */
    public function __construct()
    {
        $dbconfig = new DbConfig();
        $this->database = $dbconfig->getConnection();
    }


    public function save($Reservation)
    {
        try {

            $sql = "INSERT INTO `reservation`(`description`, `reservation_date`, `return_date`, `is_returned`, `id_book`) VALUES (:description, :reservation_date, :return_date, :is_returned, :id_book)";
            $statement = $this->database->prepare($sql);
            $description = $Reservation->getDescription();
            $return_date = $Reservation->getReturnDate();
            $is_returned = $Reservation->getIsReturned();
            $id_book = $Reservation->getIdBook();
            $current_date = date('Y-m-d');
            $statement->bindParam(':description', $description);
            $statement->bindParam(':reservation_date', $current_date);
            $statement->bindParam(':return_date', $return_date);
            $statement->bindParam(':is_returned', $is_returned);
            $statement->bindParam(':id_book', $id_book);
            $statement->execute();

            $path = "../../views/reservation/show.php";
            header("Location :".$path);

        } catch (\Exception $e) {
            echo $e->getMessage();
        }

        try{
            $id_book = $Reservation->getIdBook();
            $sqlUpdateAvailableCopies = "UPDATE `book` SET `available_copies` = `available_copies` - 1 WHERE `id` = :id_book";
            $statement = $this->database->prepare($sqlUpdateAvailableCopies);
            $statement->bindParam(':id_book', $id_book);
            $statement->execute();

        } catch (\Exception $e) {
            echo $e->getMessage();
        }

    }


    public function update($Reservation)
    {
        try{
            $sql = "UPDATE `reservation` SET `description`=:description,`reservation_date`=:reservation_date,`return_date`=:return_date,`is_returned`=:is_returned,`id_book`=:id_book WHERE id = :id ";
            $statement = $this->database->prepare($sql);

            $id = $Reservation->getId();
            $description = $Reservation->getDescription();
            $reservation_date = $Reservation->getReservationDate();
            $return_date = $Reservation->getReturnDate();
            $is_returned = $Reservation->getIsReturned();
            $id_book = $Reservation->getIdBook();

            $statement->bindParam(':id', $id);
            $statement->bindParam(':description', $description);
            $statement->bindParam(':reservation_date', $reservation_date);
            $statement->bindParam(':return_date', $return_date);
            $statement->bindParam(':is_returned', $is_returned);
            $statement->bindParam(':id_book', $id_book);
            $statement->execute();
            return true;
        }catch (\Exception $e){
            echo $e->getMessage();
        }

        try {

            if ($Reservation->getIsReturned() === 'Yes') {
                $id_book = $Reservation->getIdBook();
                $sqlUpdateAvailableCopies = "UPDATE `book` SET `available_copies` = `available_copies` + 1 WHERE `id` = :id_book";
                $statement = $this->database->prepare($sqlUpdateAvailableCopies);
                $statement->bindParam(':id_book', $id_book);
                $statement->execute();
            }

            return true;
        } catch (\Exception $e) {
            echo $e->getMessage();
        }
    }

    public function findById($id)
    {
        try{
            $sql = "SELECT * FROM `reservation` WHERE id = :id";
            $statement = $this->database->prepare($sql);
            $statement->bindParam(':id', $id);
            $statement->execute();
            $result = $statement->fetch(\PDO::FETCH_ASSOC);
            return $result;
        }catch(\Exception $e){
            echo $e->getMessage();
        }
    }


    public function getTheMostReservation(){
        try{
            $sql = "SELECT b.title AS bookname, COUNT(r.id) AS reservation_count FROM book b LEFT JOIN reservation r ON b.id = r.id_book GROUP BY b.title ORDER BY reservation_count DESC;";
            $stmt = $this->database->prepare($sql);
            $stmt->execute();
            $result = $stmt->fetchAll(\PDO::FETCH_ASSOC);
            return $result;
        }catch(\PDOException $e){
            echo $e->getMessage();
        }
    }

    public function findAll()
    {
        try{
            $sql = "SELECT * FROM reservation";
            $statement = $this->database->prepare($sql);
            $statement->execute();
            $result = $statement->fetchAll(\PDO::FETCH_ASSOC);
            return $result;
            exit();
        }catch(\Exception $e){
            echo $e->getMessage();
        }
    }

    public function deleteById($id)
    {
        try{
            $sql = "DELETE FROM reservation WHERE id = :id";
            $statement = $this->database->prepare($sql);
            $statement->bindParam(':id',$id);
            $statement->execute();
            exit();
        }catch(\Exception $e){
            echo $e->getMessage();
        }
    }


}



if(isset($_POST["edit-submit"])){
    $reservation = new Reservation(null,null,null,null,null,null);
    $reservation->setId($_POST["id"]);
    $reservation->setDescription($_POST["description"]);
    $reservation->setReservationDate($_POST["reservation_date"]);
    $reservation->setReturnDate($_POST["return_date"]);
    $reservation->setIsReturned($_POST["is_returned"]);
    $reservation->setIdBook($_POST["id_book"]);
    $reservationimp = new ReservationController();
    try {
        $reservationimp->update($reservation);
        $path = "../../../views/reservation/show.php";
        header("Location: " . $path);
        exit;
    }

    catch (\PDOException $e) {
        echo "Error updating book: " . $e->getMessage();

    } catch (Exception $e) {
        echo "Error: " . $e->getMessage();
    }
}


if(isset($_POST["submit"])) {
    $reservation = new Reservation(null, null, null, null, null, null);
    $reservation->setDescription($_POST["description"]);
    $reservation->setReservationDate(date('Y-m-d'));
    $reservation->setReturnDate($_POST["return_date"]);
    $reservation->setIsReturned($_POST["is_returned"]);
    $reservation->setIdBook($_POST["id_book"]);
    $reservationimp = new ReservationController();

    try {
        $reservationimp->save($reservation);
        $path = "../../../views/reservation/show.php";
        header("Location: " .$path);
        exit;
    } catch (\PDOException $e) {
        echo "Error updating book: " . $e->getMessage();
    } catch (Exception $e) {
        echo "Error: " . $e->getMessage();
    }
}



