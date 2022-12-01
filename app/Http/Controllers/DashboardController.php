<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Sabores;
use App\Models\Pizza;
use App\Models\Borda;

class DashboardController extends Controller
{
    public function index(){

        if(session()->has("email")){
            // $massas = Massa::all();
            $sabores = Sabores::all();

            $saboresQtd = [];

            $pdo = \DB::connection()->getPdo();
            foreach($sabores as $sabor){
                $stmt = $pdo->prepare("SELECT COUNT(*) FROM pizza_sabor WHERE pizza_sabor.sabor_id = (SELECT sabores.id FROM sabores WHERE sabores.nome = '$sabor->nome')");
                
                $result = $stmt->execute();

                if($stmt->rowCount() > 0){
                    $saboresQtd[] = $stmt->fetch();
                }
            }

            $stmt = $pdo->prepare("SELECT p.pizza_id, s.tipo as status, b.tipo as borda, m.tipo as massa FROM pedidos p JOIN pizzas ON p.pizza_id = pizzas.id JOIN bordas b ON pizzas.borda_id = b.id JOIN status s ON p.status_id = s.id JOIN massas m ON pizzas.massa_id = m.id");
            $result = $stmt->execute();

            if($stmt->rowCount() > 0){
                $data = $stmt->fetchAll();
            }
            else{
                $data = [];
            }

            $saboresPizza = [];

            for($i = 0; $i < count($data); $i++){
                $stmt = $pdo->prepare("SELECT s.nome, ps.pizzas_id FROM sabores s JOIN pizza_sabor ps ON s.id = ps.sabor_id WHERE ps.pizzas_id = " . $data[$i]["pizza_id"]);
                $result = $stmt->execute();

                if($stmt->rowCount() > 0){
                    $saboresPizza[] = $stmt->fetchAll();
                }
            }

            $navbar = "dashboard";

                
            return view('dashboard', ["sabores"=>$sabores, "saboresQtd"=>$saboresQtd, "data"=>$data, "saboresPizza"=>$saboresPizza, "navbar"=>$navbar]);
        }
        else{
            return redirect('login')->with("error", "Você precisa estar logado!");
        }
    }

    public function destroy($id){
        $pdo = \DB::connection()->getPdo();

        $stmt = $pdo->prepare("DELETE FROM pizza_sabor WHERE pizza_sabor.pizzas_id = " . intval($id));
        // $stmt->bindParam(":id", intval($id));
        $result = $stmt->execute();

        $stmt = $pdo->prepare("DELETE FROM pedidos WHERE pedidos.pizza_id = " . intval($id));
        // $stmt->bindParam(":id", intval($id));
        $result = $stmt->execute();

        $stmt = $pdo->prepare("DELETE FROM pizzas WHERE pizzas.id = " . intval($id));
        // $stmt->bindParam(":id", intval($id));
        $result = $stmt->execute();

        // $pizza->delete();

        return redirect()->route('dashboard');
        // return view('login', ["id"=>$id]);
    }
}
