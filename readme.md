Task: Matrix multiplication with a twist.

Create a sample Laravel / Lumen application for Matrix multiplication. The input should be based on a command OR Rest-API.

Validation
For Matrix multiplication, the column count in the first matrix should be equal to the row count of the second matrix. If this condition is not met, a validation error should be thrown.

Resulting matrix 
The resulting matrix should contain characters rather than numbers, similar to excel columns. Example 1 => A, 26 => Z, 27 => AA, 28 => AB. The calculation should be covered by tests.

use command for runing lumen app    "php -S localhost:8000 -t public"
and type url for testing "http://localhost:8000/matrix" with GET method
i`m using postman app for testing perpose you use anyone else

Basic example are:
put the matrix data in json form like this
{"frist": 
	{"0": {"0":"1","1":"2","2":"4"},
	 "1":{"0":"4","1":"5","2":"7"}
	},
"second": 
	{"0":{"0":"7","1":"5"},
	 "1":{"0":"3","1":"3"},
	 "2":{"0":"3","1":"3"}
	 }
}

Matrix name must be 'frist' and 'second' and Strat Matrix Index from '0'

Please see the "strat the app.png"and "test in postman.png" for better understanding for testing the app

Thank's
