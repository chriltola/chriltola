#include<iostream>
#include<fstream>
#include<sstream>
#include<windows.h>

using namespace std;

int y =0;
int offset;
string line;

void number()
{
	y--;
	cout<<"number of lines: "<<y<<endl;
}

void changeColor(int desiredColor){
	SetConsoleTextAttribute(GetStdHandle(STD_OUTPUT_HANDLE), desiredColor);
}
void funFind(string search, string timeName, int a)
	{
		if((offset=line.find(search, 0)) !=string::npos)
		{
			string arr[4];
			int i=0;
			stringstream ssin(line);
			while (ssin.good() && i<4)
			{
				ssin>>arr[i];
				++i;
			}
			for (int i = 0; i < 4; i++)
			cout<<timeName<<arr[a]<<endl;
		}
	};


int main()
{
	int i=0;
	string filename;
	cout<<"Enter File Name Here: ";
	cin>>filename;
	ifstream file(filename.c_str());
	if(file.is_open())
		{
			while (!file.eof())
			{
				
				getline(file, line);
				//cout<<line<<endl;
				y++;
				//cout<<line<<endl;
				if ((offset=line.find("Date:", 0)) !=string::npos)
					{
						//cout<<"Time is Fund!"<<endl;
						string arr[4];
						int i=0;
						stringstream ssin(line);
						while (ssin.good() && i<4 ){
							ssin>>arr[i];
							++i;
						}
						for(i = 0; i<4; i++){
						
						}
						//Call Start
						cout<<endl;
						changeColor(7);
						cout<<arr[0]<<" Terminal_"<<arr[2]<<endl;
	
					}

				else if ((offset=line.find("CardInserted", 0)) !=string::npos)
					{
						//cout<<"Pin Entered is Fund!"<<endl;
						string arr[4];
						int i=0;
						stringstream ssin(line);
						while (ssin.good() && i<4 ){
							ssin>>arr[i];
							++i;
						}
						for(i = 0; i<4; i++){
					
						}
						string s=arr[0];

						for(int i=0; i<s.length(); i++)
						{

						}
						changeColor(4);
						cout<<"Start: "<<s[1]<<s[2]<<":"<<s[3]<<s[4]<<":"<<s[5]<<s[6]<<endl;
					}

				else if ((offset=line.find("PINEntered", 0)) !=string::npos)
					{
						//cout<<"Pin Entered is Fund!"<<endl;
						string arr[4];
						int i=0;
						stringstream ssin(line);
						while (ssin.good() && i<4 ){
							ssin>>arr[i];
							++i;
						}
						for(i = 0; i<4; i++){
					
						}
						string s=arr[0];

						for(int i=0; i<s.length(); i++)
						{

						}
						changeColor(4);
						cout<<"End_PIN: "<<s[1]<<s[2]<<":"<<s[3]<<s[4]<<":"<<s[5]<<s[6]<<endl;
	
					}

				else if ((offset=line.find("Trxn Req Send : Succeeded G    A C", 0)) !=string::npos)
					{
						//cout<<"Pin Entered is Fund!"<<endl;
						string arr[4];
						int i=0;
						stringstream ssin(line);
						while (ssin.good() && i<4 ){
							ssin>>arr[i];
							++i;
						}
						for(i = 0; i<4; i++){
					
						}
						string s=arr[0];

						for(int i=0; i<s.length(); i++)
						{

						}
						changeColor(2);
						cout<<"Trxn_Request: "<<s[1]<<s[2]<<":"<<s[3]<<s[4]<<":"<<s[5]<<s[6]<<endl;
					}

				else if ((offset=line.find("BALANCE_INQ", 0)) !=string::npos)
					{
						changeColor(7);
						cout<<"--------------------------------------------------BALANCE_INQ--------------------------------------------------"<<endl;
					}

				else if ((offset=line.find("CUSTOMER CANCELLED", 0)) !=string::npos)
					{
						changeColor(7);
						cout<<"--------------------------------------------------CUSTOMER CANCELLED--------------------------------------------------"<<endl;
					}

				else if ((offset=line.find("END", 0)) !=string::npos)
					{
						//cout<<"Pin Entered is Fund!"<<endl;
						string arr[4];
						int i=0;
						stringstream ssin(line);
						while (ssin.good() && i<4 ){
							ssin>>arr[i];
							++i;
						}
						for(i = 0; i<4; i++){
					
						}
						string s=arr[0];

						for(int i=0; i<s.length(); i++)
						{

						}
						changeColor(2);
						cout<<"Notes_Stacked: "<<s[2]<<s[3]<<":"<<s[4]<<s[5]<<":"<<s[6]<<s[7]<<endl;
					}
				else if ((offset=line.find("CardRemoved", 0)) !=string::npos)
					{
						string arr[4];
						int i=0;
						stringstream ssin(line);
						while (ssin.good() && i<4 ){
							ssin>>arr[i];
							++i;
						}
						for(i = 0; i<4; i++){
					
						}
						string s=arr[0];

						for(int i=0; i<s.length(); i++)
						{

						}
						changeColor(1);
						cout<<"Card_Taken: "<<s[1]<<s[2]<<":"<<s[3]<<s[4]<<":"<<s[5]<<s[6]<<endl;
					}
				else if ((offset=line.find("Banknote ejection to", 0)) !=string::npos)
					{
						string arr[4];
						int i=0;
						stringstream ssin(line);
						while (ssin.good() && i<4 ){
							ssin>>arr[i];
							++i;
						}
						for(i = 0; i<4; i++){
					
						}
						string s=arr[0];

						for(int i=0; i<s.length(); i++)
						{

						}
						changeColor(1);
						cout<<"Trxn_Request: "<<s[1]<<s[2]<<":"<<s[3]<<s[4]<<":"<<s[5]<<s[6]<<endl;
						changeColor(5);
						cout<<"------------------------------- -------------------------------"<<endl;

						changeColor(7);
					}

			}
			file.close();
		}
		number();
		cout<<"Press Enter to Exit!";
		cin.ignore();
		cin.get();
}









