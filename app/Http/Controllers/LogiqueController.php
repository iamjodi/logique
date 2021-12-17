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

        return $bilangan;
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

    public function check_cc($cc, $extra_check = false){
        $cards = array(
            "visa" => "(4\d{12}(?:\d{3})?)",
            "amex" => "(3[47]\d{13})",
            "jcb" => "(35[2-8][89]\d\d\d{10})",
            "maestro" => "((?:5020|5038|6304|6579|6761)\d{12}(?:\d\d)?)",
            "solo" => "((?:6334|6767)\d{12}(?:\d\d)?\d?)",
            "mastercard" => "(5[1-5]\d{14})",
            "switch" => "(?:(?:(?:4903|4905|4911|4936|6333|6759)\d{12})|(?:(?:564182|633110)\d{10})(\d\d)?\d?)",
        );
        $names = array("Visa", "American Express", "JCB", "Maestro", "Solo", "Mastercard", "Switch");
        $matches = array();
        $pattern = "#^(?:".implode("|", $cards).")$#";
        $result = preg_match($pattern, str_replace(" ", "", $cc), $matches);
        if($extra_check && $result > 0){
            $result = (validatecard($cc))?1:0;
        }
        return ($result>0)?$names[sizeof($matches)-2]:false;
    }


    public function registerCard(request $request)
    {   
        $validatedData = $request->validate([
            'address' => ['required', 'max:255'],
            'dob' => ['required'],
            'member_type' => ['required', 'max:255'],
            'number' => ['required'],
            'type_card' => ['required', 'max:255'],
            'expired_date' => ['required'],
        ]);

        $cards = array(
            $request->number,
        );

        foreach($cards as $c){
            $check = $this->check_cc($c, true);
            if($check!==false)
                $temp = $c." - ".$check;
            else
                $temp = "$c - Not a match <br/>";
        }

        Card::create($validatedData);

        $data = Card::get();
        
        return view('dashboard', ['data' => $data]);
    }

    public function cardList(){

        $data = Card::get();

        return view('dashboard', ['data' => $data]);
    }
}
