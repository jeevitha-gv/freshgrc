<?php
require_once "../../php/common/config.php";
session_start();
ob_start();
class dashboard{

//board dashboard chart
    public function totalmeetingschart(){
    $sql='SELECT title, count(*) AS count FROM boardindex GROUP BY title';
    $result=mysqli_query($link, $sql);
    $data=(mysqli_fetch_array($result));
    return $data['title'];  
    }
    public function approvechart(){
    $sql='SELECT boardindex.title, count(*) AS count FROM boardindex,boardpublish where boardindex.m_no= boardpublish.m_no GROUP BY title';
    $dbOps=new DBOperations();
    return $dbOps->fetchData($sql);    
    }
    public function returnchart(){
    $sql='SELECT boardindex.title, count(*) AS count FROM boardindex,boardminutes where boardindex.m_no= boardminutes.m_no GROUP BY title';
    $dbOps=new DBOperations();
    return $dbOps->fetchData($sql);    
    }
    public function cancelchart(){
    $sql='SELECT boardindex.title, count(*) AS count FROM boardindex,boardminutes where boardindex.m_no= boardminutes.m_no GROUP BY title';
    $dbOps=new DBOperations();
    return $dbOps->fetchData($sql);    
    }
}