#include<iostream>
#include<conio.h>
#include<string>
#include<fstream>
#include<sstream>
using namespace std;
int main()
{
    ifstream file1;
    ofstream file2;
	int offset;

    file1.open("ATM0002-20221115.txt"); //Input File
    file2.open("output.txt"); //output file

    string line;
    while(getline(file1,line))
    {
        //if the line contains "Refrigerated_Explosive" then read number until meet RE
        if((offset=line.find("------------------------", 0)) !=string::npos)
        {
            string number;
            while(getline(file1,number))  //read number and write to file output 
            {
                if(number!="===========================" && number!="          CASH WITHDRAWAL" )
                {
					if ((offset=number.find("TIME ", 0)) !=string::npos)
					{
						//cout<<"Time is Fund!"<<endl;
						string arr[4];
						int i=0;
						stringstream ssin(number);
						while (ssin.good() && i<4 ){
							ssin>>arr[i];
							++i;
						}
						for(i = 0; i<4; i++){
					
						}

					
						file2<<"------------------------------- -------------------------------"<<endl;
						//file2<<"Date_"<<arr[1]<<"_Time "<<arr[3]<<endl;
						file2<<"1.Start: "<<arr[3]<<endl;
					}

					else if ((offset=number.find("PIN ENTERED", 0)) !=string::npos)
					{
						//cout<<"Pin Entered is Fund!"<<endl;
						string arr[4];
						int i=0;
						stringstream ssin(number);
						while (ssin.good() && i<4 ){
							ssin>>arr[i];
							++i;
						}
						for(i = 0; i<4; i++){
					
						}
						//Call PIN ENTERED
						file2<<"2.Pin_Entered: "<<arr[1]<<endl;
					}

					else if ((offset=number.find("TRANSACTION REQUEST [G", 0)) !=string::npos)
					{
						//cout<<"Transaction Request is Fund!"<<endl;
						string arr[4];
						int i=0;
						stringstream ssin(number);
						while (ssin.good() && i<4 ){
							ssin>>arr[i];
							++i;
						}
						for(i = 0; i<4; i++){
					
						}
						//Call PIN ENTERED
		
						file2<<"3.Trxn_Request: "<<arr[1]<<endl;
					}

					else if ((offset=number.find("NOTES STACKED", 0)) !=string::npos)
					
					{
						//cout<<"Notes Stacked is Fund!"<<endl;
						string arr[4];
						int i=0;
						stringstream ssin(number);
						while (ssin.good() && i<4 ){
							ssin>>arr[i];
							++i;
						}
						for(i = 0; i<4; i++){
					
						}
						//Call PIN ENTERED
						
						file2<<"4.Notes_Stacked: "<<arr[1]<<endl;
					}

					else if ((offset=number.find("CARD TAKEN", 0)) !=string::npos)
					{
						//cout<<"Card Taken is Fund!"<<endl;
						string arr[4];
						int i=0;
						stringstream ssin(number);
						while (ssin.good() && i<4 ){
							ssin>>arr[i];
							++i;
						}
						for(i = 0; i<4; i++){
					
						}
						//Call PIN ENTERED
						file2<<"5.Card_Taken: "<<arr[1]<<endl;
					}

					else if ((offset=number.find("NOTES TAKEN", 0)) !=string::npos)
					{
						//cout<<"Notes Taken is Fund!"<<endl;
						string arr[4];
						int i=0;
						stringstream ssin(number);
						while (ssin.good() && i<4 ){
							ssin>>arr[i];
							++i;
						}
						for(i = 0; i<4; i++){
					
						}
						//Call PIN ENTERED
						
						file2<<"6.Notes_Taken: "<<arr[1]<<endl;
						
						
					}

			
                    
                }
                else goto label; 
            }

        }
		label:;
    }

    file1.close();
    file2.close();
    return 0;
}
