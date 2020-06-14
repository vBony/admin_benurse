<?php 
class Provas extends modelHelper{
    public function getAllProvas(){
        $sql = "SELECT * FROM provas";
        $sql = $this->db->query($sql);
        $data = $sql->fetchAll();
        return $data;
    }

    public function insertQuestao($prova, $questao, $id_autor, $alt1, $alt2, $alt3, $alt4, $alt5, $right_alt){
        $sql = "INSERT INTO questions_db(id_question, id_prova, id_autor, question_text, option_1, option_2, option_3, option_4, option_5, right_option_id, date)
        VALUES(NULL, :id_prova, :id_autor, :questao, :alt1, :alt2, :alt3, :alt4, :alt5, :right_alt, :date)";
        $sql = $this->db->prepare($sql);
        $sql->bindValue(':id_prova', $prova);
        $sql->bindValue(':id_autor', $id_autor);
        $sql->bindValue(':questao', $questao);
        $sql->bindValue(':alt1', $alt1);
        $sql->bindValue(':alt2', $alt2);
        $sql->bindValue(':alt3', $alt3);
        $sql->bindValue(':alt4', $alt4);
        $sql->bindValue(':alt5', $alt5);
        $sql->bindValue(':right_alt', $right_alt);
        $sql->bindValue(':date', date('d-m-y'));
        $sql->execute();
    }

    public function getLast5Questoes(){
        $sql = "SELECT questions_db.id_question, questions_db.id_prova, questions_db.id_autor, questions_db.question_text, questions_db.option_1, questions_db.option_2, questions_db.option_3, questions_db.option_4, questions_db.option_5, questions_db.right_option_id, questions_db.date, admins.first_name, provas.prova_name 
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