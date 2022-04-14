/*
The following program simulates a die rolling.  
The program contains a bug, and you are expected to debug this program and fix the bug.  

Here’s a representation of the intended program behavior:
_  _  _
Every tenth roll:
[63, 61, 50, 55, 32, 9, 16, 10, 70, 31]
_  _  _

Keep in mind that this program uses random functionality, and while you should
expect to see ten numbers as shown above, the numbers will not necessarily
exactly match those in the example representation. 


The program should do the following:
1-	Roll the die 100 times.
2-	Add every the number on the side of the die that faces up after every tenth roll to a list.
3-	Print that list.


The bug(s) could be anywhere in the code. 
Try to run the program a few times with different input and check if the output makes sense or not.

You cannot ask the experimenter for questions or skip to the next program.  

If you cannot fix the program, you can procced to the next problem without coming back to this program.
*/

import java.util.ArrayList;							
import java.util.Random;							
import java.util.*; 								

public class Die 
{
    private int sideUp;	
    private int numSides;
    							
    private ArrayList array = new ArrayList();
    
    public Die(int numSides)
    {
    	this.sideUp = numSides;
    	this.numSides = numSides;
    }
    
    public void roll() 								
    {
        this.sideUp = (int) (Math.random() * this.numSides + 1);
    }
    
    public int getSideUp() 
    {
        return this.sideUp;
    }
    
    public String toString()
    {
    	return "You rolled a " + this.sideUp;
    }
    
    public boolean equals(Object o)
    {
    	if (! (o instanceof Die))
    	{
    		return false;
    	}
    	
    	Die otherDie = (Die) o;
    	if (this.sideUp == otherDie.sideUp)
    	{
    		return true;
    	}
    	
    	else
    	{
    		return false;
    	}
    }
    
    
    public static void main(String[] args) 			
    {
		Die myDie = new Die(100);
		List<Integer> results = new ArrayList<Integer>(); 
		
		for(int iteration=0; iteration<100; iteration++)
		{
			myDie.roll();
            int sideUp = myDie.getSideUp();
			
			if ((sideUp / 10) == 0) 
			{
				results.add(myDie.getSideUp());
			}
		}
		
		System.out.println("Every tenth roll:");
		System.out.println(results);
		
    }
}