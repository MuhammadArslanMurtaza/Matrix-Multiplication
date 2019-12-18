<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class matrixController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        //
    }
    /*
     Create a numToAlpha function for converting numbers to Alphabatically
     similar to excel columns. Example 1 => A, 26 => Z, 27 => AA, 28 => AB.
     *@parms $numbers use for getting a list of number to covertion into characters.
     *@return $result use for return the result to function call position.
    */
    public function numToAlpha($n) 
    {
        $r = ''; // use for saving result and return back.
        for ($i = 1; $n >= 0 && $i < 10; $i++) 
        {
            $r = chr(0x41 + ($n % pow(26, $i) / pow(26, $i - 1))) . $r;
            $n -= pow(26, $i);
        }
        return $r;
    }
    /*
     Create index function for using getting the input throw rest API
     and implement the matrix multiplication logic
     and return back the response if successfully matrix multiplicated
     otherwise trigger the error.
    */
    public function index(Request $request)
    {
        $matrixInput = $request->all(); // get the input from the restApi and save it.
        if (!$request->has(['frist', 'second'])) {
             trigger_error("'neme_error'=>'Matrix name muste be 'frist' and 'second'','Example'=>'frist:[1,2] and second:[4,5]'");
            exit(0);
        }
        $lenOfMatrixA=count($matrixInput['frist']); // count the length of frist matrix[frist]
        // count the length of frist row of second matrix[second]
        $MatrixB_fristRowLen=count($matrixInput['second'][0]);
        $lenOfMatrixB=count($matrixInput['second']);// count the length of frist matrix[a]
        /*
          check the Validation
          For Matrix multiplication, 
          the column count in the first matrix should be equal
          to the row count of the second matrix. 
          If this condition is not met, a validation error should be thrown.
        */
        if(count($matrixInput['frist'][0]) != $lenOfMatrixB) {
            trigger_error("Validation Error:For Matrix multiplication, the column count in the first matrix should be equal to the row count of the second matrix.");
            exit(0);
        }
        /*
          after checking the validation if not error then
          multiply the give two matrix and save result on $result variable.
        */
        $result=array();
        for ($i=0; $i < $lenOfMatrixA; $i++){
            for($j=0; $j < $MatrixB_fristRowLen; $j++){
                $result[$i][$j] = 0;
                for($k=0; $k < $lenOfMatrixB; $k++){
                    $result[$i][$j] += $matrixInput['frist'][$i][$k] * $matrixInput['second'][$k][$j];
                }
            }
        }
        /*
          after Matrix multiplication converting the each number of matrix into character
          and save into $results variables
        */
        $results = array();
        foreach($result as $a){
            foreach($a as $i){
                $results[$i] = $this->numToAlpha($i);
            }
        }
        // finally return the response back.
        return response($results);
    }
}
