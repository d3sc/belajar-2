#include<stdio.h>
#include<string.h>


int main() {
//	1. tipe data
//	int value = 10;
//	float pecahan = 10.5;
//	printf("ini adalah nilai interger = %i", value); // %i, untuk memanggil variable
//	printf("\nini adalah nilai interger = %f", pecahan);

//	2. Luas Segitiga
//	int alas = 7;
//	int tinggi = 12;
//	
//	int hasil = alas * tinggi /2;
//	printf("hasilnya adalah = %icm", hasil);

//	3. Menulis String
//	3.1 Menulis string dengan cara yang salah
//	char nama[10] = "ikbar";
//	char jk[5] = "L";
	
//	3.2 Menulis String dengan benar
	char nis[9];
	char nama[30];
	float kehadiran;
	float tugas;
	float UTS;
	float UAS;
	float hasil;

//	strcpy(nis, "123456789");
//	strcpy(nama, "Ikbar");
	
	
//	kehadiran = 100 * 0.1;
//	tugas = 90 * 0.2;
//	UTS = 83 * 0.3;
//	UAS = 86 * 0.4;
	
	printf("NIS : "); scanf("%s", &nis);
	printf("Nama = "); scanf("%s", &nama);
	printf("kehadiran = "); scanf("%f", &kehadiran);
	printf("tugas = "); scanf("%f", &tugas);
	printf("UTS = "); scanf("%f", &UTS);
	printf("UAS = "); scanf("%f", &UAS);
	hasil = (kehadiran * 0.1) + (tugas * 0.2) + (UTS * 0.3) + (UAS * 0.4);
	printf("Total Nilai = %f", hasil);


//	4. Scanf
//	wajib menggunakan &(nama variabel) pada saat melakukan scanf

//	char nis[10];
//	char nama[30];
//	
//	printf("NIS : "); scanf("%s", &nis);
//	printf("NAMA : "); scanf("%s", &nama);
//	
//	printf("NIS saya = %s \n", nis);
//	printf("Nama saya = %s", nama);






return 0;
}
