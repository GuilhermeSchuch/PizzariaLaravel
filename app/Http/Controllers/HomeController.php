<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Massa;
use App\Models\Borda;
use App\Models\Sabores;
use App\Models\Pizza;

class HomeController extends Controller {
    public function index() {
        $massas = Massa::all();
        $bordas = Borda::all();
        $sabores = Sabores::all();
        return view("home", ["massas"=>$massas, "bordas"=>$bordas, "sabores"=>$sabores]);
    }

    public function store(Request $request) {
        $massa = $request->massa;
        $borda = $request->borda;
        $sabores = $request->sabor;

        $pdo = \DB::connection()->getPdo();
        $stmt = $pdo->prepare("INSERT INTO pizzas (borda_id, massa_id) VALUES ((SELECT bordas.id FROM bordas WHERE bordas.tipo = :borda), (SELECT massas.id FROM massas WHERE massas.tipo = :massa))");
        $stmt->bindParam(":borda", $borda);
        $stmt->bindParam(":massa", $massa);
        $result = $stmt->execute();


        foreach($sabores as $sabor){
            $stmt = $pdo->prepare('INSERT INTO pizza_sabor (pizzas_id, sabor_id) VALUES ((SELECT pizzas.id FROM pizzas ORDER BY pizzas.id DESC LIMIT 1), (SELECT sabores.id FROM sabores WHERE sabores.nome = :sabor))');
            $stmt->bindParam(":sabor", $sabor);
            $result = $stmt->execute();
        }

        $stmt = $pdo->prepare("INSERT INTO pedidos (pizza_id, status_id) VALUES ((SELECT pizzas.id FROM pizzas ORDER BY pizzas.id DESC LIMIT 1), 1)");
        $result = $stmt->execute();

        return redirect()->route('home');
        // return view('login', ["sabores"=>$sabores]);
    }
}
