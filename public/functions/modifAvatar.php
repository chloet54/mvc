<?php
    require '../functions/bdd.php';
    require '../class/class.php';
    $id=$_GET['id'];

    $statusMsg='';
    $dir='../images/upload/';


    if(isset($_POST['submitAvatar']) && !empty($_FILES['img']['name'])){
            $allowTypes=array('jpg','png','PNG','JPEG', 'jpeg','gif','pdf');
            $fileName=basename($_FILES['img']['name']);
            $target = $dir.$fileName;
            $type = pathinfo($target,PATHINFO_EXTENSION);
            
            if(in_array($type,$allowTypes)){
                if(move_uploaded_file($_FILES['img']['tmp_name'],$target)){
                    $req = $bdd->prepare("UPDATE utilisateur SET avatar=? WHERE id_user=".$id);
                    $req->execute(array($fileName));
                    if($req){
                        header('Location: ../../index.php?action=listUser&message=1');
                        
                    }else{
                        header('Location: ../../index.php?action=listUser&message=2');
                        
                    }
                }else{
                    header('Location: ../../index.php?action=listUser&message=3');
                    
                }
            }else{
                header('Location: ../../index.php?action=listUser&message=4');
                
            }
    }else{
        header('Location: ../../index.php?action=listUser&message=5');
        
    }
?>