<?php
if(isset($_POST['login']) || isset($_SESSION['login'])){
    include("mods/login.php");
    
    if(isset($_SESSION['logged']) && $_SESSION['logged']){
        if($_SESSION['privileges'] == "Admin"){
            include("views/nav.php");
            include("views/admin/navAdmin.php");

        }else{
            include("views/nav.php");
        }
            
        if (isset($_GET['section'])) {
            switch ($_GET['section']) {
                case 'user':
                    if($_SESSION['privileges'] == "Admin"){
                        include("mods/admin/admin.php");

                        if(isset($_GET['action'])){
                            switch ($_GET['action']) {
                                case 'modifUser':
                                    include('mods/admin/newChangement.php');
                                    header('refresh:0;url=?route=login&section=user');
                                    break;
                                
                                
                            }
                            
                        }                            
                    }
                    break;
                
                case 'categorie':
                
                    if($_SESSION['privileges'] == "Admin"){
                        include('views/admin/listecatemodif.php');
                        if(isset($_GET['action'])){
                            switch ($_GET['action']) {
                                case 'ajoutCate':
                                    include('views/admin/form-cate.php');
                                    if(isset($_GET['from']) == "database"){
                                        include('mods/admin/categorie.php');
                                        if(isset($_SESSION['ajoutCater']) && $_SESSION['ajoutCater']){
                                            echo "Catégorie bien ajouté";
                                        }
                                    }
                                    break;

                                case 'deleteCate':
                                    if($_SESSION['privileges'] == "Admin"){
                                        include('mods/admin/deletecate.php');
                                        echo "Catégorie bien supprimé";
                                    }
                                    break;

                                case 'modifCate':
                                    
                                    if(isset($_GET['method']) == "modif"){
                                        include('views/admin/formcatemodif.php');
                                        if(isset($_GET['from']) == "database"){
                                            include('mods/admin/modcate.php');
                                            if(isset($finModCate)&&$finModCate==true){
                                                echo "Catégorie bien modifié";
                                            }
                                        }
                                    }
                                    
                                    
                                    break;
                            }
                        }
                    }
                    break;

                case 'produit':
                    if($_SESSION['privileges'] == 'Admin'){
                        include('views/admin/affichproduit.php');
                        if(isset($_GET['action'])){
                            switch ($_GET['action']) {
                                case 'ajoutProduit':
                                    include('views/admin/form-produits.php');
                                    if(isset($_GET['from']) == 'database'){
                                        include('mods/admin/produit.php');
                                        if(isset($_SESSION['addProd']) && $_SESSION['addProd']){
                                            echo "Produit bien ajouté";
                                        }
                                    }
                                    
                                    break;

                                case 'deleteProduit':
                                    if($_SESSION['privileges'] == "Admin"){
                                        include('mods/admin/deleteproduit.php');
                                        echo "Produit bien supprimé";
                                    }
                                    break;

                                case 'modifProduit':
                                    if($_SESSION['privileges'] == "Admin"){
                                        include('views/admin/modifproduit.php');
                                        if(isset($_GET['from']) == "database"){
                                            include('mods/admin/modproduit.php');
                                            if(isset($finTraitement) && $finTraitement == true){
                                                echo "Produit bien modifié";
                                            }
                                        }
                                    }
                                    
                                    break;
                            }
                        }
                    }
                    break;
                case 'question':
                    if($_SESSION['privileges'] == 'Admin'){
                        include('views/admin/affichQuestion.php');
                        if(isset($_GET['action'])){
                            switch($_GET['action']){
                                case 'delete':
                                    include('mods/admin/deleteQuestion.php');
                                    header("refresh:0;url=?route=login&section=question");
                                    break;
                            }
                        }
                    }
                    break;
                
            }
        }
    }
}else{
    include("views/login_form.php");
}
?>

