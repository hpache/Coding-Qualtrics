/*
The following program converts an infix expression like:
( A + B ) ;
To postfix expression, like:
A B +

The program contains bug(s), and you are expected to debug this program and fix it.  

When provided the expression:
( ax + ( b * c ) ) ;

The program intended output is:
_  _  _
ax b c * + 
_  _  _

The bug(s) could be anywhere in the code. 
Your goal is to fix the program so it generates the intended output above.

You cannot ask the experimenter for questions or skip to the next program.  

If you cannot fix the program, you can procced to the next problem without coming back to this program.

*/

import java.util.*;

public class Postfix{

    public static String convert(String expression) {

        // convert an infix expression to postfix expression
        Stack<String> stack = new Stack<String>();
        String postfix = "";

        // split expression into an array of tokens
        String[] tokens = expression.split(" ");

        // iterate through each token
        for (String token : tokens) {
            
            // if the token is ; then we are done
            if (token.equals(";"))
                break;

            // if the token is a ) then reorganize the expression
            if (token.equals(")")){
                String right = stack.pop();
                String operand = stack.pop();
                String left = stack.pop();
                postfix = left + " " + right + " " + operand;
                stack.push(postfix);
            
            // if the token is not ( then push it to the stack
            }else if (!token.equals("(")){
                stack.push(token);
            }
        }
    
        // return the postfix expression
        return stack.pop();
    }


    public static void main(String [] args){

        // test case, should print ax b c * + 
        System.out.println(convert(" ( ax + ( b * c ) ) ;"));
      	System.out.println(convert(" ( A + B ) ;"));
      	System.out.println(convert(" ( ( A + B * ( C - D ) ) ) ;"));
    }
}