<?php

namespace Controllers;
//llamando al router para llamar a las vistas desde el controlador
use MVC\Router;
//llamar al modelo para obtener la base de datos
use Model\Propiedad;
use Model\Vendedor;

//llamar a la imagen
use Intervention\Image\ImageManagerStatic as Imagex;

class PropiedadController
{
    //pasamos la url y la funcion del router index
    public static function index(Router $router)
    {
        //traer los datos de todas las propiedades
        $propiedades = Propiedad::all();
        $vendedores = Vendedor::all();
        $resultado = $_GET['resultado'] ?? null;


        $router->render('propiedades/admin', [
            'propiedades' => $propiedades,
            'vendedores' => $vendedores,
            'resultado' => $resultado,
        ]);
    }

    public static function crear(Router $router)
    {
        $propiedad = new Propiedad;
        $vendedores = Vendedor::all();
        $errores = Propiedad::getErrores();

        if ($_SERVER['REQUEST_METHOD'] == 'POST') {
            //instanciar o llamar a la clase 
            $propiedad = new Propiedad($_POST['propiedad']);

            //generar nombre unico para la imagen
            $nombreImagen = md5(uniqid(rand(), true)) . '.jpg';

            //setear la imagen
            //realiza un resize a la imagen con libreria intervension 
            if ($_FILES['propiedad']['tmp_name']['imagen']) {
                $image = Imagex::make($_FILES['propiedad']['tmp_name']['imagen'])->fit(800, 600);
                $propiedad->setImage($nombreImagen);
            }

            // debuguear($_SERVER['DOCUMENT_ROOT']);
            // debuguear(CARPETA_IMAGENES);


            //validar
            $errores = $propiedad->validar();


            //revisar que el array no este vacio el de errores
            if (empty($errores)) {
                //crear la carpeta para subir imagenes
                if (!is_dir(CARPETA_IMAGENES)) {
                    mkdir(CARPETA_IMAGENES);
                }

                //guardar la imagen en el servidor con libreria intervension
                $image->save(CARPETA_IMAGENES . $nombreImagen);

                //enviar a la base de datos SQL
                // $resultado = mysqli_query($db, $query);

                //GUARDAR EN LA BD
                $propiedad->guardar();
            }
        }

        $router->render('propiedades/crear', [
            'propiedad' => $propiedad,
            'vendedores' => $vendedores,
            'errores' => $errores,
        ]);
    }

    public static function actualizar(Router $router)
    {
        $id = validarORedireccionar('/admin');
        $propiedad = Propiedad::find($id);
        $vendedores = Vendedor::all();
        $errores = Propiedad::getErrores();

        if ($_SERVER['REQUEST_METHOD'] == 'POST') {

            //asignar los atributos 
            $args = $_POST['propiedad'];

            $propiedad->sincronizar($args);

            $errores = $propiedad->validar();
            // debuguear($propiedad);

            //subida de archivos
            //generar nombre unico para la imagen
            $nombreImagen = md5(uniqid(rand(), true)) . '.jpg';
            //realiza un resize a la imagen con libreria intervension 
            if ($_FILES['propiedad']['tmp_name']['imagen']) {
                $image = Imagex::make($_FILES['propiedad']['tmp_name']['imagen'])->fit(800, 600);
                $propiedad->setImage($nombreImagen);
            }

            //revisar que el array no este vacio el de errores
            if (empty($errores)) {
                //GUARDAR EN LA BD
                //guardar la imagen en el servidor con libreria intervension
                if ($_FILES['propiedad']['tmp_name']['imagen']) {
                    $image->save(CARPETA_IMAGENES . $nombreImagen);
                }

                $propiedad->guardar();
            }
        }

        $router->render('propiedades/actualizar', [
            'propiedad' => $propiedad,
            'vendedores' => $vendedores,
            'errores' => $errores,
        ]);
    }

    public static function eliminar()
    {
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            //validar id de la captura del url
            $id = $_POST['id'];
            $id = filter_var($id, FILTER_VALIDATE_INT);

            if ($id) {

                $tipo = $_POST['tipo'];

                if (validarTipoContenido($tipo)) {
                    $propiedad = Propiedad::find($id);
                    $propiedad->eliminar();
                }
            }
        }
    }
}
