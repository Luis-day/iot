<?php

namespace Iot\Models;
use Iot\Domain\Boton;
use Iot\Exceptions\NotFoundException;
use Iot\Exceptions\DbException;
use Exception;
use PDOException;

class BotonModel extends AbstractModel {
    public function addBoton(Boton $boton) {
       
        $query = 'INSERT INTO boton (valor) values (:valor)'; //crear BD "valor"
        $sth = $this->db->prepare($query);
         try {
            $sth->execute([
                       'valor' => $usuario->getValor()]);
        } catch (PDOException $e) {
            // integrity
           throw new DbException( ' Boton: Error con la base de datos!!!');
        }
    }
}