<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Sabores;
use App\Models\Borda;
use App\Models\Massa;

class ChartController extends Controller
{
    public function index(){

        if(session()->has("email")){
            $massas = Massa::all();
            $sabores = Sabores::all();
            $bordas = Borda::all();

            $saboresQtd = [];

            $pdo = \DB::connection()->getPdo();
            foreach($sabores as $sabor){
                $stmt = $pdo->prepare("SELECT COUNT(*) FROM pizza_sabor WHERE pizza_sabor.sabor_id = (SELECT sabores.id FROM sabores WHERE sabores.nome = '$sabor->nome')");
                
                $result = $stmt->execute();

                if($stmt->rowCount() > 0){
                    $saboresQtd[] = $stmt->fetch();
                }
            }

            $bordasQtd = [];

            $pdo = \DB::connection()->getPdo();
            foreach($bordas as $borda){
                $stmt = $pdo->prepare("SELECT COUNT(*) FROM pizzas WHERE pizzas.borda_id = (SELECT bordas.id FROM bordas WHERE bordas.tipo = '$borda->tipo')");
                
                $result = $stmt->execute();

                if($stmt->rowCount() > 0){
                    $bordasQtd[] = $stmt->fetch();
                }
            }

            $massasQtd = [];

            $pdo = \DB::connection()->getPdo();
            foreach($massas as $massa){
                $stmt = $pdo->prepare("SELECT COUNT(*) FROM pizzas WHERE pizzas.massa_id = (SELECT massas.id FROM massas WHERE massas.tipo = '$massa->tipo');");
                
                $result = $stmt->execute();

                if($stmt->rowCount() > 0){
                    $massasQtd[] = $stmt->fetch();
                }
            }

                
            return view('chart', ["sabores"=>$sabores, "saboresQtd"=>$saboresQtd, "bordas"=>$bordas, "bordasQtd"=>$bordasQtd, "massas"=>$massas, "massasQtd"=>$massasQtd]);
        }
        else{
            return redirect()->route('login');
        }
    }
}
