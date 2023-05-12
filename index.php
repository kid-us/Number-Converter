<?php

array($output = "", $number = "" , $value ="", $value2="", $message="", $emailMessage="", $thankMessage="");

if (isset($_POST['convert'])){ //When the convert button click do this

    if (isset($_POST['from']) && isset($_POST['to'])){ //select 
        $value = $_POST['from'];
        $value2 = $_POST['to'];

            if($value == 'Binary' && $value2 == 'Decimal'){
                $number = $_POST['input'];
                $output = bindec($number);
            }
            
            else if($value == 'Binary' && $value2 == 'Hexadecimal'){
                $number = $_POST['input'];
                $output = base_convert($number, 2, 16);
            }
            
            else if($value == 'Binary' && $value2 == 'Octal'){
                $number = $_POST['input'];
                $output = base_convert($number, 2, 8);
            }
            else if($value == 'Decimal' && $value2 == "Binary"){
                $number = $_POST['input'];
                $output = decbin($number);
            }
            else if($value == 'Decimal' && $value2 == 'Hexadecimal'){
                $number = $_POST['input'];
                $output = dechex($number);
            }
            else if($value == 'Decimal' && $value2 == 'Octal'){
                $number = $_POST['input'];
                $output = decoct($number);
            }
            else if($value == 'Octal' && $value2 == 'Decimal'){
                $number = $_POST['input'];
                $output = octdec($number);
            }
            else if($value == 'Octal' && $value2 == 'Hexadecimal'){
                $number = $_POST['input'];
                $output = base_convert($number,8,16);
            }
            else if($value == 'Octal' && $value2 == 'Binary'){
                $number = $_POST['input'];
                $output = base_convert($number,8,2);
            }
            else if ($value == 'Hexadecimal' && $value2 == 'Decimal'){
                $number = $_POST['input'];
                $output = hexdec($number);
            }
            else if ($value == 'Hexadecimal' && $value2 == 'Binary'){
                $number = $_POST['input'];
                $output = base_convert($number, 16, 2);
            }
            else if ($value == 'Hexadecimal' && $value2 == 'Octal'){
                $number = $_POST['input'];
                $output = base_convert($number, 16, 8);
            }
            else if($value == $value2){
                $number = $_POST['input'];
                $output = $number;
            }
            else{
                exit;
            }       
    }
}//end of convert button click

if (isset($_POST['submit'])){
    $comment = $_POST['comment'];
    $email = $_POST['email'];

    if (empty($comment) || empty($email)){
        $message = "Write your comment";
        $emailMessage = "Enter your email";
    }
    else{
        include ("connect.php");
        $sql = "INSERT INTO feedback (comment, email) VALUES ('$comment', '$email')";
        $result = mysqli_query($coon, $sql);
         if(!$result){
             echo "Unable to insert";
         }
         else{
             $thankMessage = "Thank You";
         }
    }
}
//end of php code
?>



<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="Bootstrap/css/bootstrap.css" />
    <link rel="stylesheet" href="style.css">
    <title>Number Convert</title>
