<?php 
class Provas extends modelHelper{
    public function getAllProvas(){
        $sql = "SELECT * FROM provas";
        $sql = $this->db->query($sql);
        $data = $sql->fetchAll();
        return $data;
    }

    public function insertQuestao($prova, $questao, $id_autor, $alt1, $alt2, $alt3, $alt4, $right_alt){
        $sql = "INSERT INTO questions_db(id_question, id_prova, id_autor, question_text, option_1, option_2, option_3, option_4, right_option, date)
        VALUES(NULL, :id_prova, :id_autor, :questao, :alt1, :alt2, :alt3, :alt4, :right_alt, :date)";
        $sql = $this->db->prepare($sql);
        $sql->bindValue(':id_prova', $prova);
        $sql->bindValue(':id_autor', $id_autor);
        $sql->bindValue(':questao', $questao);
        $sql->bindValue(':alt1', $alt1);
        $sql->bindValue(':alt2', $alt2);
        $sql->bindValue(':alt3', $alt3);
        $sql->bindValue(':alt4', $alt4);
        $sql->bindValue(':right_alt', $right_alt);
        $sql->bindValue(':date', date('d-m-y'));
        $sql->execute();
    }

    public function getQuestion($id_question){
            $sql = "SELECT provas.prova_name,admins.first_name, questions_db.id_prova, questions_db.id_autor, questions_db.question_text, questions_db.option_1, questions_db.option_2, questions_db.option_3, questions_db.option_4, questions_db.right_option, questions_db.date
                    FROM questions_db INNER JOIN admins ON questions_db.id_autor = admins.id 
                    INNER JOIN provas ON questions_db.id_prova = provas.id
                    WHERE questions_db.id_question = :id_question";
        $sql = $this->db->prepare($sql);
        $sql->bindValue(':id_question', $id_question);
        $sql->execute();

        if($sql->rowCount() > 0){
            $dados = $sql->fetchAll(PDO::FETCH_ASSOC);
            $dados_fix = array();
            $dados_fix['prova_name'] = $dados[0]['prova_name'];
            $dados_fix['first_name'] = $dados[0]['first_name'];
            $dados_fix['id_prova'] = $dados[0]['id_prova'];
            $dados_fix['id_autor'] = $dados[0]['id_autor'];
            $dados_fix['question_text'] = $dados[0]['question_text'];
            $dados_fix['o1'] = $dados[0]['option_1'];
            $dados_fix['o2'] = $dados[0]['option_2'];
            $dados_fix['o3'] = $dados[0]['option_3'];
            $dados_fix['o4'] = $dados[0]['option_4'];
            $dados_fix['right_option'] = $dados[0]['right_option'];
            $dados_fix['date'] = $dados[0]['date'];
            return $dados_fix;
        }else{
            return false;
        }
    }

    public function getLast5Questoes(){
        $sql = "SELECT questions_db.id_question, questions_db.id_prova, questions_db.id_autor, questions_db.question_text, questions_db.option_1, questions_db.option_2, questions_db.option_3, questions_db.right_option, questions_db.date, admins.first_name, provas.prova_name 
                FROM questions_db 
                INNER JOIN provas ON questions_db.id_prova = provas.id 
                INNER JOIN admins ON questions_db.id_autor = admins.id
                ORDER BY questions_db.id_question DESC LIMIT 5";
        $sql = $this->db->query($sql);
        $dados = $sql->fetchAll(PDO::FETCH_ASSOC);

        return $dados;
    }

    public function verificaNomeProva($nome){
        $sql = "SELECT * FROM provas WHERE prova_name = :prova_nome";
        $sql = $this->db->prepare($sql);
        $sql->bindValue(':prova_nome', $nome);
        $sql->execute();
        
        if($sql->rowCount() > 0){
            return true;
        }else{
            return false;
        }
    }

    public function insertProva($esp_id, $prova_name){
        $sql = "INSERT INTO provas(provas.id, id_specialties, prova_name) VALUES (NULL, :esp_id, :prova_name)";
        $sql = $this->db->prepare($sql);
        $sql->bindValue(':esp_id', $esp_id);
        $sql->bindValue(':prova_name', $prova_name);
        $sql->execute();
    }

    public function deleteQuestion($id_question){
        $sql = "DELETE FROM questions_db WHERE id_question = :id_question";
        $sql = $this->db->prepare($sql);
        $sql->bindValue(':id_question', $id_question);
        $sql->execute();
    }
}


?>