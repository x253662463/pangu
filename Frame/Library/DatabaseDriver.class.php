<?php
/**
 * Creator: xie
 * Time: 2017/11/28 17:40
 */

namespace Frame\Library;


abstract class DatabaseDriver
{

    //连接配置
    protected $config = array();

    protected $pdo_config = array(

    );

    public function connect(){
        try{
            $dbh = new \PDO('mysql:host=localhost;dbname=pangu', 'root', 'root');
            $rs = $dbh->query('SELECT * FROM name');
            $rs->setFetchMode(\PDO::FETCH_ASSOC);
            var_dump($rs->fetchAll());
            while ($row = $rs->fetch()){
                var_dump($row);
            }
        } catch (\PDOException $e){
            echo $e->getMessage();
        }
    }

}