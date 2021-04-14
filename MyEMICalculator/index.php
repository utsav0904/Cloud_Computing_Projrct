<!DOCTYPE html>
<!--
Author: Bishal Mondal (2020SW04), Kunwar Harshit Shah(2020SW08), Utsav Lalitbhai Acharya(2020SW19)
-->
<html>
    <head>
        <title>EMI Calculator</title>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
    </head>
    <style>
        table{
            font-size: 1.5rem;
        }
        
        input{
            font-size: 1rem;
        }
        
    </style>
    
    <?php
        $emi="";
        if($_SERVER["REQUEST_METHOD"]=="POST")
{
            
            
            $client = new SoapClient("http://localhost:8080/WebApplication3/NewWebService?WSDL");
            
            
            $amount = $_POST["text1"];
            $roi =  $_POST["text2"];
            $period = $_POST["text3"];
            
            $roi_month = $roi / 1200;
            
          //  $emi = $amount * $roi_month * ( pow(1 + $roi_month, $period) / ( pow(1 + $roi_month, $period) - 1));
            
            $params = array(
                "firstnum"=>$amount,
                "secondnum"=>$roi_month,
                "thirdnum"=>$period
            );
            
            $response = $client->emicalc($params);
            
            $emi = $response->return;
            $emi = round($emi, 2);
                
        }
 
    ?>
    
    
    <br><br><br>
   <body bgcolor="#00ff0080">
        <form name="emi_input" method="POST" action="#">
        <table align=center width=50%>
            <tr><td colspan=2 align="center">Hi! I am your EMI Calculator</td></tr>
            <br>
            <tr><td width=40%>Loan Amount: </td><td width=60%><input type="text" name="text1" id="textt1" value=""></td></tr>
            <tr><td>Rate of Interest(per annum): </td><td><input type="text" name="text2" id="textt2" value=""></td></tr>
            <tr><td>No. of Installments: </td><td><input type="text" name="text3" id="textt3" value=""></td></tr>
            <tr><td></td><td><input type="submit" name="Calculate" value="Calculate"></td></tr>
        </table>
        </form>
        <?php
            if($_SERVER["REQUEST_METHOD"]=="POST")
{
                
                print("<table align=center width=50%>");
                print("<tr><td width=40%>Monthly EMI amount: </td><td width=60%>".$emi."</td></tr>");
                print("</table>");
                
            }
        ?>
        
        
        
    </body>
</html>
