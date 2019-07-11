<?php
    require('include/Connection.php');
    require('include/Product.php');
    require('include/Shelf.php');
    require('include/Supplier.php');
    $db = new Database;
    $dbLink = $db->getConnection();
    if(isset($_POST['addNewProduct']))
    {
        $product = new Product($dbLink);
        $product->addProduct($_POST['name'],$_POST['barcode'],$_POST['quantity'],$_POST['minimum'],$_POST['supplier'],$_POST['shelf']);
        header("Location: Products.php?added=true");
    }
    if(isset($_GET['delete']))
    {
        $product = new Product($dbLink);
        $product->deleteProduct($_GET['delete']);
        header("Location: Products.php?deleted=true");
    }
    if(isset($_POST['updateProduct']))
    {
        $product = new Product($dbLink);
        $product->updateProduct($_POST['name'],$_POST['barcode'],$_POST['quantity'],$_POST['minimum'],$_POST['shelf'],$_POST['product']);
        header("Location: Products.php?updated=true");
    }
    if(isset($_POST['addNewSupplier']))
    {
        $supplier= new Supplier($dbLink);
        $supplier->addSupplier($_POST['name'],$_POST['contact'],$_POST['address'],$_POST['status']);
        header("Location: Suppliers.php?added=true");
    }
    if(isset($_POST['updateSupplier']))
    {
        $supplier = new Supplier($dbLink);
        if($supplier->updateSupplier($_POST['name'],$_POST['contact'],$_POST['address'],$_POST['status'],$_POST['supplierID']))
            {
            header("Location: Suppliers.php?updated=true");
        }
        else{
            header("Location: Suppliers.php?updated=false");
        }
        
    }
    if(isset($_GET['deleteSupplier']))
    {
        $supplier= new Supplier($dbLink);
        if($supplier->deleteSupplier($_GET['deleteSupplier']))
        {
            header("Location: Suppliers.php?deleted=true");
        }
        else{
            header("Location: Suppliers.php?deleteFailed=true");
        }
    }
    if(isset($_POST['addNewShelf']))
    {
        $shelf= new Shelf($dbLink);
        $shelf->addShelf($_POST['name']);
        header("Location: Shelfs.php?added=true");
    }
    if(isset($_GET['deleteShelf']))
    {
        $shelf = new Shelf($dbLink);
        if($shelf->deleteShelf($_GET['deleteShelf']))
        {
            header("Location: Shelfs.php?deleted=true");
        }
        else{
            header("Location: Shelfs.php?deleteFailed=true");
        }
    }
?>