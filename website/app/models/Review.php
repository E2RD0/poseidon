<?php

class Review
{
    private $db;

    private $idreview;
    private $comentario;
    private $calificacion;
    private $iddetalleorden;

    public function __construct()
    {
    }
    public function getIdReview()
    {
        return $this->idreview;
    }

    public function setIdReview($value)
    {
        $v = new \Valitron\Validator(array('IdReview' => $value));
        $v->rule('required', 'IdReview');
        $v->rule('integer', 'IdReview');
        if ($v->validate()) {
            $this->idreview = $value;
            return true;
        } else {
            return $v->errors();
        }
    }

    public function getComentario()
    {
        return $this->comentario;
    }

    public function setComentario($value)
    {
        $v = new \Valitron\Validator(array('Comentario' => $value));
        $v->rule('required', 'Comentario');
        $v->rule('alphaNum', 'Comentario');
        if ($v->validate()) {
            $this->comentario = $value;
            return true;
        } else {
            return $v->errors();
        }
    }

    public function getCalificacion()
    {
        return $this->calificacion;
    }

    public function setCalificacion($value)
    {
        $v = new \Valitron\Validator(array('Calificacion' => $value));
        $v->rule('required', 'Calificacion');
        $v->rule('numeric', 'Calificacion');
        if ($v->validate()) {
            $this->calificacion = $value;
            return true;
        } else {
            return $v->errors();
        }
    }

    public function getIdDetalleOrden()
    {
        return $this->iddetalleorden;
    }

    public function setIdDetalleOrden($value)
    {
        $v = new \Valitron\Validator(array('IdDetalleOrden' => $value));
        $v->rule('required', 'IdDetalleOrden');
        $v->rule('integer', 'IdDetalleOrden');
        if ($v->validate()) {
            $this->iddetalleorden = $value;
            return true;
        } else {
            return $v->errors();
        }
    }
    public function getProductReviews($data)
    {
        $db = new \Common\Database;
        $db->query('SELECT * FROM getProductReviews(' . $data . ')');
        return $db->resultSet();
    }
    public function getProductReviewData($data)
    {
        $db = new \Common\Database;
        $db->query('SELECT * FROM getProductReviewData(' . $data . ')');
        return $db->resultSet();
    }
    public function getReviewsCount($value)
    {
        $db = new \Common\Database;
        $db->query('SELECT * FROM review WHERE idreview = :idreview');
        $db->bind(':idreview', $value);
        return $db->rowCount();
    }
    public function productsReviewCountChart()
    {
        $db = new \Common\Database;
        $db->query('SELECT
                        nombre,
                        ROUND(AVG( calificacion ),2 ) AS calificacion
                    FROM
                        review
                        JOIN producto USING (idproducto)
                    GROUP BY
                        nombre
                    ORDER BY
                        calificacion DESC
                        LIMIT 5');
        return $db->resultSet();
    }

    public function insertReview($value)
    {
        $db = new \Common\Database;
        $db->query('INSERT into review (idreview, comentario, calificacion, iddetalleorden) VALUES(DEFAULT, :comentario, :calificacion, :iddetalleorden)');
        $db->bind(':comentario', $value->comentario);
        $db->bind(':calificacion', $value->calificacion);
        $db->bind(':iddetalleorden', $value->iddetalleorden);
        $db->bind(':idproducto', $value->idproducto);
        return $db->execute();
    }
    public function modifyReview($value)
    {
        $db = new \Common\Database;
        $db->query('UPDATE review SET comentario = :comentario, calificacion = :calificacion, iddetalleorden = :iddetalleorden WHERE idreview = :idreview');
        $db->bind(':comentario', $value->comentario);
        $db->bind(':calificacion', $value->calificacion);
        $db->bind(':iddetalleorden', $value->iddetalleorden);
        $db->bind(':idproducto', $value->idproducto);
        $db->bind(':idreview', $value->idreview);
        return $db->execute();
    }
    public function deleteReview($value)
    {
        $db = new \Common\Database;
        $db->query('DELETE FROM review WHERE idreview = :id');
        $db->bind(':id', $value);
        return $db->execute();
    }
}
