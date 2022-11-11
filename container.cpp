#include<iostream>
#include<conio.h>
#include<string.h>
#include<string>
#include<fstream>
#include<sstream>


using namespace std;
int main()
{
    ifstream file1;
    ofstream file2;


    file1.open("test.txt"); //Input File
    file2.open("output.txt"); //output file

    string line;
    while(getline(file1,line))
    {
        //if the line contains "Refrigerated_Explosive" then read number until meet RE
        if(line=="Container Type: Refrigerated_Explosive //Enter one serial no. per line")
        {
            string number;
            while(getline(file1,number))  //read number and write to file output 
            {
                if(number!="END RE")
                {
                    file2<<number<<endl;
                }
                else if (number=="END RE"){
                	
                	string filename = "output.txt";
                	ofstream file4;
                	file4.open("result.txt");
					fstream file3(filename.c_str());
					string lines;
					if(file3.is_open())
					{
						while(getline(file3,lines))
						{
							file4<<lines<<endl;
						}
					}
				
				    file1.close();
				    file2.close();
				    return 0;
				}
                //else return 0; //break if meet "RE"
                
            }
        }
    }
    
}
