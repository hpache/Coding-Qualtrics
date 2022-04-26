/*
The following program implements a command line version of the game Tic Tac Toe.  
The program contains a bug, and you are expected to debug this program and fix the bug.  
Here a representation of the intended program behavior:
_  _  _
_  _  _
_  _  _
Player O, enter row:
0
Player O, enter column:
0

O  _  _
_  _  _
_  _  _
Player X, enter row:
1
Player X, enter column:
2

O  _  _
_  _  X
_  _  _

The program should do the following:
1-	Be able to print the playing grid correctly.
2-	Allow players to select a row and column of where they want to place their X/O.
3-	Check if players entered a valid position in the grid.
4-	Check for winner or tie after each round.


The bug could be anywhere in the code. 
Try to run the program a few times with different input and check if the output makes sense or not.

You cannot ask the experimenter for questions or skip to the next program.  

If you cannot fix the program, you can procced to the next problem without coming back to this program.
*/

import java.util.Scanner;


public class TicTacToe{

	private String [][] myGrid;
	private int turn;


	// constructor
	public TicTacToe(){
		
		int turn = 0;

		// create 3x3 grid
		myGrid = new String[3][3];
		
		// initialize 3x3 grid
		for(int i = 0; i < 3; i++){
			for (int j = 0; j < 3; j++){
				this.myGrid[i][j] = "";
			}
		}
	}

	public void setGrid(String[][] newGrid){
		this.myGrid = newGrid;
	}

	
	// function to play the game until tie or winner is found
	public void play(){

		String player = "O";

		// check for winner or tie
		while(this.check_winner() == "none" && !this.check_tie()){

			// draw grid
			this.print_grid();

			// ask player for row and col
			Scanner keyboard = new Scanner(System.in);
			System.out.println("Player " + player + ", enter row:");
			int row = keyboard.nextInt();
			System.out.println("Player " + player + ", enter column:");
			int col = keyboard.nextInt();

			// if grid cell is empty, allow player to write in it
			if (row >= 0
				&& row < 3
				&& col >= 0
				&& col < 3
				&& myGrid[row][col] == ""){
				
				// place x or o at row and col
				myGrid[row][col] = player;

				// switch turns after a succesful round
				if (turn == 0){
					player = "X";
					turn = 1;
			
				}else{
					player = "O";
					turn = 0;
				}
			}else{
				System.out.println("invalid position, try again!");
			}	
		}

		if(this.check_tie()){
			System.out.println("No winner, play again!");

		}else{
			System.out.println("Winner is: " + this.check_winner());
		}
		
		// draw grid
		this.print_grid();
	}

	// checks if a winner is found.  Returns "none" or player symbol
	public String check_winner(){

		// check rows
		for (int row = 0; row < 3; row++){

			if (this.myGrid[row][0] == this.myGrid[row][1] 
				&& this.myGrid[row][0] ==  this.myGrid[row][2]
				&& this.myGrid[row][0] != "")
				return this.myGrid[row][0];
		}

		// check columns
		for (int col = 0; col < 3; col++){

			if (this.myGrid[0][col] == this.myGrid[1][col] 
				&& this.myGrid[0][col] == this.myGrid[2][col]
				&& this.myGrid[0][col] != "")
				return this.myGrid[0][col];
		}

		// check diagonally (left to right)
		if (this.myGrid[0][0] == this.myGrid[1][1] 
			&& this.myGrid[0][0] == this.myGrid[2][2]
			&& this.myGrid[0][0] != "")
			return this.myGrid[0][0];


		// check diagonally (right to left)
		if (this.myGrid[0][2] == this.myGrid[1][1] 
			&& this.myGrid[0][2] == this.myGrid[2][0]
			&& this.myGrid[0][2] != "")
			return this.myGrid[0][2];
		
		return "none";
	}


	// checks if the grid is at a tie
	public boolean check_tie(){

		int empty = 0;

		for(int i = 0; i < 3; i++){
			for (int j = 0; j < 3; j++){
				if (this.myGrid[i][j] == ""){
					empty++;
				}
			}
		}

		if (this.check_winner() == "none" && empty == 0 ){
			return true;
		}

		return false;
	}


	// prints the grid on the terminal
	public void print_grid(){

		System.out.println();

		for(int i = 0; i < 3; i++){
			for (int j = 0; j < 3; j++){
				if (this.myGrid[i][j] == ""){
					System.out.print("_  ");
				}
				else{
					System.out.print(this.myGrid[i][j] + "  ");
				}
			}
			System.out.println();
		}
	}


	public static void main(String [] args){
		
		// create game and start it
		TicTacToe myGame = new TicTacToe();
		
		// Grid 1
		String[][] grid1 = {{"O","O","X"},{"X","X","O"},{"O","X","O"}};

		myGame.setGrid(grid1);
		// myGame.print_grid();

		// Should be true
		// System.out.println("tie: " + myGame.check_tie());
		// Should return none
		// System.out.println("winner: " + myGame.check_winner());
		

		// Grid 2
		String[][] grid2 = {{"X","X",""},{"X","O",""},{"","","O"}};

		myGame.setGrid(grid2);
		myGame.print_grid();

		// Should return False
		System.out.println("tie: " + myGame.check_tie());
		// Should return none
		System.out.println("winner: " + myGame.check_winner());

		// Grid 3
		String[][] grid3 = {{"","X","O"},{"X","O",""},{"O","",""}};

		myGame.setGrid(grid3);
		myGame.print_grid();

		// Should return false
		System.out.println("tie: " + myGame.check_tie());
		// Should return O
		System.out.println("winner: " + myGame.check_winner());

		// Grid 4
		String[][] grid4 = {{"O","X","X"},{"","X","O"},{"O","X",""}};

		myGame.setGrid(grid4);
		myGame.print_grid();

		// Should return false
		System.out.println("tie: " + myGame.check_tie());
		// Should return X
		System.out.println("winner: " + myGame.check_winner());
	}

}

