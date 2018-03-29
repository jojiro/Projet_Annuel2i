/*
 * QR Code generator demo (C)
 *
 * Run this command-line program with no arguments. The program
 * computes a demonstration QR Codes and print it to the console.
 *
 * Copyright (c) Project Nayuki. (MIT License)
 * https://www.nayuki.io/page/qr-code-generator-library
 *
 * Permission is hereby granted, free of charge, to any person obtaining a copy of
 * this software and associated documentation files (the "Software"), to deal in
 * the Software without restriction, including without limitation the rights to
 * use, copy, modify, merge, publish, distribute, sublicense, and/or sell copies of
 * the Software, and to permit persons to whom the Software is furnished to do so,
 * subject to the following conditions:
 * - The above copyright notice and this permission notice shall be included in
 *   all copies or substantial portions of the Software.
 * - The Software is provided "as is", without warranty of any kind, express or
 *   implied, including but not limited to the warranties of merchantability,
 *   fitness for a particular purpose and noninfringement. In no event shall the
 *   authors or copyright holders be liable for any claim, damages or other
 *   liability, whether in an action of contract, tort or otherwise, arising from,
 *   out of or in connection with the Software or the use or other dealings in the
 *   Software.
 */

#include <stdbool.h>
#include <stddef.h>
#include <stdio.h>
#include <stdlib.h>
#include <string.h>
#include "qrcodegen.h"
// si on execute avec le compilateur ..
#include "bitmap/qdbmp.h"
// si on execute le programme en console
//#include "qdbmp.h"



// Function prototypes
static void doBasicDemo(int value);
static void printQr(const uint8_t qrcode[]);


// The main application program.
int main(int argc,char **argv) {
    int value = atoi(argv[1]);
    /* Pour tester la valeur de argv
    printf("  valeur argv : %d \n",value);
    */

	doBasicDemo(value);
	return EXIT_SUCCESS;
}



/*---- A modifier à convenance ----*/

// Creates a single QR Code, then prints it to the console.
static void doBasicDemo(int value) {

    char *identifiant = NULL;
    identifiant = malloc(sizeof(int)*100);
    if(identifiant == NULL){
       printf("probleme d'allocation memoire id\n");
       }

    char *clef = NULL;
    clef = malloc(sizeof(char)*50);
         if(clef == NULL){
       printf("probleme d'allocation memoire clef\n");
       }

    sprintf(identifiant,"%d",value);

    /*strcpy(identifiant,argv[1]);
    if(clef != NULL ){
    strcat(identifiant,clef);
    }
    printf("ok");
    printf("\n id et clef : %s \n ",*identifiant);
    */
	const char *text = identifiant;  // Changer ici pour ce que je veux metre dans le qrcode ( identifiant de la personne + token )
	enum qrcodegen_Ecc errCorLvl = qrcodegen_Ecc_LOW;  // Error correction level

	// Make and print the QR Code symbol
	uint8_t qrcode[qrcodegen_BUFFER_LEN_MAX];
	uint8_t tempBuffer[qrcodegen_BUFFER_LEN_MAX];
	bool ok = qrcodegen_encodeText(text, tempBuffer, qrcode, errCorLvl,
		qrcodegen_VERSION_MIN, qrcodegen_VERSION_MAX, qrcodegen_Mask_AUTO, true);
	if (ok)
		printQr(qrcode);
}

/*---- Utilities ----*/

// Prints the given QR Code to the console.
static void printQr(const uint8_t qrcode[]) {

	int size = qrcodegen_getSize(qrcode);
	int border = 4;
	static FILE *file;
	for (int y = -border; y < size + border; y++) {
		for (int x = -border; x < size + border; x++) {
			fputs((qrcodegen_getModule(qrcode, x, y) ? "##" : "  "), stdout); // remplacer ## par pixel noir et espace par pixel blanc
		}                                                                     // trouver une librairie de conversion en image
		fputs("\n", stdout);
	}
	fputs("\n", stdout);
}
