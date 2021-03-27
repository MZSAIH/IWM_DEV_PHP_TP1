<?php
    $pdo = new PDO(
        "mysql:host=localhost;dbname=boutique",
        "root",
        ""
    );
    
    header('Content-Type: application/json');

    $json_str = file_get_contents("products.json");
    
    $json_array = json_decode($json_str);

    $stmt_p = $pdo->prepare("INSERT INTO product VALUES (?,?,?,?,?,?,?,?)");
    $stmt_c = $pdo->prepare("INSERT INTO category VALUES (?,?)");
    $stmt_pc = $pdo->prepare("INSERT INTO prod_cat VALUES (?,?)");

    //var_dump($json_array);
    foreach ($json_array as $product) {
        //Inserting categories
        $stmt_p->bindValue(1, $product->ref, PDO::PARAM_STR);
        $stmt_p->bindValue(2, $product->name, PDO::PARAM_STR);
        $stmt_p->bindValue(3, $product->description, PDO::PARAM_STR);
        $stmt_p->bindValue(4, $product->type, PDO::PARAM_STR);
        $stmt_p->bindValue(5, $product->manufacturer, PDO::PARAM_STR);
        $stmt_p->bindValue(6, $product->image, PDO::PARAM_STR);
        $stmt_p->bindValue(7, $product->shipping, PDO::PARAM_STR);
        $stmt_p->bindValue(8, $product->price, PDO::PARAM_STR);
        try{
            $stmt_p->execute();
        }
        catch(Exception $e){
            echo $e->getMessage()."\n";
        }
        
        foreach ($product->category as $category) {
            //Inserting categories
             $stmt_c->bindValue(1, $category->id, PDO::PARAM_STR);
             $stmt_c->bindValue(2, $category->name, PDO::PARAM_STR);
            try{
                $stmt_c->execute();
            }
            catch(Exception $e){
                echo $e->getMessage()."\n";
            }
            //Affecting products to categories 
            $stmt_pc->bindValue(1, $product->ref, PDO::PARAM_STR);
            $stmt_pc->bindValue(2, $category->id, PDO::PARAM_STR);                            
            try{
                $stmt_pc->execute();
            }
            catch(Exception $e){
                echo $e->getMessage()."\n";
            }                            
        }


    }
?>