<?php 
class Provas extends modelHelper{
    public function getAllMaterias(){
        $sql = "SELECT * FROM materias";
        $sql = $this->db->query($sql);
        $data = $sql->fetchAll();
        return $data;
    }

    public function insertQuestao($materia, $questao, $id_autor, $alt1, $alt2, $alt3, $alt4, $alt5, $right_alt){
        $sql = "INSERT INTO questions_db(id_question, id_materia, id_autor, question_text, option_1, option_2, option_3, option_4, option_5, right_option_id, date)
        VALUES(NULL, :materia, :id_autor, :questao, :alt1, :alt2, :alt3, :alt4, :alt5, :right_alt, :date)";
        $sql = $this->db->prepare($sql);
        $sql->bindValue(':materia', $materia);
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
        $sql = "SELECT questions_db.id_question, questions_db.id_materia, questions_db.id_autor, questions_db.question_text, questions_db.option_1, questions_db.option_2, questions_db.option_3, questions_db.option_4, questions_db.option_5, questions_db.right_option_id, questions_db.date, admins.first_name, materias.materia 
                FROM questions_db 
                INNER JOIN materias ON questions_db.id_materia = materias.id 
                INNER JOIN admins ON questions_db.id_autor = admins.id 
                ORDER BY questions_db.id_question DESC LIMIT 5";
        $sql = $this->db->query($sql);
        $dados = $sql->fetchAll(PDO::FETCH_ASSOC);

        return $dados;
    }

}


?>