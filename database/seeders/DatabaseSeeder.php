<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use \App\Models\User;
use \App\Models\Category;
use \App\Models\Post;
use \App\Models\Dentista;
use \App\Models\Pacient;
use \App\Models\Material;
use \App\Models\Factura;
use \App\Models\Albara;
use \App\Models\Encarrec;
use \App\Models\Material_Encarrec;


class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {

        $usuari = User::factory()->create([
            'name' => 'Joan Pou'
        ]);
        Post::factory(5)->create([
            'user_id' => $usuari->id
        ]);

        Category::factory(5)->create();
        $categoria = Category::factory()->create([
            'nom' => 'Cinema'
        ]);
        Post::factory(5)->create([
            'categoria_id' => $categoria->id
        ]);
        Post::factory(20)->create();

        Dentista::factory(20)->create();
        $dentistes = Dentista::factory(2)->create();
        Pacient::factory(1)->create();
        $materials = Material::factory(4)->create();
        $factura = Factura::factory()->create(); // una factura sense albarans
        $albaransFactura = Albara::factory(3)->create([  // albarans amb factura
            'factura_id' => $factura->id
        ]);
        $albarans = Albara::factory(2)->create();
        Factura::factory()->create(); // una factura sense albarans

        $encarrec1 = Encarrec::factory()->create([  // encarrecs d'un dentista determinat amb albara amb factura
            'dentista_id' => $dentistes[0]->id,
            'albara_id' => $albaransFactura[0]->id //poso albara amb factura als encarrecs
        ]);
        $encarrec2 = Encarrec::factory()->create([  // encarrecs d'un dentista determinat amb albara amb factura
            'dentista_id' => $dentistes[0]->id,
            'albara_id' => $albaransFactura[1]->id //poso albara amb factura als encarrecs
        ]);
        $encarrec3 = Encarrec::factory()->create([  // encarrecs d'un dentista determinat amb albara amb factura
            'dentista_id' => $dentistes[0]->id,
            'albara_id' => $albaransFactura[2]->id //poso albara amb factura als encarrecs
        ]);


        $encarrec4 = Encarrec::factory()->create([  // encarrecs d'un dentista determinat amb albara sense factura
            'dentista_id' => $dentistes[1]->id,
            'albara_id' => $albarans[0]->id
        ]);
        $encarrec5 = Encarrec::factory()->create([ // encarrecs d'un dentista determinat amb albara sense factura
            'dentista_id' => $dentistes[1]->id,
            'albara_id' => $albarans[1]->id
        ]); 


        Material_Encarrec::factory()->create([  // linies encarrec determinat amb material determinat
            'encarrecs_id' => $encarrec1->id,
            'materials_id' => $materials[0]->id,
            'quantitat_material' => 1.02,
            'sub_total' => (8.02 * $materials[0]->preu_unitari)
        ]);
        Material_Encarrec::factory()->create([  // linies encarrec determinat amb material determinat
            'encarrecs_id' => $encarrec1->id,
            'materials_id' => $materials[3]->id,
            'quantitat_material' => 2.02,
            'sub_total' => (8.02 * $materials[3]->preu_unitari)
        ]);
        Material_Encarrec::factory()->create([  // linies encarrec determinat amb material determinat
            'encarrecs_id' => $encarrec1->id,
            'quantitat_material' => 0.42,
            'sub_total' => (8.02 * $materials[3]->preu_unitari)
        ]);
        Material_Encarrec::factory()->create([  // linies encarrec determinat amb material
            'encarrecs_id' => $encarrec2->id,
            'materials_id' => $materials[0]->id,
            'quantitat_material' => 1.92,
            'sub_total' => (8.02 * $materials[0]->preu_unitari)
        ]);
        Material_Encarrec::factory()->create([  // linies encarrec determinat amb material determinat
            'encarrecs_id' => $encarrec3->id,
            'quantitat_material' => 1.72,
            'sub_total' => (8.02 * $materials[3]->preu_unitari)
        ]);
        Material_Encarrec::factory()->create([  // linies encarrec determinat amb material
            'encarrecs_id' => $encarrec4->id,
            'materials_id' => $materials[2]->id,
            'quantitat_material' => 2.42,
            'sub_total' => (8.02 * $materials[2]->preu_unitari)
        ]);
        Material_Encarrec::factory()->create([  // linies encarrec determinat amb material determinat
            'encarrecs_id' => $encarrec5->id,
            'sub_total' => (8.02 * $materials[3]->preu_unitari)
        ]);
    }
}
