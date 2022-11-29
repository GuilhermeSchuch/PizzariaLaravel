<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Borda;


class ManageController extends Controller
{
    public function index(){
        if(session()->has("email")){
            $pdo = \DB::connection()->getPdo();
            $stmt = $pdo->prepare("SELECT massas.tipo FROM massas");
            $result = $stmt->execute();

            if($stmt->rowCount() > 0){
                $massas = $stmt->fetchAll();
            }

            $pdo = \DB::connection()->getPdo();
            $stmt = $pdo->prepare("SELECT bordas.tipo FROM bordas");
            $result = $stmt->execute();

            if($stmt->rowCount() > 0){
                $bordas = $stmt->fetchAll();
            }

            $pdo = \DB::connection()->getPdo();
            $stmt = $pdo->prepare("SELECT sabores.nome FROM sabores");
            $result = $stmt->execute();

            if($stmt->rowCount() > 0){
                $sabores = $stmt->fetchAll();
            }

            return view('manage', ["massas"=>$massas, "sabores"=>$sabores, "bordas"=>$bordas]);
        }
        else{
            return redirect('login')->with("error", "Você precisa estar logado!");
        }
    }

    public function storeMassa(Request $request){
        $massa = $request->massa;
        
        $pdo = \DB::connection()->getPdo();
        $stmt = $pdo->prepare("INSERT INTO massas (tipo) VALUES ('$massa')");
        $result = $stmt->execute();

        return redirect('manage');
    }

    public function destroyMassa($name){

        try {
            $pdo = \DB::connection()->getPdo();
            $stmt = $pdo->prepare("DELETE FROM massas WHERE massas.tipo = '$name'");
            $result = $stmt->execute();
        } catch (\Throwable $th) {
            return redirect('manage')->with("error", "Impossível deletar massa relacionada à um pedido!");
        }

        return redirect('manage');
    }

    public function updateMassa(Request $request, $name){
        $nome = $request->input('nome' . $name);
        $pdo = \DB::connection()->getPdo();
        $stmt = $pdo->prepare("UPDATE `massas` SET `tipo` = '$nome' WHERE `massas`.`tipo` = '$name'");
        $result = $stmt->execute();

        return redirect('manage');
    }

    public function storeBorda(Request $request){
        $borda = $request->borda;
        
        $pdo = \DB::connection()->getPdo();
        $stmt = $pdo->prepare("INSERT INTO bordas (tipo) VALUES ('$borda')");
        $result = $stmt->execute();

        return redirect('manage');
    }

    public function destroyBorda($name){

        try {
            $pdo = \DB::connection()->getPdo();
            $stmt = $pdo->prepare("DELETE FROM bordas WHERE bordas.tipo = '$name'");
            $result = $stmt->execute();

            return redirect('manage');
        } catch (\Throwable $th) {
            return redirect('manage')->with("error", "Impossível deletar borda relacionada à um pedido!");
        }
    }

    public function updateBorda(Request $request, $name){
        $nome = $request->input('nome' . $name);
        $pdo = \DB::connection()->getPdo();
        $stmt = $pdo->prepare("UPDATE `bordas` SET `tipo` = '$nome' WHERE `bordas`.`tipo` = '$name'");
        $result = $stmt->execute();

        return redirect('manage');
    }

    public function storeSabor(Request $request){
        $sabor = $request->sabor;
        
        $pdo = \DB::connection()->getPdo();
        $stmt = $pdo->prepare("INSERT INTO sabores (nome) VALUES ('$sabor')");
        $result = $stmt->execute();

        return redirect('manage');
    }

    public function updateSabor(Request $request, $name){
        $nome = $request->input('nome' . $name);
        $pdo = \DB::connection()->getPdo();
        $stmt = $pdo->prepare("UPDATE `sabores` SET `nome` = '$nome' WHERE `sabores`.`nome` = '$name'");
        $result = $stmt->execute();

        return redirect('manage');
    }

    public function destroySabor($name){
        try {
            $pdo = \DB::connection()->getPdo();
            $stmt = $pdo->prepare("DELETE FROM sabores WHERE sabores.nome = '$name'");
            $result = $stmt->execute();

            return redirect('manage');
        } catch (\Throwable $th) {
            return redirect('manage')->with("error", "Impossível deletar sabor relacionado à um pedido!");
        }
    }
}
