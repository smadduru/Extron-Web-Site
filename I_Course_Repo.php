<?php


namespace smadduru\finalP;


interface I_Course_Repo
{
    public function saveCourse($course);
    public function getAllCourses();
    public function getCourseById($id);
    public function deleteCourse($courseId);

}