</head>
<body>
    <div class="container">
            <h4 class="text-center m-5"><span class="text-info">Num</span><span class="text-warning">ber</span> <span class="text-success">Con</span><span class="text-danger">ver</span><span class="text-primary">ter</span></h4>
            <form action="index.php" method="POST">
                <div class="row justify-content-center">
                    <div class="col-4">
                        <label class="form-label text-primary">From</label>
                        <select name="from" multiple class="form-control mb-4">
                            <option disabled selected hidden>From</option>
                            <option class="text-dark" >Binary</option>
                            <option class="text-dark" >Decimal</option>
                            <option class="text-dark" >Hexadecimal</option>
                            <option class="text-dark" >Octal</option>
                        </select>
                
                        <input type="text" name="input" class="form-control mb-4" placeholder="Insert" required value="<?php echo $number?>">
                    </div>
                    
                    <div class="col-4">
                        <label class="form-label text-warning">To</label>
                        <select name="to" multiple class="form-control mb-4">
                            <option disabled selected hidden>To</option>
                            <option class="text-danger">Binary</option>
                            <option class="text-danger">Decimal</option>
                            <option class="text-danger">Hexadecimal</option>
                            <option class="text-danger">Octal</option>
                        </select>

                        <input type="text" name="output" class="form-control mb-4" placeholder="Output" readonly value="<?php echo $output?>">
                    </div>
                    
                    <div class="col-12 text-center">
                        <button type="submit" name="convert" value="convert" class="btn btn-danger text-center">Convert</button>
                    </div>  
                </div>
            </form>

            <div class="card-deck mt-5">
                <div class="card bg-primary">
                    <div class="card-body text-center">
                        <p class="card-text"><strong>Binary Number: </strong> 
                            The binary numeral system uses the number <strong>2 as a base</strong> 2 as its base     (radix). As a base-2 numeral system, it consists of only two numbers: 0 and 1. 
                    
                            While it has been applied in ancient Egypt, China and India for different purposes, the binary system has become the language of electronics and computers in the modern world. This is the most efficient system to detect an electric signal’s off (0) and on (1) state. It is also the basis for binary code that is used to compose data in computer-based machines. Even the digital text that you are reading right now consists of binary numbers.

                            Reading a binary number is easier than it looks.
                        </p>
                    </div>
                </div>

                <div class="card bg-info">
                    <div class="card-body text-center">
                            <p class="card-text"><strong>Decimal Number: </strong>
                                is the most commonly used and the standard system in daily life. It uses the number <strong> 10 as a base</strong> (radix). Therefore, it has 10 symbols: The numbers from 0 to 9; namely 0, 1, 2, 3, 4, 5, 6, 7, 8 and 9.

                                As one of the oldest known numeral systems, the decimal numeral system has been used by many ancient civilizations. The difficulty of representing very large numbers in the decimal system was overcome by the Hindu–Arabic numeral system. The Hindu-Arabic numeral system gives positions to the digits in a number and this method works by using powers of the base 10; digits are raised to the nth power, in accordance with their position.
                            </p>
                    </div>
                </div>
            </div>

            <div class="card-deck mt-5">
                <div class="card bg-warning">
                    <div class="card-body text-center">
                        <p class="card-text"><strong>Octal Number: </strong>
                            is a type of number system that has a <strong>base of 8</strong> and uses digits from 0 to 7. A number system is a system of naming, representing, or expressing numbers in different types of forms. The basic ways of representing numbers are done in four ways i.e. Octal Number System, Binary Number System, Decimal Number System, and Hexadecimal Number System.
                            A number system with its base as eight and uses digits from 0 to 7 is called Octal Number System. The word octal is used to represent the numbers that have eight as the base. The octal numbers have many applications and importance such as it is used in computers and digital numbering systems. 
                        </p>
                    </div>
                </div>

                <div class="card bg-success">
                    <div class="card-body text-center">
                        <p class="card-text"><strong>Hexadecimal Number: </strong>
                            The hexadecimal number system is a type of number system, that has a base value equal to <strong>base 16</strong>. It is also pronounced sometimes as ‘hex’. Hexadecimal numbers are represented by only 16 symbols. These symbols or values are 0, 1, 2, 3, 4, 5, 6, 7, 8, 9, A, B, C, D, E and F. Each digit represents a decimal value. For example, D is equal to base-10 13.

                            Hexadecimal number systems can be converted to other number systems such as binary number (base-2), octal number (base-8) and decimal number systems (base-10).  The concept of the number system is widely explained in the syllabus of Class 9.

                            The list of 16 hexadecimal digits with their equivalent decimal, octal and binary representation is given here in the form of a table, which will help in number system conversion. This list can be used as a translator or converter also.
                        </p>
                    </div>
                </div>    
            </div>
        </div>

        <div class="row justify-content-center mt-5">
            <div class="col-5">
                <form action="index.php" method="POST">
                    <label for="feedback" class="form-label text-light">Feedback</label>

                    <textarea name="comment" cols="1" rows="2" class="form-control" placeholder="Write comment here with less than 100 characters"></textarea>

                    <p class="pt-1 small text-danger"><?php echo $message;?></p> 

                    <input type="email" name="email" placeholder="Email" class="form-control-plaintext" autocomplete="off"
                     >

                    <p class=" pt-1 small text-danger"><?php echo $emailMessage;?></p>

                    <div class="mt-2">
                    <button type="submit" name="submit" class="btn btn-warning">Submit</button>
                    <p class="text-center pt-1 small text-success pt-1 small"><?php echo $thankMessage;?></p>
                    </div>
                </form>
            </div>

        </div>

        <footer class="text-center m-5 font-italic small text-light">
            &copy; Copyright 2022-Present by Kid_us WF. All Rights Reserved.
        </footer>
    </div>   
</body>
</html>