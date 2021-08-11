<?php

namespace Controllers;
//llamando al router para llamar a las vistas desde el controlador
use MVC\Router;
use Model\Propiedad;

class PaginaController
{
    public static function index(Router $router)
    {
        $propiedades = Propiedad::get(3);
        $inicio = true;

        $router->render('/paginas/index', [
            'propiedades' => $propiedades,
            'inicio' => $inicio,
        ]);
    }

    public static function nosotros(Router $router)
    {
        $router->render('/paginas/nosotros', []);
    }

    public static function propiedades(Router $router)
    {
        $propiedades = Propiedad::all();

        $router->render('/paginas/propiedades', [
            'propiedades' => $propiedades,
        ]);
    }

    public static function propiedad(Router $router)
    {
        $id = validarORedireccionar('/propiedades');

        $propiedad = Propiedad::find($id);

        $router->render('/paginas/propiedad', [
            'propiedad' => $propiedad,
        ]);
    }

    public static function blog(Router $router)
    {
        $router->render('/paginas/blog', []);
    }

    public static function entrada(Router $router)
    {
        $router->render('/paginas/entrada', []);
    }

    public static function contacto(Router $router)
    {
        $mensaje = null;
        if ($_SERVER['REQUEST_METHOD'] == 'POST') {


            // debuguear($_POST);
            //capturando datos del post
            $respuesta = $_POST['contacto'];

            //crear una isntancia de PHPmailer
            $mail = new PHPMailer();

            //configurar SMTP protocolo para envio de email
            $mail->isSMTP();
            $mail->Host = "smtp.mailtrap.io"; //viene del servidor
            $mail->SMTPAuth = true;
            $mail->Username = "cd8cbe192deca7";
            $mail->Password = "62fd2afb84c11f";
            $mail->SMTPSecure = "tls";
            $mail->Port  = "2525";

            //configurar el contenido del email
            $mail->setFrom('carlitostucno@gmail.com');
            $mail->addAddress('carlitostucno@gmail.com', 'catuva.com');
            $mail->Subject = 'Nuevo mensaje WEB';

            //habilitar HTML
            $mail->isHTML(true);
            $mail->charset = 'UTF-8';

            //denifinir el contenido del
            $contenido = '<html>';
            $contenido .= '<p>Tienes un nuevo mensaje</p>';
            $contenido .= '<p>Nombre: ' . $respuesta['nombre'] . '</p>';

            if ($respuesta['contacto'] === 'telefono') {
                $contenido .= '<p> Eligio ser contactado por telefono</p>';
                $contenido .= '<p>Telefono: ' . $respuesta['telefono'] . '</p>';
                $contenido .= '<p>Fecha Contacto: ' . $respuesta['fecha'] . '</p>';
                $contenido .= '<p>Hora Contacto: ' . $respuesta['hora'] . '</p>';
            } else {
                //es email est
                $contenido .= '<p> Eligio ser contactado por Email</p>';
                $contenido .= '<p>Email: ' . $respuesta['email'] . '</p>';
            }

            $contenido .= '<p>Mensaje: ' . $respuesta['mensaje'] . '</p>';
            $contenido .= '<p>Vende o Compra: ' . $respuesta['tipo'] . '</p>';
            $contenido .= '<p>Presupuesto: $' . $respuesta['precio'] . '</p>';
            // $contenido .= '<p>Prefiere ser contactado por: ' . $respuesta['contacto'] . '</p>';
            $contenido .= '</html>';

            $mail->Body = $contenido;
            $mail->AltBody = 'este es texto alternativo sin HTML';

            //envia el mail
            if ($mail->send()) {
                $mensaje = 'mensaje enviado';
            } else {
                $mensaje = 'el mensaje no se pudo enviar';
            }
        }
        $router->render('/paginas/contacto', [
            'mensaje' => $mensaje
        ]);
    }
}
