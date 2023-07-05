<?php
class Usuario {
    private $rut;
    private $nombres;
    private $apellidoPaterno;
    private $apellidoMaterno;
    private $direccion;
    private $telefono;
    private $clave;
    private $conexion;

    public function __construct($rut, $nombres, $apellidoPaterno, $apellidoMaterno, $direccion, $telefono, $clave) {
        $this->rut = $rut;
        $this->nombres = $nombres;
        $this->apellidoPaterno = $apellidoPaterno;
        $this->apellidoMaterno = $apellidoMaterno;
        $this->direccion = $direccion;
        $this->telefono = $telefono;
        $this->clave = $clave;
        $this->conexion = new Conexion();
    }

    public function crearUsuario() {
        $this->conexion->Conecta();

        $consulta = "INSERT INTO usuarios (rut, nombres, apellido_paterno, apellido_materno, direccion, telefono, clave) VALUES ('$this->rut', '$this->nombres', '$this->apellidoPaterno', '$this->apellidoMaterno', '$this->direccion', '$this->telefono', '$this->clave')";
        $resultado = $this->conexion->Ejecuta($consulta);

        if ($resultado) {
            echo "Usuario creado correctamente.";
        } else {
            echo "Error al crear el usuario.";
        }

        $this->conexion->Desconecta($this->conexion);
    }

    public function actualizarUsuario() {
        $this->conexion->Conecta();

        $consulta = "UPDATE usuarios SET nombres = '$this->nombres', apellido_paterno = '$this->apellidoPaterno', apellido_materno = '$this->apellidoMaterno', direccion = '$this->direccion', telefono = '$this->telefono', clave = '$this->clave' WHERE rut = '$this->rut'";
        $resultado = $this->conexion->Ejecuta($consulta);

        if ($resultado) {
            echo "Usuario actualizado correctamente.";
        } else {
            echo "Error al actualizar el usuario.";
        }

        $this->conexion->Desconecta($this->conexion);
    }

    public static function obtenerUsuarioPorRut($rut) {
        $conexion = new Conexion();
        $conexion->Conecta();
    
        $consulta = "SELECT * FROM usuarios WHERE rut = '$rut'";
        $resultado = $conexion->Ejecuta($consulta);
    
        if ($resultado->num_rows > 0) {
            $usuario = $resultado->fetch_assoc();
            return $usuario;
        } else {
            return false;
        }
    
        $conexion->Desconecta($this->conexion);
    }

    public function eliminarUsuario() {
        $this->conexion->Conecta();

        $consulta = "DELETE FROM usuarios WHERE rut = '$this->rut'";
        $resultado = $this->conexion->Ejecuta($consulta);

        if ($resultado) {
            echo "Usuario eliminado correctamente.";
        } else {
            echo "Error al eliminar el usuario.";
        }

        $this->conexion->Desconecta($this->conexion);
    }

    public static function obtenerUsuarios() {
        $conexion = new Conexion();
        $conexion->Conecta();
    
        $consulta = "SELECT * FROM usuarios";
        $resultado = $conexion->Ejecuta($consulta);
    
        if ($resultado->num_rows > 0) {
            $usuarios = array();
            while ($row = $resultado->fetch_assoc()) {
                $usuarios[] = $row;
            }
            return $usuarios;
        } else {
            return array();
        }
    
        $conexion->Desconecta();
    }
}
?>