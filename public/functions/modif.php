<?php
    require '../functions/bdd.php';
    require '../class/class.php';
    $id=$_GET['id'];
    $userManager = new UserManager($bdd);
    $myUser=$userManager->get($id);

        if(isset($_POST['submit'])){
            if($_POST['nom']!=''){
                if($_POST['prenom']!=''){
                    if($_POST['mail']!=''){
                        if(($_POST['oldPassword']!='')&&($_POST['password']!='')&&($_POST['verifPassword']!='')){
                            if(password_verify($_POST['oldPassword'],$myUser->password_utilisateur())){
                                if(empty($_POST['password'])||($_POST['password']==$_POST['verifPassword'])){
                                    $myUser->setPassword_utilisateur(password_hash($_POST['password'],PASSWORD_BCRYPT,['cost'=>12]));
                                    $myUser->setNom_utilisateur($_POST['nom']);
                                    $myUser->setPrenom_utilisateur($_POST['prenom']);
                                    $myUser->setMail_utilisateur($_POST['mail']);
                                    $myUser->setDate_naissance_utilisateur($_POST['date']);
                                    $userManager->update($myUser);
                                    header('Location: ../../index.php?action=listUser');
                                }else{
                                    header("Location: ../../index.php?action=formModif&err=1&id=".$_GET['id']);
                                }
                            }else{
                                header("Location: ../../index.php?action=formModif&err=2&id=".$_GET['id']);
                            }
                        }else{
                            header("Location: ../../index.php?action=formModif&err=3&id=".$_GET['id']);
                        }
                    }else{
                        header("Location: ../../index.php?action=formModif&err=4&id=".$_GET['id']);
                    }
                }else{
                    header("Location: ../../index.php?action=formModif&err=5&id=".$_GET['id']);
                }
            }else{
                header("Location: ../../index.php?action=formModif&err=6&id=".$_GET['id']);
            }
            
        }
    ?>