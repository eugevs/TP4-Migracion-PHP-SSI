<?php
// CONTROLADOR: recibe la solicitud, valida, llama al Modelo y elige la Vista.
// No tiene SQL ni HTML.
require_once __DIR__ . '/../Models/Ruta.php';
require_once __DIR__ . '/../../includes/validar-ruta.php'; // validación del TP7

class RutaController
{
    private Ruta $modelo;
    private array $dificultades = ['Baja', 'Media', 'Alta'];

    public function __construct(PDO $pdo)
    {
        $this->modelo = new Ruta($pdo);
    }

    // rutas-mvc.php → listado
    public function index(): void
    {
        $mensajes = [
            'created'  => ['success', 'Ruta creada correctamente.'],
            'updated'  => ['success', 'Ruta actualizada correctamente.'],
            'deleted'  => ['success', 'Ruta eliminada correctamente.'],
            'notfound' => ['warning', 'La ruta solicitada no existe.'],
            'error'    => ['danger', 'Ocurrió un error al procesar la operación.'],
        ];
        $aviso = $mensajes[$_GET['status'] ?? ''] ?? null;

        $this->vista('rutas/index', [
            'rutas' => $this->modelo->todas(),
            'aviso' => $aviso,
        ]);
    }

    // GET muestra el formulario, POST guarda
    public function crear(): void
    {
        $datos = [
            'nombre' => '', 'descripcion' => '', 'provincia_id' => '',
            'categoria_id' => '', 'dificultad' => 'Media', 'distancia_km' => '',
        ];
        $errores = [];

        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $datos = $this->leerFormulario();
            $errores = validar_ruta($datos, $this->dificultades);

            if (empty($errores)) {
                try {
                    $this->modelo->crear($datos, (int)$_SESSION['usuario_id']);
                    $this->redirigir('created');
                } catch (PDOException $e) {
                    error_log('MVC crear ruta: ' . $e->getMessage());
                    $errores['general'] = 'No se pudo guardar la ruta. Intentá de nuevo.';
                }
            }
        }

        $this->formulario('Nueva ruta', 'rutas-mvc.php?accion=crear', 'Guardar ruta', $datos, $errores);
    }

    // GET ?id= muestra el formulario con los datos, POST actualiza
    public function editar(): void
    {
        $id = (int)($_POST['id'] ?? $_GET['id'] ?? 0);
        $ruta = $id > 0 ? $this->modelo->buscarPorId($id) : null;
        if ($ruta === null) {
            $this->redirigir('notfound');
        }

        $datos = $ruta;
        $errores = [];

        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $datos = array_merge($ruta, $this->leerFormulario());
            $errores = validar_ruta($datos, $this->dificultades);

            if (empty($errores)) {
                try {
                    $this->modelo->actualizar($id, $datos);
                    $this->redirigir('updated');
                } catch (PDOException $e) {
                    error_log('MVC editar ruta: ' . $e->getMessage());
                    $errores['general'] = 'No se pudo actualizar la ruta. Intentá de nuevo.';
                }
            }
        }

        $this->formulario('Editar ruta', 'rutas-mvc.php?accion=editar', 'Guardar cambios', $datos, $errores);
    }

    // Solo POST
    public function eliminar(): void
    {
        if ($_SERVER['REQUEST_METHOD'] !== 'POST') {
            $this->redirigir('');
        }

        $id = (int)($_POST['id'] ?? 0);
        if ($id < 1) {
            $this->redirigir('notfound');
        }

        try {
            $this->modelo->eliminar($id);
            $this->redirigir('deleted');
        } catch (PDOException $e) {
            error_log('MVC eliminar ruta: ' . $e->getMessage());
            $this->redirigir('error');
        }
    }

    // ---------- utilidades internas ----------

    private function leerFormulario(): array
    {
        return [
            'nombre'       => trim($_POST['nombre'] ?? ''),
            'descripcion'  => trim($_POST['descripcion'] ?? ''),
            'provincia_id' => trim($_POST['provincia_id'] ?? ''),
            'categoria_id' => trim($_POST['categoria_id'] ?? ''),
            'dificultad'   => trim($_POST['dificultad'] ?? ''),
            'distancia_km' => trim($_POST['distancia_km'] ?? ''),
        ];
    }

    private function formulario(string $titulo, string $accion, string $textoBoton, array $datos, array $errores): void
    {
        $this->vista('rutas/form', [
            'tituloPagina' => $titulo,
            'accion'       => $accion,
            'textoBoton'   => $textoBoton,
            'datos'        => $datos,
            'errores'      => $errores,
            'provincias'   => $this->modelo->provincias(),
            'categorias'   => $this->modelo->categorias(),
            'dificultades' => $this->dificultades,
        ]);
    }

    // Carga una vista pasándole las variables
    private function vista(string $nombre, array $datos = []): void
    {
        extract($datos);
        require __DIR__ . '/../Views/' . $nombre . '.php';
    }

    private function redirigir(string $status): void
    {
        $url = 'rutas-mvc.php' . ($status !== '' ? '?status=' . $status : '');
        header('Location: ' . $url);
        exit;
    }
}