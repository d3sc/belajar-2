#include<stdio.h>

int main() {


// rumus balok
//float panjang, tinggi, lebar;
//
//printf("panjang = "); scanf("%f", &panjang);
//printf("tinggi = "); scanf("%f", &tinggi);
//printf("lebar = "); scanf("%f", &lebar);
//
//
// //hasil = panjang * tinggi * lebar;
//
//printf("hasilnya %f", panjang * tinggi * lebar);


// Pengkondisian

// contoh pertama

//unsigned int nilai;
//printf("masukkan Nilai :");
//scanf("%i", &nilai);

//if(nilai > 100 || nilai < 0) {
//	return printf("value salah!");
//} 

//if(nilai >= 80) {
//	printf("A");
//} else if (nilai >= 70) {
//	printf("B");
//} else if (nilai >= 60){
//	printf("C");
//} else if (nilai >= 50){
//	printf("D");
//} else if (nilai >= 40){
//	printf("E");
//} else {
//	printf("kamu gagal");
//}


// contoh kedua

//int nilai1;
//printf("Masukkan Nilai 1 : ");
//scanf("%i", &nilai1);
//int nilai2;
//printf("Masukkan Nilai 2 : ");
//scanf("%i", &nilai2);
//
//
//if (nilai1 > nilai2) {
//	printf("Nilai 1 lebih besar");
//} else if (nilai1 == nilai2) {
//	printf("Nilai 1 dan 2 sama");
//} else {
//	printf("Nilai 2 lebih besar");
//	
//}


// switch case

char channel;
printf("Masukkan Grade = ");
channel = getchar();

switch(channel) {
	case '1' :
		printf("Anda memilih ANTV");
		break;
	case '2' :
		printf("Anda memilih RCTI");
		break;
	case '3' :
		printf("Anda memilih Indosiar");
		break;
}





return 0;
}
