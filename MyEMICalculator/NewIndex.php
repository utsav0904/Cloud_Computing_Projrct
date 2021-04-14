<html>
    
    <form action="#" method="POST">
        
        Loan Amount<input type="text" name="loan">
        <br>
        Rate of Interest<input type="text" name="roi">
        <br>
        Number of Installments<input type="text" name="tenure">
        <br>
        <input type="submit" name="submit">
        <br>
        
    </form>
    
    
</html>

<?php
    
    ini_set("soap.wsdl_cache_enabled", "0");
    if(isset($_POST["submit"])){
        
        $client = new SoapClient("http://localhost:8080/WebApplication3/NewWebService?WSDL");
        
        $l = $_POST["loan"];
        $r = $_POST["roi"];
        $t = $_POST["tenure"];
        
        
        $params = array(
            "firstnum"=>$l,
            "secondnum"=>$r,
            "thirdnum"=>$t
        );
        
        
       // $response = $client->_soapCall("emicalc", array($params));
        $response = $client->emicalc($params);
        echo "<br/> Monthy EMI amount: ";
        echo $response->return;
    }

?>