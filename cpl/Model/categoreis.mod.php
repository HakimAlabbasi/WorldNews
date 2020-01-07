<?php

class categories_mode {
    // all commands Select
    const GET_ALL_CATEGORIES= 'SELECT *  FROM categories';
    const GET_ALL_CATEGORIES_ID= 'SELECT *  FROM categories WHERE cat_id = cat_id';

    const GET_ALL_CATEGORIES_MAIN_PARENT ='SELECT Ca_name ,cat_id FROM categories WHERE parent =0 AND  cat_id = cat_id';
    const GET_ALL_CATEGORIES_SUB_PARENT ='SELECT Ca_name FROM categories WHERE parent =1';














    //insert into categories
    const INSERT_ALL_CATEGORIES ='INSERT INTO categories
                                    (Ca_name,create_by,create_date,updates,create_status,parent)
                                    VALUES (:Ca_name,:create_by,:create_date,:updates,:create_status,:parent)';





// Delete Tables

const DELETE_CATEGORIES_DATA ='DELETE FROM categories WHERE cat_id =:cat_id';






// Update Categories

const UPDATE_CATEGORIES_ID ='UPDATE categories SET cat_id=:cat_id,Ca_name=:ca_Ca_name,create_by:create_by,create_date:create_date,updates:updates,create_status:create_status,parent:parent WHERE cat_id =:cat_id';





    public $Ca_name;
    public $create_by;
    public $create_date;
    public $update_date;
    public $create_status;
    public $parent;

}




