<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Card;

class LogiqueController extends Controller
{

    public function index()
    {
        return view('home');
    }

    public function bilPrima($input)
    {

        $result = $input .' Bilangan Prima';

        for($i= 2; $i<= $input-1; $i++){
            if($input % $i == 0){
                $result = $input .' Bukan Bilangan Prima';
                break;
            }
        }

        echo $result;
    }

    public function max()
    {

        $bilangan = array(11, 6, 31, 201, 99, 861, 1, 7, 14, 79);

        $max = $bilangan[0];

        for($i= 1; $i < count($bilangan); $i++){
            if($max < $bilangan[$i]){
                $max = $bilangan[$i];
            }
        }

        echo 'Bilangan Terbesar : '.$max;
    }

    public function star($input)
    {
        for($i=0;$i<=$input;$i++){  
            for($j=1;$j<=$i;$j++){  
                echo $j." ";  
            }  
                echo "<br>";  
        }  
    }

    public function bubbleSort()
    {   
        $bilangan = array(99, 2, 64, 8, 111, 33, 65, 11, 102, 50);

        $size = count($bilangan)-1;
        for ($i=0; $i<$size; $i++) {
            for ($j=0; $j<$size-$i; $j++) {
                $k = $j+1;
                if ($bilangan[$k] < $bilangan[$j]) {
                    list($bilangan[$j], $bilangan[$k]) = array($bilangan[$k], $bilangan[$j]);
                }
            }
        }

        echo $bilangan;
    }

    public function square($input){
        for($i=1; $i<=$input; $i++){
            $temp = $i;
            for($j=0; $j<3; $j++){
                echo $temp." ";
                $temp = $temp + 4;
            }

            echo "<br>";
        }
    }

    public function registerCard(request $request)
    {   
        // return $request->all();

        Card::create([
            'address' => $request['address'],
            'dob' => $request['dob'],
            'member_type' => $request['memberType'],
            'number' => $request['number'],
            'type_card' => $request['type_card'],
            'expired_date' => $request['expdate']
        ]);

        $data = Card::get();
        
        return view('dashboard', ['data' => $data]);
    }

    public function cardList(){

        $data = Card::get();
        
        return view('dashboard', ['data' => $data]);
    }
}
