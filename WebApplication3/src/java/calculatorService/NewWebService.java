/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */
package calculatorService;

import javax.jws.WebService;
import javax.jws.WebMethod;
import javax.jws.WebParam;
import java.lang.Math;

/**
 *
 * @author Bishal Mondal(2020SW04) Kunwar Harshit Shah(2020SW08) Utsav Lalitbhai Acharya(2020SW19)
 */
@WebService(serviceName = "NewWebService")
public class NewWebService {

    /**
     * Web service operation
     */
    @WebMethod(operationName = "emicalc")
    public double emicalc(@WebParam(name = "firstnum") double firstnum, @WebParam(name = "secondnum") double secondnum, @WebParam(name = "thirdnum") double thirdnum) {
        //TODO write your implementation code here:
        double amount = firstnum;
        double roi = secondnum;
        double period = thirdnum;
        return amount * roi * ( Math.pow(1 + roi, period) / ( Math.pow(1 + roi, period) - 1));
    }

    /**
     * Web service operation
     */
    

    /**
     * This is a sample web service operation
     */
    /*
    @WebMethod(operationName = "hello")
    public String hello(@WebParam(name = "name") String txt) {
        return "Hello " + txt + " !";
    }
    */
    /*
    @WebMethod(operationName = "emicalc")
    public double emicalc(@WebParam(name = "firstnum") double amount, @WebParam(name = "secondnum") double roi, @WebParam(name = "thirdnum") double period ) {
        return amount * roi * ( Math.pow(1 + roi, period) / ( Math.pow(1 + roi, period) - 1));
    }
    */
    
}
