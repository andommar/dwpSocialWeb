<?php

require_once('DbConn.php');

class CompanyModel

{
    function getCompanyInfo()
    {
        try {
            $db = new Dbconn();
            $sql = 'SELECT * from V_AboutUs_company';
            $result = $db->selectQuery($sql);
            return $result;
        } catch (\PDOException $ex) {
            print($ex->getMessage());
        }
    }
    function getCompanyDevelopers()
    {
        try {
            $db = new Dbconn();
            $sql = 'SELECT * from V_AboutUs_developers';
            $result = $db->selectQuery($sql);
            return $result;
        } catch (\PDOException $ex) {
            print($ex->getMessage());
        }
    }
    function getCompanyWebInsights()
    {
        try {
            $db = new Dbconn();
            $sql = 'SELECT * from V_AboutUs_web';
            $result = $db->selectQuery($sql);
            return $result;
        } catch (\PDOException $ex) {
            print($ex->getMessage());
        }
    }
}
