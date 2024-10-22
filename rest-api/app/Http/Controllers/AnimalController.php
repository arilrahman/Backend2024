<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class AnimalController extends Controller {

    public $animals = [
        ["name" => "Kucing"],
        ["name" => "Ayam"],
        ["name" => "Ikan"]
    ];
    public function index( ) 
    {
        foreach ( $this->animals as $animal ) { 
            echo  "\n";
            echo  $animal['name'];
        }
    
    }
    public function store(Request $request)

    {
        echo "Menambahkan hewan baru\n";
        array_push( $this->animals, $request);
        $this ->index() ;
    
    }
    public function update(Request $request, string $id) 
    {
        echo "Menambahkan hewan baru\n";
        $this ->animals[$id] = $request;
        $this ->index() ;
    
    }
    public function destroy(string $id) 
    {
        echo "Menambahkan hewan baru\n";
    
        unset( $this ->animals[$id - 1] );
        $this ->index() ;
    
    }
}