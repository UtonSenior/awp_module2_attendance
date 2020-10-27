<?php 
    class crud{
        // private database object\
        private $db;

        //constructor to initialize private variable to the database connecttion
        function __construct($conn){
            $this->db = $conn;
        }

        // function to insert a new record into the attendee database
        public function insertAttendees($fname, $lname, $dob, $email, $contact, $specialty){
            try {
                // define sql statement to be executed
                $sql = "INSERT INTO attendee (firstname, lastname, dateofbirth, emailaddress, contactnumber, specialty_id) VALUES (:fname, :lname, :dob, :email, :contact, :specialty)";
                // prepare the sql statement for excecution
                $stmt = $this->db->prepare($sql);
                // bind all placeholders to the actual values
                $stmt->bindparam(':fname', $fname);                
                $stmt->bindparam(':lname', $lname);                
                $stmt->bindparam(':dob', $dob);        
                $stmt->bindparam(':email', $email);        
                $stmt->bindparam(':contact', $contact);                
                $stmt->bindparam(':specialty', $specialty); 
                
                $stmt->execute();
                return true;

            } catch (PDOException $e) {
                echo $e->getMessage();
                return false;
            }
        }

        public function getAttendees(){
            $sql = "SELECT * FROM attendee a INNER JOIN specialties s on a.specialty_id = s.specialty_id";
            $result = $this->db->query($sql);
            return $result;
        }

        public function getAttendeeDetails($id){
            $sql = "SELECT * FROM attendee a INNER JOIN specialties s on a.specialty_id = s.specialty_id WHERE attendee_id = :id";
            $stmt = $this->db->prepare($sql);
            $stmt->bindparam(':id', $id);
            $stmt->execute();
            $result = $stmt->fetch();
            return $result;
        }

        public function getSpecialties(){
            $sql = "SELECT * FROM specialties";
            $result = $this->db->query($sql);
            return $result;
        }
        
    }
?>