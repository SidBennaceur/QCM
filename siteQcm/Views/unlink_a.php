<div class ="row">
    <div class="col-xs-12" style="display:block;margin:auto;text-align:center">
            <?php
                if(isset($message)){
                    echo $message;
                }
                ?>
        <form name="change_answers" action="./index.php?page=lobby" method="POST">
                <h4>Formulaire de désindéxation des réponses</h4>
            <?php
            if(!empty($res))
            {   
                $id = $res[0]['ID'];
                $compteur_id = 0;
                $compteur = 0;
                $ans = 1;
                for($i = 0; $i < count($res);$i++)
                {
                    foreach($res[$i] as $key => $value)
                    {
                        if($compteur_id == 0)
                        {   
                            if(isset($res[($i+1)])){
                                if($id !== $res[($i+1)]['ID'])
                                        {
                                            $id = $res[$i]['ID'];
                                        }
                            }
                            if($key === "question" && $compteur_id ==0)
                            {
                                ?>
                                Question : <input type ='text' name='q_id[]' class="circle-box" value='<?= $res[$i]['ID']?>' 
                                style='width:30px' readonly>
                                <input type='text' class="texts" 
                                style='width:400px' name='question[]' required 
                                pattern="^[a-zA-Z0-9\s,-]{0,}[?.]+$" title="<?= $value?>" value='<?= $value?>'>
                                <ul>
                                <?php
                            } 
                            if ($key ==='reponse')
                            {
                                ?>
                                <li> <input type ='text' class="circle-box" name='<?php  echo "a_id[$compteur][]";?>' 
                                value='<?= $res[$i]['rep_id']?>' style='width:30px' pattern="^[0-9]+"  readonly> 
                                Réponse <?= $ans?>: <input type='text' name='<?php echo "answer[$compteur][]?>";?>' class="textsa"
                                required pattern="^[0-9A-Za-z' \(\)\/+]{1,}[?!.]{0,}" value='<?=$value?>'>
                                <select name='<?php echo "a_status[$compteur][]";?>' title='statut de la réponse'>
                                    <option value='<?= $res[$i]['statut'] ?>'><?=$res[$i]['statut']?></option>
                            </select><input type="checkbox" name="unlink_ans[]" value="<?php echo $res[$i]['p_ID'];?>"> Désindéxer </input>
                                </li>
                                <?php
                            }
                            if($key === 'answersAmount')
                            {
                                $ans++;
                                if(isset($res[($i+1)]['ID'])){

                                    if($id !== $res[($i+1)]['ID'])
                                    {
                                        $id = $res[$i]['ID'];
                                        $compteur_id = 0;
                                        echo "</ul>";
                                        $compteur++;
                                    } else if($id === $res[($i+1)]['ID']){
                                        $compteur_id++;
                                    }
                                } else {
                                    $compteur_id++;
                                }
                            }
                        } else {
                            if ($key ==='reponse')
                            {
                                ?>
                                <li> <input type ='text' class="circle-box" name='<?php  echo "a_id[$compteur][]";?>' 
                                value='<?= $res[$i]['rep_id']?>' style='width:30px' pattern="^[0-9]+"  readonly> 
                                Réponse <?= $ans?>: <input type='text' name='<?php echo "answer[$compteur][]?>";?>' class="textsa"
                                required pattern="^[0-9A-Za-z' \(\)\/+]{1,}[?!.]{0,}" value='<?=$value?>'>
                                <select name='<?php echo "a_status[$compteur][]";?>' title='statut de la réponse'>
                                    <option value='<?= $res[$i]['statut'] ?>'><?=$res[$i]['statut']?></option>
                            </select><input type="checkbox" name="unlink_ans[]" value="<?php echo $res[$i]['p_ID'];?>"> Désindéxer </input>
                                </li>
                                <?php
                            }
                            if($key === 'answersAmount')
                            {
                                $ans++;
                                if(isset($res[($i+1)]['ID'])){

                                    if($id !== $res[($i+1)]['ID'])
                                    {
                                        $id = $res[$i]['ID'];
                                        $compteur_id = 0;
                                        echo "</ul>";
                                        $compteur++;
                                    } else if($id === $res[($i+1)]['ID']){
                                        $compteur_id++;
                                    }
                                } else {
                                    $compteur_id++;
                                }
                            }
                        }
                    }
                    
                }
                
            }
            unset($compteur,$compteur_id,$ans,$id);
            ?>
            <br>
            <button class="btn btn-secondary" type="submit" name="ans_unlink" value="Modifier">Modifier</button>
        </form><br>
        <a href="./index.php?page=lobby" >Retour accueil enseignant</a>
    </div>
</div>
</body>

<style>
    select{
        border:0.5px solid #decba4;
        color:#3a6186;
    }
    .circle-box{
        border-radius:50%;
        border:none;
        text-align:center;
        background-color:gray;
        color:#FFFFFF;
    }
    .texts{
        border:none;
        color:#333333;
        background-color:#bdc3c7;
        border-radius:10px;
        font-weight:550;
    }
    .texts:focus{
        background-color:#FFFFFF;
    }
    .textsa{
        color:#556270;
        border:#2c3e50;
        font-weight:550;
    }
    .textsa:focus{
        background-color:#3a6073;
        color:#FFFFFF;
    }
</style>