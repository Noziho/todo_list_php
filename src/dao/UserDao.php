<?php


namespace App\dao;
interface UserDao
{
    function create();

    function edit();

    function delete();

    function getUserById();

    function getAll();
}