<?php
// MODELO: solo habla con la base de datos.
// No imprime HTML ni lee $_POST / $_GET.
class Ruta
{
    private PDO $pdo;

    public function __construct(PDO $pdo)
    {
        $this->pdo = $pdo;
    }

    public function todas(): array
    {
        $sql = "SELECT r.id, r.nombre, r.dificultad, r.distancia_km,
                       p.nombre AS provincia, c.nombre AS categoria
                FROM rutas r
                INNER JOIN provincias p ON r.provincia_id = p.id
                INNER JOIN categorias c ON r.categoria_id = c.id
                ORDER BY r.id DESC";
        $stmt = $this->pdo->prepare($sql);
        $stmt->execute();
        return $stmt->fetchAll();
    }

    public function buscarPorId(int $id): ?array
    {
        $stmt = $this->pdo->prepare("SELECT * FROM rutas WHERE id = :id");
        $stmt->execute([':id' => $id]);
        $fila = $stmt->fetch();
        return $fila ?: null;
    }

    public function crear(array $d, int $usuarioId): void
    {
        $sql = "INSERT INTO rutas
                  (usuario_id, provincia_id, categoria_id, nombre, descripcion, dificultad, distancia_km)
                VALUES
                  (:usuario_id, :provincia_id, :categoria_id, :nombre, :descripcion, :dificultad, :distancia_km)";
        $stmt = $this->pdo->prepare($sql);
        $stmt->execute([
            ':usuario_id'   => $usuarioId,
            ':provincia_id' => (int)$d['provincia_id'],
            ':categoria_id' => (int)$d['categoria_id'],
            ':nombre'       => $d['nombre'],
            ':descripcion'  => ($d['descripcion'] ?? '') === '' ? null : $d['descripcion'],
            ':dificultad'   => $d['dificultad'],
            ':distancia_km' => ($d['distancia_km'] ?? '') === '' ? null : $d['distancia_km'],
        ]);
    }

    public function actualizar(int $id, array $d): void
    {
        $sql = "UPDATE rutas
                SET provincia_id = :provincia_id,
                    categoria_id = :categoria_id,
                    nombre = :nombre,
                    descripcion = :descripcion,
                    dificultad = :dificultad,
                    distancia_km = :distancia_km
                WHERE id = :id";
        $stmt = $this->pdo->prepare($sql);
        $stmt->execute([
            ':provincia_id' => (int)$d['provincia_id'],
            ':categoria_id' => (int)$d['categoria_id'],
            ':nombre'       => $d['nombre'],
            ':descripcion'  => ($d['descripcion'] ?? '') === '' ? null : $d['descripcion'],
            ':dificultad'   => $d['dificultad'],
            ':distancia_km' => ($d['distancia_km'] ?? '') === '' ? null : $d['distancia_km'],
            ':id'           => $id,
        ]);
    }

    public function eliminar(int $id): void
    {
        $stmt = $this->pdo->prepare("DELETE FROM rutas WHERE id = :id");
        $stmt->execute([':id' => $id]);
    }

    public function provincias(): array
    {
        $stmt = $this->pdo->prepare("SELECT id, nombre FROM provincias ORDER BY nombre");
        $stmt->execute();
        return $stmt->fetchAll();
    }

    public function categorias(): array
    {
        $stmt = $this->pdo->prepare("SELECT id, nombre FROM categorias ORDER BY nombre");
        $stmt->execute();
        return $stmt->fetchAll();
    }
}