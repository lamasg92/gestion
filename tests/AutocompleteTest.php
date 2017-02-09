<?php

use Illuminate\Foundation\Testing\DatabaseTransactions;

class AutocompleteTest extends FeatureTestCase
{
    use DatabaseTransactions;

    public function testExample()
    {

        //Having
        $this->actingAs($this->getDefaultUser());

        $art1 = seed('Article', [
            'nombre'  => 'art',
            'descripcion'  => 'primer articulo',
            'category_id'  => 1,
            'stock' => '1',
            'precio_unitario' => 10.22
        ]);


        $art2 = seed('Article', [
            'nombre'  => 'prod1',
            'descripcion'  => ' una descripcion',
            'category_id'  => 2,
            'stock' => '2',
            'precio_unitario' => 110.2
        ]);
        $art3 = seed('Article', [
            'nombre'  => 'prod2',
            'descripcion'  => ' nueva descripcion',
            'category_id'  => 2,
            'stock' => '2',
            'precio_unitario' => 1190.2
        ]);

        seed('Article', ['nombre' => 'prorti3', 'descripcion' => 'otra desctipcion','category_id' => 1, 'stock' => '1','precio_unitario' => '99,20']);
        seed('Article', ['nombre' => 'ati4', 'descripcion' => 'otra nueva descripcion','category_id' => 2, 'stock' => '1','precio_unitario' => '199,20']);
        seed('Article', ['nombre' => 'krti5', 'descripcion' => 'la ultima descripcion','category_id' => 1, 'stock' => '1','precio_unitario' => '999,20']);


        //when
        $this->get('invoices/articles?term=art');

        //then
        $this->seeStatusCode(200)
            ->seeJsonEquals([
                [
                    'id'    => $art1->id,
                    'nombre'  => 'art',
                    'descripcion'  => 'primer articulo',
                    'category_id'  => 1,
                    'precio_unitario' => 10.22
                ]
            ]);



        //when
        $this->get('invoices/articles?term=prod');

        $this->seeStatusCode(200)
            ->seeJsonEquals([
                [
                    'id'    => $art2->id,
                    'nombre'  => 'prod1',
                    'descripcion'  => ' una descripcion',
                    'category_id'  => 2,
                    'precio_unitario' => 110.2
                ],
                [
                    'id'    => $art3->id,
                    'nombre'  => 'prod2',
                    'descripcion'  => ' nueva descripcion',
                    'category_id'  => 2,
                    'precio_unitario' => 1190.2
                ],
            ]);
    }
}
