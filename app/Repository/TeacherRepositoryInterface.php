<?php

namespace App\Repository;

interface TeacherRepositoryInterface{

    public function getAllTeachers();

    // public function createTeacher();

    public function getSpecializations();

    public function getGender();

    public function storeTeachers($request);

    public function editTeachers($id);

    public function updateTeachers($request);

    public function deleteTeacher($request);





}