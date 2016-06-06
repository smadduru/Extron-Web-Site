<?php
/**
 * Created by PhpStorm.
 * User: Subbu
 * Date: 02-12-2015
 * Time: 13:21
 */

namespace smadduru\finalP;


require_once 'I_Course_Repo.php';
require_once 'Course.php';

class db_course_repos implements I_Course_Repo
{


    private $dbfile = 'course_db_pdo.sqlite';
    private $db;

    public function __construct(){

        $this->db = new \PDO('sqlite:' . $this->dbfile);


        $this->db->exec("CREATE TABLE IF NOT EXISTS courses (Id INTEGER PRIMARY KEY, Fullname TEXT, Coursename TEXT, Email TEXT, Number Text)");
    }


    public function saveCourse($course)
    {

        if ($course->getId() != '') {

            $stmh = $this->db->prepare("UPDATE courses SET Fullname = :name, Coursename =:coursename, Email = :email, Number = :number WHERE id = :id ");
            $stmh->bindParam(':name', $course->getFullname());
            $stmh->bindParam(':coursename', $course->getCoursename());
            $stmh->bindParam(':email', $course->getEmail());
            $stmh->bindParam(':number', $course->getNumber());
            $stmh->bindParam(':id', $course->getId());
            $stmh->execute();

        } else {

            $stmh = $this->db->prepare("INSERT INTO courses (Fullname, Coursename, Email, NUMBER ) VALUES (:name ,:coursename ,:email ,:number)");
            $stmh->bindParam(':name', $course->getFullname());
            $stmh->bindParam(':coursename', $course->getCoursename());
            $stmh->bindParam(':email', $course->getEmail());
            $stmh->bindParam(':number', $course->getNumber());
            $stmh->execute();

        }
    }
    public function getAllCourses()
    {
        // TODO: Implement getAllCourses() method.
        $courselist = array();
        $result = $this->db->query('SELECT * FROM courses');
        foreach($result as $row) {
            $aCourse = new Course();
            $aCourse->setFullname($row['Fullname']);
            $aCourse->setCoursename($row['Coursename']);
            $aCourse->setEmail($row['Email']);
            $aCourse->setNumber($row['Number']);
            $aCourse->setId($row['Id']);
            $courselist[$aCourse->getId()] = $aCourse;
        }
        return $courselist;
    }

    public function getCourseById($id)
    {
        // TODO: Implement getCourseById() method.
        $courseList = $this->getAllCourses();
        if (array_key_exists($id, $courseList)) {
            return $courseList[$id];
        }

    }

    public function deleteCourse($courseId)
    {
        // TODO: Implement deleteCourse() method.

        $stmh = $this->db->prepare("DELETE FROM courses WHERE id = :id");
        $stmh->bindParam(':id', intval($courseId));
        $stmh->execute();
    }


}