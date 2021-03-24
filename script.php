<?php
    $pdo = new PDO(
        "mysql:host=localhost;dbname=boutique",
        "root",
        ""
    );
    
    header('Content-Type: application/json');
    $json_str = file_get_contents("products.json");
    $json_array = json_decode($json_str, true);

    //var_dump($json_array);
    foreach ($json_array as $key => $product) {
        //Inserting products
        $sql_product = "INSERT INTO product VALUES (
                                    '{$product["ref"]}',
                                    '{$product["name"]}',
                                    '{$product["type"]}',
                                    '{$product["price"]}',
                                    '{$product["shipping"]}',
                                    '{$product["description"]}',
                                    '{$product["manufacturer"]}',
                                    '{$product["image"]}')";
        try{
            $ret = $pdo->exec($sql_product);
        }
        catch(Exception $e){
            echo $e->getMessage()."\n";
            if($e->getCode()==42000){
                //echo $e."\n";
                //echo $sql_product."\n";
            }
        }
        
        $categories = $product["category"];
        foreach ($categories as $key => $category) {
            //Inserting categories
            $sql_category = "INSERT INTO category VALUES (
                                        '{$category["id"]}',
                                        '{$category["name"]}')";
            try{
                $ret = $pdo->exec($sql_category);
            }
            catch(Exception $e){
                echo $e->getMessage()."\n";
            }
            //Affecting products to categories 
            $sql_prod_cat = "INSERT INTO prod_cat VALUES (
                                        '{$product["ref"]}',
                                        '{$category["id"]}')";
            try{
                $ret = $pdo->exec($sql_prod_cat);
            }
            catch(Exception $e){
                echo $e->getMessage()."\n";
            }                            
        }


    }
?>