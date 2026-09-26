<?php

namespace Tests\Feature;

use App\Models\Usuario;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

class UsuarioTest extends TestCase
{
    use RefreshDatabase;

    public function test_puede_registrar_un_usuario(): void
    {
        $respuesta = $this->post('/usuarios', [
            'nombres' => 'Usuario de Prueba',
            'cedula' => '999999999',
            'direccion' => 'Vereda de Prueba',
            'telefono' => '3009999999',
            'estado' => 'Activo',
        ]);

        $respuesta->assertRedirect('/usuarios');

        $this->assertDatabaseHas('usuarios', [
            'nombres' => 'Usuario de Prueba',
            'cedula' => '999999999',
        ]);
    }

    public function test_puede_buscar_un_usuario_por_nombre(): void
    {
        Usuario::create([
            'nombres' => 'Gabriel Prueba',
            'cedula' => '888888888',
            'direccion' => 'Vereda de Prueba',
            'telefono' => '3008888888',
            'estado' => 'Activo',
        ]);

        $respuesta = $this->get('/usuarios?buscar=Gabriel');

        $respuesta->assertStatus(200);
        $respuesta->assertSee('Gabriel Prueba');
    }
}