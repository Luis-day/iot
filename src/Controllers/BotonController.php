<?php

namespace Iot\Controllers;
use Iot\Exceptions\NotFoundException;
use Iot\Exceptions\DbException;
use Iot\Models\BotonModel;
use Iot\Domain\Boton;

class BotonController extends AbstractController {
    public function agregar(): string {
        // use pattern POST-RESEND-GET
        if (!$this->request->isPost()) {
           return $this->render('agregar_Boton.twig', []); //View agregar.twig
       }

       // POST
       $params = $this->request->getParams(); //AQUI NOS QUEDAMOS MARTES 09-05-23

       if (!($params->has('nombre') && $params->has('clave') && $params->has('tipo') )) {
           $params = ['errorMessage' => 'No info provided.'];
           return $this->render('registro.twig', $params);
       }

       $nombre = $params->getString('nombre');
       $clave = $params->getString('clave');
       $tipo = $params->getString('tipo');

       $usuarioModel = new UsuarioModel($this->db);

       try {
               $usuarioModel->addUsuario(new Usuario(0, $nombre, $clave, $tipo));
       } catch (DbException $e) {
            $properties = ['errorMessage' => $e->getMessage()];
             return $this->render('registro.twig', $properties);
       }

       // resend  & GET
       header("Location: /", true,303);
       exit();
       //$properties = ['errorMessage' => 'Registo exitoso!!!'];
       //return $this->render('login.twig', $properties);
   }
}